<?php
session_start();

// Check if user_id is set in the session
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    // Check if acy_id is set in the session
    if (isset($_SESSION['acy_id'])) {
        $acy_id = $_SESSION['acy_id'];
    } else {
        die("Academic Year ID (acy_id) is not set in the session.");
    }

    // Check if selectedTerm is set in the session
    if (isset($_SESSION['selectedTerm'])) {
        $selectedTerm = $_SESSION['selectedTerm'];
    } else {
        die("Selected Term is not set in the session.");
    }

    // Initialize courses array
    $courses = array();

    // Connect to the 'soe_assessment' database
    $conn_soe = mysqli_connect('localhost', 'root', '', 'soe_assessment');
    if (!$conn_soe) {
        die("Connection to 'soe_assessment' database failed: " . mysqli_connect_error());
    }

    // Prepare and execute query to fetch courses from 'course' table
    $sql_course = "SELECT DISTINCT course_id, course_code, section FROM course WHERE acy_id = ? AND term = ?";
    $stmt_course = $conn_soe->prepare($sql_course);

    // Bind parameters
    $stmt_course->bind_param("ii", $acy_id, $selectedTerm);

    // Execute the prepared statement
    $stmt_course->execute();

    // Get result
    $result_course = $stmt_course->get_result();

    // Fetch courses and store in $courses array
    while ($row_course = $result_course->fetch_assoc()) {
        // Add course to $courses array
        $courses[] = [
            'course_id' => $row_course['course_id'],
            'course_code' => $row_course['course_code'],
            'section' => $row_course['section']
        ];
    }

    // Close statement for course query
    $stmt_course->close();

    // Store courses in session if needed
    $_SESSION['group_courses'] = $courses;

    // Close connection to 'soe_assessment' database
    mysqli_close($conn_soe);

    // Output JSON
    header('Content-Type: application/json');
    echo json_encode($courses);

} else {
    die("User ID is not set in the session.");
}
?>
