<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "osrs_db";
$tableName = "lecture_midterm_output";

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
            $outputScores = array();
            for ($j = 1; $j <= 10; $j++) {
                $outputScores[] = $_POST["output_$i" . "_$j"];
            }

            $outputScoresString = implode(',', $outputScores);

            $outputTotal = $_POST["output_total_$i"];
            $outputWeighted = $_POST["output_weighted_$i"];

            $hpsoutput_1 = $_POST["hpsoutput_1"];
            $hpsoutput_2 = $_POST["hpsoutput_2"];
            $hpsoutput_3 = $_POST["hpsoutput_3"];
            $hpsoutput_4 = $_POST["hpsoutput_4"];
            $hpsoutput_5 = $_POST["hpsoutput_5"];
            $hpsoutput_6 = $_POST["hpsoutput_6"];
            $hpsoutput_7 = $_POST["hpsoutput_7"];
            $hpsoutput_8 = $_POST["hpsoutput_8"];
            $hpsoutput_9 = $_POST["hpsoutput_9"];
            $hpsoutput_10 = $_POST["hpsoutput_10"];
            $hpsoutput_total = $_POST["hpsoutput_total"];
            $hpsoutput_weighted = $_POST["hpsoutput_weighted"];

            $sql = "INSERT INTO $tableName 
                    (student_name, student_number, section, subject, output_1, output_2, output_3, output_4, output_5, output_6, output_7, output_8, output_9, output_10, output_total, output_weighted,
                    hpsoutput_1, hpsoutput_2, hpsoutput_3, hpsoutput_4, hpsoutput_5, hpsoutput_6, hpsoutput_7, hpsoutput_8, hpsoutput_9, hpsoutput_10, hpsoutput_total, hpsoutput_weighted) 
                    VALUES ('$studentName', '$studentNumber', '$section', '$subject', $outputScoresString, '$outputTotal', '$outputWeighted',
                    '$hpsoutput_1', '$hpsoutput_2', '$hpsoutput_3', '$hpsoutput_4', '$hpsoutput_5', '$hpsoutput_6', '$hpsoutput_7', '$hpsoutput_8', '$hpsoutput_9', '$hpsoutput_10', 
                    '$hpsoutput_total', '$hpsoutput_weighted')";

            if ($conn->query($sql) !== TRUE) {
                echo "Error: " . $sql . "<br>" . $conn->error;
            } else {
                echo '<script>alert("Submission successful!");window.history.go(-1);</script>';
            }
        }

        $i++;
    }

    $conn->close();
}
?>
