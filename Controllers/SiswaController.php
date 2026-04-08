<?php
namespace App\Controllers;

use App\Models\SiswaModel;

// INI ADALAH CONTROLLER (SI PELAYAN)
// Tugasnya: Menerima pesanan dan memanggil koki (Model), lalu mengirim makanan ke piring (View).

class SiswaController
{
    private $model;

    public function __construct()
    {
        $this->model = new SiswaModel();
    }

    // Fungsi untuk menampilkan daftar siswa (Default: /siswa atau /siswa/index)
    public function index()
    {
        // 1. Pelayan minta makanan (Model ambil data ke database)
        $dataSiswa = $this->model->getAllSiswa();

        // 2. Pelayan letakkan makanan di atas piring (View tampilkan data)
        include __DIR__ . '/../views/SiswaView.php';
    }

    // Fungsi untuk menambah siswa (Gunakan: /siswa/tambah)
    public function tambah($nama = "", $nilai1 = 0, $nilai2 = 0)
    {
        // Jika parameter tidak kosong, kirim data ke Model (Simpan!)
        if (!empty($nama)) {
            $hasil = $this->model->saveSiswa($nama, $nilai1, $nilai2);
            
            if ($hasil) {
                echo "<h4 style='color:green;'>[SUCCESS]: Data $nama berhasil ditambahkan melalui Routing!</h4>";
            } else {
                echo "<h4 style='color:red;'>[ERROR]: Gagal menambahkan data.</h4>";
            }
        } else {
            echo "<h4>Gunakan URL: <i>localhost/belajar-function/siswa/tambah/NamaSiswa/Nilai1/Nilai2</i> untuk mencoba!</h4>";
        }

        // Tampilkan daftar data setelah tambah
        $this->index();
    }
}
