
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

    $IMSSetting = new IMSSetting($conn);
    $ID = $_POST['ID'];
    $response_data = $IMSSetting->GetWebsiteSocialDetailsbyID($ID);

    $response['error'] = false;
    $response['data'] = $response_data;
}
else
{
    $response['message'] = "Technical Problem. Please try again";
}
echo json_encode($response);
?>
