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
    <title>View All Centers/Branches - <?= $_ProductName ?> Portal</title>
    <?php 
    include("../include/common-head.php");
    $dbh = new Dbh();
    $conn = $dbh->_connectodb();
    $core = new Core();
    $authentication = new Authentication($conn);
    $UserType = $authentication->SessionCheck();

    $user = new Users($conn);
    $all_user_details = $user->getAllCenterManagerUsers();
    
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
                        <div class="page-header mb-3">
                            <h1 class="page-title">All Centers/Branches</h1>
                            <div>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="../dashboard/admin-dashboard">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">View Centers/Branches</li>
                                </ol>
                            </div>
                        </div>
                        <!-- PAGE-HEADER END -->

                        <!-- Row -->
                        <div class="row pb-5 justify-content-end">
                            <div class="col-md-4 text-end">
                                <span onclick="AddBranch()" class="btn btn-success">Add Center/Branch</span>
                            </div>
                        </div>

                        <div class="row row-sm">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered text-nowrap border-bottom"
                                                id="all_branch">
                                                <thead>
                                                    <tr>
                                                        <th class="wd-15p border-bottom-0">#</th>
                                                        <th class="wd-15p border-bottom-0">Center/Branch Name</th>
                                                        <th class="wd-15p border-bottom-0">Manager</th>
                                                        <th class="wd-15p border-bottom-0">Action </th>

                                                    </tr>
                                                </thead>

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

            <div class="modal fade" id="add_branch">
                <div class="modal-dialog" role="document">
                    <div class="modal-content modal-content-demo">
                        <div class="modal-header">
                            <h3 class="modal-title" id="BranchHeading"></h3>
                            <button class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="branch_form" onsubmit="return false;">

                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Center/Branch Name <span
                                            class="text-danger">*<span></label>
                                    <input type="text" class="form-control" name="branchname" id="branchname"
                                        Placeholder="Enter Branch Name">
                                </div>

                                <!--div class="mb-3">
                                    <div class="form-group">
                                        <label class="form-label">Center/Branch Manager <span
                                                class="text-danger">*</span></label>
                                        <select class="form-control select2 form-select" name="branchManager"
                                            id="branchManager">
                                            <option value="">Select User</option>
                                            <?php
                                            $i = 1;
                                            foreach($all_user_details as $User_value)
                                            {
                                                
                                            ?>
                                            <option value="<?php echo  $User_value['ID']?>">
                                                <?php echo  $User_value['Name']?></option>
                                            <?php
                                            $i++;
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div-->



                                <input type="hidden" id="form_action" name="form_action" value="add" />
                                <input type="hidden" id="form_id" name="form_id" value="-1" />

                                <div class="mt-5 text-center">
                                    <button class="btn btn-success text-white" id="addBranchBtn"
                                        onclick="AddUpdateBranchForm()"></button>
                                </div>


                            </form>
                        </div>
                    </div>
                </div>
            </div>


            <!-- End End modal  -->


            <!-- Center/Branch Assign start add modal  -->

            <div class="modal fade" id="add_branch_manager_modal">
                <div class="modal-dialog" role="document">
                    <div class="modal-content modal-content-demo">
                        <div class="modal-header">
                            <h3 class="modal-title" id="BranchManagerHeading"></h3>
                            <button class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="branch_manager_assign_form" onsubmit="return false;">

                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Manager Name <span
                                            class="text-danger">*<span></label>
                                    <input type="text" class="form-control" name="managername" id="managername"
                                        Placeholder="Enter Manager Name">
                                </div>

                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Manager Mobile No. <span
                                            class="text-danger">*<span></label>
                                    <input type="text" class="form-control" onkeyup="validISNumber()"
                                        name="managermobile" id="managermobile" Placeholder="Enter Manager Mobile No.">
                                </div>

                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Manager Email <span
                                            class="text-danger">*<span></label>
                                    <input type="text" class="form-control" name="manageremail" id="manageremail"
                                        Placeholder="Enter Manager Email">
                                </div>


                                <div class="mb-3 col-6">
                                    <label for="recipient-name" class="col-form-label">Password</label>
                                    <input type="password" class="form-control" name="password" id="password"
                                        Placeholder="Enter Password">
                                </div>

                                <div class="mb-3 col-6">
                                    <label for="recipient-name" class="col-form-label">Confirm Password</label>
                                    <input type="password" class="form-control" id="confirm_password"
                                        Placeholder="Enter Confirm Password">
                                </div>

                                <input type="hidden" id="branch_id" name="branch_id" value="" />

                                <div class="mt-5 text-center">
                                    <button class="btn btn-success text-white" id="addBranchManagerBtn"
                                        onclick="AddBranchManagerForm()"></button>
                                </div>


                            </form>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Center/Branch Assign End End modal  -->


            <?php
       include("../navigation/right-side-navigation.php");
        ?>

        </div>

        <?php
        //include("../include/common-script.php");
        include("../include/common-script-v2.php");
        include("../include/common-script-datatables.php");
        ?>
        <script src="../project-assets/js/branch.js"></script>
        <script type="text/javascript">
        $(document).ready(function() {
            $("#nav_branch").addClass("active");
        });
        </script>

</html>