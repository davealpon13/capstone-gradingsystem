<?php


include 'config.php'; // Include this line if your database connection is in the config.php file

if(isset($_GET['section']) && isset($_GET['subject'])) {
    $section = $_GET['section'];
    $subject = $_GET['subject'];

    // Display the section name and subject on the new page
    echo "<h1 style='color: white;'> $subject</h1>";
    echo "<h1 style='color: white;'> $section</h1>";

   
} else {
    echo "<h1>Section or subject parameter is missing</h1>";
}

?>

<!DOCTYPE html>
<html>
<head>
    

    <title>Lecture Midterm</title>
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
    <h1 class="title">LECTURE MIDTERM</h1>

<div style="display: flex; justify-content: space-around; margin-top: 20px; border: 1px solid #ccc; padding: 10px; border-radius: 6px; background-color: #74ec66; box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);">
    <button onclick="toggleGradeSections('gradeAttendance')" style="flex: 1; padding: 10px 20px; font-size: 16px; background-color: #4CAF50; color: white; border: line 20px; border-radius: 4px; cursor: pointer;">Grade Attendance &amp; Participation</button>
    <div style="width: 2px; background-color: #000000;"></div>
    <button onclick="toggleGradeSections('gradeQuizzesExams')" style="flex: 1; padding: 10px 20px; font-size: 16px; background-color: #008CBA; color: white; border: line 20px; border-radius: 4px; cursor: pointer;">Grade Quizzes/Long Examination</button>
    <div style="width: 2px; background-color: #000000;"></div>
    <button onclick="toggleGradeSections('gradeOutputPortfolio')" style="flex: 1; padding: 10px 20px; font-size: 16px; background-color: #f44336; color: white; border: line 20px; border-radius: 4px; cursor: pointer;">Grade Output/Portfolio</button>
    <div style="width: 2px; background-color: #000000;"></div>
    <button onclick="toggleGradeSections('gradeMidtermExam')" style="flex: 1; padding: 10px 20px; font-size: 16px; background-color: #FF9800; color: white; border: line 20px; border-radius: 4px; cursor: pointer;">Grade Midterm Exam</button>
</div>







