<?php
session_start(); // Memulai session

// Memasukkan file koneksi ke database
include('db.php');

// Cek apakah form login sudah disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username']; // Ambil input username
    $password = $_POST['password']; // Ambil input password

    // Menggunakan prepared statement untuk menghindari SQL Injection
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? LIMIT 1");
    $stmt->bind_param("s", $username); // "s" menunjukkan parameter bertipe string
    $stmt->execute();
    $result = $stmt->get_result();

    // Cek apakah username ditemukan
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc(); // Ambil data pengguna

        // Cek apakah password sesuai
        if ($password === $user['password']) {
            $_SESSION['username'] = $user['username']; // Set session untuk username
            header("Location: dashboard.php"); // Redirect ke halaman dashboard
            exit(); // Pastikan kode selanjutnya tidak dieksekusi
        } else {
            // Jika password salah
            echo "<script>alert('Username atau password salah');</script>";
        }
    } else {
        // Jika username tidak ditemukan
        echo "<script>alert('Username atau password salah');</script>";
    }

    $stmt->close(); // Tutup prepared statement
}

$conn->close(); // Tutup koneksi database
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
    <div class="container login-container">
        <img src="https://raw.githubusercontent.com/username/repository/branch/images/LOGO%20FORGAF.jpg" alt="Logo Karang Taruna" class="logo">
        <h1>KARANG TARUNA FORGAF</h1>

        <!-- Form Login -->
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

        <footer class="footer">
            <p>©2025 Tim Media FORGAF</p>
        </footer>
    </div>
</body>
</html>
