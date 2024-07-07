<?php
session_start();

// Database connection
$conn = new mysqli('localhost', 'root', '', 'dreamteam');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve POST data
    $name = $_POST['name'];
    $_SESSION['reqName'] = $name;


    // Check if student_group_id is in session
    if (isset($_SESSION['student_group_id'])) {
        $student_group_id = $_SESSION['student_group_id'];

        // Query database
        $stmt = $conn->prepare("SELECT reqDescription FROM requirements WHERE requirementsID = ? AND reqName = ?");
        $stmt->bind_param("is", $student_group_id, $name);
        $stmt->execute();
        $stmt->bind_result($reqDescription);

        if ($stmt->fetch()) {
            $_SESSION['reqDescription'] = $reqDescription;

            // Prepare response as JSON
            $response = array(
                'reqDescription' => $reqDescription
            );
            header('Content-Type: application/json');
            echo json_encode($response);
        } else {
            echo json_encode(array('error' => 'No matching requirement found.'));
        }

        $stmt->close();
    } else {
        echo json_encode(array('error' => 'Student Group ID is not set in session.'));
    }
} else {
    echo json_encode(array('error' => 'Error: Expected POST method.'));
}

// Close database connection
$conn->close();
?>
