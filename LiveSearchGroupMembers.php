<?php
// Start the session
session_start();

// Assuming user_id is stored in the session as $_SESSION['user_id']

// Check if user_id is in session
if (isset($_SESSION['user_id'])) {
    // Establish database connection
    $conn = mysqli_connect('localhost', 'root', '', 'soe_assessment');

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Escape user_id to prevent SQL injection
    $user_id = mysqli_real_escape_string($conn, $_SESSION['user_id']);

    // Query to retrieve s_id from students where student_id is user_id
    $sql = "SELECT s_id FROM students WHERE student_id = '$user_id'";

    // Perform the query
    $result = mysqli_query($conn, $sql);

    // Check if query was successful
    if ($result && mysqli_num_rows($result) > 0) {
        // Fetch data from the result
        $row = mysqli_fetch_assoc($result);
        $s_id = $row['s_id'];

        // Use $s_id to query the groups table
        $sql2 = "SELECT student_group_id FROM groups WHERE s_id = '$s_id'";
        $result2 = mysqli_query($conn, $sql2);

        // Check if the second query was successful
        if ($result2 && mysqli_num_rows($result2) > 0) {
            // Fetch data from the result
            $row2 = mysqli_fetch_assoc($result2);
            $student_group_id = $row2['student_group_id'];

            // Use $student_group_id to query the groups table
            $sql3 = "SELECT student FROM groups WHERE student_group_id = '$student_group_id'";
            $result3 = mysqli_query($conn, $sql3);

            // Check if the third query was successful
            if ($result3 && mysqli_num_rows($result3) > 0) {
                // Fetch and display data from the result
                while ($row3 = mysqli_fetch_assoc($result3)) {
                    echo "Student: " . $row3['student'] . "<br>";
                }
            } else {
                echo "No students found in the specified group or error executing third query: " . mysqli_error($conn);
            }
        } else {
            echo "Error executing second query or no result found: " . mysqli_error($conn);
        }
    } else {
        echo "Error executing first query or no result found: " . mysqli_error($conn);
    }

    // Close connection
    mysqli_close($conn);
} else {
    echo "user_id not found in session.";
}
?>
