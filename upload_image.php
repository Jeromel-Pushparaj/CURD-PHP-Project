<?php
// Ensure a file was uploaded
if (isset($_FILES['file'])) {
    $file = $_FILES['file'];

    // Define the upload directory
    $upload_dir = 'uploads/';
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0755, true);
    }

    // Generate a unique file name to avoid overwriting existing files
    $file_name = uniqid() . '_' . basename($file['name']);
    $file_path = $upload_dir . $file_name;

    // Move the uploaded file to the server
    if (move_uploaded_file($file['tmp_name'], $file_path)) {
        // Return the file URL to TinyMCE
        $response = ['location' => $file_path];
        echo json_encode($response);
    } else {
        header("HTTP/1.1 500 Internal Server Error");
        echo 'Failed to move uploaded file.';
    }
} else {
    header("HTTP/1.1 400 Bad Request");
    echo 'No file uploaded.';
}
?>
