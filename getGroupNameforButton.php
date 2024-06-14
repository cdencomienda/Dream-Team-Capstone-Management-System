<?php
session_start();

header('Content-Type: application/json');

// Assuming the user's ID is stored in a session variable called 'user_id'
if (!isset($_SESSION['user_id'])) {
    echo json_encode(['error' => 'User not logged in']);
    exit();
}

$user_id = $_SESSION['user_id'];

$conn = new mysqli('localhost', 'root', '', 'soe_assessment');

// Check connection
if ($conn->connect_error) {
    echo json_encode(['error' => 'Connection failed: ' . $conn->connect_error]);
    exit();
}

// SQL query to get the student's s_id using the user_id
$sql = "SELECT s_id FROM students WHERE student_id = ?";
if ($stmt = $conn->prepare($sql)) {
    $stmt->bind_param("s", $user_id);
    $stmt->execute();
    $stmt->bind_result($s_id);
    $stmt->fetch();
    $stmt->close();
} else {
    echo json_encode(['error' => 'Error preparing statement: ' . $conn->error]);
    $conn->close();
    exit();
}

if (empty($s_id)) {
    echo json_encode(['error' => 'Student not found.']);
    $conn->close();
    exit();
}

// SQL query to get the group name using the s_id
$sql = "SELECT group_name FROM groups WHERE s_id = ?";
if ($stmt = $conn->prepare($sql)) {
    $stmt->bind_param("i", $s_id);
    $stmt->execute();
    $stmt->bind_result($group_name);
    $stmt->fetch();
    $stmt->close();
} else {
    echo json_encode(['error' => 'Error preparing statement: ' . $conn->error]);
    $conn->close();
    exit();
}

$conn->close();

echo json_encode(['group_name' => isset($group_name) ? $group_name : 'Group not found']);
?>
