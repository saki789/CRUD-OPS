<?php
// Include the database connection
include("db.php");

// Initialize variables for search and actions
$searchGuard = "";
$editId = $deleteId = "";

if (isset($_POST['search'])) {
    $searchGuard = $_POST['searchGuard'];
}

if (isset($_POST['edit'])) {
    $editId = $_POST['editId'];
    // Redirect to the edit page with the selected record's ID
    header("Location: timesheetedit.php?id=$editId");
    exit();
}

if (isset($_POST['delete'])) {
    $deleteId = $_POST['deleteId'];
    // Perform the delete operation based on the selected record's ID
    $deleteSql = "DELETE FROM timesheet WHERE id = $deleteId";
    if ($conn->query($deleteSql) === TRUE) {
        echo "Record deleted successfully.";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

// Query to retrieve data from the timesheet table
$sql = "SELECT * FROM timesheet WHERE guard LIKE '%$searchGuard%'";
$result = $conn->query($sql);

// Check if there are any records
if ($result->num_rows > 0) {
    echo "<form method='post'>"; // Form for search
    echo "<input type='text' name='searchGuard' placeholder='Search Guards' value='$searchGuard'>";
    echo "<button type='submit' name='search'>Search</button>";
    echo "</form>";

    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Guard ID</th>
                <th>Entry Date</th>
                <th>IN TIME</th>
                <th>OUT TIME</th>
                <th>Site</th>
                <th>Total</th>
                <th>Extra</th>
                <th>Grand Total</th>
                <th>Comments</th>
                <th>Action</th>
            </tr>";

    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['guard_id']}</td>
                <td>{$row['entry_date']}</td>
                <td>{$row['IN_TIME']}</td>
                <td>{$row['OUT_TIME']}</td>
                <td>{$row['site']}</td>
                <td>{$row['total']}</td>
                <td>{$row['extra']}</td>
                <td>{$row['grand_total']}</td>
                <td>{$row['comments']}</td>
                <td>
                    <form method='post'>
                        <input type='hidden' name='editId' value='{$row['id']}'>
                        <button type='submit' name='edit'>Edit</button>
                    </form>
                    <form method='post'>
                        <input type='hidden' name='deleteId' value='{$row['id']}'>
                        <button type='submit' name='delete'>Delete</button>
                    </form>
                </td>
            </tr>";
    }

    echo "</table>";
} else {
    echo "No records found.";
}

// Close the database connection
$conn->close();
?>
