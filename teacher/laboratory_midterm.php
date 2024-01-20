<?php
// display_info.php

if(isset($_GET['section']) && isset($_GET['subject'])) {
    $section = $_GET['section'];
    $subject = $_GET['subject'];

    // Display the section and subject on the new page
    echo "<h1 style='color: white;'> $subject</h1>";
    echo "<h1 style='color: white;'> $section</h1>";

    // Add the rest of your code to display information based on section and subject
} else {
    echo "<h1>Section or subject parameter is missing</h1>";
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Laboratory Midterm</title>
    <style>
        
        body {
            background-color: #198754;;
            color: rgb(0, 0, 0); /* Set text color to contrast with the background */
            font-family: Arial, sans-serif; /* Example font */
            /* Add other styles as needed */
        }
        /* ... (other styles) ... */
        /* Add your CSS styles here */
        /* For demonstration purposes, some basic styles are included */
        table {
            border-collapse: collapse;
            width: 80%;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 2px;
            text-align: left;
        }
        input[type="text"] {
            width: 100%;
            box-sizing: border-box;
        }
        input[type="submit"] {
            width: 100px;
            padding: 8px;
        }
        input[type="number"] {
            text-align: center;
        }
        h1 {
            text-align: center;
            font-size: 36px;
            margin-top: 50px;
            text-shadow: 5px 5px 7px rgba(0, 0, 0, 1);
        }
        .hidden {
            display: none;
        }
        #section5 {
            margin-top: 20px;
            padding: 20px;
            background-color: #333;
            color: white;

        }
        form{
            margin: 0;
             padding: 0;
        }
        .title {
    text-align: center;
    color: #fff;
    font-size: 48px;
    font-weight: bold;
    padding: 20px;
    margin-top: 40px;
    background-color: #4CAF50;
    border: 6px solid #2E7D32;
    border-radius: 10px;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.3);
    text-transform: uppercase;
    letter-spacing: 2px;
}
.button-container {
    display: flex;
    justify-content: space-around;
    width: 100%;
    overflow-x: auto;
    padding: 10px;
    background-color: #4CAF50; /* Change as per your background */
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    box-sizing: border-box;
    white-space: nowrap;
}

.custom-button {
    flex: 0 0 auto;
    padding: 10px 20px;
    font-size: 16px;
    border: 2px solid #ffffff;
    border-radius: 4px;
    cursor: pointer;
    margin: 5px;
    transition: all 0.3s ease;
    color: #2E7D32; /* Set the text color to white */
}
.custom-button a {
    color: white; /* Set the text color to white for the anchor tag inside the button */
    text-decoration: none; /* Remove default underline for the anchor tag */
}




.black-button {
    background-color:#134f16;
    color: white;
}

.custom-button:hover {
    transform: scale(1.05);
}

.custom-button:focus {
    outline: none;
}
.custom-submit {
    padding: 10px 20px;
    font-size: 16px;
    background-color: green;
    color: #fffdfd;
    border: 3px solid  #000000;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.custom-submit:hover {
    background-color: rgb(0, 80, 0); /* Darker shade on hover */
}
.hidden {
        display: none;
    }

        
    </style>
    <script>
        function toggleGradeSections(grade) {
            var sections = ['gradeAttendance', 'gradeQuizzesExams', 'gradeOutputPortfolio', 'gradeMidtermExam'];
            
            sections.forEach(function(sectionId) {
                var section = document.getElementById(sectionId);
                if (sectionId === grade) {
                    section.style.display = 'block';
                } else {
                    section.style.display = 'none';
                }
            });
        }
    
        function toggleAllSections(grade) {
            toggleGradeSections(grade);
        }
    
        function hideAllSections() {
            var allSections = document.querySelectorAll('.hidden');
            
            allSections.forEach(function(section) {
                section.style.display = 'none';
            });
        }
    </script>
    
    
    
    
    
    <div class="button-container">
        <img src="logo.png" width="296" height="64" alt="Logo">
        <button class="custom-button black-button">
        <a href="lecture_midterm.php?section=<?php echo urlencode($section); ?>&subject=<?php echo urlencode($subject); ?>">
        LECTURE MIDTERM
    </a>
    </button>
        <button class="custom-button black-button">
    <a href="lecture_final.php?section=<?php echo urlencode($section); ?>&subject=<?php echo urlencode($subject); ?>">
        LECTURE FINAL
    </a>
    </button>
    <button class="custom-button black-button">
    <a href="laboratory_midterm.php?section=<?php echo urlencode($section); ?>&subject=<?php echo urlencode($subject); ?>">
        LABORATORY MIDTERM
    </a>
    </button>
    <button class="custom-button black-button">
    <a href="laboratory_final.php?section=<?php echo urlencode($section); ?>&subject=<?php echo urlencode($subject); ?>">
    LABORATORY FINAL
    </a>
    </button>
        <button  class="custom-button black-button"><a href="consolidated.html">CONSOLIDATED</a></button>
        <button  class="custom-button black-button"><a href="grading_sheet.html">GRADING SHEET</a></button>
        <button  class="custom-button black-button"><a href="transmutation_table.html">TRANSMUTATION TABLE</a></button>
    </div>




    
    
