<?php
session_start(); // Start or resume the session

// Function to check if a file exists on the system
function fileExistsInSystem($fullFilePath) {
    return file_exists($fullFilePath);
}

// Check if student_group_id is set in session
if(isset($_SESSION['student_group_id'])) {
    $student_group_id = $_SESSION['student_group_id'];
} else {
    // Exit script if session variable is not set
    exit(json_encode(["error" => "Student Group ID not found in session."]));
}

// Check if fullPath is set in session
if(isset($_SESSION['fullPath'])) {
    $fullPath = $_SESSION['fullPath'];
} else {
    // Exit script if session variable is not set
    exit(json_encode(["error" => "Full Path not found in session."]));
}

// Establish database connection
$conn = new mysqli('localhost', 'root', '', 'dreamteam');

// Check connection
if ($conn->connect_error) {
    exit(json_encode(["error" => "Connection failed: " . $conn->connect_error]));
}

// SQL query to fetch fileName and version based on student_group_id
$sql = "SELECT fileName, version FROM repository WHERE requirementsID = ?";
$stmt = $conn->prepare($sql);

// Bind parameters
$stmt->bind_param("i", $student_group_id);

// Execute query
$stmt->execute();

// Bind result variables
$stmt->bind_result($fileName, $version);

// Array to hold file paths
$filePaths = [];

// Fetch results
while ($stmt->fetch()) {
    // Construct full path for each result
    $fullFilePath = $fullPath . '/' . $fileName . ' - V' . $version . '.pdf';
    
    // Check if file exists
    if (fileExistsInSystem($fullFilePath)) {
        // Add file path to array
        $filePaths[] = $fullFilePath;
    }
}

// Close statement and connection
$stmt->close();
$conn->close();

// Check if any files were found
if (empty($filePaths)) {
    // No valid files found
    echo json_encode(["message" => "No valid files found."]);
} else {
    // Output file paths as JSON
    echo json_encode(["filePaths" => $filePaths]);
}
?>
