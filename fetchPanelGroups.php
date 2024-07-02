<?php
// Start the session
session_start();

// Database connection
$conn = new mysqli('localhost', 'root', '', 'dreamteam');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if group_name is set in the session
if (isset($_SESSION['group_name'])) {
    // Get the group_name from the session
    $group_name = $_SESSION['group_name'];

    // Prepare and execute the query to get the panelID
    $stmt = $conn->prepare("SELECT panelID FROM `group` WHERE groupName = ?");
    $stmt->bind_param("s", $group_name);
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
    // If group_name is not set, echo an appropriate message
    echo json_encode(array("error" => "Group name is not set in the session."));
}

// Close the connection
$conn->close();
?>
