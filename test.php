<?php
session_start();
$conn = new mysqli('localhost', 'root', '', 'dreamteam');
$groupID = $_SESSION['student_group_id'];

$validatedData = [];

$sql = "SELECT panelRole, validatedComments FROM feedback WHERE groupID = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $groupID);
$stmt->execute();
$result = $stmt->get_result();

while ($row = $result->fetch_assoc()) {
    $validatedData[$row['panelRole']] = explode('~', $row['validatedComments']);
}

$stmt->close();
$conn->close();

echo json_encode($validatedData);
?>
