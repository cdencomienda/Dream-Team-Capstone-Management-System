<?php
session_start();

// Connect to the database
$conn = mysqli_connect('localhost', 'root', '', 'soe_assessment');

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$response = array('match' => false, 'account_id' => null);

if (isset($_SESSION['fName']) && isset($_SESSION['lname'])) {
    $fName = $_SESSION['fName'];
    $lName = $_SESSION['lname'];

    // Prepare the SQL statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT account_id FROM account WHERE first_name = ? AND last_name = ?");
    $stmt->bind_param("ss", $fName, $lName);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['account_id'] = $row['account_id'];
        $response['match'] = true;
        $response['account_id'] = $row['account_id'];
    } else {
        $_SESSION['account_id'] = null; // Clear any existing account_id in session
    }
    
    $stmt->close();
}

mysqli_close($conn);

header('Content-Type: application/json');
echo json_encode($response);
?>
