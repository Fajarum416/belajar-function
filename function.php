<?php

// 1. KITA BUAT WADAHNYA (CLASS)
class SiswaManager
{

    // Ini adalah properti (variabel di dalam class)
    public $sekolah = "SMK Informatika";

    // FUNCTION A: Sapa Siswa (Simpel)
    public function sapa($nama)
    {
        return "Halo $nama, selamat datang di " . $this->sekolah . "!<br>";
    }

    // FUNCTION B: Hitung Nilai (Logika Matematika)
    // Di sini ada 2 parameter: $nilai1 dan $nilai2
    public function cekNilai($nama, $nilai1, $nilai2)
    {
        $rataRata = ($nilai1 + $nilai2) / 2;

        if ($rataRata >= 75) {
            $status = "LULUS";
        } else {
            $status = "TIDAK LULUS";
        }

        return "Siswa: <b>$nama</b> | Rata-rata: $rataRata | Status: <b>$status</b><br>";
    }

    // FUNCTION C: Simulasi Simpan ke Database
    // Kita tidak pakai database beneran, cuma simulasi teks saja
    public function simpanSimulasi($nama_siswa)
    {
        // Anggap saja di sini ada kode SQL yang rumit
        return "<i>[SISTEM]: Berhasil memasukkan nama '$nama_siswa' ke dalam tabel database.</i><br>";
    }
}

// ========================================================
// 2. AREA TEST (TEMPAT KAMU OTAK-ATIK)
// ========================================================

// Buat "Benda" nyata dari Class (Instansiasi)
$tes = new SiswaManager();

echo "<h3>--- Hasil Pengetesan Function ---</h3>";

// Test 1: Panggil fungsi sapa
echo $tes->sapa("Budi");
echo $tes->sapa("Siti");

echo "<hr>";

// Test 2: Panggil fungsi hitung nilai (Coba ganti-ganti angkanya!)
echo $tes->cekNilai("Asep", 80, 90);
echo $tes->cekNilai("Joko", 60, 70);

echo "<hr>";

// Test 3: Panggil simulasi database
echo $tes->simpanSimulasi("Dewi Sartika");

?>