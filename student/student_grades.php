
<!DOCTYPE html>
<html>
<head>
    <title>Student Grades</title>
    <link rel="stylesheet" href="styles.css">
   <style>
         body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #ffffff;
            color: black;
        }


        .container {
            width: 80%;
            margin: 0px auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 10px 10px 20px rgba(20, 20, 20, 0.8);
            border: 3px solid #e0e0e0;
        }

        .student-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .student-table th,
        .student-table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        .student-table th {
            background-color: #026c3b;
            color: #ffffff;
        }

        .student-table td:first-child {
            width: 30%;
        }

        .student-table td:last-child {
            width: 70%;
        }

        .midterm-btn,
        .logout-btn {
            background-color: #026c3b;
            color: #ffffff;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
            margin-right: 10px;
        }

        .custom-btn {
            background-color: #026c3b;
            color: #ffffff;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
            margin: 4px 2px;
        }
        .content {

padding: 5px;
background-color: #026c3b;
display: flex;
align-items: center;
transition: transform 0.3s; /* Add a smooth transition effect for margin-left */
margin-right: 10px;
}
.content-text {
color: #333;
text-align: center;
}
    </style>
</head>
<body>
    
<div class="content">
        <div class="logo"> 
           <img src="logo.png" width="296" height="64" alt="Logo">        
        </div>
    </div>

<div class="sidebar" onclick="toggleSidebar()">

<button class="sidebar-button" >
<img src="menu.png" alt="Description of the image" width="50px" height="50px">
</button>    
<?php
function generateButtons($student_code) {
    // Replace this with your logic to fetch buttons from the database or another source
    $buttons = [
        'Midterm Grades' => ['link' => 'midterm_grades.php', 'image' => 'midterm.png'],
        'Lab Midterm Grades' => ['link' => 'lab_midterm_grades.php', 'image' => 'lab.png'],
        'Finals Grades' => ['link' => 'finals_grades.php', 'image' => 'middark.png'],
        'Lab Finals Grades' => ['link' => 'lab_finals_grades.php', 'image' => 'labdark.png'],
        'Consolidated' => ['link' => 'consolidated.php', 'image' => 'consolidated.png'],
        'Overall Grades' => ['link' => 'overallGrades.php', 'image' => 'grade.png'],
        // Add as many buttons as needed
    ];

    foreach ($buttons as $buttonText => $buttonData) {
        echo '<a href="' . $buttonData['link'] . '?student_code=' . $student_code . '">';
        echo '<img class="icon" src="' . $buttonData['image'] . '" alt="' . $buttonText . ' Icon" width="10" height="10" style="vertical-align: middle;">';
        echo '<span id="messageText">' . $buttonText . '</span>';
        echo '</a>';
    }

    // Logout button
    echo '<a href="studentlogin.php">';
    echo '<img class="icon" src="logout.png" alt="Logout Icon" width="10" height="10" style="vertical-align: middle;">';
    echo '<span id="messageText">Logout</span>';
    echo '</a>';
}

if (isset($_POST['student_code'])) {
    $student_code = $_POST['student_code'];
    // Call the function to generate buttons
    generateButtons($student_code);

    // Your existing code...
} else {
    echo "Invalid request. Please enter a student code.";
}
?>

</div>
</div>


