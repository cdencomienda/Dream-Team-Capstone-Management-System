<?php
// Retrieve POST data
$postData = file_get_contents('php://input');
$data = json_decode($postData, true);

// Check if fileNames parameter exists
if (isset($data['fileNames'])) {
    // $data['fileNames'] is already an array, no need to decode again
    $fileNames = $data['fileNames'];

    // Respond with JSON content type
    header('Content-Type: application/json');

    // Echo back the file names as JSON
    echo json_encode(['message' => 'Received file names', 'fileNames' => $fileNames]);
} else {
    // Respond with JSON content type
    header('Content-Type: application/json');

    echo json_encode(['error' => 'No file names received']);
}
?>
