<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['record_id'])) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "osrs_db";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $student_code = $_POST['record_id'];

    $sql = "DELETE FROM admin_student WHERE student_code = '$student_code'";
    if ($conn->query($sql) === TRUE) {
        $conn->close();
        header("Location: view_message.php"); // Redirect to a page that displays the remaining records
        exit;
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    $conn->close();
} else {
    echo "Invalid request";
}
?>
