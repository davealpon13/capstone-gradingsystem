<!-- edit.php -->
<?php
require 'config.php';

if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $result = mysqli_query($conn, "SELECT * FROM finals WHERE id='$id'");

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        // Include your HTML and form for editing the record
        include 'edit_FinalsForm.php';
    } else {
        echo 'Record not found.';
    }
} else {
    echo 'Invalid request.';
}
?>
