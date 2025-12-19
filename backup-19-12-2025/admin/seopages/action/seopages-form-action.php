<?php
	@session_start();
	require_once('../../include/autoloader.inc.php');
	$dbh = new Dbh();
	$core = new Core();
	$conn = $dbh->_connectodb();
	$authentication = new Authentication($conn);
    $authenticated = $authentication->SessionCheck();
	if(isset($_POST['PageName']))
	{
		$SeoPage = new SeoPage($conn);
		$data = $_POST;
		$data['CreatedBy'] = $_SESSION['pp_email'];
		$form_action = $_POST['form_action'];

        if($form_action == "add"){
			$duplicate_seopage_pass = $SeoPage->CheckDuplicateSeoPage($data);
			if($duplicate_seopage_pass)
			{
				$response = $SeoPage->InsertSeoPageForm($data);
			}else
			{
				$response['error'] = true;
				$response['message'] = "Same Url has already been used!";
			}
		}else{
			$response = $SeoPage->UpdateSeoPageForm($data);
		}


	}
	else
	{
		$response['error'] = true;
		$response['message'] = "Some Technical Error ! Please Try Again.";
	}
	echo json_encode($response);
?>
