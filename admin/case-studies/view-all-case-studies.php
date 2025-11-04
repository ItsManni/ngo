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
    <title>View All Case Studies - <?= $_ProductName ?></title>
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
                            <h1 class="page-title">All Case Studies</h1>
                            <div>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="../dashboard/admin-dashboard">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">View Case Studies</li>
                                </ol>
                            </div>
                        </div>
                        <!-- PAGE-HEADER END -->

                        <!-- Row -->
                        <div class="row pb-5 justify-content-end">
                            <div class="col-md-4 text-end">
                                <a href="./add-case-studies" class="btn btn-success">Add Case Studies</a>
                            </div>
                        </div>

                        <div class="row row-sm">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered text-nowrap border-bottom"
                                                id="all_case_studies">
                                                <thead>
                                                    <tr>
                                                        <th class="wd-15p border-bottom-0">#</th>
                                                        <th class="wd-15p border-bottom-0">CS Banner</th>
                                                        <th class="wd-15p border-bottom-0">CS Name</th>
                                                        <th class="wd-15p border-bottom-0">CS Date</th>
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
                            <h3 class="modal-title" id="CaseStudiesHeading"></h3>
                            <button class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="case_studies_form" onsubmit="return false;">

                                <div class="row">
                                    <div class="mb-3 col-12 col-md-10">
                                        <label for="recipient-name" class="col-form-label">Case Studies Banner <span
                                                class="text-danger">*<span></label>
                                        <input type="file" class="form-control" name="CSBanner" id="CSBanner">
                                        <input type="hidden" name="old_cs_img" id="old_cs_img">
                                    </div>

                                    <div class="mb-3 col-12 col-md-6">
                                        <label for="recipient-name" class="col-form-label">Case Heading <span
                                                class="text-danger">*<span></label>
                                        <input type="text" class="form-control" onkeyup="generateUrl()" name="Heading"
                                            id="Heading" Placeholder="Enter Case Studies Heading">
                                    </div>

                                    <div class="mb-3 col-12 col-md-6">
                                        <label for="recipient-name" class="col-form-label">Case URl <span
                                                class="text-danger">*<span></label>
                                        <input type="text" readonly class="form-control" name="Url" id="Url"
                                            Placeholder="Enter Case URl">
                                    </div>

                                    <div class="mb-3 col-12 col-md-6">
                                        <label for="recipient-name" class="col-form-label">Case Date <span
                                                class="text-danger">*<span></label>
                                        <input type="text" class="form-control" name="CaseDate" id="CaseDate"
                                            Placeholder="Enter Case Date">
                                    </div>

                                    <div class="mb-3 col-12 col-md-12   ">
                                        <label for="recipient-name" class="col-form-label">Case Description <span
                                                class="text-danger">*<span></label>
                                        <textarea cols="30" rows="4" type="text" class="form-control"
                                            name="CaseDescription" id="CaseDescription"
                                            Placeholder="Enter Case Description"></textarea>
                                    </div>

                                    <div class="mb-3 col-12 col-md-12">
                                        <label for="recipient-name" class="col-form-label">Case Content
                                            <span class="text-danger">*<span></label>
                                        <textarea cols="30" rows="10" type="text" class="form-control summernote"
                                            name="CaseContent" id="CaseContent"
                                            Placeholder="Enter Case Content"></textarea>
                                    </div>


                                </div>

                                <input type="hidden" id="form_action" name="form_action" value="add" />
                                <input type="hidden" id="form_id" name="form_id" value="-1" />

                                <div class="mt-5 text-center">
                                    <button class="btn btn-success text-white" id="addCaseStudiesBtn"
                                        onclick="AddUpdateCaseStudiesForm()"></button>
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
        // include("../include/common-script-v2.php");
        include("../include/common-script-datatables.php");
        ?>

        <!-- INTERNAL SUMMERNOTE Editor JS -->
        <script src="../theme-assets/plugins/summernote/summernote1.js"></script>
        <script src="../theme-assets/js/summernote.js"></script>


        <script src="../project-assets/js/case-studies.js"></script>
        <script type="text/javascript">
        $(document).ready(function() {
            $("#nav_case_studies_li").css("display", "block");
            $("#nav_case_studies_li").addClass("open");
            $("#nav_case_studies").addClass("active");
            $("#nav_all_case_studies").addClass("active");
        });
        </script>

</html>
