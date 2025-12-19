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
    <title>View All Blogs - <?= $_ProductName ?></title>
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
                            <h1 class="page-title">All Blogs</h1>
                            <div>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="../dashboard/admin-dashboard">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">View Blogs</li>
                                </ol>
                            </div>
                        </div>
                        <!-- PAGE-HEADER END -->

                        <!-- Row -->
                        <div class="row pb-5 justify-content-end">
                            <div class="col-md-4 text-end">
                                <a href="./add-blog" class="btn btn-success">Add Blog</a>
                            </div>
                        </div>

                        <div class="row row-sm">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered text-nowrap border-bottom"
                                                id="all_blogs">
                                                <thead>
                                                    <tr>
                                                        <th class="wd-15p border-bottom-0">#</th>
                                                        <th class="wd-15p border-bottom-0">Blogs Banner</th>
                                                        <th class="wd-15p border-bottom-0">Blogs Name</th>
                                                        <th class="wd-15p border-bottom-0">View</th>
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

            <div class="modal fade" id="add_blog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content modal-content-demo">
                        <div class="modal-header">
                            <h3 class="modal-title" id="BlogHeading"></h3>
                            <button class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="blog_form" onsubmit="return false;">

                                <div class="row">
                                    <div class="mb-3 col-12 col-md-12   ">
                                        <label for="recipient-name" class="col-form-label">Blog Banner <span
                                                class="text-danger">*<span></label>
                                        <input type="file" class="form-control" name="BlogImg" id="BlogImg">
                                        <input type="hidden" name="old_blog_img" id="old_blog_img">
                                    </div>

                                    <div class="mb-3 col-12 col-md-6">
                                        <label for="recipient-name" class="col-form-label">Blog Name <span
                                                class="text-danger">*<span></label>
                                        <input type="text" class="form-control" onkeyup="generateUrl()" name="BlogName"
                                            id="BlogName" Placeholder="Enter Blog Name">
                                    </div>

                                    <div class="mb-3 col-12 col-md-6">
                                        <label for="recipient-name" class="col-form-label">Blog URl <span
                                                class="text-danger">*<span></label>
                                        <input type="text" readonly class="form-control" name="Url" id="Url"
                                            Placeholder="Enter Blog URl">
                                    </div>

                                    <div class="mb-3 col-12 col-md-12   ">
                                        <label for="recipient-name" class="col-form-label">Blog Description <span
                                                class="text-danger">*<span></label>
                                        <textarea cols="30" rows="10" type="text" class="form-control"
                                            name="BlogDescription" id="BlogDescription"
                                            Placeholder="Enter Blog Description"></textarea>
                                    </div>


                                </div>

                                <input type="hidden" id="form_action" name="form_action" value="add" />
                                <input type="hidden" id="form_id" name="form_id" value="-1" />

                                <div class="mt-5 text-center">
                                    <button class="btn btn-success text-white" id="addBlogBtn"
                                        onclick="AddUpdateBlogForm()"></button>
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
        <script src="../project-assets/js/blog.js"></script>

        <script type="text/javascript">
        $(document).ready(function() {
            $("#nav_blogs_li").css("display", "block");
            $("#nav_blogs_li").addClass("open");
            $("#nav_blogs").addClass("active");
            $("#nav_all_blogs").addClass("active");
        });

        $('.fc-datepicker').datepicker({
            dateFormat: "yy-mm-dd",
        });
        </script>



</html>
