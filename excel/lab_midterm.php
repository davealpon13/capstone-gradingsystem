<?php require 'config.php'; ?>
<?php
if(isset($_GET['section']) && isset($_GET['subject'])) {
    $section = $_GET['section'];
    $subject = $_GET['subject'];

    // Display the section name and subject on the new page
    echo "<h1>Section: $section</h1>";
    echo "<h1>Subject: $subject</h1>";

 
} else {
    echo "<h1>Section or subject parameter is missing</h1>";
}
if (isset($_POST['action']) && $_POST['action'] == 'delete') {
    if (isset($_POST['id'])) {
        $id = mysqli_real_escape_string($conn, $_POST['id']);
        $query = "DELETE FROM lab_midterm WHERE id='$id'";
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
    $query = "DELETE FROM lab_midterm WHERE section='$section' AND subject='$subject'";
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
    <title>Laboratory Midterm</title>
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
/* Use a slightly different shade for borders */
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

<body>
    <h1>Laboratory Midterm Table</h1>
    <div class="import-form">
    <form class="" action="" method="post" enctype="multipart/form-data">
        <input type="file" name="excel" required value="">
        <button type="submit" name="import">Import</button>
    </form>

    <hr>
    <button onclick="sortTable()">Sort by Lastname</button>
    <button onclick="deleteAllRecords()">Delete All Records</button>

    <table border="1">
    <tr >

    <td style="text-align: center; background-color: #026c3b; color: white; width: 45.8%; font-weight: bold;">#</td>
    <td style="text-align: center; background-color: #fdfd96; color: black; width: 45.8%; font-weight: bold;">Lastname</td>
    <td style="text-align: center; background-color: #fdfd96; color: black; width: 45.8%; font-weight: bold;">Student Code</td>
    <td style="text-align: center; background-color: #fdfd96; color: black; width: 45.8%; font-weight: bold;">Section</td>
    <td style="text-align: center; background-color: #fdfd96; color: black; width: 45.8%; font-weight: bold;">Subject</td>
    <td style="text-align: center; background-color: #A7C7E7; color: black; width: 45.8%; font-weight: bold;">Attendance and Participation</td>
    <td style="text-align: center; background-color: #A7C7E7; color: black; width: 45.8%; font-weight: bold;">Weighted Attendance and Participation 20%</td>
    <td style="text-align: center; background-color: #F8C8DC; color: black; width: 45.8%; font-weight: bold;">Lab 1</td>
    <td style="text-align: center; background-color: #F8C8DC; color: black; width: 45.8%; font-weight: bold;">Lab 2</td>
    <td style="text-align: center; background-color: #F8C8DC; color: black; width: 45.8%; font-weight: bold;">Lab 3</td>
    <td style="text-align: center; background-color: #F8C8DC; color: black; width: 45.8%; font-weight: bold;">Lab 4</td>
    <td style="text-align: center; background-color: #F8C8DC; color: black; width: 45.8%; font-weight: bold;">Lab 5</td>
    <td style="text-align: center; background-color: #F8C8DC; color: black; width: 45.8%; font-weight: bold;">Lab 6</td>
    <td style="text-align: center; background-color: #F8C8DC; color: black; width: 45.8%; font-weight: bold;">Lab 7</td>
    <td style="text-align: center; background-color: #F8C8DC; color: black; width: 45.8%; font-weight: bold;">Lab 8</td>
    <td style="text-align: center; background-color: #F8C8DC; color: black; width: 45.8%; font-weight: bold;">Lab 9</td>
    <td style="text-align: center; background-color: #F8C8DC; color: black; width: 45.8%; font-weight: bold;">Lab 10</td>
    <td style="text-align: center; background-color: #F8C8DC; color: black; width: 45.8%; font-weight: bold;">Total Lab</td>
    <td style="text-align: center; background-color: #F8C8DC; color: black; width: 45.8%; font-weight: bold;">Weighted Lab 50%</td>
    <td style="text-align: center; background-color: #77DD77; color: black; width: 45.8%; font-weight: bold;">Practical 1</td>
    <td style="text-align: center; background-color: #77DD77; color: black; width: 45.8%; font-weight: bold;">Practical 2</td>
    <td style="text-align: center; background-color: #77DD77; color: black; width: 45.8%; font-weight: bold;">Practical 3</td>
    <td style="text-align: center; background-color: #77DD77; color: black; width: 45.8%; font-weight: bold;">Practical 4</td>
    <td style="text-align: center; background-color: #77DD77; color: black; width: 45.8%; font-weight: bold;">Practical 5</td>
    <td style="text-align: center; background-color: #77DD77; color: black; width: 45.8%; font-weight: bold;">Total Practical</td>
    <td style="text-align: center; background-color: #77DD77; color: black; width: 45.8%; font-weight: bold;">Weighted Practical 30%</td>
    <td style="text-align: center; background-color: #fdfd96; color: black; width: 45.8%; font-weight: bold;">Delete</td>
    <td style="text-align: center; background-color: #fdfd96; color: black; width: 45.8%; font-weight: bold;">Edit</td>
        </tr>
        <?php

        $i = 1;
        $rows = mysqli_query($conn, "SELECT * FROM lab_midterm WHERE section='$section' AND subject='$subject'");

        foreach ($rows as $row) :
        ?>
            <tr>
                <td style="text-align: center; background-color: #026c3b; color: white;width: 45.8% ;"> <?php echo $i++; ?> </td>
                <td style="text-align: center; background-color: #fdfd96; color: black;width: 45.8% ;"> <?php echo $row["lastname"]; ?> </td>
                <td style="text-align: center; background-color: #fdfd96; color: black;width: 45.8% ;"> <?php echo $row["student_code"]; ?> </td>
                <td style="text-align: center; background-color: #fdfd96; color: black;width: 45.8% ;"> <?php echo $row["section"]; ?> </td>
                <td style="text-align: center; background-color: #fdfd96; color: black;width: 45.8% ;"> <?php echo $row["subject"]; ?> </td>
                <td style="text-align: center; background-color: #A7C7E7; color: black;width: 45.8% ;"> <?php echo $row["total_attendance_participation"]; ?> </td>
                <td style="text-align: center; background-color: #A7C7E7; color: black;width: 45.8% ;"> <?php echo $row["weighted_attendance_participation"]. "%"; ?> </td>
                <td style="text-align: center; background-color: #F8C8DC; color: black;width: 45.8% ;"> <?php echo $row["lab_1"]; ?> </td>
                <td style="text-align: center; background-color: #F8C8DC; color: black;width: 45.8% ;"> <?php echo $row["lab_2"]; ?> </td>
                <td style="text-align: center; background-color: #F8C8DC; color: black;width: 45.8% ;"> <?php echo $row["lab_3"]; ?> </td>
                <td style="text-align: center; background-color: #F8C8DC; color: black;width: 45.8% ;"> <?php echo $row["lab_4"]; ?> </td>
                <td style="text-align: center; background-color: #F8C8DC; color: black;width: 45.8% ;"> <?php echo $row["lab_5"]; ?> </td>
                <td style="text-align: center; background-color: #F8C8DC; color: black;width: 45.8% ;"> <?php echo $row["lab_6"]; ?> </td>
                <td style="text-align: center; background-color: #F8C8DC; color: black;width: 45.8% ;"> <?php echo $row["lab_7"]; ?> </td>
                <td style="text-align: center; background-color: #F8C8DC; color: black;width: 45.8% ;"> <?php echo $row["lab_8"]; ?> </td>
                <td style="text-align: center; background-color: #F8C8DC; color: black;width: 45.8% ;"> <?php echo $row["lab_9"]; ?> </td>
                <td style="text-align: center; background-color: #F8C8DC; color: black;width: 45.8% ;"> <?php echo $row["lab_10"]; ?> </td>
                <td style="text-align: center; background-color: #F8C8DC; color: black;width: 45.8% ;"> <?php echo $row["total_lab"]; ?> </td>
                <td style="text-align: center; background-color: #F8C8DC; color: black;width: 45.8% ;"> <?php echo $row["weighted_lab"]. "%"; ?> </td>
                <td style="text-align: center; background-color: #77DD77; color: black;width: 45.8% ;"> <?php echo $row["practical_1"]; ?> </td>
                <td style="text-align: center; background-color: #77DD77; color: black;width: 45.8% ;"> <?php echo $row["practical_2"]; ?> </td>
                <td style="text-align: center; background-color: #77DD77; color: black;width: 45.8% ;"> <?php echo $row["practical_3"]; ?> </td>
                <td style="text-align: center; background-color: #77DD77; color: black;width: 45.8% ;"> <?php echo $row["practical_4"]; ?> </td>
                <td style="text-align: center; background-color: #77DD77; color: black;width: 45.8% ;"> <?php echo $row["practical_5"]; ?> </td>
                <td style="text-align: center; background-color: #77DD77; color: black;width: 45.8% ;"> <?php echo $row["total_practical"]; ?> </td>
                <td style="text-align: center; background-color: #77DD77; color: black;width: 45.8% ;">   <?php echo $row["weighted_practical"]. "%"; ?> </td>
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
    function editRecord(id) {
        window.location.href = 'editLabMidterm.php?id=' + id;
    }
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
  // Find the index of the "Laboratory" sheet
  $sheetIndex = -1;
  foreach ($reader->sheets() as $index => $sheetName) {
      if ($sheetName === "Laboratory") {
          $sheetIndex = $index;
          break;
      }
  }
  if ($sheetIndex !== -1) {
    $reader->ChangeSheet($sheetIndex); // Change active sheet to "Laboratory"

    $firstRow = true; // Flag to track if it's the first row
    foreach ($reader as $key => $row) {
        if ($firstRow) {
            $firstRow = false;
            continue; // Skip the first row (column headers)
        }
        $lastname = $row[1];
        $studentCode = $row[2];
        $sectionValue = mysqli_real_escape_string($conn, $section); // Sanitize section value before inserting into the database
        $subjectValue = mysqli_real_escape_string($conn, $subject); // Sanitize subject value before inserting into the database
        $attendanceParticipation = isset($row[4]) ? $row[4] : null;
        $weightedAttendanceParticipation = isset($row[5]) ? $row[5] : null;
        $lab1Value = isset($row[6]) ? $row[6] : null;
        $lab2Value = isset($row[7]) ? $row[7] : null;
        $lab3Value = isset($row[8]) ? $row[8] : null;
        $lab4Value = isset($row[9]) ? $row[9] : null;
        $lab5Value = isset($row[10]) ? $row[10] : null;
        $lab6Value = isset($row[11]) ? $row[11] : null;
        $lab7Value = isset($row[12]) ? $row[12] : null;
        $lab8Value = isset($row[13]) ? $row[13] : null;
        $lab9Value = isset($row[14]) ? $row[14] : null;
        $lab10Value = isset($row[15]) ? $row[15] : null;
        $totalLab = isset($row[16]) ? $row[16] : null;
        $weightedLab = isset($row[17]) ? $row[17] : null;
        $practical1Value = isset($row[18]) ? $row[18] : null;
        $practical2Value = isset($row[19]) ? $row[19] : null;
        $practical3Value = isset($row[20]) ? $row[20] : null;
        $practical4Value = isset($row[21]) ? $row[21] : null;
        $practical5Value = isset($row[22]) ? $row[22] : null;
        $totalPractical = isset($row[23]) ? $row[23] : null;
        $weightedPractical = isset($row[24]) ? $row[24] : null;

        if ($firstRow) {
            $firstRow = false;
            continue; // Skip the first row (column headers)
        }
        if (!empty($studentCode) && !empty($lastname)&& $studentCode !== 'Student Number') {
            // Sanitize section and subject values before inserting into the database
            $sectionValue = mysqli_real_escape_string($conn, $section);
            $subjectValue = mysqli_real_escape_string($conn, $subject);
            
            mysqli_query($conn, "INSERT INTO lab_midterm 
            (`lastname`,`student_code`,  `section`, `subject`, `total_attendance_participation`,`weighted_attendance_participation`, `lab_1`, `lab_2`, `lab_3`, `lab_4`, `lab_5`, `lab_6`, `lab_7`, `lab_8`, `lab_9`, `lab_10`, `total_lab`, `weighted_lab`, `practical_1`, `practical_2`, `practical_3`, `practical_4`, `practical_5`, `total_practical`, `weighted_practical`)
            VALUES 
            ('$lastname','$studentCode', '$sectionValue', '$subjectValue', '$attendanceParticipation', '$weightedAttendanceParticipation', '$lab1Value', '$lab2Value', '$lab3Value', '$lab4Value', '$lab5Value', '$lab6Value', '$lab7Value', '$lab8Value', '$lab9Value', '$lab10Value', '$totalLab', '$weightedLab', '$practical1Value', '$practical2Value', '$practical3Value', '$practical4Value', '$practical5Value', '$totalPractical', '$weightedPractical')");
            
    }
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
   

    <?php
    if (isset($_POST["import"])) {
        // Your import logic here, considering the new table structure
        // ...
        echo "
        <script>
        alert('Successfully Imported');
        document.location.href = '';
        </script>
        ";
    }
    ?>
</body>

</html>
