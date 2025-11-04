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
    <title>View All Events - <?= $_ProductName ?></title>
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
                            <h1 class="page-title">All Events</h1>
                            <div>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="../dashboard/admin-dashboard">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">View Events</li>
                                </ol>
                            </div>
                        </div>
                        <!-- PAGE-HEADER END -->

                        <!-- Row -->
                        <div class="row pb-5 justify-content-end">
                            <div class="col-md-4 text-end">
                                <span onclick="AddEvent()" class="btn btn-success">Add Event</span>
                            </div>
                        </div>

                        <div class="row row-sm">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered text-nowrap border-bottom"
                                                id="all_events">
                                                <thead>
                                                    <tr>
                                                        <th class="wd-15p border-bottom-0">#</th>
                                                        <th class="wd-15p border-bottom-0">Event Banner</th>
                                                        <th class="wd-15p border-bottom-0">Heading</th>
                                                        <th class="wd-15p border-bottom-0">Booth</th>
                                                        <th class="wd-15p border-bottom-0">Start Date/ End Date</th>
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

            <div class="modal fade" id="add_event">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content modal-content-demo">
                        <div class="modal-header">
                            <h3 class="modal-title" id="EventHeading"></h3>
                            <button class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="event_form" onsubmit="return false;">

                                <div class="row">
                                    <div class="mb-3 col-12 col-md-12   ">
                                        <label for="recipient-name" class="col-form-label">Event Banner <span
                                                class="text-danger">*<span></label>
                                        <input type="file" class="form-control" name="EventImg" id="EventImg">
                                        <input type="hidden" name="old_event_img" id="old_event_img">
                                    </div>

                                    <div class="mb-3 col-12 col-md-6">
                                        <label for="recipient-name" class="col-form-label">Event Name <span
                                                class="text-danger">*<span></label>
                                        <input type="text" class="form-control" onkeyup="generateUrl()" name="EventName"
                                            id="EventName" Placeholder="Enter Event Name">
                                    </div>

                                    <div class="mb-3 col-12 col-md-6">
                                        <label for="recipient-name" class="col-form-label">Event URl <span
                                                class="text-danger">*<span></label>
                                        <input type="text" readonly class="form-control" name="Url" id="Url"
                                            Placeholder="Enter Event URl">
                                    </div>

                                    <div class="mb-3 col-12 col-md-6">
                                        <label for="recipient-name" class="col-form-label">Event Start Date <span
                                                class="text-danger">*<span></label>
                                        <input type="text" class="form-control fc-datepicker" name="EventStartDate" id="EventStartDate"
                                            Placeholder="Enter Event Start Date">
                                    </div>
                                    <div class="mb-3 col-12 col-md-6">
                                        <label for="recipient-name" class="col-form-label">Event End Date <span
                                                class="text-danger">*<span></label>
                                        <input type="text" class="form-control fc-datepicker" name="EventEndDate" id="EventEndDate"
                                            Placeholder="Enter Event End Date">
                                    </div>

                                    <div class="mb-3 col-12 col-md-12">
                                        <label for="recipient-name" class="col-form-label">Event Booth  <span
                                                class="text-danger">*<span></label>
                                        <input type="text" class="form-control" name="EventBooth"
                                            id="EventBooth" Placeholder="Enter Event Booth">
                                    </div>

                                    <div class="mb-3 col-12 col-md-12   ">
                                        <label for="recipient-name" class="col-form-label">Event Description <span
                                                class="text-danger">*<span></label>
                                        <textarea cols="10" rows="4" type="text" class="form-control"
                                            name="EventDescription" id="EventDescription"
                                            Placeholder="Enter Event Description"></textarea>
                                    </div>


                                </div>

                                <input type="hidden" id="form_action" name="form_action" value="add" />
                                <input type="hidden" id="form_id" name="form_id" value="-1" />

                                <div class="mt-5 text-center">
                                    <button class="btn btn-success text-white" id="addEventBtn"
                                        onclick="AddUpdateEventForm()"></button>
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
        <script src="../project-assets/js/events.js"></script>

        <!-- DATEPICKER JS -->
        <script src="../theme-assets/plugins/date-picker/date-picker.js"></script>
        <script src="../theme-assets/plugins/date-picker/jquery-ui.js"></script>
        <script src="../theme-assets/plugins/daterangepicker/custom-daterangepicker.js"></script>

        <script src="../theme-assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>

        <!-- INTERNAL Bootstrap-Datepicker js -->
        <script src="../theme-assets/plugins/bootstrap-datepicker/bootstrap-datepicker.js"></script>

        <script type="text/javascript">
        $(document).ready(function() {
            $("#nav_events").addClass("active");
        });

        $('.fc-datepicker').datepicker({
            dateFormat: "yy-mm-dd",
        });
        </script>



</html>
