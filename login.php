<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Connect to the database
    $conn = mysqli_connect('localhost', 'root', '', 'dreamteam');

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Retrieve user input from the form
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Fetch user data from the database
    $query = "SELECT * FROM users WHERE userEmail='$email'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['userPassword'])) {
            // Password is correct, set session and redirect to dashboard or home page
            session_start();
            $_SESSION['user_id'] = $row['userID'];
            $_SESSION['user_email'] = $row['userEmail'];
            $_SESSION['user_type'] = $row['userType'];
            header('location: HomePage.html'); // Change the URL to your dashboard or home page
        } else {
            // Incorrect password
            echo "Incorrect password.";
        }
    } else {
        // User not found
        echo "User not found.";
    }

    // Close connection
    mysqli_close($conn);
}
?>