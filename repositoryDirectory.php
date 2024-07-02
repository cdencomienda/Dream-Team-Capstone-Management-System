<?php
// Database connection
$conn = mysqli_connect('localhost', 'root', '', 'soe_assessment');

// Check connection
if ($conn->connect_error) {
    echo json_encode(["status" => "error", "message" => "Connection failed: " . $conn->connect_error]);
    exit();
}

// Fetch data from database
$query = "SELECT DISTINCT a.academic_year, c.course_id, c.course_code, c.section, c.term, g.group_name, g.student_group_id
          FROM academic_year a
          INNER JOIN course c ON a.acy_id = c.acy_id
          LEFT JOIN groups g ON c.course_id = g.course_id
          ORDER BY a.academic_year, c.course_id, g.student_group_id";

$result = $conn->query($query);

if (!$result) {
    echo json_encode(["status" => "error", "message" => "Query failed: " . $conn->error]);
    exit();
}

// Array to hold structured data
$data = [];

// Process fetched data
$currentYear = null;
$currentCourse = null;
$currentTerm = null;
$currentCourseDir = null;

while ($row = $result->fetch_assoc()) {
    $academicYear = $row['academic_year'];
    $courseID = $row['course_id'];
    $courseCode = $row['course_code'];
    $section = $row['section'];
    $term = $row['term'];
    $groupName = $row['group_name'];
    $studentGroupID = $row['student_group_id'];

    // Format academic year as "YYYY-YYYY"
    $academicYearRange = 'AY ' . ($academicYear) . '-' . ($academicYear + 1); // Adjust the range as needed

    // Create directories if academic year changes or new course starts
    if ($academicYear !== $currentYear) {
        $currentYear = $academicYear;
        $yearDirectory = 'repositories/' . $academicYearRange; // Use formatted academic year range
        if (!file_exists($yearDirectory)) {
            mkdir($yearDirectory, 0777, true);
        }
    }

    if ($currentCourse !== $courseID || $currentTerm !== $term) {
        $currentCourse = $courseID;
        $currentTerm = $term;
        $termDirectory = $yearDirectory . '/Term ' . $currentTerm;
        if (!file_exists($termDirectory)) {
            mkdir($termDirectory, 0777, true);
        }
        
        // Reset course directory on term change
        $currentCourseDir = null;
    }

    // Create course directory if it hasn't been created yet
    if (!$currentCourseDir) {
        $currentCourseDir = $termDirectory . '/' . $courseCode . ' - ' . $section;
        if (!file_exists($currentCourseDir)) {
            mkdir($currentCourseDir, 0777, true);
        }
    }

    // Create group directory
    if ($groupName) {
        $groupDirectory = $currentCourseDir . '/' . $groupName;
        if (!file_exists($groupDirectory)) {
            mkdir($groupDirectory, 0777, true);
        }
    }
}

$conn->close();

// Output success message
echo json_encode(["status" => "success", "message" => "Directories created successfully"]);
?>
