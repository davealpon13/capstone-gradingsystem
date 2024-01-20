<!DOCTYPE html>
<html lang="en">
<head> 
    <title>Admin | Reply Teacher Messages</title>
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
include 'db_connect.php';

  
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_GET['id'] ?? '';
$teacherName = $_GET['teacher_name'] ?? '';
$messageText = $_GET['message_text'] ?? '';
$createdAt = $_GET['created_at'] ?? '';

echo '<h2>Reply Teacher Messages</h2>';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['messageText']) && isset($_POST['admin'])) {
        $messageText = $_POST['messageText'];
        $admin = $_POST['admin'];

        $sql = "INSERT INTO admin_teacher (teacher_name, admin, message_text) VALUES ('$teacherName', '$admin', '$messageText')";

        if ($conn->query($sql) === TRUE) {
            echo "New record inserted successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    // Check if delete button for a specific record is clicked
    if (isset($_POST['deleteRecord'])) {
        $deleteId = $_POST['deleteId'];
        $sql_delete = "DELETE FROM admin_teacher WHERE id = $deleteId";
        if ($conn->query($sql_delete) === TRUE) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . $conn->error;
        }
    }
}

if (isset($_POST['showMessages'])) {
    $sql_show_messages = "SELECT id, teacher_name, message_text, created_at FROM admin_teacher WHERE teacher_name = '$teacherName'";
    $result_show_messages = $conn->query($sql_show_messages);

    if ($result_show_messages->num_rows > 0) {
        echo "<table border='1'>
        <tr>
        <th>ID</th>
        <th>Teacher Name</th>
        <th>Message Text</th>
        <th>Created At</th>
        <th>Action</th>
        </tr>";
        while ($row = $result_show_messages->fetch_assoc()) {
            echo "<tr>
            <td>" . $row["id"] . "</td>
            <td>" . $row["teacher_name"] . "</td>
            <td>" . $row["message_text"] . "</td>
            <td>" . $row["created_at"] . "</td>
            <td>
            <form method='post'>
            <input type='hidden' name='deleteId' value='" . $row["id"] . "'>
            <input type='submit' name='deleteRecord' value='Delete'>
            </form>
            </td>
            </tr>";
        }
        echo "</table>";
    } else {
        echo "No messages found for this teacher";
    }
}
?>

<form method="post">
    <label for="teacherName">Teacher Name:</label>
    <input type="text" id="teacherName" name="teacherName" value="<?php echo htmlspecialchars($teacherName); ?>" readonly><br><br>
    
    <label for="messageText">Message Text:</label><br>
    <textarea id="messageText" name="messageText" rows="4" cols="50"></textarea><br><br>

    <label for="admin">Admin:</label>
    <input type="text" id="admin" name="admin"><br><br>

    <input type="submit" value="Send Message">
</form>

<form method="post">
    <input type="hidden" name="teacherName" value="<?php echo htmlspecialchars($teacherName); ?>">
    <input type="submit" name="showMessages" value="Show My Messages">
</form>
</body>
</html>