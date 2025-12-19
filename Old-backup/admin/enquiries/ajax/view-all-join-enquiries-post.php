<?php
@session_start();
require_once('../../include/autoloader.inc.php');
$dbh = new Dbh();
$conn = $dbh->_connectodb();
$core = new Core();
$Enquiries = new Enquiries($conn);
$loggedin_email = $_SESSION['pp_email'];
$authentication = new Authentication($conn);
$UserType = $authentication->SessionCheck();
## Read value
$draw = $_POST['draw'];
$row = $_POST['start'];
$rowperpage = $_POST['length']; // Rows display per page
$searchValue = $_POST['search']['value']; // Search value

$columnName = "ID";
$columnSortOrder = "DESC";

$data = array();

$searchQuery = " ";
if($searchValue != ''){
   $searchQuery = " and (Name like '%".$searchValue."%' Email like '%".$searchValue."%' PhoneNumber like '%".$searchValue."%')";
}

$filter = " where IsActive = 1";
/*if($CompanyID != -1 && !$nav)
{
    $filter = $filter." AND CompanyID = $CompanyID";
}*/
$filter = $filter.$searchQuery;
$totalRecordwithFilter = $core->_getTotalRows($conn,'join_us', $filter);
## Total number of record with filtering
$totalRecords = $Enquiries->getTotalEnquiries('join_us');
$filter = $filter." ORDER BY ".$columnName." ".$columnSortOrder;
$filter = $filter." limit ".$row.",".$rowperpage;
$enquiries_details = $core->_getTableRecords($conn,'join_us', $filter);

foreach ($enquiries_details as $enquiries_detail)
{

  extract($enquiries_detail);

  if($Name == ""){
    $Name = "N/A";
  }
  if($Email == ""){
    $Email = "N/A";
  }
  if($PhoneNumber == ""){
    $PhoneNumber = "N/A";
  }


  $data[] = array(
    "id"=>$ID,
    "Name"=>$Name,
    "EmailPhoneNumber"=>$Email.'<br>'.$PhoneNumber,
    "ViewDetails"=>"<a class='btn text-white btn-sm btn-primary' data-bs-toggle='tooltip' onclick='ViewEnquiresDetails($ID)' data-bs-original-title='Delete'><span
              class='fa fa-eye fs-14'></span> View Details</a>",
    "Action"=>"<a class='btn text-danger btn-sm' data-bs-toggle='tooltip' onclick='DeleteEvent($ID)' data-bs-original-title='Delete'><span
              class='fa fa-trash fs-14'></span></a>",
   );

}
## Response
$response = array(
  "draw" => intval($draw),
  "iTotalRecords" => $totalRecords,
  "iTotalDisplayRecords" => $totalRecordwithFilter,
  "aaData" => $data
);
// echo $response;
echo json_encode($response);
?>
