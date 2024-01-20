<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratory Midterm</title>
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
    $attendanceSql = "SELECT * FROM lab_midterm_attendance WHERE section = '$section' AND subject = '$subject'";
    $attendanceResult = $conn->query($attendanceSql);
    
    // Display the section and subject for attendance
    echo "<h1>Section: $section</h1>";
    echo "<h2>Subject: $subject</h2>";
    
    // Check if there are records for attendance
    if ($attendanceResult->num_rows > 0) {
        // Display the attendance records in a table
        echo "<h3>Attendance Records</h3>";
        echo "<table border='1'>";
        echo "<tr><th>Student Name</th><th>Student Number</th><th>Final Total Attendance</th><th>Final Weighted Attendance</th><th>Action</th></tr>";
    
        while ($row = $attendanceResult->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['student_name'] . "</td>";
            echo "<td>" . $row['student_number'] . "</td>";
            echo "<td>" . $row['final_total_attendance'] . "</td>";
            echo "<td>" . $row['final_weighted_attendance'] . "</td>";
    
            // Add a delete button for each row
            echo "<td><form method='post' action='delete_lab_attendance.php'>";
            echo "<input type='hidden' name='attendance_id' value='" . $row['id'] . "'>";
            echo "<input type='submit' value='Delete' onclick='return confirm(\"Are you sure you want to delete this record?\")'>";
            echo "</form></td>";
    
            echo "</tr>";
        }
    
        echo "</table>";
    } else {
        echo "No attendance records found for the specified section and subject.";
    }
    

    // Fetch records from the lab_midterm_lab table based on section and subject
$labSql = "SELECT * FROM lab_midterm_lab WHERE section = '$section' AND subject = '$subject'";
$labResult = $conn->query($labSql);

// Check if there are records for lab activities
if ($labResult->num_rows > 0) {
    // Display the lab records in a table
    echo "<h3>Laboratory Records</h3>";
    echo "<table border='1'>";
    echo "<tr><th>Student Name</th><th>Student Number</th>";

    // Display headers for lab activities dynamically
    for ($i = 1; $i <= 10; $i++) {
        echo "<th>Lab Activity $i</th>";
    }

    echo "<th>Total</th><th>Weighted</th><th>Action</th></tr>";

    while ($row = $labResult->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['student_name'] . "</td>";
        echo "<td>" . $row['student_number'] . "</td>";

        // Display values for lab activities dynamically
        for ($i = 1; $i <= 10; $i++) {
            echo "<td>" . $row["lab_activity_$i"] . "</td>";
        }

        echo "<td>" . $row['total'] . "</td>";
        echo "<td>" . $row['weighted'] . "</td>";
        echo "<td><form method='post' action='delete_lab_lab.php'>";
        echo "<input type='hidden' name='lab_id' value='" . $row['id'] . "'>";
        echo "<input type='submit' value='Delete' onclick='return confirm(\"Are you sure you want to delete this record?\")'>";
        echo "</form></td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "No lab records found for the specified section and subject.";
}

// Fetch records from the lab_midterm_exam table based on section and subject
$examSql = "SELECT * FROM lab_midterm_exam WHERE section = '$section' AND subject = '$subject'";
$examResult = $conn->query($examSql);

// Check if there are records for exam activities
if ($examResult->num_rows > 0) {
    // Display the exam records in a table
    echo "<h3>Exam Records</h3>";
    echo "<table border='1'>";
    echo "<tr><th>Student Name</th><th>Student Number</th>";

    // Display headers for exam activities dynamically
    for ($i = 1; $i <= 5; $i++) {
        echo "<th>Exam $i</th>";
    }

    echo "<th>Total</th><th>Weighted</th><th>Action</th></tr>";

    while ($row = $examResult->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['student_name'] . "</td>";
        echo "<td>" . $row['student_number'] . "</td>";
      

        // Display values for exam activities dynamically
        for ($i = 1; $i <= 5; $i++) {
            echo "<td>" . $row["exam_$i"] . "</td>";
        }

        echo "<td>" . $row['exam_total'] . "</td>";
        echo "<td>" . $row['exam_weighted'] . "</td>";
        echo "<td><form method='post' action='delete_lab_exam.php'>";
        echo "<input type='hidden' name='exam_id' value='" . $row['id'] . "'>";
        echo "<input type='submit' value='Delete' onclick='return confirm(\"Are you sure you want to delete this record?\")'>";
        echo "</form></td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "No exam records found for the specified section and subject.";
}

   
}

?>
</body>

</html>