<?php
class Client extends Core
{
	private $conn;
	public function __construct($conn)
	{
		$this->conn = $conn;
		$this->setTimeZone();
	}

	function InsertClientForm($data)
	{
		$ClientUrl = $data['ClientUrl'];
		$OtherUrl = $data['OtherUrl'];
		$Feature = $data['Feature'];

		$CreatedDate = date('Y-m-d');
		$CreatedBy = $data['CreatedBy'];
		$CreatedTime = date('H:i:s');
        $randomNumber = rand(1000, 100000);

		$sql = "INSERT INTO client(ClientUrl,OtherUrl,Feature,CreatedDate,CreatedTime,CreatedBy) VALUES ('$ClientUrl', '$OtherUrl','$Feature','$CreatedDate','$CreatedTime','$CreatedBy')";
		$response_insert_client_details = $this->_InsertTableRecords($this->conn,$sql);

		if($response_insert_client_details['error'] == false)
		{
			$last_insert_id = $response_insert_client_details['last_insert_id'];
			$ClientID = $last_insert_id;
			if (isset($_FILES['Client']['name'])  && $_FILES['Client']['name'] != '')
			{
				$extn_pan = explode('.', $_FILES["Client"]["name"]);
				$Client   = $randomNumber."-".$ClientID."Client-Attachment.".$extn_pan[1];
				$path = "../../project-assets/admin-media/client/".$Client;
				move_uploaded_file($_FILES["Client"]["tmp_name"], $path);
				$query = "Client = '$Client' WHERE ID = $ClientID";
				$response = $this->_UpdateTableRecords($this->conn,'client', $query);
			}

			$response_insert_client_details['error'] = false;
		    $response_insert_client_details['message'] = "Client Logo is Successfully Added.";
		}
		else
		{
			$response_insert_client_details['error'] = true;
		    $response_insert_client_details['message'] = "Technical Issue, please try later";
		}

		return $response_insert_client_details;
	}


	function UpdateClientForm($data)
	{
		$ClientUrl = $data['ClientUrl'];
		$OtherUrl = $data['OtherUrl'];
		$Feature = $data['Feature'];

		$CreatedDate = date('Y-m-d');
		$CreatedBy = $data['CreatedBy'];
		$CreatedTime = date('H:i:s');
		$ClientID = $data['form_id'];

        $randomNumber = rand(1000, 100000);

        if (isset($_FILES['Client']['name'])  && $_FILES['Client']['name'] != '')
        {
            $extn_pan = explode('.', $_FILES["Client"]["name"]);
            $Client   = $randomNumber."-".$ClientID."Client-Attachment.".$extn_pan[1];
            $path = "../../project-assets/admin-media/client/".$Client;
            move_uploaded_file($_FILES["Client"]["tmp_name"], $path);
            $query = "Client = '$Client' WHERE ID = $ClientID";
            $response = $this->_UpdateTableRecords($this->conn,'client', $query);
        }


        $update_param = " ClientUrl = '$ClientUrl', OtherUrl = '$OtherUrl', Feature = '$Feature' where ID=$ClientID";
        $response = $this->_UpdateTableRecords($this->conn,'client', $update_param);
        $response['error'] = false;
        $response['message'] = "Client Logo Updated";


	    return $response;
	}

	public function GetAllClient()
	{
		$where = " where IsActive = 1 ORDER BY ID DESC";
        $client_details = $this->_getTableRecords($this->conn, "client", $where);
        return $client_details;
	}

	public function getTotalClient($table)
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

	function DeleteClient($data)
	{
		$ClientId = $data['ID'];
		// Delete course
		$where = " where ID = $ClientId";
		$response = $this->delete_identity_filter($this->conn,"client",$where);
		return $response;
	}

    function GetClientDetailsbyID($ID)
	{
		$where = " where ID = $ID";
		$client_details = $this->_getTableDetails($this->conn,'client', $where);
		return $client_details;
	}


}
