<?php
// Replace these with your actual database credentials
$conn = mysqli_connect('localhost', 'root', '', 'dreamteam');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Array to store courseIDs
$courseIDs = [];

// Get the courseID from the GET request
$courseID = isset($_GET['courseID']) ? $_GET['courseID'] : null;

if ($courseID !== null) {
    $courseIDs[] = $courseID;
}

// Check if there are multiple courseIDs in the array
if (!empty($courseIDs)) {
    $data = []; // Array to store the JSON data

    foreach ($courseIDs as $id) {
        // Prepare and execute SQL query to fetch groupIDs for the given courseID from the group table
        $sqlGroups = "SELECT DISTINCT groupName FROM `group` WHERE studentID IN (SELECT DISTINCT studentID FROM `enrolled students` WHERE courseID = $id) AND studentID NOT IN (SELECT DISTINCT studentID FROM `enrolled students` WHERE courseID != $id)";

        $resultGroups = $conn->query($sqlGroups);

        if ($resultGroups) {
            if ($resultGroups->num_rows > 0) {
                // Array to store group names
                $groupNames = array();

                // Fetch group names
                while ($rowGroup = $resultGroups->fetch_assoc()) {
                    $groupNames[] = $rowGroup['groupName'];
                }

                // Add group names to the data array
                $data["Groups for Course ID $id"] = $groupNames;
            } else {
                // No groups found for this course
                $data["No groups found for Course ID $id"] = [];
            }
        } else {
            // Error fetching group data
            $data["Error fetching group data for Course ID $id"] = $conn->error;
        }
    }

    // Output the JSON data
    echo json_encode($data);
} else {
    // No courseIDs provided
    echo json_encode(["error" => "No courseIDs provided"]);
}

$conn->close();


?>
