<?php


class Gallery extends Core


{


	private $conn;


	public function __construct($conn)


	{


		$this->conn = $conn;


		$this->setTimeZone();


	}





	public function InsertGalleryForm($data)


	{


		$Title = $this->cleantext($data['GalleryTitle']);


        $Url = $this->cleantext($data['Url']);





		$CreatedDate = date('Y-m-d');


		$CreatedBy = $data['CreatedBy'];


		$CreatedTime = date('H:i:s');


        $randomNumber = rand(1000, 100000);





		$sql = "INSERT INTO gallery(Title,Url,CreatedDate,CreatedTime,CreatedBy) VALUES ('$Title','$Url','$CreatedDate','$CreatedTime','$CreatedBy')";


		$response_insert_gallery_details = $this->_InsertTableRecords($this->conn,$sql);





		if($response_insert_gallery_details['error'] == false)


		{


			$last_insert_id = $response_insert_gallery_details['last_insert_id'];


			$GalleryID = $last_insert_id;





            if (isset($_FILES['FeatureImage']['name'])  && $_FILES['FeatureImage']['name'] != '')


			{


				$extn_pan = explode('.', $_FILES["FeatureImage"]["name"]);


				$FeatureImage   = $randomNumber."-".$GalleryID."FeatureImage-Attachment.".$extn_pan[1];


				$path = "../../project-assets/admin-media/gallery/featureimg/".$FeatureImage;


				move_uploaded_file($_FILES["FeatureImage"]["tmp_name"], $path);


				$query = "FeatureImage = '$FeatureImage' WHERE ID = $GalleryID";


				$response = $this->_UpdateTableRecords($this->conn,'gallery', $query);


			}





            if (isset($_FILES['GalleryImage']['name']) && count($_FILES['GalleryImage']['name']) > 0) {


                $GalleryImages_array = $_FILES['GalleryImage']['name'];


                $no_of_gallery_images = count($GalleryImages_array);





                for ($i = 0; $i < $no_of_gallery_images; $i++) {


                    $image_temp_name = $_FILES['GalleryImage']['tmp_name'][$i];


                    $image_name = $randomNumber . "gallery_" . $i . "_" . $_FILES['GalleryImage']['name'][$i];


                    $image_path = "../../project-assets/admin-media/gallery/maingallery/" . basename($image_name);





                    if (move_uploaded_file($image_temp_name, $image_path)) {


                        $insert_gallery_sql = "INSERT INTO gallery_image(GalleryID, GalleryImage, CreatedDate, CreatedTime, CreatedBy)


                                                VALUES ($GalleryID, '$image_name', '$CreatedDate', '$CreatedTime', '$CreatedBy')";


                        $response_insert = $this->_InsertTableRecords($this->conn, $insert_gallery_sql);


                    }


                }


            }





			$response_insert_gallery_details['error'] = false;


		    $response_insert_gallery_details['message'] = "Gallery is Successfully Added.";


		}


		else


		{


			$response_insert_gallery_details['error'] = true;


		    $response_insert_gallery_details['message'] = "Technical Issue, please try later";


		}


		return $response_insert_gallery_details;


	}








	public function UpdateGalleryForm($data)


