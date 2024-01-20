<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher | Message Admin</title>
    <style>
       body {
    font-family: Arial, sans-serif;
    background-color: #WHITE;
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
    max-width: 400px;
    width: 100%;
}

.profile {
    margin-bottom: 20px;
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
    </style>
</head>

<body>
<div class="container">
<?php
// Establish a database connection (Replace these values with your database credentials)
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
if (isset($_GET['username'])) {
    $username = urldecode($_GET['username']);
    
    // Prepare a SQL statement to fetch data from admin_teacher based on teacher_name
    $sql = "SELECT * FROM admin_teacher WHERE teacher_name = ?";
    
    // Prepare and bind a parameterized statement
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("s", $username);
        $stmt->execute();
        
        // Get the result
        $result = $stmt->get_result();
        
        // Check if data is retrieved from admin_teacher table
        if ($result->num_rows > 0) {
            // Fetch data from admin_teacher based on teacher_name
            $sql_student = "SELECT teacher_name, admin, message_text, created_at FROM admin_teacher WHERE teacher_name = ?";
            
            // Prepare and bind a parameterized statement for admin_teacher table
            if ($stmt_student = $conn->prepare($sql_student)) {
                $stmt_student->bind_param("s", $username);
                $stmt_student->execute();
                
                // Get the result
                $result_student = $stmt_student->get_result();
                
                // Check if data is retrieved from admin_teacher table
                if ($result_student->num_rows > 0) {
                    echo "<table border='1'>";
                    echo "<tr><th>Teacher Name</th><th>Admin</th><th>Message Text</th><th>Created</th></tr>";
                    while ($row = $result_student->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['teacher_name'] . "</td>";
                        echo "<td>" . $row['admin'] . "</td>";
                        echo "<td>" . $row['message_text'] . "</td>";
                        echo "<td>" . $row['created_at'] . "</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                } else {
                    echo "No data found in admin_teacher table for username: $username";
                }
                
                // Close admin_teacher statement
                $stmt_student->close();
            } else {
                echo "Error in preparing admin_teacher SQL statement: " . $conn->error;
            }
        } else {
            echo "No data found in admin_teacher table for username: $username";
        }
        
        // Close admin_teacher statement
        $stmt->close();
    } else {
        echo "Error in preparing admin_teacher SQL statement: " . $conn->error;
    }
} else {
    echo "No username specified.";
}

// Close the database connection
$conn->close();
?>
 
</body>
</html>
