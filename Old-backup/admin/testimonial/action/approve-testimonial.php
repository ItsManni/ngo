<?php

@session_start();

require_once('../../include/autoloader.inc.php');

$dbh = new Dbh();

$conn = $dbh->_connectodb();

$core = new Core();

$Testimonial = new Testimonial($conn);

$loggedin_email = $_SESSION['pp_email'];

$authentication = new Authentication($conn);

$UserType = $authentication->SessionCheck();

if($UserType == 'System Admin' || $UserType == 'Admin') {

    $ID = $_POST['ID'];

    $data = array('ID' => $ID);

    $response = $Testimonial->ApproveTestimonial($data);

    if($response['error'] == false) {

        $response['message'] = "Testimonial approved successfully.";

    } else {

        $response['message'] = "Technical issue, please try later.";

    }

} else {

    $response['error'] = true;

    $response['message'] = "You don't have permission to perform this action.";

}

echo json_encode($response);

?> 