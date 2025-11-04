<?php
class NewsPR extends Core
{
	private $conn;
	public function __construct($conn)
	{
		$this->conn = $conn;
		$this->setTimeZone();
	}

	function InsertNewsPRForm($data)
	{
		$Heading = $this->cleantext($data['Heading']);
        $Url = $data['Url'];
        $NewsDate = $this->cleantext($data['NewsDate']);
        $NewsDescription = $this->cleantext($data['NewsDescription']);
        $NewsContent = $this->cleantext($data['NewsContent']);
        $Status = $data['Status'];

		$CreatedDate = date('Y-m-d');
		$CreatedBy = $data['CreatedBy'];
		$CreatedTime = date('H:i:s');
        $randomNumber = rand(1000, 100000);

		$sql = "INSERT INTO news_pr(Heading,Url,NewsDate,NewsDescription,NewsContent,Status,CreatedDate,CreatedTime,CreatedBy) VALUES ('$Heading','$Url','$NewsDate','$NewsDescription','$NewsContent','$Status','$CreatedDate','$CreatedTime','$CreatedBy')";
		$response_insert_newspr_details = $this->_InsertTableRecords($this->conn,$sql);

		if($response_insert_newspr_details['error'] == false)
		{
			$last_insert_id = $response_insert_newspr_details['last_insert_id'];
			$NewsID = $last_insert_id;
			if (isset($_FILES['NewsBanner']['name'])  && $_FILES['NewsBanner']['name'] != '')
			{
				$extn_pan = explode('.', $_FILES["NewsBanner"]["name"]);
				$NewsBanner   = $randomNumber."-".$NewsID."NewsBanner-Attachment.".$extn_pan[1];
				$path = "../../project-assets/admin-media/newspr/".$NewsBanner;
				move_uploaded_file($_FILES["NewsBanner"]["tmp_name"], $path);
				$query = "NewsBanner = '$NewsBanner' WHERE ID = $NewsID";
				$response = $this->_UpdateTableRecords($this->conn,'news_pr', $query);
			}

			$response_insert_newspr_details['error'] = false;
		    $response_insert_newspr_details['message'] = "News & PR is Successfully Added.";
		}
		else
		{
			$response_insert_newspr_details['error'] = true;
		    $response_insert_newspr_details['message'] = "Technical Issue, please try later";
		}
		return $response_insert_newspr_details;
	}


	function UpdateNewsPRForm($data)
	{
		$Heading = $this->cleantext($data['Heading']);
        $Url = $data['Url'];
        $NewsDate = $this->cleantext($data['NewsDate']);
        $NewsDescription = $this->cleantext($data['NewsDescription']);
        $NewsContent = $this->cleantext($data['NewsContent']);
        $Status = $this->cleantext($data['Status']);

		$CreatedDate = date('Y-m-d');
		$CreatedBy = $data['CreatedBy'];
		$CreatedTime = date('H:i:s');
		$case_id = $data['form_id'];
        $randomNumber = rand(1000, 100000);


		$NewsBanner = "";
		if(isset($_FILES['NewsBanner']['name'])  && $_FILES['NewsBanner']['name'] != '')
	    {

			$extn_pan = explode('.', $_FILES["NewsBanner"]["name"]);
			$NewsBanner   = $randomNumber."-".$case_id."NewsBanner-Attachment.".$extn_pan[1];
			$path = "../../project-assets/admin-media/newspr/".$NewsBanner;
			move_uploaded_file($_FILES["NewsBanner"]["tmp_name"], $path);

	    }else{
	    	$NewsBanner = $_POST['old_cs_img'];
	    }



	    	$update_param = " Heading = '$Heading', Url = '$Url',NewsDate = '$NewsDate', NewsDescription = '$NewsDescription', NewsContent = '$NewsContent', Status = '$Status', NewsBanner='$NewsBanner' where ID=$case_id";
	    	$response = $this->_UpdateTableRecords($this->conn,'news_pr', $update_param);
	    	$response['error'] = false;
			$response['message'] = "News & PR Updated";


	    return $response;
	}

	public function GetAllNewsPR($conn)
	{
		$where = " where IsActive = 1 ORDER BY ID DESC";
        $news_pr_details = $this->_getTableRecords($conn, "news_pr", $where);
        return $news_pr_details;
	}

	public function getTotalNewsPR($table)
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

	function DeleteNewsPR($data)
	{
		$NewsID = $data['ID'];
		// Delete News
		$where = " where ID = $NewsID";
		$response = $this->delete_identity_filter($this->conn,"news_pr",$where);
		return $response;
	}

    function GetNewsPRDetailsbyID($ID)
	{
		$where = " where ID = $ID";
		$news_pr_details = $this->_getTableDetails($this->conn,'news_pr', $where);
		return $news_pr_details;
	}

    function GetAllNewsPRWithLimit($page = 1, $limit = 6) {
        $offset = ($page - 1) * $limit;

        $where = "WHERE IsActive = 1 and Status = 'Published' ORDER BY ID DESC LIMIT $limit OFFSET $offset";

        $news_pr_details = $this->_getTableRecords($this->conn, "news_pr", $where);
        return $news_pr_details;
    }
    function GetNewsPRDetailsbyURL($url)
	{
		$where = " where URL = '$url'";
		$news_pr_details = $this->_getTableDetails($this->conn,'news_pr', $where);
		return $news_pr_details;
	}

}
