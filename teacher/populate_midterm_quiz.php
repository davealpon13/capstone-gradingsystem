<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "osrs_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$stmt = $conn->prepare("SELECT student_name, student_number, section, subject, quiz_total, hpsquiz_total FROM lecture_midterm_quiz");
$stmt->execute();
$result = $stmt->get_result();

if ($result === false) {
    die("Query failed: " . $conn->error);
}

if ($result->num_rows > 0) {
    $data = array();
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    echo json_encode($data);
} else {
    echo "No quiz data available";
}

$conn->close();
?>
