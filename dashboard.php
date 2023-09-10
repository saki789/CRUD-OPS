<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
    <h1>Welcome to the Dashboard</h1>

    <?php
    // Include the database connection file (db.php)
    require_once('db.php');

    // Start a session (if not already started)
    session_start();

    // Check if the user is logged in
    if (isset($_SESSION['user_id'])) {
        // Fetch user information from the "users" table
        $userId = $_SESSION['user_id'];
        $query = "SELECT * FROM users WHERE id = $userId";
        $result = mysqli_query($connection, $query);
        
        if ($result && mysqli_num_rows($result) > 0) {
            $user = mysqli_fetch_assoc($result);
            // Display user information on the dashboard
            echo "<p>Welcome, " . $user['full_name'] . "!</p>";
            echo "<p>Username: " . $user['username'] . "</p>";
            // You can add more information as needed
            
            // Add options for the user based on their privilege level
            $privilegedType = $user['privileged_type'];
            if ($privilegedType == 'Admin') {
                echo "<p>You have admin privileges.</p>";
                // Add admin-specific options here
            } elseif ($privilegedType == 'Moderator') {
                echo "<p>You have moderator privileges.</p>";
                // Add moderator-specific options here
            } else {
                echo "<p>You have regular user privileges.</p>";
                // Add regular user-specific options here
            }
            
            // Logout option
            echo '<a href="logout.php">Logout</a>';
        } else {
            echo "<p>Error: Unable to fetch user information.</p>";
        }
    } else {
        // If the user is not logged in, redirect to the login page
        header("Location: login.php");
        exit();
    }
    ?>

    <!-- Add your dashboard content here -->

</body>
</html>
