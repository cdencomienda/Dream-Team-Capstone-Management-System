<?php
session_start();

// Check if course_id is provided via POST
if (isset($_SESSION['course_id'])) {
    $course_id = $_SESSION['course_id'];

    // Database connection for student_ids
    $conn_students = mysqli_connect('localhost', 'root', '', 'soe_assessment');

    // Check connection
    if (!$conn_students) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Query to get student IDs based on the provided course_id
    $sql_students = "SELECT student_id FROM students WHERE course_id = ?";
    $stmt_students = $conn_students->prepare($sql_students);
    $stmt_students->bind_param('i', $course_id);
    $stmt_students->execute();
    $result_students = $stmt_students->get_result();

    // Fetch student IDs and store in an array
    $student_ids = [];
    while ($row_students = $result_students->fetch_assoc()) {
        $student_ids[] = $row_students['student_id'];
    }

    // Close student IDs connections
    $stmt_students->close();
    $conn_students->close();

    // Database connection for users
    $conn_users = mysqli_connect('localhost', 'root', '', 'dreamteam');

    // Check connection
    if (!$conn_users) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Query to get firstName and lastName based on student_ids
    $sql_users = "SELECT firstName, lastName FROM users WHERE userID IN (";
    $sql_users .= implode(',', array_map('intval', $student_ids));
    $sql_users .= ")";
    $result_users = mysqli_query($conn_users, $sql_users);

    // Fetch data into an array
    $students = [];
    while ($row_users = mysqli_fetch_assoc($result_users)) {
        $students[] = $row_users;
    }

    // Close users connection
    mysqli_close($conn_users);

    // Send data as JSON
    header('Content-Type: application/json');
    echo json_encode($students);
} else {
    echo "course_id not set";
}
?>
