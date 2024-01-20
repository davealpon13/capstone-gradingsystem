<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher | Message Admin</title>
        <link rel="stylesheet" href="styles.css">
    <style>

       body 




        .container {
            background-color: #fff;
            border-radius: 10px;    
            margin-left: 300px  ;
            max-width: 1000px;
            width: 50%;
            margin-top: 30px;
        }

.profile {
    display: flex;
    flex-direction: column;
    margin-left: 250px;
    margin-top: 100px;
    padding: 20px;
    background-color: #f4f4f4;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}


.profile p {
    margin: 10px 0;
}

.profile a.btn {
    display: block;
    margin: 10px auto;
    margin-left: 5px;
}

        .btn {
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 16px;
            text-decoration: none;
            margin-top: 20px;
            cursor: pointer;
            transition: background-color 0.3s;
            width: 45%;
            display: inline-block;
            margin-bottom: 10px;
            width: 35%;
        }

        .btn-primary {
            background-color:  #026c3b;
            color: white;
        }

        .btn-secondary {
            background-color:  #026c3b;
            color: #fff;
        }

        .btn-primary:hover {
            background-color: #2980b9;
        }

        .btn-secondary:hover {
            background-color: #2980b9;
        }

        label {
            display: block;
            margin-bottom: 5px;
            text-align: left;
        }

        textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        input[type="submit"] {
            background-color:  #026c3b;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #2980b9;
        }

        p.success {
            color: #4CAF50;
            margin-top: 10px;
        }

h3 {
    display: block;
    font-size: 1.17em;
    margin-block-start: 1em;
    margin-block-end: 1em;
    margin-inline-start: 0px;
    margin-inline-end: 0px;
    font-weight: bold;
    margin-top: 0px;
}
.card {
    background-color: #fff;
    border: 4px solid #e0e0e0;
    border-radius: 10px;
    padding: 100px;
    margin-bottom: 20px;
    transition: transform 0.3s, box-shadow 0.3s;
    margin-left:100px ;
    margin-top: 100px;
    opacity: 0.9;
    box-shadow: 0 50px 25px rgba(0, 0, 0, 0.5);
}

.card:hover {
    transform: scale(1.02);
    box-shadow: 0 50px 25px rgba(0, 0, 0, 0.6);
}
textarea {
    width: 100%;
    padding: 8px;
    margin-bottom: 10px;
    border-radius: 5px;
    border: 1px solid #000;
}

.card h4 {
    color: #333;
    margin-bottom: 10px;
}

.card p.section {
    color: #666;
    margin: 5px 0;
}

.card a.btn {
    display: inline-block;
    padding: 8px 16px;
    background-color: #026c3b;
    color: #fff;
    text-decoration: none;
    border-radius: 4px;
    transition: background-color 0.3s;
    width: 25%;
}

.card a.btn:hover {
    background-color: #2980b9;
}

              
              /* Content text styles */
        .content-text {
                color: #fff;
                text-align: center;
                flex-grow: 1; /* Allow the text to take up the remaining space */
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
                        <div class="card">
        <?php
        // Establish a connection to your database (replace with your actual database details)
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "osrs_db";

        // Create connection
        $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // Check connection
        if (!$pdo) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Retrieve the username from the URL parameter
        $username = $_GET['username'] ?? '';

        // Output the username in an h3 tag
        ?>
        <h3><?= htmlspecialchars($username) ?></h3>

        <!-- Message Input Form -->
        <form action="" method="POST">
            <label for="message">Enter Your Message:</label><br>
            <textarea id="message" name="message" rows="4" cols="50" required></textarea><br><br>
            <input type="hidden" name="teacher_name" value="<?= htmlspecialchars($username) ?>">
            <br>
            <br><br><br>
            <button type="submit"  class="btn btn-secondary" name="submit"onclick="sendMessage()" value="Send Message">Send Message
            </button>
               <a href="teacher_message.php?username=<?= urlencode($username) ?>" text-align: center; class="btn btn-secondary">My Messages</a>
        <a href="admin_messages.php?username=<?= urlencode($username) ?>" class="btn btn-secondary">See Admin Messages</a>
        </form>
    </div>
<div class="successfull">
        <?php
        // Check if the form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
            // Retrieve message and teacher_name from the form submission
            $message = $_POST['message'] ?? '';
            $teacher_name = $_POST['teacher_name'] ?? '';

            // Insert message into the database
            $query = "INSERT INTO teacher_admin (teacher_name, message_text) VALUES (?, ?)";
            $stmt = $pdo->prepare($query);
            $stmt->execute([$teacher_name, $message]);

            echo "<p>Message sent successfully!</p>";
        }
        ?>
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
<!-- Logout Section -->
<div class="logout-section">
            

            <div class="menu-item">
            <a href="home.php?logout=<?= $user_id ?>" >
        <img class="icon" src="logout.png" alt="Message Icon" width="10" height="10" style="vertical-align: middle;"><span id="messageText">Logout</span>
    </a>
</div>
</div>
<script>
    function sendMessage() {
            var form = document.getElementById('messageForm');
            var formData = new FormData(form);

            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'your_php_script.php', true);

            // Set up the onload function to handle the server response
            xhr.onload = function () {
                if (xhr.status >= 200 && xhr.status < 300) {
                    // If the request was successful, update the result div with the server's response
                    document.getElementById('result').innerHTML = '<p style="color: green;">Message sent successfully!</p>';
                } else {
                    // If the request was not successful, display an error message
                    document.getElementById('result').innerHTML = '<p style="color: red;">Error sending message.</p>';
                }
            };

            // Send the form data to the server
            xhr.send(formData);
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
