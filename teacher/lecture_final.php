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
    <title>Lecture Final</title>
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

    <h1 class="title">LECTURE FINAL</h1>

<div style="display: flex; justify-content: space-around; margin-top: 20px; border: 1px solid #ccc; padding: 10px; border-radius: 6px; background-color: #74ec66; box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);">
    <button onclick="toggleGradeSections('gradeAttendance')" style="flex: 1; padding: 10px 20px; font-size: 16px; background-color: #4CAF50; color: white; border: line 20px; border-radius: 4px; cursor: pointer;">Grade Attendance &amp; Participation</button>
    <div style="width: 2px; background-color: #000000;"></div>
    <button onclick="toggleGradeSections('gradeQuizzesExams')" style="flex: 1; padding: 10px 20px; font-size: 16px; background-color: #008CBA; color: white; border: line 20px; border-radius: 4px; cursor: pointer;">Grade Quizzes/Long Examination</button>
    <div style="width: 2px; background-color: #000000;"></div>
    <button onclick="toggleGradeSections('gradeOutputPortfolio')" style="flex: 1; padding: 10px 20px; font-size: 16px; background-color: #f44336; color: white; border: line 20px; border-radius: 4px; cursor: pointer;">Grade Output/Portfolio</button>
    <div style="width: 2px; background-color: #000000;"></div>
    <button onclick="toggleGradeSections('gradeMidtermExam')" style="flex: 1; padding: 10px 20px; font-size: 16px; background-color: #FF9800; color: white; border: line 20px; border-radius: 4px; cursor: pointer;">Grade Final Exam</button>
</div>







<form id="gradeAttendance" method="post" action="process_grades.php">
    <div style="margin: 0; padding: 0; display: flex; justify-content: flex-start;">
        <div style="width: 100%;">
            <label for="numRows">Number of Students:</label>
            <input type="number" id="numRows" min="1" oninput="validity.valid||(value='');" max="100" value="30">
            <button onclick="generateRows()">Generate</button>
            <button onclick="addRow()">+ Row</button>
            <button onclick="removeRow()">- Row</button>
            
            <table style="font-size: 22px; width: 75.6%; margin-left: 24.4%; margin-right: auto; border-collapse: collapse;">
                <tr>
                    <td style="text-align: center; background-color: green; color: white;" colspan="50"> Performance After Midterm</td>
                </tr>
                <tr>
                    <th style="text-align: center; background-color: green; color: white;width: 50%">ATTENDANCE</th>
                    <th style="text-align: center; background-color: green; color: white;width: 50%">PARTICIPATION</th>
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
                    <th style="text-align: center;">Student Number</th>
                    <th style="text-align: center;">Total Attendance during Midterm</th>
                    <th style="text-align: center;">Total Attendance after Midterm</th>
                    <th style="text-align: center;">TOTAL</th>
                    <th style="text-align: center;">WEIGHTED</th>
                    <th style="text-align: center;">Total Participation during Midterm</th>
                    <th style="text-align: center;">Total Participation after Midterm</th>
                    <th style="text-align: center;">TOTAL</th>
                    <th style="text-align: center;">WEIGHTED</th>
                </tr>
                <button onclick="populateFromTable()">Populate from Table</button>
<button onclick="removeFormData()">Remove Data</button>

<script>
let originalFormData;

function populateFromTable() {
    let xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            let data = JSON.parse(xhr.responseText);
            originalFormData = data;
            populateFormWithData(data);
        }
    };
    xhr.open('GET', 'populate_attendance_participation.php', true);
    xhr.send();
}

function populateFormWithData(data) {
    let sectionValue = document.getElementsByName('section')[0].value;
    let subjectValue = document.getElementsByName('subject')[0].value;
    let numRows = data.length;
    document.getElementById('numRows').value = numRows;
    for (let i = 0; i < numRows; i++) {
        if (data[i].section === sectionValue && data[i].subject === subjectValue) {
            document.getElementsByName(`student_name_${i + 1}`)[0].value = data[i].student_name;
            document.getElementsByName(`student_number_${i + 1}`)[0].value = data[i].student_number;
            document.getElementsByName(`section`)[0].value = data[i].section;
            document.getElementsByName(`subject`)[0].value = data[i].subject;
            document.getElementsByName(`total_attendance_duringmidterm${i + 1}`)[0].value = data[i].attendance_total;
            document.getElementsByName(`total_participation_duringmidterm${i + 1}`)[0].value = data[i].participation_total;
            document.getElementsByName(`HPS_attendance_duringmidterm`)[0].value = data[i].HPSattendanceTotal;
            document.getElementsByName(`HPS_participation_duringmidterm`)[0].value = data[i].HPSparticipationTotal;
        }
    }
    calculateWeightedScores();
}

function removeFormData() {
    let numRows = document.getElementById('numRows').value;
    let sectionValue = document.getElementsByName('section')[0].value;
    let subjectValue = document.getElementsByName('subject')[0].value;
    for (let i = 1; i <= numRows; i++) {
        if (
            document.getElementsByName(`section`)[0].value === sectionValue &&
            document.getElementsByName(`subject`)[0].value === subjectValue &&
            document.getElementsByName(`student_name_${i}`)[0].value !== ''
        ) {
            document.getElementsByName(`student_name_${i}`)[0].value = '';
            document.getElementsByName(`student_number_${i}`)[0].value = '';
            document.getElementsByName(`section`)[0].value = '0';
            document.getElementsByName(`subject`)[0].value = '0';
            document.getElementsByName(`total_attendance_duringmidterm${i}`)[0].value = '0';
            document.getElementsByName(`total_participation_duringmidterm${i}`)[0].value = '0';
            document.getElementsByName(`HPS_attendance_duringmidterm`)[0].value = '0';
            document.getElementsByName(`HPS_participation_duringmidterm`)[0].value = '0';
        }
    }
    calculateWeightedScores();
}

