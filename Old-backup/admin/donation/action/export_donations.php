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
$all_donations_details = $core->_getTableRecords($conn,'donations', $where);
if ($all_donations_details > 0) {
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
    foreach ($all_donations_details as $DonationData) {

        $output .= '<tr>
                        <td>' . $DonationData["ID"] . '</td>
                        <td>' . $DonationData["Name"] . '</td>
                        <td>' . $DonationData["Email"] . '</td>
                        <td>' . $DonationData["Phone"] . '</td>
                        <td>' . $DonationData["Message"] . '</td>
                        <td>' . $DonationData["CreatedDate"] . '</td>
                        <td>' . $DonationData["CreatedTime"] . '</td>
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
