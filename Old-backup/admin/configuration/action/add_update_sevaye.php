<?php
@session_start();
require_once('../../include/autoloader.inc.php');
$dbh = new Dbh();
$core = new Core();
$conn = $dbh->_connectodb();
$core->setTimeZone();
$response = ['error' => true, 'message' => 'Something went wrong'];
try {
    $form_action = $_POST['sevayeForm_action'] ?? '';
    $service_name = $_POST['service_name'] ?? '';
    $pageurl=$_POST['page_url']??'';
    $sevaye_id = $_POST['sevayeForm_action_value'] ?? -1;
    if (empty($service_name)) {
        throw new Exception("Please enter service name.");
    }
    $imagePath = '';
    if (!empty($_FILES['service_image']['name'])) 
    {
        $uploadDir = "../../uploads/sevaye/";
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }
        $fileName = time() . "_" . basename($_FILES['service_image']['name']);
        $targetFile = $uploadDir . $fileName;

        if (!move_uploaded_file($_FILES['service_image']['tmp_name'], $targetFile)) {
            throw new Exception("Failed to upload image.");
        }
        $imagePath = "uploads/sevaye/" . $fileName;
    }
    $data = [
        'service_name' => $service_name,
        'service_image' => $imagePath,
        'page_url'     => $pageurl,
        'CreatedDate' => date("Y-m-d"),
        'CreatedTime' => date("H:i:s"),
        'CreatedBy' => $_SESSION['pp_email'] ?? 'admin'
    ];

    $IMSSetting = new IMSSetting($conn);
    if ($form_action == "add") {
        if (!$IMSSetting->CheckDuplicateSevayeName($data)) {
            throw new Exception("Service already exists.");
        }
        $insert = $IMSSetting->InsertSevayeName($data);
        $response = $insert;
    }
    elseif ($form_action == "update")
     {
     	  if (empty($imagePath)) {
            $oldData = $core->_getTableDetails($conn, 'sevaye', "WHERE ID = " . intval($sevaye_id));
            if (!empty($oldData['Image'])) {
                $data['service_image'] = $oldData['Image']; // keep old image
            }
        }
        $data['sevayeForm_action_value'] = $sevaye_id;
        $update = $IMSSetting->UpdateSevayeName($data);
        $response = $update;
    }
    else {
        throw new Exception("Invalid action.");
    }
} catch (Exception $e) {
    $response['error'] = true;
    $response['message'] = $e->getMessage();
}

echo json_encode($response);
?>