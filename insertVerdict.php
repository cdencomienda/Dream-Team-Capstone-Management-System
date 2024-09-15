<?php
session_start();
header('Content-Type: application/json'); // Ensure the response is JSON

// Check if session variables are set
if (!isset($_SESSION['user_id']) || !isset($_SESSION['student_group_id'])) {
    echo json_encode(['success' => false, 'message' => 'Session variables not set']);
    exit();
}

$conn = new mysqli('localhost', 'root', '', 'dreamteam');

// Check connection
if ($conn->connect_error) {
    echo json_encode(['success' => false, 'message' => 'Database connection failed: ' . $conn->connect_error]);
    exit();
}

// Get session variables
$chairID = $_SESSION['user_id'];
$groupID = $_SESSION['student_group_id'];

// Get data from POST request
$data = json_decode(file_get_contents('php://input'), true);
if (is_null($data)) {
    echo json_encode(['success' => false, 'message' => 'No data received']);
    exit();
}

$totalAverage = $data['totalAverage'];
$verdict = $data['verdict'];

// Validate data
if (empty($chairID) || empty($groupID) || empty($totalAverage) || empty($verdict)) {
    echo json_encode(['success' => false, 'message' => 'Invalid data provided']);
    exit();
}

// Prepare and execute SQL query
$sql = "INSERT INTO verdict (chairID, groupID, totalAverage, verdict) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param('iids', $chairID, $groupID, $totalAverage, $verdict);

if ($stmt->execute()) {
    echo json_encode(['success' => true, 'message' => 'Verdict inserted successfully']);
} else {
    echo json_encode(['success' => false, 'message' => 'Error: ' . $stmt->error]);
}

$stmt->close();
$conn->close();
?>
