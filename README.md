# E-Catalog Pariwisata Magetan

Sistem E-Catalog untuk mempromosikan Pariwisata, Destinasi, Event, dan Berita di wilayah Kabupaten Magetan. Dibangun menggunakan framework Laravel.

## Prasyarat (Prerequisites)

Pastikan sistem Anda telah menginstal beberapa perangkat lunak berikut:
- **PHP** >= 8.2
- **Composer**
- **Node.js & NPM**
- **SQLite** (Secara default Laravel menggunakan SQLite) atau **MySQL** (jika ingin dikonfigurasi manual)

## Cara Menjalankan Project (Local Development)

### 1. Buka Folder Project
Jika menggunakan terminal, arahkan terminal (Command Prompt / PowerShell) ke dalam folder project ini.

### 2. Install Dependensi PHP (Composer)
Jalankan perintah berikut untuk menginstal semua *library* PHP yang dibutuhkan:
```bash
composer install
```

### 3. Setup File Konfigurasi (Environment)
Buat salinan file `.env.example` dan ubah namanya menjadi `.env`. 
Anda dapat melakukannya secara manual melalui File Explorer, atau melalui terminal:
```bash
# Windows (CMD/PowerShell)
copy .env.example .env

# Mac/Linux
cp .env.example .env
```
*(Secara default, aplikasi ini menggunakan database SQLite yang sangat mudah digunakan untuk development).*

### 4. Generate Application Key
Jalankan perintah berikut untuk mengenkripsi session dan data lain di Laravel:
```bash
php artisan key:generate
```

### 5. Setup Database & Jalankan Migrasi
Aplikasi ini membutuhkan database. Anda bisa langsung menjalankan perintah migrasi, dan Laravel akan menawarkan untuk membuat file database SQLite secara otomatis:
```bash
php artisan migrate --seed
```
*(Parameter `--seed` sangat penting digunakan agar role dan akun pengguna awal dibuat ke dalam database).*

### 6. Install & Compile Dependensi Frontend (NPM)
Karena aplikasi menggunakan Vite & TailwindCSS, Anda perlu menginstal *library* frontend dan melakukan kompilasi aset (CSS/JS):
```bash
npm install
npm run build
```
*(Catatan: Anda juga bisa menjalankan `npm run dev` jika sedang mengembangkan aplikasi dan ingin perubahan CSS/JS di-update secara otomatis).*

### 7. Jalankan Local Server
Nyalakan server bawaan Laravel dengan perintah:
```bash
php artisan serve
```
Aplikasi sekarang dapat diakses melalui web browser di alamat: **http://localhost:8000**

*(Jika Anda menggunakan Laragon, Anda juga bisa langsung mengaksesnya melalui URL virtual host seperti `http://namaproyek.test` atau sesuai konfigurasi Laragon Anda).*

---

## Akun Login Default
Karena Anda telah menjalankan seeder (`--seed`), akun berikut telah tersedia dan siap digunakan untuk masuk ke dalam sistem:

### 👑 Super Admin
- **Email:** `admin@magetan.go.id`
- **Password:** `password`

### 👤 Petugas
- **Email:** `petugas@magetan.go.id`
- **Password:** `password`

---

## ⚡ Cara Cepat (Shortcut) Instalasi
Jika Anda ingin melewati proses satu per satu di atas, project ini telah dilengkapi dengan custom script. Anda dapat menjalankan perintah berikut yang akan secara otomatis melakukan (install composer, copy .env, generate key, migrate, install npm, dan build):
```bash
composer setup
```
Setelah itu Anda hanya tinggal menjalankan seeder `php artisan db:seed` dan aplikasi siap digunakan.
