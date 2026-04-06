# Rencana Pembelajaran: Memahami Konsep Basic MVC (Model-View-Controller)

## Tujuan
Memahami konsep arsitektur MVC (Model-View-Controller) secara utuh, mulai dari teori dasar hingga praktik langsung dengan kode PHP sederhana yang mudah dipahami oleh programmer pemula.

## Latar Belakang
Seperti yang telah dipelajari sebelumnya tentang pemisahan logika (Class & Function) dari tampilan, langkah selanjutnya yang menjadi standar industri (seperti yang digunakan di kerangka kerja Laravel, CodeIgniter, dll.) adalah arsitektur MVC. Menguasai MVC adalah kunci untuk membangun aplikasi yang *scalable* (mudah dikembangkan) dan rapi.

---

## Tahap 1: Memahami Konsep MVC (Teori Analogi)

Pada tahap ini, kita akan mempelajari apa itu MVC melalui analogi sebuah **Restoran**, karena ini adalah cara yang paling mudah dipahami untuk pemula.

*   **Model (Si Koki):** Bertugas di dapur (Database). Dia yang mengatur bahan baku, memasak (query SQL), dan memastikan aturan dapur (logika perhitungan/validasi data). Model **tidak pernah** bertemu langsung dengan pelanggan.
*   **View (Piring & Tata Letak Makanan):** Bertugas mengatur tampilan (HTML, CSS). Ini adalah apa yang dilihat oleh pelanggan. View **tidak boleh** memproses data, tugasnya hanya menampilkan apa yang sudah matang.
*   **Controller (Si Pelayan):** Bertugas menerima pesanan dari pelanggan, menyampaikannya ke Koki (Model), lalu mengambil makanan yang sudah matang untuk disajikan di atas piring (View) dan diberikan kembali ke pelanggan.

Kita akan mempelajari bagaimana ketiga komponen ini saling berinteraksi tanpa tumpang tindih.

---

## Tahap 2: Praktik Basic MVC (Langkah demi Langkah)

Kita akan mengubah kode `function-database.php` yang sudah ada, dan memecahnya menjadi struktur MVC yang sebenarnya.

### Langkah 2.1: Menyiapkan Folder
Kita akan membuat struktur folder sederhana:
- `models/` (tempat file Model)
- `views/` (tempat file View/Tampilan)
- `controllers/` (tempat file Controller)
- `index.php` (sebagai pintu masuk utama)

### Langkah 2.2: Membuat Model (`models/SiswaModel.php`)
- **Tujuan:** Memindahkan logika interaksi ke database (seperti class `SiswaManagerDB` sebelumnya) ke dalam satu file tersendiri.
- **Fungsi:** Mengambil data ke MySQL (SELECT), menyimpan data (INSERT). Hanya berurusan dengan data.

### Langkah 2.3: Membuat View (`views/SiswaView.php`)
- **Tujuan:** Membuat file khusus berisi HTML dan sedikit kode PHP untuk me-looping/menampilkan isi tabel.
- **Fungsi:** Tidak ada lagi tag HTML yang dicampur dengan logika Query dalam satu file. Benar-benar murni tampilan agar mudah di-styling dengan CSS nanti.

### Langkah 2.4: Membuat Controller (`controllers/SiswaController.php`)
- **Tujuan:** Membuat "otak" pengatur.
- **Fungsi:** Controller ini akan punya metode (function) yang memanggil `SiswaModel` untuk mengambil data siswa, lalu melemparkan (passing) data tersebut ke `SiswaView` untuk ditampilkan ke layar.

### Langkah 2.5: Menyalurkan Semuanya (`index.php`)
- **Tujuan:** File utama yang akan dibuka di browser pertama kali.
- **Fungsi:** Memanggil Controller, lalu meminta Controller menjalankan tugasnya.

---

## Tahap 3: Review dan Diskusi
Setelah praktik selesai, kita akan me-review kode bersama.

1.  **Mengapa ini lebih baik?** Melihat secara langsung bagaimana merubah fungsi/tampilan menjadi jauh lebih mudah karena file tidak bercampur.
2.  **Kapan pakai MVC?** Memahami kapan sebuah proyek kecil bisa dibuat biasa saja, dan proyek besar *harus* memakai MVC.

---

**Siap untuk mulai tahap pertama (Teori Analogi) atau langsung praktek kodenya?**
