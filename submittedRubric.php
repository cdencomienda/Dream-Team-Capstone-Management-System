<?php
session_start();

// Database connection details
$conn = mysqli_connect('localhost', 'root', '', 'dreamteam');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the submitted rubric name and ID
    $rubric = isset($_POST['rubric']) ? htmlspecialchars($_POST['rubric']) : '';
    $rubric_id = isset($_POST['rubric_id']) ? htmlspecialchars($_POST['rubric_id']) : '';

    // Retrieve the course ID from the session
    $course_id = isset($_SESSION['course_id']) ? $_SESSION['course_id'] : '';

    // Check if rubricsID is 0 or null
    if ($rubric_id === '' || $rubric_id === '0') {
        echo "<script>alert('There is no Rubrics from the Server.');</script>";
        // Stay on the same page
        echo "<script>window.history.back();</script>";
    } else {
        // Check if a record with the same course ID exists in the rubrics table
        $check_sql = "SELECT * FROM rubrics WHERE courseID = ?";
        $check_stmt = $conn->prepare($check_sql);
        $check_stmt->bind_param("i", $course_id);
        $check_stmt->execute();
        $result = $check_stmt->get_result();

        if ($result->num_rows > 0) {
            // Update the existing record with the new rubric name and ID
            $update_sql = "UPDATE rubrics SET rubricName = ?, rubricsID = ? WHERE courseID = ?";
            $update_stmt = $conn->prepare($update_sql);
            $update_stmt->bind_param("sii", $rubric, $rubric_id, $course_id);

            if ($update_stmt->execute()) {
                echo "<script>alert('Rubric data updated successfully.');</script>";
                // Stay on the same page
                echo "<script>window.history.back();</script>";
            } else {
                echo "<script>alert('Error updating rubric data: " . $update_stmt->error . "');</script>";
                // Stay on the same page
                echo "<script>window.history.back();</script>";
            }

            $update_stmt->close();
        } else {
            // Insert a new record into the rubrics table
            $insert_sql = "INSERT INTO rubrics (rubricsID, rubricName, courseID) VALUES (?, ?, ?)";
            $insert_stmt = $conn->prepare($insert_sql);
            $insert_stmt->bind_param("isi", $rubric_id, $rubric, $course_id);

            if ($insert_stmt->execute()) {
                echo "<script>alert('New rubric data inserted successfully.');</script>";
                // Stay on the same page
                echo "<script>window.history.back();</script>";
            } else {
                echo "<script>alert('Error inserting new rubric data: " . $insert_stmt->error . "');</script>";
                // Stay on the same page
                echo "<script>window.history.back();</script>";
            }

            $insert_stmt->close();
        }

        $check_stmt->close();
    }
} else {
    echo "<script>alert('No form data submitted.');</script>";
    // Stay on the same page
    echo "<script>window.history.back();</script>";
}

// Close the database connection
$conn->close();
?>
