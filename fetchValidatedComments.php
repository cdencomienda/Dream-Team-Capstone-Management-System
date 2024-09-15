<?php
session_start();

// Check if the session variables are set
if (!isset($_SESSION['student_group_id']) || !isset($_SESSION['course_id'])) {
    echo json_encode(['error' => 'Session variables are not set']);
    exit();
}

$conn = new mysqli('localhost', 'root', '', 'dreamteam');

// Check connection
if ($conn->connect_error) {
    echo json_encode(['error' => 'Database connection failed: ' . $conn->connect_error]);
    exit();
}

$groupID = $_SESSION['student_group_id'];
$courseID = $_SESSION['course_id'];

$validatedData = [];

// Prepare and execute SQL query
$sql = "SELECT panelRole, validatedComments FROM feedback WHERE groupID = ? AND courseID = ?";
$stmt = $conn->prepare($sql);
if ($stmt === false) {
    echo json_encode(['error' => 'Statement preparation failed: ' . $conn->error]);
    exit();
}

$stmt->bind_param("ii", $groupID, $courseID);
$stmt->execute();
$result = $stmt->get_result();

while ($row = $result->fetch_assoc()) {
    $validatedData[$row['panelRole']] = explode('~', $row['validatedComments']);
}

$stmt->close();
$conn->close();

// Set content type to JSON
header('Content-Type: application/json');
echo json_encode($validatedData);
?>
