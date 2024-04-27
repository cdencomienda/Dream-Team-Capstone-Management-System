<?php
// Connect to the database
$conn = mysqli_connect('localhost', 'root', '', 'dreamteam');

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if courseID is provided in the GET request
if (isset($_GET['courseID']) && filter_var($_GET['courseID'], FILTER_VALIDATE_INT)) {
    $courseID = $_GET['courseID'];

    // Query to fetch student IDs and corresponding usernames for the specified courseID
    $sql = "SELECT es.studentID, u.userName 
            FROM `enrolled students` es 
            INNER JOIN `users` u ON es.studentID = u.userID 
            WHERE es.courseID = $courseID";

    $result = $conn->query($sql);

    $studentData = [];

    if ($result) {
        if ($result->num_rows > 0) {
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                $studentData[] = $row;
            }
        }
    }

    // Close the database connection
    $conn->close();

    // Output student data (studentID and userName) as JSON
    echo json_encode(['students' => $studentData]);
} else {
    // Invalid request if courseID is missing or invalid
    echo json_encode(['error' => 'Invalid request.']);
}
?>
