<?php
session_start();

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
        $storedPassword = $row['userPassword'];

        // Verify password
        if ($password == $storedPassword) {
            // Password is correct, set session variables
            $_SESSION['user_id'] = $row['userID'];
            $_SESSION['user_email'] = $row['userEmail'];
            $_SESSION['user_type'] = $row['userType'];

            // Redirect based on userType
            $userType = $row['userType'];
            if ($userType == "Student") {
                header("Location: HomePage.html");
                exit();
            } elseif ($userType == "Professor") {
                header("Location: ProfessorHome.html");
                exit();
            } elseif ($userType == "Program Director" || $userType == "Admin") {
                header("Location: AdminHome.html");
                exit();
            } else {
                // Handle invalid userType
                echo "Invalid user type.";
                exit();
            }
        } else {
            // Incorrect password
            // echo "Incorrect password.";
            echo "<p style='color: red;'>Incorrect password.</p>";
        }
    } else {
        // User not found
        echo "User not found.";
    }

    // Close connection
    mysqli_close($conn);
}
?>
