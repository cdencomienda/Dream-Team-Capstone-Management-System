<?php
session_start();

// Initialize an empty array to store reqName values
$requirements = array();

// Check if student_group_id is set in the session
if (isset($_SESSION['student_group_id'])) {
    // Retrieve student_group_id from session
    $studentGroupId = $_SESSION['student_group_id'];

    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'dreamteam');

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Query to get distinct reqName where requirementsID = student_group_id
    $sql = "SELECT DISTINCT reqName FROM requirements WHERE requirementsID = $studentGroupId";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Loop through results and store reqName values in the array
        while ($row = $result->fetch_assoc()) {
            $requirements[] = $row['reqName'];
        }
        
        
        // Echo the JSON encoded array
        echo json_encode($requirements);
    } else {
        echo json_encode(array()); // Empty array if no requirements found
    }

    // Close connection
    $conn->close();

} else {
    echo json_encode(array()); // Empty array if student_group_id not found in session
}
?>
