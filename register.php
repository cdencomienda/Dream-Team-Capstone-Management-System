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

    // Handle profile picture upload
    // $targetDir = "profile_pics/";
    // $profilePicture = '';
    // if ($_FILES["profile_picture"]["name"]) {
    //     $targetFile = $targetDir . basename($_FILES["profile_picture"]["name"]);
    //     if (move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $targetFile)) {
    //         $profilePicture = $targetFile;
    //     } else {
    //         echo "Sorry, there was an error uploading your profile picture.";
    //     }
    // }

    // Perform basic validation
    if ($password != $confirm_password) {
        $_SESSION['error_message'] = "Passwords do not match. Please try again.";
        header("Location: LoginSignup.php");
        exit();
    } else {
        // Check if the user already exists in the database
        $query = "SELECT * FROM users WHERE userEmail='$email'";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            $_SESSION['error_message'] = "Email already registered. Please try again.";
            header("Location: LoginSignup.php");
            exit();
        } else {
            // Insert new user data into the database with userType, profile picture, and unhashed password
            $insert_query = "INSERT INTO users (userName, userEmail, userPassword, userType) VALUES ('$name', '$email', '$password', '$userType')";
            if (mysqli_query($conn, $insert_query)) {
                $_SESSION['success_message'] = "Registration successful. Please login.";
                header("Location: LoginSignup.php");
                exit();
            } else {
                $_SESSION['error_message'] = "Error: " . mysqli_error($conn);
                header("Location: LoginSignup.php");
                exit();
            }
        }
    }

    // Close connection
    mysqli_close($conn);
}
?>
