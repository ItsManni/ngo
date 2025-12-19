<?php
class Team extends Core
{
	private $conn;
	public function __construct($conn)
	{
		$this->conn = $conn;
		$this->setTimeZone();
	}

	function InsertTeamForm($data)
	{
		$Name = $this->cleantext($data['Name']);
        $Designation = $this->cleantext($data['Designation']);


		$CreatedDate = date('Y-m-d');
		$CreatedBy = $data['CreatedBy'];
		$CreatedTime = date('H:i:s');

		$sql = "INSERT INTO teams(Name,Designation,CreatedDate,CreatedTime,CreatedBy) VALUES ('$Name','$Designation','$CreatedDate','$CreatedTime','$CreatedBy')";
		$response_insert_team_details = $this->_InsertTableRecords($this->conn,$sql);

		if($response_insert_team_details['error'] == false)
		{

			$last_insert_id = $response_insert_team_details['last_insert_id'];
			$TeamID = $last_insert_id;
			if (isset($_FILES['ProfileImg']['name'])  && $_FILES['ProfileImg']['name'] != '')
			{
				$extn_pan = explode('.', $_FILES["ProfileImg"]["name"]);
				$ProfileImg   = $CreatedDate."-".$TeamID."ProfileImg-Attachment.".$extn_pan[1];
				$path = "../../project-assets/admin-media/profileimg/".$ProfileImg;
				move_uploaded_file($_FILES["ProfileImg"]["tmp_name"], $path);
				$query = "ProfileImg = '$ProfileImg' WHERE ID = $TeamID";
				$response = $this->_UpdateTableRecords($this->conn,'teams', $query);
			}

			$response_insert_team_details['error'] = false;
		    $response_insert_team_details['message'] = "Team Member is Successfully Added.";
		}
		else
		{
			$response_insert_team_details['error'] = true;
		    $response_insert_team_details['message'] = "Technical Issue, please try later";
		}
		return $response_insert_team_details;
	}


	function UpdateTeamForm($data)
	{
		$Name = $this->cleantext($data['Name']);
        $Designation = $this->cleantext($data['Designation']);

		$CreatedDate = date('Y-m-d');
		$CreatedBy = $data['CreatedBy'];
		$CreatedTime = date('H:i:s');
		$team_id = $data['form_id'];

		$ProfileImg = "";
		if(isset($_FILES['ProfileImg']['name'])  && $_FILES['ProfileImg']['name'] != '')
	    {

			$extn_pan = explode('.', $_FILES["ProfileImg"]["name"]);
			$ProfileImg   = $CreatedDate."-".$team_id."ProfileImg-Attachment.".$extn_pan[1];
			$path = "../../project-assets/admin-media/profileimg/".$ProfileImg;
			move_uploaded_file($_FILES["ProfileImg"]["tmp_name"], $path);

	    }else{
	    	$ProfileImg = $_POST['old_profile_img'];
	    }



	    // $old_team_details = $this->GetTeamDetailsbyID($team_id);
	    // if($Name == $old_team_details['Name'] && $Designation == $old_team_details['Designation'])
	    // {
	    // 	$response['message'] = "No changes to update";
	    // 	$response['error'] = true;
	    // }
	    // else
	    // {
	    	$update_param = " Name = '$Name', Designation = '$Designation', ProfileImg = '$ProfileImg' where ID=$team_id";
	    	$response = $this->_UpdateTableRecords($this->conn,'teams', $update_param);
	    	$response['error'] = false;
			$response['message'] = "Team Member Details Updated";

	    // }

	    return $response;
	}

	public function GetAllTeam($conn)
	{
		$where = " where IsActive = 1 ORDER BY ID DESC";
        $team_details = $this->_getTableRecords($conn, "teams", $where);
        return $team_details;
	}

	public function getTotalTeam($table)
	{
		$sql = "Select COUNT(*) as total_enquiries from $table where IsActive = 1";
		$result=mysqli_query($this->conn,$sql);
		if($result->num_rows>0)
		{
			$row = $result->fetch_assoc();
			return $row['total_enquiries'];
		}
		else
		{
			return 0;
		}
	}

	function DeleteTeam($data)
	{
		$TeamID = $data['ID'];
		// Delete course
		$where = " where ID = $TeamID";
		$response = $this->delete_identity_filter($this->conn,"teams",$where);
		return $response;
	}

    function GetTeamDetailsbyID($ID)
	{
		$where = " where ID = $ID";
		$team_details = $this->_getTableDetails($this->conn,'teams', $where);
		return $team_details;
	}


}
