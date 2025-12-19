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
$videoId = $_GET['id'] ?? 0;

// Get video data using the new GalleryManager
$videoData = $galleryManager->GetGalleryVideoByID($videoId);

// Check if video exists
if (!$videoData || empty($videoData)) {
    header('Location: view-all-gallery-list.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <title>Update Gallery Video - <?= $_ProductName ?></title>
    
    <?php include("../include/common-head.php"); ?>
    
    <style>
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
                            <h1 class="page-title">Update Gallery Video</h1>
                            <div>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="../dashboard/admin-dashboard">Home</a></li>
                                    <li class="breadcrumb-item"><a href="./view-all-gallery-list">All Gallery</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Update Gallery Video</li>
                                </ol>
                            </div>
                        </div>

                        <!-- Video Form Section -->
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
                                                        <input type="text" class="form-control" name="Title" id="VideoTitle" 
                                                               placeholder="Enter Video Title" value="<?= htmlspecialchars($videoData['Title'] ?? '') ?>">
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label for="VideoCode" class="form-label">YouTube URL/Embed Code <span class="text-danger">*</span></label>
                                                        <textarea class="form-control" name="VideoCode" id="VideoCode" rows="6" 
                                                                placeholder="Enter YouTube URL or embed code" onchange="previewVideo()"><?= htmlspecialchars($videoData['VideoCode'] ?? '') ?></textarea>
                                                        <small class="text-muted">You can paste YouTube URL or full embed code</small>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="video-preview" class="youtube-preview" style="display: none;">
                                                <h6>Video Preview:</h6>
                                                <div id="video-thumbnail"></div>
                                            </div>
                                            <input type="hidden" name="form_action" value="update">
                                            <input type="hidden" name="form_id" value="<?= intval($videoId) ?>">
                                            <input type="hidden" name="gallery_type" value="video">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-lg-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <button class="btn btn-success w-100" onclick="UpdateGalleryVideo()">
                                                <i class="fe fe-save"></i> Update Video
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
            
            // Show preview for existing video
            if (document.getElementById('VideoCode').value.trim()) {
                previewVideo();
            }
        });
        </script>

        <script>
        function UpdateGalleryVideo() {
            const title = document.getElementById('VideoTitle').value.trim();
            const videoCode = document.getElementById('VideoCode').value.trim();
            
            if (!title) {
                ProductAlert('Please enter video title');
                return false;
            }
            
            if (!videoCode) {
                ProductAlert('Please enter YouTube URL or embed code');
                return false;
            }
            
            // Validate YouTube URL/code
            const videoId = extractYouTubeId(videoCode);
            if (!videoId) {
                ProductAlert('Please enter a valid YouTube URL or embed code');
                return false;
            }
            
            const formData = new FormData(document.getElementById('gallery_video_form'));
            
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