<!DOCTYPE html>
<html>
<head>
    <title>Midterm Grades</title>
    <link rel="stylesheet" href="student.css"> 
</head>
<body>
<div class="content">
        <div class="logo"> 
           <img src="logo.png" width="296" height="64" alt="Logo">        
        </div>
</div>

    <div class="container">
        <?php
        if(isset($_GET['student_code'])) {
            $student_code = $_GET['student_code'];
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "osrs_db";
            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $midterm_sql = "SELECT DISTINCT m.subject, m.section, m.student_code, m.weighted_attendance, m.weighted_participation, m.weighted_quizzes, m.weighted_outputs, m.weighted_midterm, l.weighted_attendance_participation, l.weighted_lab, l.weighted_practical FROM midterm m 
            LEFT JOIN lab_midterm l ON m.student_code = l.student_code 
            WHERE m.student_code = '$student_code'";
$midterm_result = $conn->query($midterm_sql);
            if ($midterm_result && $midterm_result->num_rows > 0) {
                while($row = $midterm_result->fetch_assoc()) {
                    echo "<div class='info-section info-section-student'>
        <h2>Student Information</h2>
        <div>
            <div class='info-item'><strong>Student Code:</strong> " . $row["student_code"]. "</div>
            <div class='info-item'><strong>Section:</strong> " . $row["section"]. "</div>
            <div class='info-item'><strong>Subject:</strong> " . $row["subject"]. "</div>
        </div>
    </div>";

echo "<div class='info-section info-section-lecture'>
        <h2>Lectures 75%</h2>
        <div class='info-item'><strong>Attendance 10%:</strong> " . $row["weighted_attendance"]. "%</div>
        <div class='info-item'><strong>Participation 10%:</strong> " . $row["weighted_participation"]. "%</div>
        <div class='info-item'><strong>Quizzes 15%:</strong> " . $row["weighted_quizzes"]. "%</div>
        <div class='info-item'><strong>Outputs 25%:</strong> " . $row["weighted_outputs"]. "%</div>
        <div class='info-item'><strong>Midterm 20%:</strong> " . $row["weighted_midterm"]. "%</div>
    </div>";

echo "<div class='info-section info-section-laboratory'>
        <h2>Laboratory 25%</h2>
        <div class='info-item'><strong>Attendance & Participation  20%:</strong> " . $row["weighted_attendance_participation"]. "%</div>
        <div class='info-item'><strong>Laboratory Reports 50%:</strong> " . $row["weighted_lab"]. "%</div>
        <div class='info-item'><strong>Practical Exam 30%:</strong> " . $row["weighted_practical"]. "%</div>
    </div>";
    echo "<h2>________________________________________________________________________________________________________________________________</h2>";
                }
            } else {
                echo "Midterm data not found for the student.";
            }
            $conn->close();
        } else {
            echo "Invalid request. Please select a student.";
        }
        ?>
       
    </div>
</body>
</html>
