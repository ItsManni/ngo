<?php 
class Users extends Core
{
	private $conn;
	public function __construct($conn)
	{
		$this->conn = $conn;
		$this->setTimeZone();
	}

	public function CheckDuplicateUser($email)
	{
		$filter = " where Email = '$email'";
		$num = $this->_getTotalRows($this->conn,'users',$filter);
		if($num>0)
		{
			return false;
		}
		else
			return true;
	}
	public function getAllActiveUsers()
	{
		$filter = " where IsActive = 1 ORDER BY ID DESC";
		$users = $this->_getTableRecords($this->conn,'user_details',$filter);
		return $users;
	}
	public function getAllActiveUsersByCenter($CenterID)
	{
		if($CenterID != -1)
		{
			$filter = " where IsActive = 1 AND CenterID = $CenterID ORDER BY ID DESC";
		}
		else
		{
			$filter = " where IsActive = 1 ORDER BY ID DESC";
		}
		$users = $this->_getTableRecords($this->conn,'user_details',$filter);
		return $users;
	}
	function DuplicateUser_pass($data)
	{
		$user_email = $data['user_email'];
		$user_phone_number = $data['user_phone_number'];
		if(isset($data['EditFormID']))
		{
			$UserID = $data['EditFormID'];
			$filter = " where (Email = '$user_email' or Mobile = '$user_phone_number') and ID != $UserID";
		}
		else
		{
			$filter = " where Email = '$user_email' or Mobile = '$user_phone_number'";
		}
		$response = $this->check_unique_identity_filter($this->conn,'user_details', $filter);
		return $response;
	}
	function InsertUser($data)
	{
		$Center = $data['Center'];
		$user_name = $data['user_name'];
		$user_email = $data['user_email'];
		$user_phone_number = $data['user_phone_number'];
		$password = $data['password'];
		$user_type = $data['user_type'];
		$CreatedDate = $data['CreatedDate'];
		$CreatedBy = $data['CreatedBy'];
		$CreatedTime = $data['CreatedTime'];
		$sql = "INSERT INTO user_details(CenterID,Name,Mobile,Email,UserType,CreatedDate,CreatedBy) VALUES ('$Center','$user_name','$user_phone_number','$user_email','$user_type','$CreatedDate','$CreatedBy')";
		$response_insert_user_details = $this->_InsertTableRecords($this->conn,$sql);
		$UserID = $response_insert_user_details['last_insert_id'];
		if($response_insert_user_details['error'] == false)
		{
			$password_md5 = md5($password);
			$sql = "INSERT INTO users(CenterID,Email,Password,UserType,CreatedDate,CreatedTime) VALUES ($Center,'$user_email','$password_md5','$user_type','$CreatedDate','$CreatedTime')";
			$response_insert_user = $this->_InsertTableRecords($this->conn,$sql);
			
			if(isset($data['course']) && $user_type == "Counsellor")
			{
	            $course_arr = $data['course'];
				if(is_array($course_arr))
				{
					$Course_ID = implode(",",$course_arr);
				}
				else
				{
					$Course_ID = $course_arr;
				}
				$sql = "INSERT INTO course_counsellor(CounsellorID,CourseID,CreatedDate,CreatedTime,CreatedBy) VALUES ('$UserID','$Course_ID','$CreatedDate','$CreatedTime','$CreatedBy')";
				$response_insert_user = $this->_InsertTableRecords($this->conn,$sql);
			}
			if($user_type == "Center Manager")
			{
				$sql_update_center = " Manager = '$UserID' where ID = $Center";
				$update_result = $this->_UpdateTableRecords($this->conn,'branch',$sql_update_center);
			}
			return $response_insert_user;
		}
		else
		{
			return $response_insert_user_details;
		}
	}
	function UpdateUser($data)
	{
		$Center = $data['UserCenter'];
		$user_name = $data['UserName'];
		$user_email = $data['UserEmail'];
		$user_phone_number = $data['UserPhoneNumber'];
		$user_type = $data['UserType'];
		$UserID = $data['EditFormID'];
		$CreatedDate = $data['CreatedDate'];
		$CreatedBy = $data['CreatedBy'];
		$CreatedTime = $data['CreatedTime'];
		$where = " where ID = $UserID";
		$old_user_details = $this->_getTableDetails($this->conn,'user_details',$where);
		$old_user_email = $old_user_details['Email'];

		// Update User Details
		$update_user_details = " CenterID = $Center,Name='$user_name',Mobile='$user_phone_number',Email='$user_email',UserType='$user_type' where ID=$UserID";
		$result_update_user_details = $response = $this->_UpdateTableRecords($this->conn,'user_details',$update_user_details);
		if($result_update_user_details['error'] == false)
		{
			//Update users
			$update_user = " CenterID = $Center,Email='$user_email',UserType='$user_type' where Email='$old_user_email'";
			$result_update_user = $response = $this->_UpdateTableRecords($this->conn,'users',$update_user);

			if($result_update_user['error'] == false)
			{
				if(isset($data['Course']) && $user_type == "Counsellor")
				{
					$course_arr = $data['Course'];
					if(is_array($course_arr))
					{
						$Course_ID = implode(",",$course_arr);
					}
					else
					{
						$Course_ID = $course_arr;
					}
					$where = " where CounsellorID = $UserID";
					$num_rows_course_counsellor = $this->_getTotalRows($this->conn,'course_counsellor',$where);
					if($num_rows_course_counsellor > 0)
					{
						$sql_update_counsellor = " CourseID = '$Course_ID' where CounsellorID = $UserID";
						$response_update_counsellor = $response = $this->_UpdateTableRecords($this->conn,'course_counsellor',$sql_update_counsellor);
					}
					else
					{
						$sql = "INSERT INTO course_counsellor(CounsellorID,CourseID,CreatedDate,CreatedTime,CreatedBy) VALUES ('$UserID','$Course_ID','$CreatedDate','$CreatedTime','$CreatedBy')";
						$response_insert_user = $response = $this->_InsertTableRecords($this->conn,$sql);
					}
				}
			}
		}
		return $response;
		
		
	}

