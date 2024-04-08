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

    // Retrieve form data
    $courseName = $_POST['courseName'];
    $courseDescription = $_POST['courseDescription'];
    $section = $_POST['Section']; // Added to retrieve section input
    $acadYear = $_POST['AcadYear']; // Added to retrieve academic year input
    $term = $_POST['Term']; // Added to retrieve term input
    $unit = $_POST['CourseUnit']; // Added to retrieve unit input

    // Check if userID is set in the session
    if (isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) {
        $userID = $_SESSION['user_id'];
        // Proceed with using $userID
    } else {
        // Handle the case where user ID is not set in session or is empty
        die("User ID not found or is empty in session.");
    }

        // Insert data into `course_created` table
        $courseID = 42025;

    $sqlCourseCreated = "INSERT INTO `course created` (courseID, professorID, AY, term, Unit) VALUES ($courseID, $userID, '$acadYear', $term, $unit)";

    mysqli_query($conn, $sqlCourseCreated);

    //Execute the query for course_created
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
?>