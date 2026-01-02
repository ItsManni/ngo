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

    <title>View All Gallery Images - <?= $_ProductName ?></title>

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

                            <h1 class="page-title">All Gallery Images</h1>

                            <div>

                                <ol class="breadcrumb">

                                    <li class="breadcrumb-item"><a href="../dashboard/admin-dashboard">Home</a></li>

                                    <li class="breadcrumb-item active" aria-current="page">View Gallery Images</li>

                                </ol>

                            </div>

                        </div>

                        <!-- PAGE-HEADER END -->



                        <!-- Row -->

                        <div class="row pb-5 justify-content-end">

                            <div class="col-md-4 text-end">

                                <a href="./add-gallery-unified" class="btn btn-success">Add Gallery Images</a>

                            </div>

                        </div>



                        <div class="row row-sm">

                            <div class="col-lg-12">

                                <div class="card">
                        <div class="card-body">
                            <!-- Tabs Navigation -->
                            <ul class="nav nav-tabs mb-3" id="galleryTabs" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="images-tab" data-bs-toggle="tab" data-bs-target="#images"
                                        type="button" role="tab" aria-controls="images" aria-selected="true">
                                        Images
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="videos-tab" data-bs-toggle="tab" data-bs-target="#videos"
                                        type="button" role="tab" aria-controls="videos" aria-selected="false">
                                        Videos
                                    </button>
                                </li>
                            </ul>

                        <!-- Tabs Content -->
                        <div class="tab-content" id="galleryTabsContent">
                            <!-- Images Tab -->
                            <div class="tab-pane fade show active" id="images" role="tabpanel" aria-labelledby="images-tab">
                                <div class="table-responsive">
                                    <table class="table table-bordered text-nowrap border-bottom w-100" id="all_gallery_images" style="width: 100% !important;">
                                        <thead>
                                            <tr>
                                                <th style="width: 8%;">#</th>
                                                <th style="width: 20%;">Feature Image</th>
                                                <th style="width: 50%;">Gallery Title</th>
                                                <th style="width: 22%;">Action</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>

            <!-- Videos Tab -->
                            <div class="tab-pane fade" id="videos" role="tabpanel" aria-labelledby="videos-tab">
                                <div class="table-responsive">
                                    <table class="table table-bordered text-nowrap border-bottom w-100" id="all_gallery_videos" style="width: 100% !important;">
                                        <thead>
                                            <tr>
                                                <th style="width: 8%;">#</th>
                                                <th style="width: 20%;">Video Thumbnail</th>
                                                <th style="width: 50%;">Video Title</th>
                                                <th style="width: 22%;">Action</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
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

        <script src="../project-assets/js/gallery-unified.js"></script>



        <script type="text/javascript">

        $(document).ready(function() {

            $("#nav_gallery_li").css("display", "block");

            $("#nav_gallery_li").addClass("open");

            $("#nav_gallery").addClass("active");

            $("#nav_all_gallery").addClass("active");

        });

        </script>

</html>

<style>
    .table-responsive {
        width: 100%;
    }
    
    #all_gallery_images, #all_gallery_videos {
        width: 100% !important;
        table-layout: fixed;
    }
    
    #all_gallery_images thead th, #all_gallery_videos thead th {
        width: auto;
    }
    
    .dataTables_wrapper {
        width: 100%;
    }
    
    .dataTables_wrapper .dataTables_length,
    .dataTables_wrapper .dataTables_filter,
    .dataTables_wrapper .dataTables_info,
    .dataTables_wrapper .dataTables_paginate {
        margin: 0;
    }
    
    .dataTables_wrapper .dataTables_length {
        float: left;
    }
    
    .dataTables_wrapper .dataTables_filter {
        float: right;
    }
    
    .dataTables_wrapper .dataTables_info {
        float: left;
    }
    
    .dataTables_wrapper .dataTables_paginate {
        float: right;
    }
</style>