function calculateWeightedScores() {
    // Add your logic to calculate weighted scores here
}
</script>

            

                <tr>
                    <tr>
                        <th colspan="3" style="text-align: center;"></th>
                        <th style="text-align: center;">
                            <input type="number" name="HPS_attendance_duringmidterm" value="0" min="0" required onchange="calculateWeightedScores()">
                        </th>  
                        <th style="text-align: center;">
                            <input type="number" name="HPStotal_attendance_aftermidterm" id="HPStotal_attendance_aftermidterm" value="0" min="0" required onchange="calculateWeightedScores()"></th>
                            <th style="text-align: center;">
                            
                                <div style="display: flex; align-items: center; justify-content: center;"onchange="calculateWeightedScores()">
                                    <input type="number" name="HPStotal_attendance" value="0" min="0" max="100" style="width: 45%;">
                                    <span style="margin-left: 3px;"></span>
                                </div>
                            </th>
                            <th style="text-align: center;">
                            
                                <div style="display: flex; align-items: center; justify-content: center;">
                                    <input type="number" name="HPSattendance_weighted" value="10" min="0" max="100" style="width: 45%;"onchange="calculateWeightedScores()">
                                    <span style="margin-left: 3px;">%</span>
                                </div>
                            </th>
                            <th style="text-align: center;">
                                <input type="number" name="HPS_participation_duringmidterm" value="0" min="0" required onchange="calculateWeightedScores()">
                            </th>  
                            <th style="text-align: center;">
                                <input type="number" name="HPStotal_participation_aftermidterm" value="0" min="0" required onchange="calculateWeightedScores()">
                            </th>  

                        <th style="text-align: center;">
                            <input type="number" name="HPStotal_participation" value="0" min="0" required>
                        </th>
                        <th style="text-align: center;">
                            <div style="display: flex; align-items: center; justify-content: center;">
                                <input type="number" name="HPSparticipationweighted" value="10" min="0" max="100" style="width: 45%;">
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

    for (let i = 1; i <= numRows; i++) {
        // Retrieve values for each student
        const totalAttendanceDuringMidterm = parseFloat(document.getElementsByName(`total_attendance_duringmidterm${i}`)[0].value) || 0;
        const totalAttendanceAfterMidterm = parseFloat(document.getElementsByName(`total_attendance_aftermidterm${i}`)[0].value) || 0;
        const totalParticipationDuringMidterm = parseFloat(document.getElementsByName(`total_participation_duringmidterm${i}`)[0].value) || 0;
        const totalParticipationAfterMidterm = parseFloat(document.getElementsByName(`total_participation_aftermidterm${i}`)[0].value) || 0;

        // Calculate total attendance and participation
        const totalAttendance = totalAttendanceDuringMidterm + totalAttendanceAfterMidterm;
        const totalParticipation = totalParticipationDuringMidterm + totalParticipationAfterMidterm;

        // Update total attendance and participation input fields
        document.getElementsByName(`total_attendance${i}`)[0].value = totalAttendance.toFixed(2);
        document.getElementsByName(`total_participation${i}`)[0].value = totalParticipation.toFixed(2);

        // Retrieve values for HPS
        const HPSAttendanceDuringMidterm = parseFloat(document.getElementsByName('HPS_attendance_duringmidterm')[0].value) || 0;
        const HPStotalAttendanceAfterMidterm = parseFloat(document.getElementsByName('HPStotal_attendance_aftermidterm')[0].value) || 0;
        const HPSParticipationDuringMidterm = parseFloat(document.getElementsByName('HPS_participation_duringmidterm')[0].value) || 0;
        const HPStotalParticipationAfterMidterm = parseFloat(document.getElementsByName('HPStotal_participation_aftermidterm')[0].value) || 0;

        // Calculate HPS total attendance and participation
        const HPStotalAttendance = HPSAttendanceDuringMidterm + HPStotalAttendanceAfterMidterm;
        const HPStotalParticipation = HPSParticipationDuringMidterm + HPStotalParticipationAfterMidterm;

        // Update HPS total attendance and participation input fields
        document.getElementsByName('HPStotal_attendance')[0].value = HPStotalAttendance.toFixed(2);
        document.getElementsByName('HPStotal_participation')[0].value = HPStotalParticipation.toFixed(2);

        // Calculate and update total attendance and participation for each student
        const cappedTotalAttendance = Math.min(totalAttendance, HPStotalAttendance);
        const cappedTotalParticipation = Math.min(totalParticipation, HPStotalParticipation);

        document.getElementsByName(`total_attendance${i}`)[0].value = cappedTotalAttendance.toFixed(2);
        document.getElementsByName(`total_participation${i}`)[0].value = cappedTotalParticipation.toFixed(2);

        // Calculate and update weighted attendance and participation for each student
        const weightedAttendance = (HPStotalAttendance !== 0) ? cappedTotalAttendance / HPStotalAttendance * 10 : 0;
        const weightedParticipation = (HPStotalParticipation !== 0) ? cappedTotalParticipation / HPStotalParticipation * 10 : 0;

        document.getElementsByName(`weighted_attendance_${i}`)[0].value = weightedAttendance.toFixed(2);
        document.getElementsByName(`participation_weighted_${i}`)[0].value = weightedParticipation.toFixed(2);
    }
}

    
    function generateRows() {
        let numRows = document.getElementById('numRows').value;
        let rows = '';
        for (let i = 1; i <= numRows; i++) {
            rows += `
                <tr>
                    <td style="text-align: left;">${i}</td>
                    <td style="text-align: left;"><input type="text" name="student_name_${i}" placeholder="Student Name" required></td>
                    <td style="text-align: left;"><input type="number" name="student_number_${i}" min="0" placeholder="Student Number" required style="width: 92%;"></td>
                    <td style="text-align: center;"><input type="number" name="total_attendance_duringmidterm${i}" min="0" value="${attendanceTotal}" onchange="calculateWeightedScores()"></td>
                    <td style="text-align: center;"><input type="number" name="total_attendance_aftermidterm${i}" min="0" value="${attendanceTotal}" onchange="calculateWeightedScores()"></td>
                    <td style="text-align: center;"><input type="number" value="0.00" name="total_attendance${i}" min="0" readonly></td>
                    <td style="text-align: center;"><input type="number" value="0.00" name="weighted_attendance_${i}" min="0" readonly></td>
                    <td style="text-align: center;"><input type="number" name="total_participation_duringmidterm${i}" min="0" value="${participationTotal}" onchange="calculateWeightedScores()"></td>
                    <td style="text-align: center;"><input type="number" name="total_participation_aftermidterm${i}" min="0" value="${participationTotal}" onchange="calculateWeightedScores()"></td>
                    <td style="text-align: center;"><input type="number" name="total_participation${i}" min="0" value="${participationTotal}" onchange="calculateWeightedScores()"></td>
                    <td style="text-align: center;"><input type="number" value="0.00" min="0" name="participation_weighted_${i}" readonly></td>
                    <td style="text-align: left; width: 27.5%" class="hidden">
                    <input type="text" name="section" placeholder="Section" value="<?php echo htmlspecialchars(isset($_GET['section']) ? $_GET['section'] : ''); ?>" readonly required>
                    </td>
                    <td style="text-align: left; width: 27.5%" class="hidden">
                    <input type="text" name="subject" placeholder="Subject" value="<?php echo htmlspecialchars(isset($_GET['subject']) ? $_GET['subject'] : ''); ?>" readonly required>
                    </td>

                </tr>`;
        }
        document.getElementById('studentData').innerHTML = rows;
    }

    function addRow() {
        let numRows = document.getElementById('numRows');
        numRows.value = parseInt(numRows.value) + 1;
        generateRows();
    }

    function removeRow() {
        let numRows = document.getElementById('numRows');
        if (parseInt(numRows.value) > 1) {
            numRows.value = parseInt(numRows.value) - 1;
            generateRows();
        }
    }

    // Fetch the totals from the URL query parameters
    const urlParams = new URLSearchParams(window.location.search);
    const attendanceTotal = parseFloat(urlParams.get('attendanceTotal')) || 0;
    const participationTotal = parseFloat(urlParams.get('participationTotal')) || 0;

    generateRows(); // Generate rows with the totals when the page loads

    // Function to get URL parameters by name
