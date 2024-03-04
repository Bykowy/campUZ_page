<?php
session_start();
if (isset($_SESSION['username'])) {
    header("Location: profile.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>UzBook</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('https://source.unsplash.com/random');
            background-size: contain;
            background-position: center;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .links {
            width: 300px;
            padding: 20px;
            border-radius: 5px;
            background-color: rgba(255, 255, 255, 0.8);
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .links a {
            display: block;
            margin-bottom: 10px;
            text-decoration: none;
            color: #3b5998;
            font-size: 20px;
            transition: color 0.3s;
        }
        .links a:hover {
            color: #2d4373;
        }
    </style>
</head>
<body>
    <div class="links">
        <a href="login.php">Zaloguj</a>
        <a href="register.php">Zarejestruj</a>
    </div>
</body>
</html>
