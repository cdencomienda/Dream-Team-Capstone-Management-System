<?php
// Start the session
session_start();

// Check if the session variables are set
if (isset($_SESSION['group_courses']) && isset($_SESSION['user_id'])) {

    // Initialize an array to store results
    $results = [];

    // Establish database connection
    $conn = mysqli_connect('localhost', 'root', '', 'soe_assessment');

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    foreach ($_SESSION['group_courses'] as $course_info) {
        // Validate course_id in course_info
        if (isset($course_info['course_id'])) {
            $course_id = $course_info['course_id'];

            // Initialize an array for group names under each course_id
            $group_names = [];

            // Query the database for student_group_id in groups table
            $sql_s_id = "SELECT s_id FROM students WHERE student_id = ? AND course_id = ?";
            $stmt_s_id = mysqli_prepare($conn, $sql_s_id);
            $user_id = strval($_SESSION['user_id']); // Convert to string
            mysqli_stmt_bind_param($stmt_s_id, "si", $user_id, $course_id);
            mysqli_stmt_execute($stmt_s_id);
            $result_s_id = mysqli_stmt_get_result($stmt_s_id);
            

            if (mysqli_num_rows($result_s_id) > 0) {
                $row_s_id = mysqli_fetch_assoc($result_s_id);
                $s_id = $row_s_id['s_id'];

                $sql_student_group_id = "SELECT student_group_id FROM groups WHERE s_id = ? AND course_id = ?";
                $stmt_student_group_id = mysqli_prepare($conn, $sql_student_group_id);
                mysqli_stmt_bind_param($stmt_student_group_id, "ii", $s_id, $course_id);
                mysqli_stmt_execute($stmt_student_group_id);
                $result_student_group_id = mysqli_stmt_get_result($stmt_student_group_id);

                if (mysqli_num_rows($result_student_group_id) > 0) {
                    while ($row_student_group_id = mysqli_fetch_assoc($result_student_group_id)) {
                        $student_group_id = $row_student_group_id['student_group_id'];

                        // Switch to dreamteam database
                        mysqli_select_db($conn, 'dreamteam');

                        $sql_group_name = "SELECT groupName FROM `group` WHERE groupID = ? AND courseID = ?";
                        $stmt_group_name = mysqli_prepare($conn, $sql_group_name);
                        mysqli_stmt_bind_param($stmt_group_name, "ii", $student_group_id, $course_id);
                        mysqli_stmt_execute($stmt_group_name);
                        $result_group_name = mysqli_stmt_get_result($stmt_group_name);

                        if (mysqli_num_rows($result_group_name) > 0) {
                            while ($row_group_name = mysqli_fetch_assoc($result_group_name)) {
                                $group_name = $row_group_name['groupName'];

                                // Add group name to the group_names array if not already present
                                if (!in_array($group_name, $group_names)) {
                                    $group_names[] = $group_name;
                                }
                            }
                        }
                    }
                } 
            } else {
                // Handle case where no s_id is found
                $group_names[] = 'No s_id found';
            }

            // Add the group_names array to the results array under the respective course_id key
            $results[$course_id] = $group_names;
        } else {
            // Handle case where course_id is not set in course_info
            $results[$course_id] = ['error' => "Course ID not set in course_info"];
        }
    }

    // Close statements and connection
    mysqli_stmt_close($stmt_s_id);
    mysqli_stmt_close($stmt_student_group_id);
    mysqli_stmt_close($stmt_group_name);
    mysqli_close($conn);

    // Save the results to the session
    $_SESSION['group_names'] = $results;

    // Send results as JSON (optional)
    header('Content-Type: application/json');
    echo json_encode($results);
} else {
    // Handle case where session variables are not set
    $error = [];
    if (!isset($_SESSION['group_courses'])) {
        $error[] = "Session variable 'group_courses' is not set.";
    }
    if (!isset($_SESSION['user_id'])) {
        $error[] = "Session variable 'user_id' is not set.";
    }
    
    // Send error message as JSON
    header('Content-Type: application/json');
    echo json_encode(['error' => $error]);
}
?>
