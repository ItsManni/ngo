<?php

@session_start();

require_once('../../include/autoloader.inc.php');



$dbh = new Dbh();

$core = new Core();

$conn = $dbh->_connectodb();

$core->setTimeZone();



$response = [

    'error' => true,

    'message' => "Some Technical Error! Please Try Again."

];



if (

    isset($_POST['product_name']) &&

    isset($_POST['product_price']) &&

    isset($_POST['sevaye_id']) // ensure SevayeID is provided

) {



    $form_action = $_POST['form_action'] ?? 'add';



    $SevayeID = intval($_POST['sevaye_id']);

    $Name = $core->cleantext($_POST['product_name']);

    $Ammount = floatval($_POST['product_price']);

    $Priority=$_POST['product_priority'];

    $CreatedDate = date("Y-m-d");

    $CreatedTime = date("H:i:s");

    $CreatedBy = $_SESSION['pp_email'] ?? 'admin';
     $SubcategoryID = isset($_POST['subcategory_id']) ? intval($_POST['subcategory_id']) : -1;



    // File upload handling

    $uploadedImageName = "";

    if (!empty($_FILES['product_image']['name'])) {

        $randomNumber = rand(1000, 100000);

        $ext = pathinfo($_FILES["product_image"]["name"], PATHINFO_EXTENSION);

        $uploadedImageName = $randomNumber . "-Product." . $ext;



        // Correct relative path for saving

        $uploadDir = __DIR__ . "/../../uploads/products/"; // full path from current file

        $uploadPath = $uploadDir . $uploadedImageName;



        // Create folder if not exists

        if (!is_dir($uploadDir)) {

            mkdir($uploadDir, 0777, true);

        }



        if (!move_uploaded_file($_FILES["product_image"]["tmp_name"], $uploadPath)) {

            $uploadedImageName = ""; // reset if upload failed

        }

    }



    if ($form_action === "add") {

        // Prepare insert data

        $columns = ['SevayeID', 'SevayeSubcategoryID','Name', 'Images', 'Ammount','Priority','CreatedDate', 'CreatedTime', 'CreatedBy'];
        $values = [
            $SevayeID,
            $SubcategoryID,
            $Name,
            $uploadedImageName,
            $Ammount,
            $Priority,
            $CreatedDate,
            $CreatedTime,
            $CreatedBy
        ];



        $response = $core->_InsertPreparedData($conn, 'products', $columns, $values);



        if ($response['error'] === false) {

        	$response['error']==false;

            $response['message'] = "उत्पाद सफलतापूर्वक जोड़ा गया।";

        }else{

        	$response['error']==true;

            $response['message'] = "कोई Error हुई है !!";

        }



    } else {

        // For update

        $productID = intval($_POST['product_id']);



        $updateData = [

            'SevayeID' => $SevayeID,

            'Name' => $Name,

            'Ammount' => $Ammount,
            'Priority' => $Priority

        ];



        if ($uploadedImageName) {

            $updateData['Images'] = $uploadedImageName;

        }



        $whereCondition = "ID = $productID";

        $response = $core->_UpdatePreparedData($conn, 'products', $updateData, $whereCondition);

        if ($response['error'] === false) {

        	$response['error']==false;

            $response['message'] = "उत्पाद सफलतापूर्वक अपडेट किया गया।";

        }else{

        	$response['error']==true;

            $response['message'] = "कोई Error हुई है !!";

        }

    }

}



echo json_encode($response);

?>