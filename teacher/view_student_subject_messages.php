<!DOCTYPE html>
<html lang="en">
<head> 
    <title>Teacher | Messages</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            text-align: center;
            max-width: 60%;
            width: 80%;
            overflow-x: auto;
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .profile h3 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .section-btn,
        .btn,
        .delete-btn {
            border: none;
            padding: 12px 24px;
            border-radius: 8px;
            font-size: 18px;
            text-decoration: none;
            margin-top: 20px;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.3s;
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

        .content {
            width: 100%;
            height: 20;
            margin-top: -760px;
            background-color: #026c3b;
            display: flex;
            align-items: center;
        }

        .reply-btn {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 16px;
            text-decoration: none;
            margin-top: 20px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .reply-btn:hover {
            background-color: #45a049;
        }
        .back-home-btn {
            background-color: #FF9400;
            color: #fff;
            border: none;
            padding: 12px 24px;
            border-radius: 8px;
            font-size: 18px;
            text-decoration: none;
            margin-top: 20px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .back-home-btn:hover {
            background-color: #FF7D00;
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

        $teacher_name = $_GET['teacher_name'] ?? '';
        $subject = $_GET['subject'] ?? '';
        $section = $_GET['section'] ?? '';

        echo "<h3>Teacher: $teacher_name</h3>";
        echo "<p>Subject: $subject</p>";
        echo "<p>Section: $section</p>";

        if (!empty($section) && !empty($subject)) {
            $safe_section = mysqli_real_escape_string($conn, $section);
            $safe_subject = mysqli_real_escape_string($conn, $subject);
            
            $teacher_name_like = '%' . mysqli_real_escape_string($conn, $safe_subject) . '%';
            $messages_query = mysqli_query($conn, "SELECT * FROM teacher_messages WHERE section = '$safe_section' AND teacher_name LIKE '$teacher_name_like'");

            if ($messages_query && mysqli_num_rows($messages_query) > 0) {
                echo '<div style="overflow-x: auto;">';
                echo '<table>';
                echo '<tr><th>Student Code</th><th>Teacher Name</th><th>Message Text</th><th>Created By</th><th>Action</th></tr>';

                while ($row = mysqli_fetch_assoc($messages_query)) {
                    echo '<tr>';
                    echo '<td>' . $row['student_code'] . '</td>';
                    echo '<td>' . $row['teacher_name'] . '</td>';
                    echo '<td>' . $row['message_text'] . '</td>';
                    echo '<td>' . $row['created_at'] . '</td>';
                    echo '<td><button class="reply-btn" onclick="location.href=\'reply.php?id=' . $row['id'] . '\'">Reply</button></td>';
                    echo '</tr>';
                }

                echo '</table>';
                echo '</div>';
            } else {
                echo "<p>No messages found for $teacher_name in section $section</p>";
            }
        } else {
            echo "<p>Teacher name or section is missing.</p>";
        }
        ?>
       <button class="back-home-btn" onclick="location.href='home.php'">Back Home</button>
    </div>
</body>
</html>
