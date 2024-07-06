<?php

// Start or resume the session
session_start();

// Check if course_id is set
if(isset($_SESSION['student_group_id'])) {
    $course_id = $_SESSION['student_group_id'];

        echo "course_id is set to: " . $course_id . "<br>";
        echo "group_names is not set or is not an array.<br>";
} else {
    echo "course_id is not set.<br>";
}
?>
