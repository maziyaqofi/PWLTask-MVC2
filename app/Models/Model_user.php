<?php
namespace Models;
use Libraries\Database;

class Model_user
{
    private $dbh;

    public function __construct()
    {
        $this->dbh = Database::getInstance();  // Pastikan kita menggunakan instance dari koneksi database
    }

    public function cekLogin($username, $password)
    {
        // Query untuk mengecek data login berdasarkan username dan password
        $stmt = $this->dbh->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
        $stmt->execute([$username, md5($password)]);  // Pastikan password dienkripsi sebelum dikirim
        return $stmt->fetch();  // Mengembalikan data user jika ditemukan
    }
}
