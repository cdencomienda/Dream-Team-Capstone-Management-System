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
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Determine userType based on email domain
    $domain = substr(strrchr($email, "@"), 1);
    if ($domain == 'student.apc.edu.ph') {
        $userType = 'Student';
    } elseif ($domain == 'apc.edu.ph') {
        $userType = 'Professor';
    } else {
        $userType = 'other'; // Default userType if domain doesn't match
    }

    // Perform basic validation
    if ($password != $confirm_password) {
        echo "Passwords do not match.";
    } else {
        // Check if the user already exists in the database
        $query = "SELECT * FROM users WHERE userEmail='$email'";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            echo "User already registered.";
        } else {
            // Insert new user data into the database with userType
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $insert_query = "INSERT INTO users (userName, userEmail, userPassword, userType) VALUES ('$name', '$email', '$hashed_password', '$userType')";
            if (mysqli_query($conn, $insert_query)) {
                echo "Registration successful.";
                header('location:LoginSignup.html');
            } else {
                echo "Error: " . mysqli_error($conn);
            }
        }
    }

    // Close connection
    mysqli_close($conn);
}
?>
