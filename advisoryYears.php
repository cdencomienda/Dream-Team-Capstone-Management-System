<?php
session_start();

// Check if user_id is set in session
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    // Database connection to 'dreamteam' database
    $conn_dreamteam = mysqli_connect('localhost', 'root', '', 'dreamteam');

    // Check connection to 'dreamteam' database
    if (!$conn_dreamteam) {
        die("Connection to 'dreamteam' database failed: " . mysqli_connect_error());
    }

    // Query to fetch courseID from 'group' table
    $query = "SELECT courseID FROM `group` WHERE adviserID = '$user_id'";
    $result = mysqli_query($conn_dreamteam, $query);

    if (mysqli_num_rows($result) > 0) {
        // Array to store courseIDs
        $courseIDs = array();

        // Fetch each courseID and store in array
        while ($row = mysqli_fetch_assoc($result)) {
            $courseIDs[] = $row['courseID'];
        }

        // Close connection to 'dreamteam' database
        mysqli_close($conn_dreamteam);

        // Database connection to 'soe_assessment' database
        $conn_soe_assessment = mysqli_connect('localhost', 'root', '', 'soe_assessment');

        // Check connection to 'soe_assessment' database
        if (!$conn_soe_assessment) {
            die("Connection to 'soe_assessment' database failed: " . mysqli_connect_error());
        }

        // Array to store response data
        $response = array();
        // Set to track unique academic years
        $uniqueAcademicYears = array();

        // Fetch academic years for each courseID
        foreach ($courseIDs as $courseID) {
            $query_academic_year = "SELECT DISTINCT acy_id FROM complete_course_view WHERE course_id = '$courseID'";
            $result_academic_year = mysqli_query($conn_soe_assessment, $query_academic_year);

            if (mysqli_num_rows($result_academic_year) > 0) {
                $row_academic_year = mysqli_fetch_assoc($result_academic_year);
                $acy_id = $row_academic_year['acy_id'];

                // Query to fetch academic years from 'academic_year' table
                $query_academic_years = "SELECT DISTINCT academic_year FROM complete_course_view WHERE acy_id = '$acy_id'";
                $result_academic_years = mysqli_query($conn_soe_assessment, $query_academic_years);

                // Check if query executed successfully
                if ($result_academic_years) {
                    // Fetch and store academic years
                    $academicYears = array();
                    while ($row_academic_years = mysqli_fetch_assoc($result_academic_years)) {
                        if (!in_array($row_academic_years['academic_year'], $uniqueAcademicYears)) {
                            $uniqueAcademicYears[] = $row_academic_years['academic_year'];
                            $academicYears[] = $row_academic_years['academic_year'];
                        }
                    }

                    // Add to response array if academic years are found
                    if (!empty($academicYears)) {
                        $response[] = array(
                            'acy_id' => $acy_id,
                            'academic_years' => $academicYears
                        );
                    }
                } else {
                    echo "Error fetching academic years: " . mysqli_error($conn_soe_assessment);
                }
            }
        }

        // Close connection to 'soe_assessment' database
        mysqli_close($conn_soe_assessment);

        // Output JSON response
        header('Content-Type: application/json');
        echo json_encode($response);
    } else {
        echo "No courses found for this adviser ID";
    }
} else {
    echo "User ID not found in session";
}
?>