<div class="container">
    <?php
        if (isset($_POST['student_code'])) {
            $student_code = $_POST['student_code'];
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "osrs_db";
            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $student_sql = "SELECT students.*, classes.level, classes.section 
            FROM students 
            INNER JOIN classes ON students.class_id = classes.id 
            WHERE students.student_code = '$student_code'";

$student_result = $conn->query($student_sql);

if ($student_result->num_rows > 0) {
while ($row = $student_result->fetch_assoc()) {
    echo "<table class='student-table'>";
    echo "<tr><th colspan='2'>Student Information</th></tr>";
    echo "<tr><td><strong>Student Code:</strong></td><td>" . $row["student_code"] . "</td></tr>"
        . "<tr><td><strong>First Name:</strong></td><td>" . $row["firstname"] . "</td></tr>"
        . "<tr><td><strong>Middle Name:</strong></td><td>" . $row["middlename"] . "</td></tr>"
        . "<tr><td><strong>Last Name:</strong></td><td>" . $row["lastname"] . "</td></tr>"
        . "<tr><td><strong>Gender:</strong></td><td>" . $row["gender"] . "</td></tr>"
        . "<tr><td><strong>Address:</strong></td><td>" . $row["address"] . "</td></tr>";

    // Displaying level and section
    $student_level_section = $row["level"] . "-" . $row["section"];
    echo "<tr><td><strong>Level & Section:</strong></td><td>" . $student_level_section . "</td></tr>";

    $sql = "SELECT teacher.name AS teacher_name, teacher.subject
            FROM teacher
            LEFT JOIN user_form ON teacher.name = user_form.name
            WHERE teacher.section = '$student_level_section' AND teacher.archived = 0";

    // Execute the query
    $result = $conn->query($sql);

    // Output the result
    if ($result && $result->num_rows > 0) {
        echo "<tr><th colspan='2'>Teacher Information</th></tr>";
        while ($teacher_row = $result->fetch_assoc()) {
            $teacher_name = $teacher_row['teacher_name'];
            $subject = $teacher_row['subject'];

            // Check if the user_form is archived for the matched teacher
            $userFormSql = "SELECT * FROM user_form WHERE name = '$teacher_name' AND archived = 1";
            $userFormResult = $conn->query($userFormSql);

            if ($userFormResult && $userFormResult->num_rows > 0) {
                // User form is archived, do not display teacher info
                echo "<tr><td colspan='2'>Teacher data is archived for $teacher_name. Cannot display information.</td></tr>";
            } else {
                // Display teacher name and subject in rows
                echo "<tr><td><strong>Teacher Name:</strong></td><td>$teacher_name</td></tr>";
                echo "<tr><td><strong>Subject:</strong></td><td>$subject</td></tr>";
            }
        }
    } else {
        echo "<tr><td colspan='2'>No active teachers found for section $student_level_section</td></tr>";
    }

   // Message buttons
echo "<tr><td colspan='2'>";
echo "<button class='custom-btn' onclick=\"location.href='message_teacher.php?student_code=" . $student_code . "&lastname=" . $row["lastname"] . "&level=" . $row["level"] . "&section=" . $row["section"] . "'\">Message Teacher</button>";
echo "<button class='custom-btn' onclick=\"location.href='create_ticket.php?student_code=" . $student_code . "'\">Message Admin</button>";
echo "</td></tr>";


    echo "</table>";
}
} else {
echo "Student not found in the database.";
}



         
        } else {
            echo "Invalid request. Please enter a student code.";
        }
        ?>
    </div>

    <script>
     function hideTextInitially() {
    var textElements = document.querySelectorAll('.sidebar a span');
    textElements.forEach(function (element) {
        element.style.display = 'none';
    });
}

function toggleSidebar() {
    var sidebar = document.querySelector('.sidebar');
    var content = document.querySelector('.content');

    sidebar.classList.toggle('clicked');
    content.classList.toggle('clicked');

    // Toggle visibility of text in the sidebar only when hovering or clicking
    var textElements = document.querySelectorAll('.sidebar a span');
    textElements.forEach(function (element) {
        if (sidebar.classList.contains('clicked') || sidebar.matches(':hover')) {
            element.style.display = 'initial';
        } else {
            element.style.display = 'none';
        }
    });
}

// Call the function to hide text initially when the page loads
document.addEventListener('DOMContentLoaded', function () {
    hideTextInitially();
});

// Additional event listeners for mouseover to toggle visibility on hover
var sidebar = document.querySelector('.sidebar');
sidebar.addEventListener('mouseover', function () {
    toggleSidebar(); // Show text when hovering
});

sidebar.addEventListener('mouseout', function () {
    toggleSidebar(); // Hide text when not hovering
});



</script> 
</body>
</html>