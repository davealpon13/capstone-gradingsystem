<?php
include 'config.php';
session_start();
$user_id = $_SESSION['user_id'] ?? null;

if(!$user_id) {
    header('location:login.php');
    exit();
}

if(isset($_GET['logout'])) {
    session_destroy();
    header('location:login.php');
    exit();
}

$select_user = mysqli_query($conn, "SELECT * FROM `user_form` WHERE id = '$user_id'");
$user_data = mysqli_fetch_assoc($select_user);
$select_teacher = mysqli_query($conn, "SELECT * FROM `teacher` WHERE `name` = '{$user_data['name']}'");
$teacher_data = [];

while ($row = mysqli_fetch_assoc($select_teacher)) {
    $teacher_data[] = $row;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher | Profile</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>


<div class="content">
        <div class="logo"> 
           <img src="logo.png" width="296" height="64" alt="Logo">        
        </div>

    </div>
    <div class="container">
    <!-- Profile Section -->
    <div class="profile">
        <h3><?= $user_data['name'] ?></h3>
    </div>

    

    <!-- Teacher Card Section -->
    <div class="teacher-container">
        <?php foreach ($teacher_data as $teacher) : ?>
            <?php if ($teacher['archived'] == 0) : ?>
                <div class="teacher-card">
                    <!-- Display only if the teacher's record is not archived -->
                    <div class="subject-container">
                        <ul><strong>Subject:</strong> <?= $teacher['subject'] ?></ul>
                        <ul><strong>Section:</strong> <?= $teacher['section'] ?></ul>
                        <a href="process_section.php?section=<?= $teacher['section'] ?>&subject=<?= $teacher['subject'] ?>" class="btn btn-primary"><?= $teacher['section'] ?></a>
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
</div>


<br>
<br>
<br>
<br>
<br>
<br>
        
        </div>
    </div>


        
        </div>

     <div class="sidebar">

     <button class="sidebar-button" onclick="toggleSidebar()">

     
    <img src="menu.svg" alt="Description of the image" width="50px" height="50px">
</button>        
<div class="menu-item">
<a href="home.php">
        <img class="icon" src="home.png" alt="Message Icon" width="10" height="10" style="vertical-align: middle;">
        <span id="messageText">Home</span>
    </a>

<!-- View Messages Section -->
<div class="menu-item">
<a href="view_student_messages.php">
        <img class="icon" src="message.png" alt="Message Icon" width="10" height="10" style="vertical-align: middle;">
        <span id="messageText">View Student Messages</span>
    </a>
</div>
        
        <!-- Message Admin Section -->
        <div class="menu-item">
        <a href="message_admin.php?username=<?= urlencode($user_data['name']) ?>">
        <img class="icon" src="message2.png" alt="Message Icon" width="10" height="10" style="vertical-align: middle;">
        <span id="messageText">Message Admin</span>
    </a>
</div>

        <!-- Update Profile Section -->
        <div class="menu-item">
        <a href="update_profile.php">
        <img class="icon" src="update.png" alt="Message Icon" width="10" height="10" style="vertical-align: middle;"><span id="messageText">Update Profile</span>
    </a>
</div>


                


        <!-- Logout Section -->
        <div class="logout-section">
            

            <div class="menu-item">
            <a href="home.php?logout=<?= $user_id ?>" >
        <img class="icon" src="logout.png" alt="Message Icon" width="10" height="10" style="vertical-align: middle;"><span id="messageText">Logout</span>
    </a>
</div>


            <script>
      function hideTextInitially() {
    var textElements = document.querySelectorAll('.menu-item a span');
    textElements.forEach(function (element) {
        element.style.display = 'none';
    });
}

function toggleSidebar() {
    var sidebar = document.querySelector('.sidebar');
    var content = document.querySelector('.content');

    sidebar.classList.toggle('clicked');
    content.classList.toggle('clicked');

    // Toggle visibility of text in the sidebar only when hovering or clicking
    var textElements = document.querySelectorAll('.menu-item a span');
    textElements.forEach(function (element) {
        if (sidebar.classList.contains('clicked') || sidebar.matches(':hover')) {
            element.style.display = 'initial';
        } else {
            element.style.display = 'none';
        }
    });
}

// Call the function to hide text initially when the page loads
document.addEventListener('DOMContentLoaded', function () {
    hideTextInitially();
});

// Additional event listeners for mouseover to toggle visibility on hover
var sidebar = document.querySelector('.sidebar');
sidebar.addEventListener('mouseover', function () {
    toggleSidebar(); // Show text when hovering
});

sidebar.addEventListener('mouseout', function () {
    toggleSidebar(); // Hide text when not hovering
});



</script>




           
</body>




</html>
