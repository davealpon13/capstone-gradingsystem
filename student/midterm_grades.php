<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lecture Midterm Grades</title>
    <style>
    table {
        border-collapse: collapse;
        width: 80%;
        margin: 20px auto;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        overflow: hidden;
    }

    th, td {
        border: 1px solid #e0e0e0;
        padding: 15px;
        text-align: left;
    }

    th {
        background-color: #f5f5f5;
    }

    tr:nth-child(even) {
        background-color: #fafafa;
    }

    h1 {
        text-align: center;
        margin-top: 40px;
        color: #333;
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

    echo "<h1>Lecture Midterm Grades</h1>";

    // Query for lecture_midterm_attendance table
    $queryAttendance = "SELECT * FROM lecture_midterm_attendance WHERE student_number = '$studentCode' AND student_name = '$lastName'";
    $resultAttendance = $conn->query($queryAttendance);

    // Check if the query for attendance was successful
    if ($resultAttendance) {
        // Check if there are rows returned
        if ($resultAttendance->num_rows > 0) {
            // Display attendance data in a table
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
            echo "<p>No matching records found in the lecture_midterm_attendance table.</p>";
        }
    } else {
        echo "<p>Error executing the query for attendance: " . $conn->error . "</p>";
    }

    // Query for lecture_midterm_quiz table
    $queryQuiz = "SELECT * FROM lecture_midterm_quiz WHERE student_number = '$studentCode' AND student_name = '$lastName'";
    $resultQuiz = $conn->query($queryQuiz);

    // Check if the query for quiz was successful
    if ($resultQuiz) {
        // Check if there are rows returned
        if ($resultQuiz->num_rows > 0) {
            // Display quiz data in a table
            echo "<h3>Quiz Data</h3>";
            echo "<table>";
            $row = $resultQuiz->fetch_assoc();
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
            echo "<p>No matching records found in the lecture_midterm_quiz table.</p>";
        }
    } else {
        echo "<p>Error executing the query for quiz: " . $conn->error . "</p>";
    }

    // Query for lecture_midterm_output table
    $queryOutput = "SELECT * FROM lecture_midterm_output WHERE student_number = '$studentCode' AND student_name = '$lastName'";
    $resultOutput = $conn->query($queryOutput);

    // Check if the query for output was successful
    if ($resultOutput) {
        // Check if there are rows returned
        if ($resultOutput->num_rows > 0) {
            // Display output data in a table
            echo "<h3>Output Data</h3>";
            echo "<table>";
            $row = $resultOutput->fetch_assoc();
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
            echo "<p>No matching records found in the lecture_midterm_output table.</p>";
        }
    } else {
        echo "<p>Error executing the query for output: " . $conn->error . "</p>";
    }

    // Query for lecture_midterm_exam table
    $queryExam = "SELECT * FROM lecture_midterm_exam WHERE student_number = '$studentCode' AND student_name = '$lastName'";
    $resultExam = $conn->query($queryExam);

    // Check if the query for exam was successful
    if ($resultExam) {
        // Check if there are rows returned
        if ($resultExam->num_rows > 0) {
            // Display exam data in a table
            echo "<h3>Exam Data</h3>";
            echo "<table>";
            $row = $resultExam->fetch_assoc();
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
            echo "<p>No matching records found in the lecture_midterm_exam table.</p>";
        }
    } else {
        echo "<p>Error executing the query for exam: " . $conn->error . "</p>";
    }

    // Close the database connection
    $conn->close();
} else {
    // Display an error message if student_code is not provided
    echo "<h2>Error: Student Code not found in the URL</h2>";
}
?>

<!-- Add the rest of your HTML content here -->

</body>
</html>
