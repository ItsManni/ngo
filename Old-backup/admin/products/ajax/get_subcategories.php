<?php
@session_start();
require_once('../../include/autoloader.inc.php');

$dbh = new Dbh();
$conn = $dbh->_connectodb();
$core = new Core();

$category_id = isset($_POST['category_id']) ? intval($_POST['category_id']) : 0;

$response = ['error' => true, 'message' => 'No subcategories found', 'data' => []];

if ($category_id > 0) {
    $where = "WHERE IsActive=1 AND CategoryID=$category_id";
    $subcategories = $core->_getTableRecords($conn, 'sevaye_subcategory', $where);

    if (!empty($subcategories)) {
        $response['error'] = false;
        $response['data'] = $subcategories;
    }
}

echo json_encode($response);
