<?php
@session_start();
require_once('../../include/autoloader.inc.php');
try {
    
    $dbh = new Dbh();
    $conn = $dbh->_connectodb();
    
    // Get parameters
    $draw = intval($_POST['draw'] ?? 1);
    $start = intval($_POST['start'] ?? 0);
    $length = intval($_POST['length'] ?? 10);
    $search = trim($_POST['search']['value'] ?? '');

    // Simple query without complex joins
    $where = "IsActive = 1";
    if ($search) {
        $search = mysqli_real_escape_string($conn, $search);
        $where .= " AND Title LIKE '%$search%'";
    }

    // Count query
    $countSql = "SELECT COUNT(*) as cnt FROM gallery_video WHERE $where";
    $countResult = mysqli_query($conn, $countSql);
    $totalRecords = mysqli_fetch_assoc($countResult)['cnt'];

    // Data query
    $dataSql = "SELECT ID, Title, VideoCode FROM gallery_video WHERE $where ORDER BY ID DESC LIMIT $start, $length";
    $dataResult = mysqli_query($conn, $dataSql);

    $data = [];
    while ($row = mysqli_fetch_assoc($dataResult)) {
        // Simple thumbnail extraction
        $thumbnail = '';
        $videoCode = $row['VideoCode'];
        
        // Extract YouTube ID using simple regex
        if (preg_match('/(?:youtube\.com\/watch\?v=|youtu\.be\/)([a-zA-Z0-9_-]{11})/', $videoCode, $matches)) {
            $thumbnail = "https://img.youtube.com/vi/{$matches[1]}/maxresdefault.jpg";
        }
        
        $data[] = [
            'id' => intval($row['ID']),
            'thumbnail' => $thumbnail,
            'title' => $row['Title'],
            'action' => '<a href="update-gallery-video.php?id=' . $row['ID'] . '" class="btn btn-sm btn-primary"><i class="fe fe-edit"></i></a> ' .
                       '<button onclick="DeleteGalleryVideo(' . $row['ID'] . ')" class="btn btn-sm btn-danger ms-1"><i class="fe fe-trash"></i></button>'
        ];
    }

    // Build response
    $response = [
        "draw" => $draw,
        "recordsTotal" => intval($totalRecords),
        "recordsFiltered" => intval($totalRecords),
        "data" => $data
    ];


    echo json_encode($response);

} catch (Exception $e) {
    // Error response
    $errorResponse = [
        "draw" => intval($_POST['draw'] ?? 1),
        "recordsTotal" => 0,
        "recordsFiltered" => 0,
        "data" => [],
        "error" => $e->getMessage()
    ];
    echo json_encode($errorResponse);
}
?>


