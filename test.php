<?php
session_start();

// Check if user_id, student_group_id, and course_id are set in the session
if (isset($_SESSION['user_id'], $_SESSION['student_group_id'], $_SESSION['course_id'])) {
    // Session variables exist
    $userId = $_SESSION['user_id'];
    $studentGroupId = $_SESSION['student_group_id'];
    $courseId = $_SESSION['course_id'];

    // Display session variables
    echo "User ID: $userId<br>";
    echo "Student Group ID: $studentGroupId<br>";
    echo "Course ID: $courseId<br>";

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

    // Check if there are results from the first query
    if ($result->num_rows > 0) {
        // Iterate through each professorID and fetch the latest assessment data
        while ($row = $result->fetch_assoc()) {
            $professorID = $row['professorID'];
            $panelRole = $row['panelRole'];

            echo "Professor ID: $professorID<br>";
            echo "Panel Role: $panelRole<br>";

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

                // Output exploded data
                echo "Criteria:<br>";
                foreach ($criteriaArray as $criteria) {
                    echo "- $criteria<br>";
                }
                echo "<br>";

                echo "Weighted Grade:<br>";
                foreach ($weightedGradeArray as $weightedGrade) {
                    echo "- $weightedGrade<br>";
                }
                echo "<br>";

                echo "Remark Type:<br>";
                foreach ($remarkTypeArray as $remarkType) {
                    echo "- $remarkType<br>";
                }
                echo "<br>";

                echo "Remarks:<br>";
                foreach ($remarksArray as $remarks) {
                    echo "- $remarks<br>";
                }
                echo "<br>";
            } else {
                echo "No assessment data found for Professor ID: $professorID and Student Group ID: $studentGroupId<br>";
            }

            // Close the second prepared statement
            $stmt2->close();
        }
    } else {
        echo "No panels found for Student Group ID: $studentGroupId and Course ID: $courseId";
    }

    // Close the first prepared statement and database connection
    $stmt->close();
    $conn->close();
} else {
    // If any session variable is not set, handle the error or redirect
    echo "Session variables not set.";
}
?>
