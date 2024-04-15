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
    if (!empty($_POST['userEmail']) && !empty($_POST['newname']) && !empty($_POST['newPassword'])) {
        // Retrieve the email and new profile information from the form
        $userEmail = $_POST['userEmail'];
        $newName = $_POST['newname'];
        $newPassword = $_POST['newPassword'];

        // Check if the entered email matches the userEmail in the database
        $emailCheckQuery = "SELECT * FROM users WHERE userEmail='$userEmail'";
        $result = mysqli_query($conn, $emailCheckQuery);
        if (mysqli_num_rows($result) == 1) {
            // Email matches, update the user's profile in the database
            $sql = "UPDATE users SET userName='$newName', userPassword='$newPassword' WHERE userEmail='$userEmail'";
            if (mysqli_query($conn, $sql)) {
                header("Location: " . $_SERVER['HTTP_REFERER'] . "?showOverlay=false");            
                exit();
            } else {
                $_SESSION['error_message'] = "Error updating profile: " . mysqli_error($conn);
                header("Location: " . $_SERVER['HTTP_REFERER'] . "?showOverlay=true");
            }
        } else {
            $_SESSION['error_message'] = "Enter your correct email.";
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
