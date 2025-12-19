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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <title>Add Gallery - <?= $_ProductName ?></title>
    
    <?php include("../include/common-head.php"); ?>
    
    <style>
        .gallery-type-selector {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
        }
        .type-option {
            cursor: pointer;
            transition: all 0.3s ease;
            border: 2px solid #dee2e6;
            border-radius: 8px;
            padding: 15px;
            margin: 10px 0;
        }
        .type-option:hover {
            border-color: #007bff;
            background-color: #f0f8ff;
        }
        .type-option.active {
            border-color: #007bff;
            background-color: #e7f3ff;
        }
        .type-icon {
            font-size: 2rem;
            color: #007bff;
        }
        .form-section {
            display: none;
        }
        .form-section.active {
            display: block;
        }
        .youtube-preview {
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
                            <h1 class="page-title">Add Gallery Item</h1>
                            <div>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="../dashboard/admin-dashboard">Home</a></li>
                                    <li class="breadcrumb-item"><a href="./view-all-gallery-list">All Gallery</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Add Gallery Item</li>
                                </ol>
                            </div>
                        </div>

                        <!-- Gallery Type Selector -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card gallery-type-selector">
                                    <div class="card-body">
                                        <h5 class="card-title mb-4">Select Gallery Type</h5>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="type-option text-center" id="image-option" onclick="selectGalleryType('image')">
                                                    <i class="fe fe-image type-icon"></i>
                                                    <h6 class="mt-2">Image Gallery</h6>
                                                    <p class="text-muted">Upload and manage image files</p>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="type-option text-center" id="video-option" onclick="selectGalleryType('video')">
                                                    <i class="fe fe-video type-icon"></i>
                                                    <h6 class="mt-2">Video Gallery</h6>
                                                    <p class="text-muted">Add YouTube videos with embed code</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Image Form Section -->
                        <div id="image-form-section" class="form-section">
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
                                                            <input type="text" class="form-control" name="Title" id="ImageTitle" placeholder="Enter Image Title">
                                                        </div>
                                                    </div>
                                                </div>
                                                <input type="hidden" name="form_action" value="add">
                                                <input type="hidden" name="form_id" value="-1">
                                                <input type="hidden" name="gallery_type" value="image">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-4">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title">Upload Image</h4>
                                                <small class="text-danger">Only JPG, PNG, WEBP files allowed</small>
                                            </div>
                                            <div class="card-body">
                                                <input type="file" class="form-control" name="GalleryImage" id="GalleryImage" 
                                                       accept="image/png,image/jpg,image/jpeg,image/webp" onchange="previewImage(this)">
                                                <div id="image-preview" class="mt-3"></div>
                                            </div>
                                        </div>
                                        
                                        <div class="card">
                                            <div class="card-body">
                                                <button class="btn btn-success w-100" onclick="AddGalleryImage()">
                                                    <i class="fe fe-save"></i> Save Image
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <!-- Video Form Section -->
                        <div id="video-form-section" class="form-section">
                            <form id="gallery_video_form" onsubmit="return false;">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title">Video Gallery Details</h4>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="mb-3">
                                                            <label for="VideoTitle" class="form-label">Video Title <span class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" name="Title" id="VideoTitle" placeholder="Enter Video Title">
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="mb-3">
                                                            <label for="VideoCode" class="form-label">YouTube URL/Embed Code <span class="text-danger">*</span></label>
                                                            <textarea class="form-control" name="VideoCode" id="VideoCode" rows="6" 
                                                                    placeholder="Enter YouTube URL or embed code" onchange="previewVideo()"></textarea>
                                                            <small class="text-muted">You can paste YouTube URL or full embed code</small>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="video-preview" class="youtube-preview" style="display: none;">
                                                    <h6>Video Preview:</h6>
                                                    <div id="video-thumbnail"></div>
                                                </div>
                                                <input type="hidden" name="form_action" value="add">
                                                <input type="hidden" name="form_id" value="-1">
                                                <input type="hidden" name="gallery_type" value="video">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <button class="btn btn-success w-100" onclick="AddGalleryVideo()">
                                                    <i class="fe fe-save"></i> Save Video
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

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
    </div>
</body>
</html>
