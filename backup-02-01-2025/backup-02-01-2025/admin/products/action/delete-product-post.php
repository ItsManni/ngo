<?php
@session_start();
require_once('../../include/autoloader.inc.php');

$dbh = new Dbh();
$conn = $dbh->_connectodb();
$core = new Core();

$id = isset($_POST['id']) ? intval($_POST['id']) : 0;
$response = ['error' => true, 'message' => 'Invalid Product ID'];

if ($id > 0) {
    // Soft delete product
    $updateData = ['IsActive' => 0];
    $whereCondition = "ID = $id";
    $res = $core->_UpdatePreparedData($conn, 'products', $updateData, $whereCondition);

    if ($res['error'] === false) {
        $response = [
            'error' => false,
            'message' => 'प्रोडक्ट को सूची से हटा दिया गया है।'
        ];
    } else {
        $response['message'] = 'Delete failed';
    }
}

echo json_encode($response);