</head>
<body>

<div id="section1">

    <h1 class="title">LABORTORY MIDTERM</h1>

<div style="display: flex; justify-content: space-around; margin-top: 20px; border: 1px solid #ccc; padding: 10px; border-radius: 6px; background-color: #74ec66; box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);">
    <button onclick="toggleGradeSections('gradeAttendance')" style="flex: 1; padding: 10px 20px; font-size: 16px; background-color: #4CAF50; color: white; border: line 20px; border-radius: 4px; cursor: pointer;">Grade Attendance &amp; Participation</button>
    <div style="width: 2px; background-color: #000000;"></div>
    <button onclick="toggleGradeSections('gradeQuizzesExams')" style="flex: 1; padding: 10px 20px; font-size: 16px; background-color: #008CBA; color: white; border: line 20px; border-radius: 4px; cursor: pointer;">Grade Laboratory Reports</button>
    <div style="width: 2px; background-color: #000000;"></div>
    <button onclick="toggleGradeSections('gradeOutputPortfolio')" style="flex: 1; padding: 10px 20px; font-size: 16px; background-color: #f44336; color: white; border: line 20px; border-radius: 4px; cursor: pointer;">Practical Exam</button>
    <div style="width: 2px; background-color: #000000;"></div>
</div>







<form id="gradeAttendance" method="post" action="process_lab_attendance.php" >
    <div  style="margin: 0; padding: 0; display: flex; justify-content: flex-start;">
        <div style="width: 100%;">
            <label for="numRows">Number of Students:</label>
            <input type="number" id="numRows" min="1" oninput="validity.valid||(value='');" max="100" value="30">
            <button onclick="generateRows()">Generate</button>
            <button onclick="addRow()">+ Row</button>
            <button onclick="removeRow()">- Row</button>
            
            <table style="font-size: 22px; width: 75.6% ;margin-left: 24.4%; margin-right: auto; border-collapse: collapse;" >
                <tr>
                    <td style="text-align: center; background-color: green; color: white;" colspan="50">Midterm</td>
                </tr>
                <tr>
                    <th style="text-align: center; background-color: green; color: white;width: 50%" >ATTENDANCE/PARTICIPATION</th>

                    

                </tr>
            </table>
            
            <table style="font-size: 12px; width: 100%; border-collapse: collapse;">
                
                <colgroup>
                    <col style="width: 1%;">
                    <col style="width: 10%;">
                    <col style="width: 8.3%;">
                    <col style="width: 15%;">
                    <col style="width: 15%;">
                    <col style="width: 15%;">
                    <col style="width: 15%;">
                    
                    
                </colgroup>
                <tr>
                    <th style="text-align: left;">#</th>
                    <th style="text-align: center;">Student Name</th>
                    <th  style="text-align: center;">Student Number</th>
                    <th  style="text-align: center;">TOTAL</th>
                    <th  style="text-align: center;">WEIGHTED</th>  
                    
                    
                </tr>
                <tr>
                        <tr>
                            <th colspan="3" style="text-align: center;"></th>
                            <th style="text-align: center;">
                                <input type="number" name="hps_final_total_attendance" value="0" min="0" onchange="calculateAttendanceWeighted()" required>
                            </th>
                            <th style="text-align: center;">
                                <div style="display: flex; align-items: center; justify-content: center;">
                                    <input type="number" name="hps_final_weighted_attendance" value="20" min="0" max="100" style="width: 45%;" readonly>
                                    <span style="margin-left: 3px;">%</span>
                                </div>
                            </th>

                        </tr>
                        
                        
                    </tr>
                    
                
                </tr>
                <!-- Student data rows -->
                <tbody id="studentData">
                    <!-- Rows will be generated here -->
                </tbody>
            </table>
        </div>
    </div>
    <script>
        
        function calculateAttendanceWeighted() {
        let numRows = document.getElementById('numRows').value;
        let globalLimit = parseInt(document.getElementsByName('hps_final_total_attendance')[0].value) || 0;
        let maxWeightedScore = parseInt(document.getElementsByName('hps_final_weighted_attendance')[0].value) || 0;

        for (let i = 1; i <= numRows; i++) {
            let totalAttendance = parseInt(document.getElementsByName(`final_total_attendance_${i}`)[0].value) || 0;
            let individualTotalField = document.getElementsByName(`final_total_attendance_${i}`)[0];
            let individualWeightedField = document.getElementsByName(`final_weighted_attendance_${i}`)[0];

            individualTotalField.value = totalAttendance;

            if (totalAttendance > globalLimit) {
                individualTotalField.value = globalLimit;
                individualWeightedField.value = ((globalLimit / globalLimit) * maxWeightedScore).toFixed(2);
            } else {
                individualWeightedField.value = ((totalAttendance / globalLimit) * maxWeightedScore).toFixed(2);
            }
        }
    }

    
        // Function to generate rows based on input
        function generateRows() {
            let numRows = document.getElementById('numRows').value;
            let rows = '';
            for (let i = 1; i <= numRows; i++) {
                rows += `
                <tr>
                    <td style="text-align: left;">${i}</td>
                    <td style="text-align: left;"><input type="text" name="student_name_${i}" placeholder="Student Name" required ></td>
                    <td style="text-align: left;"><input type="number" name="student_number_${i}" MIN=0 placeholder="Student Number" required style="width: 92%;"></td>
                    <td style="text-align: center;"> <input type="number" min="0" value="0" name="final_total_attendance_${i}" onchange="calculateAttendanceWeighted()" ></td>
                    <td style="text-align: center;"><input type="number" min="0" value="0.00" name="final_weighted_attendance_${i}" readonly></td>
                    <td style="text-align: left; width: 27.5%" class="hidden">
                    <input type="text" name="section" placeholder="Section" value="<?php echo htmlspecialchars(isset($_GET['section']) ? $_GET['section'] : ''); ?>" readonly required>
                    </td>
                    <td style="text-align: left; width: 27.5%" class="hidden">
                    <input type="text" name="subject" placeholder="Subject" value="<?php echo htmlspecialchars(isset($_GET['subject']) ? $_GET['subject'] : ''); ?>" readonly required>
                    </td>
                    
                </tr>
                `
            }
            document.getElementById('studentData').innerHTML = rows;
        }

        // Function to add a row
        function addRow() {
            let numRows = document.getElementById('numRows');
            numRows.value = parseInt(numRows.value) + 1;
            generateRows();
        }

        // Function to remove a row
        function removeRow() {
            let numRows = document.getElementById('numRows');
            if (parseInt(numRows.value) > 1) {
                numRows.value = parseInt(numRows.value) - 1;
                generateRows();
            }
        }

        // Generate rows when the page loads
        generateRows();

        
        
    </script>
    <input type="submit" value="Submit" name="submit" class="custom-submit">

