<!DOCTYPE html>
<html>
<head>
    <title>Laboratory Finals Grades</title>
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
            $lab_finals_sql = "SELECT * FROM lab_finals WHERE student_code = '$student_code'";
            $lab_finals_result = $conn->query($lab_finals_sql);
            if ($lab_finals_result && $lab_finals_result->num_rows > 0) {
                while($row = $lab_finals_result->fetch_assoc()) {
                    $subject = $row["subject"];
                    $section = $row["section"];
        
                    // Fetch teacher's name based on subject and section
                    $teacher_sql = "SELECT name FROM teacher WHERE subject = '$subject' AND section = '$section'";
                    $teacher_result = $conn->query($teacher_sql);
                    $teacher_name = ($teacher_result && $teacher_result->num_rows > 0) ? $teacher_result->fetch_assoc()["name"] : "Unknown";
                    echo "<div class='info-sectionn info-section-student'>
        <h2>Student Information</h2>
        <div class='info-item'><strong>Student Code:</strong> " . $row["student_code"]. "</div>
        <div class='info-item'><strong>Section:</strong> " . $row["section"]. "</div>
        <div class='info-item'><strong>Subject:</strong> " . $row["subject"]. "</div>
        <div class='info-item'><strong>Teacher:</strong> " . $teacher_name . "</div>
        <div class='info-item'><strong>Total Attendance & Participation:</strong> " . $row["total_attendance_participation"]. "</div>
        <div class='info-item'><strong>Weighted Attendance & Participation:</strong> " . $row["weighted_attendance_participation"]. "</div>
    </div>";

    echo "<div class='info-sectionn info-section-laboratory'>
    <h2>Laboratory</h2>";
for ($i = 1; $i <= 10; $i++) {
echo "<div class='info-item'><strong>Lab $i:</strong> " . $row["lab_$i"] . "</div>";
}


echo "<div class='info-section-laboratory'>
    <div class='info-item'><strong>Total Lab:</strong> " . $row["total_lab"] . "</div>
</div>";
echo "</div>";
echo "<div class='info-sectionn info-section-practical'>
    <h2>Practical</h2>";
for ($i = 1; $i <= 5; $i++) {
echo "<div class='info-item'><strong>Practical $i:</strong> " . $row["practical_$i"]. "</div>";
}
echo "<div class='info-section-practical'>
    <div class='info-item'><strong>Total Practical:</strong> " . $row["total_practical"] . "</div>
</div>";
echo "</div>";

echo "<div class='info-sectionn info-section-weighted'>
        <h2>Weighted</h2>
        <div class='info-item'><strong>Weighted Attendance & Participation 20%:</strong> " . $row["weighted_attendance_participation"]. "%</div>
        <div class='info-item'><strong>Weighted Lab 50%:</strong> " . $row["weighted_lab"]. "%</div>
        <div class='info-item'><strong>Weighted Practical 30%:</strong> " . $row["weighted_practical"]. "%</div>
    </div>";
    echo "<h2>________________________________________________________________________________________________________________________________</h2>";
                }
            } else {
                echo "Lab Midterm data not found for the student.";
            }
            $conn->close();
        } else {
            echo "Invalid request. Please select a student.";
        }
        ?>
     
    </div>
</body>
</html>
