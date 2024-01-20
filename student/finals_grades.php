<!DOCTYPE html>
<html>
<head>
    <title>Finals Grades</title>
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
            $finals_sql = "SELECT * FROM finals WHERE student_code = '$student_code'";
            $finals_result = $conn->query($finals_sql);
            if ($finals_result && $finals_result->num_rows > 0) {
                while($row = $finals_result->fetch_assoc()) {
                    $subject = $row["subject"];
                    $section = $row["section"];
        
                    // Fetch teacher's name based on subject and section
                    $teacher_sql = "SELECT name FROM teacher WHERE subject = '$subject' AND section = '$section'";
                    $teacher_result = $conn->query($teacher_sql);
                    $teacher_name = ($teacher_result && $teacher_result->num_rows > 0) ? $teacher_result->fetch_assoc()["name"] : "Unknown";
                    echo "<div class='info-section info-section-student'>
        <h2>Student Information</h2>
        <div class='info-item'><strong>Student Code:</strong> " . $row["student_code"]. "</div>
        <div class='info-item'><strong>Section:</strong> " . $row["section"]. "</div>
        <div class='info-item'><strong>Subject:</strong> " . $row["subject"]. "</div>
        <div class='info-item'><strong>Teacher:</strong> " . $teacher_name . "</div>
      </div>";

echo "<div class='info-section info-section-attendance'>
        <h2>Attendance and Participation</h2>
        <div class='info-item'><strong>Attendance Days:</strong> " . $row["attendance_days"]. "</div>
        <div class='info-item'><strong>Participation Score:</strong> " . $row["participation_score"]. "</div>
      </div>";

      echo "<div class='info-section info-section-quizzes'>
      <h2>Quizzes</h2>";

for ($i = 1; $i <= 10; $i++) {
  echo "<div class='info-item'><strong>Quiz $i:</strong> " . $row["quiz_$i"]. "</div>";
}

echo "<div class='info-item'><strong>Total Quiz:</strong> " . $row["total_quiz"]. "</div>
    </div>";

echo "<div class='info-section info-section-outputs'>
    <h2>Outputs</h2>";


for ($i = 1; $i <= 10; $i++) {
  echo "<div class='info-item'><strong>Output $i:</strong> " . $row["output_$i"]. "</div>";
}

echo "<div class='info-item'><strong>Total Output:</strong> " . $row["total_output"]. "</div>
    </div>";
    echo "<div class='info-section info-section-midterm'>
    <h2>Laboratory Finals Exam</h2>
    <div class='info-item'><strong>Laboratory Finals Score:</strong> " . $row["finals_score"]. "</div>
  </div>";

  echo "<div class='info-section info-section-weighted-scores'>
  <h2>Weighted Scores</h2>
  <div class='info-item'><strong>Weighted Attendance 10%:</strong> " . $row["weighted_attendance"]. "%</div>
  <div class='info-item'><strong>Weighted Participation 10%:</strong> " . $row["weighted_participation"]. "%</div>" .
  "<div class='info-item'><strong>Weighted Quizzes 15%:</strong> " . $row["weighted_quizzes"]. "%</div>" .
  "<div class='info-item'><strong>Weighted Outputs 25%:</strong> " . $row["weighted_outputs"]. "%</div>" .
  "<div class='info-item'><strong>Weighted Finals 20%:</strong> " . $row["weighted_finals"]. "%</div>
</div>";
echo "<h2>________________________________________________________________________________________________________________________________</h2>";
         }
        } else {
            echo "Finals data not found for the student.";
        }
        $conn->close();
    } else {
        echo "Invalid request. Please select a student.";
    }
    
    ?>
     
    </div>
</body>
</html>
