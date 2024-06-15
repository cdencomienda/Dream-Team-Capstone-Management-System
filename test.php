<?php
// Start the session
session_start();

// Check if the form is submitted via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collect group data
    $groupName = $_POST['courseGroupName'] ?? 'N/A';
    $groupId = $_POST['courseGroupId'] ?? 'N/A';

    // Collect panel data
    $chairPanelistName = $_POST['chairpanelistName'] ?? 'N/A';
    $chairPanelistId = $_POST['chairpanelistId'] ?? 'N/A';

    $leadPanelistName = $_POST['leadPanelistName'] ?? 'N/A';
    $leadPanelistId = $_POST['leadPanelistId'] ?? 'N/A';

    $panelist1Name = $_POST['panelist1Name'] ?? 'N/A';
    $panelist1Id = $_POST['panelist1Id'] ?? 'N/A';

    $panelist2Name = $_POST['panelist2Name'] ?? 'N/A';
    $panelist2Id = $_POST['panelist2Id'] ?? 'N/A';

    $adviserName = $_POST['adviserName'] ?? 'N/A';
    $adviserId = $_POST['adviserId'] ?? 'N/A';

    // Connect to the dreamteam database
    $conn = new mysqli('localhost', 'root', '', 'dreamteam');

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get last panelID + 1
    $lastPanelIdQuery = "SELECT MAX(panelID) as maxPanelId FROM `group`";
    $lastPanelIdResult = $conn->query($lastPanelIdQuery);
    $lastPanelId = 1; // Default value if no records are found
    if ($lastPanelIdResult->num_rows > 0) {
        $row = $lastPanelIdResult->fetch_assoc();
        $lastPanelId = intval($row['maxPanelId']) + 1;
    }

    // Prepare and bind the insert statement
    $insertQuery = $conn->prepare("INSERT INTO `group` (groupName, groupID, courseID, panelID, adviserID) VALUES (?, ?, ?, ?, ?)");
    $insertQuery->bind_param("ssssi", $groupName, $groupId, $_SESSION['course_id'], $lastPanelId, $adviserId);

    // Execute the insert statement
    if ($insertQuery->execute()) {
        echo "New record created successfully in group table.";
    } else {
        echo "Error: " . $insertQuery->error;
    }

    // Close the statement and connection
    $insertQuery->close();
    $conn->close();
} else {
    echo "No data submitted.";
}
?>
