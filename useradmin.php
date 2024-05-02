<?php
// Connect to the database
$conn = mysqli_connect('localhost', 'root', '', 'dreamteam');

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch user data from the database
$sql = "SELECT userID, userType, userName, userEmail FROM users";

// Check if search query is provided
if(isset($_GET['search'])) {
    $search = mysqli_real_escape_string($conn, $_GET['search']);
    $sql .= " WHERE userName LIKE '%$search%' OR userEmail LIKE '%$search%'";
}

$result = $conn->query($sql);

$users = array();
if ($result) {
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $users[] = $row;
        }
    }
    // Free result set
    $result->free();
} else {
    // Error handling for query execution
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the connection
$conn->close();

// Return user data as JSON
echo json_encode($users);
?>
