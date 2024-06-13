# ASTIKET

ASTIKET adalah aplikasi web yang dirancang untuk pemesanan tiket online di Alaska Park. Aplikasi ini memberikan solusi modern untuk memudahkan pengunjung dalam memesan tiket secara efisien dan cepat.

## Website Astiket
https://astiket.000webhostapp.com/

## Screenshots
- **Landingpage**
  ![Landingpage](tampilansebelumlogin.png)
- **Home**
  ![Home](tampilansesudahlogin.png)
- **Browse**
  ![Browse](halamanbrowse.png)
- **Contact**
  ![Contact](halamancontact.png)
- **Login Page**
  ![Login Page](login.png)
- **Register Page**
  ![Register Page](register.png)
- **Dashboard Admin**
  ![Dashboard](dashboardadmin.png)
- **Pemesanan Tiket**
  ![Pemesanan Tiket](pembayarantiket.png)

## Fitur

- Responsive
- Otentikasi Login Pengguna
- Pendaftaran Tiket Baru
- Pembayaran Tiket
- Manajemen Pengguna
  - Admin
  - User
- Masuk Sebagai Admin
  - username  : admin
  - password  : admin123

## Resource yang Digunakan

Berikut adalah beberapa resource utama yang digunakan dalam pengembangan ASTIKET:

- **CodeIgniter 4** - Framework PHP untuk pengembangan aplikasi web.
- **Bootstrap** - Framework CSS untuk desain responsif.
- **Maps https://leafletjs.com/** - API untuk menampilkan maps.
- **TCPDF** - Library untuk mencetak tiket dan report.

## Prasyarat Instalasi

- XAMPP
- Git
- Composser

## Instalasi

### 1. Instal XAMPP

- Unduh XAMPP dari [situs web resmi](https://www.apachefriends.org/index.html).
- Ikuti instruksi instalasi yang diberikan.

### 2. Start Apache dan MySQL

- Buka XAMPP Control Panel.
- Klik tombol Start di samping Apache dan MySQL.

### 3. Salin Proyek ke Direktori htdocs

- Salin folder proyek `astiket` ke dalam direktori `htdocs` di direktori instalasi XAMPP. 
  Contoh: `C:\xampp\htdocs\astiket`.

### 4. Impor Database

- Buka phpMyAdmin melalui XAMPP Control Panel (klik tombol Admin di samping MySQL).
- Buat database baru dengan nama `tokodata`.
- Impor file `database.sql` ke database `astiket` dari folder proyek.

### 5. Konfigurasi Koneksi Database

- Buka file `config.php` di dalam folder `astiket`.
- Sesuaikan konfigurasi database (`$host`, `$username`, `$password`, `$database`) sesuai dengan konfigurasi MySQL Anda.

### 6. Akses Proyek di Browser

- Buka browser dan ketikkan URL berikut: `http://localhost/astiket/main`.

