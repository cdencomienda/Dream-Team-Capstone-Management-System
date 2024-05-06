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

// Fetch the group ID and adviser ID for the logged-in student
$sql = "SELECT g.groupID, g.adviserID, g.panelID
        FROM `group` g
        JOIN `users` u ON g.studentID = u.userID
        WHERE u.userID = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $userID);
$stmt->execute();
$result = $stmt->get_result();
$groupData = $result->fetch_assoc();
$groupID = $groupData['groupID'];
$adviserID = $groupData['adviserID'];
$panelID = $groupData['panelID'];

// Check if the group ID is found
if (!$groupID) {
    echo json_encode(['error' => 'Group not found']);
    exit();
}

// Fetch the panelist name from the `users` table
$sql = "SELECT u.username AS panelistName
        FROM users u
        WHERE u.userID = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $panelistID);
$stmt->execute();
$panelistResult = $stmt->get_result();
$panelistData = $panelistResult->fetch_assoc();
$panelistName = $panelistData['panelistName'];

// Fetch the adviser name from the `users` table
$sql = "SELECT u.username AS adviserName
        FROM users u
        WHERE u.userID = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $adviserID);
$stmt->execute();
$adviserResult = $stmt->get_result();
$adviserData = $adviserResult->fetch_assoc();
$adviserName = $adviserData['adviserName'];

// Close the statement and connection
$stmt->close();
$conn->close();

// Set the content type to JSON
header('Content-Type: application/json');

// Return the panelist and adviser names as a JSON response
echo json_encode([
    'adviser' => adviserName,
    'panelist' => panelistName
]);
?>
