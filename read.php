<?php
// Include your database configuration file here

// Perform database retrieval
// Modify this part to fetch data from your specific database table
$sql = "SELECT * FROM your_table_name";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Read</title>
</head>
<body>
    <h2>Read Records</h2>
    <table>
        <tr>
            <th>Name</th>
            <th>Email</th>
        </tr>
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row["name"] . "</td>";
            echo "<td>" . $row["email"] . "</td>";
            echo "</tr>";
        }
        mysqli_close($conn);
        ?>
    </table>
</body>
</html>
