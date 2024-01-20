
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignment Result</title>
</head>
      <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        h1 {
            color: #333;
            margin-bottom: 20px;
        }

        form {
            max-width: 600px;
            width: 100%;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        label {
            display: block;
            margin: 10px 0 5px;
            font-weight: bold;
        }

        select {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-bottom: 15px;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #45a049;
        }

        a {
            margin-top: 20px;
            color: #333;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
<body>
    <h1>Teacher Assignment System</h1>

    <form action="assign.php" method="post">
    <label for="teacherSelect">Select Teacher:</label>
        <?php
        // Assuming $conn is your database connection object
        $teacherSql = "SELECT id, name FROM user_form"; // Replace with the actual table name for teachers
        $teacherResult = $conn->query($teacherSql);

        if ($teacherResult->num_rows > 0) {
            echo '<select name="teacher_name[]" multiple>'; // Use 'multiple' attribute for multi-select
            while ($row = $teacherResult->fetch_assoc()) {
                echo '<option value="' . $row["name"] . '">' . $row["name"] . '</option>';
            }
            echo '</select><br>';
        }
        ?>
        
        <label for="subjectSelect">Select Subject:</label>
        <?php
        $subjectSql = "SELECT id, subject FROM subjects"; // Replace with the actual table name for subjects
        $subjectResult = $conn->query($subjectSql);

        if ($subjectResult->num_rows > 0) {
            echo '<select name="subject_name[]" multiple>'; // Use 'multiple' attribute for multi-select
            while ($subjectRow = $subjectResult->fetch_assoc()) {
                echo '<option value="' . $subjectRow["subject"] . '">' . $subjectRow["subject"] . '</option>';
            }
            echo '</select><br>';
        }
        ?>
        <label for="classSelect">Select Class Level:</label>
        <?php
        $classSql = "SELECT id, level, section FROM classes"; // Replace with the actual table name for classes
        $classResult = $conn->query($classSql);

        if ($classResult->num_rows > 0) {
            echo '<select name="class_name[]" multiple>'; // Use 'multiple' attribute for multi-select
            while ($classRow = $classResult->fetch_assoc()) {
                echo '<option value="' . $classRow["level"] . '-' . $classRow["section"] . '">' . $classRow["level"] . '-' . $classRow["section"] . '</option>';
            }
            echo '</select><br>';
        }
        ?>
          
        <button type="submit">Assign</button>
    </form>
    <script>
        document.querySelector('form').onsubmit = function () {
            var teacherSelect = document.querySelector('[name="teacher_name[]"]');
            var subjectSelect = document.querySelector('[name="subject_name[]"]');
            var classSelect = document.querySelector('[name="class_name[]"]');

            // Check if all three fields are selected
            if (teacherSelect.value.length === 0 || subjectSelect.value.length === 0 || classSelect.value.length === 0) {
                alert('Please select a teacher name, subject, and class level.');
                return false; // Prevent form submission
            }
        };
        </script>
    
    <a href="teacher_list.php">View Teacher List</a>
</body>

</html>
