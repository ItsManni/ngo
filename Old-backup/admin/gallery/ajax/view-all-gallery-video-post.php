<?php
@session_start();
require_once('../../include/autoloader.inc.php');
$dbh = new Dbh();
$conn = $dbh->_connectodb();
$core = new Core();
$GalleryVideo = new GalleryVideo($conn);
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
   $searchQuery = " and (Title like '%".$searchValue."%')";
}

$filter = " where IsActive = 1";
/*if($CompanyID != -1 && !$nav)
{
    $filter = $filter." AND CompanyID = $CompanyID";
}*/
$filter = $filter.$searchQuery;
$totalRecordwithFilter = $core->_getTotalRows($conn,'gallery_video', $filter);
## Total number of record with filtering
$totalRecords = $GalleryVideo->getTotalGalleryVideo('gallery_video');
$filter = $filter." ORDER BY ".$columnName." ".$columnSortOrder;
$filter = $filter." limit ".$row.",".$rowperpage;
$gallery_details = $core->_getTableRecords($conn,'gallery_video', $filter);

foreach ($gallery_details as $gallery)
{

  extract($gallery);

  // if($FeatureImage == ""){
  //   $FeatureImage = "N/A";
  // }else{
  //   $FeatureImage = "<img src='../project-assets/admin-media/gallery/featureimg/$FeatureImage' width='100px'>";
  // }

  $data[] = array(
    "id"=>$ID,
    "Title"=>$Title,
    "Action"=>"<a class='btn text-danger btn-sm' data-bs-toggle='tooltip' href='./update-gallery-video?GalleryID=$ID' data-bs-original-title='Edit'><span
              class='fa fa-pencil-square-o fs-14'></span></a>&nbsp;&nbsp;<a class='btn text-danger btn-sm' data-bs-toggle='tooltip' onclick='DeleteGalleryVideo($ID)' data-bs-original-title='Delete'><span
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
