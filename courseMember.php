<?php
// Start or resume the session
session_start();

// Create connection to MySQL database
$conn = mysqli_connect('localhost', 'root', '', 'dreamteam');

// Check if the connection is successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_SESSION['varCourseID'])) {
    // Use the stored courseID from the session
    $courseID = $_SESSION['varCourseID'];

    // Define the SQL query to fetch studentIDs for the given courseID from enrolled_students table
    $enrolledStudentsQuery = "SELECT studentID FROM `enrolled students` WHERE courseID = $courseID";

    // Execute the query to get enrolled student IDs
    $enrolledStudentsResult = $conn->query($enrolledStudentsQuery);

    // Initialize an empty array to store userIDs
    $userIDs = [];

    // Check if the query returned any results
    if ($enrolledStudentsResult->num_rows > 0) {
        // Fetch each row of the result as an associative array
        while ($enrolledStudentRow = $enrolledStudentsResult->fetch_assoc()) {
            // Add each student's userID to the $userIDs array
            $userIDs[] = $enrolledStudentRow['studentID'];
        }

        // Convert the array of userIDs into a comma-separated string for the SQL query
        $userIDsString = implode(',', $userIDs);

        // Define the SQL query to fetch students with userType 'Student' and matching userIDs
        $sql = "SELECT userID, userName FROM users WHERE userType = 'Student' AND userID IN ($userIDsString)";

        // Execute the query to fetch student data
        $result = $conn->query($sql);

        // Initialize an empty array to store student data
        $students = [];

        // Check if the query returned any results
        if ($result->num_rows > 0) {
            // Fetch each row of the result as an associative array
            while ($row = $result->fetch_assoc()) {
                // Add each student's data to the $students array
                $students[] = $row;
            }
        }

        // Send the student data as JSON response
        header('Content-Type: application/json');
        echo json_encode($students);
    } else {
        echo "No enrolled students found for courseID: $courseID";
    }
} else {
    echo "Error: CourseID not set in session.";
}

// Close the database connection
$conn->close();
?>
