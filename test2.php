<?php
session_start();

if (!isset($_SESSION['student_group_id'])) {
    echo json_encode(array("error" => "student_group_id is not set in session."));
    exit;
}

$student_group_id = $_SESSION['student_group_id'];
$fullPath = isset($_SESSION['fullPath']) ? $_SESSION['fullPath'] : '';

// Database connection
$conn = new mysqli('localhost', 'root', '', 'dreamteam');
if ($conn->connect_error) {
    die(json_encode(array("error" => "Connection failed: " . $conn->connect_error)));
}

// Query to fetch uploaderID, fileName, and version from repository table based on student_group_id
$sql = "SELECT r.uploaderID, r.fileName, r.version, u.firstName, u.lastName 
        FROM repository r
        INNER JOIN users u ON r.uploaderID = u.userID
        WHERE r.requirementsID = $student_group_id
        ORDER BY r.version ASC";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $data = array(); // Initialize an empty array to store results

    while ($row = $result->fetch_assoc()) {
        // Construct file path
        $filePath = $fullPath . "/" . $row['fileName'] . " - V" . $row['version'] . ".pdf";
        
        // Check if the file exists
        if (file_exists($filePath)) {
            // Add filePath to the row data
            $row['filePath'] = $filePath;
            // Push the row into the $data array
            $data[] = $row;
        } else {
            // File does not exist, you may handle this case if needed
            // For now, we skip adding this row to $data
        }
    }
    
    // Close the database connection
    $conn->close();
    
    // Encode the $data array as JSON and output it
    echo json_encode($data);
} else {
    echo json_encode(array("error" => "No results found for student_group_id: $student_group_id"));
    $conn->close();
}
?>

