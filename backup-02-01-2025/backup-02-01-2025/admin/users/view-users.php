<?php
@session_start();
require_once('../include/autoloader.inc.php');
$conf = new Conf();
$_ProductName = $conf->_ProductName;
$_ProductLogo = $conf->_ProductLogo;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <!-- TITLE -->
    <title>View All Users - <?= $_ProductName ?> ICS</title>

    <?php
    @session_start();
    include("../include/common-head.php");
    $dbh = new Dbh();
    $conn = $dbh->_connectodb();
    $authentication = new Authentication($conn);
    $UserType = $authentication->SessionCheck();
    $CenterID = -1;
    if(isset($_SESSION['CenterID'])){
        $CenterID = $_SESSION['CenterID'];
    }
    if(isset($_GET['center']))
    {
        $CenterID = $_GET['center'];
    }
    $user = new Users($conn);
    $all_user_details = $user->getAllActiveUsersByCenter($CenterID);

    $Branch = new Branch($conn);
    $AllBranches = $Branch->GetAllBranch($conn);
    if($UserType == "System Admin")
    {
        $UserType_arr = array("Employee");
    }

    ?>
</head>

<body class="app sidebar-mini ltr light-mode">
    <div class="page">
        <div class="page-main">

            <?php
            include("../navigation/top-header.php");
            include("../navigation/side-navigation.php");
            ?>

            <!--app-content open-->
            <div class="main-content app-content mt-0">
                <div class="side-app">

                    <!-- CONTAINER -->
                    <div class="main-container container-fluid">

                        <!-- PAGE-HEADER -->
                        <div class="page-header">
                            <h1 class="page-title">All Users</h1>
                            <div>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="../dashboard/admin-dashboard">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">View Users</li>
                                </ol>
                            </div>
                        </div>
                        <!-- PAGE-HEADER END -->

                        <!-- Row -->
                        <!-- <div class="row pb-5 justify-content-end">
                            <div class="col-md-4 text-end">
                                <a href="#" onclick="AddUser()" class="btn btn-success">Add User</a>
                            </div>
                        </div> -->
                        <div class="row row-sm">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered text-nowrap border-bottom"
                                                id="view-users">
                                                <thead>
                                                    <tr>
                                                        <th class="wd-15p border-bottom-0">#</th>
                                                        <th class="wd-15p border-bottom-0">Name</th>
                                                        <th class="wd-15p border-bottom-0">Phone</th>
                                                        <th class="wd-15p border-bottom-0">Email</th>
                                                        <th class="wd-15p border-bottom-0">User Type</th>
                                                        <?php
                                                        if($UserType == "System Admin")
                                                        {
                                                        ?>
                                                        <th class="wd-15p border-bottom-0">Reset Password</th>
                                                        <?php
                                                        }
                                                        ?>
                                                        <th class="wd-25p border-bottom-0">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <?php
                                                    $i=1;
                                                    foreach($all_user_details as $user)
                                                    {
                                                    $UserEmail = $user['Email'];
                                                    $id  = $user['ID'];
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $i; ?></td>
                                                        <td><?php echo $user['Name']; ?></td>
                                                        <td><?php echo $user['Mobile']; ?></td>
                                                        <td><?php echo $user['Email']; ?></td>
                                                        <td><?php echo $user['UserType']; ?></td>
                                                        <td class="text-center">
                                                    <?php
                                                            if($UserType == "System Admin" && $user['Email'] == 'admin@apsom.com')
                                                            {
                                                            ?>
                                                                    <a onclick="ResetPassword('<?php echo $UserEmail;?>');"><i
                                                                            class="fa fa-gear cursor-pointer"
                                                                            data-bs-toggle="tooltip"
                                                                            data-bs-original-title="Reset Password"></i></a>
                                                                    <?php
                                                            }
                                                            else
                                                            {
                                                                echo "NA";
                                                            }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            if($_SESSION['pp_email'] != $user['Email'])
                                                            {
                                                            ?>
                                                            <div class="g-2">
                                                                <a class="btn text-danger btn-sm"
                                                                    data-bs-toggle="tooltip"
                                                                    onclick="DeleteUser(<?php echo $id;?>)"
                                                                    data-bs-original-title="Delete"><span
                                                                        class="fe fe-trash-2 fs-14"></span>
                                                                </a>
                                                                <!-- <a class="btn text-danger btn-sm"
                                                                    data-bs-toggle="tooltip"
                                                                    onclick="EditUserDetails_modal(<?php echo $id;?>)"
                                                                    data-bs-original-title="Edit"><span
                                                                        class="fe fe-edit fs-14"></span> -->
                                                                </a>
                                                            </div>
                                                            <?php
                                                            }
                                                            else
                                                            {
                                                                echo "N.A.";
                                                            }
                                                            ?>
                                                        </td>

                                                    </tr>
                                                    <?php
                                                      $i++;
                                                      }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Row -->

                    </div>
                    <!-- CONTAINER END -->
                </div>
            </div>
            <!--app-content close-->


            <!-- start add modal  -->

            <div class="modal fade" id="add_user" tabindex="1">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content modal-content-demo">
                        <div class="modal-header">
                            <h3 class="modal-title" id="UserModalHeading"></h3>
                            <button class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="user_form" onsubmit="return false;">
                                <div class="row">
                                    <div class="mb-3 col-6">
                                        <label for="recipient-name" class="col-form-label">Center <span
                                                class="text-danger">*</span></label>
                                        <select class="form-control select2-show-search" name="Center"
                                            id="Center_name" style="width:100%;">
                                            <?php
                                            if($CenterID == -1)
                                            {
                                            ?>
                                                <option value="-1">All</option>
                                            <?php
                                            }
                                            foreach($AllBranches as $Branch_value)
                                            {
                                                if($CenterID == -1 || $CenterID == $Branch_value['ID'])
                                                {
                                            ?>
                                                    <option value="<?php echo  $Branch_value['ID']?>"><?php echo  $Branch_value['BranchName']?></option>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="mb-3 col-6">
                                        <label for="recipient-name" class="col-form-label">Name <span
                                        class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="user_name" id="user_name"
                                            Placeholder="Enter Name">
                                    </div>

                                    <div class="mb-3 col-6">
                                        <label for="recipient-name" class="col-form-label">Email <span
                                        class="text-danger">*</span> (will be used as
                                            Username) </label>
                                        <input type="text" class="form-control" name="user_email" id="user_email"
                                            Placeholder="Enter Email">
                                    </div>

                                    <div class="mb-3 col-6">
                                        <label for="recipient-name" class="col-form-label">Phone Number <span
                                        class="text-danger">*</span></label>
                                        <input type="text" maxlength="10" class="form-control" onkeyup="validISNumber()"
                                            name="user_phone_number" id="user_phone_number"
                                            placeholder="Enter Phone Number">
                                    </div>

                                    <div class="mb-3 col-6">
                                        <label for="recipient-name" class="col-form-label">Password <span
                                        class="text-danger">*</span></label>
                                        <input type="password" class="form-control" name="password" id="password"
                                            Placeholder="Enter Password">
                                    </div>

                                    <div class="mb-3 col-6">
                                        <label for="recipient-name" class="col-form-label">Confirm Password <span
                                        class="text-danger">*</span></label>
                                        <input type="password" class="form-control" id="confirm_password"
                                            Placeholder="Enter Confirm Password">
                                    </div>
                                    <div class="mb-3 col-6">
                                        <label for="recipient-name" class="col-form-label">User Type <span
                                        class="text-danger">*</span></label>
                                        <select onchange="ShowCourseDiv()" class="form-select select2-show-search" name="user_type"
                                            id="user_type" style="width:100%;">
                                            <option value="">Select User Type</option>
                                            <?php
                                            foreach($UserType_arr as $UserType)
                                            {
                                                ?>
                                                 <option value="<?=$UserType;?>"><?=$UserType;?></option>
                                                <?php
                                            }
                                            ?>
                                            <!--option value="Counsellor">Counsellor</option>
                                            <option value="Marketing">Marketing</option>
                                            <option value="Admission">Admission</option>
                                            <option value="Center Manager">Center Manager</option>
                                            <option value="ContentTeam">Content Team</option>
                                            <option value="Book Dispatch">Book Dispatch</option>
                                            <option value="Academic Head">Academic Head</option>
                                            <option value="Acountant">Acountant</option>
                                            <option value="Academic Head">Academic Head</option>
                                            <option value="Lead Counsellor">Lead Counsellor</option>
                                            <option value="Batch Manager">Batch Manager</option-->
                                        </select>
                                    </div>


                                    <div class="mt-5 text-center mb-3 col-12">
                                        <button class="btn btn-success text-white" id="addUpdateBtn"
                                            onclick="AddUpdateUser()"></button>
                                        <!-- <a href="#"  class="btn btn-success">Submit</a> -->
                                    </div>
                                </div>



                            </form>
                        </div>
                    </div>
                </div>
            </div>


            <!-- End End modal  -->

            <!-- Start Reset Password -->

            <div class="modal fade" id="reset_password_modal" tabindex="1">
                <div class="modal-dialog" role="document">
                    <div class="modal-content modal-content-demo">
                        <div class="modal-header">
                            <h3 class="modal-title">Reset Password</h3>
                            <button class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="reset_password_form" onsubmit="return false;">
                                <input type="hidden" name="rp_user_email" id="rp_user_email" value="-1">
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Password</label>
                                    <input type="password" class="form-control" name="r_password" id="r_password"
                                        Placeholder="Enter Password">
                                </div>

                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Confirm Password</label>
                                    <input type="text" class="form-control" name="r_confirm_password"
                                        id="r_confirm_password" Placeholder="Enter Confirm Password">
                                </div>
                                <div class="mt-5 text-center">
                                    <button class="btn btn-success text-white" id="resetpasswordBtn"
                                        onclick="ResetPasswordAction()">Save</button>
                                    <!-- <a href="#"  class="btn btn-success">Submit</a> -->
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Reset Password -->



            <!-- start add modal  -->

            <div class="modal fade" id="edit_user_modal" tabindex="1">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content modal-content-demo">
                        <div class="modal-header">
                            <h3 class="modal-title" id="EditUserModalHeading"></h3>
                            <button class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="edit_user_form" onsubmit="return false;">
                                <div class="row">
                                    <div class="mb-3 col-6">
                                        <label for="recipient-name" class="col-form-label">Center <span
                                                class="text-danger">*</span></label>
                                        <select class="form-control select2-show-search" name="UserCenter"
                                            id="UserCenter" style="width:100%;">
                                            <?php
                                            if($CenterID == -1)
                                            {
                                            ?>
                                                <option value="-1">All</option>
                                            <?php
                                            }
                                            foreach($AllBranches as $Branch_value)
                                            {
                                                if($CenterID == -1 || $CenterID == $Branch_value['ID'])
                                                {
                                            ?>
                                                    <option value="<?php echo  $Branch_value['ID']?>"><?php echo  $Branch_value['BranchName']?></option>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="mb-3 col-6">
                                        <label for="recipient-name" class="col-form-label">Name</label>
                                        <input type="text" class="form-control" name="UserName" id="UserName"
                                            Placeholder="Enter Name">
                                    </div>

                                    <div class="mb-3 col-6">
                                        <label for="recipient-name" class="col-form-label">Email (will be used as
                                            Username)</label>
                                        <input type="text" class="form-control" name="UserEmail" id="UserEmail"
                                            Placeholder="Enter Email">
                                    </div>

                                    <div class="mb-3 col-6">
                                        <label for="recipient-name" class="col-form-label">Phone Number</label>
                                        <input type="text" maxlength="10" class="form-control" onkeyup="validISNumber()"
                                            name="UserPhoneNumber" id="UserPhoneNumber"
                                            placeholder="Enter Phone Number">
                                    </div>

                                    <div class="mb-3 col-6">
                                        <label for="recipient-name" class="col-form-label">User Type</label>
                                        <select class="form-select select2-show-search" name="UserType"
                                            id="UserType" style='width:100%;'>
                                            <option value="">Select User Type</option>
                                            <?php
                                            foreach($UserType_arr as $UserType)
                                            {
                                                ?>
                                                 <option value="<?=$UserType;?>"><?=$UserType;?></option>
                                                <?php
                                            }
                                            ?>
                                            <!--option value="Counsellor">Counsellor</option>
                                            <option value="Marketing">Marketing</option>
                                            <option value="Admission">Admission</option>
                                            <option value="Center Manager">Center Manager</option>
                                            <option value="ContentTeam">Content Team</option>
                                            <option value="Book Dispatch">Book Dispatch</option>
                                            <option value="Academic Head">Academic Head</option>
                                            <option value="Acountant">Acountant</option>
                                            <option value="Academic Head">Academic Head</option>
                                            <option value="Lead Counsellor">Lead Counsellor</option>
                                            <option value="Batch Manager">Batch Manager</option-->
                                        </select>
                                    </div>

                                    <input type="hidden" name="EditFormID" id="EditFormID" value='-1'>


                                    <div class="mt-5 text-center mb-3 col-12">
                                        <button class="btn btn-success text-white" id="EditUserBtn"
                                            onclick="UpdateUserDetails()"></button>
                                        <!-- <a href="#"  class="btn btn-success">Submit</a> -->
                                    </div>
                                </div>



                            </form>
                        </div>
                    </div>
                </div>
            </div>


            <!-- End End modal  -->


            <?php
       include("../navigation/right-side-navigation.php");
        ?>

        </div>

        <?php
       include("../include/common-script.php");
        ?>

        <script src="../project-assets/js/user.js"></script>
        <script src="../project-assets/js/commonjs.js"></script>

        <script type="text/javascript">
        $(document).ready(function() {
            $("#nav_user").addClass("active");
        });

        function ShowCourseDiv() {
            let User_type = $("#user_type").val();
            if (User_type == "Counsellor") {
                $("#user_course_div").css("display", "block");
            } else {
                $("#user_course_div").css("display", "none");
            }
        }
        </script>
</body>

</html>
