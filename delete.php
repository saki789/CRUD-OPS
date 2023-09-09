<?php
// Include your database configuration file here

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    
    // Perform database deletion
    // Modify this part to delete data from your specific database table
    $sql = "DELETE FROM your_table_name WHERE id='$id'";
    
    if (mysqli_query($conn, $sql)) {
        echo "Record deleted successfully.";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
    
    mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Delete</title>
</head>
<body>
    <h2>Delete Record</h2>
    <p>Are you sure you want to delete this record?</p>
    <a href="read.php">Cancel</a>
    <a href="delete.php?id=<?php echo $_GET['id']; ?>">Confirm</a>
</body>
</html>
