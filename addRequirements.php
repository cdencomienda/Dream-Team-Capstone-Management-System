<?php
// Start the session
session_start();

// Check if courseGroupID is set in the session
if (isset($_SESSION['courseGroupID']) && is_array($_SESSION['courseGroupID'])) {
    $courseGroupIDs = $_SESSION['courseGroupID'];

    // Check if requirements and requirementsDescription are set in POST
    if (isset($_POST['requirements']) && isset($_POST['requirementsDescription'])) {
        $requirements = $_POST['requirements'];
        $requirementsDescription = $_POST['requirementsDescription'];

        // Check if there are matched group IDs before proceeding with the SQL insert query
        if (!empty($courseGroupIDs) && $_SESSION['courseGroupID'] != 0) {
            // Connect to the "dream team" database
            $conn_dream = mysqli_connect('localhost', 'root', '', 'dreamteam');

            // Check connection
            if (!$conn_dream) {
                echo json_encode(['error' => 'Connection to dream_team failed: ' . mysqli_connect_error()]);
                exit;
            }

            $successCount = 0; // Counter to track successful insertions

            // Prepare and execute SQL insert query for each courseGroupID
            foreach ($courseGroupIDs as $courseGroupID) {
                $reqName = mysqli_real_escape_string($conn_dream, $requirements);
                $reqDescription = mysqli_real_escape_string($conn_dream, $requirementsDescription);
                $insertSql = "INSERT INTO requirements (reqName, reqDescription, requirementsID) VALUES ('$reqName', '$reqDescription', $courseGroupID)";

                if (mysqli_query($conn_dream, $insertSql)) {
                    $successCount++; // Increment the counter for successful insertion
                } else {
                    echo json_encode(['error' => 'Error in insert query to dream_team: ' . mysqli_error($conn_dream)]);
                }
            }

            // Close the connection to dream_team
            mysqli_close($conn_dream);

            // Check if all insertions were successful
            if ($successCount == count($courseGroupIDs)) {
                echo "Inserted all requirements successfully.";
            } else {
                echo "Error inserting some requirements.";
            }

            // Optionally, you can redirect after processing all insertions
            header("Location: " . $_SERVER['HTTP_REFERER']);
        } else {
            // Set the alert message in JavaScript
            echo "<script>alert('No course group IDs found in session or courseGroupID is 0.');</script>";
            // Stay on the same page
            echo "<script>window.history.back();</script>";
        }
    } else {
        // Set the alert message in JavaScript
        echo "<script>alert('Requirements data not provided in POST.');</script>";
        // Stay on the same page
        echo "<script>window.history.back();</script>";
    }
} else {
    // Set the alert message in JavaScript
    echo "<script>alert('No Groups are in this Course.');</script>";
    // Stay on the same page
    echo "<script>window.history.back();</script>";
}
?>
