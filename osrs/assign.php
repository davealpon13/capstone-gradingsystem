<?php
// Establish a database connection (replace these variables with your actual database credentials)
$servername = "localhost";
$username = "root";
$password = "";
$database = "osrs_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $selectedTeachers = $_POST["teacher_name"];
    $selectedSubjects = $_POST["subject_name"];
    $selectedClassLevels = $_POST["class_name"];

    $stmt = $conn->prepare("SELECT * FROM teacher WHERE name = ? AND subject = ? AND section = ?");
    $stmt->bind_param("sss", $teacherName, $subjectName, $classLevel);

    foreach ($selectedTeachers as $teacherName) {
        foreach ($selectedSubjects as $subjectName) {
            foreach ($selectedClassLevels as $classLevel) {
                // Bind parameters and execute the statement
                $stmt->execute();
                $result = $stmt->get_result();

                // Check if a record with the same teacher name, subject, and section exists
                if ($result->num_rows > 0) {
                    echo "Error: A record with the same teacher name, subject, and section already exists.";
                } else {
                    // Prepare the SQL statement for assignment
                    $stmtInsert = $conn->prepare("INSERT INTO teacher (name, subject, section) VALUES (?, ?, ?)");

                    // Bind parameters and execute the insert statement
                    $stmtInsert->bind_param("sss", $teacherName, $subjectName, $classLevel);
                    if ($stmtInsert->execute()) {
                        echo "Assignment created successfully";
                    } else {
                        echo "Error: " . $stmtInsert->error;
                    }

                    // Close the insert statement
                    $stmtInsert->close();
                }
            }
        }
    }

    // Close the select statement
    $stmt->close();

    // Close the database connection
    $conn->close();
}
?>
<style>
table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

th, td {
    border: 1px solid black; /* Add border property to create a line border */
    padding: 10px;
    text-align: left;
}
</style>
<body>
<a href="index.php?page=teacher">Back to Teacher Page</a>
    <h1>Teacher Assignment System</h1>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Assuming $conn is your database connection object
        // Process form data and perform the assignment logic here

        // Display the selected data in a table
        echo "<h2>Assigned Teachers</h2>";
        echo "<table>";
        echo "<tr><th>Teacher</th><th>Subject</th><th>Class Level</th></tr>";

        // Loop through the selected data and display it in the table
        foreach ($_POST['teacher_name'] as $teacher) {
            foreach ($_POST['subject_name'] as $subject) {
                foreach ($_POST['class_name'] as $class) {
                    echo "<tr><td>$teacher</td><td>$subject</td><td>$class</td></tr>";
                }
            }
        }

        echo "</table>";
    }
    ?>

</body>