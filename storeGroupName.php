<?php
session_start(); // Start the session

if (isset($_POST['group'])) {
    $groupName = $_POST['group'];

    // Store the courseID in a session variable
    $_SESSION['groupName'] = $groupName;

    // Construct a JSON response
    $response = [
        'status' => 'success',
        'message' => 'Received groupName: ' . $groupName,
    ];

    // Send the JSON response
    header('Content-Type: application/json');
    echo json_encode($response);
} else {
    // Handle case where varCourse is not set
    $response = [
        'status' => 'error',
        'message' => 'varCourse not received.',
    ];

    // Send the JSON error response
    header('Content-Type: application/json');
    echo json_encode($response);
}
?>