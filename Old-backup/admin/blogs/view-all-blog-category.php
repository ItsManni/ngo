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
    <title>View Blog Category</title>
    <?php
        include("../include/common-head.php");
        $dbh = new Dbh();
        $conn = $dbh->_connectodb();
        $Blog = new Blog($conn);
        $core = new Core();
        $All_blog_category = $Blog->GetAllCategory();
        $authentication = new Authentication($conn);
        $UserType = $authentication->SessionCheck();
    ?>

</head>



<body class="app sidebar-mini ltr light-mode">
    <div class="page">
        <div class="page-main">
            <?php
            include("../navigation/top-header.php");
            ?>

            <?php
            include("../navigation/side-navigation.php");
            ?>

            <!--app-content open-->
            <div class="main-content app-content mt-0">
                <div class="side-app">
                    <!-- CONTAINER -->
                    <div class="main-container container-fluid">
                        <!-- PAGE-HEADER -->
                        <div class="page-header row align-items-center justify-content-between">
                            <!-- <h1 class="page-title">DigitalWorkDesk Dashboard</h1> -->
                            <div class="col-md-6">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Blog Category</li>
                                </ol>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-md-12 col-12">
                                <div class="card ">
                                    <div class="card-header d-flex justify-content-between align-items-center">
                                        <h3 class="card-title">Blog Category</h3>
                                        <a class="btn btn-info" onclick="AddCategory()">Add Category</a>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered text-nowrap border-bottom"
                                                id="all_lead_source">
                                                <tbody>
                                                    <?php
                                                        foreach($All_blog_category as $blog_category)
                                                        {
                                                        ?>
                                                    <tr>
                                                        <td class="wd-15p border-bottom-0">
                                                            <?= $blog_category['CategoryName']; ?></td>
                                                        <td class="wd-15p border-bottom-0">
                                                            <a class="btn text-danger btn-sm"
                                                                onclick="UpdateCategory_modal(<?=$blog_category['ID'];?>)">
                                                                <span class="fa fa-pencil-square-o fs-14"></span>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                        }
                                                        ?>

                                                </tbody>

                                            </table>
                                        </div>
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
        ?>
        <script>
        $("#nav_blogs_li").css("display", "block");
        $("#nav_blogs_li").addClass("open");
        $("#nav_blogs").addClass("active");
        $("#nav_blog_category").addClass("active");
        </script>

        <div class="modal fade" tabindex="-1" id="modal_blog_category">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content modal-content-demo">
                    <div class="modal-header">
                        <h3 class="modal-title" id="CategoryHeading"></h3>
                        <button class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="category_form" onsubmit="return false;">
                            <input type="hidden" name="category_form_action" id="category_form_action" value="add" />
                            <input type="hidden" name="category_form_id" id="category_form_id" value="-1" />
                            <div class="row">
                                <div class="form-group col-md-12 mb-3">
                                    <label for="recipient-name" class="col-form-label">Category Name</label>
                                    <input type="text" class="form-control" onkeyup="generateUrl()" name="Category"
                                        id="Category" Placeholder="Enter Category Name">
                                </div>
                                <div class="mb-3 col-12 col-md-12">
                                    <label for="recipient-name" class="col-form-label"> URl <span
                                            class="text-danger">*<span></label>
                                    <input type="text" readonly class="form-control" name="Url" id="Url"
                                        Placeholder="Enter Category URl">
                                </div>
                            </div>

                            <div class="mt-5 text-center">
                                <button class="btn btn-success text-white" id="addCategoryBtn"
                                    onclick="AddUpdateCategoryForm()">Add</button>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script src="../project-assets/js/blog-category.js"></script>
</body>

</html>
