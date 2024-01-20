<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'config.php';
session_start();
$user_id_session = $_SESSION['user_id'] ?? null;
// Retrieve the username parameter from the URL
$username = $_GET['username'] ?? '';
$select_user_by_id = mysqli_query($conn, "SELECT * FROM `user_form` WHERE id = '$user_id_session'");
$user_data_by_id = mysqli_fetch_assoc($select_user_by_id);
$user_id = $_SESSION['user_id'];


// Retrieve the username parameter from the URL
$username = $_GET['username'] ?? '';

// Fetch user information based on the username
$select_user = mysqli_query($conn, "SELECT * FROM `user_form` WHERE `name` = '$username'");
$user_data = mysqli_fetch_assoc($select_user);
$user_id = $_SESSION['user_id'];

if(isset($_POST['update_profile'])){

   $update_name = mysqli_real_escape_string($conn, $_POST['update_name']);
   $update_email = mysqli_real_escape_string($conn, $_POST['update_email']);

   mysqli_query($conn, "UPDATE `user_form` SET name = '$update_name', email = '$update_email' WHERE id = '$user_id'") or die('query failed');

   $old_pass = $_POST['old_pass'];
   $update_pass = mysqli_real_escape_string($conn, md5($_POST['update_pass']));
   $new_pass = mysqli_real_escape_string($conn, md5($_POST['new_pass']));
   $confirm_pass = mysqli_real_escape_string($conn, md5($_POST['confirm_pass']));

   if(!empty($update_pass) || !empty($new_pass) || !empty($confirm_pass)){
      if($update_pass != $old_pass){
         $message[] = 'old password not matched!';
      }elseif($new_pass != $confirm_pass){
         $message[] = 'confirm password not matched!';
      }else{
         mysqli_query($conn, "UPDATE `user_form` SET password = '$confirm_pass' WHERE id = '$user_id'") or die('query failed');
         $message[] = 'password updated successfully!';
      }
   }

   $update_image = $_FILES['update_image']['name'];
   $update_image_size = $_FILES['update_image']['size'];
   $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
   $update_image_folder = 'uploaded_img/'.$update_image;

   if(!empty($update_image)){
      if($update_image_size > 2000000){
         $message[] = 'image is too large';
      }else{
         $image_update_query = mysqli_query($conn, "UPDATE `user_form` SET image = '$update_image' WHERE id = '$user_id'") or die('query failed');
         if($image_update_query){
            move_uploaded_file($update_image_tmp_name, $update_image_folder);
         }
         $message[] = 'image updated succssfully!';
      }
   }

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>update profile</title>
   <link rel="stylesheet" href="styles.css">
   <!-- custom css file link  -->
   <style>



        .update-profile {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            max-width: 700px;
            width: 100%;
            margin-top: 100px;
            margin-left: 500px;
        }

        .update-profile img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            margin-bottom: 20px;
        }

        .box {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        .flex {
            display: flex;
            justify-content: space-between;
        }

        .btn {
            width: calc(100% - 20px);
            background-color: #026c3b;
            color: #fff;
            border: none;
            padding: 10px;
            cursor: pointer;
            border-radius: 5px;
            font-size: 18px;
            transition: background-color 0.3s;
            margin-top: 15px;
            
        }

        .btn:hover {
            background-color: #FF7D00;
        }

        .delete-btn {
            color: #FF3333;
            text-decoration: none;
            margin-top: 20px;
            display: inline-block;
            transition: color 0.3s;

        }

        .delete-btn:hover {
            text-decoration: underline;
            color: #CC0000;
        }
  
              /* Content text styles */
        .content-text {
                color: #fff;
                text-align: center;
                flex-grow: 1; /* Allow the text to take up the remaining space */
}

.teacher-card {
    background-color: #fff;
    border: 1px solid #e0e0e0;
    border-radius: 8px;
    padding: 20px;
    margin-bottom: 20px;
    transition: transform 0.3s, box-shadow 0.3s;
    margin-left:100px ;
}

.teacher-card:hover {
    transform: scale(1.02);
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}

.teacher-card h4 {
    color: #333;
    margin-bottom: 10px;
}

.teacher-card p.section {
    color: #666;
    margin: 5px 0;
}

.teacher-card a.btn {
    display: inline-block;
    padding: 8px 16px;
    background-color: #026c3b;
    color: #fff;
    text-decoration: none;
    border-radius: 4px;
    transition: background-color 0.3s;
}
    </style>

</head>
<body>
    <div class="content">
        <div class="logo"> 
           <img src="logo.png" width="296" height="64" alt="Logo">        
        </div>

    </div>
   
<div class="update-profile">
   <div class="teacher-card">

   <?php
      $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE id = '$user_id'") or die('query failed');
      if(mysqli_num_rows($select) > 0){
         $fetch = mysqli_fetch_assoc($select);
      }
   ?>

   <form action="" method="post" enctype="multipart/form-data">
      <?php
         if($fetch['image'] == ''){
            echo '<img src="images/default-avatar.png">';
         }else{
            echo '<img src="uploaded_img/'.$fetch['image'].'">';
         }
         if(isset($message)){
            foreach($message as $message){
               echo '<div class="message">'.$message.'</div>';
            }
         }
      ?>
      <div class="flex">
         <div class="inputBox">
            <span>Username :</span>
            <input type="text" name="update_name" value="<?php echo $fetch['name']; ?>" class="box">
            <span>Your email :</span>
            <input type="email" name="update_email" value="<?php echo $fetch['email']; ?>" class="box">
            <span>Update your pic :</span>
            <input type="file" name="update_image" accept="image/jpg, image/jpeg, image/png" class="box">
         </div>
         <div class="inputBox">
            <input type="hidden" name="old_pass" value="<?php echo $fetch['password']; ?>">
            <span>Old password :</span>
            <input type="password" name="update_pass" placeholder="enter previous password" class="box">
            <span>New password :</span>
            <input type="password" name="new_pass" placeholder="enter new password" class="box">
            <span>Confirm password :</span>
            <input type="password" name="confirm_pass" placeholder="confirm new password" class="box">
         </div>
      </div>
      <input type="submit" value="Update profile" name="update_profile" class="btn">
      <a href="home.php" class="delete-btn">Go back</a>
   </form>
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
        <a href="message_admin.php?username=<?= urlencode($user_data_by_id['name']) ?>">
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


