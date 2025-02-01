<?php
session_start(); // Memulai session

// Cek apakah pengguna sudah login
if (!isset($_SESSION['username'])) {
    // Jika belum login, arahkan ke halaman login
    header("Location: login.php");
    exit();
}

// Ambil nama pengguna yang sudah login
$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Forum Remaja Gedig Aktif</title>
    <link rel="stylesheet" href="styles.css">
    <script>
        // Redirect setelah 1 menit (60000 milidetik)
        setTimeout(function() {
            window.location.href = "https://sites.google.com/view/forgaf-2024/home";
        }, 60000); // 60000 milidetik = 1 menit
    </script>
</head>
<body>
    <div class="container dashboard-container">
        <!-- Header -->
        <header>
            <h1>Selamat Datang, <?php echo htmlspecialchars($username); ?>!</h1>
        </header>

        <p>Hai, Gimana kabarnya?</p>
        <p>Anda akan segera diarahkan ke Forum dalam 1 menit...</p>
        
        <!-- Tombol Logout -->
        <a href="logout.php" class="logout-btn">Logout</a>
    </div>
</body>
</html>
