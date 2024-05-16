<?php
// Check if session is not already active
if (session_status() == PHP_SESSION_NONE) {
    session_start(); // Start the session if it's not already active
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Connect to the database
    $conn = mysqli_connect('localhost', 'root', '', 'dreamteam');

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Retrieve form data after live search
    $courseName = $_POST['courseName'];
    $courseCode = $_POST['courseCode'];
    // $rubricCode = $_POST['rubricCode'];
    $section = $_POST['Section']; // Added to retrieve section input
    $acadYear = $_POST['AcadYear']; // Added to retrieve academic year input
    $term = $_POST['Term']; // Added to retrieve term input
    $unit = $_POST['CourseUnit']; // Added to retrieve unit input

    // Check if userID is set in the session
    if (isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) {
        $userID = $_SESSION['user_id'];
        
        // Retrieve courses created by the current user
        $queryCourses = "SELECT * FROM `course created` WHERE professorID = $userID";
        $resultCourses = mysqli_query($conn, $queryCourses);
        
        // // Display the courses
        // while ($rowCourse = mysqli_fetch_assoc($resultCourses)) {
        //     echo "Course Name: " . $rowCourse['courseName'] . "<br>";
        //     // Display other course information as needed
        // }

        // Retrieve the CapsID based on the courseCode
        $query = "SELECT CapsID FROM `capstone courses` WHERE courseName = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $courseCode);
        $stmt->execute();
        $result = $stmt->get_result();

        // Fetch the CapsID from the result
        if ($row = $result->fetch_assoc()) {
            $capsID = $row['CapsID'];
        } else {
            $_SESSION['error_message'] = "Course with '$courseCode' not found. " . mysqli_error($conn);
                header("Location: " . $_SERVER['HTTP_REFERER'] . "?showOverlay=true");
        }

        // Insert data into `course_created` table

        $sqlCourseCreated = "INSERT INTO `course created` (courseName, section, professorID, CapsID, AY, term, Unit) VALUES ('$courseName', '$section', $userID, $capsID, '$acadYear', $term, $unit)";

        // Execute the query for course_created
        if (mysqli_query($conn, $sqlCourseCreated)) {
            // Query executed successfully
            // You can redirect the user to a success page or display a success message
            header("Location: CourseCreate.php"); // Redirect to success page
            exit(); // Terminate script to prevent further execution
        } else {
            // Query execution failed
            // Handle the error, display an error message, or redirect to an error page
            echo "Error: " . mysqli_error($conn); // Display error message
            exit(); // Terminate script to prevent further execution
        }


    mysqli_close($conn);
}
}
?>