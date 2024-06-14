<?php
session_start();

// Check if course_id is set in the session
if (isset($_SESSION['course_id'])) {
    $course_id = $_SESSION['course_id'];

    $conn = mysqli_connect('localhost', 'root', '', 'soe_assessment');

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Prepare the SQL statement
    $sql = "SELECT rubrics_id, rubric_name, level_details, level_percentage FROM rubrics WHERE course_id = ?";
    $stmt = $conn->prepare($sql);

    // Bind the course_id parameter to the SQL statement
    $stmt->bind_param("i", $course_id);

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
                'rubrics_id' => $row['rubrics_id'],
                'rubric_name' => $row['rubric_name'],
                'level_details' => $levelDetails,
                'level_percentage' => $levelPercentages
            ];

            // Fetch criteria_name, criteria_details, and rubric_percentage from rubric_table based on rubrics_id
            $criteria_query = "SELECT rubric_percentage, criteria_name, criteria_details FROM rubric_table WHERE rubrics_id = ?";
            $criteria_stmt = $conn->prepare($criteria_query);
            $criteria_stmt->bind_param("i", $row['rubrics_id']);
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