	function DeleteUser($data)
	{
		$UserID = $data['ID'];
		// Delete company
		$where = " where ID = $UserID";
		$user_details = $this->_getTableDetails($this->conn,'user_details',$where);
		$Email = $user_details['Email'];
		$sql = " IsActive = 0 where ID = $UserID";
		$sql_update_user = " IsActive = 0 where Email = '$Email'";
		//$response = $this->delete_identity_filter($this->conn,"user_details",$where);
		$response = $this->_UpdateTableRecords($this->conn,"user_details",$sql);
		$response = $this->_UpdateTableRecords($this->conn,"users",$sql_update_user);
		return $response;
	}

	function ResetPassword($data)
	{
		$UserEmail = $data['rp_user_email'];
		$Password = $data['r_password'];
		$Password_md5 = md5($Password);
		$update_query = " Password = '$Password_md5' where Email = '$UserEmail'";
		$response = $this->_UpdateTableRecords($this->conn,'users',$update_query);
		return $response;
	}

	public function getAllCenterManagerUsers()
	{
		$filter = " where IsActive = 1 and UserType = 'Center Manager' ORDER BY ID DESC";
		$users = $this->_getTableRecords($this->conn,'user_details',$filter);
		return $users;
	}
	public function getAllUsersByCenterID($CenterID)
	{
		$filter = " where IsActive = 1 and CenterID = $CenterID ORDER BY ID DESC";
		$center_users = $this->_getTableRecords($this->conn,'user_details',$filter);
		return $center_users;
	}

	public function getAllCounsellorByCenterID($CenterID)
	{
		if($CenterID == -1){
			$filter = " where IsActive = 1 and (UserType = 'Counsellor' OR UserType='Lead Counsellor' or UserType = 'Center Manager') ORDER BY ID DESC";
		}else{
			$filter = " where IsActive = 1 and CenterID = $CenterID and (UserType = 'Counsellor' OR UserType='Lead Counsellor' or UserType = 'Center Manager') ORDER BY ID DESC";
		}
		$center_users = $this->_getTableRecords($this->conn,'user_details',$filter);
		return $center_users;
	}
	public function getAllTelecallersByCenterID($CenterID)
	{
		if($CenterID == -1){
			$filter = " where IsActive = 1 and (UserType = 'Telecaller') ORDER BY ID DESC";
		}else{
			$filter = " where IsActive = 1 and CenterID = $CenterID and (UserType = 'Telecaller') ORDER BY ID DESC";
		}
		$center_users = $this->_getTableRecords($this->conn,'user_details',$filter);
		return $center_users;
	}
	public function GetUserDetailsByID($ID)
	{
		$where = " where ID = $ID";
        $user_details = $this->_getTableDetails($this->conn, "user_details", $where);
        return $user_details;
	}


}