</form>



<!-- Grade Quiz Form -->
<form id="gradeQuizzesExams" method="post" action="process_lab_output.php" style="display: none;" class="hidden">
    <div style="margin: 0; padding: 0; display: flex; justify-content: flex-start;">
        <div style="width: 100%;">
            <label for="numRowsQuiz">Number of Students:</label>
            <input type="number" id="numRowsQuiz" min="1" oninput="validity.valid||(value='');" max="100" value="30">
            <button onclick="generateQuizRows()">Generate</button>
            <button onclick="addQuizRow()">+ Row</button>
            <button onclick="removeQuizRow()">- Row</button>
            <table style="font-size: 22px; width: 75.6%; margin-left: 24.4%; margin-right: auto; border-collapse: collapse;">
                <tr>
                    <td style="text-align: center; background-color: green; color: white;" colspan="50">Midterm</td>
                </tr>
                <tr>
                    <th style="text-align: center; background-color: green; color: white;width: 50%">Grade Laboratory Reports</th>
                </tr>
            </table>
            <table style="font-size: 12px; width: 100%; border-collapse: collapse;">
                <tr>
                    <th style="text-align: center;">#</th>
                    <th style="text-align: center;">Student Name</th>
                    <th style="text-align: center;">Student Number</th>
                    <th style="text-align: center;">Lab Activity #1</th>
                    <th style="text-align: center;">Lab Activity #2</th>
                    <th style="text-align: center;">Lab Activity #3</th>
                    <th style="text-align: center;">Lab Activity #4</th>
                    <th style="text-align: center;">Lab Activity #5</th>
                    <th style="text-align: center;">Lab Activity #6</th>
                    <th style="text-align: center;">Lab Activity #7</th>
                    <th style="text-align: center;">Lab Activity #8</th>
                    <th style="text-align: center;">Lab Activity #9</th>
                    <th style="text-align: center;">Lab Activity #10</th>
                    <th style="text-align: center;">TOTAL</th>
                    <th style="text-align: center;">WEIGHTED</th>
                    <!-- Add columns for Grade Quiz data -->
                    <!-- For example: Contents 1-10, Total, Weighted -->
                </tr>
                <tr>
                    <tr>
                        <th colspan="3" style="text-align: center;"></th>
                        <th style="text-align: center;">
                            <input type="number" name="final_labmaxscore1" value="0" min="0" style="width: 90%;" onchange="calculateLabWeighted()">
                        </th>
                        <th style="text-align: center;">
                            <input type="number" name="final_labmaxscore2" value="0" min="0" style="width: 90%;" onchange="calculateLabWeighted()">
                        </th>
                        <th style="text-align: center;">
                            <input type="number" name="final_labmaxscore3" value="0" min="0" style="width: 90%;" onchange="calculateLabWeighted()">
                        </th>
                        <th style="text-align: center;">
                            <input type="number" name="final_labmaxscore4" value="0" min="0" style="width: 90%;" onchange="calculateLabWeighted()">
                        </th>
                        <th style="text-align: center;">
                            <input type="number" name="final_labmaxscore5" value="0" min="0" style="width: 90%;" onchange="calculateLabWeighted()">
                        </th>
                        <th style="text-align: center;">
                            <input type="number" name="final_labmaxscore6" value="0" min="0" style="width: 90%;" onchange="calculateLabWeighted()">
                        </th>
                        <th style="text-align: center;">
                            <input type="number" name="final_labmaxscore7" value="0" min="0" style="width: 90%;" onchange="calculateLabWeighted()">
                        </th>
                        <th style="text-align: center;">
                            <input type="number" name="final_labmaxscore8" value="0" min="0" style="width: 90%;" onchange="calculateLabWeighted()">
                        </th>
                        <th style="text-align: center;">
                            <input type="number" name="final_labmaxscore9" value="0" min="0" style="width: 90%;" onchange="calculateLabWeighted()">
                        </th>
                        <th style="text-align: center;">
                            <input type="number" name="final_labmaxscore10" value="0" min="0" style="width: 90%;" onchange="calculateLabWeighted()">
                        </th>
                        <th style="text-align: center;">
                            <input type="number" name="final_lab_total" id="final_lab_total" value="0" min="0" style="width: 90%;" readonly>
                        </th>
                        <th style="text-align: center;">
                            <input type="number" name="final_lab_weighted" value="50" min="0" style="width: 80%;"readonly>%
                        </th>
                    </tr>
                    
                    
                </tr>
                <!-- Student data rows -->
                <tbody id="quizStudentData">
                    <!-- Rows will be generated here -->
                </tbody>
            </table>
        </div>
    </div>
    <input type="submit" value="Submit" name="submit" class="custom-submit">
