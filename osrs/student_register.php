<?php
// Database connection parameters
$servername = "localhost"; // Replace with your server name
$username = "root"; // Replace with your username
$password = ""; // Replace with your password
$dbname = "osrs_db"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve username and password from the form
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    // Hash the password (for security)
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Prepare SQL statement to insert data into the database
    $sql = "INSERT INTO students_registration (username, password) VALUES ('$username', '$hashed_password')";

    // Execute SQL statement and check for success
    if ($conn->query($sql) === TRUE) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close database connection
$conn->close();
?>
