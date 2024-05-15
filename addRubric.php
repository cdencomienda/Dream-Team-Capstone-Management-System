<?php
session_start(); // Start the session




// Check if varCourse is set in the session
if (isset($_SESSION['varCourseID'])) {
    // Use the stored courseID from the session
    $courseID = $_SESSION['varCourseID'];
    // Continue with form submission check
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["rubricCode"])) {
        $rubricCode = $_POST["rubricCode"];

        // Connect to the database
        $conn = mysqli_connect('localhost', 'root', '', 'dreamteam');

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Query to check if rubricCode exists in the rubrics table and get its rubricID
        $query = "SELECT rubricsID FROM `rubrics` WHERE rubricName = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $rubricCode);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Rubric code exists, fetch the rubricID
            $row = $result->fetch_assoc();
            $rubricID = $row["rubricsID"];

            // Get courseID from session variable

            // Insert rubricID into the course_offered table
            $insertQuery = "INSERT INTO `course offered` (courseID, rubricsID) VALUES (?, ?)";
            $insertStmt = $conn->prepare($insertQuery);
            $insertStmt->bind_param("ii", $courseID, $rubricID);
            $insertStmt->execute();

            // Echo a success message
            header("Location: " . $_SERVER['HTTP_REFERER']);
        } else {
            // Rubric code not found
            echo "Rubric code not found in the database.";
        }

        // Close connection
        $stmt->close();
        $insertStmt->close();
        $conn->close();
    } else {
        // Handle the case when the form is not submitted
        echo "Form not submitted";
    }
} else {
    // Handle the case when varCourse is not set
    echo "Session variable varCourse is not set.";
}

?>
