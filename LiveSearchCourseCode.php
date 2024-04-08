<?php
// Connect to the database
$conn = mysqli_connect('localhost', 'root', '', 'dreamteam');

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['search'])) {
    // Retrieve search input
    $search = $_GET['search'];

    // Perform search query
    $sql = "SELECT courseName FROM `capstone courses` WHERE courseName LIKE '%$search%'";
    $result = mysqli_query($conn, $sql);

    // Display search results
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<p>' . $row['courseName'] . '</p>'; // Adjust as per your data structure
        }
    } else {
        echo 'No results found';
    }
}

mysqli_close($conn);
?>
