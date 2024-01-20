<?php

include 'config.php';

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
   $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));
   $image = $_FILES['image']['name'];
   $image_size = $_FILES['image']['size'];
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_folder = 'uploaded_img/'.$image;

   $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select) > 0){
      $message[] = 'user already exist'; 
   }else{
      if($pass != $cpass){
         $message[] = 'confirm password not matched!';
      }elseif($image_size > 2000000){
         $message[] = 'image size is too large!';
      }else{
         $insert = mysqli_query($conn, "INSERT INTO `user_form`(name, email, password, image) VALUES('$name', '$email', '$pass', '$image')") or die('query failed');

         if($insert){
            move_uploaded_file($image_tmp_name, $image_folder);
            $message[] = 'registered successfully!';
            header('location:login.php');
         }else{
            $message[] = 'registeration failed!';
         }
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
   <title>Teacher Register</title>

   <!-- custom css file link  -->
   <style>
   body {
      background-image: url(bg.jpg);
      font-family: 'Arial', sans-serif;
      background-size: 100% 100%;
      background-repeat: no-repeat;
      margin: 0;
      padding: 0;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;       
      opacity: 0.9;
   }

   .form-container {
      background-color: #fff;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      padding: 20px;
      border-radius: 20px;
      width: 400px;
      text-align: center;
      position: relative; /* Added relative positioning */
    z-index: 1; 
   }
      .form-container:hover {
      transform: scale(1.05); /* Adjust the scale factor as needed */
      transition: transform 0.3s ease-in-out; /* Adjust the transition duration and timing function as needed */
   }

   h3 {
      color: #333;
   }

   .box {
      width: 100%;
      padding: 10px;
      margin: 10px 0;
      box-sizing: border-box;
      border: 1px solid #ccc;
      border-radius: 4px;
   }

   .btn {
   width: 70%;
   background-color: #026c3b; /* Set button color to #FF9400 */
   color: #fff;
   border: none;
   padding: 10px;
   cursor: pointer;
   border-radius: 5px;
   font-size: 18px;
   transition: background-color 0.3s;
}

.btn:hover {
   background-color: #2980b9; /* Darker shade of orange for hover effect */
}

   .message {
      color: #f00;
      margin-bottom: 15px;
   }

   a {
      text-decoration: none;
      color: #026c3b;
   }

   a:hover {
      text-decoration: underline;
   }
   </style>

</head>
<body>
   
<div class="form-container">

   <form action="" method="post" enctype="multipart/form-data">
      <h3>Register your account</h3>
      <?php
      if(isset($message)){
         foreach($message as $message){
            echo '<div class="message">'.$message.'</div>';
         }
      }
      ?>
      <input type="text" name="name" placeholder="Enter username" class="box" required>
      <input type="email" name="email" placeholder="Enter email" class="box" required>
      <input type="password" name="password" placeholder="Enter password" class="box" required>
      <input type="password" name="cpassword" placeholder="Confirm password" class="box" required>
      <input type="file" name="image" class="box" accept="image/jpg, image/jpeg, image/png">
      <input type="submit" name="submit" value="Register" class="btn">
      <p>Already have an account? <a href="login.php">Login now</a></p>
     
   </form>

</div>

</body>
</html>
