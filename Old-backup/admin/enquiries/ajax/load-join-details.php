<?php
@session_start();
require_once('../../include/autoloader.inc.php');
$dbh = new Dbh();
$conn = $dbh->_connectodb();
$enquiries_id = $_POST['enquiries_id'];
$Enquiries = new Enquiries($conn);
$enquiries_details = $Enquiries->GetJoinEnquiriesDetailsbyID($enquiries_id);

?>
<div class="row">
    <div class="col-12 col-md-12 mb-3">
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <th>Name</th>
                    <td><?php echo $enquiries_details['Name'];?></td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td><?php echo $enquiries_details['Email'];?></td>
                </tr>
                <tr>
                    <th>Phone Number</th>
                    <td><?php echo $enquiries_details['PhoneNumber'];?></td>
                </tr>
                
                <tr>
                    <th>Message</th>
                    <td><?php echo $enquiries_details['Message'];?></td>
                </tr>
                <tr>
                    <th>Date </th>
                    <td><?php echo $enquiries_details['CreatedDate'];?></td>
                </tr>
                <tr>
                    <th>Time</th>
                    <td><?php echo $enquiries_details['CreatedTime'];?></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
