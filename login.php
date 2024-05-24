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
    // $email = $_POST['email'];

    $email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '';
    $password = $_POST['password'];

    // Fetch user data from the database
    $query = "SELECT * FROM users WHERE userEmail='$email'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $storedPassword = $row['userPassword'];

        // Verify password
        if ($password == $storedPassword) {
            // Password is correct, set session variables and redirect
            $_SESSION['user_id'] = $row['userID'];
            $_SESSION['fName'] = $row['firstName'];
            $_SESSION['lname'] = $row['lastName'];
            $_SESSION['user_email'] = $row['userEmail'];
            $_SESSION['user_type'] = $row['userType'];

            echo "Session Variables Set: <br/>";
            echo "User ID: " . $_SESSION['user_id'] . "<br/>";
            echo "First Name: " . $_SESSION['fName'] . "<br/>";
            echo "Last Name: " . $_SESSION['lname'] . "<br/>";
            echo "User Email: " . $_SESSION['user_email'] . "<br/>";
            echo "User Type: " . $_SESSION['user_type'] . "<br/>";

            // Redirect based on userType
            $userType = $row['userType'];
            if ($userType == "Student") {
                header("Location: HomePage.php");
                exit();
            } elseif ($userType == "Professor") {
                header("Location: ProfessorHome.php");
                exit();
            } elseif ($userType == "Program Director" || $userType == "Admin") {
                header("Location: AdminHome.php");
                exit();
            } else {
                // Handle invalid userType
                $_SESSION['error_message'] = "Invalid user type.";
                header("Location: LoginSignup.php");
                exit();
            }
        } else {
            // Incorrect password
            $_SESSION['error_message'] = "Incorrect password. Please enter the right password.";
            $_SESSION['email'] = $email; // Store the entered email in session

            header("Location: LoginSignup.php");

            exit();
        }
    } else {
        // User not found

        $_SESSION['email'] = $email; // Store the entered email in session

        $_SESSION['error_message'] = "User not found. Please register.";
        header("Location:LoginSignup.php");
        exit();
    }

    $email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '';

    // Close connection
    mysqli_close($conn);
}
?>
