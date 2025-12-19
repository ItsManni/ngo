<?php

	@session_start();
	require_once('../../include/autoloader.inc.php');
	$dbh = new Dbh();
	$conn = $dbh->_connectodb();
	$authentication = new Authentication($conn);
    $authenticated = $authentication->SessionCheck();

	if(isset($_POST['UserName']))
	{
		$user = new Users($conn);
		$data = $_POST;
		$data['user_email'] = $_POST['UserEmail'];
		$data['user_phone_number'] = $_POST['UserPhoneNumber'];
		$data['CreatedDate'] = date("Y-m-d");
		$data['CreatedTime'] = date("H:i:s");
		$data['CreatedBy'] = $_SESSION['pp_email'];
		$duplicate_user_pass = $user->DuplicateUser_pass($data);
		if($duplicate_user_pass)
		{
			$response = $user->UpdateUser($data);
			if($response['error'] == false)
			{
				$response['message'] = "User Updated Successfully !";
			}
			else
			{
				$response['message'] = "Some Technical Error ! Please Try Again";
			}
		}
		else
		{
			$response['error'] = true;
			$response['message'] = "Same email or phonumber has already been used!";
		}
	}
	else
	{
		$response['error'] = true;
		$response['message'] = "Some Technical Error ! Please Try Again.";
	}
	echo json_encode($response);
?>