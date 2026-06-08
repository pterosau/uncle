<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the username and password from the form
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Check if the username and password match entries in user_data.csv
    $userData = fopen("user_data.csv", "r");
    while (($row = fgetcsv($userData)) !== false) {
        list($savedUsername, $savedPassword) = $row;
        if ($username === $savedUsername && $password === $savedPassword) {
            // Username and password match, redirect to dashboard.html with username parameter
            $_SESSION["username"] = $username; // Store username in session for later use
            header("Location: dashboard.php?username=$username");
            exit();
        }
    }
    fclose($userData);

    // If no match is found, show an error message (you can customize this part)
    $error_message = "Invalid username or password. Please try again.";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- ... your existing head section ... -->
</head>
<body>
    <h1>Sky blue printers  </h1>


    <img src="logo (2).jpg" alt="">
    <h1 style="color:white"><span class="orange">Un</span><span class="orange">block</span></h1>
    <form method="post" action="login.php">
        <h2>Login</h2>
        <label for="username">Username:</label>
        <input type="text" name="username" required>

        <label for="password">Password:</label>
        <input type="password" name="password" required>

        <button type="submit">Log In</button>
    </form>
    <?php
    if (isset($error_message)) {
        echo '<div class="error-message">' . $error_message . '</div>';
    }
    ?>
    <div class="login-link">
        <a href="signup.php" style="color:white">Don't have an account? Sign Up here</a>
    </div>

    <div class="login-link">
        <a href="signup.php" style="color:white">Don't have an account? Sign Up here</a>
    </div>
</body>
</html>
