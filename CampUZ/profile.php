<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

include 'config.php';


if ($conn->connect_error) {
    die("Nie udało się połączyć z bazą danych: " . $conn->connect_error);
}


$username = $_SESSION['username'];
$sql = "SELECT * FROM users WHERE username='$username'";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
} else {

    echo "Nie znaleziono użytkownika";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
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
        .profile {
            width: 300px;
            padding: 20px;
            border-radius: 5px;
            background-color: #ffffff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .profile h2 {
            color: #3b5998;
            margin-bottom: 20px;
        }
        .profile a {
            display: inline-block;
            background-color: #3b5998;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            margin-top: 10px;
        }
        .profile a:hover {
            background-color: #2d4373;
        }
    </style>
</head>
<body>
    <div class="profile">
        <h2>Witaj podróżniku, <?php echo htmlspecialchars($user['username']); ?></h2>
        <p>Email: <?php echo htmlspecialchars($user['email']); ?></p>
        <a href="logout.php">Wyloguj</a>
    </div>
</body>
</html>
