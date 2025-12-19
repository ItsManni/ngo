<?php
require_once('../../include/autoloader.inc.php');
$dbh = new Dbh();
$conn = $dbh->_connectodb();
$authentication = new Authentication($conn);
$UserType = $authentication->SessionCheck();
$counter = $_POST['counter'];
?>
<div class="row border mb-2" id="gallery_row_<?php echo $counter;?>">
    <div class="mb-3 col-md-9 col-9">
        <label for="recipient-name" class="col-form-label">Upload File <span class='text-danger'>( 1080px x 1080px only jpg, png, webp)</span></label>
        <input type="file" class="form-control" name="GalleryImage[]" id='gallery_image_<?php echo $counter;?>' accept="image/png, image/jpg, image/jpeg, image/webp"/>
    </div>

    <div class="col-3 mt-4">
        <a onclick="DeleteGalleryImage(<?php echo $counter;?>)" class="btn btn-danger mt-4 text-white">
          Delete
        </a>
    </div>
    <input type='hidden' name='GalleryID[]' value='-1'>
</div>
