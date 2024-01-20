<?php require 'config.php'; ?>
<?php
if(isset($_GET['section']) && isset($_GET['subject'])) {
    $section = $_GET['section'];
    $subject = $_GET['subject'];

    // Display the section name and subject on the new page
    echo "<h1>Section: $section</h1>";
    echo "<h1>Subject: $subject</h1>";
    // Rest of your code for displaying midterm table goes here
} else {
    echo "<h1>Section or subject parameter is missing</h1>";
}
if (isset($_POST['action']) && $_POST['action'] == 'delete') {
    if (isset($_POST['id'])) {
        $id = mysqli_real_escape_string($conn, $_POST['id']);
        $query = "DELETE FROM midterm WHERE id='$id'";
        $result = mysqli_query($conn, $query);

        if ($result) {
            echo "Record deleted successfully!";
        } else {
            echo "Error deleting record: " . mysqli_error($conn);
        }
        exit(); // Stop further execution after handling the delete action
    }
}
if (isset($_POST['action']) && $_POST['action'] == 'deleteAll') {
    $query = "DELETE FROM midterm WHERE section='$section' AND subject='$subject'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "All records deleted successfully!";
        exit(); // Stop further execution after handling the delete action
    } else {
        echo "Error deleting records: " . mysqli_error($conn);
    }
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Midterm</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #F2F2F2; /* Set a light background color for the entire page */
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            color: #1B651B; /* Set font color for h1 */
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #FFFFFF; /* Set a light background color for the table */
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1); /* Add a subtle box shadow for depth */
            border-radius: 8px; /* Add rounded corners for a softer look */
        }

        th, td {
            border: 1px solid #000000;
            padding: 15px;
            text-align: left;
        }

        th {
            background-color: #1B651B; /* Set a different shade for the header row */
            color: #FFFFFF;
        }

        button {
            padding: 10px;
            margin: 5px;
            background-color: #026c3b;
            color: #FFFFFF;
            border: none;
            cursor: pointer;
            border-radius: 4px; /* Add rounded corners for buttons */
        }

        button:hover {
            background-color: #155015; /* Darken the color on hover */
        }

        .import-form {
            margin-bottom: 20px;
        }

        hr {
            border: 0;
            border-top: 1px solid #E5E5E5; /* Use a slightly different shade for horizontal rule */
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .back-button {
            margin-bottom: 20px;
        }
    </style>
</head>
<h1>Midterm Table</h1>
<body>
<div class="import-form">
    <form class="" action="" method="post" enctype="multipart/form-data">
        <input type="file" name="excel" required value="">
        <button type="submit" name="import">Import</button>
    </form>
   
    <hr>
    <button onclick="sortTable()">Sort by Lastname</button>
    <button onclick="deleteAllRecords()">Delete All Records</button>
    <table border="1">
    <tr>

    <td style="text-align: center; background-color: #026c3b; color: white; width: 45.8%; font-weight: bold; font-family: 'Arial, sans-serif';">#</td>
<td style="text-align: center; background-color: #fdfd96; color: black; width: 45.8%; font-weight: bold; font-family: 'Arial, sans-serif';">Lastname</td>
<td style="text-align: center; background-color: #fdfd96; color: black; width: 45.8%; font-weight: bold; font-family: 'Arial, sans-serif';">Student Code</td>
<td style="text-align: center; background-color: #fdfd96; color: black; width: 45.8%; font-weight: bold; font-family: 'Arial, sans-serif';">Section</td>
<td style="text-align: center; background-color: #fdfd96; color: black; width: 45.8%; font-weight: bold; font-family: 'Arial, sans-serif';">Subject</td>
<td style="text-align: center; background-color: #A7C7E7; color: black; width: 45.8%; font-weight: bold; font-family: 'Arial, sans-serif';">Attendance Days</td>
<td style="text-align: center; background-color: #A7C7E7; color: black; width: 45.8%; font-weight: bold; font-family: 'Arial, sans-serif';">Weighted Attendance 10%</td>
<td style="text-align: center; background-color: #F8C8DC; color: black; width: 45.8%; font-weight: bold; font-family: 'Arial, sans-serif';">Participation Score</td>
<td style="text-align: center; background-color: #F8C8DC; color: black; width: 45.8%; font-weight: bold; font-family: 'Arial, sans-serif';">Weighted Participation 10%</td>
<td style="text-align: center; background-color: #77DD77; color: black; width: 45.8%; font-weight: bold; font-family: 'Arial, sans-serif';">Quiz 1</td>
<td style="text-align: center; background-color: #77DD77; color: black; width: 45.8%; font-weight: bold; font-family: 'Arial, sans-serif';">Quiz 2</td>
<td style="text-align: center; background-color: #77DD77; color: black; width: 45.8%; font-weight: bold; font-family: 'Arial, sans-serif';">Quiz 3</td>
<td style="text-align: center; background-color: #77DD77; color: black; width: 45.8%; font-weight: bold; font-family: 'Arial, sans-serif';">Quiz 4</td>
<td style="text-align: center; background-color: #77DD77; color: black; width: 45.8%; font-weight: bold; font-family: 'Arial, sans-serif';">Quiz 5</td>
<td style="text-align: center; background-color: #77DD77; color: black; width: 45.8%; font-weight: bold; font-family: 'Arial, sans-serif';">Quiz 6</td>
<td style="text-align: center; background-color: #77DD77; color: black; width: 45.8%; font-weight: bold; font-family: 'Arial, sans-serif';">Quiz 7</td>
<td style="text-align: center; background-color: #77DD77; color: black; width: 45.8%; font-weight: bold; font-family: 'Arial, sans-serif';">Quiz 8</td>
<td style="text-align: center; background-color: #77DD77; color: black; width: 45.8%; font-weight: bold; font-family: 'Arial, sans-serif';">Quiz 9</td>
<td style="text-align: center; background-color: #77DD77; color: black; width: 45.8%; font-weight: bold; font-family: 'Arial, sans-serif';">Quiz 10</td>
<td style="text-align: center; background-color: #77DD77; color: black; width: 45.8%; font-weight: bold; font-family: 'Arial, sans-serif';">Total Quiz</td>
<td style="text-align: center; background-color: #77DD77; color: black; width: 45.8%; font-weight: bold; font-family: 'Arial, sans-serif';">Weighted Quiz 15%</td>
<td style="text-align: center; background-color: #A7C7E7; color: black; width: 45.8%; font-weight: bold; font-family: 'Arial, sans-serif';">Output 1</td>
<td style="text-align: center; background-color: #A7C7E7; color: black; width: 45.8%; font-weight: bold; font-family: 'Arial, sans-serif';">Output 2</td>
<td style="text-align: center; background-color: #A7C7E7; color: black; width: 45.8%; font-weight: bold; font-family: 'Arial, sans-serif';">Output 3</td>
<td style="text-align: center; background-color: #A7C7E7; color: black; width: 45.8%; font-weight: bold; font-family: 'Arial, sans-serif';">Output 4</td>
<td style="text-align: center; background-color: #A7C7E7; color: black; width: 45.8%; font-weight: bold; font-family: 'Arial, sans-serif';">Output 5</td>
<td style="text-align: center; background-color: #A7C7E7; color: black; width: 45.8%; font-weight: bold; font-family: 'Arial, sans-serif';">Output 6</td>
<td style="text-align: center; background-color: #A7C7E7; color: black; width: 45.8%; font-weight: bold; font-family: 'Arial, sans-serif';">Output 7</td>
<td style="text-align: center; background-color: #A7C7E7; color: black; width: 45.8%; font-weight: bold; font-family: 'Arial, sans-serif';">Output 8</td>
<td style="text-align: center; background-color: #A7C7E7; color: black; width: 45.8%; font-weight: bold; font-family: 'Arial, sans-serif';">Output 9</td>
<td style="text-align: center; background-color: #A7C7E7; color: black; width: 45.8%; font-weight: bold; font-family: 'Arial, sans-serif';">Output 10</td>
<td style="text-align: center; background-color: #A7C7E7; color: black; width: 45.8%; font-weight: bold; font-family: 'Arial, sans-serif';">Total Output</td>
<td style="text-align: center; background-color: #A7C7E7; color: black; width: 45.8%; font-weight: bold; font-family: 'Arial, sans-serif';">Weighted Output 25%</td>
<td style="text-align: center; background-color: #F8C8DC; color: black; width: 45.8%; font-weight: bold; font-family: 'Arial, sans-serif';">Midterm Score</td>
<td style="text-align: center; background-color: #F8C8DC; color: black; width: 45.8%; font-weight: bold; font-family: 'Arial, sans-serif';">Weighted Midterm 20%</td>
<td style="text-align: center; background-color: #fdfd96; color: black; width: 45.8%; font-weight: bold; font-family: 'Arial, sans-serif';">Delete</td>
<td style="text-align: center; background-color: #fdfd96; color: black; width: 45.8%; font-weight: bold; font-family: 'Arial, sans-serif';">Edit</td>

        </tr>
        <?php
        $i = 1;
    $rows = mysqli_query($conn, "SELECT * FROM midterm WHERE section='$section' AND subject='$subject'");

        foreach ($rows as $row) :
        ?>
            <tr>
                <td style="text-align: center; background-color: #026c3b; color:white;width: 45.8% ;"> <?php echo $i++; ?> </td>
                <td style="text-align: center; background-color: #fdfd96; color: black;width: 45.8% ;"> <?php echo $row["lastname"]; ?> </td>
                <td style="text-align: center; background-color: #fdfd96; color: black;width: 45.8% ;"> <?php echo $row["student_code"]; ?> </td>
                <td style="text-align: center; background-color: #fdfd96; color: black;width: 45.8% ;"> <?php echo $row["section"]; ?> </td>
                <td style="text-align: center; background-color: #fdfd96; color: black;width: 45.8% ;"> <?php echo $row["subject"]; ?> </td>
                <td style="text-align: center; background-color: #A7C7E7; color: black;width: 45.8% ;"> <?php echo $row["attendance_days"]; ?> </td>
                <td style="text-align: center; background-color: #A7C7E7; color: black;width: 45.8% ;"> <?php echo $row["weighted_attendance"]. "%"; ?> </td>
                <td style="text-align: center; background-color: #F8C8DC; color: black;width: 45.8% ;"> <?php echo $row["participation_score"]; ?> </td>
                <td style="text-align: center; background-color: #F8C8DC; color: black;width: 45.8% ;"> <?php echo $row["weighted_participation"]. "%"; ?> </td>
                <td style="text-align: center; background-color: #77DD77; color: black;width: 45.8% ;"> <?php echo $row["quiz_1"]; ?> </td>
                <td style="text-align: center; background-color: #77DD77; color: black;width: 45.8% ;"> <?php echo $row["quiz_2"]; ?> </td>
                <td style="text-align: center; background-color: #77DD77; color: black;width: 45.8% ;"> <?php echo $row["quiz_3"]; ?> </td>
                <td style="text-align: center; background-color: #77DD77; color: black;width: 45.8% ;"> <?php echo $row["quiz_4"]; ?> </td>
                <td style="text-align: center; background-color: #77DD77; color: black;width: 45.8% ;"> <?php echo $row["quiz_5"]; ?> </td>
                <td style="text-align: center; background-color: #77DD77; color: black;width: 45.8% ;"> <?php echo $row["quiz_6"]; ?> </td>
                <td style="text-align: center; background-color: #77DD77; color: black;width: 45.8% ;"> <?php echo $row["quiz_7"]; ?> </td>
                <td style="text-align: center; background-color: #77DD77; color: black;width: 45.8% ;"> <?php echo $row["quiz_8"]; ?> </td>
                <td style="text-align: center; background-color: #77DD77; color: black;width: 45.8% ;"> <?php echo $row["quiz_9"]; ?> </td>
                <td style="text-align: center; background-color: #77DD77; color: black;width: 45.8% ;"> <?php echo $row["quiz_10"]; ?> </td>
                <td style="text-align: center; background-color: #77DD77; color: black;width: 45.8% ;"> <?php echo $row["total_quiz"]; ?> </td>
                <td style="text-align: center; background-color: #77DD77; color: black;width: 45.8% ;"> <?php echo $row["weighted_quizzes"]. "%"; ?> </td>
                <td style="text-align: center; background-color: #A7C7E7; color: black;width: 45.8% ;"> <?php echo $row["output_1"]; ?> </td>
                <td style="text-align: center; background-color: #A7C7E7; color: black;width: 45.8% ;"> <?php echo $row["output_2"]; ?> </td>
                <td style="text-align: center; background-color: #A7C7E7; color: black;width: 45.8% ;"> <?php echo $row["output_3"]; ?> </td>
                <td style="text-align: center; background-color: #A7C7E7; color: black;width: 45.8% ;"> <?php echo $row["output_4"]; ?> </td>
                <td style="text-align: center; background-color: #A7C7E7; color: black;width: 45.8% ;"> <?php echo $row["output_5"]; ?> </td>
                <td style="text-align: center; background-color: #A7C7E7; color: black;width: 45.8% ;"> <?php echo $row["output_6"]; ?> </td>
                <td style="text-align: center; background-color: #A7C7E7; color: black;width: 45.8% ;"> <?php echo $row["output_7"]; ?> </td>
                <td style="text-align: center; background-color: #A7C7E7; color: black;width: 45.8% ;"> <?php echo $row["output_8"]; ?> </td>
                <td style="text-align: center; background-color: #A7C7E7; color: black;width: 45.8% ;"> <?php echo $row["output_9"]; ?> </td>
                <td style="text-align: center; background-color: #A7C7E7; color: black;width: 45.8% ;"> <?php echo $row["output_10"]; ?> </td>
                <td style="text-align: center; background-color: #A7C7E7; color: black;width: 45.8% ;"> <?php echo $row["total_output"]; ?> </td>
                <td style="text-align: center; background-color: #A7C7E7; color: black;width: 45.8% ;"> <?php echo $row["weighted_outputs"]. "%"; ?> </td>
                <td style="text-align: center; background-color: #F8C8DC; color: black;width: 45.8% ;"> <?php echo $row["midterm_score"]; ?> </td>
                <td style="text-align: center; background-color: #F8C8DC; color: black;width: 45.8% ;"> <?php echo $row["weighted_midterm"]. "%"; ?> </td>
                <td style="text-align: center; background-color: #fdfd96; color: black;width: 45.8% ;"><button onclick="deleteRecord('<?php echo $row["id"]; ?>')">Delete</button></td>
                <td style="text-align: center; background-color: #fdfd96; color: black;width: 45.8% ;"><button onclick="editRecord('<?php echo $row["id"]; ?>')">Edit</button></td>
                <script>
        function deleteRecord(id) {
            if (confirm("Are you sure you want to delete this record?")) {
                var xhr = new XMLHttpRequest();
                xhr.open("POST", "", true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhr.onreadystatechange = function () {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        // Reload the page after successful deletion
                        location.reload();
                    }
                };
                xhr.send("action=delete&id=" + id);
            }
        }
        function editRecord(id) {
        window.location.href = 'editMidterm.php?id=' + id;
    }
    </script>
    <script>
    function deleteAllRecords() {
        if (confirm("Are you sure you want to delete all records?")) {
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    // Reload the page after successful deletion
                    location.reload();
                }
            };
            xhr.send("action=deleteAll");
        }
    }
