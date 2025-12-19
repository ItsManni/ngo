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
    <title>Add News & PR - <?= $_ProductName ?></title>
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
                            <h1 class="page-title">Add News & PR </h1>
                            <div>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="../dashboard/admin-dashboard">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Add News & PR </li>
                                </ol>
                            </div>
                        </div>
                        <!-- PAGE-HEADER END -->
                        <form id="news_pr_form" onsubmit="return false;">
                            <div class="row row-sm">
                                <div class="col-lg-9">
                                    <div class="card">
                                        <div class="card-header">
                                            <label for="tags"><b>News & PR Details</b></label>
                                        </div>
                                        <div class="card-body">


                                            <div class="row">
                                                <div class="mb-3 col-12 col-md-10">
                                                    <label for="recipient-name" class="col-form-label">News & PR
                                                        Banner <span class="text-danger">* ( 1280px X 720px only jpg,
                                                            png, webp )<span></label>
                                                    <input type="file" class="form-control" name="NewsBanner"
                                                        id="NewsBanner"
                                                        accept="image/png, image/jpg, image/jpeg, image/webp">
                                                    <input type="hidden" name="old_cs_img" id="old_cs_img">
                                                </div>

                                                <div class="mb-3 col-12 col-md-6">
                                                    <label for="recipient-name" class="col-form-label">Heading
                                                        <span class="text-danger">*<span></label>
                                                    <input type="text" class="form-control" onkeyup="generateUrl()"
                                                        name="Heading" id="Heading"
                                                        Placeholder="Enter News & PR Heading">
                                                </div>

                                                <div class="mb-3 col-12 col-md-6">
                                                    <label for="recipient-name" class="col-form-label">URl <span
                                                            class="text-danger">*<span></label>
                                                    <input type="text" readonly class="form-control" name="Url" id="Url"
                                                        Placeholder="Enter URl">
                                                </div>

                                                <div class="mb-3 col-12 col-md-6">
                                                    <label for="recipient-name" class="col-form-label">News Date <span
                                                            class="text-danger">*<span></label>
                                                    <input type="text" class="form-control fc-datepicker"
                                                        name="NewsDate" id="NewsDate" Placeholder="Enter News Date">
                                                </div>

                                                <div class="mb-3 col-12 col-md-12   ">
                                                    <label for="recipient-name" class="col-form-label">News Description
                                                        <span class="text-danger">*<span></label>
                                                    <textarea cols="30" rows="4" type="text" class="form-control"
                                                        name="NewsDescription" id="NewsDescription"
                                                        Placeholder="Enter News Description"></textarea>
                                                </div>

                                                <div class="mb-3 col-12 col-md-12">
                                                    <label for="recipient-name" class="col-form-label">News Content
                                                        </label>
                                                    <textarea cols="30" rows="10" type="text"
                                                        class="form-control summernote" name="NewsContent"
                                                        id="NewsContent" Placeholder="Enter News Content"></textarea>
                                                </div>


                                            </div>

                                            <input type="hidden" id="form_action" name="form_action" value="add" />
                                            <input type="hidden" id="form_id" name="form_id" value="-1" />

                                        </div>
                                    </div>

                                </div>
                                <div class="col-lg-3">
                                    <div class="card">
                                        <div class="card-header">
                                            <label for="tags"><b>Status </b></label>
                                        </div>
                                        <div class="card-body">
                                            <select name="Status" id="Status"
                                                class="form-control form-select is-valid state-valid">
                                                <option value="Published">Published</option>
                                                <option value="Draft">Draft</option>
                                            </select>

                                        </div>
                                    </div>

                                    <div class="card product_save_col">
                                        <div class="card-header">
                                            <label for="Action"><b>Action</b></label>
                                        </div>
                                        <div class="card-body">
                                            <div class="d-flex">
                                                <button class="btn btn-success text-white mx-3" id="addCaseStudiesBtn"
                                                    onclick="AddUpdateNewsPRForm()"><i class="fa fa-floppy-o"></i>
                                                    Save & Submit</button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- End Row -->

                    </div>
                    <!-- CONTAINER END -->
                </div>
            </div>
            <!--app-content close-->


            <?php
       include("../navigation/right-side-navigation.php");
        ?>

        </div>

        <?php
        include("../include/common-script.php");
        // include("../include/common-script-v2.php");
        include("../include/common-script-datatables.php");
        ?>
        <script src="../project-assets/js/news-pr.js"></script>

        <!-- INTERNAL SUMMERNOTE Editor JS -->
        <script src="../theme-assets/plugins/summernote/summernote1.js"></script>
        <script src="../theme-assets/js/summernote.js"></script>

        <!-- DATEPICKER JS -->
        <script src="../theme-assets/plugins/date-picker/date-picker.js"></script>
        <script src="../theme-assets/plugins/date-picker/jquery-ui.js"></script>

        <script type="text/javascript">
        $(document).ready(function() {
            $("#nav_news_pr_li").css("display", "block");
            $("#nav_news_pr_li").addClass("open");
            $("#nav_news_pr").addClass("active");
            $("#nav_add_news_pr").addClass("active");
            $(".fc-datepicker").datepicker({
                showOtherMonths: true,
                selectOtherMonths: true,
                dateFormat: "yy-mm-dd" // Change the format to 2025-01-15
            });
        });
        </script>


</html>
