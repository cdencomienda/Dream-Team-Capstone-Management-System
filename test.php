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
    $user_id = $_SESSION['user_id'];

    // Connect to the database
    $conn = mysqli_connect('localhost', 'root', '', 'dreamteam');
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $results = [];
    
    foreach ($_SESSION['group_courses'] as $course_info) {
        // Validate course_id in course_info
        if (isset($course_info['course_id'])) {
            $course_id = $course_info['course_id'];

            // Initialize an array for group names under each course_id
            $group_names = [];

            // Fetch group names for the course_id
            $query = "SELECT groupName FROM `group` WHERE adviserID = ? AND courseID = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("ii", $user_id, $course_id);
            $stmt->execute();
            $result = $stmt->get_result();

            // Check if the query was successful
            if ($result) {
                // Fetch the group names and add them to the group_names array if they're not already present
                while ($row = $result->fetch_assoc()) {
                    $group_name = $row['groupName'];
                    if (!in_array($group_name, $group_names)) {
                        $group_names[] = $group_name;
                    }
                }
            } else {
                echo 'Error in query: ' . $stmt->error;
                exit;
            }
            
            // Add the group_names array to the results array under the respective course_id key
            $results[$course_id] = $group_names;

            // Close the statement
            $stmt->close();
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
