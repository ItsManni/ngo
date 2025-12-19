<?php
@session_start();
require_once('../../include/autoloader.inc.php');
$dbh = new Dbh();
$conn = $dbh->_connectodb();
$core = new Core();
$Blog = new Blog($conn);
$loggedin_email = $_SESSION['pp_email'];
$authentication = new Authentication($conn);
$UserType = $authentication->SessionCheck();

$encryption = new Encryption();
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
   $searchQuery = " and (BlogName like '%".$searchValue."%')";
}

$filter = " where IsActive = 1";
/*if($CompanyID != -1 && !$nav)
{
    $filter = $filter." AND CompanyID = $CompanyID";
}*/
$filter = $filter.$searchQuery;
$totalRecordwithFilter = $core->_getTotalRows($conn,'blogs', $filter);
## Total number of record with filtering
$totalRecords = $Blog->getTotalBlog('blogs');
$filter = $filter." ORDER BY ".$columnName." ".$columnSortOrder;
$filter = $filter." limit ".$row.",".$rowperpage;
$blogs_details = $core->_getTableRecords($conn,'blogs', $filter);

foreach ($blogs_details as $blogs_detail)
{

  extract($blogs_detail);

  if($BlogImg == ""){
    $BlogImg = "N/A";
  }else{
    $BlogImg = "<img src='../project-assets/admin-media/blogimg/$BlogImg' width='100px'>";
  }
  $Blog_ID_encrypted = $encryption->encrypt_message($ID);


  $data[] = array(
    "id"=>$ID,
    "BlogBanner"=>$BlogImg,
    "BlogName"=>$BlogName,
    "ViewBlog"=>"<a class='btn btn-sm btn-primary text-white' data-bs-toggle='tooltip' href='http://dev.digistreetmedia.in/apsom/blog/$Url' data-bs-original-title='Edit'>View Blog</a>",
    "Action"=>"<a class='btn text-danger btn-sm' data-bs-toggle='tooltip' href='./update-blog?BlogID=$Blog_ID_encrypted' data-bs-original-title='Edit'><span
              class='fa fa-pencil-square-o fs-14'></span></a>&nbsp;&nbsp;<a class='btn text-danger btn-sm' data-bs-toggle='tooltip' onclick='DeleteBlog($ID)' data-bs-original-title='Delete'><span
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
