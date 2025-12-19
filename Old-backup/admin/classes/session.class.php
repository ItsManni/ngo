<?php 
class Session extends Core
{
	private $conn;
	public function __construct($conn)
	{
		$this->conn = $conn;
		$this->setTimeZone();
	}

	public function SessionCheck_redirect()
	{
		@session_start();
		if(isset($_SESSION['pp_UserType']))
		{
			return $_SESSION['pp_UserType'];
		}
		else
		{
			if(isset($_COOKIE['pp_UserType']))
			{
				$_SESSION['pp_email'] = $_COOKIE['pp_email'];
				$_SESSION['pp_UserType'] = $_COOKIE['pp_UserType'];
				return $_SESSION['UserType'];
			}
			else
			{
				if(file_exists("../login"))
					header('Location: ../admin/authentication/login.php');
				else
					header('Location:../../admin/authentication/login.php');
			}
		}
	}
}