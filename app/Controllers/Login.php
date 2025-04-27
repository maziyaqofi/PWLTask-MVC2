<?php
namespace Controllers;
use Models\Model_user;

class Login
{
    public function index()
    {
        require_once 'app/Views/login.php';  // Menampilkan form login
    }

    public function auth()
    {
        session_start();  // Mulai session untuk menyimpan informasi user

        // Mengambil data dari form
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Cek login dengan model
        $m = new Model_user();
        $user = $m->cekLogin($username, $password);

        if ($user) {
            $_SESSION['user'] = $user['username'];  // Set session jika login berhasil
            header('Location: index.php?act=home');  // Redirect ke halaman home
            exit;
        } else {
            $error = "Login gagal! Username atau Password salah.";
            require_once 'app/Views/login.php';  // Tampilkan form login dengan error message
        }
    }

    public function logout()
    {
        session_start();
        session_destroy();  // Hapus session jika logout
        header('Location: index.php?act=login');  // Redirect ke form login
        exit;
    }
}
