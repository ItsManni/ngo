<?php
class Blog extends Core
{
	private $conn;
	public function __construct($conn)
	{
		$this->conn = $conn;
		$this->setTimeZone();
	}
	function CheckDuplicateBlog($data)
	{
		$Url = $data['Url'];
		if(isset($data['form_id']))
		{
			$ID = $data['form_id'];
			$filter = " where (Url = '$Url') and ID != $ID";
		}
		else
		{
			$filter = " where Url = '$Url'";
		}
		$response = $this->check_unique_identity_filter($this->conn,'blogs', $filter);
		return $response;
	}

	function InsertBlogForm($data)
	{
		$BlogName = $this->cleantext($data['BlogName']);
        $Url = $data['Url'];
		$ShortDescription = $this->cleantext($data['ShortDescription']);
        $BlogDescription = $this->cleantext($data['BlogDescription']);

        $Category = $this->cleantext($data['Category']);
		$MetaTitle = $this->cleantext($data['MetaTitle']);
		$MetaDescription = $this->cleantext($data['MetaDescription']);
		$OGTitle = $this->cleantext($data['OGTitle']);
        $OGDescription = $this->cleantext($data['OGDescription']);
		$Status = $data['Status'];

        $commaSeparatedTags = '';

        if(isset($data['Tags']) != ' '){
            $tags = $data['Tags'];
            $tagsArray = json_decode($tags, true);

            $tagValues = array_map(function($tag) {
                return $tag['value'];
            }, $tagsArray);

            $commaSeparatedTags = implode(',', $tagValues);
        }


		$CreatedDate = date('Y-m-d');
		$CreatedBy = $data['CreatedBy'];
		$CreatedTime = date('H:i:s');
        $randomNumber = rand(1000, 100000);

		$sql = "INSERT INTO blogs(BlogName,Url,ShortDescription,Category,BlogDescription,MetaTitle,MetaDescription,OGTitle,OGDescription,Tags,Status,CreatedDate,CreatedTime,CreatedBy) VALUES ('$BlogName','$Url','$ShortDescription','$Category','$BlogDescription','$MetaTitle','$MetaDescription','$OGTitle','$OGDescription','$commaSeparatedTags','$Status','$CreatedDate','$CreatedTime','$CreatedBy')";
		$response_insert_blog_details = $this->_InsertTableRecords($this->conn,$sql);

		if($response_insert_blog_details['error'] == false)
		{
			$last_insert_id = $response_insert_blog_details['last_insert_id'];
			$BlogID = $last_insert_id;
			if (isset($_FILES['BlogImg']['name'])  && $_FILES['BlogImg']['name'] != '')
			{
				$extn_pan = explode('.', $_FILES["BlogImg"]["name"]);
				$BlogImg   = $randomNumber."-".$BlogID."BlogImg-Attachment.".$extn_pan[1];
				$path = "../../project-assets/admin-media/blogimg/".$BlogImg;
				move_uploaded_file($_FILES["BlogImg"]["tmp_name"], $path);
				$query = "BlogImg = '$BlogImg' WHERE ID = $BlogID";
				$response = $this->_UpdateTableRecords($this->conn,'blogs', $query);
			}

            if (isset($_FILES['OGImage']['name'])  && $_FILES['OGImage']['name'] != '')
			{
				$extn_pan = explode('.', $_FILES["OGImage"]["name"]);
				$OGImage   = $randomNumber."-".$BlogID."OGImage-Attachment.".$extn_pan[1];
				$path = "../../project-assets/admin-media/blogimg/".$OGImage;
				move_uploaded_file($_FILES["OGImage"]["tmp_name"], $path);
				$query = "OGImage = '$OGImage' WHERE ID = $BlogID";
				$response = $this->_UpdateTableRecords($this->conn,'blogs', $query);
			}

			$response_insert_blog_details['error'] = false;
		    $response_insert_blog_details['message'] = "Blog is Successfully Added.";
		}
		else
		{
			$response_insert_blog_details['error'] = true;
		    $response_insert_blog_details['message'] = "Technical Issue, please try later";
		}
		return $response_insert_blog_details;
	}


