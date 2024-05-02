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

// Retrieve the `requirementsID` for the user's group
$sql = "SELECT g.requirementsID
        FROM `group` g
        JOIN `users` u ON g.studentID = u.userID
        WHERE u.userID = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $userID);
$stmt->execute();
$result = $stmt->get_result();
$groupData = $result->fetch_assoc();

$requirementsID = $groupData['requirementsID'];

// Check if the `requirementsID` is found
if (!$requirementsID) {
    echo json_encode(['error' => 'Requirements ID not found']);
    exit();
}

// Fetch the requirements details based on `requirementsID`
$sql = "SELECT r.reqName
        FROM requirements r
        WHERE r.requirementsID = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $requirementsID);
$stmt->execute();
$result = $stmt->get_result();

$requirements = [];

// Populate the requirements array with the fetched data
while ($row = $result->fetch_assoc()) {
    $requirements[] = $row['reqName'];
}

$stmt->close();
$conn->close();

// Set the content type to JSON
header('Content-Type: application/json');

// Return the requirements as a JSON response
echo json_encode($requirements);
?>
