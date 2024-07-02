<?php

// Start the session
session_start();

// Database connection details
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "your_database";

// Check if group_id is set in session
if (!isset($_SESSION['group_id'])) {
    die("Group ID not found in session.");
}

$group_id = $_SESSION['group_id'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Query to get group name based on group_id
$sql_group_name = "SELECT group_name FROM groups WHERE group_id = ?";
$stmt_group_name = $conn->prepare($sql_group_name);
$stmt_group_name->bind_param("i", $group_id);
$stmt_group_name->execute();
$result_group_name = $stmt_group_name->get_result();

if ($result_group_name->num_rows > 0) {
  $row_group_name = $result_group_name->fetch_assoc();
  $group_name = $row_group_name['group_name'];

  // Query to get requirements based on group_id
  $sql_requirements = "SELECT reqName, reqDescription FROM requirements WHERE requirementsID = ?";
  $stmt_requirements = $conn->prepare($sql_requirements);
  $stmt_requirements->bind_param("i", $group_id);
  $stmt_requirements->execute();
  $result_requirements = $stmt_requirements->get_result();

  if ($result_requirements->num_rows > 0) {
    while ($row_requirements = $result_requirements->fetch_assoc()) {
      $reqName = $row_requirements['reqName'];
      $reqDescription = $row_requirements['reqDescription'];

      // Output or process your data here
      echo "Requirement Name: " . $reqName . "<br>";
      echo "Requirement Description: " . $reqDescription . "<br>";
      echo "<hr>";
    }
  } else {
    echo "No requirements found for group ID: " . $group_id . "<br>";
  }

  $stmt_requirements->close();
} else {
  echo "No group found for group ID: " . $group_id . "<br>";
}

$stmt_group_name->close();
$conn->close();

?>
