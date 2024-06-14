<?php
// Start the session
session_start();

// Check if the user_id is set in the session
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    // Database connection
    $conn = mysqli_connect('localhost', 'root', '', 'soe_assessment');

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare the SQL statement
    $sql = "SELECT s_id FROM students WHERE student_id = ?";
    
    // Initialize a statement
    $stmt = $conn->prepare($sql);
    
    if ($stmt === false) {
        die("Error preparing the statement: " . $conn->error);
    }

    // Bind parameters
    $stmt->bind_param("s", $user_id);

    // Execute the statement
    $stmt->execute();

    // Bind result variables
    $stmt->bind_result($s_id);

    // Fetch the result
    if ($stmt->fetch()) {
        // Save s_id to session
        $_SESSION['s_id'] = $s_id;
        echo "Student ID: " . $s_id;
    } else {
        echo "No student found with the given user ID.";
    }

    // Close the statement
    $stmt->close();

    // Close the connection
    $conn->close();
} else {
    echo "No user ID found in the session.";
}
?>
