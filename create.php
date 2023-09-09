<?php
// Include your database configuration file here

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get data from the form
    $name = $_POST["name"];
    $email = $_POST["email"];
    
    // Perform database insertion
    // Modify this part to insert data into your specific database table
    $sql = "INSERT INTO your_table_name (name, email) VALUES ('$name', '$email')";
    
    if (mysqli_query($conn, $sql)) {
        echo "Record created successfully.";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
    
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create</title>
</head>
<body>
    <h2>Create Record</h2>
    <form method="post" action="create.php">
        <label>Name:</label>
        <input type="text" name="name" required><br>
        <label>Email:</label>
        <input type="email" name="email" required><br>
        <input type="submit" value="Create">
    </form>
</body>
</html>