</form>

<script>
    function calculateLabWeighted() {
    let numRows = document.getElementById('numRowsQuiz').value;
    let maxWeightedScore = 50;
    
    let totalLabScore = 0;
    
    for (let i = 1; i <= 10; i++) {
        let score = parseInt(document.getElementsByName(`final_labmaxscore${i}`)[0].value) || 0;
        totalLabScore += score;
    }

    document.getElementById('final_lab_total').value = totalLabScore;

    
    for (let i = 1; i <= numRows; i++) {
        let totalQuiz = 0;
        for (let j = 1; j <= 10; j++) {
            let score = parseInt(document.getElementsByName(`final_quiz_number_${i}_${j}`)[0].value) || 0;
            totalQuiz += score;
        }

        let individualTotalField = document.getElementsByName(`final_quiz_total_${i}`)[0];
        let individualWeightedField = document.getElementsByName(`final_quiz_weighted_${i}`)[0];

        individualTotalField.value = totalQuiz;

        // You might need to adjust this logic based on your requirements for globalLimit
        let globalLimit = parseInt(document.getElementsByName('final_lab_total')[0].value) || 0;

        if (globalLimit !== 0) {
            if (totalQuiz > globalLimit) {
                individualTotalField.value = globalLimit;
                individualWeightedField.value = ((globalLimit / globalLimit) * maxWeightedScore).toFixed(2);
            } else {
                individualWeightedField.value = ((totalQuiz / globalLimit) * maxWeightedScore).toFixed(2);
            }
        } else {
            individualWeightedField.value = "Global Limit is not set";
        }
    }
}



    // Function to generate rows for Grade Quiz
    function generateQuizRows() {
    let numRows = document.getElementById('numRowsQuiz').value;
    let rows = '';

    for (let i = 1; i <= numRows; i++) {
        rows += `
            <tr>
                <td style="text-align: left; width: 1%">${i}</td>
                <td style="text-align: left; width: 9%"><input type="text" name="student_name_${i}" placeholder="Student Name" required></td>
                <td style="text-align: left; width: 9.4%"><input type="number" name="student_number_${i}" min="0" placeholder="Student Number" required style="width: 95%;"></td>`;

        for (let j = 1; j <= 10; j++) {
            rows += `<td style="text-align: left; width: 5%"><input type="number" name="final_quiz_number_${i}_${j}" min="0" value="0" placeholder="" style="width: 90%;" onchange="calculateLabWeighted()"></td>`;
        }

        rows += `
                <td style="text-align: left; width: 5%"><input type="number" name="final_quiz_total_${i}" min="0" value="0" placeholder="" style="width: 90%;" readonly></td>
                <td style="text-align: left; width: 5%"><input type="number" name="final_quiz_weighted_${i}" min="0" value="0.00" placeholder="" style="width: 90%;" readonly></td>
                <td style="text-align: left; width: 27.5%" class="hidden">
                    <input type="text" name="section" placeholder="Section" value="<?php echo htmlspecialchars(isset($_GET['section']) ? $_GET['section'] : ''); ?>" readonly required>
                    </td>
                    <td style="text-align: left; width: 27.5%" class="hidden">
                    <input type="text" name="subject" placeholder="Subject" value="<?php echo htmlspecialchars(isset($_GET['subject']) ? $_GET['subject'] : ''); ?>" readonly required>
                    </td>

            </tr>
        `;
    }
    document.getElementById('quizStudentData').innerHTML = rows;
}


    // Function to add a row for Grade Quiz
    function addQuizRow() {
        let numRows = document.getElementById('numRowsQuiz');
        numRows.value = parseInt(numRows.value) + 1;
        generateQuizRows();
    }

    // Function to remove a row for GradeQuiz
    function removeQuizRow() {
        let numRows = document.getElementById('numRowsQuiz');
        if (parseInt(numRows.value) > 1) {
            numRows.value = parseInt(numRows.value) - 1;
            generateQuizRows();
        }
    }
    // Automatically generate rows when the page loads
    {
        generateQuizRows();
    };
