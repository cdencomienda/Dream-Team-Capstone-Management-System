<?php
// Start the session
session_start();

// Check if course_id is set in the session
if (isset($_SESSION['course_id'])) {
    $varCourse_id = $_SESSION['course_id'];

    // Check if group_names is set in the session and if it's an array
    if (isset($_SESSION['group_names']) && is_array($_SESSION['group_names'])) {
        // Initialize an array to store matched group names
        $matchedGroupNames = [];

        // Loop through each course_id and its corresponding group names
        foreach ($_SESSION['group_names'] as $course_id => $group_names) {
            // Check if course_id matches the varCourse_id
            if ($varCourse_id == $course_id) {
                // Store the group names of the matched course_id
                $matchedGroupNames = $group_names;
                break; // Exit loop if a match is found
            }
        }

        // Check if matchedGroupNames array is not empty
        if (!empty($matchedGroupNames)) {
            // Connect to the database
            $conn = mysqli_connect('localhost', 'root', '', 'soe_assessment');

            // Check connection
            if (!$conn) {
                echo json_encode(['error' => 'Connection failed: ' . mysqli_connect_error()]);
                exit;
            }

            // Initialize an array to store student_group_ids without duplicates
            $studentGroupIds = [];

            // Loop through each matched group name
            foreach ($matchedGroupNames as $groupName) {
                // Escape the group name for security
                $groupName = mysqli_real_escape_string($conn, $groupName);

                // Query to fetch student_group_id based on course_id and group_name
                $query = "SELECT student_group_id FROM groups WHERE course_id = $varCourse_id AND group_name = '$groupName'";
                $result = mysqli_query($conn, $query);

                // Check if the query was successful
                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $studentGroupIds[] = $row['student_group_id'];
                    }
                } else {
                    echo json_encode(['error' => 'Error in query: ' . mysqli_error($conn)]);
                    exit;
                }
            }

            // Close the connection
            mysqli_close($conn);

            // Remove duplicates from studentGroupIds array
            $studentGroupIds = array_unique($studentGroupIds);

            // Re-index the array numerically
            $studentGroupIds = array_values($studentGroupIds);

            // Save the unique student_group_ids to session as courseGroupID
            $_SESSION['courseGroupID'] = $studentGroupIds;

            // Output the unique student_group_ids as JSON
            echo json_encode(['courseGroupID' => $studentGroupIds]);
        } else {
            // Set session to 0 if no matched group names
            $_SESSION['courseGroupID'] = 0;
            echo json_encode(['message' => 'No group names matched the course ID.', 'courseGroupID' => 0]);
        }
    } else {
        // If group_names is not set or is not an array in the session, echo an error message
        echo json_encode(['error' => 'Group names are not saved in session or the session data is not in the expected format.']);
    }
} else {
    // If course_id is not set in the session, echo an error message
    echo json_encode(['error' => 'Course ID is not set in session.']);
}
?>
<!--  -->