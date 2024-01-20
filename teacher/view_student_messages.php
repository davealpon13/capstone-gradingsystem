<?php
        session_start();
    include 'config.php';

    $user_id = $_SESSION['user_id'] ?? null;

    if (!$user_id) {
        header('location:login.php');
        exit();
    }

    if (isset($_GET['logout'])) {
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
    <link rel="stylesheet" href="styles.css">
    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Teacher | View Messages</title>
        <style>
            .content {
                margin-left:0px;
                padding: -1px;
                background-color: #026c3b;
                display: flex;align-items: center;

                
    }
    .card{
        column-count: 3;
    }
    .profile {
    box-sizing: border-box;
    border: 2px solid #000; /* Add your preferred border color */
    padding: 10px; /* Adjust padding as needed */
    margin-right: 100px;
}

        
                  /* Content text styles */
            .content-text {
                    color: #fff;
                    text-align: center;
                    flex-grow: 1; /* Allow the text to take up the remaining space */
    }

    .profile {
        display: flex;
        flex-direction: column;
        margin-left: 250px;
        margin-top: 40px;
        padding: 20px;
        background-color: #f4f4f4;
        border-radius: 8px;
        box-shadow: 20px 20px 20px rgba(0, 0, 0, 0.8);
    }


    .profile p {
        margin: 10px 0;
    }

    .profile a.btn {
        display: block;
        margin: 10px auto;
        margin-left: 5px;
    }



            .section-btn {
                display: block;
                background-color: #026c3b;
                color: white;
                padding: 5px;
                width: 100px;
                margin-top: 10px;
                text-align: center;
                text-decoration: none;
                border-radius: 5px;
                transition: background-color 0.3s ease;
            }

            .section-btn:hover {
                background-color: #45a4f4;
            }




        </style>
    </head>

    <body>
        <div class="content">
            <div class="logo"> 
               <img src="logo.png" width="296" height="64" alt="Logo">        
            </div>

        </div>



        <div class="container">
            <div class="profile">

                <h1>View Student Message</h1>
                <h3><?= $user_data['name'] ?></h3>

                <?php foreach ($teacher_data as $teacher) : ?>
                    <?php if ($teacher['archived'] == 0) : ?>
                        <div class="card">
                        <p><strong>Subject:</strong> <?= $teacher['subject'] ?></p>
                        <p><strong>Section:</strong> <?= $teacher['section'] ?></p>
                        <a href="#" class="section-btn" onclick="redirectToMessages('<?= urlencode($teacher['name']) ?>', '<?= urlencode($teacher['subject']) ?>', this.innerText)"><?= $teacher['section'] ?></a>

                    </div>

                        <script>
        function redirectToMessages(teacherName, subject, section) {
            // Redirect to the next page with parameters
            window.location.href = 'view_student_subject_messages.php?teacher_name=' + teacherName + '&subject=' + subject + '&section=' + section;
        }
    </script>


                    <?php endif; ?>
                <?php endforeach; ?>
            </div>

            <!-- Other sections/buttons in your HTML -->


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
<!-- Logout Section -->
<div class="logout-section">
            

            <div class="menu-item">
            <a href="home.php?logout=<?= $user_id ?>" >
        <img class="icon" src="logout.png" alt="Message Icon" width="10" height="10" style="vertical-align: middle;"><span id="messageText">Logout</span>
    </a>
</div>
</div>
<script>function toggleSidebar() {
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
});</script>
    </body>

    </html>
