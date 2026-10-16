# FilmHub - Aplikasi CRUD Data Film

FilmHub adalah aplikasi web sederhana untuk mengelola data film menggunakan PHP Native, pola arsitektur MVC (Model-View-Controller), dan database MySQL.

## Fitur Aplikasi

- **Create:** Menambahkan data film.
- **Read:** Menampilkan daftar film.
- **Update:** Mengubah data film.
- **Delete:** Menghapus data film.
- Validasi input pada form film.
- Penggunaan PDO dan prepared statement untuk operasi database.
- Output data ditampilkan dengan escaping untuk mengurangi risiko XSS.

## Teknologi yang Digunakan

- PHP Native
- MySQL / MariaDB
- PDO
- HTML
- XAMPP
- Git dan GitHub

## Struktur Folder


mvc-native-109062500069/
├── app/
│   ├── controllers/
│   │   └── FilmController.php
│   ├── models/
│   │   └── Film.php
│   └── views/
│       └── films/
│           ├── create.php
│           ├── edit.php
│           └── index.php
├── config/
│   └── database.php
├── public/
│   └── index.php
├── .gitignore
└── README.md
```

## Persyaratan

- XAMPP
- PHP dengan ekstensi PDO MySQL aktif
- MySQL atau MariaDB
- Browser web

## Cara Menjalankan Aplikasi

1. Salin atau clone project ke folder `htdocs` XAMPP.
2. Jalankan Apache dan MySQL melalui XAMPP Control Panel.
3. Buat database bernama `filmhub` melalui phpMyAdmin.
4. Buat tabel `films` dengan struktur berikut:

| Kolom | Tipe Data | Keterangan |
|---|---|---|
| id | INT | Primary Key, Auto Increment |
| judul | VARCHAR(150) | Judul film |
| genre | VARCHAR(50) | Genre film |
| tahun_rilis | YEAR | Tahun rilis |
| sutradara | VARCHAR(100) | Nama sutradara |
| durasi | INT | Durasi film dalam menit |

5. Periksa konfigurasi koneksi database di `config/database.php`:


$host = 'localhost';
$dbname = 'filmhub';
$username = 'root';
$password = '';
```

Sesuaikan username dan password jika konfigurasi MySQL berbeda.

6. Buka aplikasi melalui browser:

http://localhost/mvc-native-109062500069/public/

## Arsitektur MVC

- **Model:** `app/models/Film.php` menangani operasi data film ke database.
- **View:** `app/views/films/` menangani tampilan halaman dan formulir.
- **Controller:** `app/controllers/FilmController.php` mengatur alur aplikasi, validasi, dan pemanggilan Model.
- **Entry Point:** `public/index.php` menjadi pintu masuk aplikasi dan mengarahkan aksi pengguna.

## Database

Nama database: `filmhub`

Nama tabel: `films`

Database menyimpan ID, judul, genre, tahun rilis, sutradara, dan durasi film.

## Repository

GitHub: https://github.com/RexaNuriman/mvc-native-109062500069
