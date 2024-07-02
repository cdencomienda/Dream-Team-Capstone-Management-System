<?php
// Start session if not already started
session_start();

// Assuming you receive JSON data
$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['reqName'])) {
    // Save reqName to session
    $_SESSION['reqName'] = $data['reqName'];
    echo json_encode(['message' => 'reqName saved to session']);
} else {
    // Handle error case
    http_response_code(400); // Bad request
    echo json_encode(['error' => 'Invalid data']);
}
?>
