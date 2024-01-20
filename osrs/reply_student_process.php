<?php
// Assuming you have a database connection established
// Replace these variables with your actual database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "osrs_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (
        isset($_POST['student_code']) &&
        isset($_POST['admin_name']) &&
        isset($_POST['reply_message'])
       
    ) {
        $student_code = $_POST['student_code'];
        $admin_name = $_POST['admin_name'];
        $reply_message = $_POST['reply_message'];
     

        // Prepare and execute SQL statement to insert data into the database
        $sql = "INSERT INTO admin_student (student_code, admin, message_text) VALUES ('$student_code', '$admin_name', '$reply_message')";

       
        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('New record created successfully');</script>";
            echo "<script>window.history.go(-1);</script>";
            exit; // Terminate PHP execution after displaying the alert and redirecting
        } else {
            echo "<script>alert('Error: " . $conn->error . "');</script>";
            echo "<script>window.history.go(-1);</script>";
            exit; // Terminate PHP execution after displaying the alert and redirecting
        }
    } else {
        echo "<script>alert('Error: Incomplete data received.');</script>";
        echo "<script>window.history.go(-1);</script>";
        exit; // Terminate PHP execution after displaying the alert and redirecting
    }
} else {
    echo "<script>alert('Error: Invalid request method.');</script>";
    echo "<script>window.history.go(-1);</script>";
    exit; // Terminate PHP execution after displaying the alert and redirecting
}

// Close the database connection
$conn->close();
?>
