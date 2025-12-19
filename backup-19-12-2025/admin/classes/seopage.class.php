<?php
class SeoPage extends Core
{
	private $conn;
	public function __construct($conn)
	{
		$this->conn = $conn;
		$this->setTimeZone();
	}
	function CheckDuplicateSeoPage($data)
	{
		$Url = $data['Url'];
		if(isset($data['form_id']))
		{
			$ID = $data['form_id'];
			$filter = " where (Url = '$Url') and ID != $ID";
		}
		else
		{
			$filter = " where Url = '$Url'";
		}
		$response = $this->check_unique_identity_filter($this->conn,'seopages', $filter);
		return $response;
	}

	function InsertSeoPageForm($data)
	{
		$PageName = $this->cleantext($data['PageName']);
        $Url = $data['Url'];
        $MetaTitle = $this->cleantext($data['MetaTitle']);
        $MetaDescription = $this->cleantext($data['MetaDescription']);
        $MetaKeywords = $this->cleantext($data['MetaKeywords']);
		$OGTitle = $this->cleantext($data['OGTitle']);
        $OGDescription = $this->cleantext($data['OGDescription']);

		$CreatedDate = date('Y-m-d');
		$CreatedBy = $data['CreatedBy'];
		$CreatedTime = date('H:i:s');
        $randomNumber = rand(1000, 100000);

		$sql = "INSERT INTO seopages(PageName,Url,MetaTitle,MetaDescription,MetaKeywords,OGTitle,OGDescription,CreatedDate,CreatedTime,CreatedBy) VALUES ('$PageName','$Url','$MetaTitle','$MetaDescription','$MetaKeywords','$OGTitle','$OGDescription','$CreatedDate','$CreatedTime','$CreatedBy')";
		$response_insert_seopages_details = $this->_InsertTableRecords($this->conn,$sql);

		if($response_insert_seopages_details['error'] == false)
		{
			$last_insert_id = $response_insert_seopages_details['last_insert_id'];
			$PageID = $last_insert_id;
			if (isset($_FILES['OGImage']['name'])  && $_FILES['OGImage']['name'] != '')
			{
				$extn_pan = explode('.', $_FILES["OGImage"]["name"]);
				$OGImage   = $randomNumber."-".$PageID."OGImage-Attachment.".$extn_pan[1];
				$path = "../../project-assets/admin-media/seopage/".$OGImage;
				move_uploaded_file($_FILES["OGImage"]["tmp_name"], $path);
				$query = "OGImage = '$OGImage' WHERE ID = $PageID";
				$response = $this->_UpdateTableRecords($this->conn,'seopages', $query);
			}


			$response_insert_seopages_details['error'] = false;
		    $response_insert_seopages_details['message'] = "Page is Successfully Added.";
		}
		else
		{
			$response_insert_seopages_details['error'] = true;
		    $response_insert_seopages_details['message'] = "Technical Issue, please try later";
		}
		return $response_insert_seopages_details;
	}


	function UpdateSeoPageForm($data)
	{
		$PageName = $this->cleantext($data['PageName']);
        $Url = $data['Url'];
        $MetaTitle = $this->cleantext($data['MetaTitle']);
        $MetaDescription = $this->cleantext($data['MetaDescription']);
        $MetaKeywords = $this->cleantext($data['MetaKeywords']);
		$OGTitle = $this->cleantext($data['OGTitle']);
        $OGDescription = $this->cleantext($data['OGDescription']);

		$CreatedDate = date('Y-m-d');
		$CreatedBy = $data['CreatedBy'];
		$CreatedTime = date('H:i:s');
		$page_id = $data['form_id'];
        $randomNumber = rand(1000, 100000);


		$OGImage = "";
		if(isset($_FILES['OGImage']['name'])  && $_FILES['OGImage']['name'] != '')
	    {

			$extn_pan = explode('.', $_FILES["OGImage"]["name"]);
			$OGImage   = $randomNumber."-".$page_id."OGImage-Attachment.".$extn_pan[1];
			$path = "../../project-assets/admin-media/seopage/".$OGImage;
			move_uploaded_file($_FILES["OGImage"]["tmp_name"], $path);

	    }else{
	    	$OGImage = $_POST['old_og_image'];
	    }


	    // $old_event_details = $this->GetEventDetailsbyID($event_id);
	    // if($EventName == $old_event_details['EventName'] && $Url == $old_event_details['Url'] && $EventDate == $old_event_details['EventDate'] && $EventTime == $old_event_details['EventTime'] && $EventDescription == $old_event_details['UEventDescriptionrl'])
	    // {
	    // 	$response['message'] = "No changes to update";
	    // 	$response['error'] = true;
	    // }
	    // else
	    // {
	    	$update_param = " PageName = '$PageName', Url = '$Url', MetaTitle = '$MetaTitle', MetaDescription = '$MetaDescription', MetaKeywords = '$MetaKeywords', OGTitle='$OGTitle', OGDescription='$OGDescription', OGImage = '$OGImage'  where ID=$page_id";
	    	$response = $this->_UpdateTableRecords($this->conn,'seopages', $update_param);
	    	$response['error'] = false;
			$response['message'] = "Page Updated";

	    // }

	    return $response;
	}

	public function GetAllSeoPage($conn)
	{
		$where = " where IsActive = 1 ORDER BY ID DESC";
        $all_seopages = $this->_getTableRecords($conn, "seopages", $where);
        return $all_seopages;
	}

	public function getTotalSeoPage($table)
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

	function DeleteSeoPage($data)
	{
		$PageID = $data['ID'];
		// Delete course
		$where = " where ID = $PageID";
		$response = $this->delete_identity_filter($this->conn,"seopages",$where);
		return $response;
	}

    function GetSeoPageDetailsbyID($ID)
	{
		$where = " where ID = $ID";
		$seopages_details = $this->_getTableDetails($this->conn,'seopages', $where);
		return $seopages_details;
	}

	function GetSeoDetailsbyUrl($url)
	{
		$where = " where Url = '$url'";
		$seopages_details = $this->_getTableDetails($this->conn,'seopages', $where);
		return $seopages_details;
	}



}
