<?php

class SiswaManagerDB
{
    private $conn; // Variabel koneksi
    public $sekolah = "SMK Informatika";

    // Fungsi __construct() jalan pertama kali
    public function __construct()
    {
        // Panggil file koneksi terpisah
        require 'koneksi.php';

        // Simpan variabel $conn dari file koneksi.php ke dalam class ini
        $this->conn = $conn;
    }

    // FUNCTION A: Sapa Siswa (Sama seperti sebelumnya)
    public function sapa($nama)
    {
        return "Halo $nama, selamat datang di " . $this->sekolah . "!<br>";
    }

    // FUNCTION B: Menghitung sekaligus menyimpan ke Database Beneran!
    public function simpanNilai($nama, $nilai1, $nilai2)
    {
        // Hitung rata-rata dan status
        $rataRata = ($nilai1 + $nilai2) / 2;

        if ($rataRata >= 75) {
            $status = "LULUS";
        } else {
            $status = "TIDAK LULUS";
        }

        // Query untuk memasukkan data ke tabel (INSERT INTO)
        // Kita pakai Prepared Statement (tanda ?) supaya lebih aman dari error
        $stmt = $this->conn->prepare("INSERT INTO siswa (nama, nilai1, nilai2, rata_rata, status) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("siids", $nama, $nilai1, $nilai2, $rataRata, $status);

        // Eksekusi (Jalankan) Query-nya
        if ($stmt->execute()) {
            return "<span style='color:green;'><i>[BERHASIL]: Menyimpan $nama (Rata-rata: $rataRata | $status) ke database!</i></span><br>";
        } else {
            return "<span style='color:red;'><i>[ERROR]: Gagal menyimpan $nama.</i></span><br>";
        }
    }

    // FUNCTION C: Mengambil tipe data dari Database
    public function tampilkanSemuaData()
    {
        // Query untuk mengambil semua isi tabel siswa (SELECT)
        $result = $this->conn->query("SELECT * FROM siswa ORDER BY id DESC");

        $html = "<h4>Daftar Data Siswa di Database:</h4>";
        $html .= "<table border='1' cellpadding='5' cellspacing='0'>";
        $html .= "<tr style='background-color:#eee;'><th>ID</th> <th>Nama</th> <th>Nilai 1</th> <th>Nilai 2</th> <th>Rata-rata</th> <th>Status</th></tr>";

        // Cek apakah datanya ada isinya?
        if ($result->num_rows > 0) {
            // Jika ada, keluarkan satu per satu datanya pakai while loop
            while ($row = $result->fetch_assoc()) {
                $html .= "<tr>";
                $html .= "<td>" . $row['id'] . "</td>";
                $html .= "<td>" . $row['nama'] . "</td>";
                $html .= "<td>" . $row['nilai1'] . "</td>";
                $html .= "<td>" . $row['nilai2'] . "</td>";
                $html .= "<td>" . $row['rata_rata'] . "</td>";
                $html .= "<td><b>" . $row['status'] . "</b></td>";
                $html .= "</tr>";
            }
        } else {
            $html .= "<tr><td colspan='6'>Belum ada data di database.</td></tr>";
        }

        $html .= "</table>";
        return $html;
    }
}

// ========================================================
// AREA TEST
// ========================================================

// 1. Bikin Object Baru (Ini otomatis akan terhubung ke MySQL & Bikin Databasenya)
$db = new SiswaManagerDB();

echo "<h3>--- Tes Fungsi dengan Database ---</h3>";

// 2. Panggil fungsi sapa
echo $db->sapa("Rudi");

echo "<hr>";

// 3. Simpan data ke Database (Setiap kamu me-refresh halaman ini, datanya akan nambah terus di database!)


// 4. Menampilkan data yang ditarik ASLI dari Database MySQL
echo $db->tampilkanSemuaData();

?>