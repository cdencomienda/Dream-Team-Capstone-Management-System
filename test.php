<?php
session_start();

if (isset($_POST['submit'])) {
    // Check if file upload is set and handle errors
    if (!isset($_FILES['studentFile']) || $_FILES['studentFile']['error'] !== UPLOAD_ERR_OK) {
        die("File upload failed with error code " . $_FILES['studentFile']['error']);
    }

    $file = $_FILES['studentFile'];

    // Specify the directory where you want to save the uploaded files
    $uploadDir = 'test/';

    // Generate a unique name to prevent overwriting existing files
    $fileName = uniqid() . '_' . basename($file['name']);

    // Move the uploaded file to the desired directory
    $destination = $uploadDir . $fileName;
    if (!move_uploaded_file($file['tmp_name'], $destination)) {
        die("Failed to move uploaded file");
    }

    echo "File uploaded successfully as: " . $fileName;

    // Optionally, you can store the file path in a session variable
    $_SESSION['uploadedFilePath'] = $destination;
}
?>