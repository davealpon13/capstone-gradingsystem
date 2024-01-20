<!DOCTYPE html>
<html lang="en">
<head> 
    <title>Admin | My Messages Student</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #1B651B;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 100%;
            width: 100%;
            overflow-x: auto; /* Horizontal scrollbar if needed */
        }

        .profile h3 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .section-btn,
        .btn,
        .delete-btn {
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 16px;
            text-decoration: none;
            margin-top: 20px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .section-btn {
            background-color: #4CAF50;
            color: white;
            margin-right: 10px;
        }

        .section-btn:hover {
            background-color: #45a049;
        }

        .btn {
            background-color: #FF9400;
            color: #fff;
            margin-right: 10px;
        }

        .btn:hover {
            background-color: #FF7D00;
        }

        .delete-btn {
            color: #ff3333;
        }

        .delete-btn:hover {
            color: #cc0000;
        }

        .update-profile-section,
        .logout-section,
        .register-section {
            margin-top: 20px;
        }

        .update-profile-section a,
        .logout-section a,
        .register-section p a {
            text-decoration: none;
        }

        .update-profile-section a:hover,
        .logout-section a:hover,
        .register-section p a:hover {
            text-decoration: underline;
        }

        /* Table styles */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table th,
        table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        table th {
            background-color: #f2f2f2;
        }

        /* Message section styles */
        .messages {
            text-align: left;
            margin-top: 20px;
        }

        .message {
            margin-bottom: 10px;
            border: 1px solid #ddd;
            padding: 10px;
            border-radius: 5px;
        }

        .message p {
            margin: 5px 0;
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

    // Fetch records from the database for the specific student_code
    $sql = "SELECT student_code, admin, message_text, created_at FROM admin_student WHERE student_code = '$student_code'";
    $result = $conn->query($sql);

    if ($result === false) {
        // Display error message if query fails
        echo "Error: " . $conn->error;
    } elseif ($result->num_rows > 0) {
        // Display records in a table
        echo '<h2>My Messages Student</h2>';
        echo '<table border="1">';
        echo '<tr><th>Student Code</th><th>Admin</th><th>Message Text</th><th>Created At</th><th>Delete</th></tr>';
        
        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $row['student_code'] . '</td>';
            echo '<td>' . $row['admin'] . '</td>';
            echo '<td>' . $row['message_text'] . '</td>';
            echo '<td>' . $row['created_at'] . '</td>';
            echo '<td><form method="post" action="delete_message_admin.php">';
            echo '<input type="hidden" name="record_id" value="' . $row['student_code'] . '">';
            echo '<input type="submit" value="Delete" onclick="return confirm(\'Are you sure you want to delete this record?\')">';
            echo '</form></td>';
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