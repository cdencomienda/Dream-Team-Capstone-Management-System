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

    // Check if the form fields are not empty
    if (!empty($_POST['newname']) && !empty($_POST['newPassword'])) {
        // Retrieve the new profile information from the form
        $newName = $_POST['newname'];
        $newPassword = $_POST['newPassword'];

        // Update the user's profile in the database
        $sql = "UPDATE users SET userName='$newName', userPassword='$newPassword' WHERE userID='{$_SESSION['user_id']}'";
        if (mysqli_query($conn, $sql)) {
            header("Location: " . $_SERVER['HTTP_REFERER'] . "?showOverlay=false");            
            exit();
        } else {
            $_SESSION['error_message'] = "Error updating profile: " . mysqli_error($conn);
            header("Location: " . $_SERVER['HTTP_REFERER'] . "?showOverlay=true");
        }
    } else {
        $_SESSION['error_message'] = "Please fill in all required fields.";
        header("Location: " . $_SERVER['HTTP_REFERER'] . "?showOverlay=true");
        exit();
    }
    // Redirect back to the edit profile page
    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit();
}
?>
