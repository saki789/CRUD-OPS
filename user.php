<!DOCTYPE html>
<html>
<head>
    <title>User List</title>
</head>
<body>
    <h1>User List</h1>

    <?php
    // Include the database connection file (db.php)
    require_once('db.php');

    // Fetch data from the "users" table
    $query = "SELECT id, username, full_name, registration_date, privileged_type FROM users";
    $result = mysqli_query($connection, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        echo "<table>";
        echo "<tr><th>ID</th><th>Username</th><th>Full Name</th><th>Registration Date</th><th>Privilege Type</th></tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['username'] . "</td>";
            echo "<td>" . $row['full_name'] . "</td>";
            echo "<td>" . $row['registration_date'] . "</td>";
            echo "<td>" . $row['privileged_type'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p>No users found.</p>";
    }

    // Close the database connection
    mysqli_close($connection);
    ?>

</body>
</html>
