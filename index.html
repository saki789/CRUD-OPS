<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
</head>
<body>

<?php
// Include the database connection
include("db.php");

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Prepare a SQL statement with placeholders
    $sql = "SELECT * FROM users WHERE username = ? LIMIT 1";
    $stmt = mysqli_prepare($conn, $sql);
    
    if ($stmt) {
        // Bind parameters and execute the statement
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);

        // Get the result
        $result = mysqli_stmt_get_result($stmt);

        // Check if a row was returned
        if ($row = mysqli_fetch_assoc($result)) {
            // Verify the hashed password
            if (password_verify($password, $row['password'])) {
                // Login successful, start a session
                session_start();
                $_SESSION["username"] = $username;
                header("Location: dashboard.php");
                exit();
            } else {
                echo "Login failed. Please check your username and password.";
            }
        } else {
            echo "Login failed. Please check your username and password.";
        }

        // Close the statement
        mysqli_stmt_close($stmt);
    } else {
        // Handle database error gracefully
        echo "Database error: " . mysqli_error($conn);
    }
}

// Close the database connection when done (if needed)
// mysqli_close($conn);
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
