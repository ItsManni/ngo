<?php
@session_start();
require_once('../../include/autoloader.inc.php');
$dbh = new Dbh();
$conn = $dbh->_connectodb();
$authentication = new Authentication($conn);
$authenticated = $authentication->SessionCheck();

$response = array();
$response['error'] = true;
if(isset($_POST))
{
    $NewsPR = new NewsPR($conn);
    $data = $_POST;
    $response_data = $NewsPR->DeleteNewsPR($data);
    if($response_data == true)
    {
        $response['error']  = false;
        $response['message']  = "News has been Deleted!";
    }else{
        $response['message'] = "Some Technical Error ! Please Try Again";
    }

}
else
{
    $response['message'] = "Technical Problem. Please try again";
}
echo json_encode($response);
?>
