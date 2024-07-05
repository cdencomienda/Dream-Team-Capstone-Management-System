<?php

session_start();

// Check if JSON data was received
$data = json_decode(file_get_contents('php://input'), true);

if (!$data || !isset($data['name'], $data['description'])) {
    http_response_code(400);
    echo json_encode(['error' => 'Invalid or missing data received.']);
    exit;
}

$name = $data['name'];
$description = $data['description'];

$conn = mysqli_connect('localhost', 'root', '', 'dreamteam');
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Insert data into database
$stmt = $conn->prepare("INSERT INTO requirements (name, description) VALUES (:name, :description)");
$stmt->bindParam(':name', $name);
$stmt->bindParam(':description', $description);

try {
    $stmt->execute();
    $fileId = $conn->lastInsertId();
    
    // Use session variable for upload directory
    $uploadDir = $_SESSION['fullPath'];

    // Create directory if it doesn't exist
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    // Check if file was uploaded without errors
    if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
        $tempFile = $_FILES['file']['tmp_name'];

        // Generate structured file name based on database record ID
        $fileName = $fileId . '_' . basename($_FILES['file']['name']);
        $targetFile = $uploadDir . $fileName;

        // Move uploaded file to the target location
        if (move_uploaded_file($tempFile, $targetFile)) {
            // File moved successfully
            $finalFilePath = $uploadDir . $fileName;
            // Update database with final file path
            $updateStmt = $conn->prepare("UPDATE requirements SET file_path = :finalFilePath WHERE id = :fileId");
            $updateStmt->bindParam(':finalFilePath', $finalFilePath);
            $updateStmt->bindParam(':fileId', $fileId);
            $updateStmt->execute();

            // Respond with JSON containing the final file path
            echo json_encode(['path' => $finalFilePath]);
        } else {
            // Failed to move file
            http_response_code(500);
            echo json_encode(['error' => 'Failed to move uploaded file to repository.']);
        }
    } else {
        // No file uploaded or error occurred
        http_response_code(400);
        echo json_encode(['error' => 'No file uploaded or an error occurred.']);
    }
} catch (PDOException $e) {
    // Handle database error
    http_response_code(500);
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
}

$conn = null;
?>
