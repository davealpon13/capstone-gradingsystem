<?php
include 'config.php';
session_start();
$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
};

if(isset($_GET['logout'])){
   unset($user_id);
   session_destroy();
   header('location:login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Home - BSIT4D</title>

    <!-- Custom CSS File Link -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #343a40;
            display: flex;
            flex-direction: row;
            margin: 0;
        }

        .sidebar {
            width: 200px;
            height: 100vh;
            background-color: #2c3e50;
            padding-top: 20px;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
        }

        .sidebar ul li {
            margin-bottom: 10px;
        }

        .sidebar ul li a {
            color: #ecf0f1;
            text-decoration: none;
            font-size: 18px;
            padding: 10px;
            display: block;
            transition: background-color 0.3s;
        }

        .sidebar ul li a:hover {
            background-color: #1abc9c;
        }

        .container {
            text-align: center;
            margin-left: 200px;
            padding: 20px;
        }

        .profile {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 300px;
            margin: 0 auto;
        }

        .profile img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            margin-bottom: 20px;
        }

        .btn {
            background-color: #4caf50;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
            font-size: 16px;
            text-decoration: none;
            margin-right: 10px;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #45a049;
        }

        .delete-btn {
            color: #ff3333;
            text-decoration: none;
            transition: color 0.3s;
        }

        .delete-btn:hover {
            color: #cc0000;
        }

        p {
            margin-top: 20px;
        }

        p a {
            color: #4caf50;
            text-decoration: none;
        }

        p a:hover {
            text-decoration: underline;
        }
    </style>
    
</head>
<body>

   <div class="sidebar">
      <ul>
         <li><a href="#">Profile</a></li>
         <li><a href="\capstone\osrs\login system with avatar\BSIT4D.php">BSIT4D</a></li>
         <li><a href="">BSIT4C</a></li>
         <li><a href="">BSIT4B</a></li>
         <li><a href="">BSIT4A</a></li>
      </ul>
   </div>

   <div class="container">
      <div class="profile">
         <?php
            $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE id = '$user_id'") or die('query failed');
            if(mysqli_num_rows($select) > 0){
               $fetch = mysqli_fetch_assoc($select);
            }
            if($fetch['image'] == ''){
               echo '<img src="images/default-avatar.png">';
            } else {
               echo '<img src="uploaded_img/'.$fetch['image'].'">';
            }
         ?>
         <h3><?php echo $fetch['name']; ?></h3>
         <a href="update_profile.php" class="btn">Update Profile</a>
         <a href="home.php?logout=<?php echo $user_id; ?>" class="delete-btn">Logout</a>
         <p>New <a href="login.php">Login</a> or <a href="register.php">Register</a></p>
      </div>
   </div>

</body>
</html>
