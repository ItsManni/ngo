<?php
@session_start();
require_once('../../include/autoloader.inc.php');
$dbh = new Dbh();
$conn = $dbh->_connectodb();
$core = new Core();
$Banner = new Banner($conn);
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
   $searchQuery = " and (Name like '%".$searchValue."%')";
}

$filter = " where IsActive = 1";
/*if($CompanyID != -1 && !$nav)
{
    $filter = $filter." AND CompanyID = $CompanyID";
}*/
$filter = $filter.$searchQuery;
$totalRecordwithFilter = $core->_getTotalRows($conn,'banner', $filter);
## Total number of record with filtering
$totalRecords = $Banner->getTotalBanner('banner');
$filter = $filter." ORDER BY ".$columnName." ".$columnSortOrder;
$filter = $filter." limit ".$row.",".$rowperpage;
$banner_details = $core->_getTableRecords($conn,'banner', $filter);

foreach ($banner_details as $banner_detail)
{
  extract($banner_detail);

  if($Banner == ""){
    $Banner = "N/A";
  }else{
    $Banner = "<img src='../project-assets/admin-media/banner/$Banner' width='100px'>";
  }

  $data[] = array(
    "id"=>$ID,
    "Banner"=>$Banner,
    "Action"=>"<a class='btn text-danger btn-sm' data-bs-toggle='tooltip' onclick='UpdateBanner_modal($ID)' data-bs-original-title='Edit'><span
              class='fa fa-pencil-square-o fs-14'></span></a>&nbsp;&nbsp;<a class='btn text-danger btn-sm' data-bs-toggle='tooltip' onclick='DeleteBanner($ID)' data-bs-original-title='Delete'><span
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
