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

        // Add input fields for editing data, e.g., text fields for entry_date, site, IN TIME, etc.
        echo "<label for='entry_date'>Entry Date:</label>";
        echo "<input type='date' name='entry_date' id='entry_date' value='{$row['entry_date']}' required><br>";

        echo "<label for='site'>Site:</label>";
        echo "<input type='text' name='site' id='site' value='{$row['site']}' required><br>";

        echo "<label for='IN_TIME'>IN TIME:</label>";
        echo "<input type='time' name='IN_TIME' id='IN_TIME' value='{$row['IN TIME']}' required><br>";

        // Add input fields for other data fields here...

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
