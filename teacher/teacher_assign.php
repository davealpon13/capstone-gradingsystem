<?php
// Assuming you have established a database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "osrs_db";

// Create connection
$connection = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Get the teacher's ID after they log in (you need to implement this part)
$teacherName = $_SESSION['teacher_name']; // Assuming you store teacher name in a session variable after login

// Query to retrieve classes associated with the teacher's subject and section from the database
$query = "SELECT * FROM class WHERE subject = (SELECT subject FROM teacher WHERE name = '$teacherName') AND section = (SELECT section FROM teacher WHERE name = '$teacherName')";
$result = $connection->query($query);

// HTML output for the sidebar
echo '<div class="sidebar"><ul>';
while ($row = $result->fetch_assoc()) {
    echo '<li><a href="student_grading.php?class_id=' . $row['class_id'] . '">' . $row['class_name'] . '</a></li>';
}
echo '</ul></div>';

// Close the database connection
$connection->close();
?>
