# Rencana Implementasi: Front Controller & Basic Routing (Pengatur Lalu Lintas)

Tujuan dari tahap ini adalah membuat satu **"Resepsionis" (Front Controller)** yang bertugas menerima semua tamu (Request URL) dan mengarahkannya ke **"Pelayan" (Controller)** yang tepat. 

Dengan sistem ini, URL kita akan menjadi lebih bersih, rapi, dan dinamis. Misalnya, `localhost/belajar-function/siswa` akan otomatis diarahkan ke `SiswaController`.

---

## 1. Tahap Persiapan: Sang Satpam (File `.htaccess`)

**Masalah:** Secara bawaan (default), jika user mengetik `localhost/belajar-function/siswa`, server Apache (Laragon) akan mencari folder atau file bernama `siswa`. Karena file/folder itu tidak ada, server akan menampilkan pesan error `404 Not Found`.

**Solusi (.htaccess):** Kita akan menaruh "Satpam" di depan pintu utama. Tugas satpam ini sederhana:
> *"Apapun URL yang diketik pengunjung (selama file aslinya tidak ada), paksa pengunjung untuk masuk lewat pintu utama, yaitu `index.php`."*

**Langkah Pengerjaan:**
- Membuat file bernama `.htaccess` di folder root (`belajar-function`).
- Mengisi `.htaccess` dengan aturan *RewriteRule* untuk menangkap URL dan mengubahnya menjadi bentuk parameter (contoh internal: `index.php?url=siswa`), namun di mata user tetap terlihat bersih (`/siswa`).

---

## 2. Tahap Utama: Sang Resepsionis (File `index.php`)

**Masalah Saat Ini:** File `index.php` kita langsung memanggil `SiswaController` secara paksa (hardcode). Kalau ada tamu yang mau pesan menu ke `GuruController`, resepsionis kita bingung.

**Solusi (Routing Dinamis):** Kita akan melatih "Resepsionis" (`index.php`) agar bisa membaca catatan dari satpam (parameter URL).

**Langkah Pengerjaan:**
1. **Menangkap Catatan:** Resepsionis akan membaca URL yang dimasukkan pengunjung (misalnya, menangkap kata "siswa" menggunakan `$_GET['url']`).
2. **Memecah Catatan:** Jika pengunjung mengetik `siswa/tambah`, resepsionis akan memecahnya menjadi dua bagian: 
   - Bagian 1: "siswa" (Ini Controller-nya)
   - Bagian 2: "tambah" (Ini Method/Fungsi-nya)
3. **Mengarahkan Tamu (Mapping):** 
   - Jika bagian 1 adalah "siswa", panggil `SiswaController`.
   - Jika method (bagian 2) tidak diketik (hanya `/siswa`), maka arahkan ke fungsi bawaan (misal `index()`).
4. **Keamanan Kesalahan:** Jika tamu meminta halaman yang tidak ada (misal `/mobil`), resepsionis akan menampilkan halaman `404 Not Found`.

---

## 3. Tahap Penyesuaian: Sang Pelayan (`SiswaController.php`)

**Masalah Saat Ini:** Fungsi `index()` di `SiswaController` memanggil view dengan alamat `include __DIR__ . '/../views/SiswaView.php'`. Walaupun ini berfungsi, namun saat aplikasi menjadi kompleks melalui eksekusi routing terpusat, pengalamatan relatif terkadang bermasalah.

**Solusi:** Menyesuaikan sedikit bagaimana Controller memanggil Model dan View agar lebih stabil ketik dipanggil oleh `index.php` yang bertindak sebagai "Bos" di luar folder. Ini adalah penyesuaian kosmetik namun esensial.

---

## Ringkasan Alur Kerja Nanti

1. Tamu memanggil: `localhost/belajar-function/siswa/tambah`
2. **`.htaccess`** menangkap `siswa/tambah` dan mengirimkannya diam-diam ke `index.php`.
3. **`index.php`** melihat URL tersebut dan memecahnya.
4. **`index.php`** memanggil file `SiswaController.php` dan menjalankan fungsi `tambah()`.
5. Semua berjalan otomatis, rapi, dan terstruktur seperti di aplikasi Framework Profesional!

---

**Apakah detail rencana di atas sudah cukup jelas dan mudah dipahami? Jika sudah, kita bisa mulai mengeksekusi Tahap 1, yaitu membuat file `.htaccess`.**
