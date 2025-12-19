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
    <title>Update Gallery  - <?= $_ProductName ?></title>
    <?php
    include("../include/common-head.php");
    $dbh = new Dbh();
    $conn = $dbh->_connectodb();
    $core = new Core();
    $authentication = new Authentication($conn);
    $UserType = $authentication->SessionCheck();
    $encrypt = new Encryption();
    $GalleryID = -1;

    if(isset($_GET['GalleryID'])){
        $GalleryID= $_GET['GalleryID'];
    }

    $Gallery = new Gallery($conn);
    $gallery_details_data = $Gallery->GetGalleryDetailsbyID($GalleryID);

    $all_gallery_images = $Gallery->GetAllGalleryImagesByGalleryID($GalleryID);

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
                            <h1 class="page-title">Update Gallery </h1>
                            <div>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="../dashboard/admin-dashboard">Home</a></li>
                                    <li class="breadcrumb-item"><a href="./view-all-gallery">All Gallery Images</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Update Gallery </li>
                                </ol>
                            </div>
                        </div>
                        <!-- PAGE-HEADER END -->
                        <form id="gallery_form" onsubmit="return false;">

                            <div class="row row-sm">
                                <div class="col-lg-8">
                                    <div class="card">
                                        <div class="card-header">
                                            <label for="tags"><b>Gallery  Details</b></label>
                                        </div>
                                        <div class="card-body">


                                            <div class="row align-items-center">


                                                <div class="mb-3 col-12 col-md-12">
                                                    <label for="recipient-name" class="col-form-label">Gallery Title<span
                                                            class="text-danger">*<span></label>
                                                    <input type="text" class="form-control"
                                                        name="GalleryTitle" id="GalleryTitle" Placeholder="Enter Gallery Title"
                                                        value="<?php echo $gallery_details_data['Title'];?>" onkeyup="generateUrl()">
                                                </div>

                                                <div class="mb-3 col-12 col-md-12">
                                                    <label for="recipient-name" class="col-form-label">Gallery URl <span
                                                            class="text-danger">*<span></label>
                                                    <input type="text" readonly class="form-control" name="Url" id="Url"
                                                        Placeholder="Enter Gallery URl"  value="<?php echo $gallery_details_data['Url'];?>">
                                                </div>


                                            </div>

                                            <input type="hidden" id="form_action" name="form_action" value="update" />
                                            <input type="hidden" id="form_id" name="form_id"
                                                value="<?php echo $gallery_details_data['ID'];?>" />



                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-header justify-content-between">
                                            <label for="tags"><b>Image Gallery</b></label>
                                            <span class="btn btn-primary" onclick="AddGalleryImage()">Add Images
                                                <a><i class="fe fe-plus"></i></a>
                                            </span>
                                        </div>
                                        <div class="card-body">

                                            <div id="gallery_body_div">
                                            <?php
                                            $i = 1;
                                            foreach ($all_gallery_images as $gallery_image) {
                                                echo "
                                                <div class='row border mb-2 align-items-center' id='gallery_row_" . $i . "'>
                                                    <div class='mb-3 col-md-6 col-6'>
                                                        <label for='recipient-name' class='col-form-label'>Upload File <span class='text-danger'>( 1080px x 1080px only jpg, png, webp )</span></label>
                                                        <input type='file' class='form-control' name='GalleryImage[]' id='gallery_image_" . $i . "' accept='image/png, image/jpg, image/jpeg, image/webp'/>
                                                    </div>
                                                    <div class='mb-0 col-3 col-md-3'>
                                                            <img src='../project-assets/admin-media/gallery/maingallery/". $gallery_image['GalleryImage'] . "' alt='' width='100px' height='60px'>
                                                        </div>
                                                    <div class='col-3 mt-4'>
                                                        <a onclick='PermaDeleteApplicationGallery(" . $gallery_image['ID'] . ")' class='btn btn-danger mt-4 text-white'>
                                                            Delete
                                                        </a>
                                                    </div>
                                                </div>
                                                <input type='hidden' name='GalleryID[]' value='" . $gallery_image['ID'] . "'>";

                                                $i++;
                                            }
                                            ?>

                                            </div>

                                            <input type="hidden" id="new_gallery_counter" value=<?php echo $i; ?> />

                                        </div>
                                    </div>


                                </div>

                                <div class="col-lg-4">


                                    <div class="card">
                                        <div class="card-header flex-column align-items-start">
                                            <label for="FeatureImage"><b>Gallery Feature Image  <span class='text-danger'>*</span></b></label>
                                            <span class="text-danger"> ( 1280px X 720px only jpg, png, webp ) </span>
                                        </div>
                                        <div class="card-body">
                                            <div class="mb-3 col-12 col-md-12">

                                                <input type="file" class="form-control" name="FeatureImage" id="FeatureImage"
                                                    accept="image/png, image/jpg, image/jpeg, image/webp">
                                                <input type="hidden" name="old_feature_img" id="old_feature_img"
                                                    value="<?php echo $gallery_details_data['FeatureImage'];?>">
                                            </div>
                                            <?php if($gallery_details_data['FeatureImage'] != ""){?>
                                            <div class="col-12 col-md-12">
                                                <img width="50%"
                                                    src="../project-assets/admin-media/gallery/featureimg/<?php echo $gallery_details_data['FeatureImage'];?>"
                                                    alt="">
                                            </div>
                                            <?php } ?>

                                        </div>
                                    </div>

                                    <div class="card product_save_col">
                                        <div class="card-header">
                                            <label for="tags"><b>Action :</b></label>
                                        </div>
                                        <div class="card-body">
                                            <div class="d-flex">
                                                <button class="btn btn-success text-white mx-3" id="addBlogBtn"
                                                    onclick="AddUpdateGalleryForm()"><i class="fa fa-floppy-o"></i>
                                                    Save & Update</button>
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
        <script src="../project-assets/js/gallery.js"></script>

        <script type="text/javascript">
        $(document).ready(function() {
            $("#nav_gallery_li").css("display", "block");
            $("#nav_gallery_li").addClass("open");
            $("#nav_gallery").addClass("active");
            $("#nav_all_gallery").addClass("active");
        });

        </script>


</html>
