<?php
// Start the session
session_start();

// Check if user_id is set in the session
if (!isset($_SESSION['user_id'])) {
    echo 'User ID is not set in session.';
    exit;
}

// Check if group_courses is set in the session and if it's an array
if (isset($_SESSION['group_courses']) && is_array($_SESSION['group_courses'])) {
    // Connect to the database
    $conn = mysqli_connect('localhost', 'root', '', 'dreamteam');

    // Check connection
    if (!$conn) {
        echo 'Connection failed: ' . mysqli_connect_error();
        exit;
    }

    // Fetch panel IDs from panelist table based on professorID (user_id)
    $user_id = $_SESSION['user_id'];
    $panel_ids = [];
    $query = "SELECT panelID FROM panelist WHERE professorID = $user_id";
    $result = mysqli_query($conn, $query);

    // Check if the query was successful
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $panel_ids[] = $row['panelID'];
        }
    } else {
        echo 'Error in query: ' . mysqli_error($conn);
        exit;
    }

    // Initialize an empty array to store results
    $results = [];

    // Loop through each course_info in group_courses array
    foreach ($_SESSION['group_courses'] as $course_info) {
        // Validate course_id in course_info
        if (isset($course_info['course_id'])) {
            $course_id = $course_info['course_id'];

            // Initialize an array for group names under each course_id
            $group_names = [];

            // Loop through panel_ids to fetch group names
            foreach ($panel_ids as $panel_id) {
                // Escape variables for security
                $escaped_course_id = mysqli_real_escape_string($conn, $course_id);
                $escaped_panel_id = mysqli_real_escape_string($conn, $panel_id);

                // SQL query to fetch group names based on course_id and panel_id
                $query = "SELECT groupName FROM `group` WHERE courseID = $escaped_course_id AND panelID = $escaped_panel_id";
                $result = mysqli_query($conn, $query);

                // Check if the query was successful
                if ($result) {
                    // Fetch the group names and add them to the group_names array if they're not already present
                    while ($row = mysqli_fetch_assoc($result)) {
                        $group_name = $row['groupName'];
                        if (!in_array($group_name, $group_names)) {
                            $group_names[] = $group_name;
                        }
                    }
                } else {
                    echo 'Error in query: ' . mysqli_error($conn);
                    exit;
                }
            }

            // Add the group_names array to the results array under the respective course_id key
            $results[$course_id] = $group_names;
        } else {
            echo "Invalid course info: " . var_export($course_info, true) . "<br>";
        }
    }

    // Save the results to the session
    $_SESSION['group_names'] = $results;

    // Close the connection
    mysqli_close($conn);

    // Send results as JSON
    header('Content-Type: application/json');
    echo json_encode($results);
} else {
    // If group_courses is not set or is not an array, send an error message
    echo 'group_courses array is not set or is not an array in session.';
}
?>
