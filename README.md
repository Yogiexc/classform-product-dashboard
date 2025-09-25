# 📘 Simple Product Dashboard

Aplikasi sederhana berbasis PHP untuk **CRUD Produk** menggunakan OOP, PDO, dan struktur project terorganisir.
Dibuat untuk memenuhi tugas kuliah Backend Development. 🚀

---

## 📂 Struktur Folder

```
project
 ├── app
 │    ├── Libraries
 │    │     ├── DB.php          # Koneksi database (class DB)
 │    │     └── Form.php        # Helper untuk membuat form dinamis
 │    └── Models
 │          └── Product.php     # Model untuk CRUD produk
 │
 ├── config
 │    └── config.php            # Konfigurasi koneksi database (PDO)
 │
 ├── db
 │    └── products.sql          # Skrip SQL untuk membuat tabel products
 │
 ├── public
 │    ├── index.php             # Halaman awal (Intro/redirect)
 │    ├── dashboard.php         # Dashboard produk (form input + daftar produk)
 │    └── store.php             # Proses simpan data produk
 │
 └── README.md                  # Dokumentasi project
```

---

## ⚙️ Setup Database

1. Buka **phpMyAdmin** atau MySQL CLI.
2. Buat database:

```sql
CREATE DATABASE classform_db;
USE classform_db;
```

3. Import file SQL:

```sql
SOURCE db/products.sql;
```

---

## 📑 Struktur Tabel `products`

```sql
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
```

---

## 🚀 Cara Menjalankan

1. Pastikan sudah install **XAMPP** atau server PHP + MySQL.

2. Clone / copy project ini ke folder `htdocs`:

   ```
   C:\xampp\htdocs\Back End 24\project
   ```

3. Edit konfigurasi database di `/config/config.php`:

   ```php
   define('DB_HOST','127.0.0.1');
   define('DB_NAME','classform_db');
   define('DB_USER','root');
   define('DB_PASS','');
   ```

4. Jalankan lewat browser:
   🔗 [http://localhost/Back End 24/project/public/](http://localhost/Back%20End%2024/project/public/)

---

## 💻 Alur Aplikasi

* `index.php` → halaman awal (intro/redirect ke dashboard).
* `dashboard.php` → form input produk + daftar produk.
* `store.php` → proses simpan data ke tabel `products`.
* `Product.php` → model query database.
* `Form.php` → library pembuat form otomatis.

---

## 📝 Fitur

* ✅ Tambah produk baru melalui form.
* 🔒 Password admin disimpan dengan `password_hash`.
* 📊 Data produk ditampilkan dalam tabel.

---

## 👨‍💻 Author

**Bryan Yogie Saputra**
📚 D3 Teknik Informatika – UNS
📌 NIM: V3424090