	function UpdateBlogForm($data)
	{
		$BlogName = $this->cleantext($data['BlogName']);
        $Url = $data['Url'];
		$ShortDescription = $this->cleantext($data['ShortDescription']);
        $BlogDescription = $this->cleantext($data['BlogDescription']);

        $Category = $this->cleantext($data['Category']);
		$MetaTitle = $this->cleantext($data['MetaTitle']);
		$MetaDescription = $this->cleantext($data['MetaDescription']);
		$OGTitle = $this->cleantext($data['OGTitle']);
        $OGDescription = $this->cleantext($data['OGDescription']);
		$Status = $data['Status'];

		$CreatedDate = date('Y-m-d');
		$CreatedBy = $data['CreatedBy'];
		$CreatedTime = date('H:i:s');
        $randomNumber = rand(1000, 100000);

		$blog_id = $data['form_id'];

		$commaSeparatedTags = '';

        if(isset($data['Tags']) != ' '){
            $tags = $data['Tags'];
            $tagsArray = json_decode($tags, true);

            $tagValues = array_map(function($tag) {
                return $tag['value'];
            }, $tagsArray);

            $commaSeparatedTags = implode(',', $tagValues);
        }


		$BlogImg = "";
		if(isset($_FILES['BlogImg']['name'])  && $_FILES['BlogImg']['name'] != '')
	    {

			$extn_pan = explode('.', $_FILES["BlogImg"]["name"]);
			$BlogImg   = $randomNumber."-".$blog_id."BlogImg-Attachment.".$extn_pan[1];
			$path = "../../project-assets/admin-media/blogimg/".$BlogImg;
			move_uploaded_file($_FILES["BlogImg"]["tmp_name"], $path);

	    }else{
	    	$BlogImg = $_POST['old_blog_img'];
	    }
        if (isset($_FILES['OGImage']['name'])  && $_FILES['OGImage']['name'] != '')
        {
            $extn_pan = explode('.', $_FILES["OGImage"]["name"]);
            $OGImage   = $randomNumber."-".$BlogID."OGImage-Attachment.".$extn_pan[1];
            $path = "../../project-assets/admin-media/blogimg/".$OGImage;
            move_uploaded_file($_FILES["OGImage"]["tmp_name"], $path);
            $query = "OGImage = '$OGImage' WHERE ID = $blog_id";
            $response = $this->_UpdateTableRecords($this->conn,'blogs', $query);
        }


	    // $old_blog_details = $this->GetblogDetailsbyID($blog_id);
	    // if($blogName == $old_blog_details['blogName'] && $Url == $old_blog_details['Url'] && $blogDate == $old_blog_details['blogDate'] && $blogTime == $old_blog_details['blogTime'] && $blogDescription == $old_blog_details['UblogDescriptionrl'])
	    // {
	    // 	$response['message'] = "No changes to update";
	    // 	$response['error'] = true;
	    // }
	    // else
	    // {
	    	$update_param = " BlogName = '$BlogName', Url = '$Url', ShortDescription = '$ShortDescription', Category = '$Category', BlogDescription = '$BlogDescription', BlogImg='$BlogImg', MetaTitle = '$MetaTitle', MetaDescription='$MetaDescription', OGTitle = '$OGTitle', OGDescription = '$OGDescription', Status = '$Status', Tags = '$commaSeparatedTags' where ID=$blog_id";
	    	$response = $this->_UpdateTableRecords($this->conn,'blogs', $update_param);
	    	$response['error'] = false;
			$response['message'] = "Blog Updated";

	    // }

	    return $response;
	}

	public function GetAllBlog()
	{
		$where = " where IsActive = 1 ORDER BY ID DESC";
        $branch_details = $this->_getTableRecords($this->conn, "blogs", $where);
        return $branch_details;
	}

