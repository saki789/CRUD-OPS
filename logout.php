<?php
// Start the session
session_start();

// Check if the user is logged in
if (isset($_SESSION["username"])) {
    // Unset and destroy the session data
    unset($_SESSION["username"]);
    session_destroy();
}

// Redirect the user to the login page (or any other page as needed)
header("Location: login.php");
exit();
?>