function getParameterByName(name, url = window.location.href) {
    name = name.replace(/[\[\]]/g, '\\$&');
    const regex = new RegExp(`[?&]${name}(=([^&#]*)|&|#|$)`);
    const results = url.match(regex);

    if (!results) return null;

    // Handling multiple values for the same 'i'
    const values = results[0].split('&');
    const paramValues = {};

    values.forEach(val => {
        const [key, value] = val.split('=');
        const i = key.replace(/[^\d]/g, ''); // Extract 'i' from the parameter name

        if (!paramValues[i]) {
            paramValues[i] = [];
        }

        paramValues[i].push(decodeURIComponent(value));
    });

    return paramValues;
}

let i = 1; // Replace this with the specific 'i' value you want

let parametersForI = getParameterByName(`total_attendance_duringmidterm${i}`);
console.log(`Parameters for 'i' = ${i}:`, parametersForI);

    
</script>
    <input type="submit" value="Submit" name="submit" class="custom-submit">
</form>





<form id="gradeQuizzesExams" method="post" action="process_grades.php" style="display: none;" class="hidden">
    <div style="margin: 0; padding: 0; display: flex; justify-content: flex-start;">
        <div style="width: 100%;">
            <label for="numRowsQuiz">Number of Students:</label>
            <input type="number" id="numRowsQuiz" min="1" oninput="validity.valid||(value='');" max="100" value="30">
            <button onclick="generateQuizRows()">Generate</button>
            <button onclick="addQuizRow()">+ Row</button>
            <button onclick="removeQuizRow()">- Row</button>
            <table style="font-size: 22px; width: 75.6%; margin-left: 24.4%; margin-right: auto; border-collapse: collapse;">
                <tr>
                    <td style="text-align: center; background-color: green; color: white;" colspan="50">Performance After Midterm</td>
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
                    <th style="text-align: center;">Total Quizzes/Long Exams during Midterm </th>
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

            

