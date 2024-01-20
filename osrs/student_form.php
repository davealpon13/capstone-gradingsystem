<!DOCTYPE html>
<html>
<head>
    <title>Student Registration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h2 {
            margin-bottom: 10px;
        }

        form {
            margin-bottom: 20px;
        }

        table {
            border-collapse: collapse;
            width: 50%;
            margin-bottom: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 6px 10px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h2>Student Registration</h2>
    <form id="registrationForm" method="post">
    <label for="username">Username:</label><br>
    <input type="text" id="username" name="username"><br>
    
    <label for="password">Password:</label><br>
    <input type="password" id="password" name="password"><br><br>
    
    <input type="submit" value="Register">
</form>

<script>
        document.getElementById('registrationForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent default form submission
            var formData = new FormData(this);
            fetch('student_register.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                // Display an alert message after successful registration
                alert(data); // Show the response message in an alert box
                window.location.reload(); // Reload the page after displaying the alert
            })
            .catch(error => {
                console.error('Error:', error);
            });
        });
    </script>
    <script>
        // Function to handle deletion using AJAX
        function deleteUser(usernameToDelete) {
            var confirmation = confirm("Are you sure you want to delete this user?");
            if (confirmation) {
                fetch('delete_user.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: 'username=' + usernameToDelete,
                })
                .then(response => response.text())
                .then(data => {
                    alert(data); // Show response message in an alert
                    window.location.reload(); // Refresh the page after deletion
                })
                .catch(error => {
                    console.error('Error:', error);
                });
            }
        }
    </script>

    <?php
    // Your PHP code for database connection remains unchanged
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "osrs_db";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['archive'])) {
        $usernameToArchive = $_POST['username']; // Assuming username is sent via POST

        // Update the database to archive the user
        $archiveQuery = "UPDATE students_registration SET archived = 1 WHERE username = '$usernameToArchive'";
        if ($conn->query($archiveQuery) === TRUE) {
            echo "User archived successfully";
        } else {
            echo "Error archiving user: " . $conn->error;
        }
    }

    $sqlActive = "SELECT * FROM students_registration WHERE archived = 0";
    $resultActive = $conn->query($sqlActive);

    if ($resultActive->num_rows > 0) {
        echo "<h2>Active Students Registration Records</h2>";
        echo "<table border='1'>";
        echo "<tr><th>Username</th><th>Actions</th></tr>";

        while ($row = $resultActive->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["username"] . "</td>";
            echo "<td>
                    <form method='post' action=''>
                        <input type='hidden' name='username' value='" . $row["username"] . "'>
                        <button type='submit' name='archive'>Archive</button>
                        <button type='button' onclick='deleteUser(\"" . $row["username"] . "\");'>Delete</button>
                    </form>
                  </td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "No active records found.";
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['unarchive'])) {
        // Get the username from the form submission
        $usernameToUnarchive = $_POST['username'];
    
        // Update the database to unarchive the specific record
        $sqlUnarchive = "UPDATE students_registration SET archived = 0 WHERE username = '$usernameToUnarchive'";
        if ($conn->query($sqlUnarchive) === TRUE) {
            // Unarchiving successful
            echo "<script>alert('Record $usernameToUnarchive has been unarchived.');</script>";
            echo "<script>window.location = window.location.href;</script>";
            // You can also redirect to a specific page using:
            // echo "<script>window.location = 'your_page.php';</script>";
            exit();
        } else {
            // Error handling if the unarchiving process fails
            echo "Error unarchiving record: " . $conn->error;
        }
    }
    
    // Fetch archived records and display them
    $sqlArchived = "SELECT * FROM students_registration WHERE archived = 1";
    $resultArchived = $conn->query($sqlArchived);
    
    if ($resultArchived->num_rows > 0) {
        echo "<h2>Archived Students Records</h2>";
        echo "<table border='1'>";
        echo "<tr><th>Username</th><th>Action</th></tr>";
    
        while ($row = $resultArchived->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["username"] . "</td>";
            echo "<td>
                    <form method='post' action=''>
                        <input type='hidden' name='username' value='" . $row["username"] . "'>
                        <button type='submit' name='unarchive'>Unarchive</button>
                    </form>
                  </td>";
            echo "</tr>";
        }
    
        echo "</table>";
    } else {
        echo "No archived records found.";
    }

$conn->close();
?>

</body>
</html>
