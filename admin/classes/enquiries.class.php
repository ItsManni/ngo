<?php
class Enquiries extends Core
{
	private $conn;
	public function __construct($conn)
	{
		$this->conn = $conn;
		$this->setTimeZone();
	}


	public function getAllJoinEnquiries()
	{
		$filter = " where IsActive = 1 ORDER BY ID DESC";
		$join_us_details = $this->_getTableRecords($this->conn,'join_us',$filter);
		return $join_us_details;
	}

    function GetJoinEnquiriesDetailsbyID($ID)
	{
		$where = " where ID = $ID";
		$join_us_details = $this->_getTableDetails($this->conn,'join_us', $where);
		return $join_us_details;
	}

    function GetRequestEnquiriesDetailsbyID($ID)
	{
		$where = " where ID = $ID";
		$request_seller_details = $this->_getTableDetails($this->conn,'request_seller', $where);
		return $request_seller_details;
	}


    public function getTotalEnquiries($table)
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

    function GetSalesEnquiriesDetailsbyID($ID)
	{
		$where = " where ID = $ID";
		$sales_support_details = $this->_getTableDetails($this->conn,'sales_support', $where);
		return $sales_support_details;
	}

    function GetServiceEnquiriesDetailsbyID($ID)
	{
		$where = " where ID = $ID";
		$service_request_details = $this->_getTableDetails($this->conn,'service_request', $where);
		return $service_request_details;
	}

}
