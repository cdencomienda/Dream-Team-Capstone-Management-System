<?php
// Start the session
session_start();

$conn = new mysqli('localhost', 'root', '', 'dreamteam');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if requirements data is provided
    if (!isset($_POST['courseGroupName']) || !isset($_POST['courseGroupId']) || !isset($_POST['adviserName']) || !isset($_POST['adviserId'])) {
        // Alert the user about missing requirements data
        echo "<script>alert('Requirements data not provided in POST.');</script>";
        // Stay on the same page
        echo "<script>window.history.back();</script>";
        // End execution
        exit;
    }

    // Collect group data and escape string values
    $groupName = mysqli_real_escape_string($conn, $_POST['courseGroupName']);
    $groupId = mysqli_real_escape_string($conn, $_POST['courseGroupId']);

    // Check if groupName or groupId is null or empty
    if (empty($groupName) || empty($groupId)) {
        echo "<script>alert('Group Name or Group ID cannot be null or empty.');</script>";
        echo "<script>window.history.back();</script>";
        exit;
    }

    // Check if a group with the same groupName and courseID already exists
    $checkGroupQuery = "SELECT * FROM `group` WHERE groupName='$groupName' AND courseID='$_SESSION[course_id]'";
    $checkGroupResult = mysqli_query($conn, $checkGroupQuery);

    if (mysqli_num_rows($checkGroupResult) > 0) {
        echo "<script>alert('A group with the same name already exists for this course.');</script>";
        echo "<script>window.history.back();</script>";
        exit;
    }

    // Fetch the last panelID from the group table
    $lastPanelIdQuery = "SELECT panelID FROM `panelist` ORDER BY panelID DESC LIMIT 1;";
    $lastPanelIdResult = mysqli_query($conn, $lastPanelIdQuery);
    
    if ($lastPanelIdResult) {
        $lastPanelIdRow = mysqli_fetch_assoc($lastPanelIdResult);
        $lastPanelId = $lastPanelIdRow['panelID'];
    } else {
        // Handle query error or no results found
        $lastPanelId = null; // Assuming default value if no panelID exists
    }
    

    // Set newPanelId to 1 if lastPanelId is null
    $newPanelId = ($lastPanelId === null) ? 1 : $lastPanelId + 1;

    // Collect adviser data and escape string values
    $adviserName = mysqli_real_escape_string($conn, $_POST['adviserName']);
    $adviserId = mysqli_real_escape_string($conn, $_POST['adviserId']);

    // Check if adviserName or adviserId is null or empty
    if (empty($adviserName) || empty($adviserId)) {
        echo "<script>alert('Adviser Name or Adviser ID cannot be null or empty.');</script>";
        echo "<script>window.history.back();</script>";
        exit;
    }

    // Insert into the group table
    $insertGroupQuery = "INSERT INTO `group` (groupName, groupID, courseID, panelID, adviserID, requirementsID) VALUES ('$groupName', '$groupId', '$_SESSION[course_id]', '$newPanelId', '$adviserId', '$groupId')";
    $insertGroupResult = mysqli_query($conn, $insertGroupQuery);

    // Check if the group insert query was successful
    if ($insertGroupResult) {
        // Insert into the panelist table
        $chairPanelistName = mysqli_real_escape_string($conn, $_POST['chairpanelistName']);
        $leadPanelistName = mysqli_real_escape_string($conn, $_POST['leadPanelistName']);
        $panelist1Name = mysqli_real_escape_string($conn, $_POST['panelist1Name']);
        $panelist2Name = mysqli_real_escape_string($conn, $_POST['panelist2Name']);

        $chairPanelistId = mysqli_real_escape_string($conn, $_POST['chairpanelistId']);
        $leadPanelistId = mysqli_real_escape_string($conn, $_POST['leadPanelistId']);
        $panelist1Id = mysqli_real_escape_string($conn, $_POST['panelist1Id']);
        $panelist2Id = mysqli_real_escape_string($conn, $_POST['panelist2Id']);

        $panelRoles = ['Chair Panel', 'Lead Panel', 'Panel Member 1', 'Panel Member 2'];
        $panelIds = [$chairPanelistId, $leadPanelistId, $panelist1Id, $panelist2Id];
        $panelNames = [$chairPanelistName, $leadPanelistName, $panelist1Name, $panelist2Name];

        // Check if any panelist names or IDs are null or empty
        for ($i = 0; $i < count($panelNames); $i++) {
            if (empty($panelNames[$i]) || empty($panelIds[$i])) {
                echo "<script>alert('Panelist Name or Panelist ID cannot be null or empty for role " . $panelRoles[$i] . ".');</script>";
                echo "<script>window.history.back();</script>";
                exit;
            }
        }

        $insertPanelistQuery = "INSERT INTO `panelist` (panelID, professorID, panelRole) VALUES ";
        for ($i = 0; $i < count($panelRoles); $i++) {
            if ($i > 0) $insertPanelistQuery .= ",";
            $insertPanelistQuery .= "('$newPanelId', '$panelIds[$i]', '$panelRoles[$i]')";
        }

        $insertPanelistResult = mysqli_query($conn, $insertPanelistQuery);

        // Check if the panelist insert query was successful
        if ($insertPanelistResult) {
            echo "<script>alert('Data inserted successfully in `group` and `panelist` tables.');</script>";
            // Stay on the same page
            echo "<script>window.history.back();</script>";
        } else {
            echo "<script>alert('Error inserting data in `panelist` table: " . mysqli_error($conn) . "');</script>";
            // Stay on the same page
            echo "<script>window.history.back();</script>";
        }
    } else {
        echo "<script>alert('Error inserting data in `group` table: " . mysqli_error($conn) . "');</script>";
        // Stay on the same page
        echo "<script>window.history.back();</script>";
    }
} else {
    // Alert the user about incorrect access
    echo "<script>alert('Invalid access.');</script>";
    // Stay on the same page
    echo "<script>window.history.back();</script>";
}
?>
