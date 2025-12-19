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
    <title>Add Gallery Video- <?= $_ProductName ?></title>
    <?php
    include("../include/common-head.php");
    $dbh = new Dbh();
    $conn = $dbh->_connectodb();
    $core = new Core();
    $authentication = new Authentication($conn);
    $UserType = $authentication->SessionCheck();

    ?>


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css">

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
                            <h1 class="page-title">Add Gallery Video</h1>
                            <div>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="../dashboard/admin-dashboard">Home</a></li>
                                    <li class="breadcrumb-item"><a href="./view-all-gallery-video">All Gallery Videos</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Add Gallery Video</li>
                                </ol>
                            </div>
                        </div>
                        <!-- PAGE-HEADER END -->
                        <form id="gallery_video_form" onsubmit="return false;">
                            <div class="row row-sm">
                                <div class="col-lg-8">
                                    <div class="card">
                                        <div class="card-header">
                                            <label for="tags"><b>Gallery Details</b></label>
                                        </div>
                                        <div class="card-body">

                                            <div class="row">


                                                <div class="mb-3 col-12 col-md-12">
                                                    <label for="recipient-name" class="col-form-label">Gallery Title
                                                        <span class="text-danger">* <span></label>
                                                    <input type="text" class="form-control" name="VideoTitle"
                                                        id="VideoTitle" Placeholder="Enter Video Title">
                                                </div>
                                            </div>

                                            <input type="hidden" id="form_action" name="form_action" value="add" />
                                            <input type="hidden" id="form_id" name="form_id" value="-1" />



                                        </div>

                                    </div>

                                    <div class="card">
                                        <div class="card-header">
                                            <label for="tags"><b>Gallery Video </b></label>
                                        </div>
                                        <div class="card-body">

                                            <div class="row">

                                                <div class="mb-3 col-12 col-md-12">
                                                    <label for="recipient-name" class="col-form-label">Embed Video Link </label>
                                                    <textarea cols="30" rows="20" class="form-control"
                                                        name="VideoCode" id="VideoCode"
                                                        Placeholder="Enter Video Code Here"></textarea>
                                                </div>
                                            </div>

                                        </div>
                                    </div>


                                </div>
                                <div class="col-lg-4">

                                    <div class="card product_save_col">
                                        <div class="card-header">
                                            <label for="Action"><b>Action</b></label>
                                        </div>
                                        <div class="card-body">
                                            <div class="d-flex">
                                                <button class="btn btn-success text-white mx-3" id="addGalleryBtn"
                                                    onclick="AddUpdateGalleryVideoForm()"><i class="fa fa-floppy-o"></i>
                                                    Save & Publish</button>
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

         <!-- INTERNAL SUMMERNOTE Editor JS -->
         <script src="../theme-assets/plugins/summernote/summernote1.js"></script>
        <script src="../theme-assets/js/summernote.js"></script>

        <script src="../project-assets/js/gallery-video.js"></script>


        <script type="text/javascript">
        $(document).ready(function() {
            $("#nav_gallery_li").css("display", "block");
            $("#nav_gallery_li").addClass("open");
            $("#nav_gallery").addClass("active");
            $("#nav_all_gallery_video").addClass("active");
        });
        </script>



</html>
