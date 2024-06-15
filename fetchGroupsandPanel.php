<?php
// Start the session
session_start();

// Check if course_id is set in the session
if (!isset($_SESSION['course_id'])) {
    echo json_encode(['status' => 'error', 'message' => 'course_id not set in session']);
    exit;
}

// Get the course_id from the session
$course_id = $_SESSION['course_id'];

// First connection to soe_assessment database
$conn1 = new mysqli('localhost', 'root', '', 'soe_assessment');

// Check connection for soe_assessment
if ($conn1->connect_error) {
    echo json_encode(['status' => 'error', 'message' => 'Connection failed: ' . $conn1->connect_error]);
    exit;
}

// Prepare the SQL query for soe_assessment
$sql1 = "SELECT DISTINCT group_name, student_group_id 
        FROM groups 
        WHERE course_id = ?";

// Prepare and bind
$stmt1 = $conn1->prepare($sql1);
$stmt1->bind_param("i", $course_id);

// Execute the query
$stmt1->execute();

// Bind result variables
$stmt1->bind_result($group_name, $student_group_id);

// Fetch and store the results
$group_results = [];
while ($stmt1->fetch()) {
    $group_results[] = ['group_name' => $group_name, 'student_group_id' => $student_group_id];
}

// Close the statement and connection for soe_assessment
$stmt1->close();
$conn1->close();

// Second connection to dreamteam database
$conn2 = new mysqli('localhost', 'root', '', 'dreamteam');

// Check connection for dreamteam
if ($conn2->connect_error) {
    echo json_encode(['status' => 'error', 'message' => 'Connection failed: ' . $conn2->connect_error]);
    exit;
}

// Prepare the SQL query for dreamteam
$sql2 = "SELECT userID, firstName, lastName 
         FROM users 
         WHERE userType IN ('Professor', 'Program Director')";

// Execute the query
$result2 = $conn2->query($sql2);

// Fetch and store the results
$user_results = [];
if ($result2->num_rows > 0) {
    while ($row = $result2->fetch_assoc()) {
        $user_results[] = ['userID' => $row['userID'], 'name' => $row['firstName'] . ' ' . $row['lastName']];
    }
} else {
    $user_results = null;
}

// Close the connection for dreamteam
$conn2->close();

// Combine both results into an array
$response = [
    'status' => 'success',
    'groups' => $group_results,
    'users' => $user_results
];

// Output the JSON response
echo json_encode($response);
?>
