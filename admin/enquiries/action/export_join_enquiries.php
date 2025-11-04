<?php
@session_start();
require_once('../../include/autoloader.inc.php');
$dbh = new Dbh();
$conn = $dbh->_connectodb();
$core = new Core();
$authentication = new Authentication($conn);
$UserType = $authentication->SessionCheck();

$output ="";


$where = " where IsActive = 1";
$all_join_us_details = $core->_getTableRecords($conn,'join_us', $where);
if ($all_join_us_details > 0) {
    $output .= '
   <table class="table" border="1">
                    <tr>
                         <th>ID</th>
                         <th>Name</th>
                         <th>Email</th>
                         <th>Phone Number</th>
                         <th>Message</th>
                         <th>Created Date</th>
                         <th>Created Time</th>
                    </tr>
  ';
    foreach ($all_join_us_details as $JoinUsData) {

        $output .= '<tr>
                        <td>' . $JoinUsData["ID"] . '</td>
                        <td>' . $JoinUsData["Name"] . '</td>
                        <td>' . $JoinUsData["Email"] . '</td>
                        <td>' . $JoinUsData["PhoneNumber"] . '</td>
                        <td>' . $JoinUsData["Message"] . '</td>
                        <td>' . $JoinUsData["CreatedDate"] . '</td>
                        <td>' . $JoinUsData["CreatedTime"] . '</td>
                    </tr>
   ';
    }

} else {
    $output = "<table><tr><td>No Data Available</td></tr></table>";
}
echo $output;
$myfile = fopen("../export.xls", "w");
fwrite($myfile, $output);
fclose($myfile);
?>
