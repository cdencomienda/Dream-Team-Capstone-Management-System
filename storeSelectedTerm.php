<?php
session_start(); // Start the session

if (isset($_POST['selectedTerm'])) {
    $selectedTerm = intval($_POST['selectedTerm']); // Cast to integer

    // Store the selected term (as an integer) in the session
    $_SESSION['selectedTerm'] = $selectedTerm;

    // Construct a JSON response
    $response = [
        'status' => 'success',
        'message' => 'Selected term stored in session: ' . $selectedTerm,
    ];

    // Send the JSON response
    header('Content-Type: application/json');
    echo json_encode($response);
} else {
    // Handle case where selectedTerm is not received
    $response = [
        'status' => 'error',
        'message' => 'selectedTerm not received.',
    ];

    // Send the JSON error response
    header('Content-Type: application/json');
    echo json_encode($response);
}
?>
