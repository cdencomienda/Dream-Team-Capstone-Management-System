<?php
session_start(); // Start the session

if (isset($_POST['acYear'])) {
    $acYear = $_POST['acYear'];

    // Store the courseID in a session variable
    $_SESSION['acYear'] = $acYear;

    // Construct a JSON response
    $response = [
        'status' => 'success',
        'message' => 'Received acYear: ' . $acYear,
    ];

    // Send the JSON response
    header('Content-Type: application/json');
    echo json_encode($response);
} else {
    // Handle case where acYear is not set
    $response = [
        'status' => 'error',
        'message' => 'acYear not received.',
    ];

    // Send the JSON error response
    header('Content-Type: application/json');
    echo json_encode($response);
}
?>