<!DOCTYPE html>
<html>
<head>
    <title>Grading Sheet Table</title>
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
            $finals_sql = "SELECT * FROM grading_sheet WHERE student_code = '$student_code'";
            $finals_result = $conn->query($finals_sql);
            if ($finals_result && $finals_result->num_rows > 0) {
                while($row = $finals_result->fetch_assoc()) {
                    $subject = $row["subject"];
                    $section = $row["section"];
        
                    // Fetch teacher's name based on subject and section
                    $teacher_sql = "SELECT name FROM teacher WHERE subject = '$subject' AND section = '$section'";
                    $teacher_result = $conn->query($teacher_sql);
                    $teacher_name = ($teacher_result && $teacher_result->num_rows > 0) ? $teacher_result->fetch_assoc()["name"] : "Unknown";
                    echo "<div class='info-overall info-section-overall'><h2>Student Information</h2>" .
     "<div class='info-item'><strong>Lastname:</strong> " . $row["lastname"]. "</div>" .
     "<div class='info-item'><strong>Student Code:</strong> " . $row["student_code"]. "</div>" .
     "<div class='info-item'><strong>Section:</strong> " . $row["section"]. "</div>" .
     "<div class='info-item'><strong>Subject:</strong> " . $row["subject"]. "</div>" .
     "<div class='info-item'><strong>Teacher:</strong> " . $teacher_name . "</div>" .
     "<div class='info-item'><strong>Grade:</strong> " . $row["grade"]. "</div>" .
     "<div class='info-item'><strong>Credit:</strong> " . $row["credit"]. "</div>" .
     "<div class='info-item'><strong>Remarks:</strong> " . $row["remarks"]. "</div></div>";

                }
            } else {
                echo "Grading Sheet data not found for the student.";
            }
            $conn->close();
        } else {
            echo "Invalid request. Please select a student.";
        }
        ?>
  
    </div>
</body>
</html>
