<?php
session_start();

// Initialize an array to store files information
$filesArray = [];

// Check if the student_group_id session variable is set
if (isset($_SESSION['student_group_id'])) {
    $studentGroupId = $_SESSION['student_group_id'];

    // Check if the fullPath session variable is set
    if (isset($_SESSION['fullPath'])) {
        $fullPath = rtrim($_SESSION['fullPath'], '/') . '/'; // Ensure fullPath ends with a slash

        // Check if the reqName session variable is set
        if (isset($_SESSION['reqName'])) {
            $reqName = $_SESSION['reqName'];

            // Database connection
            $conn = new mysqli('localhost', 'root', '', 'dreamteam');

            // Check connection
            if ($conn->connect_error) {
                die(json_encode(['error' => 'Connection failed: ' . $conn->connect_error]));
            }

            // Prepare SQL query to fetch fileName and version
            $sql = "SELECT r.fileName, r.version 
                    FROM repository r
                    INNER JOIN users u ON r.uploaderID = u.userID
                    WHERE r.requirementsID = ? AND r.reqName = ?
                    ORDER BY r.version ASC";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("is", $studentGroupId, $reqName);
            $stmt->execute();
            $stmt->bind_result($fileName, $version);

            // Fetch results into the array
            while ($stmt->fetch()) {
                $filePath = $fullPath . $fileName . ' - V' . $version . '.pdf';

                // Check if the file exists
                if (file_exists($filePath)) {
                    $filesArray[] = $filePath;
                }
            }

            // Close statement and database connection
            $stmt->close();
            $conn->close();

            // Return the array as JSON
            echo json_encode(['filePaths' => $filesArray]);
        } else {
            echo json_encode(['error' => 'Session variable reqName is not set.']);
        }
    } else {
        echo json_encode(['error' => 'Session variable fullPath is not set.']);
    }
} else {
        echo json_encode(['error' => 'Session variable student_group_id is not set.']);
}
?>