</script>





<form id="gradeOutputPortfolio" method="post" action="process_lab_exam.php" style="display: none;" class="hidden">
    <div style="margin: 0; padding: 0; display: flex; justify-content: flex-start;">
        <div style="width: 100%;">
            <label for="numRowsOutput">Number of Students:</label>
            <input type="number" id="numRowsOutput" min="1" oninput="validity.valid||(value='');" max="100" value="30">
            <button onclick="generateOutputRows()">Generate</button>
            <button onclick="addOutputRow()">+ Row</button>
            <button onclick="removeOutputRow()">- Row</button>
            <table style="font-size: 22px; width: 75.6%; margin-left: 24.4%; margin-right: auto; border-collapse: collapse;">
                <tr>
                    <td style="text-align: center; background-color: green; color: white;" colspan="50">Midterm</td>
                </tr>
                <tr>
                    <th style="text-align: center; background-color: green; color: white;width: 50%">Grade Practical Exam</th>
                </tr>
            </table>
            <table style="font-size: 12px; width: 68%; border-collapse: collapse;">
                <tr>
                    <th style="text-align:  center;">#</th>
                    <th style="text-align: center;">Student Name</th>
                    <th style="text-align: center;">Student Number</th>
                    <th style="text-align: center;">1</th>
                    <th style="text-align: center;">2</th>
                    <th style="text-align: center;">3</th>
                    <th style="text-align: center;">4</th>
                    <th style="text-align: center;">5</th>
                    <th style="text-align: center;">TOTAL</th>
                    <th style="text-align: center;">WEIGHTED</th>
                    <!-- Add columns for Practical Exam data -->
                    <!-- For example: Contents 1-10, Total, Weighted -->
                </tr>
                <tr>
                    <tr>
                        <th colspan="3" style="text-align: center;"></th>
                        <th style="text-align: center;">
                            <input type="number" name="HPSexam_1" value="0" min="0" style="width: 90%;" onchange="updateTotalMaxScore()">
                        </th>
                        <th style="text-align: center;">
                            <input type="number" name="HPSexam_2" value="0" min="0" style="width: 90%;" onchange="updateTotalMaxScore()">
                        </th>
                        <th style="text-align: center;">
                            <input type="number" name="HPSexam_3" value="0" min="0" style="width: 90%;" onchange="updateTotalMaxScore()">
                        </th>
                        <th style="text-align: center;">
                            <input type="number" name="HPSexam_4" value="0" min="0" style="width: 90%;" onchange="updateTotalMaxScore()">
                        </th>
                        <th style="text-align: center;">
                            <input type="number" name="HPSexam_5" value="0" min="0" style="width: 90%;" onchange="updateTotalMaxScore()">
                        </th>
                        <th style="text-align: center;">
                            <input type="number" name="HPSexam_total_maxscore" id="HPSexam_total_maxscore" value="0" min="0" style="width: 90%;" readonly>
                        </th>
                       <th style="text-align: center;">
                            <input type="number" name="HPSexam_weighted" value="30" min="0" style="width: 80%;" readonly>%
                        </th>

                    </tr>
                    
                    
                </tr>
                <!-- Student data rows -->
                <tbody id="outputStudentData">
                    <!-- Rows will be generated here -->
                </tbody>
            </table>
        </div>
    </div>
    <input type="submit" value="Submit" name="submit" class="custom-submit">
