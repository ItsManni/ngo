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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $galleryType = $_POST['gallery_type'] ?? '';
    $formAction = $_POST['form_action'] ?? '';
    
    // Add user ID to the data
    $_POST['CreatedBy'] = $_SESSION['admin_session_id'] ?? 1;
    
    try {
        if ($galleryType == 'image') {
            if ($formAction == 'add') {
                $response = $galleryManager->InsertGalleryImageForm($_POST);
            } elseif ($formAction == 'update') {
                $response = $galleryManager->UpdateGalleryImageForm($_POST);
            }
        } elseif ($galleryType == 'video') {
            if ($formAction == 'add') {
                $response = $galleryManager->InsertGalleryVideoForm($_POST);
            } elseif ($formAction == 'update') {
                $response = $galleryManager->UpdateGalleryVideoForm($_POST);
            }
        } else {
            $response['message'] = "Invalid gallery type";
        }
    } catch (Exception $e) {
        $response['error'] = true;
        $response['message'] = "Error: " . $e->getMessage();
    }
} else {
    $response['message'] = "Invalid request method";
}
echo json_encode($response);
?>

    