<?php
session_start();

// Retrieve the student's code from the URL parameter
$student_code = $_GET['student_code'] ?? '';

// Perform necessary database connection
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

// Fetch messages from the database based on the provided student_code
$sql = "SELECT teacher_name, message_text FROM student_messages WHERE student_code = '$student_code'";
$result = $conn->query($sql);

// Check if there are any messages
if ($result->num_rows > 0) {
    $teacher_messages = array();
    // Fetch and store messages in $teacher_messages array
    while ($row = $result->fetch_assoc()) {
        $teacher_messages[] = array(
            "teacher_name" => $row['teacher_name'],
            "message_text" => $row['message_text']
        );
    }
} else {
    $teacher_messages = array(); // No messages found for this student
}

$conn->close(); // Close the database connection
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student | Teacher Messages</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: white;
        }

        .container {
    width: 80%;
    margin: 20px auto;
    background-color: #ffffff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.8);
    border: 2px solid #333;
}

.container h1 {
    color: #333;
    text-align: center;
}

.container p {
    margin: 10px 0;
    font-size: 16px;
}

.container form {
    margin-top: 20px;
    display: flex;
    flex-direction: column;
    align-items: center;
}

.container label {
    font-size: 18px;
}

.container select,
.container textarea {
    width: 100%;
    padding: 10px;
    margin: 8px 0;
    box-sizing: border-box;
}

.container input[type="submit"],
.container .midterm-btn,
.container .logout-btn {
    background-color: #4caf50;
    color: #ffffff;
    border: none;
    padding: 15px 30px; /* Adjust padding for a larger button */
    font-size: 20px; /* Adjust font size for a larger button */
    cursor: pointer;
    border-radius: 5px;
    margin-top: 10px;
}

.container input[type="submit"]:hover,
.container .midterm-btn:hover,
.container .logout-btn:hover {
    background-color: #45a049;
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
        .content-text {
    color: #333;
    text-align: center;
    }
    .content {
    padding: 5px;
    background-color: #026c3b;
    display: flex;
    align-items: center;
    transition: transform 0.3s;
    margin-right: 10px;
}

.logo img {
    display: block;
    margin: 0 auto;
}
.container form {
    margin-top: 20px;
    display: flex;
    flex-direction: column;
    align-items: center;
}

.container .action-buttons {
    display: flex;
    justify-content: space-between;
    width: 100%;
    margin-top: 10px;
}

.container .action-buttons input,
.container .action-buttons a,
.container .action-buttons button {
    flex: 1;
    margin: 0 5px;
    text-decoration: none;
    color: black;
    text-align: center;

}

.container .action-buttons button,
.container .action-buttons .midterm-btn,
.container .action-buttons .logout-btn {
    flex: 1;
    margin: 0 5px;
}

.sendmessage {
    display: float;
    align-items: center;
    padding-left: 30px; /* Adjust the padding to leave space for the icon */
    background: url('sendmessage.png') no-repeat 10px center; /* Position the icon to the left of the text */
    background-size: 60px 60px; /* Adjust the size of the icon */
    cursor: pointer; /* Add cursor pointer to indicate it's clickable */
    border: none; /* Remove the border to make it look like a button */
}

.sendmessage img {
    display: none; /* Hide the img element inside the button */
    margin-right: 5px; /* Adjust the margin as needed for spacing */
}

    </style>
</head>
<body>
<div class="content">
        <div class="logo"> 
           <img src="logo.png" width="296" height="64" alt="Logo">        
        </div>
</div>
<div class="container">
    <h1>Teacher Messages</h1>
    <h2>Messages for Student with Code: <?php echo htmlspecialchars($student_code); ?></h2>

    <!-- Display fetched messages as a table -->
    <div class="message-list">
        <?php if (!empty($teacher_messages)) : ?>
            <table border="1">
                <thead>
                    <tr>
                        <th>Teacher Name</th>
                        <th>Message Text</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($teacher_messages as $message): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($message['teacher_name']); ?></td>
                            <td><?php echo htmlspecialchars($message['message_text']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else : ?>
            <p>No messages found for this student.</p>
        <?php endif; ?>
    </div>
</div>

</body>
</html>
