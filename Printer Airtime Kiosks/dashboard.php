<?php
session_start();

if (!isset($_SESSION['username'])) {
    // Redirect to the login page if the user is not logged in
    header("Location: login.php");
    exit();
}

$username = $_SESSION['username'];
$userFolder = "uploads/$username";
$files = scandir($userFolder);

// Handle file upload
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $uploadFolder = $userFolder; // Default to the user's folder

    // Check for specific usernames and adjust upload folder accordingly
    if ($username === 'john') {
        $uploadFolder = 'uploads/john';
    } elseif ($username === 'mary') {
        $uploadFolder = 'uploads/mary';
    }

    // Ensure the upload folder exists
    if (!file_exists($uploadFolder)) {
        mkdir($uploadFolder, 0777, true);
    }

    // Handle file upload
    $targetFile = $uploadFolder . '/' . basename($_FILES['file']['name']);
    
    if (move_uploaded_file($_FILES['file']['tmp_name'], $targetFile)) {
        echo 'File uploaded successfully!';
    } else {
        echo 'Error uploading file.';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- ... your existing head section ... -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.min.js"></script>
</head>
<body>
    <h1>Welcome to the Dashboard, <?php echo $username; ?>!</h1>
    
    <!-- Display a panel with files from the user's folder -->
    <div class="file-panel">
        <h2>Your Files</h2>
        <?php
            foreach ($files as $file) {
                if ($file != '.' && $file != '..') {
                    echo "<p>$file 
                        <a href='$userFolder/$file' target='_blank' download>Download</a>
                        <button onclick=\"openFile('$userFolder/$file')\">Preview</button>
                    </p>";
                }
            }
        ?>
    </div>

    <!-- Folder icon to list files and folders -->
    <div class="folder-icon">
        <a href="?folder=uploads/<?php echo $username; ?>">
            <img src="folder.png" alt="Folder" height="100" width="100">
        </a>
    </div>

    <!-- Upload form -->
    <div class="upload-form">
        <h2>Upload File</h2>
        <form method="post" action="" enctype="multipart/form-data">
            <label for="file">Choose a file to upload:</label>
            <input type="file" id="file" name="file" required>
            <button type="submit">Upload</button>
        </form>
    </div>

    <!-- Preview iframe -->
    <div class="preview-iframe">
        <h2>File Preview</h2>
        <iframe id="previewFrame" style="width: 100%; height: 500px; border: 1px solid #ccc;"></iframe>
    </div>

    <!-- JavaScript function to handle file opening -->
    <script>
        function openFile(filename) {
            // Extract the file extension
            var fileExtension = filename.split('.').pop().toLowerCase();

            // Check if the file is a PDF
            if (fileExtension === 'pdf') {
                // Display the PDF file in the iframe
                document.getElementById('previewFrame').src = filename;
            } else {
                // For other file types, open in a new window
                var newWindow = window.open(filename, '_blank');
                newWindow.focus();
            }
        }
    </script>
</body>
</html>
