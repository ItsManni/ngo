<?php
@session_start();
require_once('../../include/autoloader.inc.php');
$dbh = new Dbh();
$conn = $dbh->_connectodb();
$core = new Core();
$draw = $_POST['draw'];
$row = $_POST['start'];
$rowperpage = $_POST['length']; // Rows per page
$searchValue = $_POST['search']['value']; // Search value
$columnName = "ID";
$columnSortOrder = "DESC";
$data = [];

// Search filter
$searchQuery = "";
if ($searchValue != '') {
    $searchValue = $conn->real_escape_string($searchValue);
    $searchQuery = " AND (Name LIKE '%" . $searchValue . "%')";
}

// Base filter: active services
$filter = " WHERE IsActive = 1 " . $searchQuery;

// Total records with filter
$totalRecordwithFilter = $core->_getTotalRows($conn, 'sevaye', $filter);

// Total records without filter
$totalRecords = $core->_getTotalRows($conn, 'sevaye', "WHERE IsActive = 1");

// Order + limit
$filter .= " ORDER BY " . $columnName . " " . $columnSortOrder;
$filter .= " LIMIT " . $row . "," . $rowperpage;

// Fetch records
$sevaye_details = $core->_getTableRecords($conn, 'sevaye', $filter);

foreach ($sevaye_details as $sevaye) {
    $ID = $sevaye['ID'];
    $Name = !empty($sevaye['Name']) ? $sevaye['Name'] : "N/A";
    $Image = !empty($sevaye['Image']) ? "<img src='../" . $sevaye['Image'] . "' width='60' height='60' class='rounded border'>" : "No Image";

    $data[] = [
        "id" => $ID,
        "Name" => $Name,
        "Image" => $Image,
        "Action" => "
            <button class='btn btn-sm btn-warning me-1' onclick='EditSevaye($ID)'>
                <i class='bi bi-pencil'></i>
            </button>
           
        "
    ];
}
//  <button class='btn btn-sm btn-danger' onclick='DeleteSevaye($ID)'>
//                 <i class='bi bi-trash'></i>
//             </button>
// Response for DataTable
$response = [
    "draw" => intval($draw),
    "iTotalRecords" => $totalRecords,
    "iTotalDisplayRecords" => $totalRecordwithFilter,
    "aaData" => $data
];

echo json_encode($response);
?>
