<!DOCTYPE html>
<html lang="en">
<head> 
    <title>Messages</title>
    <style>
        body {
            background-image: url(bg.jpg);
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
            color: white;
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
include 'db_connect.php';

// Check if the Archive All or Unarchive All button is clicked
if (isset($_POST['archive_all'])) {
    $archiveValue = 1; // Set archive value to 1
    $updateQuery = "UPDATE students SET archive = $archiveValue";
    mysqli_query($conn, $updateQuery);
} elseif (isset($_POST['unarchive_all'])) {
    $archiveValue = 0; // Set archive value to 0
    $updateQuery = "UPDATE students SET archive = $archiveValue";
    mysqli_query($conn, $updateQuery);
}

$query = mysqli_query($conn, "SELECT student_code, message_text, created_at FROM student_admin");

if ($query && mysqli_num_rows($query) > 0) {
    // Display Archive All and Unarchive All buttons
    echo '<form method="POST" action="">';
    echo '<input type="submit" name="archive_all" value="Disabled All">';
    echo '<input type="submit" name="unarchive_all" value="Undisabled All">';
    echo '</form>';

    echo '<div style="overflow-x: auto;">';
    echo '<table>';
    echo '<tr><th>Student Code</th><th>Message Text</th><th>Created At</th><th>Reply</th></tr>';

    while ($row = mysqli_fetch_assoc($query)) {
        echo '<tr>';
        echo '<td>' . $row['student_code'] . '</td>';
        echo '<td>' . $row['message_text'] . '</td>';
        echo '<td>' . $row['created_at'] . '</td>';
        // Adding a form with a button for replying to the message
        echo '<td>';
        echo '<form method="GET" action="reply_student.php">';
        echo '<input type="hidden" name="student_code" value="' . $row['student_code'] . '">';
        echo '<input type="hidden" name="message_text" value="' . $row['message_text'] . '">';
        echo '<input type="hidden" name="created_at" value="' . $row['created_at'] . '">';
        echo '<input type="submit" value="Reply">';
        echo '</form>';
        echo '</td>';
        echo '</tr>';
    }

    echo '</table>';
    echo '</div>';
} else {
    echo "<p>No records found in student_admin table</p>";
}
?>





</body>
</html>


