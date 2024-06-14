<?php
session_start();

// Database connection details
$conn = mysqli_connect('localhost', 'root', '', 'soe_assessment');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare the response array
$response = array();

if (isset($_SESSION['course_id'])) {
    $course_id = $_SESSION['course_id'];

    // Prepare and execute the query to get rubric names and IDs
    $sql = "SELECT rubrics_id, rubric_name FROM rubrics WHERE course_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $course_id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if any rubrics are found
    if ($result->num_rows > 0) {
        // Fetch each rubric name and ID and add to the response array
        while ($row = $result->fetch_assoc()) {
            $response[] = array(
                'rubric_id' => $row['rubrics_id'],
                'rubric_name' => $row['rubric_name']
            );
        }
    } else {
        $response['error'] = 'No rubrics found for the given course ID.';
    }

    $stmt->close();
} else {
    $response['error'] = 'No course ID found in the session.';
}

// Close the database connection
$conn->close();

// Set the content type to application/json
header('Content-Type: application/json');

// Output the response in JSON format
echo json_encode($response);
?>