<form id="gradeAttendance" method="post" action="process_grades.php" >
    <div  style="margin: 0; padding: 0; display: flex; justify-content: flex-start;">
        <div style="width: 100%;">
            <label for="numRows">Number of Students:</label>
            <input type="number" id="numRows" name="numRows" min="1" oninput="validity.valid||(value='');" max="100" value="30">

            <button onclick="generateRows()">Generate</button>
            <button onclick="toggleRow('add')">+ Row</button>
            <button onclick="toggleRow('remove')">- Row</button>

            
            <table style="font-size: 22px; width: 75.6% ;margin-left: 24.4%; margin-right: auto; border-collapse: collapse;" >
                <tr>
                    <td style="text-align: center; background-color: green; color: white;" colspan="50">Midterm</td>
                </tr>
                <tr>
                    <th style="text-align: center; background-color: green; color: white;width: 50%" >ATTENDANCE</th>
                    <th style="text-align: center; background-color: green; color: white;width: 50%" >PARTICIPATION</th>
                    

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
                    <th  style="text-align: center;">TOTAL</th>
                    <th  style="text-align: center;">WEIGHTED</th>
                    
                    
                </tr>
                <tr>
                        <tr>
                            <th colspan="3" style="text-align: center;"></th>
                            <th style="text-align: center;">
                                <input type="number" name="HPSattendanceTotal" id="HPSattendanceTotal" value="0" min="0" required onchange="calculateWeightedScores()">
                            </th>
                            <th style="text-align: center;">
                                <div style="display: flex; align-items: center; justify-content: center;">
                                    <input type="number" name="HPSattendance_Weighted"  id="HPSattendanceWeighted" value="10" min="0" max="100" style="width: 45%;" readonly>
                                    <span style="margin-left: 3px;">%</span>
                                </div>
                            </th>
                            <th style="text-align: center;">
                                <input type="number" name="HPSparticipationTotal" id="HPSparticipationTotal" value="0" min="0" required onchange="calculateWeightedScores()">
                            </th>
                            <th style="text-align: center;">
                                <div style="display: flex; align-items: center; justify-content: center;">
                                    <input type="number" name="HPSparticipation_Weighted" id="HPSparticipationWeighted" value="10" min="0" max="100" style="width: 45%;"readonly>
                                    <span style="margin-left: 5px;">%</span>
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
        function calculateWeightedScores() {
            let numRows = document.getElementById('numRows').value;
            let globalLimitAttendance = parseFloat(document.getElementById('HPSattendanceTotal').value) || 0;
            let globalLimitParticipation = parseFloat(document.getElementById('HPSparticipationTotal').value) || 0;
            let maxWeightedScore = 10; // Maximum weighted score

            for (let i = 1; i <= numRows; i++) {
                let HPSattendanceTotal = parseFloat(document.getElementById(`attendance_total_${i}`).value) || 0;
                let HPSparticipationTotal = parseFloat(document.getElementById(`participation_total_${i}`).value) || 0;

                let HPSattendanceWeighted = (Math.min(HPSattendanceTotal, globalLimitAttendance) / globalLimitAttendance) * maxWeightedScore;
                let HPSparticipationWeighted = (Math.min(HPSparticipationTotal, globalLimitParticipation) / globalLimitParticipation) * maxWeightedScore;

                document.getElementById(`attendance_weighted_${i}`).value = HPSattendanceWeighted.toFixed(2);
                document.getElementById(`participation_weighted_${i}`).value = HPSparticipationWeighted.toFixed(2);
            }
        }

        function generateRows() {
        let numRows = document.getElementById('numRows').value;
        let rows = '';
        for (let i = 1; i <= numRows; i++) {
            rows += `
                <tr>
                    <td style="text-align: left;">${i}</td>
                    <td style="text-align: left;">
                        <input type="text" name="student_name_${i}" placeholder="Student Name" required>
                    </td>
                    <td style="text-align: left;">
                        <input type="number" name="studentNumber_${i}" min="0" placeholder="Student Number" required style="width: 95%;">
                    </td>
                    <td style="text-align: center;">
                        <input type="number" name="attendance_total_${i}"min="0" id="attendance_total_${i}" value="0" onchange="calculateWeightedScores()">
                    </td>
                    <td style="text-align: center;">
                        <input type="number" name="attendance_weighted_${i}" id="attendance_weighted_${i}" readonly value="0.00">
                    </td>
                    <td style="text-align: center;">
                        <input type="number" name="participation_total_${i}"min="0" id="participation_total_${i}" value="0" onchange="calculateWeightedScores()">
                    </td>
                    <td style="text-align: center;">
                        <input type="number" name="participation_weighted_${i}" id="participation_weighted_${i}" readonly value="0.00">                    
                    </td>
                    <td style="text-align: left; width: 27.5%" class="hidden">
                    <input type="text" name="section" placeholder="Section" value="<?php echo htmlspecialchars(isset($_GET['section']) ? $_GET['section'] : ''); ?>" readonly required>
                    </td>
                    <td style="text-align: left; width: 27.5%" class="hidden">
                    <input type="text" name="subject" placeholder="Subject" value="<?php echo htmlspecialchars(isset($_GET['subject']) ? $_GET['subject'] : ''); ?>" readonly required>
                    </td>



                </tr>
            `;
        }
        
        document.getElementById('studentData').innerHTML = rows;
        initializeLocalStorage(numRows);
    }
        function toggleRow(action) {
    let numRows = parseInt(document.getElementById('numRows').value) || 0;
    if (action === 'add') {
        numRows++;
    } else if (action === 'remove' && numRows > 1) {
        numRows--;
    }
    document.getElementById('numRows').value = numRows;
    generateRows();
}

    

    function initializeLocalStorage(numRows) {
        for (let i = 1; i <= numRows; i++) {
            const storedName = localStorage.getItem(`studentName_${i}`);
            const storedNumber = localStorage.getItem(`studentNumber_${i}`);

            const nameInput = document.querySelector(`input[name="student_name_${i}"]`);
            const numberInput = document.querySelector(`input[name="studentNumber_${i}"]`);

            if (storedName) {
                nameInput.value = storedName;
                updateLocalStorageForName(i, nameInput);
            }
            if (storedNumber) {
                numberInput.value = storedNumber;
                updateLocalStorageForNumber(i, numberInput);
            }
        }
    }

    function updateLocalStorageForName(inputNumber, inputElement) {
        inputElement.addEventListener('input', function () {
            localStorage.setItem(`studentName_${inputNumber}`, inputElement.value);
        });
    }

    function updateLocalStorageForNumber(inputNumber, inputElement) {
        inputElement.addEventListener('input', function () {
            localStorage.setItem(`studentNumber_${inputNumber}`, inputElement.value);
        });
    }

    // Generate rows when the page loads
    generateRows();

        
      </script>
      
    <input type="submit" value="Submit" name="submit" class="custom-submit">

