<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratory Midterm Grades</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        h1 {
            text-align: center;
        }

        /* Add this style to hide the ID column */
        .hidden-id {
            display: none;
        }
    </style>
</head>
<body>

<?php
// Check if the student_code parameter is set in the URL
if(isset($_GET['student_code'])) {
    // Get and display the value of student_code
    $studentCode = $_GET['student_code'];

    // Database connection details (replace with your actual database credentials)
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

    // Fetch the last name from the students table based on the student code
    $sql = "SELECT lastname FROM students WHERE student_code = '$studentCode'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Display the student code
        echo "<h2>Student Code: $studentCode</h2>";

        // Fetch and display the last name
        $row = $result->fetch_assoc();
        $lastName = $row['lastname'];
        echo "<h2>Last Name: $lastName</h2>";
    } else {
        // Display an error message if no matching record is found
        echo "<h2>No record found for Student Code: $studentCode</h2>";
    }

    echo "<h1>Laboratory Midterm Grades</h1>";

    // Query for lab_midterm_attendance table
    $queryAttendance = "SELECT * FROM lab_midterm_attendance WHERE student_number = '$studentCode' AND student_name = '$lastName'";
    $resultAttendance = $conn->query($queryAttendance);

    // Check if there is no data in lab_midterm_attendance table
    if ($resultAttendance && $resultAttendance->num_rows > 0) {
        // Display attendance data for lab_midterm_attendance table
        echo "<h3>Attendance Data</h3>";
        echo "<table>";
        $row = $resultAttendance->fetch_assoc();
        echo "<tr>";
        foreach ($row as $columnName => $value) {
            // Hide the ID column
            if ($columnName !== 'id') {
                echo "<th>$columnName</th>";
            }
        }
        echo "</tr>";

        // Display data rows
        echo "<tr>";
        foreach ($row as $columnName => $value) {
            // Hide the ID column
            if ($columnName !== 'id') {
                echo "<td>$value</td>";
            }
        }
        echo "</tr>";

        echo "</table>";
    } else {
        echo "<p>No matching records found in both lab_midterm_attendance and lab_midterm_attendance tables.</p>";
    }

    // Check for lab_midterm_lab table if no data in both lab_midterm_attendance and lab_midterm_attendance
    $queryLabLab = "SELECT * FROM lab_midterm_lab WHERE student_number = '$studentCode' AND student_name = '$lastName'";
    $resultLabLab = $conn->query($queryLabLab);

    // Check if there are rows returned in lab_midterm_lab
    if ($resultLabLab && $resultLabLab->num_rows > 0) {
        // Display lab data for lab_midterm_lab table
        echo "<h3>Lab Data</h3>";
        echo "<table>";
        $row = $resultLabLab->fetch_assoc();
        echo "<tr>";
        foreach ($row as $columnName => $value) {
            // Hide the ID column
            if ($columnName !== 'id') {
                echo "<th>$columnName</th>";
            }
        }
        echo "</tr>";

        // Display data rows
        echo "<tr>";
        foreach ($row as $columnName => $value) {
            // Hide the ID column
            if ($columnName !== 'id') {
                echo "<td>$value</td>";
            }
        }
        echo "</tr>";

        echo "</table>";
    } else {
        echo "<p>No matching records found in lab_midterm_attendance, lab_midterm_attendance, and lab_midterm_lab tables.</p>";
    }

    // Check for lab_midterm_exam table if no data in lab_midterm_attendance, lab_midterm_attendance, and lab_midterm_lab
    $queryLabExam = "SELECT * FROM lab_midterm_exam WHERE student_number = '$studentCode' AND student_name = '$lastName'";
    $resultLabExam = $conn->query($queryLabExam);

    // Check if there are rows returned in lab_midterm_exam
    if ($resultLabExam && $resultLabExam->num_rows > 0) {
        // Display exam data for lab_midterm_exam table
        echo "<h3>Exam Data</h3>";
        echo "<table>";
        $row = $resultLabExam->fetch_assoc();
        echo "<tr>";
        foreach ($row as $columnName => $value) {
            // Hide the ID column
            if ($columnName !== 'id') {
                echo "<th>$columnName</th>";
            }
        }
        echo "</tr>";

        // Display data rows
        echo "<tr>";
        foreach ($row as $columnName => $value) {
            // Hide the ID column
            if ($columnName !== 'id') {
                echo "<td>$value</td>";
            }
        }
        echo "</tr>";

        echo "</table>";
    } else {
        echo "<p>No matching records found in lab_midterm_attendance, lab_midterm_attendance, lab_midterm_lab, and lab_midterm_exam tables.</p>";
    }
}
?>

<!-- Add the rest of your HTML content here -->

</body>
</html>
