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
    $section = $_POST['Section']; // Added to retrieve section input
    $acadYear = $_POST['AcadYear']; // Added to retrieve academic year input
    $term = $_POST['Term']; // Added to retrieve term input
    $unit = $_POST['CourseUnit']; // Added to retrieve unit input

    // Check if userID is set in the session
    if (isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) {
        $userID = $_SESSION['user_id'];

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
            die("Error: Course with code '$courseCode' not found.");
        }

        // Insert data into `course_created` table
        $courseID = 42025;

        $sqlCourseCreated = "INSERT INTO `course created` (courseID, professorID, CapsID, AY, term, Unit) VALUES ($courseID, $userID, $capsID, '$acadYear', $term, $unit)";

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