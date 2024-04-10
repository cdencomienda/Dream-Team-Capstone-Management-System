<?php
// Check if session is not already active
if (session_status() == PHP_SESSION_NONE) {
    session_start(); // Start the session if it's not already active
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Connect to the database
    $conn = mysqli_connect('localhost', 'root', '', 'dreamteam');

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    if (isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) {
        $userID = mysqli_real_escape_string($conn, $_SESSION['user_id']);

        $sql = "SELECT courseID, courseName FROM course_created WHERE userID = '$userID'";
        $result = $conn->query($sql);

        if ($result) {
            if ($result->num_rows > 0) {
                $courses = array();
                while ($row = $result->fetch_assoc()) {
                    $courses[] = $row;
                }
                echo json_encode($courses);
            } else {
                echo "No courses found.";
            }
        } else {
            echo "Error executing query: " . $conn->error;
        }
    }

    $conn->close();
}
?>
