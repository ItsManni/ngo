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
		$StaticPage = new StaticPage($conn);
		$data = $_POST;
		$data['CreatedBy'] = $_SESSION['pp_email'];
		$form_action = $_POST['form_action'];
		
        if($form_action == "add"){
			$duplicate_staticpage_pass = $StaticPage->CheckDuplicateStaticPage($data);
			if($duplicate_staticpage_pass)
			{
				$response = $StaticPage->InsertStaticPageForm($data);
			}else
			{
				$response['error'] = true;
				$response['message'] = "Same Url has already been used!";
			}
		}else{
			$response = $StaticPage->UpdateStaticPageForm($data);
		}
	        

	}
	else
	{
		$response['error'] = true;
		$response['message'] = "Some Technical Error ! Please Try Again.";
	}
	echo json_encode($response);
?>