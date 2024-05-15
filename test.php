<?php
session_start(); // Start the session

// Check if varCourseID is set in the session
if (isset($_SESSION['varCourseID'])) {
    // Get varCourseID from the session
    $varCourseID = $_SESSION['varCourseID'];

    // Create connection
    $conn = mysqli_connect('localhost', 'root', '', 'dreamteam');

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and execute SQL query to get all unique requirementsID from the group table for the given courseID
    $sql = "SELECT DISTINCT requirementsID FROM `group` WHERE courseID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $varCourseID);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if there are any unique requirementsIDs found
    if ($result->num_rows > 0) {
        // Initialize an array to store unique requirementsIDs
        $uniqueRequirementsIDs = array();

        // Fetch all unique requirementsIDs and add them to the array
        while ($row = $result->fetch_assoc()) {
            $uniqueRequirementsIDs[] = $row['requirementsID'];
        }

        // Loop through unique requirementsIDs and insert the submitted data for each ID
        foreach ($uniqueRequirementsIDs as $requirementsID) {
            // Check if the 'requirements' and 'requirementsDescription' fields are set in the POST data
            if (isset($_POST['requirements']) && isset($_POST['requirementsDescription'])) {
                $requirements = $_POST['requirements'];
                $requirementsDescription = $_POST['requirementsDescription'];

                // Prepare and execute SQL insert query
                $insertSql = "INSERT INTO requirements (reqName, reqDescription, requirementsID) VALUES (?, ?, ?)";
                $insertStmt = $conn->prepare($insertSql);
                $insertStmt->bind_param("sss", $requirements, $requirementsDescription, $requirementsID);
                $insertStmt->execute();
                $insertStmt->close();

                // Echo the inserted data for demonstration
                
                
                header("Location: " . $_SERVER['HTTP_REFERER']);
            } else {
                echo "Please fill out all required fields.";
            }
        }
    } else {
        echo "No requirements found for this course.";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Course ID not set in session.";
}
?>
