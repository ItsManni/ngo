<?php
@session_start();
require_once('../include/autoloader.inc.php');
$conf = new Conf();
$_ProductName = $conf->_ProductName;
$_ProductLogo = $conf->_ProductLogo;

$dbh = new Dbh();
$conn = $dbh->_connectodb();
$core = new Core();
$authentication = new Authentication($conn);
$UserType = $authentication->SessionCheck();

$galleryManager = new GalleryManager($conn);
$imageId = $_GET['id'] ?? 0;
$imageData = $galleryManager->GetGalleryImageByID($imageId);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <title>Update Gallery Image - <?= $_ProductName ?></title>
    
    <?php include("../include/common-head.php"); ?>
    
    <style>
        .image-preview {
            margin-top: 15px;
            border: 1px solid #dee2e6;
            border-radius: 5px;
            padding: 10px;
            background: #f8f9fa;
        }
    </style>
</head>

<body class="app sidebar-mini ltr light-mode">
    <div class="page">
        <div class="page-main">
            <?php
            include("../navigation/top-header.php");
            include("../navigation/side-navigation.php");
            ?>

            <div class="main-content app-content mt-0">
                <div class="side-app">
                    <div class="main-container container-fluid">
                        
                        <!-- PAGE-HEADER -->
                        <div class="page-header mb-3">
                            <h1 class="page-title">Update Gallery Image</h1>
                            <div>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="../dashboard/admin-dashboard">Home</a></li>
                                    <li class="breadcrumb-item"><a href="./view-all-gallery-list">All Gallery</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Update Gallery Image</li>
                                </ol>
                            </div>
                        </div>

                        <!-- Image Form Section -->
                        <form id="gallery_image_form" onsubmit="return false;" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Image Gallery Details</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label for="ImageTitle" class="form-label">Image Title <span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" name="Title" id="ImageTitle" 
                                                               placeholder="Enter Image Title" value="<?= $imageData['Title'] ?? '' ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="hidden" name="form_action" value="update">
                                            <input type="hidden" name="form_id" value="<?= $imageId ?>">
                                            <input type="hidden" name="gallery_type" value="image">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-lg-4">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Update Image</h4>
                                            <small class="text-danger">Only JPG, PNG, WEBP files allowed</small>
                                        </div>
                                        <div class="card-body">
                                            <input type="file" class="form-control" name="GalleryImage" id="GalleryImage" 
                                                   accept="image/png,image/jpg,image/jpeg,image/webp" onchange="previewImage(this)">
                                            
                                            <?php if (!empty($imageData['GalleryImage'])): ?>
                                            <div class="image-preview mt-3">
                                                <h6>Current Image:</h6>
                                                <img src="../uploads/<?= $imageData['GalleryImage'] ?>" alt="Current Image" 
                                                     class="img-fluid" style="max-height: 200px; border-radius: 5px;">
                                            </div>
                                            <?php endif; ?>
                                            
                                            <div id="image-preview" class="mt-3"></div>
                                        </div>
                                    </div>
                                    
                                    <div class="card">
                                        <div class="card-body">
                                            <button class="btn btn-success w-100" onclick="UpdateGalleryImage()">
                                                <i class="fe fe-save"></i> Update Image
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

            <?php include("../navigation/right-side-navigation.php"); ?>
        </div>

        <?php 
        include("../include/common-script.php");
        include("../include/common-script-datatables.php");
        ?>

        <script src="../project-assets/js/gallery-unified.js"></script>

        <script type="text/javascript">
        $(document).ready(function() {
            $("#nav_gallery_li").css("display", "block");
            $("#nav_gallery_li").addClass("open");
            $("#nav_gallery").addClass("active");
        });
        </script>

        <script>
        function UpdateGalleryImage() {
            const title = document.getElementById('ImageTitle').value.trim();
            
            if (!title) {
                ProductAlert('Please enter image title');
                return false;
            }
            
            const formData = new FormData(document.getElementById('gallery_image_form'));
            
            $.ajax({
                url: 'action/gallery-unified-action.php',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    const result = JSON.parse(response);
                    ProductAlert(result.message);
                    
                    if (!result.error) {
                        setTimeout(() => {
                            window.location.href = 'view-all-gallery-list.php';
                        }, 1500);
                    }
                },
                error: function() {
                    ProductAlert('An error occurred. Please try again.');
                }
            });
        }
        </script>
    </div>
</body>
</html>
