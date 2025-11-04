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
    <title>View All Donations - <?= $_ProductName ?></title>
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
                            <h1 class="page-title">All Donations</h1>
                            <div>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="../dashboard/admin-dashboard">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">View All Donations</li>
                                </ol>
                            </div>
                        </div>
                        <!-- PAGE-HEADER END -->

                        <!-- Row -->
                        <form id="export_fillter_form">
                            <div class="row pb-5 justify-content-end">
                                <div class="col-md-4 text-end">
                                    <span onclick="ExportDonationsData()" class="btn btn-success">Export CSV File</span>
                                </div>
                            </div>
                        </form>

                        <div class="row row-sm">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered text-nowrap border-bottom"
                                                id="all_donations">
                                                <thead>
                                                    <tr>
                                                        <th class="wd-15p border-bottom-0">#</th>
                                                        <th class="wd-15p border-bottom-0">Name</th>
                                                        <th class="wd-15p border-bottom-0">Email / Phone Number</th>
                                                        <th class="wd-15p border-bottom-0">View Details</th>
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

            <div class="modal fade" id="add_case_studies">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content modal-content-demo">
                        <div class="modal-header">
                            <h3 class="modal-title" id="CaseStudiesHeading">Donation Details</h3>
                            <button class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div id="enquiries_body_div">

                            </div>
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

        <script type="text/javascript">
        $(document).ready(function() {
            $("#nav_donations_li").css("display", "block");
            $("#nav_donations_li").addClass("open");
            $("#nav_donations").addClass("active");
            $("#nav_all_donations").addClass("active");
        });

        // $('.fc-datepicker').datepicker({
        //     dateFormat: "yy-mm-dd",
        // });

        function ExportDonationsData() {
            $.ajax({
                url: "action/export_donations.php",
                type: "POST",
                data: $("#export_fillter_form").serialize(),
                success: function(data) {
                    var xlsFilePath = "./export.xls";

                    var anchor = document.createElement("a");
                    anchor.href = xlsFilePath;
                    anchor.download = "all-donations-data.xls";
                    anchor.click();
                },
            });
            return false;
        }

        function ViewEnquiresDetails(enquiries_id) {
            $.post(
                "ajax/load-donations-details.php", {
                    enquiries_id: enquiries_id,
                },
                function(data, status) {

                    $("#enquiries_body_div").empty();
                    $("#enquiries_body_div").append(data);
                    $("#add_case_studies").modal("show");
                }
            );
        }

        $(document).ready(function() {
            var i = 1;
            $("#all_donations").dataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                ordering: false,
                serverMethod: "post",
                ajax: {
                    url: "ajax/view-all-donations-post.php",
                },
                columnDefs: [{
                    targets: [0],
                    className: "text-center",
                }, ],
                order: [
                    [1, "asc"]
                ],
                columns: [{
                        data: "id",
                        render: function(data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        },
                    },
                    {
                        data: "Name",
                    },
                    {
                        data: "EmailPhoneNumber",
                    },
                    {
                        data: "ViewDetails"
                    },
                    {
                        data: "Action",
                    },
                ],
            });
        });
        </script>



</html>
