<?php require 'config.php'; ?>
<?php
if(isset($_GET['section']) && isset($_GET['subject'])) {
    $section = $_GET['section'];
    $subject = $_GET['subject'];

    // Display the section name and subject on the new page
    echo "<h1>Section: $section</h1>";
    echo "<h1>Subject: $subject</h1>";
    // Rest of your code for displaying grading_sheet table goes here
} else {
    echo "<h1>Section or subject parameter is missing</h1>";
}
if (isset($_POST['action']) && $_POST['action'] == 'delete') {
    if (isset($_POST['id'])) {
        $id = mysqli_real_escape_string($conn, $_POST['id']);
        $query = "DELETE FROM grading_sheet WHERE id='$id'";
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
    $query = "DELETE FROM grading_sheet WHERE section='$section' AND subject='$subject'";
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
    <title>Grading Sheet</title>
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
            border: 1px solid #cdc9c9; /* Use a slightly different shade for borders */
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
<h1>Grading Sheet Table</h1>
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
    <tr style="background-color: #026c3b; color: white;">

        <td>#</td>
            <td>Lastname</td>
            <td>Student Code</td>
            <td>Section</td>
            <td>Subject</td>
            <td>Grade</td>
            <td>Credit</td>
            <td>Remarks</td>
        </tr>
        <?php
        $i = 1;
    $rows = mysqli_query($conn, "SELECT * FROM grading_sheet WHERE section='$section' AND subject='$subject'");

        foreach ($rows as $row) :
        ?>
            <tr>
            <td> <?php echo $i++; ?> </td>
                <td style="background-color: #ECECEC; color: black;"> <?php echo $row["lastname"]; ?> </td>
                <td> <?php echo $row["student_code"]; ?> </td>
                <td style="background-color: #ECECEC; color: black;"> <?php echo $row["section"]; ?> </td>
                <td> <?php echo $row["subject"]; ?> </td>
                <td style="background-color: #ECECEC; color: black;"> <?php echo $row["grade"]; ?> </td>
                <td> <?php echo $row["credit"]; ?> </td>
                <td style="background-color: #ECECEC; color: black;"> <?php echo $row["remarks"]; ?> </td>
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

    require 'excelReader/excel_reader2.php';
    require 'excelReader/SpreadsheetReader.php';

    $reader = new SpreadsheetReader($targetDirectory);

  // Find the index of the "Grading Sheet" sheet
  $sheetIndex = -1;
  foreach ($reader->sheets() as $index => $sheetName) {
      if ($sheetName === "Grading Sheet") {
          $sheetIndex = $index;
          break;
      }
  }
  if ($sheetIndex !== -1) {
    $reader->ChangeSheet($sheetIndex); // Change active sheet to "Grading Sheet"

    foreach ($reader as $key => $row) {
        $lastname = $row[0];
        $studentCode = $row[1];
        $sectionValue = mysqli_real_escape_string($conn, $section); // Sanitize section value before inserting into the database
        $subjectValue = mysqli_real_escape_string($conn, $subject); // Sanitize subject value before inserting into the database
        $gradeValue =  isset($row[2]) ? $row[2] : null;
        $creditValue =  isset($row[3]) ? $row[3] : null;
        $remarksValue =  isset($row[4]) ? $row[4] : null;
    
        $excludedValues = ['Curriculum Year:', 'Semester/Summer:', 'Name','1:00 – 1:75','5','TOTAL','RANGE'];
            if (!empty($studentCode) && !empty($lastname)&&  !in_array($lastname, $excludedValues)) {
                // Sanitize section and subject values before inserting into the database
                $sectionValue = mysqli_real_escape_string($conn, $section);
                $subjectValue = mysqli_real_escape_string($conn, $subject);
                mysqli_query($conn, "INSERT INTO grading_sheet 
                (`lastname`, `student_code`, `subject`, `section`, `grade`, `credit`, `remarks`)
                VALUES 
                ('$lastname', '$studentCode', '$subjectValue', '$sectionValue', '$gradeValue', '$creditValue', '$remarksValue')");
            
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
</body>

</html>