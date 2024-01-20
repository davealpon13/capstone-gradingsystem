<?php
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

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    // Prepare the SQL statement
    $sql = $conn->prepare("INSERT INTO lab_midterm_exam (student_name, student_number, section, subject, exam_1, exam_2, exam_3, exam_4, exam_5, exam_total, exam_weighted,
    HPSexam_1, HPSexam_2, HPSexam_3, HPSexam_4, HPSexam_5, HPSexam_total_maxscore, HPSexam_weighted) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    // Check if the SQL statement was prepared successfully
    if (!$sql) {
        die("Error preparing SQL: " . $conn->error);
    }

    foreach ($_POST as $key => $value) {
        // Check if the key represents a student input field
        if (preg_match('/^exam_student_name_(\d+)$/', $key, $matches)) {
            $studentIndex = $matches[1];

            // Initialize variables
            $studentName = $value;
            $studentNumber = $_POST["exam_student_number_$studentIndex"];
            $section = $_POST["section"];
            $subject = $_POST["subject"];

            // Check if the record already exists
            $checkExistenceQuery = $conn->prepare("SELECT * FROM lab_midterm_exam WHERE student_name = ? AND student_number = ? AND section = ? AND subject = ?");
            $checkExistenceQuery->bind_param("siss", $studentName, $studentNumber, $section, $subject);
            $checkExistenceQuery->execute();
            $result = $checkExistenceQuery->get_result();

            if ($result->num_rows > 0) {
                echo '<script>alert("Record already exists. It will not be inserted into the table."); window.history.go(-1);</script>';
                $checkExistenceQuery->close();
                $sql->close();
                $conn->close();
                exit; // Exit to prevent further execution
            }

            // Continue with inserting the new record
            $exam1 = $_POST["output_number_${studentIndex}_1"] ?? 0;
            $exam2 = $_POST["output_number_${studentIndex}_2"] ?? 0;
            $exam3 = $_POST["output_number_${studentIndex}_3"] ?? 0;
            $exam4 = $_POST["output_number_${studentIndex}_4"] ?? 0;
            $exam5 = $_POST["output_number_${studentIndex}_5"] ?? 0;
            $examTotal = $_POST["output_total_$studentIndex"] ?? 0;
            $examWeighted = $_POST["output_weighted_$studentIndex"] ?? 0;
            $HPSexam_1 = $_POST["HPSexam_1"] ?? 0;
            $HPSexam_2 = $_POST["HPSexam_2"] ?? 0;
            $HPSexam_3 = $_POST["HPSexam_3"] ?? 0;
            $HPSexam_4 = $_POST["HPSexam_4"] ?? 0;
            $HPSexam_5 = $_POST["HPSexam_5"] ?? 0;
            $HPSexamTotalMaxScore = $_POST["HPSexam_total_maxscore"] ?? 0;
            $HPSexamWeighted = $_POST["HPSexam_weighted"] ?? 0;

            // Bind parameters
            $sql->bind_param("sissiiiiiidiiiiidd", $studentName, $studentNumber, $section, $subject, $exam1, $exam2, $exam3, $exam4, $exam5, $examTotal, $examWeighted, $HPSexam_1, $HPSexam_2, $HPSexam_3, $HPSexam_4, $HPSexam_5, $HPSexamTotalMaxScore, $HPSexamWeighted);

            // Execute the statement
            if (!$sql->execute()) {
                echo "Error: " . $sql->error;
            }
        }
    }

    echo '<script>alert("Record submitted successfully."); window.history.go(-1);</script>';
}

// Close the statement
$sql->close();

// Close the database connection
$conn->close();
?>
