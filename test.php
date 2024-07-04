<?php
// Start the session
session_start();

// Check if group_courses is set in the session and if it's an array
if (isset($_SESSION['group_courses']) && is_array($_SESSION['group_courses'])) {
    // Connect to the database
    $conn = mysqli_connect('localhost', 'root', '', 'soe_assessment');

    // Check connection
    if (!$conn) {
        echo json_encode(['error' => 'Connection failed: ' . mysqli_connect_error()]);
        exit;
    }

    // Initialize an empty array to store results with segregation by course_id
    $results = [];

    // Loop through each course_id in group_courses array
    foreach ($_SESSION['group_courses'] as $course_id) {
        // Escape the course_id for security
        $course_id = mysqli_real_escape_string($conn, $course_id);

        // Initialize an empty array for group_names under each course_id
        $group_names = [];

        // SQL query to fetch group_name based on course_id
        $query = "SELECT group_name FROM groups WHERE course_id = $course_id";
        $result = mysqli_query($conn, $query);

        // Check if the query was successful
        if ($result) {
            // Fetch the group_name and add it to the group_names array if it's not already present
            while ($row = mysqli_fetch_assoc($result)) {
                $group_name = $row['group_name'];
                if (!in_array($group_name, $group_names)) {
                    $group_names[] = $group_name;
                }
            }
            // Add the group_names array to the results array under the respective course_id key
            $results[$course_id] = $group_names;
        } else {
            echo json_encode(['error' => 'Error in query: ' . mysqli_error($conn)]);
            exit;
        }
    }

    // Save the results to the session
    $_SESSION['group_names'] = $results;

    // Close the connection
    mysqli_close($conn);

    // Send the results as JSON
    header('Content-Type: application/json');
    echo json_encode($results);
} else {
    // If group_courses is not set or is not an array, send an error message as JSON
    header('Content-Type: application/json');
    echo json_encode(['error' => 'group_courses array is not set or is not an array in session.']);
}
?>
