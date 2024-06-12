<?php
// Start the session
session_start();

// Check if group_courses is set in the session and if it's an array
if(isset($_SESSION['group_courses']) && is_array($_SESSION['group_courses'])) {
    // Send the array as JSON
    header('Content-Type: application/json');
    echo json_encode($_SESSION['group_courses']);
} else {
    // If group_courses is not set or is not an array, send an error message as JSON
    header('Content-Type: application/json');
    echo json_encode(['error' => 'group_courses array is not set or is not an array in session.']);
}
?>
