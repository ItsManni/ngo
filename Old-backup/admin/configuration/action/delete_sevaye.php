<?php
@session_start();
require_once('../../include/autoloader.inc.php');

$dbh = new Dbh();
$conn = $dbh->_connectodb();
$core = new Core();

$id = isset($_POST['id']) ? intval($_POST['id']) : 0;
$response = ['error' => true, 'message' => 'Invalid ID'];

if ($id > 0) {
    $updateData = ['IsActive' => 0];
    $whereCondition = "ID = $id";
    $res = $core->_UpdatePreparedData($conn, 'sevaye', $updateData, $whereCondition);
    $response['error'] = $res['error'];
    $response['message'] = $res['error'] ? 'Delete failed' : 'Service deleted successfully';
}

echo json_encode($response);
?>