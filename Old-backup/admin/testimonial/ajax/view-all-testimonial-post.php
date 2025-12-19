<?php

@session_start();

require_once('../../include/autoloader.inc.php');

$dbh = new Dbh();

$conn = $dbh->_connectodb();

$core = new Core();

$Testimonial = new Testimonial($conn);

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

   $searchQuery = " and (TestimonialName like '%".$searchValue."%')";

}



$filter = " where IsActive = 1";

/*if($CompanyID != -1 && !$nav)

{

    $filter = $filter." AND CompanyID = $CompanyID";

}*/

$filter = $filter.$searchQuery;

$totalRecordwithFilter = $core->_getTotalRows($conn,'testimonial', $filter);

## Total number of record with filtering

$totalRecords = $Testimonial->getTotalTestimonial('testimonial');

$filter = $filter." ORDER BY ".$columnName." ".$columnSortOrder;

$filter = $filter." limit ".$row.",".$rowperpage;

$testimonial_details = $core->_getTableRecords($conn,'testimonial', $filter);



foreach ($testimonial_details as $testimonial_detail)

{



  extract($testimonial_detail);



  if($UserImage == ""){

    $UserImage = "N/A";

  }else{

    $UserImage = "<img src='../project-assets/admin-media/testimonial/$UserImage' width='100px'>";

  }



  // Get approval status
  $approvalStatus = isset($ApprovalStatus) ? $ApprovalStatus : 'Pending';
  
  // Create approval buttons based on current status
  $approvalButtons = '';
  if($approvalStatus == 'Pending' || $approvalStatus == 'Rejected') {
    $approvalButtons .= "<a class='btn btn-success btn-sm' data-bs-toggle='tooltip' onclick='ApproveTestimonial($ID)' data-bs-original-title='Approve'><span class='fa fa-check fs-14'></span> Approve</a>&nbsp;&nbsp;";
  }
  if($approvalStatus == 'Pending' || $approvalStatus == 'Approved') {
    $approvalButtons .= "<a class='btn btn-danger btn-sm' data-bs-toggle='tooltip' onclick='RejectTestimonial($ID)' data-bs-original-title='Rejected'><span class='fa fa-times fs-14'></span> Rejected</a>&nbsp;&nbsp;";
  } 

  $data[] = array(

    "id"=>$ID,
    "Name"=>$Name,
    "UserImage"=>$UserImage,
    "Description"=>$Description,
    "Status"=>$IsActive,
    "StarRating"=>$StarRating,
    "ApprovalStatus"=>$approvalStatus,
    "Action"=>"<a class='btn text-danger btn-sm' data-bs-toggle='tooltip' onclick='UpdateTestimonial_modal($ID)' data-bs-original-title='Edit'><span

              class='fa fa-pencil-square-o fs-14'></span></a>&nbsp;&nbsp;<a class='btn text-danger btn-sm' data-bs-toggle='tooltip' onclick='DeleteTestimonial($ID)' data-bs-original-title='Delete'><span

              class='fa fa-trash fs-14'></span></a>&nbsp;&nbsp;" . $approvalButtons,

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

