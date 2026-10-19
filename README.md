<div align="center">

# 🗺️ E-Catalog Pariwisata Kabupaten Magetan

**Sistem informasi wisata digital untuk memperkenalkan potensi pariwisata, event, dan berita Kabupaten Magetan.**

[![Laravel](https://img.shields.io/badge/Laravel-12.x-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)](https://laravel.com)
[![PHP](https://img.shields.io/badge/PHP-8.2+-777BB4?style=for-the-badge&logo=php&logoColor=white)](https://php.net)
[![TailwindCSS](https://img.shields.io/badge/TailwindCSS-3.x-06B6D4?style=for-the-badge&logo=tailwindcss&logoColor=white)](https://tailwindcss.com)
[![SQLite](https://img.shields.io/badge/SQLite-3.x-003B57?style=for-the-badge&logo=sqlite&logoColor=white)](https://sqlite.org)

</div>

---

## 📋 Deskripsi

**E-Catalog Pariwisata Magetan** adalah aplikasi web berbasis Laravel yang dikembangkan sebagai proyek magang untuk membantu mempromosikan destinasi wisata, event, dan berita pariwisata di Kabupaten Magetan, Jawa Timur.

Aplikasi ini memiliki dua sisi utama:
- 🌐 **Halaman Publik** — dapat diakses oleh masyarakat umum tanpa login
- 🔐 **Panel Admin** — untuk pengelolaan konten oleh administrator

---

## ✨ Fitur Utama

### 🌐 Halaman Publik
| Fitur | Keterangan |
|---|---|
| 🏠 Beranda | Hero banner, wisata unggulan, event terbaru, dan berita |
| 🏝️ Wisata | Daftar & detail destinasi wisata dengan galeri foto & peta |
| 📅 Event | Informasi event dan festival pariwisata daerah |
| 📰 Berita | Artikel berita seputar pariwisata Magetan |
| ℹ️ Tentang | Halaman informasi tentang Kabupaten Magetan |
| ⭐ Rating & Ulasan | Pengguna dapat memberikan rating dan ulasan wisata |
| ❤️ Wishlist | Simpan destinasi wisata favorit |

### 🔐 Panel Admin
| Fitur | Keterangan |
|---|---|
| 📊 Dashboard | Statistik data wisata, event, ulasan, dan pengunjung |
| 🏝️ Manajemen Wisata | CRUD wisata + galeri foto + pin wisata unggulan |
| 📅 Manajemen Event | CRUD event/festival pariwisata |
| 📰 Manajemen Berita | CRUD artikel berita |
| 🖼️ Manajemen Banner | Kelola banner halaman utama |
| 🖼️ Manajemen Galeri | Kelola galeri foto |
| 💬 Manajemen Ulasan | Moderasi ulasan & balas ulasan pengguna |
| 📄 Laporan | Export laporan data wisata dalam format PDF |

---

## 🛠️ Tech Stack

| Layer | Teknologi |
|---|---|
| **Backend** | Laravel 12.x, PHP 8.2+ |
| **Frontend** | Blade Template, TailwindCSS 3.x, Vite |
| **Database** | SQLite (default) / MySQL |
| **Auth** | Laravel Breeze (multi-guard) |
| **Permission** | Spatie Laravel Permission |
| **PDF Export** | barryvdh/laravel-dompdf |
| **Package Manager** | Composer, NPM |

---

## 📁 Struktur Proyek

```
Magang-E-Catalog/
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       ├── Admin/              # Controller panel admin
│   │       │   ├── DashboardController.php
│   │       │   ├── WisataController.php
│   │       │   ├── EventController.php
│   │       │   ├── BeritaController.php
│   │       │   ├── BannerController.php
│   │       │   ├── GaleriController.php
│   │       │   ├── UlasanController.php
│   │       │   └── LaporanController.php
│   │       ├── PublicController.php    # Controller halaman publik
│   │       ├── RatingController.php    # Manajemen rating wisata
│   │       └── WishlistController.php  # Manajemen wishlist
│   └── Models/
│       ├── Wisata.php          # Destinasi wisata
│       ├── WisataGallery.php   # Galeri foto wisata
│       ├── WisataRating.php    # Rating & ulasan wisata
│       ├── Event.php           # Event & festival
│       ├── Berita.php          # Artikel berita
│       ├── Banner.php          # Banner halaman utama
│       ├── Galeri.php          # Galeri foto
│       └── User.php            # Pengguna
├── database/
│   ├── migrations/             # Migrasi database
│   └── seeders/                # Seeder data awal
│       ├── WisataSeeder.php
│       ├── WisataGallerySeeder.php
│       ├── EventSeeder.php
│       └── BeritaSeeder.php
├── resources/
│   └── views/
│       ├── admin/              # Tampilan panel admin
│       ├── public/             # Tampilan halaman publik
│       ├── layouts/            # Layout template
│       └── auth/               # Halaman autentikasi
├── routes/
│   ├── web.php                 # Route publik & auth pengguna
│   └── auth.php                # Route autentikasi
└── storage/app/public/         # Upload file & gambar
```

---

## ⚙️ Instalasi & Setup

### Prasyarat
- PHP >= 8.2
- Composer
- Node.js & NPM
- Git

### Langkah Instalasi

**1. Clone repository**
```bash
git clone https://github.com/levydanendra775/magank-e-catalog.git
cd magank-e-catalog
```

**2. Install dependensi PHP**
```bash
composer install
```

**3. Salin file environment**
```bash
cp .env.example .env
```

**4. Generate application key**
```bash
php artisan key:generate
```

**5. Konfigurasi database** (edit file `.env`)
```env
# Untuk SQLite (default)
DB_CONNECTION=sqlite

# Untuk MySQL
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=magang_ecatalog
DB_USERNAME=root
DB_PASSWORD=
```

**6. Jalankan migrasi & seeder**
```bash
php artisan migrate
php artisan db:seed
```

**7. Buat storage link**
```bash
php artisan storage:link
```

**8. Install dependensi Node.js & build assets**
```bash
npm install
npm run build
```

**9. Jalankan server**
```bash
php artisan serve
```

Akses aplikasi di: **http://localhost:8000**

---

## 🚀 Menjalankan Development

Gunakan perintah berikut untuk menjalankan semua service sekaligus (server, queue, log, vite):

```bash
composer run dev
```

Atau jalankan secara terpisah:

```bash
# Terminal 1 - Laravel server
php artisan serve

# Terminal 2 - Vite dev server
npm run dev

# Terminal 3 - Queue worker
php artisan queue:listen
```

---

## 🔑 Akun Default

Setelah menjalankan seeder, gunakan akun berikut untuk login:

| Role | Email | Password |
|---|---|---|
| **Admin** | `admin@magetan.go.id` | `password` |

---

## 🗄️ Database

Aplikasi menggunakan **SQLite** secara default. File database tersimpan di:
```
database/database.sqlite
```

Untuk menggunakan MySQL, ubah konfigurasi `DB_CONNECTION` di file `.env`.

### Refresh & Seed Ulang Data
```bash
# Migrasi ulang + seed semua data
php artisan migrate:fresh --seed

# Seed seeder tertentu saja
php artisan db:seed --class=WisataSeeder
php artisan db:seed --class=EventSeeder
php artisan db:seed --class=BeritaSeeder
```

### Generate Ulang Seeder dari Database
```bash
php generate_seeders.php
```

---

## 📊 Model & Relasi

```
Wisata
 ├── hasMany → WisataGallery   (galeri foto)
 ├── hasMany → WisataRating    (rating & ulasan)
 └── belongsToMany → User      (melalui tabel wishlists)

WisataRating
 └── belongsTo → User          (pemberi ulasan)

User
 └── belongsToMany → Wisata    (wishlist)
```

---

## 🌐 Route Publik

| Method | URL | Keterangan |
|---|---|---|
| GET | `/` | Beranda |
| GET | `/wisata` | Daftar wisata |
| GET | `/wisata/{slug}` | Detail wisata |
| GET | `/event` | Daftar event |
| GET | `/event/{id}` | Detail event |
| GET | `/berita` | Daftar berita |
| GET | `/berita/{id}` | Detail berita |
| GET | `/tentang` | Halaman tentang |

### Route Auth (Login Diperlukan)
| Method | URL | Keterangan |
|---|---|---|
| POST | `/wisata/{wisata}/rating` | Tambah rating |
| PUT | `/wisata/{wisata}/rating` | Update rating |
| DELETE | `/wisata/{wisata}/rating` | Hapus rating |
| POST | `/rating/{rating}/like` | Like ulasan |
| POST | `/wisata/{wisata}/wishlist` | Toggle wishlist |
| GET | `/wishlist` | Daftar wishlist |

---

## 📄 Lisensi

Project ini dikembangkan sebagai bagian dari **Program Magang** di instansi Pemerintah Kabupaten Magetan.

---

<div align="center">

Dibuat dengan ❤️ sebagai proyek magang · Kabupaten Magetan, Jawa Timur

</div>
