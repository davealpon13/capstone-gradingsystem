<!DOCTYPE html>
<html>
<head>
    <title>Message Admin</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #1B651B;
        }

        .container {
            width: 80%;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }

        .info-item {
            margin-bottom: 10px;
        }

        .logout-btn {
            background-color: #ff3333;
            color: #ffffff;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
        }

        .midterm-btn {
            background-color: #4caf50;
            color: #ffffff;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
<?php
// Assuming you have a database connection established
// Replace these variables with your actual database credentials
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

if (isset($_GET['student_code'])) {
    $student_code = $_GET['student_code'];

    // Fetch admin messages for the specific student_code
    $sql = "SELECT student_code, admin, message_text, created_at FROM admin_student WHERE student_code = '$student_code'";
    $result = $conn->query($sql);

    if ($result === false) {
        // Display error message if query fails
        echo "Error: " . $conn->error;
    } elseif ($result->num_rows > 0) {
        // Display records in a table
        echo '<h2>Admin Messages for Student Code: ' . $student_code . '</h2>';
        echo '<table border="1">';
        echo '<tr><th>Student Code</th><th>Admin</th><th>Message Text</th><th>Created At</th></tr>';
        
        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $row['student_code'] . '</td>';
            echo '<td>' . $row['admin'] . '</td>';
            echo '<td>' . $row['message_text'] . '</td>';
            echo '<td>' . $row['created_at'] . '</td>';
            echo '</tr>';
        }
        echo '</table>';
    } else {
        echo 'No records found for student code: ' . $student_code;
    }
} else {
    echo 'No student code provided.';
}

// Close the database connection
$conn->close();
?>
</div>
</body>
</html>
