<?php
@session_start();
require_once('../../include/autoloader.inc.php');

$dbh = new Dbh();
$conn = $dbh->_connectodb();
$core = new Core();

$response = ['error' => true, 'message' => 'Something went wrong'];

try {
    $ID = intval($_POST['id'] ?? 0);
    if ($ID <= 0) {
        throw new Exception("Invalid Subcategory ID.");
    }

    // Fetch subcategory details
    $subcategory = $core->_getTableDetails($conn, 'sevaye_subcategory', "WHERE ID = $ID");

    if (!$subcategory) {
        throw new Exception("Subcategory not found.");
    }

    // Fetch category name
    $category = $core->_getTableDetails($conn, 'sevaye', "WHERE ID = " . intval($subcategory['CategoryID']));
    $subcategory['CategoryName'] = $category['Name'] ?? 'N/A';

    $response = [
        'error' => false,
        'data' => $subcategory
    ];

} catch (Exception $e) {
    $response['message'] = $e->getMessage();
}

echo json_encode($response);
