<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload Status</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
            margin-top: 100px;
        }

        .success-message {
            background-color: #4CAF50;
            color: white;
            padding: 20px;
            border-radius: 10px;
            font-size: 18px;
        }
    </style>
</head>
<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_FILES["file"]) && $_FILES["file"]["error"] == 0) {
            $targetDir = 'C:\xampp\htdocs\capstone\osrs\Images';

            // Check if the target directory exists, if not, create it
            if (!file_exists($targetDir)) {
                mkdir($targetDir, 0777, true);
            }

            $targetFile = $targetDir . DIRECTORY_SEPARATOR . basename($_FILES["file"]["name"]);

            if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)) {
                echo '<div class="success-message">The file <strong>' . htmlspecialchars(basename($_FILES["file"]["name"])) . '</strong> has been uploaded to osrs/Images folder.</div>';
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        } else {
            echo "Error: " . $_FILES["file"]["error"];
        }
    }
    ?>
</body>
</html>
