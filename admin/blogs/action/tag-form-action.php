<?php
	@session_start();
	require_once('../../include/autoloader.inc.php');
	$dbh = new Dbh();
	$core = new Core();
	$conn = $dbh->_connectodb();
	$authentication = new Authentication($conn);
    $authenticated = $authentication->SessionCheck();
	if(isset($_POST['BlogName']))
	{
		$Blog = new Blog($conn);
		$data = $_POST;
		$data['CreatedBy'] = $_SESSION['pp_email'];
		$form_action = $_POST['form_action'];
		
        // if($form_action == "add"){
			
            $response = $Blog->InsertBlogTagForm($data);
        
		// }else{
		// 	$response = $Blog->UpdateBlogForm($data);
		// }
	        

	}
	else
	{
		$response['error'] = true;
		$response['message'] = "Some Technical Error ! Please Try Again.";
	}
	echo json_encode($response);
?>