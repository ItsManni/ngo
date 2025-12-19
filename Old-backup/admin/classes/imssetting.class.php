<?php



class IMSSetting extends Core



{



	private $conn;



	public function __construct($conn)



	{



		$this->conn = $conn;



		$this->setTimeZone();



	}







    // public function InsertWebsiteSocialForm($data)



	// {



	// 	$Link = $this->cleantext($data['Link']);



    //     $Feature = $this->cleantext($data['Feature']);







	// 	$CreatedDate = date('Y-m-d');



	// 	$CreatedBy = $data['CreatedBy'];



	// 	$CreatedTime = date('H:i:s');



    //     $randomNumber = rand(1000, 100000);







	// 	$sql = "INSERT INTO website_info(Link,Feature) VALUES ('$Link','$Feature')";



	// 	$response_website_info_details = $this->_InsertTableRecords($this->conn,$sql);







	// 	if($response_website_info_details['error'] == false)



	// 	{



	// 		$last_insert_id = $response_website_info_details['last_insert_id'];



	// 		$SocialID = $last_insert_id;







    //         if (isset($_FILES['SocialIcon']['name'])  && $_FILES['SocialIcon']['name'] != '')



	// 		{



	// 			$extn_pan = explode('.', $_FILES["SocialIcon"]["name"]);



	// 			$SocialIcon   = $randomNumber."-".$SocialID."SocialIcon-Attachment.".$extn_pan[1];



	// 			$path = "../../project-assets/admin-media/socialmedia/".$SocialIcon;



	// 			move_uploaded_file($_FILES["SocialIcon"]["tmp_name"], $path);



	// 			$query = "Icon = '$SocialIcon' WHERE ID = $SocialID";



	// 			$response = $this->_UpdateTableRecords($this->conn,'website_info', $query);



	// 		}







	// 		$response_website_info_details['error'] = false;



	// 	    $response_website_info_details['message'] = "Social Media is Successfully Added.";



	// 	}



	// 	else



	// 	{



	// 		$response_website_info_details['error'] = true;



	// 	    $response_website_info_details['message'] = "Technical Issue, please try later";



	// 	}



	// 	return $response_website_info_details;



	// }











	public function UpdateWebsiteInfoForm($data)



	{



		$Facebook = $this->cleantext($data['Facebook']);



        $Instagram = $this->cleantext($data['Instagram']);



        $LinkedIn = $this->cleantext($data['LinkedIn']);



        $Youtube = $this->cleantext($data['Youtube']);



        $Twiter = $this->cleantext($data['Twiter']);



        $Hotline = $this->cleantext($data['Hotline']);



        $Email = $this->cleantext($data['Email']);



        $WhatsApp = $this->cleantext($data['WhatsApp']);







		$CreatedDate = date('Y-m-d');



		$CreatedBy = $data['CreatedBy'];



		$CreatedTime = date('H:i:s');



        $randomNumber = rand(1000, 100000);







		$website_form_id = $data['website_form_id'];







        $update_param = " Facebook = '$Facebook', Instagram = '$Instagram', LinkedIn = '$LinkedIn', Youtube = '$Youtube', Twiter = '$Twiter', Hotline = '$Hotline', Email = '$Email',



         WhatsApp = '$WhatsApp', CreatedDate = '$CreatedDate', CreatedTime = '$CreatedTime', CreatedBy = '$CreatedBy' where ID=$website_form_id";



	    $response = $this->_UpdateTableRecords($this->conn,'website_info', $update_param);







        $response['error'] = false;



		$response['message'] = "Website Info Updated";







	    return $response;



	}







    public function GetAllWebsiteSocial()



	{



		$where = " where IsActive = 1 ORDER BY ID DESC";



        $website_info_details = $this->_getTableRecords($this->conn, "website_info", $where);



        return $website_info_details;



	}













    function GetWebsiteInfoDetailsbyID()



	{



		$where = " where ID = 1";



		$website_info_details = $this->_getTableDetails($this->conn,'website_info', $where);



		return $website_info_details;



	}







 

    public function CheckDuplicateSevayeName($data)

     {

        $sql = "SELECT COUNT(*) as cnt FROM sevaye WHERE Name = ? AND IsActive = 1";

        $stmt = $this->conn->prepare($sql);

        $stmt->bind_param("s", $data['service_name']);

        $stmt->execute();

        $result = $stmt->get_result()->fetch_assoc();

        return ($result['cnt'] == 0);

    }



   

    public function InsertSevayeName($data) {

        $columns = ['Name', 'Image','PageUrl', 'CreatedDate', 'CreatedTime', 'CreatedBy'];

        $values = [

            $data['service_name'],

            $data['service_image'],

            $data['page_url'], 

            $data['CreatedDate'],

            $data['CreatedTime'],

            $data['CreatedBy']

        ];



        return $this->_InsertPreparedData($this->conn, 'sevaye', $columns, $values);

    }



   

    public function UpdateSevayeName($data)

     {

        $updateData = [

            'Name' => $data['service_name'],

            'PageUrl'=>$data['page_url']

        ];



        if (!empty($data['service_image'])) {

            $updateData['Image'] = $data['service_image'];

        }



        $whereCondition = "ID = " . intval($data['sevayeForm_action_value']);

        return $this->_UpdatePreparedData($this->conn, 'sevaye', $updateData, $whereCondition);

    }



    public function AllSevaye()

    {

    	$where='Where IsActive=1';

    	$result=$this->_getTableRecords($this->conn,'sevaye',$where);

    	return $result;

    }








    // ============================================================
// Insert Sevaye Subcategory
// ============================================================
public function InsertSevayeSubcategory($data)
{
    $columns = [
        'CategoryID',
        'SubcategoryName',
        'SubcategoryImage',
        'Priority',
        'CreatedDate',
        'CreatedTime',
        'CreatedBy'
    ];

    $values = [
        $data['CategoryID'],
        $data['SubcategoryName'],
        $data['SubcategoryImage'],
        $data['Priority'],
        $data['CreatedDate'],
        $data['CreatedTime'],
        $data['CreatedBy']
    ];

    return $this->_InsertPreparedData($this->conn, 'sevaye_subcategory', $columns, $values);
}


// ============================================================
// Update Sevaye Subcategory
// ============================================================
public function UpdateSevayeSubcategory($data)
{
    $updateData = [
        'CategoryID'      => $data['CategoryID'],
        'SubcategoryName' => $data['SubcategoryName'],
        'Priority'        => $data['Priority']
    ];

    if (!empty($data['SubcategoryImage'])) {
        $updateData['SubcategoryImage'] = $data['SubcategoryImage'];
    }

    $whereCondition = "ID = " . intval($data['SubcategoryID']);

    return $this->_UpdatePreparedData($this->conn, 'sevaye_subcategory', $updateData, $whereCondition);
}


// ============================================================
// Check Duplicate Subcategory (Optional but Recommended)
// ============================================================
public function CheckDuplicateSubcategoryName($data)
{
    $sql = "SELECT COUNT(*) AS cnt 
            FROM sevaye_subcategory 
            WHERE SubcategoryName = ? 
              AND CategoryID = ? 
              AND IsActive = 1";

    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("si", $data['SubcategoryName'], $data['CategoryID']);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc();

    return ($result['cnt'] == 0); // returns true if not duplicate
}



 public function AllSubSevaye()
    {
    	$where='Where IsActive=1 ORDER BY Priority ASC';
    	$result=$this->_getTableRecords($this->conn,'sevaye_subcategory',$where);
    	return $result;
    }

}





