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
    <title>View All Static Pages - <?= $_ProductName ?></title>
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
                            <h1 class="page-title">All Static Pages</h1>
                            <div>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="../dashboard/admin-dashboard">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">View Static Pages</li>
                                </ol>
                            </div>
                        </div>
                        <!-- PAGE-HEADER END -->

                        <!-- Row -->
                        <div class="row pb-5 justify-content-end">
                            <div class="col-md-4 text-end">
                                <span onclick="AddSeoPage()" class="btn btn-success">Add Static Page</span>
                            </div>
                        </div>

                        <div class="row row-sm">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered text-nowrap border-bottom"
                                                id="all_static_pages">
                                                <thead>
                                                    <tr>
                                                        <th class="wd-15p border-bottom-0">#</th>
                                                        <th class="wd-15p border-bottom-0">Name</th>
                                                        <th class="wd-15p border-bottom-0">Url</th>
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

            <div class="modal fade" id="add_static_page">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content modal-content-demo">
                        <div class="modal-header">
                            <h3 class="modal-title" id="SeoPageHeading"></h3>
                            <button class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="static_page_form" onsubmit="return false;">

                                <div class="row">
                                    <div class="mb-3 col-12 col-md-6">
                                        <label for="recipient-name" class="col-form-label">Page Name <span
                                                class="text-danger">*<span></label>
                                        <input type="text" class="form-control" onkeyup="generateUrl()" name="PageName"
                                            id="PageName" Placeholder="Enter Page Name">
                                    </div>

                                    <div class="mb-3 col-12 col-md-6">
                                        <label for="recipient-name" class="col-form-label">Page URl <span
                                                class="text-danger">*<span></label>
                                        <input type="text" readonly class="form-control" name="Url" id="Url"
                                            Placeholder="Enter Page URl">
                                    </div>

                                    <div class="mb-3 col-12 col-md-12">
                                        <label for="recipient-name" class="col-form-label">Meta Title</label>
                                        <input type="text" class="form-control" name="MetaTitle" id="MetaTitle"
                                            Placeholder="Enter Meta Title">
                                    </div>
                                    <div class="mb-3 col-12 col-md-12">
                                        <label for="recipient-name" class="col-form-label">Meta Description </label>
                                        <input type="text" class="form-control" name="MetaDescription" id="MetaDescription"
                                            Placeholder="Enter Meta Description">
                                    </div>
                                    <div class="mb-3 col-12 col-md-12">
                                        <label for="recipient-name" class="col-form-label">Meta Keywords</label>
                                        <input type="text" class="form-control"
                                            name="MetaKeywords" id="MetaKeywords"
                                            Placeholder="Enter Meta Keywords">
                                    </div>

                                    <div class="mb-3 col-12 col-md-12">
                                        <label for="recipient-name" class="col-form-label">OG Title</label>
                                        <input type="text" class="form-control" name="OGTitle" id="OGTitle"
                                            Placeholder="Enter OG Title">
                                    </div>
                                    <div class="mb-3 col-12 col-md-12">
                                        <label for="recipient-name" class="col-form-label">OG Description </label>
                                        <input type="text" class="form-control" name="OGDescription" id="OGDescription"
                                            Placeholder="Enter OG Description">
                                    </div>
                                    <div class="mb-3 col-12 col-md-12">
                                        <label for="recipient-name" class="col-form-label">OG Image</label>
                                        <input type="file" class="form-control" name="OGImage" id="OGImage">
                                        <input type="hidden" name="old_og_image" id="old_og_image">
                                    </div>


                                </div>

                                <input type="hidden" id="form_action" name="form_action" value="add" />
                                <input type="hidden" id="form_id" name="form_id" value="-1" />

                                <div class="mt-5 text-center">
                                    <button class="btn btn-success text-white" id="addSeoPageBtn"
                                        onclick="AddUpdateSeoPageForm()"></button>
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
        <script src="../project-assets/js/seo-page.js"></script>



        <script type="text/javascript">
        $(document).ready(function() {
            $("#nav_websiteedit_li").css("display", "block");
            $("#nav_websiteedit_li").addClass("open");
            $("#nav_websiteedit").addClass("active");
            $("#nav_seo_pages").addClass("active");
        });


        </script>



</html>
