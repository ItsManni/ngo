<?php 

class Volunteer extends Core
{
	private $conn;

	public function __construct($conn)
	{
		$this->conn = $conn;
		$this->setTimeZone();
	}

	public function CheckDuplicateVolunteer($email, $mobile)
	{
		$filter = " where Email = '$email' OR Mobile = '$mobile'";
		$num = $this->_getTotalRows($this->conn,'volunteer_details',$filter);
		
		if($num>0)
		{
			return false;
		}
		else
			return true;
	}

	public function getAllActiveVolunteers()
	{
		$filter = " where IsActive = 1 ORDER BY ID DESC";
		$volunteers = $this->_getTableRecords($this->conn,'volunteer_details',$filter);
		return $volunteers;
	}

	function DuplicateVolunteer_pass($data)
	{
		$volunteer_email = $data['UserEmail'];
		$volunteer_phone_number = $data['UserPhoneNumber'];

		if(isset($data['EditFormID']))
		{
			$VolunteerID = $data['EditFormID'];
			$filter = " where (Email = '$volunteer_email' or Mobile = '$volunteer_phone_number') and ID != $VolunteerID";
		}
		else
		{
			$filter = " where Email = '$volunteer_email' or Mobile = '$volunteer_phone_number'";
		}

		$response = $this->check_unique_identity_filter($this->conn,'volunteer_details', $filter);
		return $response;
	}

	function InsertVolunteer($data)
	{
		$volunteer_name = $data['UserName'];
		$volunteer_email = $data['UserEmail'];
		$volunteer_phone_number = $data['UserPhoneNumber'];
		$occupation = $data['UserOccupation'];
		$country = $data['UserCountry'];
		$pincode = $data['UserPincode'];
		$state = $data['UserState'];
		$city = $data['UserCity'];
		$address = $data['UserAddress'];
		$consent = isset($data['UserConsent']) ? 1 : 0;
		$CreatedDate = $data['CreatedDate'];
		$CreatedBy = $data['CreatedBy'];
		$CreatedTime = $data['CreatedTime'];

		$sql = "INSERT INTO volunteer_details(Name,Email,Mobile,Occupation,Country,Pincode,State,City,Address,Consent,CreatedDate,CreatedTime,CreatedBy) VALUES ('$volunteer_name','$volunteer_email','$volunteer_phone_number','$occupation','$country','$pincode','$state','$city','$address','$consent','$CreatedDate','$CreatedTime','$CreatedBy')";

		$response_insert_volunteer = $this->_InsertTableRecords($this->conn,$sql);
		return $response_insert_volunteer;
	}

	function UpdateVolunteer($data)
	{
		$volunteer_name = $data['UserName'];
		$volunteer_email = $data['UserEmail'];
		$volunteer_phone_number = $data['UserPhoneNumber'];
		$occupation = $data['UserOccupation'];
		$country = $data['UserCountry'];
		$pincode = $data['UserPincode'];
		$state = $data['UserState'];
		$city = $data['UserCity'];
		$address = $data['UserAddress'];
		$consent = isset($data['UserConsent']) ? 1 : 0;
		$VolunteerID = $data['EditFormID'];

		$update_volunteer = " Name='$volunteer_name',Email='$volunteer_email',Mobile='$volunteer_phone_number',Occupation='$occupation',Country='$country',Pincode='$pincode',State='$state',City='$city',Address='$address',Consent='$consent' where ID=$VolunteerID";

		$result_update_volunteer = $this->_UpdateTableRecords($this->conn,'volunteer_details',$update_volunteer);
		return $result_update_volunteer;
	}

	function DeleteVolunteer($data)
	{
		$VolunteerID = $data['ID'];
		$sql = " IsActive = 0 where ID = $VolunteerID";
		$response = $this->_UpdateTableRecords($this->conn,"volunteer_details",$sql);
		return $response;
	}

	public function GetVolunteerDetailsByID($ID)
	{
		$where = " where ID = $ID";
        $volunteer_details = $this->_getTableDetails($this->conn, "volunteer_details", $where);
        return $volunteer_details;
	}
}
?>
