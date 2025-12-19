<?php
class Form extends Core
{
	private $conn;
	public function __construct($conn)
	{
		$this->conn = $conn;
		$this->setTimeZone();
	}

	public function InsertContatForm($data)
	{
		$Name = $this->cleantext($data['name']);
        $Email = $this->cleantext($data['email']);
		$PhoneNumber = $this->cleantext($data['phoneNumber']);
		$Message = $this->cleantext($data['message']);


		$CreatedDate = date('Y-m-d');
		$CreatedTime = date('H:i:s');
        $randomNumber = rand(1000, 100000);

		$sql = "INSERT INTO join_us(Name,Email,PhoneNumber,Message,CreatedDate,CreatedTime) VALUES ('$Name','$Email','$PhoneNumber','$Message','$CreatedDate','$CreatedTime')";
		$response_insert_form_data = $this->_InsertTableRecords($this->conn,$sql);

		if($response_insert_form_data['error'] == false)
		{
			$response_insert_form_data['error'] = false;
		    $response_insert_form_data['message'] = "Thank you for joining us!";
		}
		else
		{
			$response_insert_form_data['error'] = true;
		    $response_insert_form_data['message'] = "Technical Issue, please try later";
		}
		return $response_insert_form_data;
	}

    // public function InsertSalesForm($data)
	// {
	// 	$CompanyName = $this->cleantext($data['CompanyName']);
	// 	$CustomerName = $this->cleantext($data['CustomerName']);
    //     $Email = $this->cleantext($data['Email']);
	// 	$PhoneNumber = $this->cleantext($data['PhoneNumber']);
    //     $State = $this->cleantext($data['State']);
	// 	$City = $this->cleantext($data['City']);
	// 	$PrinterName = $this->cleantext($data['PrinterName']);
    //     $SerialNumber = $this->cleantext($data['SerialNumber']);
	// 	$Message = $this->cleantext($data['Message']);


	// 	$CreatedDate = date('Y-m-d');
	// 	$CreatedTime = date('H:i:s');
    //     $randomNumber = rand(1000, 100000);

	// 	$sql = "INSERT INTO sales_support(CompanyName,CustomerName,Email,PhoneNumber,State,City,PrinterName,SerialNumber,Message,CreatedDate,CreatedTime) VALUES ('$CompanyName','$CustomerName','$Email','$PhoneNumber','$State','$City','$PrinterName','$SerialNumber','$Message','$CreatedDate','$CreatedTime')";
	// 	$response_insert_sales_support = $this->_InsertTableRecords($this->conn,$sql);

	// 	if($response_insert_sales_support['error'] == false)
	// 	{
	// 		$response_insert_sales_support['error'] = false;
	// 	    $response_insert_sales_support['message'] = "Thankyou, Form has been Submited";
	// 	}
	// 	else
	// 	{
	// 		$response_insert_sales_support['error'] = true;
	// 	    $response_insert_sales_support['message'] = "Technical Issue, please try later";
	// 	}
	// 	return $response_insert_sales_support;
	// }

    // public function InsertServiceForm($data)
	// {
	// 	$CompanyName = $this->cleantext($data['CompanyName']);
	// 	$CustomerName = $this->cleantext($data['CustomerName']);
    //     $Email = $this->cleantext($data['Email']);
	// 	$PhoneNumber = $this->cleantext($data['PhoneNumber']);
    //     $State = $this->cleantext($data['State']);
	// 	$City = $this->cleantext($data['City']);
	// 	$PrinterName = $this->cleantext($data['PrinterName']);
    //     $SerialNumber = $this->cleantext($data['SerialNumber']);
	// 	$Message = $this->cleantext($data['Message']);


	// 	$CreatedDate = date('Y-m-d');
	// 	$CreatedTime = date('H:i:s');
    //     $randomNumber = rand(1000, 100000);

	// 	$sql = "INSERT INTO service_request(CompanyName,CustomerName,Email,PhoneNumber,State,City,PrinterName,SerialNumber,Message,CreatedDate,CreatedTime) VALUES ('$CompanyName','$CustomerName','$Email','$PhoneNumber','$State','$City','$PrinterName','$SerialNumber','$Message','$CreatedDate','$CreatedTime')";
	// 	$response_insert_service_request = $this->_InsertTableRecords($this->conn,$sql);

	// 	if($response_insert_service_request['error'] == false)
	// 	{
	// 		$response_insert_service_request['error'] = false;
	// 	    $response_insert_service_request['message'] = "Thankyou, Form has been Submited";
	// 	}
	// 	else
	// 	{
	// 		$response_insert_service_request['error'] = true;
	// 	    $response_insert_service_request['message'] = "Technical Issue, please try later";
	// 	}
	// 	return $response_insert_service_request;
	// }

    // public function InsertRequestForm($data)
	// {
	// 	$FirstName = $this->cleantext($data['FirstName']);
	// 	$Lastname = $this->cleantext($data['Lastname']);
    //     $Email = $this->cleantext($data['Email']);
	// 	$PhoneNumber = $this->cleantext($data['PhoneNumber']);
    //     $Company = $this->cleantext($data['Company']);
	// 	$City = $this->cleantext($data['City']);
	// 	$Message = $this->cleantext($data['Message']);
    //     $PageUrl = $this->cleantext($data['PageUrl']);

    //     $Name = $FirstName . ' ' . $LastName;


	// 	$CreatedDate = date('Y-m-d');
	// 	$CreatedTime = date('H:i:s');
    //     $randomNumber = rand(1000, 100000);

	// 	$sql = "INSERT INTO request_seller(Name,Email,PhoneNumber,Company,City,Message,PageUrl,CreatedDate,CreatedTime) VALUES ('$Name','$Email','$PhoneNumber','$Company','$City','$Message','$PageUrl','$CreatedDate','$CreatedTime')";
	// 	$response_insert_gallery_details = $this->_InsertTableRecords($this->conn,$sql);

	// 	if($response_insert_gallery_details['error'] == false)
	// 	{
	// 		$response_insert_gallery_details['error'] = false;
	// 	    $response_insert_gallery_details['message'] = "Thankyou, Request has been Submited";
	// 	}
	// 	else
	// 	{
	// 		$response_insert_gallery_details['error'] = true;
	// 	    $response_insert_gallery_details['message'] = "Technical Issue, please try later";
	// 	}
	// 	return $response_insert_gallery_details;
	// }


}
