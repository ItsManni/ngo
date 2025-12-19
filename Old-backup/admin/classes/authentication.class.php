<?php
class Authentication extends Core
{
	private $conn;
	public function __construct($conn)
	{
		$this->conn = $conn;
		$this->setTimeZone();
	}
	public function login($data)
	{
		$response = array();
		$email = $data['email'];
		$password = $data['password'];
		$password_hash = md5($password);
		$filter = " where Email = '$email' and Password = '$password_hash' and IsActive = 1";
		$num_rows = $this->_getTotalRows($this->conn,'users', $filter);
		if($num_rows > 0)
		{
			$row = $this->_getTableDetails($this->conn,'users',$filter);
			$response['UserType'] = $data['UserType'] = $row['UserType'];
			$data['CenterID'] = $row['CenterID'];
			$filter_user_detail = " where Email = '$email'";
			$row_user_detail = $this->_getTableDetails($this->conn,'user_details',$filter_user_detail);
			$data['UserID'] = $row_user_detail['ID'];
			$response['error'] = false;
			$response['message'] = "User authenticated";
			$this->SessionStart($data);
		}
		else
		{
			$response['error'] = true;
			$response['message'] = "Invalid Credentials, Please try again with valid credentials";
		}
		return $response;
	}
	public function SessionStart($data)
	{
		@session_start();
	    $_SESSION['pp_email'] = $data['email'];
	    $_SESSION['pp_UserType'] = $data['UserType'];
	    $_SESSION['CenterID'] = $data['CenterID'];
		$_SESSION['UserID'] = $data['UserID'];
	    setcookie('pp_email',$data['email'],time() + (86400 * 30));
		setcookie('pp_UserType',$data['UserType'],time() + (86400 * 30));
		setcookie('CenterID',$data['CenterID'],time() + (86400 * 30));
		setcookie('UserID',$data['UserID'],time() + (86400 * 30));
	}
	public function SessionCheck()
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
				if(file_exists("../login.php"))
					header('Location: ../');
				else
					header('Location:../../');
				return false;
			}

		}
	}

}
