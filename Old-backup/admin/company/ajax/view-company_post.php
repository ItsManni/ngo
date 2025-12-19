<?php
@session_start();
require_once('../../include/autoloader.inc.php');
$dbh = new Dbh();
$conn = $dbh->_connectodb();
$core = new Core();
$CompanyDetails = new CompanyDetails($conn);
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
   $searchQuery = " and (CompanyName like '%".$searchValue."%' or Email like '%".$searchValue."%' or GSTNumber LIKE '%".$searchValue."%')";
}

$CenterID = '';
if(isset($_SESSION['CenterID'])){
  $CenterID = $_SESSION['CenterID'];
}
$filter_center_manager = "";
if($UserType == "Center Manager")
{
  $filter_center_manager = " AND CenterID = $CenterID";
}

$filter = " where IsActive = 1";

/*if($CompanyID != -1 && !$nav)
{
    $filter = $filter." AND CompanyID = $CompanyID";
}*/
$filter = $filter.$searchQuery.$filter_center_manager;
$totalRecordwithFilter = $core->_getTotalRows($conn,'company_details', $filter);
## Total number of record with filtering
$totalRecords = $CompanyDetails->getTotalCompanyDetails('company_details');
$filter = $filter." ORDER BY ".$columnName." ".$columnSortOrder;
$filter = $filter." limit ".$row.",".$rowperpage;
$company_details_arr = $core->_getTableRecords($conn,'company_details', $filter);


$where = " where 1";
$branch_array_temp = $core->_getTableRecords($conn,'branch',$where);
$branch_array = array();
foreach($branch_array_temp as $user)
{
    $Branch_ID = $user['ID'];
    $branch_array[$Branch_ID] = $user['BranchName'];
}


foreach ($company_details_arr as $company_details_value) 
{

  extract($company_details_value);
  if($CenterID != -1){
    $CenterID = $branch_array[$CenterID];
  }else{
    $CenterID = "N/A";
  }
  
  $data[] = array(
    "id"=>$ID,
    "Center"=>$CenterID,
    "CompanyName"=>$CompanyName,
    "Email"=>$Email,
    "PhoneNumber"=>$PhoneNumber,
    "GSTNumber"=>$GSTNumber,
    "Action"=>"<a class='btn text-danger btn-sm' data-bs-toggle='tooltip'  onclick='UpdateCompanyDetails_modal($ID)' data-bs-original-title='Edit'><span class='fe fe-edit fs-14'></span></a>"
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