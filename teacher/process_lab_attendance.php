<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    // Database connection configuration
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

    // Insert data for each student
    for ($i = 1; isset($_POST["student_name_$i"]); $i++) {
        $studentName = $_POST["student_name_$i"];
        $studentNumber = $_POST["student_number_$i"];
        $individualTotalAttendance = $_POST["final_total_attendance_$i"];
        $individualWeightedAttendance = $_POST["final_weighted_attendance_$i"];
        $section = $_POST["section"];
        $subject = $_POST["subject"];
        $hpsFinalTotalAttendance = $_POST['hps_final_total_attendance'];
        $hpsFinalWeightedAttendance = $_POST['hps_final_weighted_attendance'];

        // Check if the record already exists
        $checkIfExistsQuery = "SELECT * FROM lab_midterm_attendance WHERE student_name = ? AND student_number = ? AND section = ? AND subject = ?";
        $stmtCheck = $conn->prepare($checkIfExistsQuery);
        $stmtCheck->bind_param("ssss", $studentName, $studentNumber, $section, $subject);
        $stmtCheck->execute();
        $resultCheck = $stmtCheck->get_result();

        if ($resultCheck->num_rows > 0) {
            echo "<script>alert('Record already exists for Student $studentName, Number $studentNumber, Section $section, and Subject $subject');window.history.go(-1);</script>";
        } else {
            // Use prepared statements to prevent SQL injection
            $stmt = $conn->prepare("INSERT INTO lab_midterm_attendance (student_name, student_number, final_total_attendance, final_weighted_attendance, section, subject, hps_final_total_attendance, hps_final_weighted_attendance) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

            $stmt->bind_param("ssddssdd", $studentName, $studentNumber, $individualTotalAttendance, $individualWeightedAttendance, $section, $subject, $hpsFinalTotalAttendance, $hpsFinalWeightedAttendance);

            if ($stmt->execute() !== TRUE) {
                echo "Error inserting data for student $i: " . $stmt->error;
            }

            $stmt->close();
        }

        $stmtCheck->close();
    }

    // Close the database connection
    $conn->close();

    // Display success message and provide a link to go back
    echo '<script>alert("Data submitted successfully!");</script>';
    echo '<script>window.history.go(-1);</script>';
}
?>
