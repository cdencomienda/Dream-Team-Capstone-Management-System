<?php
// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Connect to the database
$conn = new mysqli('localhost', 'root', '', 'dreamteam');

// Check connection
if ($conn->connect_error) {
    echo json_encode(['message' => 'Connection failed: ' . $conn->connect_error]);
    exit();
}

// Get the posted data
$data = json_decode(file_get_contents('php://input'), true);

// Debugging: Check if data is being received correctly
if (!$data) {
    echo json_encode(['message' => 'No data received']);
    exit();
}

// Ensure all required fields are present
if (!isset($data['groupID'], $data['panelRole'], $data['index'], $data['isChecked'])) {
    echo json_encode(['message' => 'Invalid request. Missing fields']);
    exit();
}

$groupID = $conn->real_escape_string($data['groupID']);
$panelRole = $conn->real_escape_string($data['panelRole']);
$index = (int)$data['index'];
$isChecked = (int)$data['isChecked'];

// Fetch existing validated comments for the panel role
$sql = "SELECT validatedComments FROM feedback WHERE groupID = '$groupID' AND panelRole = '$panelRole'";
$result = $conn->query($sql);

// Debugging: Check if query execution succeeded
if (!$result) {
    echo json_encode(['message' => 'Query failed: ' . $conn->error]);
    exit();
}

if ($result->num_rows > 0) {
    // Retrieve the existing validatedComments string (e.g., '0~1~0~0')
    $row = $result->fetch_assoc();
    $validatedComments = explode('~', $row['validatedComments']);

    // Ensure the array has at least the length of the total comments
    while (count($validatedComments) <= $index) {
        $validatedComments[] = '0';
    }

    // Update the specific index with the new validation status
    $validatedComments[$index] = $isChecked;

    // Convert the array back to a string
    $newValidatedComments = implode('~', $validatedComments);

    // Update the record in the database
    $updateSql = "UPDATE feedback SET validatedComments = '$newValidatedComments' WHERE groupID = '$groupID' AND panelRole = '$panelRole'";
    if ($conn->query($updateSql) === TRUE) {
        echo json_encode(['message' => 'Validation updated successfully']);
    } else {
        echo json_encode(['message' => 'Error updating validation: ' . $conn->error]);
    }
} else {
    // If no record exists, create a new one with default 0s for the total comments
    $validatedComments = array_fill(0, $index + 1, '0');
    $validatedComments[$index] = $isChecked;
    
    $newValidatedComments = implode('~', $validatedComments);

    $insertSql = "INSERT INTO feedback (groupID, panelRole, validatedComments) VALUES ('$groupID', '$panelRole', '$newValidatedComments')";
    if ($conn->query($insertSql) === TRUE) {
        echo json_encode(['message' => 'Validation inserted successfully']);
    } else {
        echo json_encode(['message' => 'Error inserting validation: ' . $conn->error]);
    }
}

$conn->close();
?>
