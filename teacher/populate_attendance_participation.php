<?php
// Assuming you have a database connection
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

// Assuming your table structure has columns like student_name, student_number, section, subject, attendance_total, participation_total, HPSattendanceTotal, HPSparticipationTotal, etc.
$sql = "SELECT student_name, student_number, section, subject, attendance_total, participation_total, HPSattendanceTotal, HPSparticipationTotal FROM lecture_midterm_attendance";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $data = array();
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    echo json_encode($data);
} else {
    echo "0 results";
}

$conn->close();
?>
