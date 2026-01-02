<?php
class Home extends Core
{
	private $conn;
	public function __construct($conn)
	{
		$this->conn = $conn;
		$this->setTimeZone();
	}

    public function InsertCategoryForm($data)
	{
		$Category = $this->cleantext($data['Category']);
        $PriorityIndex = $this->cleantext($data['PriorityIndex']);

		$CreatedDate = date('Y-m-d');
		$CreatedBy = $data['CreatedBy'];
		$CreatedTime = date('H:i:s');
        $randomNumber = rand(1000, 100000);

		$sql = "INSERT INTO home_slider_category(CategoryName,PriorityIndex) VALUES ('$Category','$PriorityIndex')";
		$response_slider_category_details = $this->_InsertTableRecords($this->conn,$sql);

		if($response_slider_category_details['error'] == false)
		{
			$response_slider_category_details['error'] = false;
		    $response_slider_category_details['message'] = "Slider Category is Successfully Added.";
		}
		else
		{
			$response_slider_category_details['error'] = true;
		    $response_slider_category_details['message'] = "Technical Issue, please try later";
		}
		return $response_slider_category_details;
	}


	public function UpdateCategoryForm($data)
	{
		$Category = $this->cleantext($data['Category']);
        $PriorityIndex = $this->cleantext($data['PriorityIndex']);

		$CreatedDate = date('Y-m-d');
		$CreatedBy = $data['CreatedBy'];
		$CreatedTime = date('H:i:s');
        $randomNumber = rand(1000, 100000);

		$category_form_id = $data['category_form_id'];

        $update_param = " CategoryName = '$Category', PriorityIndex = '$PriorityIndex' where ID=$category_form_id";
	    $response = $this->_UpdateTableRecords($this->conn,'home_slider_category', $update_param);

        if ($response['error'] == false) {

            $response['error'] = false;
			$response['message'] = "Slider Category Updated";

        }else{

            $response['error'] = true;
            $response['message'] = "Technical issue, please try again later.";

        }

	    return $response;
	}

    public function GetAllSliderCategory()
	{
		$where = " where IsActive = 1 ORDER BY CAST(PriorityIndex AS UNSIGNED) ASC";
        $slider_category_details = $this->_getTableRecords($this->conn, "home_slider_category", $where);
        return $slider_category_details;
	}

    function GetSliderCategoryDetailsbyID($ID)
	{
		$where = " where ID = $ID";
		$slider_category_details = $this->_getTableDetails($this->conn,'home_slider_category', $where);
		return $slider_category_details;
	}

    function CheckDuplicateSliderCategory($data)
	{
		$Category = $data['Category'];
		if(isset($data['category_form_id']))
		{
			$ID = $data['category_form_id'];
			$filter = " where (CategoryName = '$Category') and ID != $ID";
		}
		else
		{
			$filter = " where CategoryName = '$Category'";
		}
		$response = $this->check_unique_identity_filter($this->conn,'home_slider_category', $filter);
		return $response;
	}

    function DeleteSliderCategory($data)
	{
		$SliderCategoryID = $data['ID'];

		$where = " where ID = $SliderCategoryID";
		$response = $this->delete_identity_filter($this->conn,"home_slider_category",$where);
		return $response;
	}


