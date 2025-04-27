<?php
// koneksi.php

// Konfigurasi database
$host = 'localhost';
$dbname = 'login_db'; // ini nama database kamu
$username = 'root';   // default user di XAMPP
$password = '';       // default password XAMPP biasanya kosong

try {
    // Buat koneksi PDO
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Set error mode supaya error bisa ditangkap
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Koneksi gagal: " . $e->getMessage());
}
?>