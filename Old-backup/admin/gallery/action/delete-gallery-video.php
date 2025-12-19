<?php
@session_start();
require_once('../../include/autoloader.inc.php');

$dbh = new Dbh();
$conn = $dbh->_connectodb();
$galleryManager = new GalleryManager($conn);
$authentication = new Authentication($conn);

$UserType = $authentication->SessionCheck();

$response = array();
$response['error'] = true;
$response['message'] = "Unknown error occurred";

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['ID'])) {
    try {
        $result = $galleryManager->DeleteGalleryVideo($_POST);
        
        if ($result) {
            $response['error'] = false;
            $response['message'] = "Gallery video deleted successfully";
        } else {
            $response['message'] = "Failed to delete gallery video";
        }
    } catch (Exception $e) {
        $response['message'] = "Error: " . $e->getMessage();
    }
} else {
    $response['message'] = "Invalid request";
}
echo json_encode($response);
?>