<button onclick="populateFromTableQuiz()">Populate from Table</button>
<button onclick="removeFormData()">Remove Data</button>

<script>
let originalFormData;

function populateFromTableQuiz() {
    let xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4) {
            if (xhr.status == 200) {
                let data = JSON.parse(xhr.responseText);
                originalFormData = data;
                populateFormWithData(data);
            } else {
                console.error('Error fetching data:', xhr.status, xhr.statusText);
            }
        }
    };
    xhr.open('GET', 'populate_midterm_quiz.php', true);
    xhr.send();
}

function populateFormWithData(data) {
    let sectionValue = document.getElementsByName('section')[0].value;
    let subjectValue = document.getElementsByName('subject')[0].value;
    let numRowsQuiz = data.length;
    document.getElementById('numRowsQuiz').value = numRowsQuiz;
    for (let i = 0; i < numRowsQuiz; i++) {
        if (data[i].section === sectionValue && data[i].subject === subjectValue) {
            document.getElementsByName(`quiz_student_name_${i + 1}`)[0].value = data[i].quiz_student_name;
            document.getElementsByName(`quiz_student_number_${i + 1}`)[0].value = data[i].quiz_student_number;
            document.getElementsByName(`section`)[0].value = data[i].section;
            document.getElementsByName(`subject`)[0].value = data[i].subject;
            document.getElementsByName(`total_quiz_duringmidterm${i + 1}`)[0].value = data[i].quiz_total;
            document.getElementsByName(`HPSquiz_total_duringmidterm`)[0].value = data[i].hpsquiz_total;
        }
    }
    calculateWeightedScores();
}

function removeFormData() {
    let numRowsQuiz = document.getElementById('numRowsQuiz').value;
    let sectionValue = document.getElementsByName('section')[0].value;
    let subjectValue = document.getElementsByName('subject')[0].value;
    for (let i = 1; i <= numRowsQuiz; i++) {
        if (
            document.getElementsByName(`section`)[0].value === sectionValue &&
            document.getElementsByName(`subject`)[0].value === subjectValue &&
            document.getElementsByName(`quiz_student_name_${i}`)[0].value !== ''
        ) {
            document.getElementsByName(`quiz_student_name_${i}`)[0].value = '';
            document.getElementsByName(`quiz_student_number_${i}`)[0].value = '';
            document.getElementsByName(`section`)[0].value = '0';
            document.getElementsByName(`subject`)[0].value = '0';
            document.getElementsByName(`total_quiz_duringmidterm${i}`)[0].value = '0';
            document.getElementsByName(`HPSquiz_total_duringmidterm`)[0].value = '0';
        }
    }
    calculateWeightedScores();
}

function calculateWeightedScores() {
    // Add your logic to calculate weighted scores here
}
</script>


                <tr>
                    <tr>
                        <th colspan="3" style="text-align: center;"></th>
                        <th style="text-align: center;">
                            <input type="number" name="HPSquiz_total_duringmidterm" value="0" min="0" style="width: 90%;" >
                        </th>
                        <th style="text-align: center;">
                            <input type="number" name="HPSquiz1" value="0" min="0" style="width: 90%;" onchange="calculateWeightedQuizzes()">
                        </th>
                        <th style="text-align: center;">
                            <input type="number" name="HPSquiz2" value="0" min="0" style="width: 90%;" onchange="calculateWeightedQuizzes()">
                        </th>
                        <th style="text-align: center;">
                            <input type="number" name="HPSquiz3" value="0" min="0" style="width: 90%;" onchange="calculateWeightedQuizzes()">
                        </th>
                        <th style="text-align: center;">
                            <input type="number" name="HPSquiz4" value="0" min="0" style="width: 90%;" onchange="calculateWeightedQuizzes()">
                        </th>
                        <th style="text-align: center;">
                            <input type="number" name="HPSquiz5" value="0" min="0" style="width: 90%;" onchange="calculateWeightedQuizzes()">
                        </th>
                        <th style="text-align: center;">
                            <input type="number" name="HPSquiz6" value="0" min="0" style="width: 90%;" onchange="calculateWeightedQuizzes()">
                        </th>
                        <th style="text-align: center;">
                            <input type="number" name="HPSquiz7" value="0" min="0" style="width: 90%;" onchange="calculateWeightedQuizzes()">
                        </th>
                        <th style="text-align: center;">
                            <input type="number" name="HPSquiz8" value="0" min="0" style="width: 90%;" onchange="calculateWeightedQuizzes()">
                        </th>
                        <th style="text-align: center;">
                            <input type="number" name="HPSquiz9" value="0" min="0" style="width: 90%;" onchange="calculateWeightedQuizzes()">
                        </th>
                        <th style="text-align: center;">
                            <input type="number" name="HPSquiz10" value="0" min="0" style="width: 90%;" onchange="calculateWeightedQuizzes()">
                        </th>
                        <th style="text-align: center;">
                            <input type="number" name="HPSquiztotal" value="0" min="0" style="width: 90%;" readonly>
                        </th>
                        <th style="text-align: center;">
                            <input type="number" name="HPSquizweighted" value="15" min="0" style="width: 80%;"readonly>%
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
    <script>
       // Function to calculate and update weighted quiz scores for each student
