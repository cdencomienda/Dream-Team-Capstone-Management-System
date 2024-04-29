<?php
session_start();

// Check if the user is logged in
if (isset($_SESSION['user_id'])) {
    // Connect to the database
    $conn = new mysqli('localhost', 'root', '', 'dreamteam');

    // Check the database connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve the user ID from the session
    $userID = $_SESSION['user_id'];

    // Prepare the SQL query to fetch the group ID for the user
    $sql = "SELECT groupID FROM `group` WHERE studentID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $userID);

    // Execute the query
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    // Return the group ID as a JSON response
    if ($row) {
        echo json_encode(['groupID' => $row['groupID']]);
    } else {
        echo json_encode(['error' => 'No group found for the user']);
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
} else {
    // If the user is not logged in, return an error message
    header('HTTP/1.1 401 Unauthorized');
    echo json_encode(['error' => 'User not logged in']);
}
?>
