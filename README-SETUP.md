# 🚀 Panduan Setup Project — E-Catalog Wisata Magetan

Ikuti langkah-langkah berikut setelah clone project ini.

---

## 1. Install Dependensi

```bash
composer install
npm install
```

---

## 2. Salin File Environment

```bash
cp .env.example .env
php artisan key:generate
```

---

## 3. Konfigurasi Database MySQL

Edit file `.env`, sesuaikan dengan konfigurasi MySQL kamu:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=magang_ecatalog
DB_USERNAME=root
DB_PASSWORD=       # kosongkan jika tidak pakai password (default Laragon)
```

---

## 4. Buat Database & Import Data

Buat database dulu di MySQL:

```bash
# Menggunakan Laragon (sesuaikan path mysql kamu)
mysql -u root -e "CREATE DATABASE IF NOT EXISTS magang_ecatalog CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"
```

Atau buat manual via **phpMyAdmin** / **HeidiSQL** dengan nama: `magang_ecatalog`

Lalu import data dari file dump:

```bash
mysql -u root magang_ecatalog < database/dump.sql
```

> ⚠️ **Jangan jalankan** `php artisan migrate` jika sudah import `dump.sql` — karena semua tabel sudah ada di dalam dump tersebut (termasuk data wisata, gambar, dll).

---

## 5. Buat Storage Link

```bash
php artisan storage:link
```

Perintah ini membuat symlink `public/storage` → `storage/app/public` agar gambar wisata bisa ditampilkan di browser.

---

## 6. Jalankan Aplikasi

```bash
npm run dev
php artisan serve
```

Akses di: **http://localhost:8000**

Login admin:
- Email: `admin@magetan.go.id`
- Password: `password`

---

## 🔄 Update Database (jika ada perubahan data terbaru)

Jika temanmu menambah data wisata baru, export ulang dump dan commit:

```bash
# Di laptop yang punya data terbaru:
mysqldump -u root magang_ecatalog > database/dump.sql
git add database/dump.sql
git commit -m "update: sinkronisasi data database"
git push
```

Lalu di laptopmu:

```bash
git pull
mysql -u root magang_ecatalog < database/dump.sql
```
