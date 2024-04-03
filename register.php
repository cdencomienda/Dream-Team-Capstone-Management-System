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
        echo '<script>
        alert ("Passwords do not match. Please try again.")
        window.location.href = "LoginSignup.html";
        </script>';
    } else {
        // Check if the user already exists in the database
        $query = "SELECT * FROM users WHERE userEmail='$email'";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            echo '<script> 
                    alert ("Passwords do not match. Please try again.")
                    window.location.href = "LoginSignup.html";
                </script>';
        }
        
         else {
            // Insert new user data into the database with userType, profile picture, and unhashed password
            $insert_query = "INSERT INTO users (userName, userEmail, userPassword, userType, profilePicture) VALUES ('$name', '$email', '$password', '$userType', '$profilePicture')";
            if (mysqli_query($conn, $insert_query)) {
                echo '<script> 
                alert ("Registration successful. Please login.")
                window.location.href = "LoginSignup.html";
            </script>';
                
            } else {
                echo "Error: " . mysqli_error($conn);
            }
        }
    }

    // Close connection
    mysqli_close($conn);
}
?>
