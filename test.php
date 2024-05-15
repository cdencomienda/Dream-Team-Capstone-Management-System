<?php
// process_form.php

$conn = mysqli_connect('localhost', 'root', '', 'dreamteam');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to sanitize input data
function sanitizeInput($data) {
    global $conn;
    return $conn->real_escape_string(trim($data));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $selectedStudents = sanitizeInput($_POST['studentName']);
    $chairPanelist = sanitizeInput($_POST['panelistNameChair']);
    $leadPanelist = sanitizeInput($_POST['panelistNameLead']);
    $panelist1 = sanitizeInput($_POST['panelistName1']);
    $panelist2 = sanitizeInput($_POST['panelistName2']);
    $adviser = sanitizeInput($_POST['adviserName']);

    // Echo the names and selected options
    echo "Selected Students: " . htmlspecialchars($selectedStudents) . "<br>";
    echo "Chair Panelist: " . htmlspecialchars($chairPanelist) . "<br>";
    echo "Lead Panelist: " . htmlspecialchars($leadPanelist) . "<br>";
    echo "Panelist 1: " . htmlspecialchars($panelist1) . "<br>";
    echo "Panelist 2: " . htmlspecialchars($panelist2) . "<br>";
    echo "Adviser: " . htmlspecialchars($adviser) . "<br>";
}

$conn->close();
?>
