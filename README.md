# E-Catalog Pariwisata Magetan

Sistem E-Catalog untuk mempromosikan Pariwisata, Destinasi, Event, dan Berita di wilayah Kabupaten Magetan. Dibangun menggunakan framework **Laravel 12** dengan database **MySQL**.

---

## 🖥️ Prasyarat (Prerequisites)

Pastikan sistem Anda telah menginstal perangkat lunak berikut:

| Perangkat | Versi Minimum |
|-----------|--------------|
| PHP | >= 8.2 |
| Composer | Latest |
| Node.js & NPM | >= 18 |
| MySQL | >= 8.0 |

> **Rekomendasi:** Gunakan [Laragon](https://laragon.org/) agar PHP, MySQL, dan server langsung tersedia tanpa konfigurasi tambahan.

---

## 🚀 Cara Menjalankan Project (Local Development)

### 1. Clone Repository

```bash
git clone https://github.com/levydanendra775/magank-e-catalog.git
cd magank-e-catalog
```

### 2. Install Dependensi PHP

```bash
composer install
```

### 3. Salin File Konfigurasi

```bash
# Windows
copy .env.example .env

# Mac/Linux
cp .env.example .env
```

### 4. Generate Application Key

```bash
php artisan key:generate
```

### 5. Konfigurasi Database MySQL

Edit file `.env`, sesuaikan bagian database:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=magang_ecatalog
DB_USERNAME=root
DB_PASSWORD=          # kosongkan jika tidak pakai password (default Laragon)
```

### 6. Buat Database & Import Data

Buat database di MySQL:

```bash
mysql -u root -e "CREATE DATABASE IF NOT EXISTS magang_ecatalog CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"
```

> Atau buat manual via **phpMyAdmin** / **HeidiSQL** dengan nama: `magang_ecatalog`

Lalu import data (tabel + data wisata, user, dll sudah tersedia):

```bash
mysql -u root magang_ecatalog < database/dump.sql
```

> ⚠️ **Jangan jalankan** `php artisan migrate` jika sudah import `dump.sql` karena semua tabel dan data sudah ada di dalamnya.

### 7. Buat Storage Link

```bash
php artisan storage:link
```

Perintah ini membuat symlink `public/storage → storage/app/public` agar gambar wisata, event, dan berita bisa tampil di browser.

### 8. Install & Compile Frontend

```bash
npm install
npm run build
```

> Gunakan `npm run dev` jika sedang dalam mode pengembangan aktif agar perubahan CSS/JS otomatis ter-update.

### 9. Jalankan Server

```bash
php artisan serve
```

Akses aplikasi di: **x**

> Jika menggunakan Laragon, bisa langsung akses via virtual host: `http://magank-e-catalog.test`

---

## 🔑 Akun Login Default

| Role | Email | Password |
|------|-------|----------|
| 👑 Super Admin | `admin@magetan.go.id` | `password` |
| 👤 Petugas | `petugas@magetan.go.id` | `password` |

---

## 🔄 Update Data dari Rekan Tim

Jika rekan tim menambah data baru (wisata, event, dll), minta mereka export dump terbaru:

```bash
# Di laptop yang punya data terbaru:
mysqldump -u root magang_ecatalog > database/dump.sql
git add database/dump.sql
git commit -m "update: sinkronisasi data database"
git push
```

Lalu di laptop kamu:

```bash
git pull
mysql -u root magang_ecatalog < database/dump.sql
```

---

## ⚡ Ringkasan Perintah Cepat

```bash
# Setelah clone, jalankan semua ini secara urut:
composer install
copy .env.example .env          # lalu edit DB_* di .env
php artisan key:generate
mysql -u root -e "CREATE DATABASE magang_ecatalog;"
mysql -u root magang_ecatalog < database/dump.sql
php artisan storage:link
npm install && npm run build
php artisan serve
```

---

## 📁 Struktur Fitur

| Fitur | URL |
|-------|-----|
| Beranda Publik | `/` |
| Destinasi Wisata | `/wisata` |
| Event & Agenda | `/event` |
| Berita | `/berita` |
| Dashboard Admin | `/admin` |

---

*Dikembangkan oleh tim magang Dinas Pariwisata & Kebudayaan Kabupaten Magetan.*
