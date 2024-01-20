<?php
// Connection parameters (modify as needed)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "osrs_db";
$tableName = "lecture_midterm_exam"; // Update to your table name

// Global variables
$hpsexam_score = isset($_POST['hpsexam_score']) ? filter_var($_POST['hpsexam_score'], FILTER_SANITIZE_NUMBER_INT) : 0;
$hpsexam_weighted = isset($_POST['hpsexam_weighted']) ? filter_var($_POST['hpsexam_weighted'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION) : 0;

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to check if a record already exists in the database
function recordExists($conn, $tableName, $student_number, $section, $subject) {
    $checkIfExistsQuery = "SELECT * FROM $tableName WHERE student_number = ? AND section = ? AND subject = ?";
    $stmt = $conn->prepare($checkIfExistsQuery);
    $stmt->bind_param("sss", $student_number, $section, $subject);
    $stmt->execute();
    $result = $stmt->get_result();

    return $result->num_rows > 0;
}

// Function to submit form data to the database
function submitFormData($conn, $tableName, $hpsexam_score, $hpsexam_weighted) {
    // Iterate through submitted data and insert into the database
    for ($i = 1; isset($_POST["student_number_$i"]); $i++) {
        // Sanitize and validate data
        $student_number = trim(filter_var($_POST["student_number_$i"], FILTER_SANITIZE_NUMBER_INT));
        $student_name = htmlspecialchars($_POST["student_name_$i"] ?? '');
        $section = htmlspecialchars($_POST["section"] ?? '');
        $subject = htmlspecialchars($_POST["subject"] ?? '');
        $exam_score = filter_var($_POST["mid_total_$i"] ?? 0, FILTER_SANITIZE_NUMBER_INT);
        $exam_weighted = filter_var($_POST["mid_weighted_$i"] ?? 0.00, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);

        // Check if student_number is not empty before inserting into the database
        if ($student_number !== '') {
            // Check if the record already exists
            if (recordExists($conn, $tableName, $student_number, $section, $subject)) {
                echo "<script>alert('Record already exists for Student Number $student_number, Section $section, and Subject $subject');window.history.go(-1);</script>";
            } else {
                // Insert data into the database
                $sql = "INSERT INTO $tableName (student_number, student_name, section, subject, exam_score, exam_weighted, hpsexam_score, hpsexam_weighted)
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

                $stmt = $conn->prepare($sql);

                // Bind parameters
                $stmt->bind_param("ssssdddd", $student_number, $student_name, $section, $subject, $exam_score, $exam_weighted, $hpsexam_score, $hpsexam_weighted);

                // Execute the statement
                if ($stmt->execute()) {
                    echo "Record inserted successfully for Student Number $student_number.<br>";
                    echo "<script>alert('Submission successful!');window.history.go(-1);</script>";
                } else {
                    echo "Error for Student Number $student_number: " . $stmt->error . "<br>";
                }

                // Close the statement
                $stmt->close();
            }
        } else {
            echo "Error: student_number is null or empty.<br>";
        }
    }
}

// Process form submissions
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    submitFormData($conn, $tableName, $hpsexam_score, $hpsexam_weighted);
}

// Close the database connection
$conn->close();
?>