    public function InsertSliderForm($data)
	{
		$CategoryID = $this->cleantext($data['CategoryID']);
		$SliderHeading = $this->cleantext($data['SliderHeading']);
        $SliderDescription = $this->cleantext($data['SliderDescription']);
        $ButtonText = $this->cleantext($data['ButtonText']);
        $ButtonUrl = $this->cleantext($data['ButtonUrl']);

		$CreatedDate = date('Y-m-d');
		$CreatedBy = $data['CreatedBy'];
		$CreatedTime = date('H:i:s');
        $randomNumber = rand(1000, 100000);

		$sql = "INSERT INTO home_slider(CategoryID,SliderHeading,SliderDescription,ButtonText,ButtonUrl) VALUES ('$CategoryID','$SliderHeading','$SliderDescription','$ButtonText','$ButtonUrl')";
		$response_slider_details = $this->_InsertTableRecords($this->conn,$sql);

        $SliderID = $response_slider_details['last_insert_id'];

        if (isset($_FILES['SliderBackgroundImage']['name'])  && $_FILES['SliderBackgroundImage']['name'] != '')
        {
            $extn_pan = explode('.', $_FILES["SliderBackgroundImage"]["name"]);
            $SliderBackgroundImage   = $randomNumber."-".$SliderID."SliderBackgroundImage-Attachment.".$extn_pan[1];
            $path = "../../project-assets/admin-media/slider/".$SliderBackgroundImage;
            move_uploaded_file($_FILES["SliderBackgroundImage"]["tmp_name"], $path);
            $query = "SliderBackgroundImage = '$SliderBackgroundImage' WHERE ID = $SliderID";
            $response = $this->_UpdateTableRecords($this->conn,'home_slider', $query);
        }

        if (isset($_FILES['SliderImage']['name'])  && $_FILES['SliderImage']['name'] != '')
        {
            $extn_pan = explode('.', $_FILES["SliderImage"]["name"]);
            $SliderImage   = $randomNumber."-".$SliderID."SliderImage-Attachment.".$extn_pan[1];
            $path = "../../project-assets/admin-media/slider/".$SliderImage;
            move_uploaded_file($_FILES["SliderImage"]["tmp_name"], $path);
            $query = "SliderImage = '$SliderImage' WHERE ID = $SliderID";
            $response = $this->_UpdateTableRecords($this->conn,'home_slider', $query);
        }

		if($response_slider_details['error'] == false)
		{
			$response_slider_details['error'] = false;
		    $response_slider_details['message'] = "Slider is Successfully Added.";
		}
		else
		{
			$response_slider_details['error'] = true;
		    $response_slider_details['message'] = "Technical Issue, please try later";
		}
		return $response_slider_details;
	}

    public function UpdateSliderForm($data)
	{
        $CategoryID = $this->cleantext($data['CategoryID']);
		$SliderHeading = $this->cleantext($data['SliderHeading']);
        $SliderDescription = $this->cleantext($data['SliderDescription']);
        $ButtonText = $this->cleantext($data['ButtonText']);
        $ButtonUrl = $this->cleantext($data['ButtonUrl']);

		$CreatedDate = date('Y-m-d');
		$CreatedBy = $data['CreatedBy'];
		$CreatedTime = date('H:i:s');
        $randomNumber = rand(1000, 100000);

		$SliderID = $data['form_id'];

        if (isset($_FILES['SliderBackgroundImage']['name'])  && $_FILES['SliderBackgroundImage']['name'] != '')
        {
            $extn_pan = explode('.', $_FILES["SliderBackgroundImage"]["name"]);
            $SliderBackgroundImage   = $randomNumber."-".$SliderID."SliderBackgroundImage-Attachment.".$extn_pan[1];
            $path = "../../project-assets/admin-media/slider/".$SliderBackgroundImage;
            move_uploaded_file($_FILES["SliderBackgroundImage"]["tmp_name"], $path);
            $query = "SliderBackgroundImage = '$SliderBackgroundImage' WHERE ID = $SliderID";
            $response = $this->_UpdateTableRecords($this->conn,'home_slider', $query);
        }

        if (isset($_FILES['SliderImage']['name'])  && $_FILES['SliderImage']['name'] != '')
        {
            $extn_pan = explode('.', $_FILES["SliderImage"]["name"]);
            $SliderImage   = $randomNumber."-".$SliderID."SliderImage-Attachment.".$extn_pan[1];
            $path = "../../project-assets/admin-media/slider/".$SliderImage;
            move_uploaded_file($_FILES["SliderImage"]["tmp_name"], $path);
            $query = "SliderImage = '$SliderImage' WHERE ID = $SliderID";
            $response = $this->_UpdateTableRecords($this->conn,'home_slider', $query);
        }

        $update_param = " CategoryID = $CategoryID, SliderHeading = '$SliderHeading', SliderDescription = '$SliderDescription', ButtonText = '$ButtonText', ButtonUrl = '$ButtonUrl' where ID=$SliderID";
	    $response = $this->_UpdateTableRecords($this->conn,'home_slider', $update_param);

        if ($response['error'] == false) {

            $response['error'] = false;
			$response['message'] = "Slider Category Updated";

        }else{

            $response['error'] = true;
            $response['message'] = "Technical issue, please try again later.";

        }

	    return $response;
	}

