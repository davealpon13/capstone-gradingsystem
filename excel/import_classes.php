
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
    <title>Complete List Classes Table</title>
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
<h1>Complete List Classes Table</h1>
    <div class="import-form">
        <form action="" method="post" enctype="multipart/form-data">
            <input type="file" name="excel" required value="">
            <button type="submit" name="import">Import</button>
        </form>
        <hr>
        <form action="" method="post">
            <input type="text" name="search" placeholder="Search by Level, Section, or Date Created">
            <button type="submit" name="submit_search">Search</button>
        </form>
        <hr>
        <table border="1">
            <tr>
                <!-- Table headers -->
                <td>#</td>
                <td>Level</td>
                <td>Section</td>
                <td>Date Created</td>
                <td>Delete</td>
            </tr>
            <!-- Fetch data from 'classes' table based on search or display all records -->
            <?php
            $query = "SELECT * FROM classes";
            if (isset($_POST["submit_search"])) {
                $searchValue = $_POST["search"];
                $query = "SELECT * FROM classes WHERE 
                level LIKE '%$searchValue%' OR 
                section LIKE '%$searchValue%' OR 
                date_created LIKE '%$searchValue%'";
            }

            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["level"] . "</td>";
                    echo "<td>" . $row["section"] . "</td>";
                    echo "<td>" . $row["date_created"] . "</td>";
                    echo "<td><button onclick=\"deleteRecord(" . $row['id'] . ")\">Delete</button></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No records found</td></tr>";
            }
            ?>
        </table>
        <script>
            function deleteRecord(id) {
                fetch('delete_class.php?id=' + id, {
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

                $level = mysqli_real_escape_string($conn, $row[0]); // Assuming level is in the first column
                $section = mysqli_real_escape_string($conn, $row[1]); // Assuming section is in the second column
                $date_created = mysqli_real_escape_string($conn, $row[2]); // Assuming date_created is in the third column

                $query = "INSERT INTO classes (level, section, date_created) 
                          VALUES ('$level', '$section', '$date_created')";
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
    </div>
</body>
</html>