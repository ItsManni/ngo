<?php 
class CustomCode extends Core
{
	private $conn;
	public function __construct($conn)
	{
		$this->conn = $conn;
		$this->setTimeZone();
	}

	function UpdateCustomCodeForm($data)
	{	
		$HeaderCode = $this->cleantext($data['HeaderCode']);
		$BodyCode = $this->cleantext($data['BodyCode']);
		$CreatedDate = date('Y-m-d');
		$CreatedBy = $data['CreatedBy'];
		$CreatedTime = date('H:i:s');
		$custom_form_id = $data['custom_form_id'];
		

	    $old_code_details = $this->GetCustomCodeDetailsbyID($custom_form_id);
	    if($HeaderCode == $old_code_details['HeaderCode'] && $BodyCode == $old_code_details['BodyCode'])
	    {
	    	$response['message'] = "No changes to update";
	    	$response['error'] = true;
	    }
	    else
	    {
	    	$update_param = " HeaderCode = '$HeaderCode', BodyCode = '$BodyCode', CreatedDate = '$CreatedDate', CreatedTime = '$CreatedTime', CreatedBy='$CreatedBy' where ID=$custom_form_id";
	    	$response = $this->_UpdateTableRecords($this->conn,'custom_code', $update_param);
	    	$response['error'] = false;
			$response['message'] = "Custom Code Updated";
	    	
	    }

	    return $response;
	}

	public function GetAllCustomCode($conn)
	{
		$where = " where IsActive = 1 ORDER BY ID DESC";
        $custom_code_details = $this->_getTableRecords($conn,"custom_code", $where);
        return $custom_code_details;
	}

    function GetCustomCodeDetailsbyID($ID)
	{
		$where = " where ID = $ID";
		$custom_code_details = $this->_getTableDetails($this->conn,'custom_code', $where);
		return $custom_code_details;
	}


}