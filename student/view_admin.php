<!DOCTYPE html>
<html>
<head>
    <title>My Messages</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: white;
        }

        .container {
            width: 95%;
            margin: 20px auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.8);
            border: 2px solid #333;
            max-height: 800px;
            overflow-y: auto;
        }
        .delete-btn {
            margin-left: auto; /* Move the delete button to the most right */
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
            padding: 15px 30px;
            font-size: 20px;
            cursor: pointer;
            border-radius: 5px;
            margin-top: 10px;
        }

        .container input[type="submit"]:hover,
        .container .midterm-btn:hover,
        .container .logout-btn:hover {
            background-color: #45a049;
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

        .message {
            margin-bottom: 20px;
            border: 1px solid #ddd;
            padding: 10px;
            border-radius: 5px;
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
                $delete_sql = "DELETE FROM student_admin WHERE id = '$message_id' AND student_code = '$student_code'";
                if ($conn->query($delete_sql) === TRUE) {
                    echo '<script>alert("Message deleted successfully");</script>';
                } else {
                    echo "Error deleting message: " . $conn->error;
                }
            }
        }

        $sql = "SELECT id, message_text FROM student_admin WHERE student_code = '$student_code'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $message_id = $row['id'];
                $message_text = $row['message_text'];

                echo "<div class='message'>";
                echo "<p><strong>Message:</strong><br>$message_text</p>";
                
                echo "<form method='post'>";
                echo "<input type='hidden' name='message_id' value='$message_id'>";
                echo "<input type='hidden' name='student_code' value='$student_code'>";
                echo "<input type='submit' name='delete_message' value='Delete'class='delete-btn'>";
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
        function confirmDelete() {
            return confirm("Are you sure you want to delete this message?");
        }
    </script>
</body>
</html>