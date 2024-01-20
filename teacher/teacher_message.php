<!DOCTYPE html>
<html>
<head>
    <title>Display Records</title>
    <style>
       body {
    background-color: white;
    font-family: Arial, sans-serif;
    margin: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}
.table-container {
            width: 90%;

            margin: 20px auto; /* Adjust margin as needed */
        }

        table {
            width: 100%; /* Use 100% width of the container */
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

.container {
    column-count: 1;
    
}

.profile {
    margin-bottom: 20px;
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
    </style>
</head>
<body>
<div class="container">
        <?php
        // Establish a connection to your database (replace with your actual database details)
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "osrs_db";

        // Create connection
        $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // Check connection
        if (!$pdo) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Retrieve the username from the URL parameter
        $username = $_GET['username'] ?? '';

        // Output the username in an h3 tag
        ?>
        <h3>My Message <?= htmlspecialchars($username) ?></h3>

        <?php
        // Check if a deletion request is made
        if (isset($_POST['delete'])) {
            $deleteId = $_POST['delete_id'] ?? null;
            if ($deleteId !== null) {
                $deleteStmt = $pdo->prepare("DELETE FROM teacher_admin WHERE id = ?");
                $deleteStmt->execute([$deleteId]);
            }
        }

        // Fetch records from the database for the matching username
        $stmt = $pdo->prepare("SELECT * FROM teacher_admin WHERE teacher_name = ?");
        $stmt->execute([$username]);
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Display the records if found
        if ($records) {
            ?>
            <div class="table-container">
            <table border="1">
                <tr>
                    <th>ID</th>
                    <th>Teacher Name</th>
                    <th>Message Text</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
                <?php foreach ($records as $record) { ?>
                    <tr>
                        <td><?= $record['id'] ?></td>
                        <td><?= $record['teacher_name'] ?></td>
                        <td><?= $record['message_text'] ?></td>
                        <td><?= $record['created_at'] ?></td>
                        <td>
                            <form method="POST">
                                <input type="hidden" name="delete_id" value="<?= $record['id'] ?>">
                                <button type="submit" name="delete">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </table>
            <?php
        } else {
            echo "<p>No records found for this username.</p>";
        }
        ?>
    </div>
</div>
</body>
</html>