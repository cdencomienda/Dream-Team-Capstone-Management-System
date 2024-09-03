<?php
// Start the session
session_start();

// Initialize an array to hold the response
$response = [];

if (isset($_SESSION['student_group_id']) && isset($_SESSION['user_id'])) {
    $student_group_id = $_SESSION['student_group_id'];
    $user_id = $_SESSION['user_id'];

    // Create a new MySQLi connection
    $conn = new mysqli('localhost', 'root', '', 'dreamteam');

    // Check the connection
    if ($conn->connect_error) {
        die(json_encode(['error' => "Connection failed: " . $conn->connect_error]));
    }

    // Prepare the SQL query to fetch distinct weightedGrade, remarkType, and remarks, ordered by the latest entry
    $sql = "SELECT DISTINCT weightedGrade, remarkType, remarks 
            FROM assessment 
            WHERE groupID = ? AND uploaderID = ? AND verdict IS NULL
            ORDER BY AssessmentID DESC
            LIMIT 1";

    // Initialize a prepared statement
    if ($stmt = $conn->prepare($sql)) {
        // Bind the parameters to the SQL query
        $stmt->bind_param('ii', $student_group_id, $user_id);

        // Execute the statement
        $stmt->execute();

        // Bind the result variables
        $stmt->bind_result($weightedGrade, $remarkType, $remarks);

        // Fetch the result
        if ($stmt->fetch()) {
            // Explode the strings by the '~' delimiter
            $response['weightedGrades'] = explode('~', $weightedGrade);
            $response['remarkTypes'] = explode('~', $remarkType);
            $response['remarks'] = explode('~', $remarks);
        } else {
            $response['error'] = "No records found.";
        }

        // Close the statement
        $stmt->close();
    } else {
        $response['error'] = "Error preparing the statement: " . $conn->error;
    }

    // Close the connection
    $conn->close();
} else {
    $response['error'] = "Session variables 'student_group_id' and 'user_id' are not set.";
}

// Send the response as JSON
header('Content-Type: application/json');
echo json_encode($response);
?>
