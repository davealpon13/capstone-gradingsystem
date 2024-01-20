<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lecture Midterm</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            text-align: center; /* Center align the content */
        }

        h1, h2, h3 {
            color: #333;
        }

        table {
            width: 100%;
            margin-top: 10px;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        button {
            padding: 5px 10px;
            background-color: #ff6666;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #cc0000;
        }
    </style>
</head>
<body>
<?php
// Check if section and subject are set in the query parameters
if(isset($_GET['section']) && isset($_GET['subject'])) {
    $section = $_GET['section'];
    $subject = $_GET['subject'];

    // Connect to the database (replace 'your_username' and 'your_password' with your actual database username and password)
    $conn = new mysqli('localhost', 'root', '', 'osrs_db');

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Function to safely escape values for SQL statements
    function escape($value) {
        global $conn;
        return mysqli_real_escape_string($conn, $value);
    }

    // Function to handle delete operation
    function deleteRecord($tableName, $primaryKey, $primaryKeyValue) {
        global $conn;
        $sql = "DELETE FROM $tableName WHERE $primaryKey = '$primaryKeyValue'";
        return $conn->query($sql);
    }

    // Fetch records from the lecture_midterm_attendance table based on section and subject
    $attendanceSql = "SELECT * FROM lecture_midterm_attendance WHERE section = '$section' AND subject = '$subject'";
    $attendanceResult = $conn->query($attendanceSql);

    // Display the section and subject for attendance
    echo "<h1>Section: $section</h1>";
    echo "<h2>Subject: $subject</h2>";

    // Check if there are records for attendance
    if ($attendanceResult->num_rows > 0) {
        // Display the attendance records in a table
        echo "<h3>Attendance Records</h3>";
        echo "<table border='1'>";
        echo "<tr><th>Student Name</th><th>Student Number</th><th>Attendance Total</th><th>Attendance Weighted</th><th>Participation Total</th><th>Participation Weighted</th><th>Action</th></tr>";

        while ($row = $attendanceResult->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['student_name'] . "</td>";
            echo "<td>" . $row['student_number'] . "</td>";
            echo "<td>" . $row['attendance_total'] . "</td>";
            echo "<td>" . $row['attendance_weighted'] . "</td>";
            echo "<td>" . $row['participation_total'] . "</td>";
            echo "<td>" . $row['participation_weighted'] . "</td>";
        
            // Add a delete button for each row
            echo "<td><form method='post' action='delete_attendance.php'>";
            echo "<input type='hidden' name='attendance_id' value='" . $row['id'] . "'>";
            echo "<input type='submit' value='Delete' onclick='return confirm(\"Are you sure you want to delete this record?\")'>";
            echo "</form></td>";
        
            echo "</tr>";
        }
        

        echo "</table>";
    } else {
        echo "No attendance records found for the specified section and subject.";
    }

    // Fetch records from the lecture_midterm_quiz table based on section and subject
    $quizSql = "SELECT * FROM lecture_midterm_quiz WHERE section = '$section' AND subject = '$subject'";
    $quizResult = $conn->query($quizSql);

    // Check if there are records for quizzes
    if ($quizResult->num_rows > 0) {
        // Display the quiz records in a table
        echo "<h3>Quiz Records</h3>";
        echo "<table border='1'>";
        echo "<tr><th>Student Name</th><th>Student Number</th><th>Quiz 1</th><th>Quiz 2</th><th>Quiz 3</th><th>Quiz 4</th><th>Quiz 5</th><th>Quiz 6</th><th>Quiz 7</th><th>Quiz 8</th><th>Quiz 9</th><th>Quiz 10</th><th>Quiz Total</th><th>Quiz Weighted</th><th>Action</th></tr>";

        while($row = $quizResult->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['student_name'] . "</td>";
            echo "<td>" . $row['student_number'] . "</td>";
            echo "<td>" . $row['quiz_1'] . "</td>";
            echo "<td>" . $row['quiz_2'] . "</td>";
            echo "<td>" . $row['quiz_3'] . "</td>";
            echo "<td>" . $row['quiz_4'] . "</td>";
            echo "<td>" . $row['quiz_5'] . "</td>";
            echo "<td>" . $row['quiz_6'] . "</td>";
            echo "<td>" . $row['quiz_7'] . "</td>";
            echo "<td>" . $row['quiz_8'] . "</td>";
            echo "<td>" . $row['quiz_9'] . "</td>";
            echo "<td>" . $row['quiz_10'] . "</td>";
            echo "<td>" . $row['quiz_total'] . "</td>";
            echo "<td>" . $row['quiz_weighted'] . "</td>";
            echo "<td><form method='post' action='delete_quiz.php'>";
            echo "<input type='hidden' name='attendance_id' value='" . $row['id'] . "'>";
            echo "<input type='submit' value='Delete' onclick='return confirm(\"Are you sure you want to delete this record?\")'>";
            echo "</form></td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "No quiz records found for the specified section and subject.";
    }

    // Fetch records from the lecture_midterm_output table based on section and subject
    $outputSql = "SELECT * FROM lecture_midterm_output WHERE section = '$section' AND subject = '$subject'";
    $outputResult = $conn->query($outputSql);

    // Check if there are records for outputs
    if ($outputResult->num_rows > 0) {
        // Display the output records in a table
        echo "<h3>Output Records</h3>";
        echo "<table border='1'>";
        echo "<tr><th>Student Name</th><th>Student Number</th><th>Output 1</th><th>Output 2</th><th>Output 3</th><th>Output 4</th><th>Output 5</th><th>Output 6</th><th>Output 7</th><th>Output 8</th><th>Output 9</th><th>Output 10</th><th>Output Total</th><th>Output Weighted</th><th>Action</th></tr>";

        while($row = $outputResult->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['student_name'] . "</td>";
            echo "<td>" . $row['student_number'] . "</td>";
            echo "<td>" . $row['output_1'] . "</td>";
            echo "<td>" . $row['output_2'] . "</td>";
            echo "<td>" . $row['output_3'] . "</td>";
            echo "<td>" . $row['output_4'] . "</td>";
            echo "<td>" . $row['output_5'] . "</td>";
            echo "<td>" . $row['output_6'] . "</td>";
            echo "<td>" . $row['output_7'] . "</td>";
            echo "<td>" . $row['output_8'] . "</td>";
            echo "<td>" . $row['output_9'] . "</td>";
            echo "<td>" . $row['output_10'] . "</td>";
            echo "<td>" . $row['output_total'] . "</td>";
            echo "<td>" . $row['output_weighted'] . "</td>";
            echo "<td><form method='post' action='delete_outputs.php'>";
            echo "<input type='hidden' name='attendance_id' value='" . $row['id'] . "'>";
            echo "<input type='submit' value='Delete' onclick='return confirm(\"Are you sure you want to delete this record?\")'>";
            echo "</form></td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "No output records found for the specified section and subject.";
    }

    // Fetch records from the lecture_midterm_exam table based on section and subject
    $examSql = "SELECT * FROM lecture_midterm_exam WHERE section = '$section' AND subject = '$subject'";
    $examResult = $conn->query($examSql);

    // Check if there are records for exams
    if ($examResult->num_rows > 0) {
        // Display the exam records in a table
        echo "<h3>Exam Records</h3>";
        echo "<table border='1'>";
        echo "<tr><th>Student Name</th><th>Student Number</th><th>Exam Score</th><th>Exam Weighted</th><th>Action</th></tr>";

        while($row = $examResult->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['student_name'] . "</td>";
            echo "<td>" . $row['student_number'] . "</td>";
            echo "<td>" . $row['exam_score'] . "</td>";
            echo "<td>" . $row['exam_weighted'] . "</td>";
            echo "<td><form method='post' action='delete_exam.php'>";
            echo "<input type='hidden' name='attendance_id' value='" . $row['id'] . "'>";
            echo "<input type='submit' value='Delete' onclick='return confirm(\"Are you sure you want to delete this record?\")'>";
            echo "</form></td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "No exam records found for the specified section and subject.";
    }

    // Close the database connection
    $conn->close();
} else {
    // Handle the case where section or subject is not set
    echo "Error: Section or subject not provided.";
}

?>
</body>

</html>