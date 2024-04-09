<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start(); // Start the session if it's not already active
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Connect to the database
    $conn = mysqli_connect('localhost', 'root', '', 'dreamteam');

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the new profile information from the form
    $newName = $_POST['newname'];
    // $newEmail = $_POST['newEmail'];
    $newPassword = $_POST['newPassword'];

    // Update the user's profile in the database (you'll need to add your database connection and update query here)
    // Example:
    $sql = "UPDATE users SET userName='$newName', userPassword='$newPassword' WHERE userID='{$_SESSION['user_id']}'";
    mysqli_query($conn, $sql);
    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit();
}
}
?>
