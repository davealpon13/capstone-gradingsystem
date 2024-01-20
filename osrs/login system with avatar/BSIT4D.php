<?php
include 'config.php';

$query = "SELECT * FROM students WHERE class_id = 11";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BSIT4D Students</title>
    <!-- Add your CSS styles here -->
</head>
<body>
    <h1>BSIT4D Students</h1>
    <a href="home.php">Back to Home</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>lastname</th>
            <!-- Add more table headers if needed -->
        </tr>
        <?php
        while($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>".$row['id']."</td>";
            echo "<td>".$row['lastname']."</td>";
            // Add more table data columns if needed
            echo "</tr>";
        }
        ?>
    </table>
    

</body>
</html>
