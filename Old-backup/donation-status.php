<?php
session_start();
require_once('./admin/include/autoloader.inc.php');
$dbh = new Dbh();
$conn = $dbh->_connectodb();
// Razorpay Test Keys
// $key_id = 'rzp_test_BDbK12k0Db9vJJ';
// $key_secret = 'BcuJ52eWKEehKrxe3fqp2s59';
$key_id = 'rzp_live_AfCvnOEiLe5vY7';
$key_secret = 'e3YMoHLBMk2znPu8k7NIhtVY';
// Get Razorpay payment and order IDs
$payment_id = $_GET['payment_id'] ?? '';
$order_id = $_GET['order_id'] ?? '';
$donation_id = $_SESSION['donation_id'] ?? 0;
if (!$payment_id || !$order_id || !$donation_id) {
    echo "❌ Invalid payment or session data.";
    exit;
}

// Verify payment via Razorpay API
$ch = curl_init("https://api.razorpay.com/v1/payments/$payment_id");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_USERPWD, $key_id . ':' . $key_secret);
// curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0); // remove in production
// curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); // remove in production
$response = curl_exec($ch);
$payment = json_decode($response, true);
curl_close($ch);
// Extract payment status
$status = $payment['status'] ?? 'unknown';
$payment_date = date('Y-m-d H:i:s');
// Update donation in DB
$update_param = "
    Payment_ID = '$payment_id',
    Order_ID = '$order_id',
    Status = '$status',
    Payment_Date = '$payment_date'
    WHERE ID = $donation_id
";
$core = new Core();
$response = $core->_UpdateTableRecords($conn, 'donations', $update_param);
// Output result to user
// else {
//     echo "<h4>⚠️ Payment status: <strong>$status</strong></h4>";
//     echo "<p>Your donation details have been saved. You can retry the payment later.</p>";
// }
// if ($response['error']) {
//     echo "<p>⚠️ Failed to update payment info in the database.</p>";
// }
// Fetch donor's email for sending confirmation
$donation_id = $_GET['donation_id'] ?? 0;
$donation_id = intval($donation_id); // Sanitize input

$donationObj = new Payment($conn); // Or your actual class name
$donor = $donationObj->GetDonationDetailsbyID($donation_id);

if ($donor && strtolower($status) === 'captured') {
    $to = $donor['Email'];
    $donor_name = $donor['Name'];
    $subject = 'Thank You for Your Donation!';

    // Email message
    $message = "
    <html>
    <head>
      <title>Thank You for Your Donation</title>
    </head>
    <body>
      <h3>Dear $donor_name,</h3>
      <p>Thank you for your generous donation. Here are your payment details:</p>
      <ul>
        <li><strong>Payment ID:</strong> $payment_id</li>
        <li><strong>Order ID:</strong> $order_id</li>
        <li><strong>Status:</strong> $status</li>
        <li><strong>Date:</strong> $payment_date</li>
      </ul>
      <p>We truly appreciate your support!</p>
      <p>Sincerely,<br>Dayabhawna Foundation</p>
    </body>
    </html>
    ";

    // Headers
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: Dayabhawna Foundation <dayabhawnafoundation@gmail.com>" . "\r\n";

    // Send email
    // if (mail($to, $subject, $message, $headers)) {
    //     echo "✅ Payment confirmed and email sent to $to!";
    // } else {
    //     echo "⚠️ Payment saved, but failed to send email.";
    // }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('include/meta.php') ?>
    <title>Payment Status || Daya Bhavana Foundation</title>
    <?php include('include/link.php') ?>
</head>

<body>
    <!-- Hedaer start -->
    <?php include('include/header.php') ?>
    <!-- Header End -->
    <!-- thank you section -->
    <?php if ($status === 'captured') {
 ?>
    <div class="bg_color_secondary" style=" background: #ffffff;">
        <div class="container-fluid">
            <div class="section-thanks" style="">
                <img src="<?php echo $website_url;?>/assets/images/thankyou.jpg" class="thankyou_img">
                <h2 class="sub-header">Thank You for Your Generous Donation!</h2>
                <div class="conntents">
                    <p class="text_cotr">We’ve received your contribution and are deeply grateful for your support. Your
                        generosity helps us continue our mission and make a meaningful impact.</p>
                </div>
                <a href="<?php echo $website_url;?>/index.php" class="donatetoggle donate_button_style linkbutton">Back
                    to Home</a>
            </div>
        </div>
    </div>
    <?php } else {?>
    <div class="bg_color_secondary" style=" background: #ffffff;">
        <div class="container-fluid">
            <div class="section-thanks" style="">
                <img src="<?php echo $website_url;?>/assets/images/error.png" class="failed_img">
                <h2 class="sub-header">Oops — Something Went Wrong</h2>
                <div class="conntents">
                    <p class="text_cotr">We attempted to process your donation, but unfortunately, the payment did not
                        go through.</p>
                    <p class="text_cotr">
                        We truly appreciate your intent to support our cause and would love for you to try again. If the
                        issue persists, feel free to reach out to us—we’re here to help!</p>
                </div>
                <a href="<?php echo $website_url;?>/index.php" class="donatetoggle donate_button_style linkbutton">Back
                    to Home</a>
            </div>
        </div>
    </div>
    <?php } ?>
    <!-- thank you end -->
    <!-- review start -->
    <?php include('include/testimonial.php') ?>
    <!-- review end -->
    <!-- footer start -->
    <?php include('include/footer.php') ?>
    <!-- footer end -->
    <!-- script start-->
    <?php include('include/script.php') ?>
    <!-- script end-->
</body>

</html>