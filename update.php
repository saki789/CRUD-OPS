<?php
// Include your database configuration file here

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get data from the form
    $id = $_POST["id"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    
    // Perform database update
    // Modify this part to update data in your specific database table
    $sql = "UPDATE your_table_name SET name='$name', email='$email' WHERE id='$id'";
    
    if (mysqli_query($conn, $sql)) {
        echo "Record updated successfully.";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
    
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update</title>
</head>
<body>
    <h2>Update Record</h2>
    <form method="post" action="update.php">
        <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
        <label>Name:</label>
        <input type="text" name="name" required><br>
        <label>Email:</label>
        <input type="email" name="email" required><br>
        <input type="submit" value="Update">
    </form>
</body>
</html>
