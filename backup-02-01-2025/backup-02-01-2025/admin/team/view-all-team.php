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
    <title>View All Team Members - <?= $_ProductName ?></title>
    <?php 
    include("../include/common-head.php");
    $dbh = new Dbh();
    $conn = $dbh->_connectodb();
    $core = new Core();
    $authentication = new Authentication($conn);
    $UserType = $authentication->SessionCheck();
    
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
                            <h1 class="page-title">All Team Members</h1>
                            <div>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="../dashboard/admin-dashboard">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">View Team Members</li>
                                </ol>
                            </div>
                        </div>
                        <!-- PAGE-HEADER END -->

                        <!-- Row -->
                        <div class="row pb-5 justify-content-end">
                            <div class="col-md-4 text-end">
                                <span onclick="AddTeam()" class="btn btn-success">Add Team</span>
                            </div>
                        </div>

                        <div class="row row-sm">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered text-nowrap border-bottom"
                                                id="all_team">
                                                <thead>
                                                    <tr>
                                                        <th class="wd-15p border-bottom-0">#</th>
                                                        <th class="wd-15p border-bottom-0">Profile Image</th>
                                                        <th class="wd-15p border-bottom-0">Name</th>
                                                        <th class="wd-15p border-bottom-0">Designation</th>                                                        
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

            <div class="modal fade" id="add_team">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content modal-content-demo">
                        <div class="modal-header">
                            <h3 class="modal-title" id="TeamHeading"></h3>
                            <button class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="team_form" onsubmit="return false;">

                                <div class="row">
                                    <div class="mb-3 col-12 col-md-6">
                                        <label for="recipient-name" class="col-form-label">Name<span
                                                class="text-danger">*<span></label>
                                        <input type="text" class="form-control" name="Name" id="Name"
                                            Placeholder="Enter Name">
                                    </div>

                                    <div class="mb-3 col-12 col-md-6">
                                        <label for="recipient-name" class="col-form-label">Designation<span
                                                class="text-danger">*<span></label>
                                        <input type="text" class="form-control" name="Designation" id="Designation"
                                            Placeholder="Enter Designation">
                                    </div>

                                    <div class="mb-3 col-12 col-md-6">
                                        <label for="recipient-name" class="col-form-label">Profile Image<span
                                                class="text-danger">*<span></label>
                                        <input type="file" class="form-control" name="ProfileImg" id="ProfileImg">
                                        <input type="hidden" name="old_profile_img" id="old_profile_img">
                                    </div>
                                    

                                </div>

                                <input type="hidden" id="form_action" name="form_action" value="add" />
                                <input type="hidden" id="form_id" name="form_id" value="-1" />

                                <div class="mt-5 text-center">
                                    <button class="btn btn-success text-white" id="addTeamBtn"
                                        onclick="AddUpdateTeamForm()"></button>
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
        //include("../include/common-script.php");
        include("../include/common-script-v2.php");
        include("../include/common-script-datatables.php");
        ?>
        <script src="../project-assets/js/team.js"></script>
        <script type="text/javascript">
        $(document).ready(function() {
            $("#nav_teams").addClass("active");
        });
        </script>

</html>