function calculateWeightedQuizzes() {
    let numRows = document.getElementById('numRowsQuiz').value;

    // Retrieve values for HPS
    const HPSquizTotalDuringMidterm = parseFloat(document.getElementsByName('HPSquiz_total_duringmidterm')[0].value) || 0;
    const HPSquiz1 = parseFloat(document.getElementsByName('HPSquiz1')[0].value) || 0;
    const HPSquiz2 = parseFloat(document.getElementsByName('HPSquiz2')[0].value) || 0;
    const HPSquiz3 = parseFloat(document.getElementsByName('HPSquiz3')[0].value) || 0;
    const HPSquiz4 = parseFloat(document.getElementsByName('HPSquiz4')[0].value) || 0;
    const HPSquiz5 = parseFloat(document.getElementsByName('HPSquiz5')[0].value) || 0;
    const HPSquiz6 = parseFloat(document.getElementsByName('HPSquiz6')[0].value) || 0;
    const HPSquiz7 = parseFloat(document.getElementsByName('HPSquiz7')[0].value) || 0;
    const HPSquiz8 = parseFloat(document.getElementsByName('HPSquiz8')[0].value) || 0;
    const HPSquiz9 = parseFloat(document.getElementsByName('HPSquiz9')[0].value) || 0;
    const HPSquiz10 = parseFloat(document.getElementsByName('HPSquiz10')[0].value) || 0;

    // Calculate HPS quiz total
    const HPSquizTotal = HPSquizTotalDuringMidterm + HPSquiz1 + HPSquiz2 + HPSquiz3 + HPSquiz4 + HPSquiz5 + HPSquiz6 + HPSquiz7 + HPSquiz8 + HPSquiz9 + HPSquiz10;

    // Update HPS quiz total input field
    document.getElementsByName('HPSquiztotal')[0].value = HPSquizTotal.toFixed(2);

    // Default HPSquizweighted is 15%
    const HPSquizWeighted = 15;

    // Loop through each student to calculate and update quiz weighted score
    for (let i = 1; i <= numRows; i++) {
        // Retrieve values for each student
        const totalQuizDuringMidterm = parseFloat(document.getElementsByName(`total_quiz_duringmidterm${i}`)[0].value) || 0;
        const quiz1 = parseFloat(document.getElementsByName(`quiz_1_${i}`)[0].value) || 0;
        const quiz2 = parseFloat(document.getElementsByName(`quiz_2_${i}`)[0].value) || 0;
        const quiz3 = parseFloat(document.getElementsByName(`quiz_3_${i}`)[0].value) || 0;
        const quiz4 = parseFloat(document.getElementsByName(`quiz_4_${i}`)[0].value) || 0;
        const quiz5 = parseFloat(document.getElementsByName(`quiz_5_${i}`)[0].value) || 0;
        const quiz6 = parseFloat(document.getElementsByName(`quiz_6_${i}`)[0].value) || 0;
        const quiz7 = parseFloat(document.getElementsByName(`quiz_7_${i}`)[0].value) || 0;
        const quiz8 = parseFloat(document.getElementsByName(`quiz_8_${i}`)[0].value) || 0;
        const quiz9 = parseFloat(document.getElementsByName(`quiz_9_${i}`)[0].value) || 0;
        const quiz10 = parseFloat(document.getElementsByName(`quiz_10_${i}`)[0].value) || 0;

        // Calculate total quiz score for each student
        let quizTotal = totalQuizDuringMidterm + quiz1 + quiz2 + quiz3 + quiz4 + quiz5 + quiz6 + quiz7 + quiz8 + quiz9 + quiz10;

        // Cap the quiz total to the HPS quiz total
        quizTotal = Math.min(quizTotal, HPSquizTotal);

        // Update total quiz input field for each student
        document.getElementsByName(`quiz_total_${i}`)[0].value = quizTotal.toFixed(2);

        // Calculate and update quiz weighted score for each student
        const quizWeighted = (HPSquizTotal !== 0) ? (quizTotal / HPSquizTotal) * HPSquizWeighted : 0;

        // Update quiz weighted input field for each student
        document.getElementsByName(`quiz_weighted_${i}`)[0].value = quizWeighted.toFixed(2);
    }
}


    </script>
    <input type="submit" value="Submit" name="submit" class="custom-submit">
</form>


