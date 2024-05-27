<?php
session_start(); // Start the session

// Check if session variables are set
if (isset($_SESSION['acy_id']) && isset($_SESSION['selectedTerm']) && isset($_SESSION['account_id'])) {
    $acy_id = $_SESSION['acy_id'];
    $selectedTerm = $_SESSION['selectedTerm'];
    $account_id = $_SESSION['account_id'];

    // Connect to the database
    $conn = mysqli_connect('localhost', 'root', '', 'soe_assessment');

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Construct the SQL query
    $query = "SELECT course_code, section, professor FROM `course` WHERE acy_id = $acy_id AND term = '$selectedTerm' AND professor = $account_id";

    // Execute the query
    $result = mysqli_query($conn, $query);

    // Check if any data is returned
    if (mysqli_num_rows($result) > 0) {
        // Initialize an array to store the fetched data
        $courses = [];

        // Fetch and store data in the array
        while ($row = mysqli_fetch_assoc($result)) {
            $courses[] = $row;
        }

        // Display the data from the array
        foreach ($courses as $course) {
            echo "Course Code: " . htmlspecialchars($course['course_code']) . "<br>";
            echo "Section: " . htmlspecialchars($course['section']) . "<br>";
            echo "Professor: " . htmlspecialchars($course['professor']) . "<br><br>";
        }
    } else {
        echo "No courses found.";
    }

    // Close the connection
    mysqli_close($conn);
} else {
    echo "Required session variables are missing.";
}
?>
