<?php
// Database configuration
$servername = "localhost"; // Change this to your MySQL server hostname
$username = "your_username"; // Change this to your MySQL username
$password = "your_password"; // Change this to your MySQL password
$database = "your_database"; // Change this to your MySQL database name

// Create a connection to the MySQL database
$conn = mysqli_connect($servername, $username, $password, $database);

// Check the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Set character set to utf8 (if needed)
mysqli_set_charset($conn, "utf8");

// Close the database connection when done (if needed)
// mysqli_close($conn);
?>
