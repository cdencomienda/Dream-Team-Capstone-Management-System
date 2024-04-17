<?php
// Start the session if it's not already active
session_start();

// Debug: Check if session user_id is set and not empty
if (isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) {
    // Connect to the database
    $conn = mysqli_connect('localhost', 'root', '', 'dreamteam');

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $professorID = $_SESSION['user_id'];

    // Query to fetch courses created by the professor
    $sql = "SELECT courseID, courseName FROM `course created` WHERE professorID = $professorID";

    $result = $conn->query($sql);

    if ($result) {
        if ($result->num_rows > 0) {
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "<p>Course Created: " . $row["courseName"] . "</p>";
            }
        } else {
            echo "No courses found.";
        }
    } else {
        echo "Error executing query: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
} else {
    echo "Invalid request.";
}

?>
