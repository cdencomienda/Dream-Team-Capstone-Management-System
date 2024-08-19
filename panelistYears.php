<?php
// Start session if it's not already started
session_start();

// Check if account_id is set in the session
if (isset($_SESSION['account_id'])) {
    // Account ID is set
    $accountId = $_SESSION['account_id'];
    
    // Database connections
    $conn_soe = mysqli_connect('localhost', 'root', '', 'soe_assessment');
    $conn_dreamteam = mysqli_connect('localhost', 'root', '', 'dreamteam');

    // Check connection to SOE Assessment database
    if (!$conn_soe) {
        die("Connection to SOE Assessment database failed: " . mysqli_connect_error());
    }

    // Check connection to DreamTeam database
    if (!$conn_dreamteam) {
        die("Connection to DreamTeam database failed: " . mysqli_connect_error());
    }

    // Variable to store academic year IDs
    $academicYearIds = [];

    // Assuming $userID is obtained from some prior logic, we proceed with fetching panelist information

    // SQL query to fetch panelist information based on userID
    $sql_panelist = "SELECT panelID, panelRole FROM panelist WHERE professorID = $accountId";
    $result_panelist = mysqli_query($conn_dreamteam, $sql_panelist);

    // Check if query executed successfully
    if ($result_panelist) {
        // Fetch panelist results
        while ($row_panelist = mysqli_fetch_assoc($result_panelist)) {
            // SQL query to fetch courseID from group table based on panelID
            $panelID = $row_panelist['panelID'];
            $sql_group = "SELECT courseID FROM `group` WHERE panelID = $panelID";
            $result_group = mysqli_query($conn_dreamteam, $sql_group);

            // Check if query executed successfully
            if ($result_group) {
                // Fetch courseID results
                while ($row_group = mysqli_fetch_assoc($result_group)) {
                    $courseID = $row_group['courseID'];

                    // SQL query to fetch distinct acy_id from SOE Assessment database
                    $sql_soe_course = "SELECT DISTINCT acy_id FROM complete_course_view WHERE course_id = $courseID";
                    $result_soe_course = mysqli_query($conn_soe, $sql_soe_course);

                    // Check if query executed successfully
                    if ($result_soe_course) {
                        // Fetch acy_id and store in array
                        while ($row_soe_course = mysqli_fetch_assoc($result_soe_course)) {
                            $acy_id = $row_soe_course['acy_id'];
                            if (!in_array($acy_id, $academicYearIds)) {
                                $academicYearIds[] = $acy_id;
                            }
                        }
                    } else {
                        echo "Error fetching acy_id: " . mysqli_error($conn_soe);
                    }
                }
            } else {
                echo "Error fetching courseIDs: " . mysqli_error($conn_dreamteam);
            }
        }
    } else {
        echo "Error fetching panelist information: " . mysqli_error($conn_dreamteam);
    }

    // Prepare JSON response
    $response = array();
    
    // Fetch academic years based on collected acy_ids
    if (!empty($academicYearIds)) {
        foreach ($academicYearIds as $acy_id) {
            // SQL query to fetch distinct academic years from academic_year table
            $sql_academic_year = "SELECT DISTINCT academic_year FROM complete_course_view WHERE acy_id = $acy_id";
            $result_academic_year = mysqli_query($conn_soe, $sql_academic_year);

            // Check if query executed successfully
            if ($result_academic_year) {
                // Fetch and store academic years
                $academicYears = array();
                while ($row_academic_year = mysqli_fetch_assoc($result_academic_year)) {
                    $academicYears[] = $row_academic_year['academic_year'];
                }
                
                // Add to response array
                $response[] = array(
                    'acy_id' => $acy_id,
                    'academic_years' => $academicYears
                );
            } else {
                echo "Error fetching academic years: " . mysqli_error($conn_soe);
            }
        }
    } else {
        echo "No academic years found.";
    }

    // Close connections
    mysqli_close($conn_soe);
    mysqli_close($conn_dreamteam);

    // Output JSON response
    header('Content-Type: application/json');
    echo json_encode($response);

} else {
    // Account ID is not set
    echo "Session variable 'account_id' is not set.";
}
?>