</script>


</script>
<script>
    function sortTable() {
    var table, rows, switching, i, x, y, shouldSwitch;
    table = document.querySelector('table'); // Assuming there is only one table on the page
    switching = true;

    while (switching) {
        switching = false;
        rows = table.rows;

        for (i = 1; i < (rows.length - 1); i++) {
            shouldSwitch = false;
            x = rows[i].getElementsByTagName("td")[2]; // 2 is the index of the "lastname" column
            y = rows[i + 1].getElementsByTagName("td")[2];

            if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                shouldSwitch = true;
                break;
            }
        }

        if (shouldSwitch) {
            rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
            switching = true;
        }
    }
}

</script>

            </tr>
        <?php endforeach; ?>
    </table>
    <?php

    
    if (isset($_POST["import"])) {
        $fileName = $_FILES["excel"]["name"];
        $fileExtension = explode('.', $fileName);
        $fileExtension = strtolower(end($fileExtension));
        $newFileName = date("Y.m.d") . " - " . date("h.i.sa") . "." . $fileExtension;

        $targetDirectory = "uploads/" . $newFileName;
        move_uploaded_file($_FILES['excel']['tmp_name'], $targetDirectory);

        error_reporting(0);
        ini_set('display_errors', 0);

        require 'excelReader/excel_reader2.php';
        require 'excelReader/SpreadsheetReader.php';

        $reader = new SpreadsheetReader($targetDirectory);
        $allowedExtensions = array("xlsx", "xls");
        if (!in_array($fileExtension, $allowedExtensions)) {
            echo "
            <script>
            alert('The file you uploaded is not an Excel file. Please upload an Excel file.');
            document.location.href = '';
            </script>
            ";
            exit;
        }
        foreach ($reader as $key => $row) {
            $lastname = $row[1];
            $studentCode = $row[2];
            $sectionValue = mysqli_real_escape_string($conn, $section); // Sanitize section value before inserting into the database
            $subjectValue = mysqli_real_escape_string($conn, $subject); // Sanitize subject value before inserting into the database
            $attendanceDays = isset($row[4]) ? $row[4] : null;
            $weightedAttendanceValue = isset($row[5]) ? $row[5] : null;
            $participationScore = isset($row[6]) ? $row[6] : null;
            $weightedParticipationValue = isset($row[7]) ? $row[7] : null;
            $quiz1Value = isset($row[8]) ? $row[8] : null;
            $quiz2Value = isset($row[9]) ? $row[9] : null;
            $quiz3Value = isset($row[10]) ? $row[10] : null;
            $quiz4Value = isset($row[11]) ? $row[11] : null;
            $quiz5Value = isset($row[12]) ? $row[12] : null;
            $quiz6Value = isset($row[13]) ? $row[13] : null;
            $quiz7Value = isset($row[14]) ? $row[14] : null;
            $quiz8Value = isset($row[15]) ? $row[15] : null;
            $quiz9Value = isset($row[16]) ? $row[16] : null;
            $quiz10Value = isset($row[17]) ? $row[17] : null;
            $totalQuiz = isset($row[18]) ? $row[18] : null;
            $weightedQuizzesValue = isset($row[19]) ? $row[19] : null;
            $output1Value = isset($row[20]) ? $row[20] : null;
            $output2Value = isset($row[21]) ? $row[21] : null;
            $output3Value = isset($row[22]) ? $row[22] : null;
            $output4Value = isset($row[23]) ? $row[23] : null;
            $output5Value = isset($row[24]) ? $row[24] : null;
            $output6Value = isset($row[25]) ? $row[25] : null;
            $output7Value = isset($row[26]) ? $row[26] : null;
            $output8Value = isset($row[27]) ? $row[27] : null;
            $output9Value = isset($row[28]) ? $row[28] : null;
            $output10Value = isset($row[29]) ? $row[29] : null;
            $totalOutput = isset($row[30]) ? $row[30] : null;
            $weightedOutputsValue = isset($row[31]) ? $row[31] : null;
            $midtermScoreValue = isset($row[32]) ? $row[32] : null;
            $weightedMidtermValue = isset($row[33]) ? $row[33] : null;
    
            if (!empty($studentCode) && !empty($lastname)&& $studentCode !== 'Student Number') {
                // Sanitize section and subject values before inserting into the database
                $sectionValue = mysqli_real_escape_string($conn, $section);
                $subjectValue = mysqli_real_escape_string($conn, $subject);
           $query = "INSERT INTO midterm (
    `lastname`, 
    `student_code`, 
    `section`, 
    `subject`, 
    `attendance_days`, 
    `participation_score`, 
    `quiz_1`, 
    `quiz_2`, 
    `quiz_3`, 
    `quiz_4`, 
    `quiz_5`, 
    `quiz_6`, 
    `quiz_7`, 
    `quiz_8`, 
    `quiz_9`, 
    `quiz_10`, 
    `total_quiz`, 
    `output_1`, 
    `output_2`, 
    `output_3`, 
    `output_4`, 
    `output_5`, 
    `output_6`, 
    `output_7`, 
    `output_8`, 
    `output_9`, 
    `output_10`, 
    `total_output`, 
    `midterm_score`, 
    `weighted_attendance`, 
    `weighted_participation`, 
    `weighted_quizzes`, 
    `weighted_outputs`, 
    `weighted_midterm`
) VALUES (
    '$lastname', 
    '$studentCode', 
    '$sectionValue', 
    '$subjectValue', 
    '$attendanceDays', 
    '$participationScore', 
    '$quiz1Value', 
    '$quiz2Value', 
    '$quiz3Value', 
    '$quiz4Value', 
    '$quiz5Value', 
    '$quiz6Value', 
    '$quiz7Value', 
    '$quiz8Value', 
    '$quiz9Value', 
    '$quiz10Value', 
    '$totalQuiz', 
    '$output1Value', 
    '$output2Value', 
    '$output3Value', 
    '$output4Value', 
    '$output5Value', 
    '$output6Value', 
    '$output7Value', 
    '$output8Value', 
    '$output9Value', 
    '$output10Value', 
    '$totalOutput',
    '$midtermScoreValue', 
    '$weightedAttendanceValue', 
    '$weightedParticipationValue', 
    '$weightedQuizzesValue', 
    '$weightedOutputsValue', 
    '$weightedMidtermValue'
)";

mysqli_query($conn, $query);

        }
    }
        echo
        "
        <script>
        alert('Successfully Imported');
        document.location.href = '';
        </script>
        ";
    }
    ?>
  </div>
</body>

</html>