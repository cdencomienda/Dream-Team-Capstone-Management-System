<?php
session_start();

// Initialize an array to store files information
$filesArray = [];

// Check if the student_group_id session variable is set
if(isset($_SESSION['student_group_id'])) {
    $studentGroupId = $_SESSION['student_group_id'];
    echo "Session variable student_group_id is set. Value: $studentGroupId<br>";

    // Check if the fullPath session variable is set
    if(isset($_SESSION['fullPath'])) {
        $fullPath = rtrim($_SESSION['fullPath'], '/') . '/'; // Ensure fullPath ends with a slash
        echo "Session variable fullPath is set. Value: $fullPath<br>";

        // Database connection
        $conn = new mysqli('localhost', 'root', '', 'dreamteam');
        
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepare SQL query to fetch uploaderID, fileName, version, and user's first name and last name, ordered by version ascending
        $sql = "SELECT r.uploaderID, r.fileName, r.version, u.firstName, u.lastName 
                FROM repository r
                INNER JOIN users u ON r.uploaderID = u.userID
                WHERE r.requirementsID = ?
                ORDER BY r.version ASC";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $studentGroupId);
        $stmt->execute();
        $stmt->bind_result($uploaderID, $fileName, $version, $firstName, $lastName);
        
        // Fetch results into the array
        while ($stmt->fetch()) {
            $filesArray[] = [
                'uploaderID' => $firstName . ' ' . $lastName,
                'fileName' => $fileName,
                'version' => $version
            ];
        }
        
        // Check if any results were found
        if (!empty($filesArray)) {
            echo "Files:<br>";
            foreach ($filesArray as $file) {
                echo "{$file['uploaderID']} - {$file['fileName']} - V{$file['version']}<br>";
                
                // Construct the file path to check (include .pdf extension)
                $filePath = $fullPath . $file['fileName'] . ' - V' . $file['version'] . '.pdf';
                
                // Check if the file exists
                if (file_exists($filePath)) {
                    echo "File exists: $filePath<br>";
                } else {
                    echo "File does not exist: $filePath<br>";
                }
            }
        } else {
            echo "No files found for student_group_id: $studentGroupId<br>";
        }

        // Close statement and database connection
        $stmt->close();
        $conn->close();

    } else {
        echo "Session variable fullPath is not set.<br>";
    }
} else {
    echo "Session variable student_group_id is not set.<br>";
}
?>
