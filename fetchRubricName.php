<?php
// process_form.php

$conn = mysqli_connect('localhost', 'root', '', 'dreamteam');


// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to fetch all rubricName values
$sql = "SELECT rubricName FROM rubrics";
$result = $conn->query($sql);

$rubricNames = array();

if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        $rubricNames[] = $row["rubricName"];
    }
}

// Close connection
$conn->close();

// Return rubric names as JSON
header('Content-Type: application/json');
echo json_encode($rubricNames);
?>

