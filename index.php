<?php

// INI ADALAH PENGUNJUNG (RESTURAN UTAMA)
// Tugasnya: Hanya memanggil Pelayan (Controller) dan biarkan pelayan yang bekerja.

require_once 'controllers/SiswaController.php';

$app = new SiswaController();

// Kita bisa tambahkan data siswa dulu (Tugas Pelayan: Menyampaikan Pesanan)
// $app->tambahSiswa("Andi", 88, 92); // Aktifkan jika ingin mencoba simpan data

// Menampilkan Data (Tugas Pelayan: Mengantar Makanan ke View)
$app->index();

?>
