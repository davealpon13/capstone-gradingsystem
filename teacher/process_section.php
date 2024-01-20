<?php

include 'config.php'; // Include this line if your database connection is in the config.php file

if(isset($_GET['section']) && isset($_GET['subject'])) {
    $section = $_GET['section'];
    $subject = $_GET['subject'];

    // Display the section name and subject on the new page
    echo "<h1>Section: $section</h1>";
    echo "<h2>Subject: $subject</h2>";

    $section = $_GET['section'];
 
    $select_class = mysqli_query($conn, "SELECT id FROM `classes` WHERE CONCAT(level, '-', section) = '$section'");

    if (mysqli_num_rows($select_class) > 0) {
        $class_data = mysqli_fetch_assoc($select_class);
        $class_id = $class_data['id'];

        $select_students = mysqli_query($conn, "SELECT student_code, lastname FROM `students` WHERE class_id = '$class_id'");

        if (mysqli_num_rows($select_students) > 0) {
            echo '<div style="overflow-x: auto;">'; // Add a container div with a horizontal scrollbar
            echo '<table>';
            echo '<tr><th>Student Code</th><th>Lastname</th></tr>';

            while ($student_data = mysqli_fetch_assoc($select_students)) {
                echo '<tr>';
                echo '<td>' . $student_data['student_code'] . '</td>';
                echo '<td>' . $student_data['lastname'] . '</td>';
                echo '</tr>';
            }

            echo '</table>';
            echo '</div>'; // Close the container div
        } else {
            echo "No students found for the class ID: " . $class_id;
        }
    } else {
        echo "No matching class found for the section: " . $section;
    }
} else {
    echo "<h1>Section or subject parameter is missing</h1>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background-color: #fff;
            padding: 10px; /* Adjust padding as needed */
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            z-index: 1000; /* Set a high z-index to make sure it appears above other elements */
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        h1 {
            text-align: center;
            margin-bottom: 0px;
            color: #1B651B;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #cdc9c9;
        }

        th {
            background-color: #026c3b;
            color: #fff;
        }
        h1 {
            text-align: center;
            margin-top: 100px; /* Add margin-top here */
            color: #1B651B;
        }
        h2 {
            text-align: center; /* Add margin-top here */
            color: #1B651B;
        }

        .custom-button {
            padding: 10px 20px;
            font-size: 16px;
            border: 2px solid #ffffff;
            border-radius: 4px;
            cursor: pointer;
            margin: 5px;
            transition: all 0.3s ease;
            color: #2E7D32;
        }

        .custom-button a {
            color: white;
            text-decoration: none;
        }

        .black-button {
            background-color: #026c3b;
            color: white;
        }

        .main-content {
            margin-top: 80px; /* Adjust margin-top to provide space below the fixed container */
        }
    </style>
</head>

<body> 
<div class="container">
    <img src="logo.png" width="296" height="64" alt="Logo">
    <div>
    <?php
        // Assuming $section and $subject are defined earlier in your PHP code
        echo '<button class="custom-button green-button" onclick="redirectToNewPage()">Laboratory Midterm</button>';
        echo '<button class="custom-button black-button" id="displayButton" onclick="redirectToLecture()">Manual Grading</button>';
        echo '<button class="custom-button blue-button" onclick="redirectToNewFile()">Lecture Midterm</button>';
    ?>
</div>
<!-- Add this script to your HTML file where you have the button -->
<script>
    document.getElementById('displayButton').addEventListener('click', function() {
        // Code to handle button click and update input fields
        redirectToLecture();
    });

    function redirectToLecture() {
        // Assuming you have an array of student data in JavaScript, update this array accordingly
        var studentDataArray = <?php echo json_encode($studentDataArray); ?>;

        // Loop through the array and update the input fields in lecture_midterm.php
        for (var i = 0; i < studentDataArray.length; i++) {
            document.getElementsByName('student_name_' + i)[0].value = studentDataArray[i].lastname;
            document.getElementsByName('studentNumber_' + i)[0].value = studentDataArray[i].student_code;
        }

        // After updating the input fields, you can submit the form if needed
        // document.getElementById('yourFormId').submit();
    }
</script>

<script>
    function redirectToLecture() {
        // Assuming you have this function defined for Manual Grading
        // You can replace this with your own logic for Manual Grading redirection
        // For example, window.location.href = 'manual_grading.php';
    }

    function redirectToNewFile() {
        // Get the values of section and subject
        var section = "<?php echo isset($_GET['section']) ? $_GET['section'] : ''; ?>";
        var subject = "<?php echo isset($_GET['subject']) ? $_GET['subject'] : ''; ?>";

        // Redirect to the new PHP file with the values as query parameters
        window.location.href = 'display_grades.php?section=' + section + '&subject=' + subject;
    }

    function redirectToNewPage() {
        var section = "<?php echo isset($_GET['section']) ? $_GET['section'] : ''; ?>";
        var subject = "<?php echo isset($_GET['subject']) ? $_GET['subject'] : ''; ?>";
        window.location.href = 'display_grades2.php?section=' + section + '&subject=' + subject;
    }
</script>



    <div class="main-content">
        <!-- The rest of your content goes here -->
    </div>

    <script>
    function redirectToLecture() {
        // Get the section and subject values
        var section = "<?php echo isset($section) ? $section : ''; ?>";
        var subject = "<?php echo isset($subject) ? $subject : ''; ?>";

        // Redirect to lecture_midterm.php with section and subject parameters
        window.location.href = "lecture_midterm.php?section=" + section + "&subject=" + subject;
    }
</script>

</body>

</html>
