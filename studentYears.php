<?php
session_start();

// Check if user_id is set in session
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    // Database connection
    $conn = mysqli_connect('localhost', 'root', '', 'soe_assessment');

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Prepare the SQL query to select course_id based on the user_id
    $sql = "SELECT course_id FROM students WHERE student_id = ?";

    // Prepare the statement
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        // Bind the user_id parameter to the statement as a string
        mysqli_stmt_bind_param($stmt, "s", $user_id);

        // Execute the statement
        mysqli_stmt_execute($stmt);

        // Get the result
        $result = mysqli_stmt_get_result($stmt);

        $acy_ids = array();

        // Check if there are any results
        if (mysqli_num_rows($result) > 0) {
            // Fetch each course_id
            while ($row = mysqli_fetch_assoc($result)) {
                $course_id = $row['course_id'];

                // Prepare the SQL query to select acy_id based on the course_id
                $sql2 = "SELECT acy_id FROM course WHERE course_id = ?";

                // Prepare the statement
                $stmt2 = mysqli_prepare($conn, $sql2);

                if ($stmt2) {
                    // Bind the course_id parameter to the statement as an integer
                    mysqli_stmt_bind_param($stmt2, "i", $course_id);

                    // Execute the statement
                    mysqli_stmt_execute($stmt2);

                    // Get the result
                    $result2 = mysqli_stmt_get_result($stmt2);

                    // Check if there are any results
                    if (mysqli_num_rows($result2) > 0) {
                        // Fetch each acy_id and store it in the array
                        while ($row2 = mysqli_fetch_assoc($result2)) {
                            if (!empty($row2['acy_id'])) {
                                $acy_ids[] = $row2['acy_id'];
                            }
                        }
                    }

                    // Close the second statement
                    mysqli_stmt_close($stmt2);
                } else {
                    echo json_encode(["error" => "Failed to prepare the second SQL statement."]);
                    exit;
                }
            }
        } else {
            echo json_encode(["error" => "No courses found for this user."]);
            exit;
        }

        // Close the first statement
        mysqli_stmt_close($stmt);

        // Initialize response array
        $response = array();

        // If there are any acy_ids, fetch the distinct academic years
        if (!empty($acy_ids)) {
            // Convert the acy_ids array to a comma-separated string
            $acy_ids_str = implode(",", array_unique($acy_ids));

            // Prepare the SQL query to select distinct academic_year based on the acy_ids
            $sql3 = "SELECT acy_id, academic_year FROM academic_year WHERE acy_id IN ($acy_ids_str)";

            // Execute the query
            $result3 = mysqli_query($conn, $sql3);

            // Check if there are any results
            if (mysqli_num_rows($result3) > 0) {
                // Initialize a temporary array to group academic years by acy_id
                $temp = array();

                // Fetch and group each academic year by acy_id
                while ($row3 = mysqli_fetch_assoc($result3)) {
                    $acy_id = (int)$row3['acy_id'];
                    $academic_year = (int)$row3['academic_year'];
                    if (!isset($temp[$acy_id])) {
                        $temp[$acy_id] = array();
                    }
                    $temp[$acy_id][] = $academic_year;
                }

                // Construct the response array
                foreach ($temp as $acy_id => $academic_years) {
                    $response[] = array(
                        'acy_id' => $acy_id,
                        'academic_years' => $academic_years
                    );
                }
            } else {
                echo json_encode(["error" => "No academic years found."]);
                exit;
            }

            // Free the result
            mysqli_free_result($result3);
        } else {
            echo json_encode(["error" => "No acy_ids found."]);
            exit;
        }

        // Send the JSON response
        echo json_encode($response);

    } else {
        echo json_encode(["error" => "Failed to prepare the first SQL statement."]);
    }

    // Close the database connection
    mysqli_close($conn);
} else {
    echo json_encode(["error" => "User ID not found in session."]);
}
?>
