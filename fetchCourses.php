<?php
session_start(); // Start the session

header('Content-Type: application/json'); // Set the content type to JSON

// Check if session variables are set
if (isset($_SESSION['acy_id']) && isset($_SESSION['selectedTerm']) && isset($_SESSION['account_id'])) {
    $acy_id = $_SESSION['acy_id'];
    $selectedTerm = $_SESSION['selectedTerm'];
    $account_id = $_SESSION['account_id'];

    // Connect to the database
    $conn = mysqli_connect('localhost', 'root', '', 'soe_assessment');

    // Check connection
    if (!$conn) {
        echo json_encode(['error' => 'Connection failed: ' . mysqli_connect_error()]);
        exit;
    }

    // SQL query with prepared statement
    $query = "SELECT course_code, section, course_id, professor FROM `course` WHERE acy_id = ? AND term = ? AND professor = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('isi', $acy_id, $selectedTerm, $account_id);
    
    // Execute the query
    if ($stmt->execute()) {
        $result = $stmt->get_result();
        $courses = [];
        $course_ids = []; // Array to store course_ids
        while ($row = $result->fetch_assoc()) {
            $courses[] = [
                'course_id' => $row['course_id'],
                'course_code' => $row['course_code'],
                'section' => $row['section']
            ];
            $course_ids[] = $row['course_id']; // Add course_id to the array
        }
        // Save the course_ids array in session
        $_SESSION['group_courses'] = $course_ids;

        // Return the courses as JSON
        echo json_encode($courses);
    } else {
        echo json_encode(['error' => $stmt->error]);
    }

    // Close the statement and connection
    $stmt->close();
    mysqli_close($conn);
} else {
    echo json_encode(['error' => 'Session variables not set']);
}
?>
