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

    // Array to store courses
    $courses = [];
    $course_ids = [];

    // Connect to the 'dreamteam' database
    $conn = mysqli_connect('localhost', 'root', '', 'dreamteam');
    if (!$conn) {
        die("Connection to 'dreamteam' database failed: " . mysqli_connect_error());
    }

    // Prepare and execute query to fetch courseIDs from 'group' table
    $sql_group = "SELECT courseID FROM `group` WHERE adviserID = ?";
    $stmt_group = $conn->prepare($sql_group);
    $stmt_group->bind_param("i", $user_id);
    $stmt_group->execute();
    $result_group = $stmt_group->get_result();

    // Fetch courseIDs and store in array
    while ($row_group = $result_group->fetch_assoc()) {
        $course_ids[] = $row_group['courseID'];
    }

    // Close statement for group query
    $stmt_group->close();

    // Close connection to 'dreamteam' database
    $conn->close();

    // Connect to the 'soe_assessment' database
    $conn_soe = mysqli_connect('localhost', 'root', '', 'soe_assessment');
    if (!$conn_soe) {
        die("Connection to 'soe_assessment' database failed: " . mysqli_connect_error());
    }

    // Prepare and execute query to fetch courses from 'course' table
    foreach ($course_ids as $courseID) {
        $sql_course = "SELECT DISTINCT course_id, course_code, section FROM course WHERE course_id = ? AND acy_id = ? AND term = ?";
        $stmt_course = $conn_soe->prepare($sql_course);
        $stmt_course->bind_param("iii", $courseID, $acy_id, $selectedTerm);
        $stmt_course->execute();
        $result_course = $stmt_course->get_result();

        // Fetch courses and store in $courses array
        while ($row_course = $result_course->fetch_assoc()) {
            // Check if the course already exists in $courses array
            $courseExists = false;
            foreach ($courses as $course) {
                if ($course['course_id'] == $row_course['course_id'] &&
                    $course['course_code'] == $row_course['course_code'] &&
                    $course['section'] == $row_course['section']) {
                    $courseExists = true;
                    break;
                }
            }

            // Add course only if it doesn't already exist
            if (!$courseExists) {
                $courses[] = [
                    'course_id' => $row_course['course_id'],
                    'course_code' => $row_course['course_code'],
                    'section' => $row_course['section']
                ];
            }
        }

        // Close statement for course query
        $stmt_course->close();
    }

    // Store courses in session if needed
    $_SESSION['group_courses'] = $courses;

    // Close connection to 'soe_assessment' database
    $conn_soe->close();

    // Output JSON
    header('Content-Type: application/json');
    echo json_encode($courses);

} else {
    die("User ID is not set in the session.");
}
?>
