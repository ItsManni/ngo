<?php
@session_start();
require_once('../../include/autoloader.inc.php');
$dbh = new Dbh();
$conn = $dbh->_connectodb();
$core = new Core();
$Branch = new Branch($conn);
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
   $searchQuery = " and (Url like '%".$searchValue."%' or Heading like '%".$searchValue."%' or CaseDate like '%".$searchValue."%')";
}

$filter = " where IsActive = 1";
/*if($CompanyID != -1 && !$nav)
{
    $filter = $filter." AND CompanyID = $CompanyID";
}*/
$filter = $filter.$searchQuery;
$totalRecordwithFilter = $core->_getTotalRows($conn,'branch', $filter);
## Total number of record with filtering
$totalRecords = $Branch->getTotalBranch('branch');
$filter = $filter." ORDER BY ".$columnName." ".$columnSortOrder;
$filter = $filter." limit ".$row.",".$rowperpage;
$branch_details = $core->_getTableRecords($conn,'branch', $filter);

foreach ($branch_details as $branch_detail) 
{

  $where = " where 1";
  $user_details_array_temp = $core->_getTableRecords($conn,'user_details',$where);
  $user_details_array = array();
  foreach($user_details_array_temp as $user)
  {
      $Manager_ID = $user['ID'];
      $user_details_array[$Manager_ID] = $user['Name'];
  }

  extract($branch_detail);

  if($Manager != -1){
    $Manager = $user_details_array[$Manager];
  }else{
    $Manager = "N/A";
  }


  $data[] = array(
    "id"=>$ID,
    "BranchName"=>$BranchName,
    "Manager"=>$Manager,
    "Action"=>"<a class='btn text-danger btn-sm' data-bs-toggle='tooltip' onclick='UpdateBranch_modal($ID)' data-bs-original-title='Delete'><span
              class='fa fa-pencil-square-o fs-14'></span></a>",
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