<?php

@session_start();

require_once('../../include/autoloader.inc.php');

$dbh = new Dbh();

$conn = $dbh->_connectodb();

$authentication = new Authentication($conn);

$authenticated = $authentication->SessionCheck();

if(isset($_POST['ID']))
{
	$volunteer = new Volunteer($conn);

	$data = $_POST;

	$response = $volunteer->DeleteVolunteer($data);

	if($response['error'] == false)
	{
		$response['message'] = "Volunteer Deleted Successfully !";
	}
	else
	{
		$response['message'] = "Some Technical Error ! Please Try Again";
	}
}
else
{
	$response['error'] = true;

	$response['message'] = "Some Technical Error ! Please Try Again.";
}

echo json_encode($response);

?>
