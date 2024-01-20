<!DOCTYPE html>
<html lang="en">
<head> 
    <title>Admin | Reply Student Messages</title>
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
if (isset($_GET['student_code']) && isset($_GET['message_text']) && isset($_GET['created_at'])) {
    $student_code = $_GET['student_code'];
    $message_text = $_GET['message_text'];
    $created_at = $_GET['created_at'];

    echo '<h2>Reply Student Messages</h2>';
    echo '<p>Student Code: ' . $student_code . '</p>';
    echo '<p>Message Text: ' . $message_text . '</p>';
    echo '<p>Created At: ' . $created_at . '</p>';

    // Reply form
    echo '<form method="POST" action="reply_student_process.php">';
    echo '<input type="hidden" name="student_code" value="' . $student_code . '">';
    echo '<input type="hidden" name="message_text" value="' . $message_text . '">';
    echo '<input type="hidden" name="created_at" value="' . $created_at . '">';
    
    // Admin name input
    echo '<label for="admin_name">Admin Name:</label><br>';
    echo '<input type="text" id="admin_name" name="admin_name"><br>';
    
    echo '<label for="reply_message">Reply Message:</label><br>';
    echo '<textarea id="reply_message" name="reply_message" rows="4" cols="50"></textarea><br>';
    echo '<input type="submit" value="Send">';
    echo '<a href="view_message.php?student_code=' . $student_code . '">View User\'s Message</a>';
    echo '</form>';
} else {
    echo 'Error: Data not received.';
}
?>




   </div>
</body>
</html>

