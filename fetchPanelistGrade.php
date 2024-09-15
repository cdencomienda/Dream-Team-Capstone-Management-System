<?php
session_start();

// Check if user_id, student_group_id, and course_id are set in the session
if (isset($_SESSION['user_id'], $_SESSION['student_group_id'], $_SESSION['course_id'])) {
    // Session variables exist
    $userId = $_SESSION['user_id'];
    $studentGroupId = $_SESSION['student_group_id'];
    $courseId = $_SESSION['course_id'];

    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'dreamteam');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and execute the query to get panelRole and professorID, ordering by panelRole
    $stmt = $conn->prepare("
        SELECT p.panelRole, p.professorID
        FROM panelist p
        JOIN `group` g ON p.panelID = g.panelID
        WHERE g.requirementsID = ? AND g.courseID = ?
        ORDER BY p.panelRole, p.professorID
    ");
    $stmt->bind_param("ii", $studentGroupId, $courseId);
    $stmt->execute();
    $result = $stmt->get_result();

    $professorsData = array();

    // Check if there are results from the first query
    if ($result->num_rows > 0) {
        // Iterate through each professorID and fetch the latest assessment data
        while ($row = $result->fetch_assoc()) {
            $professorID = $row['professorID'];
            $panelRole = $row['panelRole'];

            // Fetch firstName and lastName from the users table using professorID
            $stmt3 = $conn->prepare("SELECT firstName, lastName FROM users WHERE userID = ?");
            $stmt3->bind_param("i", $professorID);
            $stmt3->execute();
            $result3 = $stmt3->get_result();

            if ($result3->num_rows > 0) {
                $row3 = $result3->fetch_assoc();
                $panelName = $row3['firstName'] . ' ' . $row3['lastName'];
            } else {
                $panelName = "Unknown Panelist";
            }

            // Prepare and execute the query to get the latest assessment entry for this professorID
            $stmt2 = $conn->prepare("
                SELECT criteria, weightedGrade, remarkType, remarks
                FROM assessment
                WHERE uploaderID = ? AND groupID = ?
                ORDER BY assessmentID DESC
                LIMIT 1
            ");
            $stmt2->bind_param("ii", $professorID, $studentGroupId);
            $stmt2->execute();
            $result2 = $stmt2->get_result();

            // Check if there is a result
            if ($result2->num_rows > 0) {
                // Fetch and explode assessment data
                $row2 = $result2->fetch_assoc();

                // Explode each field by '~'
                $criteriaArray = explode('~', $row2['criteria']);
                $weightedGradeArray = explode('~', $row2['weightedGrade']);
                $remarkTypeArray = explode('~', $row2['remarkType']);
                $remarksArray = explode('~', $row2['remarks']);

                // Calculate average weighted grade
                $totalWeightedGrade = 0;
                foreach ($weightedGradeArray as $weightedGrade) {
                    $totalWeightedGrade += (float) $weightedGrade; // Summing up weighted grades
                }
                $averageWeightedGrade = $totalWeightedGrade / count($weightedGradeArray); // Calculating average

                // Prepare data for JSON output
                $professorData = array(
                    'professorID' => $professorID,
                    'panelRole' => $panelRole,
                    'panelName' => $panelName, // Adding panelist name
                    'criteria' => $criteriaArray,
                    'weightedGrade' => $weightedGradeArray,
                    'remarkType' => $remarkTypeArray,
                    'remarks' => $remarksArray,
                    'averageWeightedGrade' => number_format($averageWeightedGrade, 2) . "%"
                );

                // Add professor data to the main array
                $professorsData[] = $professorData;
            }

            // Close the second prepared statement
            $stmt2->close();
        }
    } else {
        echo json_encode(array('error' => "No panels found for Student Group ID: $studentGroupId and Course ID: $courseId"));
        exit;
    }

    // Close the first prepared statement and database connection
    $stmt->close();
    $conn->close();

    // Calculate overall average if professors were found
    if (!empty($professorsData)) {
        $totalAverage = array_sum(array_column($professorsData, 'averageWeightedGrade')) / count($professorsData);
        $overallAverage = number_format($totalAverage, 2) . "%";

        // Add overall average to the response array
        $response = array(
            'professorsData' => $professorsData,
            'overallAverage' => $overallAverage
        );

        // Encode response as JSON and output
        echo json_encode($response);
    } else {
        echo json_encode(array('error' => "No assessment data found for professors."));
    }
} else {
    // If any session variable is not set, handle the error or redirect
    echo json_encode(array('error' => "Session variables not set."));
}
?>
