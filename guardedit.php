<?php
// Include the database connection
include("db.php");

// Initialize variables for edit
$editId = "";

if (isset($_GET['id'])) {
    $editId = $_GET['id'];

    // Retrieve the record to be edited from the database
    $sql = "SELECT * FROM guards WHERE id = $editId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Display an edit form with the guard's current data
        echo "<h2>Edit Guard Record</h2>";
        echo "<form method='post' action='guardupdate.php'>"; // Assuming you have an update.php for handling updates
        echo "<input type='hidden' name='editId' value='{$row['id']}'>";

        // Add input fields for editing data, e.g., text fields for first name, last name, grid number, etc.
        echo "<label for='first_name'>First Name:</label>";
        echo "<input type='text' name='first_name' id='first_name' value='{$row['first_name']}' required><br>";

        echo "<label for='last_name'>Last Name:</label>";
        echo "<input type='text' name='last_name' id='last_name' value='{$row['last_name']}' required><br>";

        echo "<label for='grid_number'>Grid Number:</label>";
        echo "<input type='text' name='grid_number' id='grid_number' value='{$row['grid_number']}' required><br>";

        echo "<label for='start'>Start Date:</label>";
        echo "<input type='date' name='start' id='start' value='{$row['start']}' required><br>";

        echo "<label for='comments'>Comments:</label><br>";
        echo "<textarea name='comments' id='comments' rows='4' cols='50'>{$row['comments']}</textarea><br>";

        echo "<button type='submit' name='update'>Update</button>";
        echo "</form>";
    } else {
        echo "Guard record not found.";
    }
} else {
    echo "Invalid edit request.";
}

// Close the database connection
$conn->close();
?>
