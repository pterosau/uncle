<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - Unblock</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            height: 100vh;
            background-image: url("6.jpg");
            background-repeat: no-repeat;
            background-size: cover;
        }

        form {
            background-color: #fff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-top: 50px;
        }

        h3 {
            color: #333;
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #333;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
            background-color: #45a049;
        }

        a {
            text-decoration: none;
            color: #333;
        }

        .login-link {
            text-align: center;
            margin-top: 10px;
        }

        .social-icons {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .social-icons img {
            margin: 0 10px;
            border-radius: 50%;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
        }
        /* .blue{
            color:blue;
        } */
        .orange{
            color:orange;
        }
    </style>
</head>
<body>
    <img src="logo (2).jpg" alt="">
 
    <h1  style="color:white"><span class="orange">Un</span><span class="orange">block</span></h1>
    <img src="plus.jpg" alt="" height="100" width="100">
    <h3 style="color:white">Text with confidence </h3><br>
    <form method="post" action="signup_process.php">
        <h2>Create an Account</h2>
        <label for="username">Username:</label>
        <input type="text" name="username" required>

        <label for="password">Password:</label>
        <input type="password" name="password" required>

        <button type="submit">Sign Up</button>
    </form>
    <div class="login-link">
        <a href="login.php" style="color:white">Already have an account? Login here</a>
    </div>
    <div class="social-icons">
        <p style="color:white">Available for:</p>
        <img src="facebook-1024x1024.png" alt="Facebook" height="50" width="50">
        <img src="instagram.jpg" alt="Instagram" height="50" width="50">
        <img src="ticktok.jpg" alt="TikTok" height="50" width="50">
        <img src="plus.jpg" alt="" height="50" width="50">
    </div>
</body>
</html>
