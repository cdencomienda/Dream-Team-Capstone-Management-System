<?php
// Start the session if it's not already active
session_start();

// Check if session user_id is set and not empty
if (isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) {
    // Connect to the database
    $conn = mysqli_connect('localhost', 'root', '', 'dreamteam');

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Get the student ID from the session
    $studentID = $_SESSION['user_id'];

    // Query to fetch courses the student is enrolled in
    $sql = "SELECT c.courseID, c.courseName
        FROM `course created` c
        JOIN `enrolled students` es ON c.courseID = es.courseID
        WHERE es.studentID = ?;";

    // Prepare the statement
    $stmt = $conn->prepare($sql);
    
    // Bind the student ID parameter
    $stmt->bind_param('i', $studentID);
    
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

    // Close the statement and database connection
    $stmt->close();
    $conn->close();

    // Output the courses as JSON
    echo json_encode($courses);
} else {
    // If the student is not logged in, output an error message
    echo json_encode(['error' => 'Invalid request or student not logged in']);
}
?>
