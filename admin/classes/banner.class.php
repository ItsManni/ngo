<?php
class Banner extends Core
{
	private $conn;
	public function __construct($conn)
	{
		$this->conn = $conn;
		$this->setTimeZone();
	}

	function InsertBannerForm($data)
	{
		$BannerUrl = $data['BannerUrl'];
		$Feature = $data['Feature'];

		$CreatedDate = date('Y-m-d');
		$CreatedBy = $data['CreatedBy'];
		$CreatedTime = date('H:i:s');
        $randomNumber = rand(1000, 100000);

		$sql = "INSERT INTO banner(BannerUrl,Feature,CreatedDate,CreatedTime,CreatedBy) VALUES ('$BannerUrl','$Feature','$CreatedDate','$CreatedTime','$CreatedBy')";
		$response_insert_banner_details = $this->_InsertTableRecords($this->conn,$sql);

		if($response_insert_banner_details['error'] == false)
		{
			$last_insert_id = $response_insert_banner_details['last_insert_id'];
			$BannerID = $last_insert_id;
			if (isset($_FILES['Banner']['name'])  && $_FILES['Banner']['name'] != '')
			{
				$extn_pan = explode('.', $_FILES["Banner"]["name"]);
				$Banner   = $randomNumber."-".$BannerID."Banner-Attachment.".$extn_pan[1];
				$path = "../../project-assets/admin-media/banner/".$Banner;
				move_uploaded_file($_FILES["Banner"]["tmp_name"], $path);
				$query = "Banner = '$Banner' WHERE ID = $BannerID";
				$response = $this->_UpdateTableRecords($this->conn,'banner', $query);
			}

			$response_insert_banner_details['error'] = false;
		    $response_insert_banner_details['message'] = "Banner is Successfully Added.";
		}
		else
		{
			$response_insert_banner_details['error'] = true;
		    $response_insert_banner_details['message'] = "Technical Issue, please try later";
		}

		return $response_insert_banner_details;
	}


	function UpdateBannerForm($data)
	{
		$BannerUrl = $data['BannerUrl'];
		$Feature = $data['Feature'];

		$CreatedDate = date('Y-m-d');
		$CreatedBy = $data['CreatedBy'];
		$CreatedTime = date('H:i:s');
		$banner_id = $data['form_id'];

        $randomNumber = rand(1000, 100000);

        $Banner = "";
		if(isset($_FILES['Banner']['name'])  && $_FILES['Banner']['name'] != '')
	    {

			$extn_pan = explode('.', $_FILES["Banner"]["name"]);
			$Banner   = $randomNumber."-".$banner_id."Banner-Attachment.".$extn_pan[1];
			$path = "../../project-assets/admin-media/banner/".$Banner;
			move_uploaded_file($_FILES["Banner"]["tmp_name"], $path);

	    }else{
	    	$Banner = $_POST['old_banner_img'];
	    }



	    // $old_team_details = $this->GetTeamDetailsbyID($team_id);
	    // if($Name == $old_team_details['Name'] && $Designation == $old_team_details['Designation'])
	    // {
	    // 	$response['message'] = "No changes to update";
	    // 	$response['error'] = true;
	    // }
	    // else
	    // {
	    	$update_param = " BannerUrl='$BannerUrl', Feature = '$Feature', Banner = '$Banner' where ID=$banner_id";
	    	$response = $this->_UpdateTableRecords($this->conn,'banner', $update_param);
	    	$response['error'] = false;
			$response['message'] = "Banner Details Updated";

	    // }

	    return $response;
	}

	public function GetAllBanner()
	{
		$where = " where IsActive = 1 ORDER BY ID DESC";
        $banner_details = $this->_getTableRecords($this->conn, "banner", $where);
        return $banner_details;
	}

	public function getTotalBanner($table)
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

	function DeleteBanner($data)
	{
		$BannerId = $data['ID'];
		// Delete course
		$where = " where ID = $BannerId";
		$response = $this->delete_identity_filter($this->conn,"banner",$where);
		return $response;
	}

    function GetBannerDetailsbyID($ID)
	{
		$where = " where ID = $ID";
		$banner_details = $this->_getTableDetails($this->conn,'banner', $where);
		return $banner_details;
	}


}
