<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'dreamteam');

// Check if the courseID is set in the POST request
if (isset($_POST['courseID'])) {
    // Sanitize the input to prevent SQL injection
    $courseID = htmlspecialchars($_POST['courseID']);

    // Query to fetch enrolled students for the specified courseID
    $sql = "SELECT u.userName FROM users u
            INNER JOIN enrolled_students es ON u.userID = es.studentID
            WHERE es.courseID = ?";
    
    // Prepare and execute the SQL statement
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$courseID]);

    // Fetch the results as an associative array
    $students = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Return the students array as JSON
    echo json_encode($students);
} else {
    // Return an error message if courseID is not provided
    echo json_encode(['error' => 'CourseID not provided']);
}
?>
