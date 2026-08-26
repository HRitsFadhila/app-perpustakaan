# App Perpustakaan 📚

App Perpustakaan adalah aplikasi manajemen perpustakaan berbasis web yang dibangun menggunakan **Laravel 12**. 

## Tujuan Aplikasi
Sistem Perpustakaan Digital Kampus, aplikasi yang dikelola Admin/Petugas untuk mengelola buku, anggota, dan transaksi peminjaman.

## Prasyarat Sistem
Sebelum menjalankan proyek ini, pastikan sistem Anda memiliki:
* **PHP** (minimal versi 8.2)
* **Composer**
* **Node.js** & **NPM** (untuk *asset bundling* dengan Vite)
* Database server menggunakan **MySQL**

## Cara Menjalankan
1. Kloning repository
```bash
git clone https://github.com/HRitsFadhila/app-perpustakaan.git
```

2. Masuk ke directory project
```bash
cd sistem-antrian
```

3. Install depedensi PHP
```bash
composer install
```

4. Konfigurasi .env dan jalan migrasi
```bash
php artisan migrate
```

5. Jalankan server lokal
```bash
php artisan serve
```

<!-- 
Catatan Arsitektur MVC:
1. Model bertanggung jawab atas struktur data dan interaksi langsung dengan database, 
2. View berfokus menangani antarmuka pengguna yang akan dilihat oleh pengguna. 
3. Controller bertindak sebagai jembatan utama yang menerima permintaan pengguna, mengambil atau menyimpan data melalui Model, dan mengirimkan hasilnya untuk ditampilkan pada View. 
-->
