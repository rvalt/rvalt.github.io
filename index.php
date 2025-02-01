<?php
session_start();
if (!isset($_SESSION['username'])) {
    // If user is not logged in, redirect to login page
    header("Location: login.php");
    exit();
}

// Display logged-in user info
$username = $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KARANG TARUNA FORGAF</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
         <img src="https://raw.githubusercontent.com/username/repository/branch/images/LOGO%20FORGAF.jpg" alt="Logo Karang Taruna" class="logo">
        <h1>KARANG TARUNA FORGAF</h1>
        <form action="login.php" method="POST">
            <div class="input-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Login</button>
        </form>
        <p class="footer">©2025 Karang Taruna Dusun Gedig</p>
    </div>
</body>
</html>