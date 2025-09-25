📘 README – Simple Product Dashboard
📂 Struktur Folder
/project
 ├── /app
 │    ├── /Libraries
 │    │     ├── DB.php          # Koneksi database (class DB)
 │    │     └── Form.php        # Helper untuk membuat form dinamis
 │    └── /Models
 │          └── Product.php     # Model untuk CRUD produk
 │
 /config
 │    └── config.php            # Konfigurasi koneksi database (PDO)
 │
 /db
 │    └── products.sql          # Skrip SQL untuk membuat tabel products
 │
 /public
 │    ├── index.php             # Halaman awal (Intro/redirect)
 │    ├── dashboard.php         # Dashboard produk (form input + daftar produk)
 │    └── store.php             # Proses simpan data produk
 │
 └── README.md                  # Dokumentasi project

⚙️ Setup Database

Buka phpMyAdmin atau MySQL CLI.
Buat database, contoh:

CREATE DATABASE classform_db;
USE classform_db;

Import file /db/products.sql:
SOURCE path/to/products.sql;

📑 Struktur Tabel products

Contoh isi products.sql:

CREATE TABLE products (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  sku VARCHAR(50) NOT NULL,
  price DECIMAL(10,2) NOT NULL,
  admin_password_hash VARCHAR(255),
  type ENUM('product','service') DEFAULT 'product',
  features TEXT,
  category VARCHAR(50),
  description TEXT,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

🚀 Cara Menjalankan

Pastikan sudah install XAMPP atau server PHP + MySQL.
Clone / copy project ini ke folder htdocs (XAMPP).
C:\xampp\htdocs\Back End 24\project


Edit konfigurasi database di /config/config.php:

define('DB_HOST','127.0.0.1');
define('DB_NAME','classform_db');
define('DB_USER','root');
define('DB_PASS','');


Akses lewat browser:

http://localhost/Back End 24/project/public/

🖥️ Alur Aplikasi

index.php → halaman awal (intro/redirect ke dashboard).
dashboard.php → form input produk + daftar produk.
store.php → proses simpan data ke tabel products.
Product.php → model yang handle query database.
Form.php → library pembuat form otomatis.

📝 Contoh Fitur

Tambah produk baru dengan form.
Password admin disimpan dengan password_hash.
Data produk ditampilkan dalam tabel.
Fitur (checkbox) bisa disimpan sebagai teks/JSON.

👨‍💻 Author

Bryan Yogie Saputra – D3 Teknik Informatika UNS - V3424090
