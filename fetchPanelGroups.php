<?php
// Start the session
session_start();

// Database connection
$conn = new mysqli('localhost', 'root', '', 'dreamteam');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if group_name and student_group_id are set in the session
if (isset($_SESSION['group_name']) && isset($_SESSION['student_group_id'])) {
    // Get the group_name and student_group_id from the session
    $group_name = $_SESSION['group_name'];
    $student_group_id = $_SESSION['student_group_id'];

    // Prepare and execute the query to get the panelID
    $stmt = $conn->prepare("SELECT panelID FROM `group` WHERE groupName = ? AND requirementsID = ?");
    $stmt->bind_param("si", $group_name, $student_group_id);
    $stmt->execute();
    $stmt->bind_result($panelID);

    // Fetch the result
    if ($stmt->fetch()) {
        // Prepare and execute the query to get professorID and panelRole from panelist table
        $stmt->close();
        $stmt = $conn->prepare("SELECT professorID, panelRole FROM `panelist` WHERE panelID = ?");
        $stmt->bind_param("i", $panelID);
        $stmt->execute();
        $stmt->bind_result($professorID, $panelRole);

        // Fetch all results into an array
        $panelists = array();
        while ($stmt->fetch()) {
            $panelists[] = array(
                "professorID" => $professorID,
                "panelRole" => $panelRole
            );
        }

        // Close the statement
        $stmt->close();

        // Prepare and execute the query to get firstName and lastName from users table
        foreach ($panelists as &$panelist) {
            $stmt = $conn->prepare("SELECT firstName, lastName FROM `users` WHERE userID = ?");
            $stmt->bind_param("i", $panelist['professorID']);
            $stmt->execute();
            $stmt->bind_result($firstName, $lastName);

            // Fetch the result
            if ($stmt->fetch()) {
                $panelist['firstName'] = $firstName;
                $panelist['lastName'] = $lastName;
            } else {
                // If no user found, set placeholders
                $panelist['firstName'] = 'Unknown';
                $panelist['lastName'] = 'User';
            }

            // Close the statement for each iteration
            $stmt->close();
        }

        // Encode panelists array as JSON
        $panelists_json = json_encode($panelists);

        // Output JSON data
        header('Content-Type: application/json');
        echo $panelists_json;
    } else {
        // No matching group found
        echo json_encode(array("error" => "Panelists are not set."));
    }
} else {
    // If group_name or student_group_id is not set, echo an appropriate message
    echo json_encode(array("error" => "Group name or student group ID is not set in the session."));
}

// Close the connection
$conn->close();
?>
