<?php
session_start();

header('Content-Type: application/json'); // Set the header to indicate JSON response

if (isset($_SESSION['academic_data'])) {
    echo json_encode($_SESSION['academic_data']);
} else {
    echo json_encode(["error" => "No academic data stored in session."]);
}
?>

