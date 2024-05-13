<?php
session_start();

$conn = mysqli_connect('localhost', 'root', '', 'dreamteam');

// Check if the connection is successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_SESSION['varCourseID'])) {
    // Use the stored courseID from the session
    $courseID = $_SESSION['varCourseID'];

    // Define the SQL query to fetch professors and program directors
    $professorsQuery = "SELECT userName FROM `users` WHERE userType = 'Professor' OR userType = 'Program Director'";

    // Perform the query and get the result
    $result = $conn->query($professorsQuery);

    if ($result && $result->num_rows > 0) {
        $professors = array();
        // Fetch data and store in array
        while ($row = $result->fetch_assoc()) {
            $professors[] = $row;
        }
        // Output JSON data
        echo json_encode($professors);
    } else {
        // No professors found
        echo json_encode([]);
    }
} else {
    // Invalid courseID
    echo json_encode([]);
}

$conn->close();
?>
