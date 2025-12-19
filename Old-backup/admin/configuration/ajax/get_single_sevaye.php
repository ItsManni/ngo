<?php
@session_start();
require_once('../../include/autoloader.inc.php');
$dbh = new Dbh();
$conn = $dbh->_connectodb();
$core = new Core();
$id = isset($_POST['id']) ? intval($_POST['id']) : 0;
$response = ['error' => true, 'message' => 'Invalid ID'];
if ($id > 0) {
   
    $row = $core->_getTableDetails($conn, 'sevaye', "WHERE ID = $id AND IsActive = 1");

    if (!empty($row)) {
        $response = [
            'error' => false,
            'ID' => $row['ID'],
            'Name' => $row['Name'],
            'Image' => $row['Image'],
            'PageUrl'=>$row['PageUrl']
        ];
    } else {
        $response['message'] = "Service not found";
    }
}

echo json_encode($response);
