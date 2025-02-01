<?php
$servername = "localhost"; // Nama host, biasanya 'localhost'
$username = "root"; // Username database (default untuk XAMPP adalah 'root')
$password = ""; // Password database (kosongkan jika menggunakan XAMPP)
$dbname = "forgaf_db"; // Nama database yang telah dibuat

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
