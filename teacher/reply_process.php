<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if message_id, reply_message, teacher_name, and student_code are set in the POST data
    if (isset($_POST['message_id']) && isset($_POST['reply_message']) && isset($_POST['teacher_name']) && isset($_POST['student_code'])) {
        // Sanitize and retrieve the data from the POST request
        $message_id = mysqli_real_escape_string($conn, $_POST['message_id']);
        $reply_message = mysqli_real_escape_string($conn, $_POST['reply_message']);
        $teacher_name = mysqli_real_escape_string($conn, $_POST['teacher_name']);
        $student_code = mysqli_real_escape_string($conn, $_POST['student_code']);

        // Insert the reply into the student_messages table associated with the original message
        $insert_reply_query = mysqli_query($conn, "INSERT INTO student_messages (teacher_name, student_code, message_text) VALUES ('$teacher_name', '$student_code', '$reply_message')");

        if ($insert_reply_query) {
            echo '<script>alert("Reply sent successfully!");</script>';
            echo '<script>window.history.back();</script>';
            // Optionally, redirect the user to a specific page or perform further actions
        } else {
            echo '<script>alert("Error sending reply: ' . mysqli_error($conn) . '");</script>';
            echo '<script>window.history.back();</script>';
        }
    } else {
        echo '<script>alert("Incomplete data submitted.");</script>';
        echo '<script>window.history.back();</script>';
    }
} else {
    echo '<script>alert("Invalid request method.");</script>';
    echo '<script>window.history.back();</script>';
}
?>
