<?php
// Start the session
session_start();

// Check if addMemberCourseID is set in the session
if (isset($_SESSION['varCourseID'])) {
    // Use the stored courseID from the session
    $courseID = $_SESSION['varCourseID'];

    // Check if the student names are set in the form data
    if (isset($_POST["studentNames"])) {
        // Retrieve the student names from the form and sanitize them
        $studentNames = $_POST["studentNames"];
        $escapedStudentNames = htmlspecialchars($studentNames);

        // Split the student names into an array using ","
        $students = array_map('trim', explode(",", $escapedStudentNames));

        // Create connection
        $conn = mysqli_connect('localhost', 'root', '', 'dreamteam');

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Define the query to check for similar names
        $checkUserQuery = "SELECT userID, userName FROM `users` WHERE userType = 'Student'";

        // Execute the query
        $result = $conn->query($checkUserQuery);

        // Check if the query was successful
        if ($result) {
            // Loop through the results to find similar names
            while ($row = $result->fetch_assoc()) {
                // Check if the student name is in the submitted list
                if (in_array($row["userName"], $students)) {
                    // If a similar name is found, fetch the userID
                    $userID = $row["userID"];

                    // Insert userID and courseID into enrolled_students table
                    $insertQuery = "INSERT INTO `enrolled students` (studentID, courseID) VALUES ('$userID', '$courseID')";
                    if ($conn->query($insertQuery) === TRUE) {
                        // Handle successful insertion (e.g., redirect or echo success message)
                        header("Location: " . $_SERVER['HTTP_REFERER']);
                    } else {
                        echo "Error inserting into enrolled_students table: " . $conn->error;
                    }
                }
            }
        } else {
            // Handle query execution error
            echo "Error executing query: " . $conn->error;
        }

        // Close database connection
        $conn->close();
    } else {
        // Handle case where student names are not set
        echo "Error: Student names not provided.";
    }
} else {
    // Handle case where addMemberCourseID is not set in the session
    echo "Error: Course ID not found in session.";
}
?>
