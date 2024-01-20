<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher List</title>

    <style>
 body {
    font-family: 'Arial', sans-serif;
    background-color: #1B651B;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 900px;
    margin: 20px auto;
    padding: 20px;
    background-color: white;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h1 {
    color: #333;
}

.table-container {
    max-height: 300px; /* Set a max height and overflow for a scroll bar if needed */
    overflow-y: auto;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

th, td {
    border: 1px solid black;
    padding: 10px;
    text-align: left;
}

button {
    background-color: red;
    color: white;
    padding: 8px 16px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

button:hover {
    background-color: #333;
}

a {
    display: block;
    margin-top: 20px;
    color: #333;
    text-decoration: none;
}

a:hover {
    text-decoration: underline;
}

    </style>
</head>

<body>
<div class="container">

<?php
// Include the database connection
require_once('db_connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['archive_teacher'])) {
        $teacherId = $_POST['teacher_id'];
        // Perform archive query based on $teacherId
        $archiveSql = "UPDATE teacher SET archived = 1 WHERE id = $teacherId";
        if ($conn->query($archiveSql) === TRUE) {
            // Redirect to the archive file after archiving the record
            header("Location: archive_teacher_records.php");
            exit();
        } else {
            echo "Error archiving record: " . $conn->error;
        }
    }

    if (isset($_POST['archive_user'])) {
        $userId = $_POST['user_id'];
        // Perform archive query based on $userId
        $archiveSql = "UPDATE user_form SET archived = 1 WHERE id = $userId";
        if ($conn->query($archiveSql) === TRUE) {
            // Redirect to the archive file after archiving the record
            header("Location: archive_user_records.php");
            exit();
        } else {
            echo "Error archiving record: " . $conn->error;
        }
    }
}

// Displaying non-archived records (teachers)
$teacherSql = "SELECT id, name, subject, section FROM teacher WHERE archived = 0";
$teacherResult = $conn->query($teacherSql);

if ($teacherResult->num_rows > 0) {
    echo '<h1>Teacher List</h1>';
    echo '<table>';
    echo '<tr><th>ID</th><th>Name</th><th>Subject</th><th>Section</th><th>Action</th></tr>';
    while ($row = $teacherResult->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $row["id"] . '</td>';
        echo '<td>' . $row["name"] . '</td>';
        echo '<td>' . $row["subject"] . '</td>';
        echo '<td>' . $row["section"] . '</td>';
        echo '<td><form method="post"><input type="hidden" name="teacher_id" value="' . $row["id"] . '"><button type="submit" name="archive_teacher">Archive</button></form></td>';
        echo '</tr>';
    }
    echo '</table>';
    echo '<a href="archive_teacher_records.php"><button>View Archived Teachers</button></a>';
} else {
    echo 'No teachers found.';
}

// Displaying non-archived records (users)
$userSql = "SELECT id, name, email, password, image FROM user_form WHERE archived = 0";
$userResult = $conn->query($userSql);

if ($userResult->num_rows > 0) {
    echo '<h1>User List</h1>';
    echo '<table>';
    echo '<tr><th>ID</th><th>Name</th><th>Email</th><th>Password</th><th>Image</th><th>Action</th></tr>';
    while ($row = $userResult->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $row["id"] . '</td>';
        echo '<td>' . $row["name"] . '</td>';
        echo '<td>' . $row["email"] . '</td>';
        echo '<td>' . $row["password"] . '</td>';
        echo '<td>' . $row["image"] . '</td>';
        echo '<td><form method="post"><input type="hidden" name="user_id" value="' . $row["id"] . '"><button type="submit" name="archive_user">Archive</button></form></td>';
        echo '</tr>';
    }
    echo '</table>';
    echo '<a href="archive_user_records.php"><button>View Archived Users</button></a>';
} else {
    echo 'No users found.';
}
?>

    <!-- Back Button -->
    <a href="index.php?page=teacher">Back</a>
</div>
</body>

</html>
