<?php

class GalleryManager extends Core
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
        $this->setTimeZone();
    }

    // Gallery Image Management
    public function InsertGalleryImageForm($data)
    {
        $Title = $this->cleantext($data['Title']);
        $CreatedDate = date('Y-m-d');
        $CreatedBy = $data['CreatedBy'];
        $CreatedTime = date('H:i:s');
        $randomNumber = rand(1000, 100000);

        // Insert with GalleryID as -1 for direct image entries
        $sql = "INSERT INTO gallery_image(GalleryID, Title, CreatedDate, CreatedTime, CreatedBy) VALUES (-1, '$Title', '$CreatedDate', '$CreatedTime', '$CreatedBy')";
        $response = $this->_InsertTableRecords($this->conn, $sql);

        if($response['error'] == false) {
            $imageId = $response['last_insert_id'];
            
            // Handle file upload
            if (isset($_FILES['GalleryImage']['name']) && $_FILES['GalleryImage']['name'] != '') {
                $allowedExtensions = ['jpg', 'jpeg', 'png', 'webp'];
                $fileExtension = strtolower(pathinfo($_FILES['GalleryImage']['name'], PATHINFO_EXTENSION));
                
                if (in_array($fileExtension, $allowedExtensions)) {
                    $imageName = $randomNumber . "_gallery_image_" . $imageId . "." . $fileExtension;
                    $uploadPath = "../../uploads/" . $imageName;
                    
                    if (move_uploaded_file($_FILES["GalleryImage"]["tmp_name"], $uploadPath)) {
                        $updateQuery = "GalleryImage = '$imageName' WHERE ID = $imageId";
                        $this->_UpdateTableRecords($this->conn, 'gallery_image', $updateQuery);
                        
                        $response['error'] = false;
                        $response['message'] = "Gallery Image Successfully Added.";
                    } else {
                        $response['error'] = true;
                        $response['message'] = "Failed to upload image.";
                    }
                } else {
                    $response['error'] = true;
                    $response['message'] = "Only JPG, PNG, and WEBP files are allowed.";
                }
            } else {
                $response['error'] = true;
                $response['message'] = "Please select an image file.";
            }
        }

        return $response;
    }

    public function UpdateGalleryImageForm($data)
    {
        $Title = $this->cleantext($data['Title']);
        $imageId = $data['form_id'];
        $CreatedDate = date('Y-m-d');
        $CreatedBy = $data['CreatedBy'];
        $CreatedTime = date('H:i:s');
        $randomNumber = rand(1000, 100000);

        $updateParam = "Title = '$Title', CreatedDate = '$CreatedDate', CreatedTime = '$CreatedTime', CreatedBy = '$CreatedBy' WHERE ID = $imageId";
        $response = $this->_UpdateTableRecords($this->conn, 'gallery_image', $updateParam);

        if($response['error'] == false) {
            // Handle file upload if new image is provided
            if (isset($_FILES['GalleryImage']['name']) && $_FILES['GalleryImage']['name'] != '') {
                $allowedExtensions = ['jpg', 'jpeg', 'png', 'webp'];
                $fileExtension = strtolower(pathinfo($_FILES['GalleryImage']['name'], PATHINFO_EXTENSION));
                
                if (in_array($fileExtension, $allowedExtensions)) {
                    $imageName = $randomNumber . "_gallery_image_" . $imageId . "." . $fileExtension;
                    $uploadPath = "../../uploads/" . $imageName;
                    
                    if (move_uploaded_file($_FILES["GalleryImage"]["tmp_name"], $uploadPath)) {
                        $updateImageQuery = "GalleryImage = '$imageName' WHERE ID = $imageId";
                        $this->_UpdateTableRecords($this->conn, 'gallery_image', $updateImageQuery);
                    }
                }
            }
            
            $response['message'] = "Gallery Image Updated Successfully.";
        }

        return $response;
    }

    // Gallery Video Management
    public function InsertGalleryVideoForm($data)
    {
        $Title = $this->cleantext($data['Title']);
        $VideoCode = $this->cleantext($data['VideoCode']);
        $CreatedDate = date('Y-m-d');
        $CreatedBy = $data['CreatedBy'];
        $CreatedTime = date('H:i:s');

        $sql = "INSERT INTO gallery_video(Title, VideoCode, CreatedDate, CreatedTime, CreatedBy) VALUES ('$Title', '$VideoCode', '$CreatedDate', '$CreatedTime', '$CreatedBy')";
        $response = $this->_InsertTableRecords($this->conn, $sql);

        if($response['error'] == false) {
            $response['message'] = "Gallery Video Successfully Added.";
        } else {
            $response['message'] = "Technical Issue, please try later";
        }

        return $response;
    }

    public function UpdateGalleryVideoForm($data)
    {
        $Title = $this->cleantext($data['Title']);
        $VideoCode = $this->cleantext($data['VideoCode']);
        $videoId = $data['form_id'];
        $CreatedDate = date('Y-m-d');
        $CreatedBy = $data['CreatedBy'];
        $CreatedTime = date('H:i:s');

        $updateParam = "Title = '$Title', VideoCode = '$VideoCode', CreatedDate = '$CreatedDate', CreatedTime = '$CreatedTime', CreatedBy = '$CreatedBy' WHERE ID = $videoId";
        $response = $this->_UpdateTableRecords($this->conn, 'gallery_video', $updateParam);

        if($response['error'] == false) {
            $response['message'] = "Gallery Video Updated Successfully.";
        } else {
            $response['message'] = "Technical issue, please try again later.";
        }

        return $response;
    }

    // Common Methods
    public function GetAllGalleryImages()
    {
        $where = "WHERE IsActive = 1 AND GalleryID = -1 ORDER BY ID DESC";
        return $this->_getTableRecords($this->conn, "gallery_image", $where);
    }

    public function GetAllGalleryVideos()
    {
        $where = "WHERE IsActive = 1 ORDER BY ID DESC";
        return $this->_getTableRecords($this->conn, "gallery_video", $where);
    }

    public function GetGalleryImageByID($ID)
    {
        $where = "WHERE ID = $ID";
        return $this->_getTableDetails($this->conn, 'gallery_image', $where);
    }

    public function GetGalleryVideoByID($ID)
    {
        $where = "WHERE ID = $ID";
        return $this->_getTableDetails($this->conn, 'gallery_video', $where);
    }

    public function DeleteGalleryImage($data)
    {
        $imageId = $data['ID'];
        $where = "WHERE ID = $imageId";
        return $this->delete_identity_filter($this->conn, "gallery_image", $where);
    }

    public function DeleteGalleryVideo($data)
    {
        $videoId = $data['ID'];
        $where = "WHERE ID = $videoId";
        return $this->delete_identity_filter($this->conn, "gallery_video", $where);
    }

    // Extract YouTube video ID from various YouTube URL formats
    public function extractYouTubeId($url)
    {
        if (empty($url)) {
            return null;
        }
        
        $pattern = '/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/';
        preg_match($pattern, $url, $matches);
        return isset($matches[1]) ? $matches[1] : null;
    }

    // Get YouTube thumbnail URL
    public function getYouTubeThumbnail($videoId)
    {
        if (empty($videoId)) {
            return '';
        }
        return "https://img.youtube.com/vi/" . $videoId . "/maxresdefault.jpg";
    }
}
?>
