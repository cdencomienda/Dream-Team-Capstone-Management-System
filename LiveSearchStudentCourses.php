<?php
// Start the session if it's not already active
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Check if session user_id is set and not empty
if (isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) {
    // Connect to the database
    $conn = new mysqli('localhost', 'root', '', 'soe_assessment');

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get the student ID from the session
    $studentID = $_SESSION['user_id'];

    // Query to fetch the required course details for the student
    $sql = "SELECT c.course_code, c.section, c.term, c.acy_id
            FROM course c
            INNER JOIN students s ON c.course_id = s.course_id
            WHERE s.student_id = ?";

    // Prepare the statement
    $stmt = $conn->prepare($sql);
    
    if ($stmt) {
        // Bind the student ID parameter
        $stmt->bind_param('s', $studentID); // 's' since student_id appears to be a string
        
        // Execute the statement
        $stmt->execute();
        
        // Fetch the results
        $result = $stmt->get_result();

        $courses = [];

        // If results are found, fetch each row and add it to the courses array
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $courses[] = $row;
            }
        }

        // Close the statement
        $stmt->close();
    } else {
        // Handle errors with preparing the statement
        echo json_encode(['error' => 'Failed to prepare statement']);
        $conn->close();
        exit;
    }

    // Close the database connection
    $conn->close();

    // Output the courses as JSON
    echo json_encode($courses);
} else {
    // If the student is not logged in, output an error message
    echo json_encode(['error' => 'Invalid request or student not logged in']);
}
?>
