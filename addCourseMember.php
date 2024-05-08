<?php
// Initialize an empty array to store student names
$studentNames = [];

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the student name is set in the form data
    if (isset($_POST["studentName"])) {
        // Retrieve the student name from the form
        $studentName = $_POST["studentName"];
        echo "Submitted student name: " . $studentName . "<br>"; // Debugging statement

        // Echo debug message to be logged in the browser console
        echo '<script>console.log("Submitted student name: ' . $studentName . '");</script>';

        // Create connection
        $conn = mysqli_connect('localhost', 'root', '', 'dreamteam');

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepare the student name for use in the query
        $escapedStudentName = $conn->real_escape_string($studentName);

        // Define the query string before executing it
        $checkUserQuery = "SELECT userID, userName FROM `users` WHERE userType = 'Student'";

        // Check if the query is not empty
        if (!empty($checkUserQuery)) {
            $result = $conn->query($checkUserQuery);

            if ($result) {
                // Loop through each student to find similar names
                while ($row = $result->fetch_assoc()) {
                    // Use a similarity comparison function to check for similarity
                    similar_text($escapedStudentName, $row["userName"], $similarityPercentage);
                    echo "Similarity percentage: " . $similarityPercentage . "<br>"; // Debugging statement

                    // Echo debug message to be logged in the browser console
                    echo '<script>console.log("Similarity percentage: ' . $similarityPercentage . '");</script>';

                    // You can adjust the similarity threshold as needed
                    if ($similarityPercentage >= 51.6) {
                        // If a similar name is found, fetch the userID
                        $userID = $row["userID"];

                        // Assuming you have the courseID available, replace 'your_courseID' with the actual courseID
                        $courseID = 32024;

                        // Insert userID and courseID into enrolled_students table
                        $insertQuery = "INSERT INTO `enrolled students` (studentID, courseID) VALUES ('$userID', '$courseID')";
                        if ($conn->query($insertQuery) === TRUE) {
                            header("Location: CourseCreate.php");
                        } else {
                            echo "Error inserting into enrolled_students table: " . $conn->error;
                        }
                    }
                }
            } else {
                // Handle query execution error
                echo "Error executing query: " . $conn->error;
            }
        } else {
            // Handle case where query string is empty
            echo "Error: Empty query string.";
        }

        // Close database connection
        $conn->close();
    } else {
        // Handle case where student name is not set
        echo "Error: Student name not provided.";
    }
} else {
    // Handle case where form is not submitted via POST
    echo "Error: Form not submitted.";
}

// Display all added student names
echo json_encode($studentNames);
?>

