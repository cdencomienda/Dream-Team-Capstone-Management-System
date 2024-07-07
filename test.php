<?php
session_start();

// Check if course_id, student_group_id, and user_id are set in the session
if (isset($_SESSION['course_id']) && isset($_SESSION['student_group_id']) && isset($_SESSION['user_id'])) {
    // Database connection details
    $conn = new mysqli('localhost', 'root', '', 'dreamteam');

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Escape variables for security
    $course_id = $_SESSION['course_id'];
    $student_group_id = $_SESSION['student_group_id'];
    $user_id = $_SESSION['user_id'];

    // Prepare SQL query to get panelID based on courseID and requirementsID
    $sql_panel = "SELECT panelID FROM `group` 
                  WHERE courseID = ? AND requirementsID = ?";
    
    // Prepare statement for panelID query
    $stmt_panel = $conn->prepare($sql_panel);
    $stmt_panel->bind_param("ii", $course_id, $student_group_id);
    $stmt_panel->execute();
    $stmt_panel->bind_result($panelID);
    $stmt_panel->fetch();
    $stmt_panel->close();
    
    if ($panelID) {
        // Prepare SQL query to get panelRole based on professorID, user_id, and panelID
        $sql_panelist = "SELECT panelRole FROM `panelist` 
                         WHERE professorID = ? AND panelID = ?";
        
        // Prepare statement for panelist query
        $stmt_panelist = $conn->prepare($sql_panelist);
        $stmt_panelist->bind_param("ii", $user_id, $panelID);
        $stmt_panelist->execute();
        $stmt_panelist->bind_result($panelRole);
        $stmt_panelist->fetch();
        $stmt_panelist->close();
        
        if ($panelRole) {
            // Save panelRole in session
            $_SESSION['panelRole'] = $panelRole;
            
            // Prepare data to send as JSON
            $response = array(
                'panelRole' => $panelRole
            );
            
            // Send JSON response
            header('Content-Type: application/json');
            echo json_encode($response);
        } else {
            echo "No panel role found for professor ID: $user_id and panel ID: $panelID";
        }
    } else {
        echo "No panel found for course ID: $course_id and student group ID: $student_group_id";
    }

    // Close database connection
    $conn->close();
} else {
    // If course_id, student_group_id, or user_id is not set in the session
    echo "Course ID, Student Group ID, or User ID is not set in the session.";
}
?>
