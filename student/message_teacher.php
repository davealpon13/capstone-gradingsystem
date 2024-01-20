<!DOCTYPE html>
<html>
<head>
    <title>Student | Message Teacher</title>
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
        <h1>Message Teacher</h1>
        <br>
        <?php
        session_start();
        $student_code = $_GET['student_code'] ?? '';
        $lastname = $_GET['lastname'] ?? '';
        $level = $_GET['level'] ?? '';
        $section = $_GET['section'] ?? '';

        echo "<p><strong>Student Code:</strong> $student_code</p><p><strong>Last Name:</strong> $lastname</p><p><strong>Level:</strong> $level</p><p><strong>Section:</strong> $section</p>";

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "osrs_db";
        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT teacher.name, teacher.subject FROM teacher LEFT JOIN user_form ON teacher.name = user_form.name WHERE teacher.section = '$level-$section' AND teacher.archived = 0 AND (user_form.name IS NULL OR user_form.archived = 0)";
        $result = $conn->query($sql);
        ?>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="selected_teacher">Select Teacher:</label><br>
            <select name="receiver_name" id="selected_teacher">
                <?php
                $result->data_seek(0);
                while ($row = $result->fetch_assoc()) {
                    $teacher_name = $row['name'];
                    $teacher_subject = $row['subject'];
                    echo "<option value='$teacher_name - $teacher_subject'>$teacher_name - $teacher_subject</option>";
                }
                ?>
            </select><br><br>
            <label for="message_text">Message:</label><br>
<textarea name="message_text" rows="15" cols="30" required></textarea><br>
<input type="hidden" name="student_code" value="<?php echo htmlspecialchars($student_code); ?>">
<input type="hidden" name="section" value="<?php echo htmlspecialchars($level . '-' . $section); ?>">


<div class="action-buttons">
    <input type="submit" value="Send Message" class="sendmessage">
    <a href="view_messages.php?student_code=<?php echo urlencode($student_code); ?>" class="midterm-btn button-with-icon">
        <img src="inbox.png" alt="My Messages Icon"> My Messages
    </a>
    <a href="view_teacher_reply.php?student_code=<?php echo urlencode($student_code); ?>" class="midterm-btn button-with-icon">
        <img src="teacher.png" alt="Teacher Messages Icon"> Teacher Messages
    </a>
    <button onclick="window.history.back()" class="logout-btn button-with-icon">
        <img src="back.png" alt="Back Icon"> Back
    </button>
</div>



        <?php
   if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $receiver_name = $_POST['receiver_name'] ?? '';
    $message_text = $_POST['message_text'] ?? '';
    $student_code = $_POST['student_code'] ?? '';
    $level = $_GET['level'] ?? '';
    $section = $_POST['section'] ?? '';

    $receiver_name_escaped = $conn->real_escape_string($receiver_name);
    $message_text_escaped = $conn->real_escape_string($message_text);
    $student_code_escaped = $conn->real_escape_string($student_code);
    $level_escaped = $conn->real_escape_string($level);
    $section_escaped = $conn->real_escape_string($section);

    $combined_section = $level_escaped . '' . $section_escaped;

    $insert_sql = "INSERT INTO teacher_messages (student_code, teacher_name, message_text, section) VALUES ('$student_code_escaped', '$receiver_name_escaped', '$message_text_escaped', '$combined_section')";

    if ($conn->query($insert_sql) === TRUE) {
        echo "<p>Message sent successfully!</p>";
    } else {
        echo "Error: " . $insert_sql . "<br>" . $conn->error;
    }
}
$conn->close();

        ?>
    </div>
</body>
</html>
