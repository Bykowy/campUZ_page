<?php
include 'config.php';


if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];


    $sql = "INSERT INTO users (username, password, email) VALUES ('$username', '$password', '$email')";


    if ($conn->query($sql) === TRUE) {
        echo "<script>showMessage('Rejestracja przebiegła pomyślnie. Przekierowywanie...');</script>";
        header("Location: login.php");
        exit;
    } else {
        echo "<script>showMessage('Błąd: " . $sql . "<br>" . $conn->error . "');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
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
        .register-form {
            width: 300px;
            padding: 20px;
            border-radius: 5px;
            background-color: #ffffff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .register-form input[type="submit"] {
            background-color: #3b5998;
            color: white;
            border: none;
            padding: 10px;
            width: 100%;
            cursor: pointer;
            margin-top: 10px;
        }
        .register-form input[type="submit"]:hover {
            background-color: #2d4373;
        }
        .register-form label {
            display: block;
            margin-bottom: 5px;
        }
        .register-form input[type="text"],
        .register-form input[type="password"],
        .register-form input[type="email"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
    </style>
</head>
<body>
    <div class="register-form">
        <form method="post" action="register.php">
            <label for="username">Nazwa:</label>
            <input type="text" name="username" required>
            <label for="password">Hasło:</label>
            <input type="password" name="password" required>
            <label for="email">Email:</label>
            <input type="email" name="email" required>
            <input type="submit" name="register" value="Register">
        </form>
    </div>
</body>
</html>
