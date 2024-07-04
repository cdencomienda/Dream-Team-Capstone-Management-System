<?php
session_start();

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

// Check if user_id is set in the session
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    // Array to store courses
    $courses = [];
    $course_ids = [];

    // Connect to the database
    $conn = mysqli_connect('localhost', 'root', '', 'dreamteam');
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Retrieve panelID from panelist table where professorID equals user_id
    $sql_panelist = "SELECT panelID FROM panelist WHERE professorID = ?";
    $stmt_panelist = $conn->prepare($sql_panelist);
    $stmt_panelist->bind_param("i", $user_id);
    $stmt_panelist->execute();
    $result_panelist = $stmt_panelist->get_result();

    if ($result_panelist->num_rows > 0) {
        while ($row_panelist = $result_panelist->fetch_assoc()) {
            $panelID = $row_panelist['panelID'];

            // Retrieve courseID from group table where panelID equals retrieved panelID
            $sql_group = "SELECT courseID FROM `group` WHERE panelID = ?";
            $stmt_group = $conn->prepare($sql_group);
            $stmt_group->bind_param("i", $panelID);
            $stmt_group->execute();
            $result_group = $stmt_group->get_result();

            if ($result_group->num_rows > 0) {
                while ($row_group = $result_group->fetch_assoc()) {
                    // Store courseID in the array
                    $course_ids[] = $row_group['courseID'];
                }
            }
        }
    }

    // Close the statements for panelist and group queries
    $stmt_panelist->close();
    $stmt_group->close();

    // Close the database connection
    $conn->close();

    // Connect to the soe_assessment database
    $conn_soe = mysqli_connect('localhost', 'root', '', 'soe_assessment');
    if (!$conn_soe) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Fetch courses and format as JSON
    foreach ($course_ids as $courseID) {
        $sql_course = "SELECT DISTINCT course_id, course_code, section FROM course WHERE course_id = ? AND acy_id = ? AND term = ?";
        $stmt_course = $conn_soe->prepare($sql_course);
        $stmt_course->bind_param("iii", $courseID, $acy_id, $selectedTerm);
        $stmt_course->execute();
        $result_course = $stmt_course->get_result();

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
        
        $_SESSION['group_courses'] = $courses;

        $stmt_course->close();
    }
    echo json_encode($courses);
    // Close the database connection
    $conn_soe->close();

    // Output JSON
    header('Content-Type: application/json');

} else {
    die("User ID is not set in the session.");
}
?>
