// After successfully updating, you can redirect back to the timesheet.php page or display a success message
    // Example:
    if ($updateIsSuccessful) {
        header("Location: timesheet.php");
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
