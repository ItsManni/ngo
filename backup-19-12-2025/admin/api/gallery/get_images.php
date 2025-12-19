<?php
@session_start();
require_once('../../include/autoloader.inc.php');
try {
    $dbh = new Dbh();
    $conn = $dbh->_connectodb();
    $galleryManager = new GalleryManager($conn);

    // DataTables parameters
    $draw = $_POST['draw'] ?? 1;
    $start = $_POST['start'] ?? 0;
    $length = $_POST['length'] ?? 10;
    $search = $_POST['search']['value'] ?? '';

    // Base query
    $baseQuery = "FROM gallery_image WHERE IsActive = 1 AND GalleryID = -1";

    // Search filter
    $searchQuery = "";
    if (!empty($search)) {
        $searchQuery = " AND Title LIKE '%$search%'";
    }

    // Count total records
    $totalQuery = "SELECT COUNT(*) as total " . $baseQuery . $searchQuery;
    $totalResult = mysqli_query($conn, $totalQuery);
    
    if (!$totalResult) {
        throw new Exception("Database query failed: " . mysqli_error($conn));
    }
    
    $totalRecords = mysqli_fetch_assoc($totalResult)['total'];

    // Get filtered data
    $dataQuery = "SELECT * " . $baseQuery . $searchQuery . " ORDER BY ID DESC LIMIT $start, $length";
    $dataResult = mysqli_query($conn, $dataQuery);
    
    if (!$dataResult) {
        throw new Exception("Database query failed: " . mysqli_error($conn));
    }

    $data = array();
    while ($row = mysqli_fetch_assoc($dataResult)) {
        $editBtn = "<a href='update-gallery-image.php?id=" . $row['ID'] . "' class='btn btn-sm btn-primary'><i class='fe fe-edit'></i></a>";
        $deleteBtn = "<button onclick='DeleteGalleryImage(" . $row['ID'] . ")' class='btn btn-sm btn-danger ms-1'><i class='fe fe-trash'></i></button>";
        
        $data[] = array(
            'id' => $row['ID'],
            'image' => $row['GalleryImage'],
            'title' => $row['Title'],
            'action' => $editBtn . $deleteBtn
        );
    }

    $response = array(
        "draw" => intval($draw),
        "recordsTotal" => intval($totalRecords),
        "recordsFiltered" => intval($totalRecords),
        "data" => $data
    );

    echo json_encode($response);

} catch (Exception $e) {
    $errorResponse = array(
        "draw" => intval($_POST['draw'] ?? 1),
        "recordsTotal" => 0,
        "recordsFiltered" => 0,
        "data" => array(),
        "error" => $e->getMessage()
    );
    echo json_encode($errorResponse);
}
?>
