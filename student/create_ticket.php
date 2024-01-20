<!DOCTYPE html>
<html>
<head>
    <title>Message Admin</title>
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
    padding-left: 20px; /* Adjust the padding to leave space for the icon */
    background-size: 50px 50px; /* Adjust the size of the icon */
    cursor: pointer; /* Add cursor pointer to indicate it's clickable */
    border: none; /* Remove the border to make it look like a button */
    margin-right: 20px;
}

.sendmessage img {
    display: inline-block; /* Display the img element inside the button */
    vertical-align: middle; /* Align the image vertically in the middle */
    margin-right: 20px; /* Adjust the margin for better spacing */
}
.sendmessage[value="Send Message"] {
    background: url('sendmessage.png') no-repeat 10px center; /* Position the icon to the left of the text */
    background-size: 50px 50px; /* Adjust the size of the icon */
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
    <?php
session_start();
$student_code = $_GET['student_code'] ?? '';

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "osrs_db";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $message_text = $_POST['message_text'] ?? '';
    $student_code = $_POST['student_code'] ?? '';

    $message_text_escaped = $conn->real_escape_string($message_text);
    $student_code_escaped = $conn->real_escape_string($student_code);

    $check_query = "SELECT archive FROM students WHERE student_code = '$student_code_escaped' AND archive = 1";
    $result = $conn->query($check_query);

    if ($result && $result->num_rows > 0) {
        echo "The admin disabled the message box.";
    } else {
        $insert_sql = "INSERT INTO student_admin (student_code, message_text) VALUES ('$student_code_escaped', '$message_text_escaped')";

        if ($conn->query($insert_sql) === TRUE) {
            echo "<p>Message sent successfully!</p>";
        } else {
            echo "Error: " . $insert_sql . "<br>" . $conn->error;
        }
    }
}
?>


<h1>Message Admin</h1>
<p>Student Code: <?php echo htmlspecialchars($student_code); ?></p> <!-- Displaying student code -->

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="message_text">Message:</label><br>
    <textarea name="message_text" rows="10" cols="50" required></textarea><br>
    <input type="hidden" name="student_code" value="<?php echo htmlspecialchars($student_code); ?>">
    
    <div class="action-buttons">
    <input type="submit" class="sendmessage" value="Send Message">
    <a href="view_admin.php?student_code=<?php echo urlencode($student_code); ?>" class="midterm-btn sendmessage">
        <img src="inbox.png" alt="My Messages Icon"> My Messages
    </a>
    <a href="view_admin_reply.php?student_code=<?php echo urlencode($student_code); ?>" class="midterm-btn sendmessage">
        <img src="administrator.png" alt="Admin Messages Icon"> Admin Messages
    </a>
    <button onclick="window.history.back()" class="logout-btn sendmessage">
        <img src="back.png" alt="Back Icon"> Back
    </button>
</div>
</form>

<?php
$conn->close();
?>

    </div>
</body>
</html>