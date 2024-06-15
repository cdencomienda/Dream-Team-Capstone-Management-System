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

    // Fetch the last panelID from the group table
    $lastPanelIdQuery = "SELECT MAX(panelID) as maxPanelId FROM `group`";
    $lastPanelIdResult = mysqli_query($conn, $lastPanelIdQuery);
    $lastPanelIdRow = mysqli_fetch_assoc($lastPanelIdResult);
    $lastPanelId = $lastPanelIdRow['maxPanelId'];

    // Set newPanelId to 1 if lastPanelId is null
    $newPanelId = ($lastPanelId === null) ? 1 : $lastPanelId + 1;

    // Collect adviser data and escape string values
    $adviserName = mysqli_real_escape_string($conn, $_POST['adviserName']);
    $adviserId = mysqli_real_escape_string($conn, $_POST['adviserId']);

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
