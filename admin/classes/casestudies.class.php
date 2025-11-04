<?php
class CaseStudies extends Core
{
	private $conn;
	public function __construct($conn)
	{
		$this->conn = $conn;
		$this->setTimeZone();
	}

	function InsertCaseStudiesForm($data)
	{
		$Heading = $this->cleantext($data['Heading']);
        $Url = $data['Url'];
        $CaseDate =  $this->cleantext($data['CaseDate']);
        $CaseDescription = $this->cleantext($data['CaseDescription']);
        $CaseContent = $this->cleantext($data['CaseContent']);
        $Status = $data['Status'];

		$CreatedDate = date('Y-m-d');
		$CreatedBy = $data['CreatedBy'];
		$CreatedTime = date('H:i:s');

		$sql = "INSERT INTO casestudies(Heading,Url,CaseDate,CaseDescription,CaseContent,Status,CreatedDate,CreatedTime,CreatedBy) VALUES ('$Heading','$Url','$CaseDate','$CaseDescription','$CaseContent','$Status','$CreatedDate','$CreatedTime','$CreatedBy')";
		$response_insert_event_details = $this->_InsertTableRecords($this->conn,$sql);

		if($response_insert_event_details['error'] == false)
		{
			$last_insert_id = $response_insert_event_details['last_insert_id'];
			$EventID = $last_insert_id;
			if (isset($_FILES['CSBanner']['name'])  && $_FILES['CSBanner']['name'] != '')
			{
				$extn_pan = explode('.', $_FILES["CSBanner"]["name"]);
				$CSBanner   = $CreatedDate."-".$EventID."CSBanner-Attachment.".$extn_pan[1];
				$path = "../../project-assets/admin-media/casestudies/".$CSBanner;
				move_uploaded_file($_FILES["CSBanner"]["tmp_name"], $path);
				$query = "CSBanner = '$CSBanner' WHERE ID = $EventID";
				$response = $this->_UpdateTableRecords($this->conn,'casestudies', $query);
			}

			$response_insert_event_details['error'] = false;
		    $response_insert_event_details['message'] = "Case Studies is Successfully Added.";
		}
		else
		{
			$response_insert_event_details['error'] = true;
		    $response_insert_event_details['message'] = "Technical Issue, please try later";
		}
		return $response_insert_event_details;
	}


	function UpdateCaseStudiesForm($data)
	{
		$Heading = $this->cleantext($data['Heading']);
        $Url = $data['Url'];
        $CaseDate =  $this->cleantext($data['CaseDate']);
        $CaseDescription = $this->cleantext($data['CaseDescription']);
        $CaseContent = $this->cleantext($data['CaseContent']);
        $Status = $this->cleantext($data['Status']);

		$CreatedDate = date('Y-m-d');
		$CreatedBy = $data['CreatedBy'];
		$CreatedTime = date('H:i:s');
		$case_id = $data['form_id'];


		$CSBanner = "";
		if(isset($_FILES['CSBanner']['name'])  && $_FILES['CSBanner']['name'] != '')
	    {

			$extn_pan = explode('.', $_FILES["CSBanner"]["name"]);
			$CSBanner   = $CreatedDate."-".$case_id."CSBanner-Attachment.".$extn_pan[1];
			$path = "../../project-assets/admin-media/casestudies/".$CSBanner;
			move_uploaded_file($_FILES["CSBanner"]["tmp_name"], $path);

	    }else{
	    	$CSBanner = $_POST['old_cs_img'];
	    }


	    // $old_event_details = $this->GetEventDetailsbyID($event_id);
	    // if($EventName == $old_event_details['EventName'] && $Url == $old_event_details['Url'] && $EventDate == $old_event_details['EventDate'] && $EventTime == $old_event_details['EventTime'] && $EventDescription == $old_event_details['UEventDescriptionrl'])
	    // {
	    // 	$response['message'] = "No changes to update";
	    // 	$response['error'] = true;
	    // }
	    // else
	    // {
	    	$update_param = " Heading = '$Heading', Url = '$Url',CaseDate = '$CaseDate', CaseDescription = '$CaseDescription', CaseContent = '$CaseContent', Status = '$Status', CSBanner='$CSBanner' where ID=$case_id";
	    	$response = $this->_UpdateTableRecords($this->conn,'casestudies', $update_param);
	    	$response['error'] = false;
			$response['message'] = "Case Studies Updated";

	    // }

	    return $response;
	}

	public function GetAllCaseStudies($conn)
	{
		$where = " where IsActive = 1 ORDER BY ID DESC";
        $case_studies_details = $this->_getTableRecords($conn, "casestudies", $where);
        return $case_studies_details;
	}

	public function getTotalCaseStudies($table)
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

	function DeleteCaseStudies($data)
	{
		$EventID = $data['ID'];
		// Delete case studies
		$where = " where ID = $EventID";
		$response = $this->delete_identity_filter($this->conn,"casestudies",$where);
		return $response;
	}

    function GetCaseStudiesDetailsbyID($ID)
	{
		$where = " where ID = $ID";
		$case_studies_details = $this->_getTableDetails($this->conn,'casestudies', $where);
		return $case_studies_details;
	}

    function GetAllCaseStudiesWithLimit($page = 1, $limit = 6) {
        $offset = ($page - 1) * $limit;

        $where = "WHERE IsActive = 1 and Status = 'Published' ORDER BY ID DESC LIMIT $limit OFFSET $offset";

        $branch_details = $this->_getTableRecords($this->conn, "casestudies", $where);
        return $branch_details;
    }
    function GetCaseStudiesDetailsbyURL($url)
	{
		$where = " where URL = '$url'";
		$blog_details = $this->_getTableDetails($this->conn,'casestudies', $where);
		return $blog_details;
	}

}
