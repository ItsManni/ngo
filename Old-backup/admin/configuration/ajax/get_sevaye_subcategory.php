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
$columnName = "ssc.ID";
$columnSortOrder = "DESC";
$data = [];

// Search filter
$searchQuery = "";
if ($searchValue != '') {
    $searchValue = $conn->real_escape_string($searchValue);
    $searchQuery = " AND (ssc.SubcategoryName LIKE '%$searchValue%' OR s.Name LIKE '%$searchValue%')";
}

// Base filter: active subcategories
$filter = " WHERE ssc.IsActive = 1 " . $searchQuery;

// Total records with filter
$totalRecordwithFilter = $core->_getTotalRows($conn, 'sevaye_subcategory ssc INNER JOIN sevaye s ON s.ID = ssc.CategoryID', $filter);

// Total records without filter
$totalRecords = $core->_getTotalRows($conn, 'sevaye_subcategory ssc INNER JOIN sevaye s ON s.ID = ssc.CategoryID', "WHERE ssc.IsActive = 1");

// Order + limit
$filter .= " ORDER BY $columnName $columnSortOrder";
$filter .= " LIMIT $row, $rowperpage";

// Fetch records
$sql = "SELECT ssc.ID, ssc.CategoryID, s.Name AS CategoryName, ssc.SubcategoryName, ssc.SubcategoryImage,ssc.Priority 
        FROM sevaye_subcategory ssc 
        INNER JOIN sevaye s ON s.ID = ssc.CategoryID
        $filter";

$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($result)) {
    $ID = $row['ID'];
    $CategoryName = !empty($row['CategoryName']) ? $row['CategoryName'] : "N/A";
    $SubcategoryName = !empty($row['SubcategoryName']) ? $row['SubcategoryName'] : "N/A";
    $SubcategoryImage = !empty($row['SubcategoryImage']) ? "<img src='../" . $row['SubcategoryImage'] . "' width='60' height='60' class='rounded border'>" : "No Image";
    $Priority = !empty($row['Priority']) ? $row['Priority']: "0";


    $data[] = [
        "id" => $ID,
        "CategoryName" => $CategoryName,
        "SubcategoryName" => $SubcategoryName,
        "SubcategoryImage" => $SubcategoryImage,
        "Priority"         =>$Priority,
        "Action" => "
            <button class='btn btn-sm btn-warning me-1' onclick='EditSubcategory($ID)'>
                <i class='bi bi-pencil'></i>
            </button>
            <button class='btn btn-sm btn-danger' onclick='DeleteSubcategory($ID)'>
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
