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

// Check if the username was sent via POST request
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['username'])) {
    $usernameToDelete = $_POST['username'];

    // SQL query to delete the user based on the provided username
    $deleteQuery = "DELETE FROM students_registration WHERE username = '$usernameToDelete'";

    // Execute the query
    if ($conn->query($deleteQuery) === TRUE) {
        echo "User deleted successfully";
    } else {
        echo "Error deleting user: " . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
