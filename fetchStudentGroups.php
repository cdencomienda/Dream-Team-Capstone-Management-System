<?php
// Start or resume the session
session_start();

// Initialize variables
$adviserName = "";

// Check if student_group_id is set in the session
if(isset($_SESSION['student_group_id'])) {
    // Assuming you have already connected to the database
    $conn = mysqli_connect('localhost', 'root', '', 'soe_assessment');

    // Check the connection
    if (!$conn) {
        $response['error'] = "Connection failed: " . mysqli_connect_error();
    } else {
        // Prepare the SQL query
        $student_group_id = $_SESSION['student_group_id'];
        $sql = "SELECT student FROM groups WHERE student_group_id = $student_group_id";

        // Execute the query
        $result = mysqli_query($conn, $sql);

        // Check if there are any results
        if (mysqli_num_rows($result) > 0) {
            // Fetch all student names into an array
            $students = array();
            while($row = mysqli_fetch_assoc($result)) {
                $students[] = $row["student"];
            }

            $response['students'] = $students;

            // Check if group_name is set in session
            if(isset($_SESSION['group_name'])) {
                // Connect to the dreamteam database
                $conn_dreamteam = new mysqli('localhost', 'root', '', 'dreamteam');

                // Check the connection
                if ($conn_dreamteam->connect_error) {
                    $response['error'] = "Connection failed: " . $conn_dreamteam->connect_error;
                } else {
                    // Prepare SQL query to get adviserID
                    $group_name = $conn_dreamteam->real_escape_string($_SESSION['group_name']); // Escape the group_name string

                    $sql_adviser = "SELECT adviserID FROM `group` WHERE groupName = '$group_name' AND requirementsID = $student_group_id"; // Enclose 'group' in backticks

                    // Execute the query to get adviserID
                    $result_adviser = $conn_dreamteam->query($sql_adviser);

                    // Check if there is a result
                    if ($result_adviser->num_rows > 0) {
                        // Fetch the adviserID
                        $row_adviser = $result_adviser->fetch_assoc();
                        $adviserID = $row_adviser['adviserID'];

                        // Query to get firstName and lastName from users table using adviserID
                        $sql_user = "SELECT firstName, lastName FROM users WHERE userID = $adviserID";

                        // Execute the query to get user details
                        $result_user = $conn_dreamteam->query($sql_user);

                        // Check if there is a result
                        if ($result_user->num_rows > 0) {
                            // Fetch the user details
                            $row_user = $result_user->fetch_assoc();
                            $adviserName = $row_user['firstName'] . " " . $row_user['lastName'];
                        } else {
                            // No user found with the adviserID
                            $adviserName = "not set";
                        }
                    } else {
                        // No adviser found for group name
                        $adviserName = "not set";
                    }

                    // Close the dreamteam database connection
                    $conn_dreamteam->close();
                }
            }
        } else {
            $response['error'] = "No students found for the student_group_id: $student_group_id";
        }

        // Close the initial connection
        mysqli_close($conn);
    }
} else {
    $response['error'] = "Session variable student_group_id is not set.";
}

// Add adviserName to response array
$response['adviser'] = $adviserName;

// Send response as JSON
header('Content-Type: application/json');
echo json_encode($response);
?>
