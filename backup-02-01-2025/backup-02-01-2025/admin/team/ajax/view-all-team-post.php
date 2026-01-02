<?php
@session_start();
require_once('../../include/autoloader.inc.php');
$dbh = new Dbh();
$conn = $dbh->_connectodb();
$core = new Core();
$Team = new Team($conn);
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
$totalRecordwithFilter = $core->_getTotalRows($conn,'teams', $filter);
## Total number of record with filtering
$totalRecords = $Team->getTotalTeam('teams');
$filter = $filter." ORDER BY ".$columnName." ".$columnSortOrder;
$filter = $filter." limit ".$row.",".$rowperpage;
$teams_details = $core->_getTableRecords($conn,'teams', $filter);

foreach ($teams_details as $teams_detail) 
{

  extract($teams_detail);

  if($ProfileImg == ""){
     $ProfileImg = "N/A";
  }else{
    $ProfileImg = "<img src='../project-assets/admin-media/profileimg/$ProfileImg' width='50px' height='50px'>";
  }

  $data[] = array(
    "id"=>$ID,
    "ProfileImg"=>$ProfileImg,
    "Name"=>$Name,
    "Designation"=>$Designation,
    "Action"=>"<a class='btn text-danger btn-sm' data-bs-toggle='tooltip' onclick='UpdateTeam_modal($ID)' data-bs-original-title='Edit'><span
              class='fa fa-pencil-square-o fs-14'></span></a>&nbsp;&nbsp;<a class='btn text-danger btn-sm' data-bs-toggle='tooltip' onclick='DeleteTeam($ID)' data-bs-original-title='Delete'><span
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