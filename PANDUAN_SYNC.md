# 📖 Panduan Sinkronisasi Data Tim — Magank E-Catalog

Dokumen ini menjelaskan cara kerja tim agar **data wisata dan gambar selalu sinkron** di semua laptop anggota tim.

---

## 🧠 Memahami Masalahnya

| Yang bisa di-sync lewat `git push/pull` | Yang **TIDAK** bisa otomatis sync |
|---|---|
| ✅ File kode (PHP, Blade, CSS, JS) | ❌ Data di MySQL (database lokal masing-masing) |
| ✅ Gambar di `storage/app/public/` | ❌ (MySQL harus pakai seeder) |
| ✅ File seeder (`WisataSeeder.php`) | |
| ✅ Migration baru | |

**Solusinya:** Setiap kali menambah data wisata baru lewat admin panel, **update juga file `WisataSeeder.php`** sebelum push. Anggota lain tinggal pull + jalankan seeder.

---

## 👤 Yang Menambah Wisata Baru (Pihak yang Push)

### Langkah 1 — Generate ulang WisataSeeder dari database lokal

Jalankan script ini di terminal (dari folder project):

```bash
php check_wisata_seeder.php
```

> Script ini akan otomatis membaca database MySQL kamu dan memperbarui `WisataSeeder.php`.

### Langkah 2 — Push semua ke GitHub

```bash
git add database/seeders/WisataSeeder.php
git add storage/app/public/wisata/
git commit -m "feat: tambah wisata baru [nama wisata]"
git push
```

---

## 👥 Yang Menerima Data (Pihak yang Pull)

### Langkah 1 — Pull dari GitHub

```bash
git pull
```

Ini akan mengambil: file kode terbaru + seeder terbaru + gambar wisata baru.

### Langkah 2 — Jalankan seeder untuk update database MySQL

```bash
php artisan db:seed --class=WisataSeeder
```

Perintah ini **aman dijalankan berkali-kali** — tidak akan duplikat data karena menggunakan `updateOrInsert`.

### Langkah 3 — Pastikan storage link aktif

```bash
php artisan storage:link
```

(Cukup dijalankan sekali saja, tidak perlu setiap kali pull)

---

## 🔄 Alur Lengkap Tim

```
[ ANGGOTA A menambah wisata baru lewat admin panel ]
            ↓
[ Jalankan: php check_wisata_seeder.php ] ← update WisataSeeder.php
            ↓
[ git add + git commit + git push ]
            ↓ GitHub ↓
[ ANGGOTA B: git pull ]
            ↓
[ php artisan db:seed --class=WisataSeeder ]
            ↓
[ ✅ Wisata baru tampil di laptop Anggota B! ]
```

---

## ⚡ Perintah Cepat (Quick Reference)

### Setelah kamu menambah wisata baru:
```bash
php check_wisata_seeder.php
git add database/seeders/WisataSeeder.php storage/app/public/wisata/
git commit -m "feat: tambah wisata [nama wisata]"
git push
```

### Setelah kamu pull dari teman:
```bash
git pull
php artisan db:seed --class=WisataSeeder
```

---

## ❓ FAQ

**Q: Apakah seeder aman dijalankan berulang?**  
A: Ya! Menggunakan `updateOrInsert` berdasarkan `slug`, jadi tidak akan duplikat data.

**Q: Bagaimana jika ada wisata yang dihapus di teman saya?**  
A: Seeder hanya menambah/update, tidak menghapus. Untuk sinkronisasi penuh termasuk hapus, koordinasikan manual dengan tim.

**Q: File `check_wisata_seeder.php` ada di mana?**  
A: Di root folder project (sama dengan `artisan`). Tapi file ini hanya untuk generate seeder, **jangan di-push ke git** (sudah masuk `.gitignore`... atau tambahkan manual).

**Q: Gambar wisata yang baru, apakah perlu tambah ke gitignore?**  
A: Tidak perlu. File `.gitignore` di `storage/app/public/` sudah dikonfigurasi untuk **menyertakan** semua gambar (`.jpg`, `.jpeg`, `.png`, `.webp`, dll).
