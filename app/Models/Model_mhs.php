<?php

/**
 * Model mahasiswa berfungsi untuk menjalankan query
 * Sebelum menggunakan query, load dulu library database
 */

namespace Models;
use Libraries\Database;

class Model_mhs
{
    private $dbh; // 🔥 Tambahkan properti private untuk Database Handle

    public function __construct()
    {
        $this->dbh = Database::getInstance(); // 🔥 Langsung pakai static getInstance()
    }

    public function simpanData($nim, $nama)
    {
        $rs = $this->dbh->prepare("INSERT INTO mahasiswa (nim, nama) VALUES (?, ?)");
        $rs->execute([$nim, $nama]);
    }

    public function lihatData()
    {
        // Hanya ambil yang belum di-soft-delete
        $rs = $this->dbh->query("SELECT * FROM mahasiswa WHERE deleted_at IS NULL");
        return $rs;
    }

    public function lihatDataDetail($id)
    {
        $rs = $this->dbh->prepare("SELECT * FROM mahasiswa WHERE id = ?");
        $rs->execute([$id]);
        return $rs->fetch(); // kalau hasil query hanya satu, gunakan method fetch() bawaan PDO
    }

    public function softDelete($id)
    {
        $stmt = $this->dbh->prepare(
            "UPDATE mahasiswa 
            SET deleted_at = NOW() 
            WHERE id = ?"
        );
        $stmt->execute([$id]);
    }
}