<?php
// Check if a session is not already active
    session_start();
}

    // Retrieve form data
    $courseName = $_POST['courseName'];
    $courseDescription = $_POST['courseDescription'];

    // Insert data into `course_created` table
    $courseID = 42024;
    $capsID = 4;

    $sqlCourseCreated = "INSERT INTO `course created` (courseID, professorID, capsID, AY, term, Unit) VALUES ($courseID, $userID, $capsID, null, null, null)";
    // Execute the query

    // Insert data into `course_offered` table

    $sqlCourseOffered = "INSERT INTO `course offered` (classID, rubricsID, courseID, section) VALUES ($courseName, null, $courseID, null)";
    // Execute the query

    // Redirect the user or display a success message
}
?>
