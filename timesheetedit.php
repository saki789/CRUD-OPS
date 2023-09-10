<?php
// Include the database connection
include("db.php");

// Initialize variables for edit
$editId = "";

if (isset($_GET['id'])) {
    $editId = $_GET['id'];

    // Retrieve the record to be edited from the database
    $sql = "SELECT * FROM timesheet WHERE id = $editId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Display an edit form with the record's current data
        echo "<h2>Edit Timesheet Record</h2>";
        echo "<form method='post' action='timesheetupdate.php'>"; // Assuming you have an update.php for handling updates
        echo "<input type='hidden' name='editId' value='{$row['id']}'>";

        // Add input fields for editing data, e.g., text fields for date, site, guard, etc.
        // Add your input fields here...

        echo "<button type='submit' name='update'>Update</button>";
        echo "</form>";
    } else {
        echo "Record not found.";
    }
} else {
    echo "Invalid edit request.";
}

// Close the database connection
$conn->close();
?>
