<?php

require_once 'vendor/autoload.php';

// INI ADALAH PENGUNJUNG (RESTURAN UTAMA) - Sekarang jadi Router!
// Tugasnya: Membaca URL dan memutuskan Controller & Method mana yang harus dipanggil.

// 1. Tangkap URL dari .htaccess (Catatan dari Satpam)
// Contoh: localhost/belajar-function/siswa/tambah -> url akan berisi 'siswa/tambah'
$url = isset($_GET['url']) ? $_GET['url'] : 'siswa'; 
$url = rtrim($url, '/'); 
$url = explode('/', $url); 

// 2. Tentukan Nama Controller (Bagian pertama URL)
// Jika ngetik 'siswa', maka akan mencari 'SiswaController' dalam namespace App\controllers
$baseControllerName = !empty($url[0]) ? ucfirst($url[0]) . 'Controller' : 'SiswaController';
$controllerFullName = "App\\Controllers\\" . $baseControllerName;

// 3. Tentukan Nama Method (Bagian kedua URL)
// Jika ngetik 'siswa/tambah', maka methodnya adalah 'tambah'
// Jika hanya 'siswa', maka method defaultnya adalah 'index'
$methodName = isset($url[1]) ? $url[1] : 'index';

// 4. Cek apakah Class tersebut ada? (Sudah di-load otomatis oleh Composer)
if (class_exists($controllerFullName)) {
    // Inisialisasi Objek Controller
    $controller = new $controllerFullName();
    
    // 5. Cek apakah fungsi (method) yang diminta ada di dalam class tersebut?
    if (method_exists($controller, $methodName)) {
        // Hapus nama controller dan method dari array url agar sisa parameter bisa diambil
        unset($url[0], $url[1]); 
        $params = array_values($url); // Contoh parameter: /siswa/detail/1 -> '1' jadi parameter

        // JALANKAN: Panggil method tersebut dengan mengirimkan sisa parameter
        call_user_func_array([$controller, $methodName], $params);
    } else {
        echo "<h3>404 - Maaf, fitur '$methodName' tidak tersedia di $baseControllerName.</h3>";
    }
} else {
    echo "<h3>404 - Maaf, halaman tidak ditemukan.</h3>";
}

?>
