<?php
// Connect to the database
$conn = mysqli_connect('localhost', 'root', '', 'dreamteam');

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if userId is set and not empty
    if (isset($_POST['userId']) && !empty($_POST['userId'])) {
        $userId = $_POST['userId'];

        // Check if userType is set (for edit operation)
        if (isset($_POST['userType'])) {
            $userType = $_POST['userType'];

            // Prepare an update statement
            $sql = "UPDATE users SET userType = ? WHERE userID = ?";

            if ($stmt = $conn->prepare($sql)) {
                // Bind variables to the prepared statement as parameters
                $stmt->bind_param("ss", $userType, $userId);

                // Attempt to execute the prepared statement
                if ($stmt->execute()) {
                    // Update successful
                    echo "User updated successfully.";
                } else {
                    // Error handling for execution
                    echo "Error: " . $stmt->error;
                }

                // Close statement
                $stmt->close();
            } else {
                // Error handling for prepared statement
                echo "Error: " . $conn->error;
            }
        } else {
            // No userType provided, assume delete operation

            // Prepare a delete statement
            $sql = "DELETE FROM users WHERE userID = ?";

            if ($stmt = $conn->prepare($sql)) {
                // Bind variables to the prepared statement as parameters
                $stmt->bind_param("s", $userId);

                // Attempt to execute the prepared statement
                if ($stmt->execute()) {
                    // Deletion successful
                    echo "User deleted successfully.";
                } else {
                    // Error handling for execution
                    echo "Error: " . $stmt->error;
                }

                // Close statement
                $stmt->close();
            } else {
                // Error handling for prepared statement
                echo "Error: " . $conn->error;
            }
        }
    } else {
        // Error handling for missing or empty userId
        echo "User ID not provided.";
    }
}

// Close the connection
$conn->close();
?>
