<?php
session_start();

// Ensure that course_id is set in the session
if (!isset($_SESSION['course_id'])) {
    echo json_encode(['error' => 'Course ID not set in session']);
    exit();
}

$course_id = $_SESSION['course_id'];

// Create database connection
$conn = mysqli_connect('localhost', 'root', '', 'soe_assessment');

// Check connection
if ($conn->connect_error) {
    die(json_encode(['error' => 'Connection failed: ' . $conn->connect_error]));
}

// Prepare and bind the SQL statement to get rubrics
$stmt = $conn->prepare("SELECT rubrics_id, rubric_name, level_details, level_percentage FROM rubrics WHERE course_id = ?");
$stmt->bind_param("i", $course_id);

// Execute the statement
$stmt->execute();

// Get the result
$result = $stmt->get_result();

// Fetch data and store in an array
$rubrics = [];
while ($row = $result->fetch_assoc()) {
    $row['level_details'] = explode('~', $row['level_details']);
    $row['level_percentage'] = explode('~', $row['level_percentage']);
    $rubrics[] = $row;
}

// Close the first statement
$stmt->close();

// Fetch criteria for each rubric
foreach ($rubrics as &$rubric) {
    $stmt = $conn->prepare("SELECT rubric_percentage, criteria_name, criteria_details FROM rubric_table WHERE rubrics_id = ?");
    $stmt->bind_param("i", $rubric['rubrics_id']);

    // Execute the statement
    $stmt->execute();

    // Get the result
    $criteria_result = $stmt->get_result();

    // Fetch criteria data and store in an array
    $criteria = [];
    while ($criteria_row = $criteria_result->fetch_assoc()) {
        $criteria_row['criteria_details'] = explode('~', $criteria_row['criteria_details']);
        $criteria[] = $criteria_row;
    }

    // Close the statement
    $stmt->close();

    // Add criteria to the rubric
    $rubric['criteria'] = $criteria;
}

// Close the database connection
$conn->close();

// Send the data as JSON
echo json_encode($rubrics);
?>
