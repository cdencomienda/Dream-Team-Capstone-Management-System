<?php
// Start or resume the session
session_start();

// Check if student_group_id is set in the session
if(isset($_SESSION['student_group_id'])) {
    // Assuming you have already connected to the database
    $conn = mysqli_connect('localhost', 'root', '', 'soe_assessment');

    // Check the connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Prepare the SQL query
    $student_group_id = $_SESSION['student_group_id'];
    $sql = "SELECT student FROM groups WHERE student_group_id = $student_group_id";

    // Execute the query
    $result = mysqli_query($conn, $sql);

    // Check if there are any results
    if (mysqli_num_rows($result) > 0) {
        // Initialize an array to store student data
        $students = array();

        // Fetch and store data of each row in the array
        while($row = mysqli_fetch_assoc($result)) {
            $students[] = $row["student"];
        }

        // Encode the array as JSON
        $json_students = json_encode($students);

        // Output the JSON data
        echo $json_students;
    } else {
        echo json_encode(array("message" => "No students found for the student_group_id: $student_group_id"));
    }

    // Close the connection
    mysqli_close($conn);
} else {
    echo json_encode(array("message" => "Session variable student_group_id is not set."));
}
?>
