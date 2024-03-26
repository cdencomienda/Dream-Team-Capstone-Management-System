<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Connect to the database
    $conn = mysqli_connect('localhost', 'root', '', 'capstone_management_system');

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Retrieve user input from the form
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Perform basic validation
    if ($password != $confirm_password) {
        echo "Passwords do not match.";
    } else {
        // Check if the user already exists in the database
        $query = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            echo "User already registered.";
        } else {
            // Insert new user data into the database
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $insert_query = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$hashed_password')";
            if (mysqli_query($conn, $insert_query)) {
                echo "Registration successful.";
            } else {
                echo "Error: " . mysqli_error($conn);
            }
        }
    }

    // Close connection
    mysqli_close($conn);
}
?>
