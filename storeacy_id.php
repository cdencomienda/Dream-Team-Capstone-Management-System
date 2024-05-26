<?php
session_start(); // Start the session

if (isset($_POST['acYear'])) {
    $acYear = $_POST['acYear'];

    $conn = mysqli_connect('localhost', 'root', '', 'soe_assessment');
    // Check the connection
    if (!$conn) {
        $response = [
            'status' => 'error',
            'message' => 'Database connection failed.',
        ];
    } else {
        // Use prepared statement to prevent SQL injection
        $query = "SELECT acy_id FROM `academic_year` WHERE academic_year = ?";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "s", $acYear);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $acy_id = $row['acy_id'];

            // Store acy_id in session
            $_SESSION['acy_id'] = $acy_id; 

            // Construct a JSON response with acy_id
            $response = [
                'status' => 'success',
                'acy_id' => $acy_id,
            ];
        } else {
            // Handle case where no matching acYear is found
            $response = [
                'status' => 'error',
                'message' => 'No matching acYear found.',
            ];
        }
        // Close the statement
        mysqli_stmt_close($stmt);
    }
    // Close the connection
    mysqli_close($conn);

    // Send the JSON response
    header('Content-Type: application/json');
    echo json_encode($response);
} else {
    // Handle case where acYear is not received
    $response = [
        'status' => 'error',
        'message' => 'acYear not received.',
    ];

    // Send the JSON error response
    header('Content-Type: application/json');
    echo json_encode($response);
}
?>
