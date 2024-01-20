<!DOCTYPE html>
<html lang="en">
<head>
<title>Student Login</title>
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
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 400px;
            width: 100%;
        }

        h2 {
            margin-bottom: 20px;
            color: #333;
        }

        input[type="text"],
        input[type="password"],
        input[type="submit"] {
            width: calc(100% - 22px);
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #FF9400;
            color: #fff;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #FF7D00;
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
      <div class="student-section">
         <h2>Student Grades</h2>
         <form action="student_verification.php" method="post">
            <h3>Enter Student Code</h3>
            <input type="text" name="student_code" placeholder="Enter student code" required><br><br>
        
            <h3>Enter Password</h3>
                <input type="password" name="password" id="password" placeholder="Enter password" required><br><br>
                <button type="button" id="showPassword" onclick="togglePassword()">Show Password</button><br><br>
        
            <input type="submit" name="view_grades" value="View Grades">
         </form>
      </div>
   </div>
   <script>
    function togglePassword() {
        var passwordField = document.getElementById("password");
        var showPasswordButton = document.getElementById("showPassword");

        if (passwordField.type === "password") {
            passwordField.type = "text";
            showPasswordButton.textContent = "Hide Password";
        } else {
            passwordField.type = "password";
            showPasswordButton.textContent = "Show Password";
        }
    }
</script>
</body>
</html>
