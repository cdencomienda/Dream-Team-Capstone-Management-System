<?php
session_start();

// Get the JSON input
$data = json_decode(file_get_contents('php://input'), true);

// Check if course_id is set
if (isset($data['course_id'])) {
    // Save course_id in session
    $_SESSION['course_id'] = $data['course_id'];
    
    // Return a success response with the saved course_id
    echo json_encode(['success' => true, 'course_id' => $data['course_id']]);
} else {
    // Return an error response
    echo json_encode(['success' => false, 'error' => 'course_id not set']);
}
?>
