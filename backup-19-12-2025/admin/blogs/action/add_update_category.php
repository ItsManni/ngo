<?php
	@session_start();
	require_once('../../include/autoloader.inc.php');
	// this file will give client connection object $conn $_SESSION['dwd_OrgID'] must be set
	$dbh = new Dbh();
	$core = new Core();
	$conn = $dbh->_connectodb();
	$core->setTimeZone();
	if(isset($_POST['Category']))
	{
		$form_action = $_POST['category_form_action'];
		$data = $_POST;
		$data['CreatedDate'] = date("Y-m-d");
		$data['CreatedTime'] = date("H:i:s");
		$data['CreatedBy'] = $_SESSION['pp_email'];
		$Blog = new Blog($conn);

        $duplicate_category_pass = $Blog->CheckDuplicateBlogCategory($data);
        if($duplicate_category_pass)
        {
            if($form_action == "add"){
                $response = $Blog->InsertCategoryForm($data);
            }else{
                $response = $Blog->UpdateCategoryForm($data);
            }
        }
        else{
            $response['error'] = true;
            $response['message'] = "Same Url has already been used!";
        }




	}
	else
	{
		$response['error'] = true;
		$response['message'] = "Some Technical Error ! Please Try Again.";
	}
	echo json_encode($response);
?>
