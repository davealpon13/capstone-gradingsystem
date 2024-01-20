<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ensure that the request is a POST request

    // Replace '/path/to/python' with the absolute path to your Python interpreter
    $pythonPath = 'htdocs\capstone';

    // Replace 'app.py' with the path to your Python script
    $scriptPath = 'app.py';

    // Build the command with escapeshellarg to handle special characters in paths
    $command = escapeshellcmd("$pythonPath $scriptPath");

    // Execute the Python script
    $output = shell_exec($command);

    // Check for errors during execution
    if ($output === null) {
        http_response_code(500); // Internal Server Error
        echo "Error executing Python script";
    } else {
        // Output the result (optional, you can handle the output as needed)
        echo $output;
    }
} else {
    // Handle other HTTP methods if needed
    http_response_code(405); // Method Not Allowed
    echo "Method Not Allowed";
}
?>
