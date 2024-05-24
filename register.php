<?php
session_start();

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
    $idnum = $_POST['idnum'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Determine userType based on email domain
    $domain = substr(strrchr($email, "@"), 1);
    if ($domain == 'student.apc.edu.ph') {
        $userType = 'Student';
    } elseif ($domain == 'apc.edu.ph') {
        $userType = 'Professor';
    } else {
        $_SESSION['error_message'] = "Please use an APC email.";
        $_SESSION['name'] = $name; // Save the entered name in session
        $_SESSION['email'] = $email; // Save the entered email in session
        header("Location: LoginSignup.php?register_error=true");
        exit();
    }

    // Perform basic validation
    if ($password != $confirm_password) {
        $_SESSION['error_message'] = "Passwords do not match. Please try again.";
        $_SESSION['name'] = $name; // Save the entered name in session
        $_SESSION['email'] = $email; // Save the entered email in session
        header("Location: LoginSignup.php?register_error=true");
        exit();
    } else {
        // Check if the user already exists in the database
        $query = "SELECT * FROM users WHERE userEmail='$email'";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            $_SESSION['error_message'] = "Email already registered. Please try again.";
            $_SESSION['name'] = $name; // Save the entered name in session
            $_SESSION['email'] = $email; // Save the entered email in session
            header("Location: LoginSignup.php?register_error=true");
            exit();
        } else {
            // Insert new user data into the database with userType, profile picture, and unhashed password
            $insert_query = "INSERT INTO users (userID, userName, userEmail, userPassword, userType) VALUES ('$idnum', '$name', '$email', '$password', '$userType')";
            if (mysqli_query($conn, $insert_query)) {
                $_SESSION['success_message'] = "Registration successful. Please login.";
                header("Location: LoginSignup.php");
                exit();
            } else {
                $_SESSION['error_message'] = "Error: " . mysqli_error($conn);
                $_SESSION['name'] = $name; // Save the entered name in session
                $_SESSION['email'] = $email; // Save the entered email in session
                header("Location: LoginSignup.php?register_error=true");
                exit();
            }
        }
    }
    // Close connection
    mysqli_close($conn);
}
?>
