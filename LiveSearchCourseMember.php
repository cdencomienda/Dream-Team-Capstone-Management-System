<?php
// Check if a session is not already active before starting a new session
if (!session_id()) {
    session_start();
}

// Check if the courseID is set in the POST request
if (($_SERVER["REQUEST_METHOD"] == "POST") && (isset($_POST["courseID"]))) {
    // Connect to the database
    $conn = mysqli_connect('localhost', 'root', '', 'dreamteam');

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Sanitize the input
    $courseID = mysqli_real_escape_string($conn, $_POST["courseID"]);

    // Query to fetch student IDs for the given courseID
    $sql = "SELECT studentID FROM `enrolled students` WHERE courseID = '$courseID'";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        $memberList = array();

        while ($row = mysqli_fetch_assoc($result)) {
            $memberList[] = $row;
        }

        // Log success message and member list count to the browser console
        echo '<script>console.log("Member list fetched successfully. Member count: ' . count($memberList) . '", ' . json_encode($memberList) . ');</script>';

        // Return the member list as JSON
        echo json_encode($memberList);
    } else {
        // Error handling if the query fails
        $error = mysqli_error($conn);
        error_log("Query Error: $error", 0); // Log the error
        echo json_encode(array('error' => 'Query failed')); // Send an error response

        // Log error message to the browser console
        echo '<script>console.error("Query failed: ' . $error . '");</script>';
    }

    // Close the database connection
    mysqli_close($conn);
} else {
    // Error handling for invalid or missing data
    echo json_encode(array('error' => 'Invalid request'));

    // Log invalid request message to the browser console
    echo '<script>console.warn("Invalid request.");</script>';
}
?>
