<?php
// Replace these with your actual database credentials
$conn = mysqli_connect('localhost', 'root', '', 'dreamteam');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the courseID from the GET request
$courseID = isset($_GET['courseID']) ? $_GET['courseID'] : null;

if ($courseID !== null) {
    // Prepare and execute SQL query to fetch studentIDs for the given courseID from the enrolled_students table
    $sqlStudents = "SELECT DISTINCT studentID FROM `enrolled students` WHERE courseID = $courseID"; // Assuming studentID is unique per course
    $resultStudents = $conn->query($sqlStudents);

    if ($resultStudents) {
        if ($resultStudents->num_rows > 0) {
            // Array to store studentIDs
            $studentIDs = array();

            // Fetch studentIDs
            while ($rowStudent = $resultStudents->fetch_assoc()) {
                $studentIDs[] = $rowStudent['studentID'];
            }

            if (!empty($studentIDs)) {
                // Prepare and execute SQL query to fetch groupIDs based on matching studentIDs from the group table
                $sqlGroups = "SELECT DISTINCT groupID FROM `group` WHERE studentID IN (" . implode(",", $studentIDs) . ")";
                $resultGroups = $conn->query($sqlGroups);

                if ($resultGroups->num_rows > 0) {
                    // Array to store groupIDs
                    $groupIDs = array();

                    // Fetch groupIDs
                    while ($rowGroup = $resultGroups->fetch_assoc()) {
                        $groupIDs[] = $rowGroup['groupID'];
                        // Log the group ID here after it's fetched
                        error_log('Fetched group ID: ' . $rowGroup['groupID']);
                    }

                    // Return groupIDs data as JSON
                    echo json_encode($groupIDs);
                } else {
                    echo "No matching groups found for this course.";
                }
            } else {
                echo "No students enrolled in this course.";
            }
        } else {
            echo "No students enrolled in this course.";
        }
    } else {
        echo "Error fetching student data: " . $conn->error;
    }
} else {
    echo "Invalid courseID parameter.";
}

$conn->close();
?>
