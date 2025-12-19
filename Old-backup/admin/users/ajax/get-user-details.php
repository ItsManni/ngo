<?php
@session_start();
require_once('../../include/autoloader.inc.php');
$dbh = new Dbh();
$conn = $dbh->_connectodb();
$authentication = new Authentication($conn);
$authenticated = $authentication->SessionCheck();


$response = array();
$response['error'] = true;
if(isset($_POST))
{
   
    $user_obj = new Users($conn);
    $ID = $_POST['UserID'];
    $response_data = $user_obj->GetUserDetailsByID($ID);

    if($response_data['UserType'] == "Counsellor")
    {
        $core = new Core();
        $mapped_courses = array();
        $where = " where CounsellorID = $ID";
        $mapped_courses_raw = $core->_getTableRecords($conn,'course_counsellor',$where);
        foreach($mapped_courses_raw as $mapped_course)
        {
            if (strpos($mapped_course['CourseID'], ',') !== false) 
            {
                $mapped_courses_arr = explode(',',$mapped_course['CourseID']);
                foreach($mapped_courses_arr as $mapped_course_id)
                {
                    array_push($mapped_courses,$mapped_course_id);
                }
            } 
            else 
            {
                array_push($mapped_courses,$mapped_course['CourseID']);
            }            
        }
        $response['mapped_courses'] = $mapped_courses;
    }
    
    $response['error'] = false;
    $response['data'] = $response_data;
}
else
{
    $response['message'] = "Some Technical Error ! Please Try Again.";
}
echo json_encode($response);
?>