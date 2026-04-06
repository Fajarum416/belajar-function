# Penjelasan File: SiswaController.php (Si Pelayan)

Dalam struktur MVC, **Controller** adalah bagian yang paling penting untuk dipahami karena ia adalah "jembatan" atau penghubung. Mari kita bedah isi file `controllers/SiswaController.php` baris demi baris:

---

## 1. Menghubungkan ke Dapur (Model)
```php
require_once __DIR__ . '/../models/SiswaModel.php';
```
*   **Analogi:** Pelayan harus tahu di mana lokasi dapur (Model) sebelum dia bisa memesan makanan.
*   **Fungsi:** Baris ini memastikan Controller tahu tentang adanya Class `SiswaModel` yang bertugas mengambil data dari database MySQL.

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
*   **Analogi:** Saat Pelayan mulai bekerja (`__construct`), dia langsung menyiapkan koneksi ke Dapur (`new SiswaModel`).
*   **Fungsi:** Kita membuat objek `$model` di dalam Controller agar Controller bisa menyuruh Model melakukan tugas-tugas database kapan saja.

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
*   **Analogi:** Pelayan bertanya ke Koki: "Koki, tolong berikan data semua siswa" (`getAllSiswa`). Koki memberikan datanya dalam bentuk array (makanan yang sudah matang). Lalu pelayan mengambil piring (`SiswaView.php`) dan meletakkan makanan tadi di atasnya.
*   **Penting:** Perhatikan bahwa variabel `$dataSiswa` dibuat di Controller, secara otomatis variabel ini akan **bisa dibaca** oleh file `SiswaView.php` karena file tersebut di-`include` di sini.

---

## 4. Fungsi `tambahSiswa()` (Menyampaikan Orderan)
```php
public function tambahSiswa($nama, $nilai1, $nilai2) {
    $this->model->saveSiswa($nama, $nilai1, $nilai2);
}
```
*   **Analogi:** Pelayan mencatat pesanan dari pelanggan, lalu memberikannya ke Koki untuk dimasak (disimpan ke database).

---

## Kesimpulan
Tanpa **Controller**, Model dan View tidak akan pernah bertemu. 
- **Model** hanya diam punya data tapi tidak tahu cara menampilkannya. 
- **View** hanya punya tampilan tapi tidak punya data untuk ditampilkan.

**Controller** adalah "Otak" yang mengatur kapan data harus diambil dan kapan data harus ditampilkan.
