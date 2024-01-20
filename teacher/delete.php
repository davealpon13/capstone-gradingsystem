<?php
include 'config.php'; // Include this line if your database connection is in the config.php file

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    // Query to delete the record with the given ID from the "midterm" table
    $delete_query = mysqli_query($conn, "DELETE FROM midterm WHERE id = $id");

    if ($delete_query) {
        echo "Record deleted successfully!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_close($conn);
} else {
    echo "Invalid ID.";
}
?>
