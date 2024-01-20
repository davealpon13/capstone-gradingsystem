<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "osrs_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $i = 1;
    while (isset($_POST["student_name_$i"])) {
        $studentName = $_POST["student_name_$i"];
        $studentNumber = $_POST["student_number_$i"];
        $section = $_POST["section"];
        $subject = $_POST["subject"];

        // Check if record already exists
        $checkQuery = "SELECT * FROM lab_midterm_lab WHERE student_name = ? AND student_number = ? AND section = ? AND subject = ?";
        $checkStmt = $conn->prepare($checkQuery);
        $checkStmt->bind_param("ssss", $studentName, $studentNumber, $section, $subject);
        $checkStmt->execute();
        $checkResult = $checkStmt->get_result();

        if ($checkResult->num_rows > 0) {
            echo '<script>alert("Record already exists for Student Name: ' . $studentName . ', Student Number: ' . $studentNumber . ', Section: ' . $section . ', Subject: ' . $subject . '"); window.history.go(-1);</script>';
        } else {
            // Continue with insertion
            $labScores = array();
            for ($j = 1; $j <= 10; $j++) {
                $labScores["lab_activity_$j"] = isset($_POST["final_quiz_number_${i}_${j}"]) ? intval($_POST["final_quiz_number_${i}_${j}"]) : 0;
            }

            $totalScore = array_sum($labScores);
            $weightedScore = $totalScore * 0.5;

            $paramTypes = "ss" . str_repeat('d', count($labScores) + 2) . str_repeat('d', count($labScores) + 2) . "ss";
            $paramValues = array_merge([$studentName, $studentNumber], array_values($labScores), [$totalScore, $weightedScore], array_values($labScores), [$totalScore, $weightedScore], [$section, $subject]);

            $stmt = $conn->prepare("INSERT INTO lab_midterm_lab (student_name, student_number, lab_activity_1, lab_activity_2, lab_activity_3, lab_activity_4, lab_activity_5, lab_activity_6, lab_activity_7, lab_activity_8, lab_activity_9, lab_activity_10, total, weighted, hps_lab_lab1, hps_lab_lab2, hps_lab_lab3, hps_lab_lab4, hps_lab_lab5, hps_lab_lab6, hps_lab_lab7, hps_lab_lab8, hps_lab_lab9, hps_lab_lab10, hps_lab_lab_total, hps_lab_lab_weighted, section, subject) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

            if ($stmt) {
                $stmt->bind_param($paramTypes, ...$paramValues);

                if ($stmt->execute()) {
                    echo '<script>alert("Record submitted successfully."); window.history.go(-1);</script>';
                } else {
                    echo "Error executing statement: " . $stmt->error . "<br>";
                }

                $stmt->close();
            } else {
                echo "Error preparing statement: " . $conn->error . "<br>";
            }
        }

        $checkStmt->close();
        $i++;
    }
}

$conn->close();
?>
