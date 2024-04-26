<?php
// Connect to the database
$conn = mysqli_connect('localhost', 'root', '', 'dreamteam');

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch user data from the database
$sql = "SELECT userID, userType, userName, userEmail FROM users";
$result = $conn->query($sql);

$users = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $users[] = $row;
    }
}

// Close the connection
$conn->close();

// Return user data as JSON
echo json_encode($users);
?>
