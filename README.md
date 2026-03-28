# 🎮 Game Store Platform - Fullstack PHP & MySQL Integration

![Status](https://img.shields.io/badge/Status-Active-brightgreen)
![Backend](https://img.shields.io/badge/Backend-PHP-777BB4?logo=php&logoColor=white)
![Database](https://img.shields.io/badge/Database-MySQL-4479A1?logo=mysql&logoColor=white)
![University](https://img.shields.io/badge/Institution-UKSW-maroon)

**Game Store Platform** adalah aplikasi manajemen katalog permainan video berbasis web yang mengintegrasikan antarmuka pengguna yang dinamis dengan sistem pengolahan data di sisi server. Proyek ini mendemonstrasikan penerapan nyata dari pemrograman PHP dan manajemen basis data MySQL.

---

## ⚡ Integrasi Sistem (PHP & Database)

Proyek ini menggunakan arsitektur **Web Dinamis**, di mana data tidak ditulis secara manual pada HTML, melainkan dikelola melalui database:

* **Database Driven:** Menggunakan MySQL untuk menyimpan data katalog, harga, deskripsi, dan status stok.
* **Server-Side Processing:** Menggunakan PHP untuk menangani logika bisnis, seperti autentikasi login dan pemrosesan form.
* **Connection Bridge:** File `koneksi.php` bertindak sebagai jembatan aman yang menghubungkan skrip PHP dengan server basis data menggunakan ekstensi `mysqli`.

---

## 🚀 Fitur Utama Terperinci

### 🛠️ Backend & Admin Management (The Engine)
Panel administratif dirancang untuk memberikan kontrol penuh kepada pengelola toko melalui file `admin.php` dan `crudgame.php`:

* **Sistem CRUD Terintegrasi:**
    * **Create:** Form input cerdas untuk menambah koleksi game baru, lengkap dengan validasi tipe file gambar (JPG/PNG).
    * **Read:** Data ditarik menggunakan query SQL dan ditampilkan dalam tabel interaktif yang memudahkan pengawasan stok.
    * **Update:** Fitur edit instan untuk memperbarui harga pasar atau deskripsi game tanpa harus menyentuh database secara langsung.
    * **Delete:** Mekanisme penghapusan data aman untuk membersihkan item yang sudah tidak relevan.
* **Media Management:** Logika PHP untuk menangani penyimpanan aset gambar ke direktori lokal (`img/`) dan menyimpan *path* file ke dalam database.
* **Session Security:** Melindungi halaman admin agar tidak bisa diakses tanpa proses login yang valid.

### 👤 Frontend & User Experience (The Interface)
Antarmuka pengguna fokus pada kemudahan navigasi dan estetika visual untuk meningkatkan *engagement*:

* **Dynamic Product Catalog (`daftargame.php`):** Katalog otomatis yang melakukan *looping* data dari database. Setiap kartu game menampilkan gambar, harga, dan genre secara *real-time*.
* **Smart Trending Algorithm:** Sub-halaman atau section yang memfilter game berdasarkan popularitas atau entri terbaru untuk membantu pengguna menemukan produk terbaik.
* **Role-Based Content:** Implementasi logika kondisional PHP untuk membedakan tampilan konten bagi pengunjung umum dan member terdaftar.
* **Interactive UI:** Penggunaan CSS modern dan JavaScript untuk transisi antar halaman dan elemen interaktif seperti tombol beli atau detail game.
* **Responsive Layout:** Desain yang dioptimalkan agar tetap nyaman dilihat melalui perangkat mobile maupun desktop.

---

## ⚙️ Cara Instalasi

Ikuti langkah-langkah berikut untuk menjalankan proyek di lingkungan lokal:

1.  **Persiapan Folder:**
    Ekstrak folder proyek dan letakkan di direktori `htdocs` (jika menggunakan XAMPP) atau `www` (jika menggunakan Laragon).
2.  **Impor Database:**
    * Buka browser dan akses `localhost/phpmyadmin`.
    * Buat database baru dengan nama `db_gamestore`.
    * Pilih menu **Import** dan pilih file `.sql` yang tersedia di folder proyek.
3.  **Konfigurasi Koneksi:**
    Buka file `koneksi.php` menggunakan teks editor (VS Code/Sublime), lalu sesuaikan kredensialnya:
    ```php
    $host = "localhost";
    $user = "root";     // Sesuaikan dengan user database Anda
    $pass = "";         // Sesuaikan dengan password database Anda
    $db   = "db_gamestore";
    ```
4.  **Menjalankan Aplikasi:**
    Buka browser dan akses URL: `http://localhost/Game Store/login.html`.

---

## 👨‍💻 Profil Pengembang

* **Nama:** Michael Julio Sonda
* **Instansi:** Universitas Kristen Satya Wacana (UKSW)
* **Fakultas:** Teknologi Informasi
* **Program Studi:** Teknik Informatika (Angkatan 2023)
* **Keahlian:** UI/UX Design & Web Development

---