<?php

namespace Controllers;

use Models\Model_mhs;

class Mahasiswa
{
    private $mhs; // 🔥 Tambahkan deklarasi properti private

    public function __construct()
    {
        $this->mhs = new Model_mhs();
    }

    public function index()
    {
        require_once 'app/Views/index.php';
    }

    public function show_data()
    {
        if (!isset($_GET['i'])) {
            // jika tidak ada parameter id yang dikirim, tampilkan semua data
            $rs = $this->mhs->lihatData();
            require_once('app/Views/mhsList.php');
        } else {
            // ada parameter id yang dikirim, tampilkan detail data
            $rs = $this->mhs->lihatDataDetail($_GET['i']);
            require_once('app/Views/mhsDetail.php');
        }
    }

    public function save()
    {
        $nim = $_POST['nim'];
        $nama = $_POST['nama'];

        // penyimpanan data ke model
        $this->mhs->simpanData($nim, $nama);
        $this->index(); // kembali ke halaman index
    }

    public function delete()
    {
        if (isset($_GET['id'])) {
            $this->mhs->softDelete($_GET['id']);
        }
        // setelah soft delete, redirect ke list
        header('Location: index.php?act=tampil-data');
        exit;
    }
}