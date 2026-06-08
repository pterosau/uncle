<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if user exists in the spreadsheet
    require 'vendor/autoload.php'; // Adjust the path as needed
    require 'auth_functions.php'; // Contains the userExists function

    if (userExists($username, $password)) {
        echo 'Login successful!';
    } else {
        echo 'Invalid credentials.';
    }
} else {
    echo 'Invalid request.';
}
?>
