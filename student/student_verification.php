<?php
session_start();

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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_code = $_POST["student_code"];
    $password = $_POST["password"];
    
    $sql = "SELECT * FROM students_registration WHERE username = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die("Error preparing statement: " . $conn->error);
    }

    // Bind parameters
    $stmt->bind_param("s", $student_code);
    
    // Execute query
    $stmt->execute();

    // Get result
    $result = $stmt->get_result();

    if ($result === false) {
        die("Error executing query: " . $stmt->error);
    } else {
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $stored_password = $row["password"];
            $is_archived = $row["archived"]; // Fetching the archived status
            
            if ($is_archived == 1) {
                echo '<script>alert("Your account is archived. Please contact support for assistance.");';
                echo 'window.location.href = "studentlogin.php";</script>';
                exit(); // Stop further execution
            } else {
                if (password_verify($password, $stored_password)) {
                    // Store the student code in the session
                    $_SESSION['student_code'] = $student_code;

                    // Redirect to student_student_grades.php using HTML form
                    echo '<form id="redirectForm" action="student_grades.php" method="post">';
                    echo '<input type="hidden" name="student_code" value="'.$student_code.'">';
                    echo '</form>';
                    echo '<script>';
                    echo 'alert("Login successful!");';
                    echo 'document.getElementById("redirectForm").submit();';
                    echo '</script>';
                    exit();
                } else {
                    echo '<script>alert("Incorrect password. Please try again.");';
                    echo 'window.location.href = "studentlogin.php";</script>';
                }
            }
        } else {
            echo '<script>alert("Student code not found.");';
            echo 'window.location.href = "studentlogin.php";</script>';
        }
    }
    $stmt->close();
} 

$conn->close();
?>
