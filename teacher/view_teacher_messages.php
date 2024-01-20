<!DOCTYPE html>
<html lang="en">
<head>
    <title>Teacher Messages</title>
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
            max-width: 100%;
            width: 100%;
        }

        h2 {
            font-size: 28px;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .delete-btn {
            border: none;
            padding: 8px 15px;
            border-radius: 5px;
            background-color: #ff3333;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .delete-btn:hover {
            background-color: #cc0000;
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
    <h2>My Messages</h2>
    <table>
        <thead>
            <tr>
                <th>Teacher Name</th>
                <th>Student Code</th>
                <th>Message Text</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include 'config.php';

            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_message'])) {
                $message_id = $_POST['delete_message'];

                // Delete the message from the database
                $delete_query = mysqli_query($conn, "DELETE FROM student_messages WHERE id = '$message_id'");
                if (!$delete_query) {
                    echo "Error deleting message: " . mysqli_error($conn);
                }
            }

            // Query to retrieve messages from student_messages table
            $messages_query = mysqli_query($conn, "SELECT * FROM student_messages");

            if ($messages_query && mysqli_num_rows($messages_query) > 0) {
                while ($row = mysqli_fetch_assoc($messages_query)) {
                    echo '<tr>';
                    echo '<td>' . $row['teacher_name'] . '</td>';
                    echo '<td>' . $row['student_code'] . '</td>';
                    echo '<td>' . $row['message_text'] . '</td>';
                    echo '<td>' . $row['created_at'] . '</td>';
                    echo '<td>
                            <form method="post" action="">
                                <input type="hidden" name="delete_message" value="' . $row['id'] . '">
                                <button class="delete-btn" type="submit">Delete</button>
                            </form>
                          </td>';
                    echo '</tr>';
                }
            } else {
                echo '<tr><td colspan="5">No messages found.</td></tr>';
            }
            ?>
        </tbody>
    </table>
</div>
</body>
</html>
