<?php
session_start();

// Initialize an empty array to store results
$results = [];

// Check if the student_group_id session variable is set
if(isset($_SESSION['student_group_id'])) {
    $studentGroupId = $_SESSION['student_group_id'];

    // Check if the fullPath session variable is set
    if(isset($_SESSION['fullPath'])) {
        $fullPath = rtrim($_SESSION['fullPath'], '/') . '/'; // Ensure fullPath ends with a slash

        // Database connection
        $conn = new mysqli('localhost', 'root', '', 'dreamteam');
        
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepare SQL query to fetch the most recent file for each reqName
        $sql = "SELECT r.uploaderID, r.fileName, r.version, r.reqName, u.firstName, u.lastName 
                FROM repository r
                INNER JOIN users u ON r.uploaderID = u.userID
                INNER JOIN (
                    SELECT reqName, MAX(version) AS max_version
                    FROM repository
                    WHERE requirementsID = ?
                    GROUP BY reqName
                ) max_versions ON r.reqName = max_versions.reqName AND r.version = max_versions.max_version
                WHERE r.requirementsID = ?
                ORDER BY r.reqName"; 
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ii", $studentGroupId, $studentGroupId);
        $stmt->execute();
        $stmt->bind_result($uploaderID, $fileName, $version, $reqName, $firstName, $lastName);
        
        // Fetch the most recent file for each reqName
        while ($stmt->fetch()) {
            $filePath = $fullPath . "{$fileName} - V{$version}.pdf";
            $fileExists = file_exists($filePath);
            
            // Prepare the result data
            $result = [
                'reqName' => $reqName,
                'fileName' => $fileName,
                'version' => $version,
                'fileExists' => $fileExists,
                'filePath' => $fileExists ? $filePath : null,
                'uploader' => "{$firstName} {$lastName}"
            ];

            // Add result to results array
            $results[] = $result;
        }

        // Close statement and database connection
        $stmt->close();
        $conn->close();

    } else {
        $results = ['error' => 'Session variable fullPath is not set.'];
    }
} else {
    $results = ['error' => 'Session variable student_group_id is not set.'];
}

// Output results as JSON
header('Content-Type: application/json');
echo json_encode($results);
?>
