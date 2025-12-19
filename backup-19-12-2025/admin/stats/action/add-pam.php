<?php
	@session_start();
	require_once('../../include/autoloader.inc.php');
	$dbh = new Dbh();
	$core = new Core();
	$conn = $dbh->_connectodb();
	$authentication = new Authentication($conn);
    $authenticated = $authentication->SessionCheck_redirect();
	$users = new Users($conn);
	if($users->CheckDuplicateUser($_POST['pam_email']))
	{
		$pam = new Partner($conn);
		$data = $_POST;
		$data['CreatedBy'] = $_SESSION['pp_email'];
		$response = $pam->InsertPartner($data);
		if($response['error'] == false)
		{
			$m_data = array();
			$m_data['action'] = "Add PAM";
			$m_data['to_address'] = "pgfiry@gmail.com";
			$postdata = json_encode($m_data);
			$core->sendMailRequest($postdata);
			$response['message'] = "Partner Account Manager Created, an email will be sent to Account Manager to activate the account";
		}
	}
	else
	{
		$response['error'] = true;
		$response['message'] = "User with same email is already registered";
	}
	echo json_encode($response);
?>