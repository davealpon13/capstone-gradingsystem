<!DOCTYPE html>
<html lang="en">
<head> 
    <title>Messages</title>
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

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to select data from the table
$sql = "SELECT id, teacher_name, message_text, created_at FROM teacher_admin";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row in a table format
    echo "<table border='1'>
    <tr>
    <th>No</th>
    <th>Teacher Name</th>
    <th>Message Text</th>
    <th>Created At</th>
    <th>Action</th>
    </tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
        <td>" . $row["id"] . "</td>
        <td>" . $row["teacher_name"] . "</td>
        <td>" . $row["message_text"] . "</td>
        <td>" . $row["created_at"] . "</td>
        <td><a href='reply_teacher.php?id=" . $row["id"] . "&teacher_name=" . urlencode($row["teacher_name"]) . "&message_text=" . urlencode($row["message_text"]) . "&created_at=" . urlencode($row["created_at"]) . "'>Reply</a></td>
        </tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

// Close connection
$conn->close();
?>



</body>
</html>


