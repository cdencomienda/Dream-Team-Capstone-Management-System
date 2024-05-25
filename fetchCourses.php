<?php
session_start();

header('Content-Type: application/json'); // Set the header to indicate JSON response

if (isset($_SESSION['account_id'], $_SESSION['acy_id'])) {
    $account_id = $_SESSION['account_id'];
    $acy_id = $_SESSION['acy_id'];
    
    $conn = mysqli_connect('localhost', 'root', '', 'soe_assessment');

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $courses_data = array(); // Initialize an array to store course data

    // Fetch course data based on acy_id, account_id
    $query = "SELECT course_id, course_code, term FROM course WHERE acy_id = $acy_id AND professor = '$account_id'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $courses_data[] = array(
                "course_id" => $row["course_id"],
                "course_code" => $row["course_code"],
                "term" => $row["term"]
            );
        }
        echo json_encode($courses_data); // Output the array as JSON
    } else {
        echo json_encode(["error" => "No courses found for the given acy_id and account_id."]);
    }

    $conn->close();
} else {
    echo json_encode(["error" => "Account ID or acy_id is not set in the session."]);
}
?>
