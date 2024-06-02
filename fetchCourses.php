<?php
session_start(); // Start the session

// Check if session variables are set
if (isset($_SESSION['acy_id']) && isset($_SESSION['selectedTerm']) && isset($_SESSION['account_id'])) {
    $acy_id = $_SESSION['acy_id'];
    $selectedTerm = $_SESSION['selectedTerm'];
    $account_id = $_SESSION['account_id'];

    // Echo the variables
    echo "acy_id: $acy_id<br>";
    echo "selectedTerm: $selectedTerm<br>";
    echo "account_id: $account_id<br>";

    // Connect to the database
    $conn = mysqli_connect('localhost', 'root', '', 'soe_assessment');

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // SQL query
    $query = "SELECT course_code, section, professor FROM `course` WHERE acy_id = $acy_id AND term = '$selectedTerm' AND professor = $account_id";

    // Execute the query
    $result = mysqli_query($conn, $query);

    // Check if query executed successfully
    if ($result) {
        // Fetch and echo the result
        while ($row = mysqli_fetch_assoc($result)) {
            echo "Course Code: " . $row['course_code'] . "<br>";
            echo "Section: " . $row['section'] . "<br>";
            echo "Professor: " . $row['professor'] . "<br>";
        }
    } else {
        echo "Error executing query: " . mysqli_error($conn);
    }

    // Close the connection
    mysqli_close($conn);
}
?>
