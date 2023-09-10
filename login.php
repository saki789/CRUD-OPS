<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
</head>
<body>

<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the user input
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Check if the credentials are valid (for simplicity, we're hardcoding them)
    $valid_username = "user";
    $valid_password = "password";

    if ($username === $valid_username && $password === $valid_password) {
        echo "<p>Login successful! Welcome, $username.</p>";
    } else {
        echo "<p>Login failed. Please check your username and password.</p>";
    }
}
?>

<h2>Login Form</h2>
<form method="post" action="login.php">
    <label for="username">Username:</label>
    <input type="text" name="username" id="username" required><br>

    <label for="password">Password:</label>
    <input type="password" name="password" id="password" required><br>

    <input type="submit" value="Login">
</form>

</body>
    </html>
