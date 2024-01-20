
<?php
$servername = "localhost"; // Change this if MySQL is hosted elsewhere
$username = "root"; // Your MySQL username
$password = ""; // Your MySQL password
$dbname = "osrs_db"; // Your database name

// Establish a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the database connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Connected successfully";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Complete List Students Table</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }
        h1 {
            text-align: center;
        }
        .import-form {
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f2f2f2;
        }
        button {
            padding: 8px 16px;
            cursor: pointer;
            margin-right: 10px;
        }
    </style>

</head>
<body>
<h1>Complete List Students Table</h1>
    <div class="import-form">
        <form action="" method="post" enctype="multipart/form-data">
            <input type="file" name="excel" required value="">
            <button type="submit" name="import">Import</button>
        </form>
        <hr>
        <form action="" method="post">
            <input type="text" name="search" placeholder="Search by Lastname or Student Code">
            <button type="submit" name="submit_search">Search</button>
        </form>
        <hr>
        <table border="1">
            <tr>
                <!-- Table headers -->
                <td>#</td>
                <td>Student_code</td>
                <td>Firstname</td>
                <td>Middlename</td>
                <td>Lastname</td>
                <td>Gender</td>
                <td>Address</td>
                <td>Classid</td>
                <td>Delete</td>
            </tr>
            <!-- Fetch data from 'students' table based on search or display all records -->
            <?php
            $query = "SELECT * FROM students";
            if (isset($_POST["submit_search"])) {
                $searchValue = $_POST["search"];
                $query = "SELECT * FROM students WHERE 
                lastname LIKE '%$searchValue%' OR 
                student_code LIKE '%$searchValue%' OR 
                firstname LIKE '%$searchValue%' OR 
                middlename LIKE '%$searchValue%' OR 
                gender LIKE '%$searchValue%' OR 
                address LIKE '%$searchValue%' OR 
                class_id LIKE '%$searchValue%'";
            }

            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["student_code"] . "</td>";
                    echo "<td>" . $row["firstname"] . "</td>";
                    echo "<td>" . $row["middlename"] . "</td>";
                    echo "<td>" . $row["lastname"] . "</td>";
                    echo "<td>" . $row["gender"] . "</td>";
                    echo "<td>" . $row["address"] . "</td>";
                    echo "<td>" . $row["class_id"] . "</td>";
                    echo "<td><button onclick=\"deleteRecord(" . $row['id'] . ")\">Delete</button></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='9'>No records found</td></tr>";
            }
            ?>
        </table>
        <script>
            function deleteRecord(id) {
                fetch('delete.php?id=' + id, {
                    method: 'DELETE'
                })
                .then(response => {
                    if (response.ok) {
                        console.log(`Record with ID ${id} deleted successfully.`);
                        location.reload();
                    } else {
                        console.error('Failed to delete the record.');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
            }
        </script>

    </div>
</body>
</html>
            <?php

if (isset($_POST["import"])) {
    $fileName = $_FILES["excel"]["name"];
    $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
    $targetDirectory = "uploads/" . $fileName; // Adjust the directory path as needed
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

    foreach ($reader as $key => $row) {
        // Skip the first row (header) and start from the second row (index 1)
        if ($key === 0) {
            continue;
        }
    
        $studentCode = mysqli_real_escape_string($conn, $row[0]); // Assuming student code is in the first column
        $firstname = mysqli_real_escape_string($conn, $row[1]); // Assuming first name is in the second column
        $middlename = mysqli_real_escape_string($conn, $row[2]);
        $lastname = mysqli_real_escape_string($conn, $row[3]); // Assuming middle name is in the third column
        $gender = mysqli_real_escape_string($conn, $row[4]); // Assuming gender is in the fourth column
        $address = mysqli_real_escape_string($conn, $row[5]); // Assuming address is in the fifth column
        $class_id = mysqli_real_escape_string($conn, $row[6]); // Assuming class ID is in the sixth column
    
        $query = "INSERT INTO students (student_code, firstname, middlename,lastname, gender, address, class_id) 
                  VALUES ('$studentCode', '$firstname','$middlename','$lastname', '$gender', '$address', '$class_id')";
        mysqli_query($conn, $query);
    }
    echo "
    <script>
    alert('Successfully Imported');
    document.location.href = '';
    </script>
    ";
}
?>
            <!-- ... (rest of the table rows) ... -->
        </table>
    </div>
</body>
</html>
