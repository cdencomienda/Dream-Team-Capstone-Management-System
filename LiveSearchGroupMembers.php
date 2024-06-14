<?php
// Start the session
session_start();

// Check if 's_id' is set in the session
if (isset($_SESSION['s_id'])) {
    // 's_id' is set in the session
    echo "s_id is set in the session. Its value is: " . $_SESSION['s_id'];
} else {
    // 's_id' is not set in the session
    echo "s_id is not set in the session.";
}
?>
