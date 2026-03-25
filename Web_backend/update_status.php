<?php
include 'dbconnect.php';

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get status from AJAX request
$status = isset($_POST['status']) ? intval($_POST['status']) : 0;

// Update status in the database (assuming there's only one row)
$sql = "UPDATE status SET status = $status WHERE id = 1"; // Adjust based on your table structure

if ($conn->query($sql) === TRUE) {
    echo "Success";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
