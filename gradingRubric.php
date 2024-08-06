<?php
session_start(); // Start or resume the session

// Ensure the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if student_group_id is in session
    if (!isset($_SESSION['student_group_id'])) {
        http_response_code(400);
        echo json_encode(['error' => 'student_group_id not found in session']);
        exit();
    }

    // Retrieve groupIDDefense from session
    $groupIDDefense = $_SESSION['student_group_id'];

    // Get the raw POST data
    $json = file_get_contents('php://input');
    $defenseResults = json_decode($json, true);

    // Check if data is properly decoded
    if ($defenseResults === null) {
        http_response_code(400);
        echo json_encode(['error' => 'Invalid JSON']);
        exit();
    }

    // Prepare data for database insertion
    $criteria = '';
    $weightedGrade = '';
    $remarkType = '';
    $remarks = '';

    // Extract criteria and weightedGrade from defenseResults
    if (isset($defenseResults['selectedOptions']) && is_array($defenseResults['selectedOptions'])) {
        $criteriaNames = [];
        $selectedPercentages = [];
        foreach ($defenseResults['selectedOptions'] as $index => $option) {
            if (isset($option['criteriaName']) && is_array($option['criteriaName'])) {
                $criteriaNames[] = implode('~', $option['criteriaName']);
            }
            if (isset($option['selectedPercentage'])) {
                $selectedPercentages[] = $option['selectedPercentage'];
            }
        }
        $criteria = implode('~', $criteriaNames);
        $weightedGrade = implode('~', $selectedPercentages);
    }

    // Extract remarkType and remarks from feedbackList
    if (isset($defenseResults['feedbackList']) && is_array($defenseResults['feedbackList'])) {
        $feedbackTypes = [];
        $feedbackTexts = [];
        foreach ($defenseResults['feedbackList'] as $index => $feedback) {
            if (isset($feedback['type'])) {
                $feedbackTypes[] = $feedback['type'];
            }
            if (isset($feedback['text'])) {
                $feedbackTexts[] = $feedback['text'];
            }
        }
        $remarkType = implode('~', $feedbackTypes);
        $remarks = implode('~', $feedbackTexts);
    }

    // Database insertion query
    $conn = new mysqli('localhost', 'root', '', 'dreamteam');

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare data for insertion
    $uploaderID = $_SESSION['user_id']; // Assuming user_id is stored in session
    $groupID = $groupIDDefense;

    // Insert into assessment table
    $sql = "INSERT INTO assessment (uploaderID, groupID, criteria, weightedGrade, remarkType, remarks)
            VALUES ('$uploaderID', '$groupID', '$criteria', '$weightedGrade', '$remarkType', '$remarks')";

    if ($conn->query($sql) === TRUE) {
        // Success response
        $response = [
            'message' => 'Data inserted successfully'
        ];
        echo json_encode($response);
    } else {
        // Error response
        http_response_code(500); // Internal Server Error
        echo json_encode(['error' => 'Error inserting data into database']);
    }

    $conn->close();
} else {
    // Send a 405 Method Not Allowed response if the request method is not POST
    http_response_code(405);
    echo json_encode(['error' => 'Method not allowed']);
}
?>