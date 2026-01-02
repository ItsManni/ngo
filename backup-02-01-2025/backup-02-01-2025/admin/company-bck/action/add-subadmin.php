<?php
	@session_start();
	require_once('../../include/autoloader.inc.php');
	$dbh = new Dbh();
	$core = new Core();
	$conn = $dbh->_connectodb();
	$authentication = new Authentication($conn);
    $authenticated = $authentication->SessionCheck_redirect();
	$users = new Users($conn);
	if($users->CheckDuplicateUser($_POST['partner_admin_email']))
	{
		$partner = new Partner($conn);
		$data = $_POST;
		$data['CreatedBy'] = $_SESSION['pp_email'];
		$response = $partner->InsertPartner($data);
		if($response['error'] == false)
		{
			$m_data = array();
			$m_data['action'] = "Add Partner";
			$m_data['to_address'] = "pgfiry@gmail.com";
			$postdata = json_encode($m_data);
			$core->sendMailRequest($postdata);
			$response['message'] = "Partner Created, an email will be sent to Account Manager to activate the account";
		}
	}
	else
	{
		$response['error'] = true;
		$response['message'] = "Some Technical Error ! Please Try Again.";
	}
	echo json_encode($response);
?>