<!-- edit_form.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Edit Laboratory Finals Record</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        header {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 20px 0;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        form {
            margin-top: 20px;
        }

        label {
            display: block;
            margin: 10px 0 5px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button.goBack {
            background-color: #555;
        }

        button:hover, button.goBack:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Edit Record</h1>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $newLastName = mysqli_real_escape_string($conn, $_POST['lastname']);
        $newAttendanceParticipation = mysqli_real_escape_string($conn, $_POST['total_attendance_participation']);
        $weightedAttendanceParticipation = mysqli_real_escape_string($conn, $_POST['weighted_attendance_participation']);
        $newLab1 = mysqli_real_escape_string($conn, $_POST['lab_1']);
        $newLab2 = mysqli_real_escape_string($conn, $_POST['lab_2']);
        $newLab3 = mysqli_real_escape_string($conn, $_POST['lab_3']);
        $newLab4 = mysqli_real_escape_string($conn, $_POST['lab_4']);
        $newLab5 = mysqli_real_escape_string($conn, $_POST['lab_5']);
        $newLab6 = mysqli_real_escape_string($conn, $_POST['lab_6']);
        $newLab7 = mysqli_real_escape_string($conn, $_POST['lab_7']);
        $newLab8 = mysqli_real_escape_string($conn, $_POST['lab_8']);
        $newLab9 = mysqli_real_escape_string($conn, $_POST['lab_9']);
        $newLab10 = mysqli_real_escape_string($conn, $_POST['lab_10']);
        $overallWeightedLab = mysqli_real_escape_string($conn, $_POST['weighted_lab']);
        $newPractical1 = mysqli_real_escape_string($conn, $_POST['practical_1']);
        $newPractical2 = mysqli_real_escape_string($conn, $_POST['practical_2']);
        $newPractical3 = mysqli_real_escape_string($conn, $_POST['practical_3']);
        $newPractical4 = mysqli_real_escape_string($conn, $_POST['practical_4']);
        $newPractical5 = mysqli_real_escape_string($conn, $_POST['practical_5']);
        $overallWeightedPractical = mysqli_real_escape_string($conn, $_POST['weighted_practical']);

       
       // Update the query with the new fields and values
       $updateQuery = "UPDATE lab_finals SET 
           lastname = '$newLastName',
           total_attendance_participation = '$newAttendanceParticipation',
           lab_1 = '$newLab1',
           lab_2 = '$newLab2',
           lab_3 = '$newLab3',
           lab_4 = '$newLab4',
           lab_5 = '$newLab5',
           lab_6 = '$newLab6',
           lab_7 = '$newLab7',
           lab_8 = '$newLab8',
           lab_9 = '$newLab9',
           lab_10 = '$newLab10',
           practical_1 = '$newPractical1',
           practical_2 = '$newPractical2',
           practical_3 = '$newPractical3',
           practical_4 = '$newPractical4',
           practical_5 = '$newPractical5',
           weighted_attendance_participation = '$weightedAttendanceParticipation', 
           weighted_lab = '$overallWeightedLab', 
           weighted_practical = '$overallWeightedPractical'
           WHERE id = '$id'";
       

        $updateResult = mysqli_query($conn, $updateQuery);

        if ($updateResult) {
            echo "<p>Record updated successfully!</p>";
        } else {
            echo "<p>Error updating record: " . mysqli_error($conn) . "</p>";
        }
    }
    ?>

<form action="" method="post">
    <label for="lastname">Lastname:</label>
    <input type="text" name="lastname" value="<?php echo $row['lastname']; ?>" required>

    <label for="total_attendance_participation">Attendance and Participation:</label>
    <input type="text" name="total_attendance_participation" value="<?php echo $row['total_attendance_participation']; ?>">
   
    <label for="weighted_attendance_participation">Weighted Attendance and Participation 20%:</label>
    <input type="text" name="weighted_attendance_participation" value="<?php echo $row['weighted_attendance_participation']; ?>">

    <?php for ($i = 1; $i <= 10; $i++) : ?>
        <label for="lab_<?php echo $i; ?>">Lab <?php echo $i; ?>:</label>
        <input type="text" name="lab_<?php echo $i; ?>" value="<?php echo $row['lab_' . $i]; ?>">
    <?php endfor; ?>

    <label for="weighted_lab"> Weighted Lab 50%:</label>
    <input type="text" name="weighted_lab" value="<?php echo $row['weighted_lab']; ?>">

    <?php for ($i = 1; $i <= 5; $i++) : ?>
        <label for="practical_<?php echo $i; ?>">Practical <?php echo $i; ?>:</label>
        <input type="text" name="practical_<?php echo $i; ?>" value="<?php echo $row['practical_' . $i]; ?>">
    <?php endfor; ?>

    <label for="weighted_practical"> Weighted Practical 30%:</label>
    <input type="text" name="weighted_practical" value="<?php echo $row['weighted_practical']; ?>">

    <button type="submit" name="update">Update</button>
</form>

    </form>
    </div>
 
</body>
</html>
