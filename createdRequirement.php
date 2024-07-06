<?php
// Start the session
session_start();

// Check if courseGroupID is set in the session
if (isset($_SESSION['courseGroupID']) && is_array($_SESSION['courseGroupID'])) {
    $courseGroupIDs = $_SESSION['courseGroupID'];

    // Connect to the "dream team" database
    $conn_dream = mysqli_connect('localhost', 'root', '', 'dreamteam');

    // Check connection
    if (!$conn_dream) {
        echo json_encode(['error' => 'Connection failed: ' . mysqli_connect_error()]);
        exit;
    }

    // Initialize an array to store unique reqNames
    $reqNames = [];

    // Loop through each courseGroupID
    foreach ($courseGroupIDs as $courseGroupID) {
        // Escape the courseGroupID for security
        $courseGroupID = mysqli_real_escape_string($conn_dream, $courseGroupID);

        // Query to fetch reqName based on courseGroupID
        $query = "SELECT DISTINCT reqName FROM requirements WHERE requirementsID = $courseGroupID";
        $result = mysqli_query($conn_dream, $query);

        // Check if the query was successful
        if ($result) {
            // Fetch and store the reqNames
            while ($row = mysqli_fetch_assoc($result)) {
                $reqNames[] = $row['reqName'];
            }
        } else {
            echo json_encode(['error' => 'Error in query: ' . mysqli_error($conn_dream)]);
            exit;
        }
    }

    // Close the connection to dream_team
    mysqli_close($conn_dream);

    // Remove duplicates from reqNames array
    $reqNames = array_unique($reqNames);

    // Encode the unique reqNames as JSON and send
    echo json_encode(['reqNames' => array_values($reqNames)]);
} else {
    echo json_encode(['error' => 'Course Group IDs are not saved in session or the session data is not in the expected format.']);
}
?>
<!--  -->