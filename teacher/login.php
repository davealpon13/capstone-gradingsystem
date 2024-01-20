<?php
include 'config.php';
session_start();
$message = [];

if(isset($_POST['submit'])){
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));

   $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select) > 0){
       $row = mysqli_fetch_assoc($select);
       
       if($row['archived'] == 1) {
           $message[] = 'Your account is archived. Please contact support for assistance.';
       } else {
           $_SESSION['user_id'] = $row['id'];
           header('location:home.php');
           exit();
       }
   }else{
       $message[] = 'Incorrect email or password!';
   }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Teacher Login</title>

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
      width: 300px;
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

   .message {
      color: red;
      margin-bottom: 10px;
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
      background-color: #026c3b;
      color: #fff;
      padding: 10px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
   }
   .btn:hover {
   background-color: #2980b9; /* Darker shade of orange for hover effect */
}

   a {
      text-decoration: none;
      color: #026c3b;
   }
     
   </style>
</head>
<body>
   <div class="form-container">
      <form action="" method="post" enctype="multipart/form-data">
         <h3>Teacher's Login</h3>
         <?php
         if(isset($message)){
            foreach($message as $msg){
               echo '<div class="message">'.$msg.'</div>';
            }
         }
         ?>
         <input type="email" name="email" placeholder="Enter email" class="box" required>
         <input type="password" name="password" placeholder="Enter password" class="box" required>
         <input type="submit" name="submit" value="Login" class="btn">
         <p>Don't have an account? <a href="register.php">Register here</a></p>
      </form>
    

   </div>
</body>
</html>