</form>



<!-- Grade Quiz Form -->

<form id="gradeQuizzesExams" method="post" action="process_grades_quiz.php" style="display: none;" class="hidden">
    <div style="margin: 0; padding: 0; display: flex; justify-content: flex-start;">
        <div style="width: 100%;">
            <label for="numRowsQuiz">Number of Students:</label>
            <input type="number" id="numRowsQuiz" min="1" oninput="validity.valid||(value='');" max="100" value="30">
            <button onclick="generateQuizRows()">Generate</button>
            <button onclick="toggleQuizRow('add')">+ Row</button>
            <button onclick="toggleQuizRow('remove')">- Row</button>

            <table style="font-size: 22px; width: 75.6%; margin-left: 24.4%; margin-right: auto; border-collapse: collapse;">
                <tr>
                    <td style="text-align: center; background-color: green; color: white;" colspan="50">Midterm</td>
                </tr>
                <tr>
                    <th style="text-align: center; background-color: green; color: white;width: 50%">Grade Quiz</th>
                </tr>
            </table>
            <table style="font-size: 12px; width: 100%; border-collapse: collapse;">
                <tr>
                    <th style="text-align: center;">#</th>
                    <th style="text-align: center;">Student Name</th>
                    <th style="text-align: center;">Student Number</th>
                    <th style="text-align: center;">Quiz #1</th>
                    <th style="text-align: center;">Quiz #2</th>
                    <th style="text-align: center;">Quiz #3</th>
                    <th style="text-align: center;">Quiz #4</th>
                    <th style="text-align: center;">Quiz #5</th>
                    <th style="text-align: center;">Quiz #6</th>
                    <th style="text-align: center;">Quiz #7</th>
                    <th style="text-align: center;">Quiz #8</th>
                    <th style="text-align: center;">Quiz #9</th>
                    <th style="text-align: center;">Quiz #10</th>
                    <th style="text-align: center;">TOTAL</th>
                    <th style="text-align: center;">WEIGHTED</th>
                    <!-- Add columns for Grade Quiz data -->
                    <!-- For example: Contents 1-10, Total, Weighted -->
                </tr>
                <tr>
                    <tr>
                        <th colspan="3" style="text-align: center;"></th>
                        <th style="text-align: center;">
                            <input type="number" name="hpsquiz_1" value="0" min="0" style="width: 90%;" onchange="calculateQuizTotal()">
                        </th>
                        <th style="text-align: center;">
                            <input type="number" name="hpsquiz_2" value="0" min="0" style="width: 90%;" onchange="calculateQuizTotal()">
                        </th>
                        <th style="text-align: center;">
                            <input type="number" name="hpsquiz_3" value="0" min="0" style="width: 90%;" onchange="calculateQuizTotal()">
                        </th>
                        <th style="text-align: center;">
                            <input type="number" name="hpsquiz_4" value="0" min="0" style="width: 90%;" onchange="calculateQuizTotal()">
                        </th>
                        <th style="text-align: center;">
                            <input type="number" name="hpsquiz_5" value="0" min="0" style="width: 90%;" onchange="calculateQuizTotal()">
                        </th>
                        <th style="text-align: center;">
                            <input type="number" name="hpsquiz_6" value="0" min="0" style="width: 90%;" onchange="calculateQuizTotal()">
                        </th>
                        <th style="text-align: center;">
                            <input type="number" name="hpsquiz_7" value="0" min="0" style="width: 90%;" onchange="calculateQuizTotal()">
                        </th>
                        <th style="text-align: center;">
                            <input type="number" name="hpsquiz_8" value="0" min="0" style="width: 90%;" onchange="calculateQuizTotal()">
                        </th>
                        <th style="text-align: center;">
                            <input type="number" name="hpsquiz_9" value="0" min="0" style="width: 90%;" onchange="calculateQuizTotal()">
                        </th>
                        <th style="text-align: center;">
                            <input type="number" name="hpsquiz_10" value="0" min="0" style="width: 90%;" onchange="calculateQuizTotal()">
                        </th>
                        <th style="text-align: center;">
                            <input type="number" name="hpsquiz_total"  id="quizTotal" value="0" min="0" style="width: 90%;"  readonly>
                        </th>
                        <th style="text-align: center;">
                            <input type="number" name="hpsquiz_weighted" value="15" min="0" style="width: 80%;" readonly>%
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
function calculateQuizTotal() {
    let total = 0;
    for (let i = 1; i <= 10; i++) {
        let quizValue = parseInt(document.getElementsByName(`hpsquiz_${i}`)[0].value);
        total += isNaN(quizValue) ? 0 : quizValue;
    }
    document.getElementById('quizTotal').value = total;
    calculateTotalForAllRows(); // Call the function to update totals for all rows
}

