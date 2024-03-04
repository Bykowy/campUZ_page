<?php
include 'config.php';


session_start();

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['username'] = $username;
        echo "<script>showMessage('Zalogowano, Przekierowywanie...');</script>";
        header("Location: profile.php");
        exit;
    } else {
        echo "<script>showMessage('Zła nazwa użytkownika lub hasło.');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <script>
        function showMessage(message) {
            var msgBox = document.getElementById('messageBox');
            msgBox.textContent = message;
            msgBox.style.display = 'block';
            setTimeout(function() {
                msgBox.style.display = 'none';
            }, 3000);
        }
    </script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .login-form {
            width: 300px;
            padding: 20px;
            border-radius: 5px;
            background-color: #ffffff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .login-form input[type="submit"] {
            background-color: #3b5998;
            color: white;
            border: none;
            padding: 10px;
            width: 100%;
            cursor: pointer;
            margin-top: 10px;
        }
        .login-form input[type="submit"]:hover {
            background-color: #2d4373;
        }
        .login-form label {
            display: block;
            margin-bottom: 5px;
        }
        .login-form input[type="text"],
        .login-form input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
    </style>
</head>
<body>
    <div class="login-form">
        <form method="post" action="login.php">
            <label for="username">Nazwa:</label>
            <input type="text" name="username" required>
            <label for="password">Hasło:</label>
            <input type="password" name="password" required>
            <input type="submit" name="login" value="Zaloguj">
        </form>
    </div>
</body>
</html>
