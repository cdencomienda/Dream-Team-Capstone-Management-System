<?php
// Start the session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header('HTTP/1.1 401 Unauthorized');
    echo json_encode(['error' => 'User not logged in']);
    exit();
}

// Database connection details
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'dreamteam';

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    header('HTTP/1.1 500 Internal Server Error');
    echo json_encode(['error' => 'Database connection failed']);
    exit();
}

// Retrieve the user ID from the session
$userID = $_SESSION['user_id'];

// Prepare and execute the query to get the student's group information
$sql = "SELECT g.groupID, g.groupname
        FROM `group` g
        JOIN `users` u ON g.studentID = u.userID
        WHERE u.userID = ?";

$stmt = $conn->prepare($sql);

if (!$stmt) {
    header('HTTP/1.1 500 Internal Server Error');
    echo json_encode(['error' => 'Failed to prepare the query']);
    exit();
}

$stmt->bind_param('i', $userID);

if (!$stmt->execute()) {
    header('HTTP/1.1 500 Internal Server Error');
    echo json_encode(['error' => 'Failed to execute the query']);
    exit();
}

$result = $stmt->get_result();

// Check if a group was found for the user
$groupInfo = $result->fetch_assoc();

$stmt->close();
$conn->close();

// Set the content type to JSON
header('Content-Type: application/json');

// Return the group information as a JSON response
if ($groupInfo) {
    echo json_encode($groupInfo);
} else {
    echo json_encode(['error' => 'Group not found']);
}
?>
