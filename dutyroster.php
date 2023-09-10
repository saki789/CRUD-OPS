<?php
// Include the database connection
include("db.php");

// Query to retrieve data from the duty_roster table
$sql = "SELECT * FROM duty_roster";
$result = $conn->query($sql);

// Check if there are any records
if ($result->num_rows > 0) {
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Date</th>
                <th>Site</th>
                <th>Guard</th>
                <th>IN TIME</th>
                <th>OUT TIME</th>
                <th>Status</th>
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
                <td>{$row['date']}</td>
                <td>{$row['site']}</td>
                <td>{$row['guard']}</td>
                <td>{$row['IN TIME']}</td>
                <td>{$row['OUT TIME']}</td>
                <td>{$row['status']}</td>
                <td>{$row['total']}</td>
                <td>{$row['extra']}</td>
                <td>{$row['grand_total']}</td>
                <td>{$row['comments']}</td>
                <td>
                    <button>Edit</button>
                    <button>Delete</button>
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
