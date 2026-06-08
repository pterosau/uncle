<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the username and password from the form
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Save the username and password to user_data.csv
    $userData = fopen("user_data.csv", "a");
    fputcsv($userData, [$username, $password]);
    fclose($userData);

    // Create a text file with the username
    $textFileName = $username . ".txt";
    file_put_contents($textFileName, "This is a text file for user: " . $username);

    // Redirect the user to 1.html
    header("Location: 1.html");
    exit();
}
?>
