<?php
	if(!isset($_SESSION['pb_username']))
	{
		session_start();
	}
	session_destroy();
	if(isset($_COOKIE['pp_UserType']))
	{
		unset($_COOKIE['pp_UserType']);
		unset($_COOKIE['pp_email']);
		setcookie('pp_UserType',"", -1, '/');
		setcookie('pp_email',"", -1, '/');  
	}
	header('Location: login');
	?>
?>