</form>

<script>
    
    
    function updateTotalMaxScore() {
    let maxScore = 0;

    // Calculate the maximum total score
    let numRows = document.getElementById('numRowsOutput').value;
    for (let i = 1; i <= numRows; i++) {
        for (let j = 1; j <= 5; j++) {
            let score = parseInt(document.getElementsByName(`HPSexam_${j}`)[0].value);
            maxScore += isNaN(score) ? 0 : score;
        }
    }

    // Update the maximum total score
    document.getElementById('HPSexam_total_maxscore').value = maxScore;

    // Recalculate weighted scores for all students
    calculateAllWeightedScores();
}


    

    // Function to generate rows for Grade Practical Exam
    function generateOutputRows() {
        let numRows = document.getElementById('numRowsOutput').value;
        let rows = '';

        for (let i = 1; i <= numRows; i++) {
            rows += `
                <tr>
                    <td style="text-align: left; width: 1%">${i}</td>
                    <td style="text-align: left; width: 9%"><input type="text" name="exam_student_name_${i}" placeholder="Student Name" required></td>
                    <td style="text-align: left; width: 9.4%"><input type="number" name="exam_student_number_${i}" min="0" placeholder="Student Number" required style="width: 95%;"></td>
            `;

            // Generating inputs for each exam
            for (let j = 1; j <= 5; j++) {
                rows += `<td style="text-align: left; width: 5%"><input type="number" name="output_number_${i}_${j}" min="0" value="0" placeholder="" style="width: 90%;" onchange="calculateWeighted(${i})"></td>`;
            }

            rows += `
                    <td style="text-align: left; width: 5%"><input type="number" name="output_total_${i}" min="0" value="0" placeholder="" style="width: 90%;" readonly></td>
                    <td style="text-align: left; width: 5%"><input type="number" name="output_weighted_${i}" min="0" value="0.00" placeholder="" style="width: 90%;" readonly></td>
                    <td style="text-align: left; width: 27.5%" class="hidden">
                    <input type="text" name="section" placeholder="Section" value="<?php echo htmlspecialchars(isset($_GET['section']) ? $_GET['section'] : ''); ?>" readonly required>
                    </td>
                    <td style="text-align: left; width: 27.5%" class="hidden">
                    <input type="text" name="subject" placeholder="Subject" value="<?php echo htmlspecialchars(isset($_GET['subject']) ? $_GET['subject'] : ''); ?>" readonly required>
                    </td>


                </tr>
            `;
        }

        document.getElementById('outputStudentData').innerHTML = rows;
    }

    // Function to add a row for Grade Practical Exam
    function addOutputRow() {
        let numRows = document.getElementById('numRowsOutput');
        numRows.value = parseInt(numRows.value) + 1;
        generateOutputRows();
    }

    // Function to remove a row for Grade Practical Exam
    function removeOutputRow() {
        let numRows = document.getElementById('numRowsOutput');
        if (parseInt(numRows.value) > 1) {
            numRows.value = parseInt(numRows.value) - 1;
            generateOutputRows();
        }
    }
    // Function to calculate the weighted score for a student
