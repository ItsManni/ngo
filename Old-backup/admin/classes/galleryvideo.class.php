<?php
class GalleryVideo extends Core
{
	private $conn;
	public function __construct($conn)
	{
		$this->conn = $conn;
		$this->setTimeZone();
	}

	public function InsertGalleryVideoForm($data)
	{
		$Title = $this->cleantext($data['VideoTitle']);
		$VideoCode = $this->cleantext($data['VideoCode']);

		$CreatedDate = date('Y-m-d');
		$CreatedBy = $data['CreatedBy'];
		$CreatedTime = date('H:i:s');
        $randomNumber = rand(1000, 100000);

		$sql = "INSERT INTO gallery_video(Title,VideoCode,CreatedDate,CreatedTime,CreatedBy) VALUES ('$Title','$VideoCode','$CreatedDate','$CreatedTime','$CreatedBy')";
		$response_insert_gallery_details = $this->_InsertTableRecords($this->conn,$sql);

		if($response_insert_gallery_details['error'] == false)
		{
			// $last_insert_id = $response_insert_gallery_details['last_insert_id'];
			// $GalleryID = $last_insert_id;

			$response_insert_gallery_details['error'] = false;
		    $response_insert_gallery_details['message'] = "Gallery Video is Successfully Added.";
		}
		else
		{
			$response_insert_gallery_details['error'] = true;
		    $response_insert_gallery_details['message'] = "Technical Issue, please try later";
		}
		return $response_insert_gallery_details;
	}

	public function UpdateGalleryVideoForm($data)
	{
		$Title = $this->cleantext($data['VideoTitle']);
		$VideoCode = $this->cleantext($data['VideoCode']);

		$CreatedDate = date('Y-m-d');
		$CreatedBy = $data['CreatedBy'];
		$CreatedTime = date('H:i:s');
        $randomNumber = rand(1000, 100000);

		$gallery_id = $data['form_id'];

        $update_param = " Title = '$Title',VideoCode = '$VideoCode', CreatedDate = '$CreatedDate', CreatedTime = '$CreatedTime', CreatedBy = '$CreatedBy' where ID=$gallery_id";
	    $response = $this->_UpdateTableRecords($this->conn,'gallery_video', $update_param);

        if ($response['error'] == false) {

            $response['error'] = false;
			$response['message'] = "Gallery Video Updated";

        }else{

            $response['error'] = true;
            $response['message'] = "Technical issue, please try again later.";

        }

	    return $response;
	}

    public function getTotalGalleryVideo($table)
	{
		$sql = "Select COUNT(*) as total_enquiries from $table where IsActive = 1";
		$result=mysqli_query($this->conn,$sql);
		if($result->num_rows>0)
		{
			$row = $result->fetch_assoc();
			return $row['total_enquiries'];
		}
		else
		{
			return 0;
		}
	}

    public function GetAllGalleryVideo()
	{
		$where = " where IsActive = 1 ORDER BY ID DESC";
        $gallery_details = $this->_getTableRecords($this->conn, "gallery_video", $where);
        return $gallery_details;
	}

	public function DeleteGalleryVideo($data)
	{
		$GalleryID = $data['ID'];

		$where = " where ID = $GalleryID";
		$response = $this->delete_identity_filter($this->conn,"gallery_video",$where);
		return $response;
	}

    public function GetGalleryVideoDetailsbyID($ID)
	{
		$where = " where ID = $ID";
		$gallery_details = $this->_getTableDetails($this->conn,'gallery_video', $where);
		return $gallery_details;
	}

}
