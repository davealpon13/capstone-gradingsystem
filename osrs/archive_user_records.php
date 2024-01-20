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

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['unarchive_user'])) {
    $userId = $_POST['user_id'];
    // Perform unarchive query based on $userId
    $unarchiveSql = "UPDATE user_form SET archived = 0 WHERE id = $userId";
    if ($conn->query($unarchiveSql) === TRUE) {
        // Redirect back to the page after unarchiving the record
        header("Location: archive_user_records.php");
        exit();
    } else {
        echo "Error unarchiving record: " . $conn->error;
    }
}

// Fetching archived user records
$archivedUserSql = "SELECT id, name, email, password, image FROM user_form WHERE archived = 1";
$archivedUserResult = $conn->query($archivedUserSql);

if ($archivedUserResult->num_rows > 0) {
    echo '<h1>Former User Records</h1>';
    echo '<table>';
    echo '<tr><th>ID</th><th>Name</th><th>Email</th><th>Password</th><th>Image</th><th>Action</th></tr>';
    while ($row = $archivedUserResult->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $row["id"] . '</td>';
        echo '<td>' . $row["name"] . '</td>';
        echo '<td>' . $row["email"] . '</td>';
        echo '<td>' . $row["password"] . '</td>';
        echo '<td>' . $row["image"] . '</td>';
        // Button to unarchive the record
        echo '<td><form method="post"><input type="hidden" name="user_id" value="' . $row["id"] . '"><button type="submit" name="unarchive_user">Unarchive</button></form></td>';
        echo '</tr>';
    }
    echo '</table>';
} else {
    echo 'No archived user records found.';
}
?>

    <!-- Back Button -->
    <a href="/capstone/osrs/teacher_list.php">Back</a>
</div>
</body>

</html>