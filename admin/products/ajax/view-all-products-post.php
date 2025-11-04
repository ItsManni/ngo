<?php

@session_start();

require_once('../../include/autoloader.inc.php');



$dbh = new Dbh();

$conn = $dbh->_connectodb();

$core = new Core();



$draw = $_POST['draw'] ?? 1;

$row = $_POST['start'] ?? 0;

$rowperpage = $_POST['length'] ?? 10; // Rows per page

$searchValue = $_POST['search']['value'] ?? ''; // Search value



$columnName = "p.ID";

$columnSortOrder = "DESC";

$data = [];



// Search filter

$searchQuery = "";

if ($searchValue != '') {

    $searchValue = $conn->real_escape_string($searchValue);

    $searchQuery = " AND (p.Name LIKE '%" . $searchValue . "%' OR s.Name LIKE '%" . $searchValue . "%')";

}



// Base filter: active products

$filter = " WHERE p.IsActive = 1 " . $searchQuery;



// Total records with filter

$totalRecordwithFilter = $core->_getTotalRows(

    $conn,

    'products p LEFT JOIN sevaye s ON p.SevayeID = s.ID',

    $filter

);



// Total records without filter

$totalRecords = $core->_getTotalRows(

    $conn,

    'products',

    "WHERE IsActive = 1"

);



// Order + limit

$filter .= " ORDER BY " . $columnName . " " . $columnSortOrder;

$filter .= " LIMIT " . intval($row) . "," . intval($rowperpage);



// Fetch records with JOIN

$sql = "SELECT 

            p.ID, 

            p.SevayeID, 

            p.Name AS ProductName, 

            p.Images, 

            p.Ammount, 
            p.Priority,
            s.Name AS SevayeName

        FROM products p

        LEFT JOIN sevaye s ON p.SevayeID = s.ID

        $filter";



$result = $conn->query($sql);



while ($rowData = $result->fetch_assoc()) {

    $ID = $rowData['ID'];

    $SevayeName = $rowData['SevayeName'] ?: "N/A";

    $ProductName = $rowData['ProductName'] ?: "N/A";

    $Priority=$rowData['Priority'] ?: "N/A";

    $Image = !empty($rowData['Images']) 

        ? "<img src='../uploads/products/" . htmlspecialchars($rowData['Images']) . "' width='60' height='60' class='rounded border'>" 

        : "No Image";



    $Price = number_format($rowData['Ammount'], 2);



    $data[] = [

        "id" => $ID,

        "sevaye" => $SevayeName,

        "name" => $ProductName,

        "image" => $Image,

        "price" => "₹ " . $Price,
        "priority" =>$Priority,

        "action" => "

            <button class='btn btn-sm btn-warning me-1' onclick='EditProduct($ID)'>

                <i class='bi bi-pencil'></i>

            </button>

            <button class='btn btn-sm btn-danger' onclick='DeleteProduct($ID)'>

                <i class='bi bi-trash'></i>

            </button>

        "

    ];

}



// Response for DataTable

$response = [

    "draw" => intval($draw),

    "iTotalRecords" => $totalRecords,

    "iTotalDisplayRecords" => $totalRecordwithFilter,

    "aaData" => $data

];



echo json_encode($response);

?>

