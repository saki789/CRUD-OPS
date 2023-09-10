<?php
// Include the database connection
include("db.php");

// Initialize variables for search and actions
$searchName = "";
$editId = $deleteId = "";

if (isset($_POST['search'])) {
    $searchName = $_POST['searchName'];
}

if (isset($_POST['edit'])) {
    $editId = $_POST['editId'];
    // Redirect to the edit page with the selected record's ID
    header("Location: guardedit.php?id=$editId");
    exit();
}

if (isset($_POST['delete'])) {
    $deleteId = $_POST['deleteId'];
    // Perform the delete operation based on the selected record's ID
    $deleteSql = "DELETE FROM guards WHERE id = $deleteId";
    if ($conn->query($deleteSql) === TRUE) {
        echo "Record deleted successfully.";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

// Query to retrieve data from the "guards" table
$sql = "SELECT * FROM guards WHERE first_name LIKE '%$searchName%' OR last_name LIKE '%$searchName%'";
$result = $conn->query($sql);

// Check if there are any records
if ($result->num_rows > 0) {
    echo "<form method='post'>"; // Form for search
    echo "<input type='text' name='searchName' placeholder='Search Guards' value='$searchName'>";
    echo "<button type='submit' name='search'>Search</button>";
    echo "</form>";

    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Grid Number</th>
                <th>Start Date</th>
                <th>Comments</th>
                <th>Action</th>
            </tr>";

    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['first_name']}</td>
                <td>{$row['last_name']}</td>
                <td>{$row['grid_number']}</td>
                <td>{$row['start']}</td>
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
