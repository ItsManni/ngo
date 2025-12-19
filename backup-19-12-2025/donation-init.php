<?php

session_start();

require_once('./admin/include/autoloader.inc.php');

// Razorpay keys

$key_id = 'rzp_live_AfCvnOEiLe5vY7';

$key_secret = 'e3YMoHLBMk2znPu8k7NIhtVY';

// Get form data

$name     = $_POST['name'] ?? '';

$email    = $_POST['email'] ?? 'dayabhawnafoundation@gmail.com';

$phone    = $_POST['phone'] ?? '';

$amount   = $_POST['amount'] ?? 0;

$donation = $_POST['donation'] ?? '';

$message  = $_POST['message'] ?? '';



if (!$amount || !is_numeric($amount)) {

    echo json_encode(['status' => 'error', 'message' => 'Invalid amount']);

    exit;

}



$dbh = new Dbh();

$conn = $dbh->_connectodb();

$conn->set_charset("utf8mb4");





$createdDate = date('Y-m-d');

$createdTime = date('H:i:s');



$sql = "INSERT INTO donations (Name, Email, Phone, DonationType, Message, CreatedDate, CreatedTime, Amount, Status, IsActive)

        VALUES (?, ?, ?, ?, ?, ?, ?, ?, 'pending', 1)";



$stmt = $conn->prepare($sql);

$stmt->bind_param("sssssssd", $name, $email, $phone, $donation, $message, $createdDate, $createdTime, $amount);

$stmt->execute();



$donation_id = $stmt->insert_id;

$stmt->close();



// Save in session

$_SESSION['donation_id'] = $donation_id;

// Create Razorpay order

$amount_in_paise = (int)($amount * 100);

$orderData = [

  'receipt' => "donation_$donation_id",

  'amount' => $amount_in_paise,

  'currency' => 'INR',

  'payment_capture' => 1

];

$ch = curl_init('https://api.razorpay.com/v1/orders');

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

curl_setopt($ch, CURLOPT_USERPWD, $key_id . ':' . $key_secret);

curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($orderData));

curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);

// curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0); // for localhost

// curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); // for localhost

$response = curl_exec($ch);

$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

$curl_error = curl_error($ch);

curl_close($ch);

$order = json_decode($response, true);

if ($http_code === 200 && isset($order['id'])) {

  echo json_encode([

    'status' => 'success',

    'order_id' => $order['id'],

    'amount' => $order['amount'],

    'key' => $key_id

  ]);

} else {

  echo json_encode([

    'status' => 'error',

    'message' => 'Could not create Razorpay order',

    'curl_error' => $curl_error,

    'response' => $response

  ]);

}

