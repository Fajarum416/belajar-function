<?php
namespace App\Models;


// INI ADALAH MODEL (SI KOKI)
// Tugasnya: Hanya berhubungan dengan Database MySQL.

class SiswaModel
{
    private $conn;

    public function __construct()
    {
        // Hubungkan ke koneksi yang sudah ada
        require __DIR__ . '/../koneksi.php';
        $this->conn = $conn;
    }

    // Fungsi untuk mengambil semua data siswa
    public function getAllSiswa()
    {
        $result = $this->conn->query("SELECT * FROM siswa ORDER BY id DESC");
        $dataSiswa = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $dataSiswa[] = $row;
            }
        }

        return $dataSiswa; // Kembalikan dalam bentuk Array saja
    }

    // Fungsi untuk menyimpan data siswa (Logic Database)
    public function saveSiswa($nama, $nilai1, $nilai2)
    {
        $rataRata = ($nilai1 + $nilai2) / 2;
        $status = ($rataRata >= 75) ? "LULUS" : "TIDAK LULUS";

        $stmt = $this->conn->prepare("INSERT INTO siswa (nama, nilai1, nilai2, rata_rata, status) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("siids", $nama, $nilai1, $nilai2, $rataRata, $status);

        return $stmt->execute();
    }
}