function calculateTotalForAllRows() {
    let numRows = document.getElementById('numRowsQuiz').value;
    let globalLimit = parseInt(document.getElementById('quizTotal').value) || 0;
    let maxWeightedScore = 15; // Maximum weighted score

    for (let i = 1; i <= numRows; i++) {
        let total = 0;

        for (let j = 1; j <= 10; j++) {
            let quizScore = parseInt(document.getElementsByName(`quiz_${i}_${j}`)[0].value) || 0;
            total += quizScore;
        }

        let individualTotalField = document.getElementsByName(`quiz_total_${i}`)[0];
        let individualWeightedField = document.getElementsByName(`quiz_weighted_${i}`)[0];

        if (total > globalLimit) {
            individualTotalField.value = globalLimit;
            individualWeightedField.value = ((globalLimit / globalLimit) * maxWeightedScore).toFixed(2); // Adjust the formula here
        } else {
            individualTotalField.value = total;
            individualWeightedField.value = ((total / globalLimit) * maxWeightedScore).toFixed(2); // Adjust the formula here
        }
    }
}



function toggleQuizRow(action) {
    let numRows = parseInt(document.getElementById('numRowsQuiz').value) || 0;
    if (action === 'add') {
        numRows++;
    } else if (action === 'remove' && numRows > 1) {
        numRows--;
    }
    document.getElementById('numRowsQuiz').value = numRows;
    generateQuizRows();
}




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
                rows += `<td style="text-align: left; width: 5%"><input type="number" name="quiz_${i}_${j}" min="0" value="0" placeholder="" style="width: 90%;" onchange="calculateTotalForAllRows()"></td>`;
            }

            rows += `
                    <td style="text-align: left; width: 5%"><input type="number" name="quiz_total_${i}" min="0" value="0" placeholder="" style="width: 90%;"readonly></td>
                <td style="text-align: left; width: 5%"><input type="number" name="quiz_weighted_${i}" min="0" value="0.00" placeholder="" style="width: 90%;" readonly></td>
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


document.addEventListener('DOMContentLoaded', function () {
    // Generate quiz rows on page load
    generateQuizRows();
});



</script>


<!-- Grade Output/Portfolio Form -->
<form id="gradeOutputPortfolio" method="post" action="process_grades_output.php" style="display: none;" class="hidden">
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
                    <th style="text-align: center; background-color: green; color: white;width: 50%">Grade Output/Portfolio</th>
                </tr>
            </table>
            <table style="font-size: 12px; width: 100%; border-collapse: collapse;">
                <tr>
                    <th style="text-align: center;">#</th>
                    <th style="text-align: center;">Student Name</th>
                    <th style="text-align: center;">Student Number</th>
                    <th style="text-align: center;">1</th>
                    <th style="text-align: center;">2</th>
                    <th style="text-align: center;">3</th>
                    <th style="text-align: center;">4</th>
                    <th style="text-align: center;">5</th>
                    <th style="text-align: center;">6</th>
                    <th style="text-align: center;">7</th>
                    <th style="text-align: center;">8</th>
                    <th style="text-align: center;">9</th>
                    <th style="text-align: center;">10</th>
                    <th style="text-align: center;">TOTAL</th>
                    <th style="text-align: center;">WEIGHTED</th>
                    <!-- Add columns for Grade Output/Portfolio data -->
                    <!-- For example: Contents 1-10, Total, Weighted -->
                </tr>
                <tr>
                    <tr>
                        <th colspan="3" style="text-align: center;"></th>
                        <th style="text-align: center;">
                            <input type="number" name="hpsoutput_1" value="0" min="0" style="width: 90%;" onchange="calculateOutputTotal()">
                        </th>
                        <th style="text-align: center;">
                            <input type="number" name="hpsoutput_2" value="0" min="0" style="width: 90%;" onchange="calculateOutputTotal()">
                        </th>
                        <th style="text-align: center;">
                            <input type="number" name="hpsoutput_3" value="0" min="0" style="width: 90%;" onchange="calculateOutputTotal()">
                        </th>
                        <th style="text-align: center;">
                            <input type="number" name="hpsoutput_4" value="0" min="0" style="width: 90%;" onchange="calculateOutputTotal()">
                        </th>
                        <th style="text-align: center;">
                            <input type="number" name="hpsoutput_5" value="0" min="0" style="width: 90%;" onchange="calculateOutputTotal()">
                        </th>
                        <th style="text-align: center;">
                            <input type="number" name="hpsoutput_6" value="0" min="0" style="width: 90%;" onchange="calculateOutputTotal()">
                        </th>
                        <th style="text-align: center;">
                            <input type="number" name="hpsoutput_7" value="0" min="0" style="width: 90%;" onchange="calculateOutputTotal()">
                        </th>
                        <th style="text-align: center;">
                            <input type="number" name="hpsoutput_8" value="0" min="0" style="width: 90%;" onchange="calculateOutputTotal()">
                        </th>
                        <th style="text-align: center;">
                            <input type="number" name="hpsoutput_9" value="0" min="0" style="width: 90%;" onchange="calculateOutputTotal()">
                        </th>
                        <th style="text-align: center;">
                            <input type="number" name="hpsoutput_10" value="0" min="0" style="width: 90%;" onchange="calculateOutputTotal()">
                        </th>
                        <th style="text-align: center;">
                            <input type="number" name="hpsoutput_total" id="output_total_" value="0" min="0" style="width: 90%;" readonly>
                        </th>
                        <th style="text-align: center;">
                            <input type="number" name="hpsoutput_weighted" value="25" min="0" style="width: 80%;" readonly>%
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
    // Adjust the JavaScript function to match the input names
    function calculateOutputTotal() {
        let numRows = document.getElementById('numRowsOutput').value;
        let maxTotal = 0;

        // Calculate the global maximum total score
        for (let i = 1; i <= 10; i++) {
            let maxScore = parseInt(document.getElementsByName(`hpsoutput_${i}`)[0].value);
            maxTotal += maxScore || 0;
        }
        document.getElementsByName('hpsoutput_total')[0].value = maxTotal;

        // Calculate totals for individual students and their weighted grades
        for (let i = 1; i <= numRows; i++) {
            let total = 0;

            for (let j = 1; j <= 10; j++) {
                let outputScore = parseInt(document.getElementsByName(`output_${i}_${j}`)[0].value) || 0;
                total += outputScore;
            }

            let individualTotalField = document.getElementsByName(`output_total_${i}`)[0];
            let individualWeightedField = document.getElementsByName(`output_weighted_${i}`)[0];

            individualTotalField.value = total;

            if (total > maxTotal) {
                individualTotalField.value = maxTotal;
                individualWeightedField.value = ((maxTotal / maxTotal) * 25).toFixed(2);
            } else {
                individualWeightedField.value = ((total / maxTotal) * 25).toFixed(2);
            }
        }
    }

    // Function to generate rows for Grade Output/Portfolio
    function generateOutputRows() {
        let numRows = document.getElementById('numRowsOutput').value;
        let rows = '';

        for (let i = 1; i <= numRows; i++) {
            rows += `
                <tr>
                    <td style="text-align: left; width: 1%">${i}</td>
                    <!-- Add other student input fields here -->
                    <td style="text-align: left; width: 9%"><input type="text" name="student_name_${i}" placeholder="Student Name" required></td>
                    <td style="text-align: left; width: 9.4%"><input type="number" name="student_number_${i}" min="0" placeholder="Student Number" required style="width: 95%;"></td>
            `;

            for (let j = 1; j <= 10; j++) {
                rows += `<td style="text-align: left; width: 5%"><input type="number" name="output_${i}_${j}" min="0" value="0" placeholder="" style="width: 90%;" onchange="calculateOutputTotal()"></td>`;
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

    // Function to add a row for Grade Output/Portfolio
    function addOutputRow() {
        let numRows = document.getElementById('numRowsOutput');
        numRows.value = parseInt(numRows.value) + 1;
        generateOutputRows();
    }

    // Function to remove a row for Grade Output/Portfolio
    function removeOutputRow() {
        let numRows = document.getElementById('numRowsOutput');
        if (parseInt(numRows.value) > 1) {
            numRows.value = parseInt(numRows.value) - 1;
            generateOutputRows();
        }
    }
    // Automatically generate rows when the page loads
    {
        generateOutputRows();
    };
</script>

<!--@@@@@@@@@@@@@@@@@@@@@@@@@@@@GRADE MIDTERM EXAM@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@-->
<form id="gradeMidtermExam" method="post" action="process_midterm_exam.php"  style="display: none;" class="hidden" >
    <div style="margin: 0; padding: 0; display: flex; justify-content: flex-start;">
        <div style="width: 100%;">
            <label for="numRowsMID">Number of Students:</label>
            <input type="number" id="numRowsMID" min="1" oninput="validity.valid||(value='');" max="100" value="30">
            <button onclick="generateMIDRows()">Generate</button>
            <button onclick="addMIDRow()">+ Row</button>
            <button onclick="removeMIDRow()">- Row</button>
            <table style="font-size: 22px; width: 75.6%; margin-left: 24.4%; margin-right: auto; border-collapse: collapse;">
                <tr>
                    <td style="text-align: center; background-color: green; color: white;" colspan="50">Midterm</td>
                </tr>
                <tr>
                    <th style="text-align: center; background-color: green; color: white;width: 50%">MIDTERM EXAM</th>
                </tr>
            </table>
            <table style="font-size: 12px; width: 100%; border-collapse: collapse;">
                <tr>
                    <th style="text-align: center;">#</th>
                    <th style="text-align: center;">Student Name</th>
                    <th style="text-align: center;">Student Number</th>
                    <th style="text-align: center;">SCORE</th>
                    <th style="text-align: center;">WEIGHTED</th>
                    <!-- Add columns for Grade MID data -->
                    <!-- For example: Contents 1-10, Total, Weighted -->
                </tr>
                <tr>
                    <tr>
                        <th colspan="3" style="text-align: center;"></th>
                        <th style="text-align: center;">
                            <input type="number" name="hpsexam_score" value="0" min="0" style="width: 20%;" onchange="calculateExamWeighted()">
                        </th>
                        <th style="text-align: center;">
                            <input type="number" name="hpsexam_weighted"  value="20" min="0" style="width: 20%;"readonly>%
                        </th>
                        
                    </tr>
                    
                    
                </tr>
                <!-- Student data rows -->
                <tbody id="midStudentData">
                    <!-- Rows will be generated here -->
                </tbody>
            </table>
        </div>
    </div>
    <input type="submit" value="Submit" name="submit" class="custom-submit">
</form>


<script>
    
    // Function to generate rows for Grade 
    function generateMIDRows() {
        let numRows = document.getElementById('numRowsMID').value;
        let rows = '';
        for (let i = 1; i <= numRows; i++) {
            rows += `
                <tr>
                    <td style="text-align: left; width: 1%">${i}</td>
                    <td style="text-align: left; width: 9.3%"><input type="text" name="student_name_${i}" placeholder="Student Name" required></td>
                    <td style="text-align: left; width: 7.4%"><input type="number" name="student_number_${i}" min="0" placeholder="Student Number" required style="width: 95%;"></td>
                    <td style="text-align: center; width: 27.5%"><input type="number" name="mid_total_${i}"  value="0" min="0" placeholder="" style="width: 20%;" onchange="calculateExamWeighted()"></td>
                    <td style="text-align: center; width: 27.5%"><input type="number" name="mid_weighted_${i}" value="0.00" min="0" placeholder="" style="width: 20%; "readonly></td>
                    <td style="text-align: left; width: 27.5%" class="hidden">
                    <input type="text" name="section" placeholder="Section" value="<?php echo htmlspecialchars(isset($_GET['section']) ? $_GET['section'] : ''); ?>" readonly required>
                    </td>
                    <td style="text-align: left; width: 27.5%" class="hidden">
                    <input type="text" name="subject" placeholder="Subject" value="<?php echo htmlspecialchars(isset($_GET['subject']) ? $_GET['subject'] : ''); ?>" readonly required>
                    </td>


                </tr>
            `;
        }
        document.getElementById('midStudentData').innerHTML = rows;
    }

    // Function to add a row for Grade 
    function addMIDRow() {
        let numRows = document.getElementById('numRowsMID');
        numRows.value = parseInt(numRows.value) + 1;
        generateMIDRows();
    }

    // Function to remove a row for Grade 
    function removeMIDRow() {
        let numRows = document.getElementById('numRowsMID');
        if (parseInt(numRows.value) > 1) {
            numRows.value = parseInt(numRows.value) - 1;
            generateMIDRows();
        }
    }
    // Automatically generate rows when the page loads
    window.onload = function() {
        generateMIDRows();
    };

    function calculateExamWeighted() {
    let numRows = document.getElementById('numRowsMID').value;
    let globalLimit = parseInt(document.getElementsByName('hpsexam_score')[0].value) || 0;
    let maxWeightedScore = 20; // Maximum weighted score for the exam

    for (let i = 1; i <= numRows; i++) {
        let total = parseInt(document.getElementsByName(`mid_total_${i}`)[0].value) || 0;
        let individualTotalField = document.getElementsByName(`mid_total_${i}`)[0];
        let individualWeightedField = document.getElementsByName(`mid_weighted_${i}`)[0];

        individualTotalField.value = total;

        if (total > globalLimit) {
            individualTotalField.value = globalLimit;
            individualWeightedField.value = ((globalLimit / globalLimit) * maxWeightedScore).toFixed(2);
        } else {
            individualWeightedField.value = ((total / globalLimit) * maxWeightedScore).toFixed(2);
        }
    }
}

</script>


</div>



</body>
</html>