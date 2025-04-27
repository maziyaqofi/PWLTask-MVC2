<?php

namespace Controllers;

use Libraries\Database;

class Login
{
    // Menampilkan form login
    public function index()
    {
        // Jika sudah login, redirect ke halaman home
        if (isset($_SESSION['user_id'])) {
            header('Location: index.php?act=home');
            exit();
        }

        // Tampilkan form login
        include 'app/Views/login.php';
    }

    // Proses login
    public function auth()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Ambil data dari form
            $username = $_POST['username'];
            $password = $_POST['password'];

            // Verifikasi username dan password (bisa ganti dengan pengecekan database)
            if ($username == 'admin' && $password == 'admin123') {
                // Jika berhasil login, simpan session
                $_SESSION['user_id'] = $username;

                // Redirect ke halaman home setelah login
                header('Location: index.php?act=home');
                exit();
            } else {
                // Jika login gagal, tampilkan pesan error
                echo '<script>alert("Username atau Password salah"); window.location="index.php?act=login";</script>';
            }
        }
    }

    // Logout
    public function logout()
    {
        // Hapus session dan redirect ke halaman login
        session_destroy();
        header('Location: index.php?act=login');
        exit();
    }
}
