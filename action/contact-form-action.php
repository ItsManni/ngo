<?php
	@session_start();
	require_once('../admin/include/autoloader.inc.php');
	$dbh = new Dbh();
	$core = new Core();
	$conn = $dbh->_connectodb();
	if(isset($_POST['Message']))
	{
		$Form = new Form($conn);
		$data = $_POST;
        $response = $Form->InsertContatForm($data);
	}
	else
	{
		$response['error'] = true;
		$response['message'] = "Some Technical Error ! Please Try Again.";
	}
	echo json_encode($response);
?>