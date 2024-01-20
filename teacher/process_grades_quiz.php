<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "osrs_db";
$tableName = "lecture_midterm_quiz";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $i = 1;

    while (isset($_POST["student_name_$i"])) {
        $studentName = $_POST["student_name_$i"];
        $studentNumber = $_POST["student_number_$i"];
        $section = $_POST["section"];
        $subject = $_POST["subject"];

        $checkIfExistsQuery = "SELECT * FROM $tableName WHERE student_name = '$studentName' AND student_number = '$studentNumber' AND section = '$section' AND subject = '$subject'";
        $result = $conn->query($checkIfExistsQuery);

        if ($result->num_rows > 0) {
            echo "<script>alert('Record already exists for $studentName, $studentNumber, $section, $subject');window.history.go(-1);</script>";
        } else {
            $quizScores = array();
            for ($j = 1; $j <= 10; $j++) {
                $quizScores[] = $_POST["quiz_$i" . "_$j"];
            }

            for ($j = 1; $j <= 10; $j++) {
                ${"quiz_" . $j} = $_POST["quiz_$i" . "_$j"];
            }

            $quizScoresString = implode(',', $quizScores);

            $quizTotal = $_POST["quiz_total_$i"];
            $quizWeighted = $_POST["quiz_weighted_$i"];

            $hpsquiz_1 = $_POST["hpsquiz_1"];
            $hpsquiz_2 = $_POST["hpsquiz_2"];
            $hpsquiz_3 = $_POST["hpsquiz_3"];
            $hpsquiz_4 = $_POST["hpsquiz_4"];
            $hpsquiz_5 = $_POST["hpsquiz_5"];
            $hpsquiz_6 = $_POST["hpsquiz_6"];
            $hpsquiz_7 = $_POST["hpsquiz_7"];
            $hpsquiz_8 = $_POST["hpsquiz_8"];
            $hpsquiz_9 = $_POST["hpsquiz_9"];
            $hpsquiz_10 = $_POST["hpsquiz_10"];
            $hpsquiz_total = $_POST["hpsquiz_total"];
            $hpsquiz_weighted = $_POST["hpsquiz_weighted"];

            $sql = "INSERT INTO $tableName 
                    (student_name, student_number, section, subject, quiz_1, quiz_2, quiz_3, quiz_4, quiz_5, quiz_6, quiz_7, quiz_8, quiz_9, quiz_10, quiz_total, quiz_weighted, 
                    hpsquiz_1, hpsquiz_2, hpsquiz_3, hpsquiz_4, hpsquiz_5, hpsquiz_6, hpsquiz_7, hpsquiz_8, hpsquiz_9, hpsquiz_10, hpsquiz_total, hpsquiz_weighted) 
                    VALUES ('$studentName', '$studentNumber', '$section', '$subject', '$quiz_1', '$quiz_2', '$quiz_3', '$quiz_4', '$quiz_5', '$quiz_6', '$quiz_7', '$quiz_8', '$quiz_9', '$quiz_10', '$quizTotal', '$quizWeighted', 
                    '$hpsquiz_1', '$hpsquiz_2', '$hpsquiz_3', '$hpsquiz_4', '$hpsquiz_5', '$hpsquiz_6', '$hpsquiz_7', '$hpsquiz_8', '$hpsquiz_9', '$hpsquiz_10', '$hpsquiz_total', '$hpsquiz_weighted')";

            if ($conn->query($sql) !== TRUE) {
                echo "Error: " . $sql . "<br>" . $conn->error;
            } else {
                echo "<script>alert('Submission successful!');window.history.go(-1);</script>";
            }
        }

        $i++;
    }

    $conn->close();
}
?>
