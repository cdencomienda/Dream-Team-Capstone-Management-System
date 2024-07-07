<?php
// Start the session
session_start();

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the directory path from the POST request
    $data = json_decode(file_get_contents('php://input'), true);

    if (!isset($data['directory'])) {
        echo json_encode(['error' => 'Directory path not provided.']);
        exit;
    }

    $directoryPath = $data['directory'];

    // Base directory for repositories
    $baseDir = 'repositories/';

    // Full path to check
    $fullPath = $baseDir . $directoryPath;

    // Check if the directory exists
    if (file_exists($fullPath)) {
        // Save the full path in the session
        $_SESSION['fullPath'] = $fullPath;
        $_SESSION['reqName'] = null;
        
        echo json_encode(['exists' => true, 'path' => $fullPath]);
    } else {
        echo json_encode(['exists' => false, 'path' => $fullPath]);
    }
} else {
    echo json_encode(['error' => 'Invalid request method.']);
}
?>

