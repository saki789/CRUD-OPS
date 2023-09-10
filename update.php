<?php
// Include the database connection
include("db.php");

// Initialize variables for update
$updateId = $date = $site = $guard = $inTime = $outTime = $status = $total = $extra = $grandTotal = $comments = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $updateId = $_POST['editId'];
    $date = $_POST['date'];
    $site = $_POST['site'];
    $guard = $_POST['guard'];
    $inTime = $_POST['in_time'];
    $outTime = $_POST['out_time'];
    $status = $_POST['status'];
    $total = $_POST['total'];
    $extra = $_POST['extra'];
    $grandTotal = $_POST['grand_total'];
    $comments = $_POST['comments'];

    // Prepare an SQL statement to update the record
    $updateSql = "UPDATE duty_roster
                  SET date = '$date',
                      site = '$site',
                      guard = '$guard',
                      `IN TIME` = '$inTime',
                      `OUT TIME` = '$outTime',
                      status = '$status',
                      total = '$total',
                      extra = '$extra',
                      grand_total = '$grandTotal',
                      comments = '$comments'
                  WHERE id = $updateId";

    if ($conn->query($updateSql) === TRUE) {
        echo "Record updated successfully.";
    } else {
        echo "Error updating record: " . $conn->error;
    }
} else {
    echo "Invalid update request.";
}

// Close the database connection
$conn->close();
?>
