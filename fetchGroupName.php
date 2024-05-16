<?php
// Start the session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id']) || empty($_SESSION['user_id'])) {
    echo json_encode(['error' => 'User not logged in']);
    exit();
}

// Check if the course ID is set in the session
if (isset($_SESSION['varCourseID'])) {
    // Retrieve the course ID from the session
    $courseID = $_SESSION['varCourseID'];
    
    $conn = mysqli_connect('localhost', 'root', '', 'dreamteam');

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Escape variables for security
    $userID = $conn->real_escape_string($_SESSION['user_id']);
    $courseID = $conn->real_escape_string($courseID);

    // Prepare and execute SQL query to fetch groupName based on courseID and userID
    $sql = "SELECT groupName FROM `group` WHERE courseID = '$courseID' AND studentID = '$userID'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Fetch group name and encode as JSON
        $row = $result->fetch_assoc();
        $groupName = $row["groupName"];
        $response = ['groupName' => $groupName];
        echo json_encode($response);
    } else {
        echo json_encode(['error' => 'No group found for this course']);
    }

    // Close database connection
    $conn->close();
} else {
    echo json_encode(['error' => 'Course ID not set in session']);
}
?>
