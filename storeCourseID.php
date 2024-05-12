<?php
session_start(); // Start the session

if (isset($_POST['varCourse'])) {
    $courseID = $_POST['varCourse'];

    // Store the courseID in a session variable
    $_SESSION['varCourseID'] = $courseID;

    // Construct a JSON response
    $response = [
        'status' => 'success',
        'message' => 'Received courseID: ' . $courseID,
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
