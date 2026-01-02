<?php

class Testimonial extends Core

{

	private $conn;

	public function __construct($conn)

	{

		$this->conn = $conn;

		$this->setTimeZone();

	}



	function InsertTestimonialForm($data)

	{

		$Name = $this->cleantext($data['Name']);

        $StarRating = $data['StarRating'];

        $Description = $this->cleantext($data['Description']);



		$CreatedDate = date('Y-m-d');

		$CreatedBy = $data['CreatedBy'];

		$CreatedTime = date('H:i:s');

        $randomNumber = rand(1000, 100000);



   		$sql = "INSERT INTO testimonial(Name,StarRating,Description,CreatedDate,CreatedTime,CreatedBy,ApprovalStatus) VALUES ('$Name','$StarRating','$Description','$CreatedDate','$CreatedTime','$CreatedBy','Pending')";

		$response_insert_testimonial_details = $this->_InsertTableRecords($this->conn,$sql);



		if($response_insert_testimonial_details['error'] == false)

		{

			$last_insert_id = $response_insert_testimonial_details['last_insert_id'];

			$TestimonialID = $last_insert_id;

			if (isset($_FILES['UserImage']['name'])  && $_FILES['UserImage']['name'] != '')

			{

				$extn_pan = explode('.', $_FILES["UserImage"]["name"]);

				$UserImage   = $randomNumber."-".$TestimonialID."UserImage-Attachment.".$extn_pan[1];

				$path = "../../project-assets/admin-media/testimonial/".$UserImage;

				move_uploaded_file($_FILES["UserImage"]["tmp_name"], $path);

				$query = "UserImage = '$UserImage' WHERE ID = $TestimonialID";

				$response = $this->_UpdateTableRecords($this->conn,'testimonial', $query);

			}



			$response_insert_testimonial_details['error'] = false;

		    $response_insert_testimonial_details['message'] = "Testimonial is Successfully Added.";

		}

		else

		{

			$response_insert_testimonial_details['error'] = true;

		    $response_insert_testimonial_details['message'] = "Technical Issue, please try later";

		}

		return $response_insert_testimonial_details;

	}





	function UpdateTestimonialForm($data)

	{

		$Name = $this->cleantext($data['Name']);

        $StarRating = $data['StarRating'];

        $Description = $this->cleantext($data['Description']);



		$CreatedDate = date('Y-m-d');

		$CreatedBy = $data['CreatedBy'];

		$CreatedTime = date('H:i:s');

		$TestimonialID = $data['form_id'];

        $randomNumber = rand(1000, 100000);



		if (isset($_FILES['UserImage']['name'])  && $_FILES['UserImage']['name'] != '')

        {

            $extn_pan = explode('.', $_FILES["UserImage"]["name"]);

            $UserImage   = $randomNumber."-".$TestimonialID."UserImage-Attachment.".$extn_pan[1];

            $path = "../../project-assets/admin-media/testimonial/".$UserImage;

            move_uploaded_file($_FILES["UserImage"]["tmp_name"], $path);

            $query = "UserImage = '$UserImage' WHERE ID = $TestimonialID";

            $response = $this->_UpdateTableRecords($this->conn,'testimonial', $query);

        }



        $update_param = " Name = '$Name', StarRating = '$StarRating',Description = '$Description' where ID=$TestimonialID";

        $response = $this->_UpdateTableRecords($this->conn,'testimonial', $update_param);

        $response['error'] = false;

        $response['message'] = "Testimonial Updated";



	    return $response;

	}



	public function GetAllTestimonial($conn)

	{

		$where = " where IsActive = 1 ORDER BY ID DESC";

        $branch_details = $this->_getTableRecords($conn, "testimonial", $where);

        return $branch_details;

	}



	public function getTotalTestimonial($table)

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



	function DeleteTestimonial($data)

	{

		$TestimonialID = $data['ID'];

		// Delete course

		$where = " where ID = $TestimonialID";

		$response = $this->delete_identity_filter($this->conn,"testimonial",$where);

		return $response;

	}



    function GetTestimonialDetailsbyID($ID)

	{

		$where = " where ID = $ID";

		$testimonial_details = $this->_getTableDetails($this->conn,'testimonial', $where);

		return $testimonial_details;

	}



    function GetAllTestimonialsWithLimit($page = 1, $limit = 6) {

        $offset = ($page - 1) * $limit;



        $where = "WHERE IsActive = 1 ORDER BY ID DESC LIMIT $limit OFFSET $offset";



        $branch_details = $this->_getTableRecords($this->conn, "testimonial", $where);

        return $branch_details;

    }



    function ApproveTestimonial($data)

    {

        $TestimonialID = $data['ID'];

        $query = "ApprovalStatus = 'Approved' WHERE ID = $TestimonialID";

        $response = $this->_UpdateTableRecords($this->conn,'testimonial', $query);

        return $response;

    }



    function RejectTestimonial($data)

    {

        $TestimonialID = $data['ID'];

        $query = "ApprovalStatus = 'Rejected' WHERE ID = $TestimonialID";

        $response = $this->_UpdateTableRecords($this->conn,'testimonial', $query);

        return $response;

    }



}

