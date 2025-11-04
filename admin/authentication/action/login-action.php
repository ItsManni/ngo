<?php 

	@session_start();
	require_once('../../include/autoloader.inc.php');


	$data['email'] = $_POST['email'];


	$data['password'] = $_POST['password'];


	$dbh = new Dbh();


	$conn = $dbh->_connectodb();


	$authentication = new Authentication($conn);


	$response = $authentication->login($data);
	


	echo json_encode($response);


?>