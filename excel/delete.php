<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "osrs_db";

// Establish a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the database connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    $id = $_GET['id']; // Get the ID from the DELETE request
    
    // Prepare and execute the SQL DELETE statement
    $sql = "DELETE FROM students WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        // Set a response status for successful deletion
        http_response_code(204); // 204: No Content
    } else {
        // Set a response status for deletion failure
        http_response_code(500); // 500: Internal Server Error
    }
}

$conn->close();
?>