    function GetSliderDetailsbyCategoryID($CategoryID)
	{
		$where = " where CategoryID = $CategoryID";
		$home_slider_details = $this->_getTableDetails($this->conn,'home_slider', $where);
		return $home_slider_details;
	}


    public function UpdateHomePageForm($data)
	{
        $AboutDescription = $this->cleantext($data['AboutDescription']);
		$ButtonText = $this->cleantext($data['ButtonText']);
        $ButtonUrl = $this->cleantext($data['ButtonUrl']);
        $SustanaiblityContent = $this->cleantext($data['SustanaiblityContent']);
        $SustanaiblityButtonText = $this->cleantext($data['SustanaiblityButtonText']);
        $SustanaiblityButtonUrl = $this->cleantext($data['SustanaiblityButtonUrl']);

		$CreatedDate = date('Y-m-d');
		$CreatedBy = $data['CreatedBy'];
		$CreatedTime = date('H:i:s');
        $randomNumber = rand(1000, 100000);

		$PageID = 1;

        if (isset($_FILES['AboutImage']['name'])  && $_FILES['AboutImage']['name'] != '')
        {
            $extn_pan = explode('.', $_FILES["AboutImage"]["name"]);
            $AboutImage   = $randomNumber."-".$PageID."AboutImage-Attachment.".$extn_pan[1];
            $path = "../../project-assets/admin-media/home/".$AboutImage;
            move_uploaded_file($_FILES["AboutImage"]["tmp_name"], $path);
            $query = "AboutImage = '$AboutImage' WHERE ID = $PageID";
            $response = $this->_UpdateTableRecords($this->conn,'home_page', $query);
        }

        if (isset($_FILES['SustanaiblityBG']['name'])  && $_FILES['SustanaiblityBG']['name'] != '')
        {
            $extn_pan = explode('.', $_FILES["SustanaiblityBG"]["name"]);
            $SustanaiblityBG   = $randomNumber."-".$PageID."SustanaiblityBG-Attachment.".$extn_pan[1];
            $path = "../../project-assets/admin-media/home/".$SustanaiblityBG;
            move_uploaded_file($_FILES["SustanaiblityBG"]["tmp_name"], $path);
            $query = "SustanaiblityBG = '$SustanaiblityBG' WHERE ID = $PageID";
            $response = $this->_UpdateTableRecords($this->conn,'home_page', $query);
        }

        if (isset($_FILES['Certifiacte']['name'])  && $_FILES['Certifiacte']['name'] != '')
        {
            $extn_pan = explode('.', $_FILES["Certifiacte"]["name"]);
            $Certifiacte   = $randomNumber."-".$PageID."Certifiacte-Attachment.".$extn_pan[1];
            $path = "../../project-assets/admin-media/home/".$Certifiacte;
            move_uploaded_file($_FILES["Certifiacte"]["tmp_name"], $path);
            $query = "Certifiacte = '$Certifiacte' WHERE ID = $PageID";
            $response = $this->_UpdateTableRecords($this->conn,'home_page', $query);
        }

        $update_param = " AboutDescription = '$AboutDescription', ButtonText = '$ButtonText', ButtonUrl = '$ButtonUrl', SustanaiblityContent = '$SustanaiblityContent', SustanaiblityButtonText = '$SustanaiblityButtonText', SustanaiblityButtonUrl = '$SustanaiblityButtonUrl' where ID=$PageID";
	    $response = $this->_UpdateTableRecords($this->conn,'home_page', $update_param);

        if ($response['error'] == false) {

            $response['error'] = false;
			$response['message'] = "Page Content Updated";

        }else{

            $response['error'] = true;
            $response['message'] = "Technical issue, please try again later.";

        }

	    return $response;
	}

    function GetHomePageDetailsByID()
	{
		$where = " where ID = 1";
		$home_page_details = $this->_getTableDetails($this->conn,'home_page', $where);
		return $home_page_details;
	}




}