// Function to calculate the weighted score for a student
function calculateWeighted(studentIndex) {
    let maxScore = 0;
    let totalScore = 0;

    // Calculate the maximum total score (sum of exam_1 to exam_5)
    for (let j = 1; j <= 5; j++) {
        let score = parseInt(document.getElementsByName(`HPSexam_${j}`)[0].value);
        maxScore += isNaN(score) ? 0 : score;
    }

    // Update the maximum total score
    document.getElementById('HPSexam_total_maxscore').value = maxScore;

    // Calculate the total score for the student
    for (let j = 1; j <= 5; j++) {
        let score = parseInt(document.getElementsByName(`output_number_${studentIndex}_${j}`)[0].value);
        totalScore += isNaN(score) ? 0 : score;
    }

    // Limit the student's total score to the maximum total score of exams
    totalScore = Math.min(totalScore, maxScore);

    // Update the total score for the student
    document.getElementsByName(`output_total_${studentIndex}`)[0].value = totalScore;

    // Calculate the weighted score as a percentage
    let weightedScore = (totalScore / maxScore) * 30; // Assuming 30% weightage
    weightedScore = Math.min(weightedScore, 30); // Limit to a maximum of 30
    document.getElementsByName(`output_weighted_${studentIndex}`)[0].value = weightedScore.toFixed(2);
}

// Function to calculate the weighted scores for all students
function calculateAllWeightedScores() {
    let numRows = document.getElementById('numRowsOutput').value;

    for (let i = 1; i <= numRows; i++) {
        calculateWeighted(i);
    }
}

    // Automatically generate rows when the page loads
    {
        generateOutputRows();
    };
</script>


</div>



</body>
</html>