	{


		$Title = $this->cleantext($data['GalleryTitle']);


        $Url = $this->cleantext($data['Url']);





		$CreatedDate = date('Y-m-d');


		$CreatedBy = $data['CreatedBy'];


		$CreatedTime = date('H:i:s');


        $randomNumber = rand(1000, 100000);





		$gallery_id = $data['form_id'];





        $update_param = " Title = '$Title', Url = '$Url', CreatedDate = '$CreatedDate', CreatedTime = '$CreatedTime', CreatedBy = '$CreatedBy' where ID=$gallery_id";


	    $response = $this->_UpdateTableRecords($this->conn,'gallery', $update_param);





        if ($response['error'] == false) {





            if (isset($_FILES['FeatureImage']['name'])  && $_FILES['FeatureImage']['name'] != '')


            {


                $extn_pan = explode('.', $_FILES["FeatureImage"]["name"]);


                $FeatureImage   = $randomNumber."-".$gallery_id."FeatureImage-Attachment.".$extn_pan[1];


                $path = "../../project-assets/admin-media/gallery/featureimg/".$FeatureImage;


                move_uploaded_file($_FILES["FeatureImage"]["tmp_name"], $path);


                $query = "FeatureImage = '$FeatureImage' WHERE ID = $gallery_id";


                $response = $this->_UpdateTableRecords($this->conn,'gallery', $query);


            }





            if (isset($_FILES['GalleryImage']['name']) && count($_FILES['GalleryImage']['name']) > 0) {


                $GalleryImages_array = $_FILES['GalleryImage']['name'];


                $no_of_gallery_images = count($GalleryImages_array);





                for ($i = 0; $i < $no_of_gallery_images; $i++) {


                    $image_temp_name = $_FILES['GalleryImage']['tmp_name'][$i];


                    $image_name = $randomNumber . "gallery_" . $i . "_" . $_FILES['GalleryImage']['name'][$i];


                    $image_path = "../../project-assets/admin-media/gallery/maingallery/" . basename($image_name);





                    $image_move_success = false;





                    if (!empty($image_temp_name)) {


                        $image_move_success = move_uploaded_file($image_temp_name, $image_path);


                    }





                    $gallery_id = $_POST['GalleryID'][$i];





                    if($gallery_id != '-1' && $gallery_id != ''){





                            $update_gallery_sql = "CreatedDate = '$CreatedDate',


                                                CreatedTime = '$CreatedTime',


                                                CreatedBy = '$CreatedBy'";





                            if ($image_move_success) {


                                $update_gallery_sql .= ", GalleryImage = '$image_name'";


                            }





                            $update_gallery_sql .= " WHERE ID = $gallery_id";


                            $response_update_gallery = $this->_UpdateTableRecords($this->conn, 'gallery_image', $update_gallery_sql);





                    }else {


                        $insert_gallery_sql = "INSERT INTO gallery_image(GalleryID, GalleryImage, CreatedDate, CreatedTime, CreatedBy)


                                            VALUES ($GalleryID, '$image_name', '$CreatedDate', '$CreatedTime', '$CreatedBy')";





                        $response_insert_gallery = $this->_InsertTableRecords($this->conn, $insert_gallery_sql);


                    }


                }


            }








            $response['error'] = false;


			$response['message'] = "Gallery Updated";





        }else{





            $response['error'] = true;


            $response['message'] = "Technical issue, please try again later.";





        }





	    return $response;


	}





    public function getTotalGallery($table)


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





    public function GetAllGallery()


	{


		$where = " where IsActive = 1 ORDER BY ID DESC";


        $gallery_details = $this->_getTableRecords($this->conn, "gallery", $where);


        return $gallery_details;


	}





	public function DeleteGallery($data)


	{


		$GalleryID = $data['ID'];





		$where = " where ID = $GalleryID";


		$response = $this->delete_identity_filter($this->conn,"gallery",$where);


		return $response;


	}





    public function GetGalleryDetailsbyID($ID)


	{


		$where = " where ID = $ID";


		$gallery_details = $this->_getTableDetails($this->conn,'gallery', $where);


		return $gallery_details;


	}





	public function GetGalleryDetailsbyURL($url)


	{


		$where = " where URL = '$url'";


		$gallery_details = $this->_getTableDetails($this->conn,'gallery', $where);


		return $gallery_details;


	}





    public function GetAllGalleryImagesByGalleryID($GalleryID)


	{


		$where = " where IsActive = 1 and GalleryID = $GalleryID ORDER BY ID DESC";


        $gallery_details = $this->_getTableRecords($this->conn, "gallery_image", $where);


        return $gallery_details;


	}


    function GetAllGalleryImagesWithLimit($page = 1, $limit = 6) {


        $offset = ($page - 1) * $limit;





        $where = "WHERE IsActive = 1 ORDER BY ID DESC LIMIT $limit OFFSET $offset";





        $branch_details = $this->_getTableRecords($this->conn, "gallery_image", $where);


        return $branch_details;


    }


	 public function GetAllGalleryNew()

	{

		$where = " where IsActive = 1 ORDER BY ID DESC";

        $gallery_details = $this->_getTableRecords($this->conn, "gallery_image", $where);

        return $gallery_details;

	}



	 public function GetAllVideoNew()

	{

		$where = " where IsActive = 1 ORDER BY ID DESC";

        $gallery_details = $this->_getTableRecords($this->conn, "gallery_video", $where);

        return $gallery_details;

	}


}


