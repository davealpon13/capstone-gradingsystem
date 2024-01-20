<!DOCTYPE html>
<html>
<head>
    <title>Student | My Messages</title>
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
        <h1>My Messages</h1>

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
            if (isset($_POST['delete_message'])) {
                $message_id = $_POST['message_id'] ?? '';
                $delete_sql = "DELETE FROM teacher_messages WHERE id = '$message_id' AND student_code = '$student_code'";
                if ($conn->query($delete_sql) === TRUE) {
                    // JavaScript alert for successful deletion
                    echo '<script>alert("Message deleted successfully");</script>';
                } else {
                    echo "Error deleting message: " . $conn->error;
                }
            }
        }

        $sql = "SELECT id, teacher_name, message_text FROM teacher_messages WHERE student_code = '$student_code'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                $message_id = $row['id'];
                $teacher_name = $row['teacher_name'];
                $message_text = $row['message_text'];

                // Display each message with a delete button
                echo "<div class='message'>";
                echo "<p><strong>To:</strong> $teacher_name</p>";
                echo "<p><strong>Message:</strong><br>$message_text</p>";
                
                // Delete button for each message
                echo "<form method='post'>";
                echo "<input type='hidden' name='message_id' value='$message_id'>";
                echo "<input type='hidden' name='student_code' value='$student_code'>";
                echo "<input type='submit' name='delete_message' value='Delete'>";
                echo "</form>";

                echo "</div>";
            }
        } else {
            echo "<p>No messages found.</p>";
        }

        $conn->close();
        ?>
       
    </div>
    <script>
        // JavaScript for confirming message deletion
        function confirmDelete() {
            return confirm("Are you sure you want to delete this message?");
        }
    </script>
</body>
</html>
