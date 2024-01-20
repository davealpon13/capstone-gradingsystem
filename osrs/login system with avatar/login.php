<?php

include 'config.php';
session_start();

if(isset($_POST['submit'])){

   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));

   $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select) > 0){
      $row = mysqli_fetch_assoc($select);
      $_SESSION['user_id'] = $row['id'];
      header('location:home.php');
   }else{
      $message[] = 'incorrect email or password!';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">


   <title>login</title>

   <!-- custom css file link  -->
   <style>
   body {
    font-family: Arial, sans-serif;
    background-color:  #343a40;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
}

.form-container {
    background-color: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
    text-align: center;
}

h3 {
    margin-bottom: 20px;
    color: #333;
}

.box {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
}

.btn {
    width: 100%;
    background-color: #4caf50;
    color: #fff;
    border: none;
    padding: 10px;
    cursor: pointer;
    border-radius: 5px;
    font-size: 18px;
    transition: background-color 0.3s;
}

.btn:hover {
    background-color: #45a049;
}

.message {
    color: #f00;
    margin-bottom: 15px;
}

a {
    text-decoration: none;
    color: #4caf50;
}

a:hover {
    text-decoration: underline;
}
</style>

</head>
<body>
   
<div class="form-container">

   <form action="" method="post" enctype="multipart/form-data">
      <h3>Teacher login now</h3>
      <?php
      if(isset($message)){
         foreach($message as $message){
            echo '<div class="message">'.$message.'</div>';
         }
      }
      ?>
      <input type="email" name="email" placeholder="enter email" class="box" required>
      <input type="password" name="password" placeholder="enter password" class="box" required>
      <input type="submit" name="submit" value="login now" class="btn">
      <p>don't have an account? <a href="register.php">regiser now</a></p>
      <a href="\capstone\osrs\login.php">Back</a>
   </form>

</div>

</body>
</html>