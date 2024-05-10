<?php
// Create connection to MySQL database
$conn = mysqli_connect('localhost', 'root', '', 'dreamteam');

// Check if the connection is successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Define the SQL query to fetch students with userType 'Student'
$sql = "SELECT userName, userType FROM users WHERE userType = 'Student'";

// Execute the query
$result = $conn->query($sql);

// Initialize an empty array to store student data
$students = [];

// Check if the query returned any results
if ($result->num_rows > 0) {
    // Fetch each row of the result as an associative array
    while ($row = $result->fetch_assoc()) {
        // Add each student's data to the $students array
        $students[] = $row;
    }
}

// Close the database connection
$conn->close();

// Send the student data as JSON response
header('Content-Type: application/json');
echo json_encode($students);
?>
