<?php
// Start the session to access session variables
session_start();

// Replace these with your actual database credentials
$conn = mysqli_connect('localhost', 'root', '', 'dreamteam');

// Check connection
if (mysqli_connect_errno()) {
    die("Connection failed: " . mysqli_connect_error());
}

// Initialize an array to store courseIDs
$courseIDs = [];

// Get the courseID from the GET request
$courseID = isset($_GET['courseID']) ? $_GET['courseID'] : null;

if ($courseID !== null) {
    $courseIDs[] = $courseID;
}

// Initialize the data array to store the JSON data
$data = [];

if (isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) {
    $userID = $_SESSION['user_id'];

    // Check if there are multiple courseIDs in the array
    if (!empty($courseIDs)) {
        foreach ($courseIDs as $id) {
            // Prepare and execute SQL query to fetch groupNames for the given courseID from the group table
            $sqlGroups = "SELECT DISTINCT groupName FROM `group` WHERE courseID = ? AND studentID = ?";
            $stmt = $conn->prepare($sqlGroups);
            $stmt->bind_param("ii", $id, $userID);
            $stmt->execute();
            $resultGroups = $stmt->get_result();

            if ($resultGroups) {
                if ($resultGroups->num_rows > 0) {
                    // Array to store group names
                    $groupNames = [];

                    // Fetch group names
                    while ($rowGroup = $resultGroups->fetch_assoc()) {
                        $groupNames[] = $rowGroup['groupName'];
                    }

                    // Add group names to the data array
                    $data["Groups for Course ID $id"] = $groupNames;
                } else {
                    // No groups found for this course
                    $data["Groups for Course ID $id"] = [];
                }
            } else {
                // Error fetching group data
                $data["Error fetching group data for Course ID $id"] = $conn->error;
            }

            $stmt->close();
        }
    } else {
        // No courseIDs provided
        $data["error"] = "No courseIDs provided";
    }
} else {
    // User is not logged in or user ID is not set
    $data["error"] = "User not authenticated";
}

// Output the JSON data
echo json_encode($data);

$conn->close();
?>
