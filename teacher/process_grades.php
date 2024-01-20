<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "osrs_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    $stmt = $conn->prepare("INSERT INTO lecture_midterm_attendance 
        (student_name, student_number, section, subject,attendance_total, attendance_weighted, 
        participation_total, participation_weighted, HPSattendanceTotal, 
        HPSparticipationTotal, HPSattendanceWeighted, HPSparticipationWeighted) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    if (!$stmt) {
        die("Error in SQL query preparation: " . $conn->error);
    }

    $stmt->bind_param("sissddiddddd", $studentName, $studentNumber, $section, $subject, $attendanceTotal, $attendanceWeighted,
        $participationTotal, $participationWeighted, $HPSattendanceTotal, $HPSparticipationTotal,
        $HPSattendanceWeighted, $HPSparticipationWeighted);

    for ($i = 1; isset($_POST["student_name_$i"]); $i++) {
        $studentName = $_POST["student_name_$i"];
        $studentNumber = (int)$_POST["studentNumber_$i"];
        $section = $_POST["section"];
        $subject = $_POST["subject"];
        $attendanceTotal = (int)$_POST["attendance_total_$i"];
        $attendanceWeighted = (float)$_POST["attendance_weighted_$i"];
        $participationTotal = (int)$_POST["participation_total_$i"];
        $participationWeighted = (float)$_POST["participation_weighted_$i"];
        $HPSattendanceTotal = isset($_POST["HPSattendanceTotal"]) ? (int)$_POST["HPSattendanceTotal"] : 0;
        $HPSparticipationTotal = isset($_POST["HPSparticipationTotal"]) ? (int)$_POST["HPSparticipationTotal"] : 0;
        $HPSattendanceWeighted = isset($_POST["HPSattendance_Weighted"]) ? (float)$_POST["HPSattendance_Weighted"] : 0.00;
        $HPSparticipationWeighted = isset($_POST["HPSparticipation_Weighted"]) ? (float)$_POST["HPSparticipation_Weighted"] : 0.00;

        $checkQuery = "SELECT * FROM lecture_midterm_attendance 
                       WHERE student_name = ? AND student_number = ? AND section = ? AND subject = ?";
        $checkStmt = $conn->prepare($checkQuery);
        $checkStmt->bind_param("siss", $studentName, $studentNumber, $section, $subject);
        $checkStmt->execute();
        $checkResult = $checkStmt->get_result();

        if ($checkResult->num_rows > 0) {
            echo "<script>alert('Record for $studentName, $studentNumber, $section, $subject already exists.'); window.history.back();</script>";
        } else {
            $stmt->execute();
        }
    }

    $stmt->close();
    $conn->close();

    echo "<script>alert('Data submitted successfully!'); window.history.back();</script>";
    exit();
} else {
    die("Form not submitted");
}
?>
