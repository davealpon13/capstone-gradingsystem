<?php
// Include your database connection code
include('db_connection.php'); // Replace 'db_connection.php' with the actual file name

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the attendance ID from the form
    $attendanceId = $_POST['attendance_id'];

    // Perform the delete operation
    $deleteSql = "DELETE FROM lecture_midterm_attendance WHERE id = '$attendanceId'";
    if ($conn->query($deleteSql) === TRUE) {
        echo "Record deleted successfully.";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

// Use JavaScript to go back in history
echo "<script>window.history.back();</script>";
?>
