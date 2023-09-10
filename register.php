<?php
include('db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $fullName = $_POST['full_name'];
    $email = $_POST['email'];

    // Perform SQL INSERT to add a new user to the "users" table
    // Handle form validation and error checking here

    // Redirect to a success page or display an error message
}
?>
<!-- HTML form for user registration -->
<!DOCTYPE html>
<html>
<head>
    <title>User Registration</title>
</head>
<body>
    <h1>User Registration</h1>
    <form method="POST" action="register.php">
        <!-- Add form fields for username, password, full name, and email -->
        <!-- Add submit button -->
    </form>
</body>
</html>
