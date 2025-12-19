<?php 
require_once('../include/autoloader.inc.php');
$encrypt = new Encryption();
$ID = 1;
$message = $encrypt->encrypt_message($ID);
echo $message;
$ID = $encrypt->decrypt_message($message);
echo "<br>".$ID;
?>