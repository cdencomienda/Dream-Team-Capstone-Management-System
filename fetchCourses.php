<?php
session_start(); // Start the session

if (
    isset($_POST['acy_id']) &&
    isset($_POST['selectedTerm']) &&
    isset($_POST['account_id'])
) {
    $acy_id = $_POST['acy_id'];
    $selectedTerm = $_POST['selectedTerm'];
    $account_id = $_POST['account_id'];

    $conn = mysqli_connect('localhost', 'root', '', 'soe_assessment');

    if (!$conn) {
        $response = [
            'error' => 'Database connection failed.'
        ];
    } else {
        // Use prepared statement to prevent SQL injection
        $query = "SELECT course_code, section FROM your_courses_table WHERE acy_id = ? AND term = ? AND professor = ?";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "iii", $acy_id, $selectedTerm, $account_id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($result) {
            $courses = [];
            while ($row = mysqli_fetch_assoc($result)) {
                $courses[] = $row;
            }
            $response = $courses;
        } else {
            $response = [
                'error' => 'No courses found for the specified criteria.'
            ];
        }

        mysqli_stmt_close($stmt);
    }

    mysqli_close($conn);
} else {
    $response = [
        'error' => 'Missing parameters.'
    ];
}

header('Content-Type: application/json');
echo json_encode($response);
?>
