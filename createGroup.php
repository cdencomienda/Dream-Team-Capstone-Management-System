<?php
session_start(); // Start the session

$conn = mysqli_connect('localhost', 'root', '', 'dreamteam');

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize input data
    $groupName = htmlspecialchars($_POST['groupName']);
    $studentName = htmlspecialchars($_POST['studentName']);
    $panelistName = htmlspecialchars($_POST['panelistName']);
    $advisorName = htmlspecialchars($_POST['advisorName']);

    // Check if the group name, student, panelist, and advisor are provided
    if (!empty($groupName) && !empty($studentName) && !empty($panelistName) && !empty($advisorName)) {
        // Check if the selected students are enrolled in the courseID
        if (isset($_SESSION['varCourseID'])) {
            // Use the stored courseID from the session
            $courseID = $_SESSION['varCourseID'];
        } else {
            echo "Error: Course ID not set in the session.";
            exit; // Exit if courseID is not set
        }

        $groupID = getLastGroupID($conn);
        $requirementsID = getLastRequirementID($conn);

        // Check if the panelists are valid users and limit to 4 names
        $panelists = array_map('trim', explode(",", $panelistName));
        $panelRoles = ['Chair Panel', 'Lead Panel', 'Panel Member', 'Panel Member'];
        $panelID = getLastPanelID($conn); // Get the last panel ID

        foreach ($panelists as $key => $panelist) {
            // Check if the panelist name exists and get their userID
            $panelQuery = "SELECT userID FROM `users` WHERE userName = '$panelist'";
            $panelResult = mysqli_query($conn, $panelQuery);
            if ($panelResult) {
                $panelRow = mysqli_fetch_assoc($panelResult);

                // Insert panelist into the panelist table with the uniform panelID
                $insertPanelQuery = "INSERT INTO `panelist` (panelID, professorID, panelRole) 
                                     VALUES ('$panelID', '{$panelRow['userID']}', '{$panelRoles[$key]}')";
                mysqli_query($conn, $insertPanelQuery);
            } else {
                echo "Error fetching panelist data: " . mysqli_error($conn);
            }
        }

        // Check if the student is enrolled in the course
        $studentNames = array_map('trim', explode(",", $studentName)); // Trim spaces around student names
        foreach ($studentNames as $student) {
            $query = "SELECT userID FROM users WHERE userName = '$student'";
            $result = mysqli_query($conn, $query);
            if ($result) {
                $row = mysqli_fetch_assoc($result);
                $studentID = $row['userID'];

                // Check if the student is already in the group
                $checkQuery = "SELECT * FROM `group` WHERE studentID = '$studentID' AND courseID = '$courseID'";
                $checkResult = mysqli_query($conn, $checkQuery);
                if (mysqli_num_rows($checkResult) > 0) {
                    echo "Error: $student is already in the group.";
                    continue; // Skip inserting duplicate student
                }

                // Proceed with insertion into the groups table
                $insertQuery = "INSERT INTO `group` (groupID, groupName, studentID, courseID, panelID, requirementsID) 
                                VALUES ('$groupID', '$groupName', '$studentID', '$courseID', '$panelID', '$requirementsID')";
                $insertResult = mysqli_query($conn, $insertQuery);

                if (!$insertResult) {
                    echo "Error adding group: " . mysqli_error($conn);
                    // Handle the error and exit if needed
                    exit;
                }
            } else {
                echo "Error fetching user data for student: " . mysqli_error($conn);
                // Handle the error and exit if needed
                exit;
            }
        }

        // Check if the advisor is a valid user
        $advisorQuery = "SELECT userID FROM `users` WHERE userName = '$advisorName'";
        $advisorResult = mysqli_query($conn, $advisorQuery);
        if ($advisorResult) {
            $advisorRow = mysqli_fetch_assoc($advisorResult);

            // Insert advisor into the group table
            $advisorID = $advisorRow['userID'];
            $updateAdvisorQuery = "UPDATE `group` SET adviserID = '$advisorID' WHERE groupID = '$groupID'";
            mysqli_query($conn, $updateAdvisorQuery);

            header("Location: " . $_SERVER['HTTP_REFERER']);
        } else {
            echo "Error fetching advisor data: " . mysqli_error($conn);
        }
    } else {
        echo "Error: Group name, student name, panelist name, and advisor name are required.";
    }
} else {
    echo "Error: Form not submitted.";
}

// Function to get the last panel ID from the panelist table
function getLastPanelID($conn) {
    $query = "SELECT MAX(panelID) AS maxPanelID FROM panelist";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    return $row['maxPanelID'] + 1; // Increment the last panel ID
}

// Function to get the last group ID from the group table
function getLastGroupID($conn) {
    $query = "SELECT MAX(groupID) AS maxGroupID FROM `group`";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    return $row['maxGroupID'] + 1; // Increment the last group ID
}

function getLastRequirementID($conn) {
    $query = "SELECT MAX(requirementsID) AS maxRequirementsID FROM `group`";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    return $row['maxRequirementsID'] + 1; // Increment the last requirement ID
}
?>
