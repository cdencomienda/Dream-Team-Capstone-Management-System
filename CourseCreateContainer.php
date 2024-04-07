<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Connect to the database
    $conn = mysqli_connect('localhost', 'root', '', 'dreamteam');

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Fetch data from the database
    $query = "SELECT * FROM `course offered`"; // Replace "your_table_name" with your actual table name
    $result = mysqli_query($conn, $query);

    // Check if there are rows returned
    if (mysqli_num_rows($result) > 0) {
        // Output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<div class="sectionClass">';
            echo '<div class="creategroup">';
            // Display data from the database within your HTML structure
            echo '<p>Field 1: ' . $row['field1'] . '</p>'; // Replace "field1" with your actual column name
            echo '<p>Field 2: ' . $row['field2'] . '</p>'; // Replace "field2" with your actual column name
            // Add more fields as needed
            echo '</div>';
            echo '</div>';
        }
    } else {
        echo "No data available";
    }

    // Close the connection
    mysqli_close($conn);
}
?>
