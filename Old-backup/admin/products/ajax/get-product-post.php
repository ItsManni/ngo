<?php

@session_start();

require_once('../../include/autoloader.inc.php');

$dbh = new Dbh();

$conn = $dbh->_connectodb();

$core = new Core();

$id = isset($_POST['id']) ? intval($_POST['id']) : 0;

$response = ['error' => true, 'message' => 'Invalid Product ID'];

if ($id > 0) {

    $row = $core->_getTableDetails($conn, 'products', "WHERE ID = $id AND IsActive = 1");

    if (!empty($row)) {

        $imageUrl = "";

        if (!empty($row['Images'])) {

            $imageUrl = "../uploads/products/" . $row['Images'];

        }

        $response = [

            'error'      => false,

            'id'         => $row['ID'],

            'sevaye_id'  => $row['SevayeID'], // For dropdown
             'subcategory_id' => $row['SevayeSubcategoryID'], 

            'name'       => $row['Name'],

            'price'      => $row['Ammount'],

            'image'      => $row['Images'],

            'image_url'  => $imageUrl

        ];

    } else {

        $response['message'] = "Product not found";

    }

}



echo json_encode($response);

