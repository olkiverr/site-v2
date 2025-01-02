<?php
header('Content-Type: application/json');

$response = array();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_FILES['file']) && $_FILES['file']['error'] == UPLOAD_ERR_OK) {
        $uploadDir = '../anime_img/';
        $uploadFile = $uploadDir . basename($_FILES['file']['name']);

        if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadFile)) {
            $response['status'] = 'success';
            $response['imageUrl'] = $uploadFile;
        } else {
            $response['status'] = 'error';
            $response['message'] = 'Failed to move uploaded file.';
        }
    } elseif (isset($_POST['image']) && !empty($_POST['image'])) {
        $response['status'] = 'success';
        $response['imageUrl'] = $_POST['image'];
    } else {
        $response['status'] = 'error';
        $response['message'] = 'No image provided.';
    }
} else {
    $response['status'] = 'error';
    $response['message'] = 'Invalid request method.';
}

echo json_encode($response);
?>
