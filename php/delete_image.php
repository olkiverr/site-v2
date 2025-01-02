<?php
header('Content-Type: application/json');

$response = array();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['image']) && !empty($_POST['image'])) {
        $imagePath = $_POST['image'];
        if (file_exists($imagePath)) {
            if (unlink($imagePath)) {
                $response['status'] = 'success';
                $response['message'] = 'Image deleted successfully.';
            } else {
                $response['status'] = 'error';
                $response['message'] = 'Failed to delete image.';
            }
        } else {
            $response['status'] = 'error';
            $response['message'] = 'Image not found.';
        }
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
