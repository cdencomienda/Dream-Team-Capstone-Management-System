<?php
// Start the session to access session variables
session_start();

// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Create connection to MySQL database
$conn = mysqli_connect('localhost', 'root', '', 'dreamteam');

// Check if the connection is successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if varCourseID is set in the session
if (isset($_SESSION['varCourseID'])) {
    $varCourseID = $_SESSION['varCourseID'];

    // Fetch student IDs enrolled in the specified course
    $enrolledStudentsQuery = "SELECT studentID FROM `enrolled students` WHERE courseID = $varCourseID";
    $enrolledStudentsResult = $conn->query($enrolledStudentsQuery);

    // Initialize an array to store enrolled student IDs
    $enrolledStudentIDs = [];

    if ($enrolledStudentsResult->num_rows > 0) {
        while ($row = $enrolledStudentsResult->fetch_assoc()) {
            $enrolledStudentIDs[] = $row['studentID'];
        }
    }

    // Prepare the SQL query
    if (!empty($enrolledStudentIDs)) {
        $enrolledStudentIDsString = implode(',', $enrolledStudentIDs);
        $sql = "SELECT userName, userType FROM users WHERE userType = 'Student' AND userID NOT IN ($enrolledStudentIDsString)";
    } else {
        $sql = "SELECT userName, userType FROM users WHERE userType = 'Student'";
    }
} else {
    // If varCourseID is not set, fetch all students
    $sql = "SELECT userName, userType FROM users WHERE userType = 'Student'";
}

// Execute the query
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

// Close the database connection
$conn->close();

// Send the student data as JSON response
header('Content-Type: application/json');
echo json_encode($students);
?>
