<?php
// Start the session
session_start();

// Initialize an empty array to store student details
$students_details = [];

// Check if course_id is set in session
if(isset($_SESSION['course_id'])) {
    // If course_id is set, fetch student IDs for that course
    $course_id = $_SESSION['course_id'];

    // Database connection
    $conn_students = mysqli_connect('localhost', 'root', '', 'soe_assessment');
    if(!$conn_students) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Prepare SQL statement to fetch student IDs
    $query = "SELECT student_id FROM students WHERE course_id = ?";
    $stmt = mysqli_prepare($conn_students, $query);
    mysqli_stmt_bind_param($stmt, "i", $course_id);
    
    // Execute query to get student IDs
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    // Fetch student IDs and store them in the array
    $student_ids = [];
    while($row = mysqli_fetch_assoc($result)) {
        $student_ids[] = $row['student_id'];
    }

    // Close statement for student IDs query
    mysqli_stmt_close($stmt);

    // Close connection to student database
    mysqli_close($conn_students);

    // Now connect to 'dreamteam' database for user details
    $conn_dreamteam = mysqli_connect('localhost', 'root', '', 'dreamteam');
    if(!$conn_dreamteam) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Prepare SQL statement to fetch firstName and lastName for each student
    $query_users = "SELECT firstName, lastName FROM users WHERE userID = ?";
    $stmt_users = mysqli_prepare($conn_dreamteam, $query_users);

    // Fetch student details
    foreach($student_ids as $student_id) {
        mysqli_stmt_bind_param($stmt_users, "s", $student_id);
        mysqli_stmt_execute($stmt_users);
        $result_users = mysqli_stmt_get_result($stmt_users);

        // Fetch firstName and lastName and store in students_details array
        while($row_users = mysqli_fetch_assoc($result_users)) {
            $students_details[] = [
                'firstName' => $row_users['firstName'],
                'lastName' => $row_users['lastName'],
            ];
        }
    }

    // Close statement and connection for user details
    mysqli_stmt_close($stmt_users);
    mysqli_close($conn_dreamteam);

    // Output student details as JSON
    header('Content-Type: application/json');
    echo json_encode($students_details);
} else {
    // If course_id is not set in session
    echo json_encode(['error' => 'Course ID is not set in session.']);
}
?>
