<?php
// Check if userId is set in the POST request
if(isset($_POST['userId'])) {
    // Connect to the database
    $conn = mysqli_connect('localhost', 'root', '', 'dreamteam');

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Sanitize the user ID to prevent SQL injection
    $userId = mysqli_real_escape_string($conn, $_POST['userId']);

    // Check if userType is also set in the POST request for edit operation
    if(isset($_POST['userType'])) {
        $userType = mysqli_real_escape_string($conn, $_POST['userType']);
        // SQL to update user type
        $sql = "UPDATE users SET userType = '$userType' WHERE userID = '$userId'";
    } else {
        // SQL to delete a user with the given ID
        $sql = "DELETE FROM users WHERE userID = '$userId'";
    }

    if (mysqli_query($conn, $sql)) {
        // If deletion/edit is successful, send a success response
        echo "Operation completed successfully";
    } else {
        // If deletion/edit fails, send an error response
        echo "Error: " . mysqli_error($conn);
    }

    // Close the connection
    mysqli_close($conn);
} else {
    // If userId is not set in the POST request, send an error response
    echo "User ID not provided";
}
?>
