<?php
session_start();

// Database connection details
$conn = mysqli_connect('localhost', 'root', '', 'dreamteam');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize response array
$response = array();

// Check if course_id is set in the session
if (isset($_SESSION['course_id'])) {
    $course_id = $_SESSION['course_id'];

    // Query to fetch rubricName from rubrics table
    $sql = "SELECT rubricName FROM rubrics WHERE courseID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $course_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Rubric exists, fetch the rubricName
        $row = $result->fetch_assoc();
        $response['rubricName'] = $row['rubricName'];
    } else {
        // No rubric selected for this course
        $response['error'] = "No rubric selected for this course.";
    }

    $stmt->close();
} else {
    $response['error'] = "No course ID found in the session.";
}

$conn->close();

// Set content type to application/json
header('Content-Type: application/json');

// Output the response as JSON
echo json_encode($response);
?>
