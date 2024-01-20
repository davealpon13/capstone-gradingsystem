<!-- edit_form.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Edit Finals Record</title>
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
        // Handle the form submission and update the record in the database
        // Add your validation and update logic here
        $newLastName = mysqli_real_escape_string($conn, $_POST['lastname']);
        $newAttendanceDays = mysqli_real_escape_string($conn, $_POST['attendance_days']);
        $weightedAttendance = mysqli_real_escape_string($conn, $_POST['weighted_attendance']);
        $newParticipationScore = mysqli_real_escape_string($conn, $_POST['participation_score']);
        $weightedParticipation = mysqli_real_escape_string($conn, $_POST['weighted_participation']);
        $newQuiz1 = mysqli_real_escape_string($conn, $_POST['quiz_1']);
        $newQuiz2 = mysqli_real_escape_string($conn, $_POST['quiz_2']);
        $newQuiz3 = mysqli_real_escape_string($conn, $_POST['quiz_3']);
        $newQuiz4 = mysqli_real_escape_string($conn, $_POST['quiz_4']);
        $newQuiz5 = mysqli_real_escape_string($conn, $_POST['quiz_5']);
        $newQuiz6 = mysqli_real_escape_string($conn, $_POST['quiz_6']);
        $newQuiz7 = mysqli_real_escape_string($conn, $_POST['quiz_7']);
        $newQuiz8 = mysqli_real_escape_string($conn, $_POST['quiz_8']);
        $newQuiz9 = mysqli_real_escape_string($conn, $_POST['quiz_9']);
        $newQuiz10 = mysqli_real_escape_string($conn, $_POST['quiz_10']);
        $newOutput1 = mysqli_real_escape_string($conn, $_POST['output_1']);
        $newOutput2 = mysqli_real_escape_string($conn, $_POST['output_2']);
        $newOutput3 = mysqli_real_escape_string($conn, $_POST['output_3']);
        $newOutput4 = mysqli_real_escape_string($conn, $_POST['output_4']);
        $newOutput5 = mysqli_real_escape_string($conn, $_POST['output_5']);
        $newOutput6 = mysqli_real_escape_string($conn, $_POST['output_6']);
        $newOutput7 = mysqli_real_escape_string($conn, $_POST['output_7']);
        $newOutput8 = mysqli_real_escape_string($conn, $_POST['output_8']);
        $newOutput9 = mysqli_real_escape_string($conn, $_POST['output_9']);
        $newOutput10 = mysqli_real_escape_string($conn, $_POST['output_10']);
        $overallWeightedQuizzes = mysqli_real_escape_string($conn, $_POST['weighted_quizzes']);
        $overallWeightedOutputs = mysqli_real_escape_string($conn, $_POST['weighted_outputs']);
        $newFinals = mysqli_real_escape_string($conn, $_POST['finals_score']);
        $weightedFinals = mysqli_real_escape_string($conn, $_POST['weighted_finals']);

    

// Update the query with the new fields and values
$updateQuery = "UPDATE finals SET 
    lastname = '$newLastName',
    attendance_days = '$newAttendanceDays',
    weighted_attendance = '$weightedAttendance',
    participation_score = '$newParticipationScore',
    weighted_participation = '$weightedParticipation',
    quiz_1 = '$newQuiz1',
    quiz_2 = '$newQuiz2',
    quiz_3 = '$newQuiz3',
    quiz_4 = '$newQuiz4',
    quiz_5 = '$newQuiz5',
    quiz_6 = '$newQuiz6',
    quiz_7 = '$newQuiz7',
    quiz_8 = '$newQuiz8',
    quiz_9 = '$newQuiz9',
    quiz_10 = '$newQuiz10',
    output_1 = '$newOutput1',
    output_2 = '$newOutput2',
    output_3 = '$newOutput3',
    output_4 = '$newOutput4',
    output_5 = '$newOutput5',
    output_6 = '$newOutput6',
    output_7 = '$newOutput7',
    output_8 = '$newOutput8',
    output_9 = '$newOutput9',
    output_10 = '$newOutput10',
    finals_score = '$newFinals',
    weighted_quizzes = '$overallWeightedQuizzes', 
    weighted_outputs = '$overallWeightedOutputs', 
    weighted_finals = '$weightedFinals'
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

    <label for="attendance_days">Attendance Days:</label>
    <input type="text" name="attendance_days" value="<?php echo $row['attendance_days']; ?>">
   
    <label for="weighted_attendance">Weighted Attendance Days 10%:</label>
    <input type="text" name="weighted_attendance" value="<?php echo $row['weighted_attendance']; ?>">

    <label for="participation_score">Participation Score:</label>
    <input type="text" name="participation_score" value="<?php echo $row['participation_score']; ?>">

    <label for="weighted_participation"> Weighted Participation Score 10%:</label>
    <input type="text" name="weighted_participation" value="<?php echo $row['weighted_participation']; ?>">

    <?php for ($i = 1; $i <= 10; $i++) : ?>
        <label for="quiz_<?php echo $i; ?>">Quiz <?php echo $i; ?>:</label>
        <input type="text" name="quiz_<?php echo $i; ?>" value="<?php echo $row['quiz_' . $i]; ?>">
    <?php endfor; ?>

    <label for="weighted_quizzes"> Weighted Quiz 15%:</label>
    <input type="text" name="weighted_quizzes" value="<?php echo $row['weighted_quizzes']; ?>">

    <?php for ($i = 1; $i <= 10; $i++) : ?>
        <label for="output_<?php echo $i; ?>">Output <?php echo $i; ?>:</label>
        <input type="text" name="output_<?php echo $i; ?>" value="<?php echo $row['output_' . $i]; ?>">
    <?php endfor; ?>

    <label for="weighted_outputs"> Weighted Output 25%:</label>
    <input type="text" name="weighted_outputs" value="<?php echo $row['weighted_outputs']; ?>">

    <label for="finals_score">Finals Score:</label>
    <input type="text" name="finals_score" value="<?php echo $row['finals_score']; ?>">

    <label for="weighted_finals">Weighted Finals Score 20%:</label>
    <input type="text" name="weighted_finals" value="<?php echo $row['weighted_finals']; ?>">

    <button type="submit" name="update">Update</button>
</form>
</body>
</html>
</div>

</body>
</html>
