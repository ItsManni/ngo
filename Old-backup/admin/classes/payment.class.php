<?php
class Payment extends Core
{
  private $conn;

  public function __construct($conn)
  {
    $this->conn = $conn;
    $this->setTimeZone();
  }

  public function insertDonation($data)
  {
    $Name = $this->cleantext($data['name']);
    $Email = $this->cleantext($data['email']);
    $Phone = $this->cleantext($data['phone']);
    $Amount = $this->cleantext($data['amount']);
    $Payment_ID = $this->cleantext($data['payment_id']);
    $Order_ID = $this->cleantext($data['order_id']);
    $Status = $this->cleantext($data['status']);
    $Payment_Date = date('Y-m-d H:i:s');
    $CreatedDate = date('Y-m-d');
    $CreatedTime = date('H:i:s');
    $IsActive = 1;

    $sql = "INSERT INTO donations 
            (Name, Email, Phone, Amount, Payment_ID, Order_ID, Status, Payment_Date, CreatedDate, CreatedTime, IsActive)
            VALUES 
            ('$Name', '$Email', '$Phone', '$Amount', '$Payment_ID', '$Order_ID', '$Status', '$Payment_Date', '$CreatedDate', '$CreatedTime', '$IsActive')";

    return $this->_InsertTableRecords($this->conn, $sql);
  }

  public function updateDonationAfterPayment($donation_id, $payment_id, $order_id, $status) {
    $payment_date = date('Y-m-d H:i:s');
    $update_param = "
        Payment_ID = '$payment_id',
        Order_ID = '$order_id',
        Status = '$status',
        Payment_Date = '$payment_date'
        WHERE ID = $donation_id
    ";

    return $this->_UpdateTableRecords($this->conn, 'donations', $update_param);
}

function GetDonationDetailsbyID($ID)
	{
		$where = " where ID = $ID";
		$donations_details = $this->_getTableDetails($this->conn,'donations', $where);
		return $donations_details;
	}

}