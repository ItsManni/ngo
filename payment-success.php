<?php
session_start();
require_once('./admin/include/autoloader.inc.php');

// Razorpay Test Keys
$key_id = 'rzp_test_BDbK12k0Db9vJJ';
$key_secret = 'BcuJ52eWKEehKrxe3fqp2s59';

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
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0); // remove in production
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); // remove in production

$response = curl_exec($ch);
$payment = json_decode($response, true);
curl_close($ch);

// Extract payment status
$status = $payment['status'] ?? 'unknown';
$payment_date = date('Y-m-d H:i:s');

// Update donation in DB
$dbh = new Dbh();
$conn = $dbh->_connectodb();

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
if ($status === 'captured') {
    echo "<h3>✅ Thank you! Your donation was successful.</h3>";
} else {
    echo "<h4>⚠️ Payment status: <strong>$status</strong></h4>";
    echo "<p>Your donation details have been saved. You can retry the payment later.</p>";
}

if ($response['error']) {
    echo "<p>⚠️ Failed to update payment info in the database.</p>";
}
?>

