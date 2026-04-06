<?php

// INI ADALAH CONTROLLER (SI PELAYAN)
// Tugasnya: Menerima pesanan dan memanggil koki (Model), lalu mengirim makanan ke piring (View).

require_once __DIR__ . '/../models/SiswaModel.php';

class SiswaController
{
    private $model;

    public function __construct()
    {
        $this->model = new SiswaModel();
    }

    // Fungsi untuk menampilkan daftar siswa (Tugas Pelayan: Mengantar Makanan)
    public function index()
    {
        // 1. Pelayan minta makanan (Model ambil data ke database)
        $dataSiswa = $this->model->getAllSiswa();

        // 2. Pelayan letakkan makanan di atas piring (View tampilkan data)
        include __DIR__ . '/../views/SiswaView.php';
    }

    // Fungsi untuk menyimpan data siswa (Tugas Pelayan: Menyampaikan Orderan ke Dapur)
    public function tambahSiswa($nama, $nilai1, $nilai2)
    {
        $this->model->saveSiswa($nama, $nilai1, $nilai2);
    }
}
