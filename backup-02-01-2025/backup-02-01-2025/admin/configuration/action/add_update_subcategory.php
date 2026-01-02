<?php
@session_start();
require_once('../../include/autoloader.inc.php');

$dbh = new Dbh();
$core = new Core();
$conn = $dbh->_connectodb();
$core->setTimeZone();

$response = ['error' => true, 'message' => 'Something went wrong'];

try {
    // Get form inputs
    $form_action      = $_POST['subcategory_action'] ?? '';
    $subcategory_name = trim($_POST['subcategory_name'] ?? '');
    $category_id      = intval($_POST['category_id'] ?? 0);
    $subcategory_id   = intval($_POST['subcategory_id'] ?? -1);
    $priority         = intval($_POST['priority'] ?? 0);

    // Validate inputs
    if (empty($subcategory_name)) {
        throw new Exception("Please enter subcategory name.");
    }
    if ($category_id <= 0) {
        throw new Exception("Please select a valid category.");
    }

    // Handle image upload
    $imagePath = '';
    if (!empty($_FILES['subcategory_image']['name'])) {
        $uploadDir = "../../uploads/sevaye_subcategory/";
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        $fileName   = time() . "_" . preg_replace('/\s+/', '_', basename($_FILES['subcategory_image']['name']));
        $targetFile = $uploadDir . $fileName;

        if (!move_uploaded_file($_FILES['subcategory_image']['tmp_name'], $targetFile)) {
            throw new Exception("Failed to upload image.");
        }

        $imagePath = "uploads/sevaye_subcategory/" . $fileName;
    }

    // Prepare data
    $data = [
        'CategoryID'       => $category_id,
        'SubcategoryName'  => $subcategory_name,
        'SubcategoryImage' => $imagePath,
        'Priority'         => $priority,
        'CreatedDate'      => date("Y-m-d"),
        'CreatedTime'      => date("H:i:s"),
        'CreatedBy'        => $_SESSION['pp_email'] ?? 'admin'
    ];

    $IMSSetting = new IMSSetting($conn);

    // Add or update
    if ($form_action === "add") {

        // Optional: duplicate check before insert
        if (!$IMSSetting->CheckDuplicateSubcategoryName($data)) {
            throw new Exception("Subcategory already exists under this category.");
        }

        $insert = $IMSSetting->InsertSevayeSubcategory($data);
        $response = $insert;

    } elseif ($form_action === "update") {

        $data['SubcategoryID'] = $subcategory_id;

        // Keep old image if new one not uploaded
        if (empty($imagePath)) {
            $oldData = $core->_getTableDetails($conn, 'sevaye_subcategory', "WHERE ID = " . intval($subcategory_id));
            if (!empty($oldData['SubcategoryImage'])) {
                $data['SubcategoryImage'] = $oldData['SubcategoryImage'];
            }
        }

        $update = $IMSSetting->UpdateSevayeSubcategory($data);
        $response = $update;

    } else {
        throw new Exception("Invalid action.");
    }

} catch (Exception $e) {
    $response['error'] = true;
    $response['message'] = $e->getMessage();
}

echo json_encode($response);
?>
