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
    <title>Add Blog & Articles - <?= $_ProductName ?></title>
    <?php
    include("../include/common-head.php");
    $dbh = new Dbh();
    $conn = $dbh->_connectodb();
    $core = new Core();
    $authentication = new Authentication($conn);
    $UserType = $authentication->SessionCheck();
    $Blog = new Blog($conn);
    $All_blog_category = $Blog->GetAllCategory();

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
                            <h1 class="page-title">Add Blogs & Articles </h1>
                            <div>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="../dashboard/admin-dashboard">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Add Blog & Articles </li>
                                </ol>
                            </div>
                        </div>
                        <!-- PAGE-HEADER END -->
                        <form id="blog_form" onsubmit="return false;">
                            <div class="row row-sm">
                                <div class="col-lg-8">
                                    <div class="card">
                                        <div class="card-header">
                                            <label for="tags"><b>Blog & Articles Details</b></label>
                                        </div>
                                        <div class="card-body">

                                            <div class="row">


                                                <div class="mb-3 col-12 col-md-12">
                                                    <label for="recipient-name" class="col-form-label">Blog Name <span
                                                            class="text-danger">* <span></label>
                                                    <input type="text" class="form-control" onkeyup="generateUrl()"
                                                        name="BlogName" id="BlogName" Placeholder="Enter Blog Name">
                                                </div>

                                                <div class="mb-3 col-12 col-md-12">
                                                    <label for="recipient-name" class="col-form-label">Blog URl <span
                                                            class="text-danger">*<span></label>
                                                    <input type="text" readonly class="form-control" name="Url" id="Url"
                                                        Placeholder="Enter Blog URl">
                                                </div>


                                                <div class="mb-3 col-12 col-md-12   ">
                                                    <label for="recipient-name" class="col-form-label"> Description
                                                        <span class="text-danger">*<span></label>
                                                    <textarea cols="30" rows="5" type="text" class="form-control"
                                                        name="ShortDescription" id="ShortDescription"
                                                        Placeholder="Enter Blog Description"></textarea>
                                                </div>

                                                <div class="mb-3 col-12 col-md-12">
                                                    <label for="recipient-name" class="col-form-label">Blog Content
                                                        <span class="text-danger">*<span></label>
                                                    <textarea cols="30" rows="20" type="text"
                                                        class="form-control summernote" name="BlogDescription"
                                                        id="summernote" Placeholder="Enter Blog Description"></textarea>
                                                </div>



                                            </div>

                                            <input type="hidden" id="form_action" name="form_action" value="add" />
                                            <input type="hidden" id="form_id" name="form_id" value="-1" />



                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-header">
                                            <label for="tags"><b>Search Engine Optimize</b></label>
                                        </div>

                                        <div class="card-body">

                                            <div class="row">
                                                <div class="mb-3 col-12 col-md-12">
                                                    <label for="recipient-name" class="col-form-label">Meta Title
                                                        <span class='text-danger'>( 50-60 Characters )</span>
                                                    </label>
                                                    <input type="text" class="form-control" name="MetaTitle"
                                                        id="MetaTitle" Placeholder="Enter Meta Title">
                                                </div>

                                                <div class="mb-3 col-12 col-md-12">
                                                    <label for="recipient-name" class="col-form-label">Meta Description
                                                        <span class='text-danger'>( 150-160 Characters )</span>
                                                    </label>
                                                    <input type="text" class="form-control" name="MetaDescription"
                                                        id="MetaDescription" Placeholder="Enter Meta Description">
                                                </div>
                                                <div class="mb-3 col-12 col-md-12">
                                                    <label for="recipient-name" class="col-form-label">OG Title <span
                                                            class='text-danger'>( 50-60 Characters )</span>
                                                    </label>
                                                    <input type="text" class="form-control" name="OGTitle" id="OGTitle"
                                                        Placeholder="Enter OG Title">
                                                </div>

                                                <div class="mb-3 col-12 col-md-12">
                                                    <label for="recipient-name" class="col-form-label">OG Description
                                                        <span class='text-danger'>( 150-160 Characters )</span>
                                                    </label>
                                                    <input type="text" class="form-control" name="OGDescription"
                                                        id="OGDescription" Placeholder="Enter OG Description">
                                                </div>

                                                <div class="mb-3 col-12 col-md-12">
                                                    <label for="recipient-name" class="col-form-label">OG Image <span
                                                            class='text-danger'>( only jpg, png, webp)</span>
                                                    </label>
                                                    <input type="file" class="form-control" name="OGImage" id="OGImage"
                                                        accept="image/png, image/jpg, image/jpeg, image/webp">
                                                </div>

                                                <!-- <div class="mb-3 col-12 col-md-12   ">
                                                    <label for="recipient-name" class="col-form-label">Blog Description
                                                        <span class="text-danger">*<span></label>
                                                    <textarea cols="30" rows="20" type="text"
                                                        class="form-control content" name="BlogDescription"
                                                        id="BlogDescription"
                                                        Placeholder="Enter Blog Description"></textarea>
                                                </div> -->


                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="card">
                                        <div class="card-header">
                                            <label for="Category"><b>Category:</b></label>
                                        </div>
                                        <div class="card-body">
                                            <select name="Category" id="Category" class="form-control">
                                                <option value="">Select Category</option>
                                                <?php

                                                    foreach($All_blog_category as $blog_category)
                                                    {
                                                ?>
                                                <option value="<?php echo $blog_category['Url']; ?>">
                                                    <?php echo $blog_category['CategoryName']; ?></option>

                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header">
                                            <label for="tags"><b>Tags:</b></label>
                                        </div>
                                        <div class="card-body">
                                            <input id="Tags" name="Tags" placeholder="Enter Tags" class="form-control">

                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-header">
                                            <label for="Status"><b>Status </b></label>
                                        </div>
                                        <div class="card-body">
                                            <select name="Status" id="Status"
                                                class="form-control form-select is-valid state-valid">
                                                <option value="Published">Published</option>
                                                <option value="Draft">Draft</option>
                                            </select>

                                        </div>
                                    </div>

                                    <div class="card">

                                        <div class="card-header flex-column align-items-start">
                                            <label for="BlogImg"><b>Feature Image / Blog Banner <span
                                                        class='text-danger'>*</span></b> </label>
                                            <span class="text-danger">( 1280px X 720px only jpg, png, webp ) </span>
                                        </div>
                                        <div class="card-body">
                                            <div class="">
                                                <input type="file" class="form-control" name="BlogImg" id="BlogImg"
                                                    accept="image/png, image/jpg, image/jpeg, image/webp">
                                                <input type="hidden" name="old_blog_img" id="old_blog_img">
                                            </div>

                                        </div>
                                    </div>

                                    <div class="card product_save_col">
                                        <div class="card-header">
                                            <label for="Action"><b>Action</b></label>
                                        </div>
                                        <div class="card-body">
                                            <div class="d-flex">
                                                <button class="btn btn-success text-white mx-3" id="addBlogBtn"
                                                    onclick="AddUpdateBlogForm()"><i class="fa fa-floppy-o"></i>
                                                    Save & Submit</button>
                                                <!-- <button class="btn btn-info text-white" id="addBlogBtn"
                                                    onclick="AddUpdateBlogForm()"><i class="fa fa-sign-out"></i> Save &
                                                    Exit</button> -->
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
        <script src="../project-assets/js/blog.js"></script>

        <!-- INTERNAL WYSIWYG Editor JS -->
        <!-- <script src="../theme-assets/plugins/wysiwyag/jquery.richtext.js"></script>
        <script src="../theme-assets/plugins/wysiwyag/wysiwyag.js"></script> -->

        <!-- INTERNAL SUMMERNOTE Editor JS -->
        <script src="../theme-assets/plugins/summernote/summernote1.js"></script>
        <script src="../theme-assets/js/summernote.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.min.js"></script>


        <script type="text/javascript">
        $(document).ready(function() {
            $("#nav_blogs_li").css("display", "block");
            $("#nav_blogs_li").addClass("open");
            $("#nav_blogs").addClass("active");
            $("#nav_add_blogs").addClass("active");
        });
        </script>

        <script>
        document.addEventListener('DOMContentLoaded', function() {
            var input = document.querySelector('input[name=Tags]');
            var tagify = new Tagify(input);
        });
        </script>



</html>
