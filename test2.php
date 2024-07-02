<?php
// Directory path to check
$directory = 'repositories/AY 2023-2024/Term 2/DATAMGT - CPE-221/U, I, & Tobey\'s X';

// Check if the directory exists
if (is_dir($directory)) {
    // Get all files in the directory
    $files = scandir($directory);

    // Remove . and .. from the list
    $files = array_diff($files, array('.', '..'));

    // Output the list of files
    echo "Files in directory:<br>";
    echo "<ul>";
    foreach ($files as $file) {
        echo "<li>$file</li>";
    }
    echo "</ul>";
} else {
    echo "The directory does not exist.";
}
?>
