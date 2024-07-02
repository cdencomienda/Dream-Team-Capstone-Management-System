<?php
// Start the session
session_start();

// Check if course_id and group_name are sent via POST
if (isset($_POST['course_id']) && isset($_POST['group_name'])) {
    // Retrieve course_id and group_name from POST data
    $course_id = $_POST['course_id'];
    $group_name = $_POST['group_name'];

    $conn = mysqli_connect('localhost', 'root', '', 'soe_assessment');

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and execute SQL query to fetch unique group_name and student_group_id
    $sql = "SELECT DISTINCT group_name, student_group_id FROM groups WHERE course_id = ? AND group_name = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("is", $course_id, $group_name);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Fetch the first row
        $row = $result->fetch_assoc();
        
        // Store student_group_id in a session variable
        $_SESSION['student_group_id'] = $row["student_group_id"];
        $_SESSION['group_name'] = $row["group_name"];

        // Prepare JSON response
        $response = array(
            'success' => true,
            'group_name' => $row["group_name"],
            'student_group_id' => $row["student_group_id"]
        );

        // Output JSON response
        header('Content-Type: application/json');
        echo json_encode($response);
    } else {
        // Prepare JSON response for no groups found
        $response = array(
            'success' => false,
            'message' => 'No groups found for the specified course ID and group name.'
        );

        // Output JSON response
        header('Content-Type: application/json');
        echo json_encode($response);
    }

    $stmt->close();
    $conn->close();
} else {
    // Prepare JSON response for missing data
    $response = array(
        'success' => false,
        'message' => 'Error: Course ID and Group Name are required.'
    );

    // Output JSON response
    header('Content-Type: application/json');
    echo json_encode($response);
}
?>
