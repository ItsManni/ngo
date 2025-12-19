<?php
@session_start();
require_once('../../include/autoloader.inc.php');
$dbh = new Dbh();
$conn = $dbh->_connectodb();
$core = new Core();
$NewsPR = new NewsPR($conn);
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
   $searchQuery = " and (EventName like '%".$searchValue."%')";
}

$filter = " where IsActive = 1";
/*if($CompanyID != -1 && !$nav)
{
    $filter = $filter." AND CompanyID = $CompanyID";
}*/
$filter = $filter.$searchQuery;
$totalRecordwithFilter = $core->_getTotalRows($conn,'news_pr', $filter);
## Total number of record with filtering
$totalRecords = $NewsPR->getTotalNewsPR('news_pr');
$filter = $filter." ORDER BY ".$columnName." ".$columnSortOrder;
$filter = $filter." limit ".$row.",".$rowperpage;
$news_pr_details = $core->_getTableRecords($conn,'news_pr', $filter);

foreach ($news_pr_details as $news_pr_detail)
{

  extract($news_pr_detail);

  if($NewsBanner == ""){
    $NewsBanner = "N/A";
  }else{
    $NewsBanner = "<img src='../project-assets/admin-media/newspr/$NewsBanner' width='100px'>";
  }


  $data[] = array(
    "id"=>$ID,
    "NewsBanner"=>$NewsBanner,
    "Heading"=>$Heading,
    "NewsDate"=>$NewsDate,
    "Action"=>"<a class='btn text-danger btn-sm' data-bs-toggle='tooltip' href='update-news-pr?NewsID=$ID' data-bs-original-title='Edit'><span
              class='fa fa-pencil-square-o fs-14'></span></a>&nbsp;&nbsp;<a class='btn text-danger btn-sm' data-bs-toggle='tooltip' onclick='DeleteCaseStudies($ID)' data-bs-original-title='Delete'><span
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
