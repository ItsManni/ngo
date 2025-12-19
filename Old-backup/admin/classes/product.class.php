<?php

class Product extends Core

{

    private $conn;



    public function __construct($conn)

    {

        $this->conn = $conn;

        $this->setTimeZone();

    }



    // Add product

    function InsertProduct($data)

    {

        $Name = $this->cleantext($data['Name']);

        $Ammount = floatval($data['Ammount']);

        $CreatedDate = date('Y-m-d');

        $CreatedBy = intval($data['CreatedBy']);

        $CreatedTime = date('H:i:s');

        $randomNumber = rand(1000, 100000);

        // Insert main record

        $sql = "INSERT INTO products (Name, Ammount, CreatedDate, CreatedTime, CreatedBy) 

                VALUES ('$Name', '$Ammount', '$CreatedDate', '$CreatedTime', '$CreatedBy')";

        $response_insert = $this->_InsertTableRecords($this->conn, $sql);

        if ($response_insert['error'] == false) {

            $last_insert_id = $response_insert['last_insert_id'];

            // Handle image upload

            if (!empty($_FILES['Images']['name'])) {

                $extn = pathinfo($_FILES["Images"]["name"], PATHINFO_EXTENSION);

                $imageName = $randomNumber . "-" . $last_insert_id . "-Product." . $extn;

                $path = "../uploads/products/" . $imageName;



                if (move_uploaded_file($_FILES["Images"]["tmp_name"], $path)) {

                    $query = "Images = '$imageName' WHERE ID = $last_insert_id";

                    $this->_UpdateTableRecords($this->conn, 'products', $query);

                }

            }



            $response_insert['error'] = false;

            $response_insert['message'] = "Product successfully added.";

        } else {

            $response_insert['error'] = true;

            $response_insert['message'] = "Technical issue, please try again later.";

        }



        return $response_insert;

    }



    // Update product

    function UpdateProduct($data)

    {

        $ProductID = intval($data['ID']);

        $Name = $this->cleantext($data['Name']);

        $Ammount = floatval($data['Ammount']);

        $randomNumber = rand(1000, 100000);



        // Handle new image upload

        if (!empty($_FILES['Images']['name'])) {

            $extn = pathinfo($_FILES["Images"]["name"], PATHINFO_EXTENSION);

            $imageName = $randomNumber . "-" . $ProductID . "-Product." . $extn;

            $path = "../../project-assets/admin-media/products/" . $imageName;



            if (move_uploaded_file($_FILES["Images"]["tmp_name"], $path)) {

                $query = "Images = '$imageName' WHERE ID = $ProductID";

                $this->_UpdateTableRecords($this->conn, 'products', $query);

            }

        }



        // Update record

        $update_param = "Name = '$Name', Ammount = '$Ammount' WHERE ID = $ProductID";

        $response = $this->_UpdateTableRecords($this->conn, 'products', $update_param);



        $response['error'] = false;

        $response['message'] = "Product updated successfully.";

        return $response;

    }



    // Get all active products

    public function GetAllProducts()

    {

        $where = "WHERE IsActive = 1 ORDER BY ID DESC";

        return $this->_getTableRecords($this->conn, "products", $where);

    }



    // Get total product count

    public function GetTotalProducts()

    {

        $sql = "SELECT COUNT(*) as total FROM products WHERE IsActive = 1";

        $result = mysqli_query($this->conn, $sql);

        if ($result && $result->num_rows > 0) {

            $row = $result->fetch_assoc();

            return intval($row['total']);

        }

        return 0;

    }



    // Delete product

    function DeleteProduct($data)

    {

        $ProductID = intval($data['ID']);

        $where = "WHERE ID = $ProductID";

        return $this->delete_identity_filter($this->conn, "products", $where);

    }



    // Get product by ID

    function GetProductByID($ID)

    {

        $where = "WHERE ID = " . intval($ID);

        return $this->_getTableDetails($this->conn, 'products', $where);

    }



    function GetAllProductBySevayeID($ID)

    {

         $where = "WHERE SevayeID = $ID And IsActive= 1 ORDER BY Priority ASC";

        return $this->_getTableRecords($this->conn, 'products', $where);

    }

      function GetAllProductBySevayeIDNotSubcat($ID)
    {
        $where = "WHERE SevayeID = $ID And  SevayeSubcategoryID =-1 And IsActive=1 ORDER BY Priority ASC";
        return $this->_getTableRecords($this->conn, 'products', $where);
    }

    public function GetAllProductBySubcategoryID($subcatID)
{
    $subcatID = intval($subcatID);
    $where = "WHERE IsActive=1 AND SevayeSubcategoryID = $subcatID";
    $result = $this->_getTableRecords($this->conn, 'products', $where);
    return $result;
}

}

?>