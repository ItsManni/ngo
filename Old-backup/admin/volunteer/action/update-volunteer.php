<?php

@session_start();

require_once('../../include/autoloader.inc.php');

$dbh = new Dbh();

$conn = $dbh->_connectodb();

$authentication = new Authentication($conn);

$authenticated = $authentication->SessionCheck();

if(isset($_POST['UserName']))
{
	$volunteer = new Volunteer($conn);

	$data = $_POST;

	$data['CreatedDate'] = date("Y-m-d");

	$data['CreatedTime'] = date("H:i:s");

	$data['CreatedBy'] = $_SESSION['pp_email'];

	$duplicate_volunteer_pass = $volunteer->DuplicateVolunteer_pass($data);

	if($duplicate_volunteer_pass)
	{
		$response = $volunteer->UpdateVolunteer($data);

		if($response['error'] == false)
		{
			$response['message'] = "Volunteer Updated Successfully !";
		}
		else
		{
			$response['message'] = "Some Technical Error ! Please Try Again";
		}
	}
	else
	{
		$response['error'] = true;

		$response['message'] = "Same email or phone number has already been used!";
	}
}
else
{
	$response['error'] = true;

	$response['message'] = "Some Technical Error ! Please Try Again.";
}

echo json_encode($response);

?>
