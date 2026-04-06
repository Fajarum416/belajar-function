# Penjelasan File: SiswaController.php (Si Pelayan)

Dalam struktur MVC, **Controller** adalah bagian yang paling penting untuk dipahami karena ia adalah "jembatan" atau penghubung. Mari kita bedah isi file `controllers/SiswaController.php` baris demi baris:

---

## 1. Menghubungkan ke Dapur (Model)
```php
require_once __DIR__ . '/../models/SiswaModel.php';
```
- **Analogi:** Pelayan harus tahu di mana lokasi dapur (Model) sebelum dia bisa memesan makanan.
- **Fungsi:** Baris ini memastikan Controller tahu tentang adanya Class `SiswaModel` yang bertugas mengambil data dari database MySQL.

---

## 2. Inisialisasi (Persiapan Pelayan)
```php
class SiswaController {
    private $model;

    public function __construct() {
        $this->model = new SiswaModel();
    }
}
```
- **Analogi:** Saat Pelayan mulai bekerja (`__construct`), dia langsung menyiapkan koneksi ke Dapur (`new SiswaModel`).
- **Fungsi:** Kita membuat objek `$model` di dalam Controller agar Controller bisa menyuruh Model melakukan tugas-tugas database kapan saja.

---

## 3. Fungsi `index()` (Mengambil & Menyajikan Makanan)
Inilah inti dari tugas seorang Pelayan:
```php
public function index() {
    // 1. Ambil data (Tanya ke Dapur)
    $dataSiswa = $this->model->getAllSiswa();

    // 2. Berikan ke View (Sajikan di atas Piring)
    include __DIR__ . '/../views/SiswaView.php';
}
```
- **Analogi:** Pelayan bertanya ke Koki: "Koki, tolong berikan data semua siswa" (`getAllSiswa`). Koki memberikan datanya dalam bentuk array (makanan yang sudah matang). Lalu pelayan mengambil piring (`SiswaView.php`) dan meletakkan makanan tadi di atasnya.
- **Penting:** Perhatikan bahwa variabel `$dataSiswa` dibuat di Controller, secara otomatis variabel ini akan **bisa dibaca** oleh file `SiswaView.php` karena file tersebut di-`include` di sini.

---

## 4. Fungsi `tambahSiswa()` (Menyampaikan Orderan)
```php
public function tambahSiswa($nama, $nilai1, $nilai2) {
    $this->model->saveSiswa($nama, $nilai1, $nilai2);
}
```
- **Analogi:** Pelayan mencatat pesanan dari pelanggan, lalu memberikannya ke Koki untuk dimasak (disimpan ke database).

---

# Tanya Jawab: Penamaan & Fleksibilitas dalam MVC

Dua pertanyaan penting mengenai fleksibilitas struktur MVC yang telah kita buat:

---

## 1. Apakah penamaan objek Model itu bebas?
**Pertanyaan:** Apakah penamaan objek model (seperti `$this->model`) itu bebas? Dan apakah memang harus dibuat di dalam Controller dengan memanggil class dari file `SiswaModel.php`?

**Jawaban:**
- **Penamaan BEBAS:** Nama variabel seperti `$this->model` hanyalah standar atau kesepakatan agar mudah dibaca oleh sesama programmer. Kamu bebas menamainya `$this->koki`, `$this->data`, atau `$this->dbSiswa`.
- **Dibuat di Controller:** Ya, dalam PHP MVC dasar, Controller bertanggung jawab menyiapkan "alat-alatnya". Dengan membuat `new SiswaModel()` di dalam `__construct` Controller, kita memastikan bahwa setiap kali Controller dipanggil, ia sudah siap dengan koneksi data.
- **Koneksi Otomatis:** Karena di dalam `SiswaModel.php` kita memanggil `require 'koneksi.php'`, maka saat Controller membuat objek model, seluruh jalur ke database sudah terhubung rapi via objek tersebut.

---

## 2. Apakah fungsi di dalam Model tergantung kebutuhan?
**Pertanyaan:** Apakah fungsi di dalam Model (seperti `getAllSiswa`) fleksibel tergantung kebutuhan aplikasi, karena yang menggunakannya adalah Controller?

**Jawaban:**
- **Sangat Fleksibel:** Isi dari Model sangat bergantung pada fitur aplikasi kamu. Tidak harus terbatas pada `getAllSiswa()` atau `saveSiswa()`.
- **Sesuai Fitur:** Jika kamu ingin menambah fitur "Hapus Siswa", kamu tinggal menambah fungsi `hapusSiswa($id)` di Model. Jika ingin "Cari Siswa", tambahkan `cariSiswa($nama)`.
- **Analogi Toko Alat:** Model adalah seperti **Toko Bangunan** yang menyediakan alat (Palu, Gergaji, Obeng). Controller adalah **Tukang Bangunan** yang memilih alat mana yang mau dipakai sesuai pekerjaan yang sedang dilakukan.

---

**Kesimpulan:** Controller adalah "Otak" yang mengatur kapan data harus diambil, diolah oleh Model, dan disajikan melalui View.
