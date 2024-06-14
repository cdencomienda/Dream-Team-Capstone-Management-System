<?php
session_start();

// Check if course_id is set in the session
if (isset($_SESSION['course_id'])) {
    $course_id = $_SESSION['course_id'];

    // Connect to the 'dreamteam' database
    $conn = mysqli_connect('localhost', 'root', '', 'dreamteam');

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Prepare the SQL statement to get rubricID and rubricName
    $rubrics_query = "SELECT rubricsID, rubricName FROM rubrics WHERE courseID = ?";
    $rubrics_stmt = $conn->prepare($rubrics_query);

    // Bind the course_id parameter to the SQL statement
    $rubrics_stmt->bind_param("i", $course_id);

    // Execute the statement to get rubricID and rubricName
    $rubrics_stmt->execute();

    // Get the result
    $rubrics_result = $rubrics_stmt->get_result();

    // Initialize variables to hold rubricID and rubricName
    $rubricID = null;
    $rubricName = null;

    // Check if there is a result
    if ($rubrics_result->num_rows > 0) {
        // Fetch rubricID and rubricName
        $rubrics_row = $rubrics_result->fetch_assoc();
        $rubricID = $rubrics_row['rubricsID'];
        $rubricName = $rubrics_row['rubricName'];
    }

    // Close the rubrics statement
    $rubrics_stmt->close();

    // Close the dreamteam connection
    $conn->close();

    // Connect to the 'soe_assessment' database
    $conn = mysqli_connect('localhost', 'root', '', 'soe_assessment');

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Prepare the SQL statement to get rubrics data
    $sql = "SELECT level_details, level_percentage FROM rubrics WHERE course_id = ? AND rubrics_id = ? AND rubric_name = ?";
    $stmt = $conn->prepare($sql);

    // Bind the course_id, rubricID, and rubricName parameters to the SQL statement
    $stmt->bind_param("iis", $course_id, $rubricID, $rubricName);

    // Execute the statement
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();

    // Initialize an array to hold the data
    $rubrics = [];

    // Check if there are any rows
    if ($result->num_rows > 0) {
        // Output the data for each row
        while ($row = $result->fetch_assoc()) {
            // Split the level_details and level_percentage by '~'
            $levelDetails = explode('~', $row['level_details']);
            $levelPercentages = explode('~', $row['level_percentage']);

            // Add the data to the array
            $rubrics[] = [
                'rubrics_id' => $rubricID,
                'rubric_name' => $rubricName,
                'level_details' => $levelDetails,
                'level_percentage' => $levelPercentages
            ];

            // Fetch criteria_name, criteria_details, and rubric_percentage from rubric_table based on rubrics_id
            $criteria_query = "SELECT rubric_percentage, criteria_name, criteria_details FROM rubric_table WHERE rubrics_id = ?";
            $criteria_stmt = $conn->prepare($criteria_query);
            $criteria_stmt->bind_param("i", $rubricID);
            $criteria_stmt->execute();
            $criteria_result = $criteria_stmt->get_result();

            // Initialize an array to hold criteria data
            $criteria_data = [];

            // Check if there are any rows
            if ($criteria_result->num_rows > 0) {
                while ($criteria_row = $criteria_result->fetch_assoc()) {
                    // Split criteria_name and criteria_details by '~' delimiter
                    $criteriaName = explode('~', $criteria_row['criteria_name']);
                    $criteriaDetails = explode('~', $criteria_row['criteria_details']);

                    $criteria_data[] = [
                        'rubric_percentage' => $criteria_row['rubric_percentage'],
                        'criteria_name' => $criteriaName,
                        'criteria_details' => $criteriaDetails
                    ];
                }
            }

            // Add criteria data to the rubrics array
            $rubrics[count($rubrics) - 1]['criteria'] = $criteria_data;

            // Close the criteria statement
            $criteria_stmt->close();
        }
    }

    // Close the main statement and connection
    $stmt->close();
    $conn->close();

    // Output the data as JSON
    header('Content-Type: application/json');
    echo json_encode($rubrics);

} else {
    echo json_encode(['error' => 'Course ID is not set in the session.']);
}
?>