	public function getTotalBlog($table)
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

	function DeleteBlog($data)
	{
		$BlogID = $data['ID'];
		// Delete course
		$where = " where ID = $BlogID";
		$response = $this->delete_identity_filter($this->conn,"blogs",$where);
		return $response;
	}

    function GetBlogDetailsbyID($ID)
	{
		$where = " where ID = $ID";
		$blog_details = $this->_getTableDetails($this->conn,'blogs', $where);
		return $blog_details;
	}

	function GetBlogDetailsbyURL($url)
	{
		$where = " where URL = '$url'";
		$blog_details = $this->_getTableDetails($this->conn,'blogs', $where);
		return $blog_details;
	}

    function GetAllBlogWithLimits($page = 1, $limit = 3) {
        $offset = ($page - 1) * $limit;

        $where = "WHERE IsActive = 1 and Status = 'Published' ORDER BY ID DESC LIMIT $limit OFFSET $offset";

        $branch_details = $this->_getTableRecords($this->conn, "blogs", $where);
        return $branch_details;
    }

    public function GetAllBlogByCategory($Category)
	{
		$where = " where IsActive = 1 and Status = 'Published' and Category = '$Category' ORDER BY ID DESC";
        $branch_details = $this->_getTableRecords($this->conn, "blogs", $where);
        return $branch_details;
	}

    public function InsertCategoryForm($data)
	{
		$Category = $this->cleantext($data['Category']);
        $Url = $this->cleantext($data['Url']);

		$CreatedDate = date('Y-m-d');
		$CreatedBy = $data['CreatedBy'];
		$CreatedTime = date('H:i:s');
        $randomNumber = rand(1000, 100000);

		$sql = "INSERT INTO blog_category(CategoryName,Url) VALUES ('$Category','$Url')";
		$response_blog_category_details = $this->_InsertTableRecords($this->conn,$sql);

		if($response_blog_category_details['error'] == false)
		{
			$response_blog_category_details['error'] = false;
		    $response_blog_category_details['message'] = "Blog Category is Successfully Added.";
		}
		else
		{
			$response_blog_category_details['error'] = true;
		    $response_blog_category_details['message'] = "Technical Issue, please try later";
		}
		return $response_blog_category_details;
	}


	public function UpdateCategoryForm($data)
	{
		$Category = $this->cleantext($data['Category']);
        $Url = $this->cleantext($data['Url']);

		$CreatedDate = date('Y-m-d');
		$CreatedBy = $data['CreatedBy'];
		$CreatedTime = date('H:i:s');
        $randomNumber = rand(1000, 100000);

		$category_form_id = $data['category_form_id'];

        $update_param = " CategoryName = '$Category', Url = '$Url' where ID=$category_form_id";
	    $response = $this->_UpdateTableRecords($this->conn,'blog_category', $update_param);

        if ($response['error'] == false) {

            $response['error'] = false;
			$response['message'] = "Blog Category Updated";

        }else{

            $response['error'] = true;
            $response['message'] = "Technical issue, please try again later.";

        }

	    return $response;
	}

    public function GetAllCategory()
	{
		$where = " where IsActive = 1 ORDER BY ID DESC";
        $blog_category_details = $this->_getTableRecords($this->conn, "blog_category", $where);
        return $blog_category_details;
	}

    function GetCategoryDetailsbyID($ID)
	{
		$where = " where ID = $ID";
		$blog_category_details = $this->_getTableDetails($this->conn,'blog_category', $where);
		return $blog_category_details;
	}

    function CheckDuplicateBlogCategory($data)
	{
		$Url = $data['Url'];
		if(isset($data['category_form_id']))
		{
			$ID = $data['category_form_id'];
			$filter = " where (Url = '$Url') and ID != $ID";
		}
		else
		{
			$filter = " where Url = '$Url'";
		}
		$response = $this->check_unique_identity_filter($this->conn,'blog_category', $filter);
		return $response;
	}

}
