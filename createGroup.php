<?php
session_start(); // Start the session

$conn = mysqli_connect('localhost', 'root', '', 'dreamteam');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to sanitize input data
function sanitizeInput($data) {
    global $conn;
    return $conn->real_escape_string(trim($data));
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

// Function to get the last requirement ID from the group table
function getLastRequirementID($conn) {
    $query = "SELECT MAX(requirementsID) AS maxRequirementsID FROM `group`";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    return $row['maxRequirementsID'] + 1; // Increment the last requirement ID
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize input data
    $groupName = sanitizeInput($_POST['groupName']);
    $studentName = sanitizeInput($_POST['studentName']);
    $panelistNameChair = sanitizeInput($_POST['panelistNameChair']);
    $panelistNameLead = sanitizeInput($_POST['panelistNameLead']);
    $panelistName1 = sanitizeInput($_POST['panelistName1']);
    $panelistName2 = sanitizeInput($_POST['panelistName2']);
    $adviserName = sanitizeInput($_POST['adviserName']);

    // Echo the names and selected options
    echo "Group Name: " . htmlspecialchars($groupName) . "<br>";
    echo "Selected Students: " . htmlspecialchars($studentName) . "<br>";
    echo "Chair Panelist: " . htmlspecialchars($panelistNameChair) . "<br>";
    echo "Lead Panelist: " . htmlspecialchars($panelistNameLead) . "<br>";
    echo "Panelist 1: " . htmlspecialchars($panelistName1) . "<br>";
    echo "Panelist 2: " . htmlspecialchars($panelistName2) . "<br>";
    echo "Adviser: " . htmlspecialchars($adviserName) . "<br>";

    // Check if the group name, student, panelists, and adviser are provided
    if (!empty($groupName) && !empty($studentName) && !empty($panelistNameChair) && !empty($panelistNameLead) && !empty($panelistName1) && !empty($panelistName2) && !empty($adviserName)) {
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
        $panelists = [$panelistNameChair, $panelistNameLead, $panelistName1, $panelistName2];
        $panelRoles = ['Chair Panel', 'Lead Panel', 'Panel Member', 'Panel Member'];
        $panelID = getLastPanelID($conn); // Get the last panel ID

        foreach ($panelists as $key => $panelist) {
            // Check if the panelist name exists and get their userID
            $panelQuery = "SELECT userID FROM `users` WHERE userName = '$panelist'";
            $panelResult = mysqli_query($conn, $panelQuery);
            if ($panelResult) {
                $panelRow = mysqli_fetch_assoc($panelResult);
                if (!$panelRow) {
                    echo "Error: Panelist '$panelist' does not exist in the users table.<br>";
                    continue; // Skip non-existing panelist
                }
                // Insert panelist into the panelist table with the uniform panelID
                $insertPanelQuery = "INSERT INTO `panelist` (panelID, professorID, panelRole) 
                                     VALUES ('$panelID', '{$panelRow['userID']}', '{$panelRoles[$key]}')";
                if (!mysqli_query($conn, $insertPanelQuery)) {
                    echo "Error inserting panelist: " . mysqli_error($conn) . "<br>";
                }
            } else {
                echo "Error fetching panelist data: " . mysqli_error($conn) . "<br>";
            }
        }

        // Check if the student is enrolled in the course
        $studentNames = array_map('trim', explode(",", $studentName)); // Trim spaces around student names
        foreach ($studentNames as $student) {
            $query = "SELECT userID FROM users WHERE userName = '$student'";
            $result = mysqli_query($conn, $query);
            if ($result) {
                $row = mysqli_fetch_assoc($result);
                if (!$row) {
                    echo "Error: Student '$student' does not exist in the users table.<br>";
                    continue; // Skip non-existing student
                }
                $studentID = $row['userID'];

                // Check if the student is already in the group
                $checkQuery = "SELECT * FROM `group` WHERE studentID = '$studentID' AND courseID = '$courseID'";
                $checkResult = mysqli_query($conn, $checkQuery);
                if (mysqli_num_rows($checkResult) > 0) {
                    echo "Error: $student is already in the group.<br>";
                    continue; // Skip inserting duplicate student
                }

                // Proceed with insertion into the groups table
                $insertQuery = "INSERT INTO `group` (groupID, groupName, studentID, courseID, panelID, requirementsID) 
                                VALUES ('$groupID', '$groupName', '$studentID', '$courseID', '$panelID', '$requirementsID')";
                if (!mysqli_query($conn, $insertQuery)) {
                    echo "Error adding group: " . mysqli_error($conn) . "<br>";
                    // Handle the error and exit if needed
                    exit;
                }
            } else {
                echo "Error fetching user data for student: " . mysqli_error($conn) . "<br>";
                // Handle the error and exit if needed
                exit;
            }
        }

        // Check if the adviser is a valid user
        $advisorQuery = "SELECT userID FROM `users` WHERE userName = '$adviserName'";
        $advisorResult = mysqli_query($conn, $advisorQuery);
        if ($advisorResult) {
            $advisorRow = mysqli_fetch_assoc($advisorResult);
            if (!$advisorRow) {
                echo "Error: Adviser '$adviserName' does not exist in the users table.<br>";
                exit; // Exit if adviser does not exist
            }
            // Insert advisor into the group table
            $advisorID = $advisorRow['userID'];
            $updateAdvisorQuery = "UPDATE `group` SET adviserID = '$advisorID' WHERE groupID = '$groupID'";
            if (!mysqli_query($conn, $updateAdvisorQuery)) {
                echo "Error updating adviser: " . mysqli_error($conn) . "<br>";
            } else {
                header("Location: " . $_SERVER['HTTP_REFERER']);
            }
        } else {
            echo "Error fetching advisor data: " . mysqli_error($conn) . "<br>";
        }
    } else {
        echo "Error: All fields are required.";
    }
} else {
    echo "Error: Form not submitted.";
}
?>
