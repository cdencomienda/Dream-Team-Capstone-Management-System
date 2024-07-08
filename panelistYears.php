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

    // SQL query to fetch first_name and last_name from SOE Assessment database
    $sql_soe = "SELECT first_name, last_name FROM account WHERE account_id = $accountId";
    $result_soe = mysqli_query($conn_soe, $sql_soe);

    // Check if query executed successfully
    if ($result_soe) {
        // Fetch data
        if (mysqli_num_rows($result_soe) > 0) {
            $row_soe = mysqli_fetch_assoc($result_soe);
            $firstName = $row_soe['first_name'];
            $lastName = $row_soe['last_name'];

            // SQL query to fetch userID from DreamTeam database
            $sql_dreamteam = "SELECT userID FROM users WHERE firstName = ? AND lastName = ?";
            $stmt = mysqli_stmt_init($conn_dreamteam);
            
            // Prepare statement
            if (mysqli_stmt_prepare($stmt, $sql_dreamteam)) {
                // Bind parameters
                mysqli_stmt_bind_param($stmt, "ss", $firstName, $lastName);
                
                // Execute statement
                mysqli_stmt_execute($stmt);
                
                // Bind result variables
                mysqli_stmt_bind_result($stmt, $userID);
                
                // Fetch values
                mysqli_stmt_fetch($stmt);
                
                // Close statement
                mysqli_stmt_close($stmt);

                // SQL query to fetch panelist information based on userID
                $sql_panelist = "SELECT panelID, panelRole FROM panelist WHERE professorID = $userID";
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
                                $sql_soe_course = "SELECT DISTINCT acy_id FROM course WHERE course_id = $courseID";
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

            } else {
                echo "Error preparing statement: " . mysqli_error($conn_dreamteam);
            }
        } else {
            echo "No records found in SOE Assessment database.";
        }
    } else {
        echo "Error: " . mysqli_error($conn_soe);
    }

    // Prepare JSON response
    $response = array();
    
    // Fetch academic years based on collected acy_ids
    if (!empty($academicYearIds)) {
        foreach ($academicYearIds as $acy_id) {
            // SQL query to fetch distinct academic years from academic_year table
            $sql_academic_year = "SELECT DISTINCT academic_year FROM academic_year WHERE acy_id = $acy_id";
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
