<!DOCTYPE html>
<html lang="en">

<head>
    <title>Teacher | My Reply Messages</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #fff;
            margin: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
        }

        .content {
            width: 100%;
            background-color: #026c3b;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
        }

        .logo img {
            width: 296px;
            height: 64px;
            alt: "Logo";
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 80%;
            width: 100%;
            overflow-x: auto;
        }

        h3 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        form {
            margin-top: 20px;
        }

        textarea {
            width: 100%;
            padding: 15px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 8px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
            padding: 15px 30px;
            font-size: 18px;
            border: none;
            border-radius: 8px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .btn {
            background-color: #FF9400;
            color: #fff;
            margin-top: 20px;
            padding: 15px 30px;
            font-size: 18px;
            text-decoration: none;
            border-radius: 8px;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #FF7D00;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

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
<div class="content">
        <div class="logo"> 
            <img src="logo.png" width="296" height="64" alt="Logo">        
        </div>
    </div>
    <div class="container">
        <?php
        include 'config.php';

        // Check if the 'id' parameter is set in the URL
        if (isset($_GET['id'])) {
            // Sanitize the 'id' parameter
            $message_id = mysqli_real_escape_string($conn, $_GET['id']);

            // Query to retrieve the message based on the provided ID
            $message_query = mysqli_query($conn, "SELECT * FROM teacher_messages WHERE id = '$message_id'");

            if ($message_query) {
                // Fetch the message details
                $message = mysqli_fetch_assoc($message_query);

                // Display the message details including student_code
                echo '<h3>Replying to Message</h3>';
                echo '<p>Teacher: ' . $message['teacher_name'] . '</p>';
                echo '<p>Student Code: ' . $message['student_code'] . '</p>';
                echo '<p>Message Text: ' . $message['message_text'] . '</p>';

                // Here you can create a form for replying to the message
                echo '<form method="post" action="reply_process.php">';
                echo '<input type="hidden" name="message_id" value="' . $message_id . '">';
                echo '<input type="hidden" name="teacher_name" value="' . $message['teacher_name'] . '">';
                echo '<input type="hidden" name="student_code" value="' . $message['student_code'] . '">';
                echo '<textarea name="reply_message" placeholder="Enter your reply here" required></textarea><br>';

                echo '<input type="submit" value="Send Reply">';
                // Button to view messages in student_messages table
                echo '<a href="view_teacher_messages.php" class="btn">View Student Messages</a>';
                echo '</form>';
            } else {
                echo 'Message not found.';
            }
        } else {
            echo 'Message ID not provided.';
        }
        ?>
    </div>
</body>

</html>
