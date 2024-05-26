<?php
session_start();

header('Content-Type: application/json'); // Set the header to indicate JSON response

if (isset($_SESSION['account_id'])) {
    $account_id = $_SESSION['account_id'];
    
    $conn = mysqli_connect('localhost', 'root', '', 'soe_assessment');

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $acy_years = array(); // Initialize an array to store academic years

    // Fetch distinct acy_id from course table
    $query = "SELECT DISTINCT acy_id FROM course WHERE professor = '$account_id'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $acy_id = $row["acy_id"];
            // Fetch academic year based on acy_id from academic_year table
            $acy_query = "SELECT DISTINCT academic_year FROM academic_year WHERE acy_id = $acy_id";
            $acy_result = $conn->query($acy_query);
            if ($acy_result->num_rows > 0) {
                while ($acy_row = $acy_result->fetch_assoc()) {
                    $acy_years[] = $acy_row["academic_year"];
                }
            }
        }
        $_SESSION['academic_years'] = $acy_years; // Store academic years in session
        echo json_encode($acy_years); // Output the array as JSON
    } else {
        echo json_encode(["error" => "No acy_id found for the given account_id."]);
    }

    $conn->close();
} else {
    echo json_encode(["error" => "Account ID is not set in the session."]);
}
?>
