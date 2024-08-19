<?php
session_start();

// Connect to the database
$conn = mysqli_connect('localhost', 'root', '', 'dreamteam');

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$response = array('match' => false, 'account_id' => null);

if (isset($_SESSION['fName']) && isset($_SESSION['lname'])) {
    $fName = $_SESSION['fName'];
    $lName = $_SESSION['lname'];

    // Prepare the SQL statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT userID FROM users WHERE firstName = ? AND lastName = ?");
    $stmt->bind_param("ss", $fName, $lName);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['account_id'] = $row['userID']; // Use 'userID' as it's returned by the query
        $response['match'] = true;
        $response['account_id'] = $row['userID']; // Use 'userID' in the response array as well
    } else {
        $_SESSION['account_id'] = null; // Clear any existing account_id in session
    }
    
    $stmt->close();
}

mysqli_close($conn);

header('Content-Type: application/json');
echo json_encode($response);
?>
