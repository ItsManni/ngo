<?php
class Events extends Core
{
	private $conn;
	public function __construct($conn)
	{
		$this->conn = $conn;
		$this->setTimeZone();
	}
	function CheckDuplicateEvent($data)
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
		$response = $this->check_unique_identity_filter($this->conn,'events', $filter);
		return $response;
	}

	function InsertEventForm($data)
	{
		$EventName = $this->cleantext($data['EventName']);
        $Url = $data['Url'];
        $EventStartDate = $this->cleantext($data['EventStartDate']);
        $EventEndDate = $this->cleantext($data['EventEndDate']);
        $EventDescription = $this->cleantext($data['EventDescription']);
        $EventBooth = $this->cleantext($data['EventBooth']);

		$CreatedDate = date('Y-m-d');
		$CreatedBy = $data['CreatedBy'];
		$CreatedTime = date('H:i:s');

		$sql = "INSERT INTO events(EventName,Url,EventStartDate,EventEndDate,EventBooth,EventDescription,CreatedDate,CreatedTime,CreatedBy) VALUES ('$EventName','$Url','$EventStartDate','$EventEndDate','$EventBooth','$EventDescription','$CreatedDate','$CreatedTime','$CreatedBy')";
		$response_insert_event_details = $this->_InsertTableRecords($this->conn,$sql);

		if($response_insert_event_details['error'] == false)
		{
			$last_insert_id = $response_insert_event_details['last_insert_id'];
			$EventID = $last_insert_id;
			if (isset($_FILES['EventImg']['name'])  && $_FILES['EventImg']['name'] != '')
			{
				$extn_pan = explode('.', $_FILES["EventImg"]["name"]);
				$EventImg   = $CreatedDate."-".$EventID."EventImg-Attachment.".$extn_pan[1];
				$path = "../../project-assets/admin-media/eventimg/".$EventImg;
				move_uploaded_file($_FILES["EventImg"]["tmp_name"], $path);
				$query = "EventImg = '$EventImg' WHERE ID = $EventID";
				$response = $this->_UpdateTableRecords($this->conn,'events', $query);
			}

			$response_insert_event_details['error'] = false;
		    $response_insert_event_details['message'] = "Event is Successfully Added.";
		}
		else
		{
			$response_insert_event_details['error'] = true;
		    $response_insert_event_details['message'] = "Technical Issue, please try later";
		}
		return $response_insert_event_details;
	}


	function UpdateEventForm($data)
	{
		$EventName = $this->cleantext($data['EventName']);
        $Url = $data['Url'];
        $EventStartDate = $this->cleantext($data['EventStartDate']);
        $EventEndDate = $this->cleantext($data['EventEndDate']);
        $EventDescription = $this->cleantext($data['EventDescription']);
        $EventBooth = $this->cleantext($data['EventBooth']);

		$CreatedDate = date('Y-m-d');
		$CreatedBy = $data['CreatedBy'];
		$CreatedTime = date('H:i:s');
		$event_id = $data['form_id'];


		$EventImg = "";
		if(isset($_FILES['EventImg']['name'])  && $_FILES['EventImg']['name'] != '')
	    {

			$extn_pan = explode('.', $_FILES["EventImg"]["name"]);
			$EventImg   = $CreatedDate."-".$event_id."EventImg-Attachment.".$extn_pan[1];
			$path = "../../project-assets/admin-media/eventimg/".$EventImg;
			move_uploaded_file($_FILES["EventImg"]["tmp_name"], $path);

	    }else{
	    	$EventImg = $_POST['old_event_img'];
	    }


	    // $old_event_details = $this->GetEventDetailsbyID($event_id);
	    // if($EventName == $old_event_details['EventName'] && $Url == $old_event_details['Url'] && $EventDate == $old_event_details['EventDate'] && $EventTime == $old_event_details['EventTime'] && $EventDescription == $old_event_details['UEventDescriptionrl'])
	    // {
	    // 	$response['message'] = "No changes to update";
	    // 	$response['error'] = true;
	    // }
	    // else
	    // {
	    	$update_param = " EventName = '$EventName', Url = '$Url',EventStartDate = '$EventStartDate', EventEndDate = '$EventEndDate', EventBooth = '$EventBooth', EventDescription = '$EventDescription', EventImg='$EventImg' where ID=$event_id";
	    	$response = $this->_UpdateTableRecords($this->conn,'events', $update_param);
	    	$response['error'] = false;
			$response['message'] = "Event Updated";

	    // }

	    return $response;
	}

	public function GetAllEvent($conn)
	{
		$where = " where IsActive = 1 ORDER BY ID DESC";
        $branch_details = $this->_getTableRecords($conn, "events", $where);
        return $branch_details;
	}

	public function getTotalEvent($table)
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

	function DeleteEvent($data)
	{
		$EventID = $data['ID'];
		// Delete course
		$where = " where ID = $EventID";
		$response = $this->delete_identity_filter($this->conn,"events",$where);
		return $response;
	}

    function GetEventDetailsbyID($ID)
	{
		$where = " where ID = $ID";
		$event_details = $this->_getTableDetails($this->conn,'events', $where);
		return $event_details;
	}

    function GetAllEventsWithLimit($page = 1, $limit = 6) {
        $offset = ($page - 1) * $limit;

        $where = "WHERE IsActive = 1 ORDER BY ID DESC LIMIT $limit OFFSET $offset";

        $branch_details = $this->_getTableRecords($this->conn, "events", $where);
        return $branch_details;
    }

}
