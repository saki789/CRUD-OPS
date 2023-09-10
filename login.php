<?php
// Include the database connection
include("db.php");

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Query the database to check if the username and password match
    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        // Login successful, redirect to a protected page or set a session variable
        session_start();
        $_SESSION["username"] = $username;
        header("Location: dashboard.php"); // Redirect to a dashboard page
        exit();
    } else {
        // Login failed, show an error message
        echo "Login failed. Please check your username and password.";
    }
}

// Close the database connection when done (if needed)
// mysqli_close($conn);
?>
