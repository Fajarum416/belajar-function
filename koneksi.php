<?php

// Konfigurasi Database
$host = "localhost";
$username = "root";
$password = "";
$database = "belajar_function";

// Jalankan Koneksi
$koneksi = new mysqli($host, $username, $password, $database);

// Cek Koneksi
if ($koneksi->konek_error) {
    die("Gagal menyambung ke database: " . $koneksi->konek_error);
}

// Variabel $conn sekarang bisa dipakai di file mana saja yang melakukan 'include' file ini.
?>