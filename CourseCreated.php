<?php
// Check if a session is not already active
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Assuming you have a database connection established

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $courseName = $_POST['courseName'];
    $courseDescription = $_POST['courseDescription'];

    // Insert data into `course_created` table
    $courseID = 42024;
    $userID = $_SESSION['userID']; // Assuming you have the userID stored in session
    $capsID = 4;

    $sqlCourseCreated = "INSERT INTO `course created` (courseID, professorID, capsID, AY, term, Unit) VALUES ($courseID, $userID, $capsID, null, null, null)";
    // Execute the query

    // Insert data into `course_offered` table
    $classID = $courseID; // Assuming classID is the same as courseID for simplicity

    $sqlCourseOffered = "INSERT INTO `course offered` (classID, rubricsID, courseID, section) VALUES ($courseName, null, $courseID, null)";
    // Execute the query

    // Redirect the user or display a success message
}
?>
