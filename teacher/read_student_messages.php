<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Read Student Messages</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        .messages-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            margin-bottom: 15px;
            border-bottom: 1px solid #ccc;
            padding-bottom: 15px;
        }

        strong {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <h1>Student Messages</h1>

    <div class="messages-container">
        <?php
        // Include your configuration file and start the session if not already started
        include 'config.php';
        session_start();

        // Check if the user is logged in
        $user_id = $_SESSION['user_id'] ?? null;
        if (!$user_id) {
            header('location:login.php');
            exit();
        }

        // Fetch messages for the logged-in user from the database
        $select_messages = mysqli_query($conn, "SELECT * FROM Messages WHERE receiver_id = '$user_id'");
        $messages = [];

        while ($row = mysqli_fetch_assoc($select_messages)) {
            $messages[] = $row;
        }

        // Process reply submission
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Assuming send_reply.php processes the reply form
            // Retrieve reply details from the form
            $receiver_id = $_POST['receiver_id'];
            $original_message = $_POST['original_message'];
            $reply_text = $_POST['reply_text'];

            // Insert the reply into the Messages table
            $insert_reply = "INSERT INTO Messages (sender_id, receiver_id, message_text) 
                             VALUES ('$user_id', '$receiver_id', '$reply_text - Original: $original_message')";

            if (mysqli_query($conn, $insert_reply)) {
                echo "Reply sent successfully!";
            } else {
                echo "Error: " . $insert_reply . "<br>" . mysqli_error($conn);
            }
        }
        ?>

        <?php if (empty($messages)) : ?>
            <p>No messages found.</p>
        <?php else : ?>
            <ul>
                <?php foreach ($messages as $message) : ?>
                    <li>
                        <strong>From:</strong> <?= $message['sender_id'] ?><br>
                        <strong>Message:</strong> <?= $message['message_text'] ?><br>
                        <hr>

                        <!-- Reply form -->
                        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                            <input type="hidden" name="receiver_id" value="<?= $message['sender_id'] ?>">
                            <input type="hidden" name="original_message" value="<?= $message['message_text'] ?>">

                            <label for="reply_text">Reply:</label><br>
                            <textarea name="reply_text" rows="3" cols="40" required></textarea><br>
                            <input type="submit" value="Send Reply">
                        </form>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </div>

    <!-- Other HTML, navigation, or buttons as needed -->

</body>

</html>