<script>
    // Function to generate rows for Grade Quiz
    function generateQuizRows() {
        let numRows = document.getElementById('numRowsQuiz').value;
        let rows = '';
        for (let i = 1; i <= numRows; i++) {
            rows += `
                <tr>
                    <td style="text-align: left; width: 1%">${i}</td>
                    <td style="text-align: left; width: 9%"><input type="text" name="quiz_student_name_${i}" placeholder="Student Name" required></td>
                    <td style="text-align: left; width: 9.4%"><input type="number" name="quiz_student_number_${i}" min="0" placeholder="Student Number" required style="width: 95%;" ></td>
                    <td style="text-align: left; width: 5%"><input type="number" name="total_quiz_duringmidterm${i}" min="0" value="0"  placeholder="" style="width: 90%;" onchange="calculateWeightedQuizzes()"></td>
                    <td style="text-align: left; width: 5%"><input type="number" name="quiz_1_${i}" value="0" min="0" placeholder="" style="width: 90%;" onchange="calculateWeightedQuizzes()"></td>
                    <td style="text-align: left; width: 5%"><input type="number" name="quiz_2_${i}" value="0" min="0" placeholder="" style="width: 90%;" onchange="calculateWeightedQuizzes()"></td>
                    <td style="text-align: left; width: 5%"><input type="number" name="quiz_3_${i}" value="0" min="0" placeholder="" style="width: 90%;" onchange="calculateWeightedQuizzes()"></td>
                    <td style="text-align: left; width: 5%"><input type="number" name="quiz_4_${i}" value="0" min="0" placeholder="" style="width: 90%;" onchange="calculateWeightedQuizzes()"></td>
                    <td style="text-align: left; width: 5%"><input type="number" name="quiz_5_${i}" value="0" min="0" placeholder="" style="width: 90%;" onchange="calculateWeightedQuizzes()"></td>
                    <td style="text-align: left; width: 5%"><input type="number" name="quiz_6_${i}" value="0" min="0" placeholder="" style="width: 90%;" onchange="calculateWeightedQuizzes()"></td>
                    <td style="text-align: left; width: 5%"><input type="number" name="quiz_7_${i}" value="0" min="0" placeholder="" style="width: 90%;"onchange="calculateWeightedQuizzes()"></td>
                    <td style="text-align: left; width: 5%"><input type="number" name="quiz_8_${i}" value="0" min="0" placeholder="" style="width: 90%;" onchange="calculateWeightedQuizzes()"></td>
                    <td style="text-align: left; width: 5%"><input type="number" name="quiz_9_${i}" value="0" min="0" placeholder="" style="width: 90%;" onchange="calculateWeightedQuizzes()"></td>
                    <td style="text-align: left; width: 5%"><input type="number" name="quiz_10_${i}" value="0" min="0" placeholder="" style="width: 90%;" onchange="calculateWeightedQuizzes()"></td>
                    <td style="text-align: left; width: 5%"><input type="number" name="quiz_total_${i}" value="0" min="0" placeholder="" style="width: 90%;" onchange="calculateWeightedQuizzes()" readonly></td>
                    <td style="text-align: left; width: 5%"><input type="number" name="quiz_weighted_${i}" value="0.00" min="0" placeholder="" style="width: 90%;"readonly></td>
                    <td style="text-align: left; width: 27.5%" class="hidden">
                    <input type="text" name="section" placeholder="Section" value="<?php echo htmlspecialchars(isset($_GET['section']) ? $_GET['section'] : ''); ?>" readonly required>
                    </td>
                    <td style="text-align: left; width: 27.5%" class="hidden">
                    <input type="text" name="subject" placeholder="Subject" value="<?php echo htmlspecialchars(isset($_GET['subject']) ? $_GET['subject'] : ''); ?>" readonly required>
                    </td>

                    <!-- Add input fields for Grade Quiz -->
                    <!-- For example: Inputs for contents 1-10, total, weighted -->
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


<!-- Grade Output/Portfolio Form -->
<form id="gradeOutputPortfolio" method="post" action="process_grades.php" style="display: none;" class="hidden">
    <div style="margin: 0; padding: 0; display: flex; justify-content: flex-start;">
        <div style="width: 100%;">
            <label for="numRowsOutput">Number of Students:</label>
            <input type="number" id="numRowsOutput" min="1" oninput="validity.valid||(value='');" max="100" value="30">
            <button onclick="generateOutputRows()">Generate</button>
            <button onclick="addOutputRow()">+ Row</button>
            <button onclick="removeOutputRow()">- Row</button>
            <table style="font-size: 22px; width: 75.6%; margin-left: 24.4%; margin-right: auto; border-collapse: collapse;">
                <tr>
                    <td style="text-align: center; background-color: green; color: white;" colspan="50">Performance After Midterm</td>
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
                    <th style="text-align: center;">Total Output/Portfolio during Midterm</th>
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
                            <input type="number" name="HPSoutput_duringmidterm" value="0" min="0" style="width: 90%;" onchange="calculateSumsAndWeighted()">
                        </th>
                        <th style="text-align: center;">
                            <input type="number" name="HPSoutput1" value="0" min="0" style="width: 90%;" onchange="calculateSumsAndWeighted()">
                        </th>
                        <th style="text-align: center;">
                            <input type="number" name="HPSoutput2" value="0" min="0" style="width: 90%;" onchange="calculateSumsAndWeighted()">
                        </th>
                        <th style="text-align: center;">
                            <input type="number" name="HPSoutput3" value="0" min="0" style="width: 90%;" onchange="calculateSumsAndWeighted()">
                        </th>
                        <th style="text-align: center;">
                            <input type="number" name="HPSoutput4" value="0" min="0" style="width: 90%;" onchange="calculateSumsAndWeighted()">
                        </th>
                        <th style="text-align: center;">
                            <input type="number" name="HPSoutput5" value="0" min="0" style="width: 90%;" onchange="calculateSumsAndWeighted()">
                        </th>
                        <th style="text-align: center;">
                            <input type="number" name="HPSoutput6" value="0" min="0" style="width: 90%;" onchange="calculateSumsAndWeighted()">
                        </th>
                        <th style="text-align: center;">
                            <input type="number" name="HPSoutput7" value="0" min="0" style="width: 90%;" onchange="calculateSumsAndWeighted()">
                        </th>
                        <th style="text-align: center;">
                            <input type="number" name="HPSoutput8" value="0" min="0" style="width: 90%;" onchange="calculateSumsAndWeighted()">
                        </th>
                        <th style="text-align: center;">
                            <input type="number" name="HPSoutput9" value="0" min="0" style="width: 90%;" onchange="calculateSumsAndWeighted()">
                        </th>
                        <th style="text-align: center;">
                            <input type="number" name="HPSoutput10" value="0" min="0" style="width: 90%;" onchange="calculateSumsAndWeighted()">
                        </th>
                        <th style="text-align: center;">
                            <input type="number" name="HPSoutputtotal" value="0" min="0" style="width: 90%;" readonly onchange="calculateSumsAndWeighted()">
                        </th>
                        <th style="text-align: center;">
                            <input type="number" name="HPSoutputweighted" value="25" min="0" style="width: 80%;" readonly onchange="calculateSumsAndWeighted()">%
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
    // Function to generate rows for Grade Output/Portfolio
    function generateOutputRows() {
        let numRows = document.getElementById('numRowsOutput').value;
        let rows = '';
        for (let i = 1; i <= numRows; i++) {
            rows += `
                <tr>
                    <td style="text-align: left; width: 1%">${i}</td>
                    <td style="text-align: left; width: 9%"><input type="text" name="output_student_name_${i}" placeholder="Student Name" required> </td>
                    <td style="text-align: left; width: 9.4%"><input type="number" name="output_student_number_${i}" min="0" placeholder="Student Number" required style="width: 95%;" ></td>
                    <td style="text-align: left; width: 5%"><input type="number" name="total_output_duringmidterm${i}" min="0" value="0"  placeholder="" style="width: 90%;" onchange="calculateSumsAndWeighted()"></td>
                    <td style="text-align: left; width: 5%"><input type="number" name="output_1_${i}" min="0" value="0" placeholder="" style="width: 90%;" onchange="calculateSumsAndWeighted()"></td>
                    <td style="text-align: left; width: 5%"><input type="number" name="output_2_${i}" min="0" value="0" placeholder="" style="width: 90%;" onchange="calculateSumsAndWeighted()"></td>
                    <td style="text-align: left; width: 5%"><input type="number" name="output_3_${i}" min="0" value="0" placeholder="" style="width: 90%;" onchange="calculateSumsAndWeighted()"></td>
                    <td style="text-align: left; width: 5%"><input type="number" name="output_4_${i}" min="0" value="0" placeholder="" style="width: 90%;" onchange="calculateSumsAndWeighted()"></td>
                    <td style="text-align: left; width: 5%"><input type="number" name="output_5_${i}" min="0" value="0" placeholder="" style="width: 90%;" onchange="calculateSumsAndWeighted()"></td>
                    <td style="text-align: left; width: 5%"><input type="number" name="output_6_${i}" min="0" value="0" placeholder="" style="width: 90%;" onchange="calculateSumsAndWeighted()"></td>
                    <td style="text-align: left; width: 5%"><input type="number" name="output_7_${i}" min="0" value="0" placeholder="" style="width: 90%;" onchange="calculateSumsAndWeighted()"></td>
                    <td style="text-align: left; width: 5%"><input type="number" name="output_8_${i}" min="0" value="0" placeholder="" style="width: 90%;" onchange="calculateSumsAndWeighted()"></td>
                    <td style="text-align: left; width: 5%"><input type="number" name="output_9_${i}" min="0" value="0" placeholder="" style="width: 90%;" onchange="calculateSumsAndWeighted()"></td>
                    <td style="text-align: left; width: 5%"><input type="number" name="output_10_${i}" min="0" value="0" placeholder="" style="width: 90%;" onchange="calculateSumsAndWeighted()"></td>
                    <td style="text-align: left; width: 5%"><input type="number" name="output_total_${i}" min="0" value="0" placeholder="" style="width: 90%;" readonly onchange="calculateSumsAndWeighted()"></td>
                    <td style="text-align: left; width: 5%"><input type="number" name="output_weighted_${i}" min="0"  value="0" placeholder="" style="width: 90%;"readonly onchange="calculateSumsAndWeighted()"></td>
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
    <!-- Add this script after your existing script -->
    // Function to calculate sums and weighted values
    function calculateSumsAndWeighted() {
        // Calculate HPSoutputtotal
        let hpsOutputTotal = 0;
        for (let i = 1; i <= 10; i++) {
            hpsOutputTotal += parseInt(document.getElementsByName(`HPSoutput${i}`)[0].value) || 0;
        }
        document.getElementsByName('HPSoutputtotal')[0].value = hpsOutputTotal;

        // Calculate output_total_${i} and output_weighted_${i} for each student
        let numRows = document.getElementById('numRowsOutput').value;
        for (let i = 1; i <= numRows; i++) {
            let outputTotal = 0;
            for (let j = 1; j <= 10; j++) {
                outputTotal += parseInt(document.getElementsByName(`output_${j}_${i}`)[0].value) || 0;
            }

            // Ensure output_total_${i} does not exceed hpsOutputTotal
            outputTotal = Math.min(outputTotal, hpsOutputTotal);

            document.getElementsByName(`output_total_${i}`)[0].value = outputTotal;

            // Calculate output_weighted_${i}
            let outputWeighted = (outputTotal / hpsOutputTotal) * parseInt(document.getElementsByName('HPSoutputweighted')[0].value);
            document.getElementsByName(`output_weighted_${i}`)[0].value = outputWeighted.toFixed(2);
        }
    }

    // Add onchange attribute to HPSoutput fields one by one
    document.getElementsByName('HPSoutput_duringmidterm')[0].setAttribute('onchange', 'calculateSumsAndWeighted()');
    for (let i = 1; i <= 10; i++) {
        document.getElementsByName(`HPSoutput${i}`)[0].setAttribute('onchange', 'calculateSumsAndWeighted()');
    }

    // Add onchange attribute to output fields one by one
    let numRows = document.getElementById('numRowsOutput').value;
    for (let i = 1; i <= numRows; i++) {
        for (let j = 1; j <= 10; j++) {
            document.getElementsByName(`output_${j}_${i}`)[0].setAttribute('onchange', 'calculateSumsAndWeighted()');
        }
    }

    // Add onchange attribute to HPSoutputweighted field
    document.getElementsByName('HPSoutputweighted')[0].setAttribute('onchange', 'calculateSumsAndWeighted()');


</script>

<!--@@@@@@@@@@@@@@@@@@@@@@@@@@@@GRADE MIDTERM EXAM@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@-->
<form id="gradeMidtermExam" method="post" action="process_grades.php"  style="display: none;" class="hidden" class="hidden">
    <div style="margin: 0; padding: 0; display: flex; justify-content: flex-start;">
        <div style="width: 100%;">
            <label for="numRowsMID">Number of Students:</label>
            <input type="number" id="numRowsMID" min="1" oninput="validity.valid||(value='');" max="100" value="30">
            <button onclick="generateMIDRows()">Generate</button>
            <button onclick="addMIDRow()">+ Row</button>
            <button onclick="removeMIDRow()">- Row</button>
            <table style="font-size: 22px; width: 75.6%; margin-left: 24.4%; margin-right: auto; border-collapse: collapse;">
                <tr>
                    <td style="text-align: center; background-color: green; color: white;" colspan="50">Performance After Midterm</td>
                </tr>
                <tr>
                    <th style="text-align: center; background-color: green; color: white;width: 50%">FINAL EXAM</th>
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
                            <input type="number" name="HPS_examscore" value="0" min="0" style="width: 20%;" onchange="calculateWeightedScoresEXAM()">
                        </th>
                        <th style="text-align: center;">
                            <input type="number" name="HPS_examweighted" value="20" min="0" style="width: 20%;" readonly onchange="calculateWeightedScoresEXAM()">%
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
                    <td style="text-align: left; width: 9.3%"><input type="text" name="mid_student_name_${i}" placeholder="Student Name" required></td>
                    <td style="text-align: left; width: 7.4%"><input type="number" name="mid_student_number_${i}" min="0" placeholder="Student Number" required style="width: 95%;"></td>
                    <td style="text-align: center; width: 27.5%"><input type="number" name="final_total_${i}" value="0"  min="0" placeholder="" style="width: 20%;" onchange="calculateWeightedScoresEXAM()"></td>
                    <td style="text-align: center; width: 27.5%"><input type="number" name="final_weighted_${i}" value="0.00" min="0" placeholder="" style="width: 20%; "readonly onchange="calculateWeightedScoresEXAM()"></td>
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
    function calculateWeightedScoresEXAM() {
    let numRows = document.getElementById('numRowsMID').value;

    for (let i = 1; i <= numRows; i++) {
        let finalTotalInput = document.getElementsByName(`final_total_${i}`)[0];
        let examScore = parseFloat(document.getElementsByName('HPS_examscore')[0].value);
        let examWeighted = parseFloat(document.getElementsByName('HPS_examweighted')[0].value);

        let finalTotal = parseFloat(finalTotalInput.value);

        // Ensure that finalTotal, examScore, and examWeighted are not NaN
        if (!isNaN(finalTotal) && !isNaN(examScore) && !isNaN(examWeighted)) {
            // Limit finalTotal to not exceed examScore
            finalTotal = Math.min(finalTotal, examScore);

            let finalWeighted = (finalTotal / examScore) * examWeighted;
            finalTotalInput.value = finalTotal.toFixed(2);
            document.getElementsByName(`final_weighted_${i}`)[0].value = finalWeighted.toFixed(2);
        }
    }
}
function calculateWeightedScoresEXAM() {
    let numRows = document.getElementById('numRowsMID').value;

    for (let i = 1; i <= numRows; i++) {
        let finalTotalInput = document.getElementsByName(`final_total_${i}`)[0];
        let examScore = parseFloat(document.getElementsByName('HPS_examscore')[0].value);
        let examWeighted = parseFloat(document.getElementsByName('HPS_examweighted')[0].value);

        let finalTotal = parseFloat(finalTotalInput.value);

        // Ensure that finalTotal, examScore, and examWeighted are not NaN
        if (!isNaN(finalTotal) && !isNaN(examScore) && !isNaN(examWeighted)) {
            // Limit finalTotal to not exceed examScore
            finalTotal = Math.min(finalTotal, examScore);
            finalTotal = Math.floor(finalTotal); // Use Math.round if you want to round to the nearest integer

            let finalWeighted = (finalTotal / examScore) * examWeighted;
            finalTotalInput.value = finalTotal.toFixed(0); // Set toFixed(0) to remove decimal places
            document.getElementsByName(`final_weighted_${i}`)[0].value = finalWeighted.toFixed(2);
        }
    }
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
</script>


</div>



</body>
</html>