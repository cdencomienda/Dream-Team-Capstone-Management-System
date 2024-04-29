<?php
// Start the session
session_start();

// Check if the user is logged in
if (isset($_SESSION['user_id'])) {
    // Connect to the database
    $conn = new mysqli('localhost', 'root', '', 'dreamteam');

    // Check the database connection
    if ($conn->connect_error) {
        http_response_code(500);
        echo json_encode(['error' => 'Database connection failed']);
        exit();
    }

    // Get the group ID from the request (passed as a query parameter)
    $groupID = isset($_GET['groupID']) ? intval($_GET['groupID']) : 0;

    // Ensure group ID is valid
    if ($groupID <= 0) {
        echo json_encode(['error' => 'Invalid group ID']);
        exit();
    }

    // Prepare the SQL query to fetch the group members
    $sql = "SELECT g.groupID, g.groupname, u.userID, u.username
            FROM `group` g
            JOIN `users` u ON g.studentID = u.userID
            WHERE g.groupID = ?";

    // Prepare the statement
    $stmt = $conn->prepare($sql);

    // Bind the group ID parameter to the query
    if (!$stmt) {
        echo json_encode(['error' => 'Failed to prepare the query']);
        exit();
    }

    $stmt->bind_param('i', $groupID);

    // Execute the query
    if (!$stmt->execute()) {
        echo json_encode(['error' => 'Failed to execute the query']);
        exit();
    }

    // Fetch the results
    $result = $stmt->get_result();

    // Create an array to hold the group members
    $groupMembers = [];

    // Loop through the results and add each member to the array
    while ($row = $result->fetch_assoc()) {
        $groupMembers[] = [
            'groupID' => $row['groupID'],
            'groupname' => $row['groupname'],
            'studentID' => $row['userID'],
            'username' => $row['username'],
        ];
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();

    // Set the content type to JSON
    header('Content-Type: application/json');

    // Return the group members as a JSON response
    echo json_encode($groupMembers);
} else {
    // If the user is not logged in, return an error message
    header('HTTP/1.1 401 Unauthorized');
    echo json_encode(['error' => 'User not logged in']);
}
?>
