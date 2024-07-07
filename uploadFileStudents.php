<?php
// Start the session
session_start();

// Check for reqName in session and echo result
if (isset($_SESSION['reqName'])) {
    echo 'reqName: ' . $_SESSION['reqName'] . '<br>';
} else {
    echo 'reqName not set in session<br>';
}

// Check for fullPath in session and echo result
if (isset($_SESSION['fullPath'])) {
    echo 'fullPath: ' . $_SESSION['fullPath'] . '<br>';
} else {
    echo 'fullPath not set in session<br>';
}

// Check for student_group_id in session and echo result
if (isset($_SESSION['student_group_id'])) {
    echo 'student_group_id: ' . $_SESSION['student_group_id'] . '<br>';
    
    // Check if user_id is set in session
    if (isset($_SESSION['user_id'])) {
        $uploaderID = $_SESSION['user_id'];
        echo 'user_id: ' . $uploaderID . '<br>'; // Display user_id
        
        // Establish database connection
        $conn = mysqli_connect('localhost', 'root', '', 'dreamteam');
        
        // Check connection
        if (!$conn) {
            die('Connection failed: ' . mysqli_connect_error());
        }
        
        // Prepare and execute query to get the last version number for the specified requirementsID and reqName
        $student_group_id = $_SESSION['student_group_id'];
        $reqName = $_SESSION['reqName'];
        
        $sql = "SELECT version FROM repository WHERE requirementsID = $student_group_id AND reqName = '$reqName' ORDER BY version DESC LIMIT 1";
        $result = mysqli_query($conn, $sql);
        
        // Check if query executed successfully
        if ($result) {
            // Fetch the result as an associative array
            $row = mysqli_fetch_assoc($result);
            
            // Calculate next version number
            if ($row) {
                $lastVersion = $row['version'];
                $nextVersion = $lastVersion + 1;
            } else {
                // If no rows found, start from version 1
                $nextVersion = 1;
            }
            
            echo 'Next Version: ' . $nextVersion . '<br>';
            
            // Handle file upload if form was submitted
            if (isset($_POST['submit'])) {
                // Check if file upload is set and handle errors
                if (!isset($_FILES['studentFile']) || $_FILES['studentFile']['error'] !== UPLOAD_ERR_OK) {
                    die("File upload failed with error code " . $_FILES['studentFile']['error']);
                }
                
                // Process uploaded file
                $file = $_FILES['studentFile'];
                $fileName = basename($file['name']);
                
                // Generate new filename with next version
                $newFileName = pathinfo($fileName, PATHINFO_FILENAME) . ' - V' . $nextVersion . '.pdf';
                $uploadPath = $_SESSION['fullPath'] . '/' . $newFileName;
                
                // Move uploaded file to destination
                if (move_uploaded_file($file['tmp_name'], $uploadPath)) {
                    echo "File uploaded successfully.";
                    
                    // Log upload details into repository
                    $fileNameWithoutExt = pathinfo($fileName, PATHINFO_FILENAME);
                    
                    // Insert query to log upload details
                    $insertSql = "INSERT INTO repository (uploaderID, requirementsID, reqName, fileName, version) 
                                  VALUES ('$uploaderID', $student_group_id, '$reqName', '$fileNameWithoutExt', $nextVersion)";
                    
                    if (mysqli_query($conn, $insertSql)) {
                        echo "Upload details logged successfully.";
                    } else {
                        echo "Error logging upload details: " . mysqli_error($conn);
                    }
                    
                } else {
                    echo "Failed to upload file.";
                }
            }
            
        } else {
            echo 'Error querying database: ' . mysqli_error($conn) . '<br>';
        }
        
        // Close database connection
        mysqli_close($conn);
        
    } else {
        echo 'user_id not set in session<br>';
    }
    
} else {
    echo 'student_group_id not set in session<br>';
}
?>
