# 📖 Panduan Sinkronisasi Data Tim — Magank E-Catalog

Dokumen ini menjelaskan cara kerja tim agar **data wisata, event, berita, dan gambar selalu sinkron** di semua laptop anggota tim.

---

## 🧠 Memahami Masalahnya

| Yang bisa di-sync lewat `git push/pull` | Yang **TIDAK** bisa otomatis sync |
|---|---|
| ✅ File kode (PHP, Blade, CSS, JS) | ❌ Data di MySQL (database lokal masing-masing) |
| ✅ Gambar di `storage/app/public/` | ❌ (MySQL harus pakai seeder) |
| ✅ File seeder (Wisata/Event/BeritaSeeder.php) | |
| ✅ Migration baru | |

**Solusinya:** Setiap kali menambah/mengubah data lewat admin panel, **jalankan `php generate_seeders.php`** sebelum push. Anggota lain tinggal pull + jalankan seeder.

---

## 👤 Yang Menambah / Update Data (Pihak yang Push)

### Langkah 1 — Generate ulang semua seeder dari database lokal

```bash
php generate_seeders.php
```

> Script ini otomatis membaca MySQL kamu dan memperbarui:
> - `database/seeders/WisataSeeder.php`
> - `database/seeders/EventSeeder.php`
> - `database/seeders/BeritaSeeder.php`

### Langkah 2 — Push semuanya ke GitHub

```bash
git add database/seeders/
git add storage/app/public/wisata/
git add storage/app/public/event/
git add storage/app/public/berita/
git commit -m "feat: update data [wisata/event/berita]"
git push
```

---

## 👥 Yang Menerima Data (Pihak yang Pull)

### Langkah 1 — Pull dari GitHub

```bash
git pull
```

Ini akan mengambil: kode terbaru + seeder terbaru + semua gambar baru.

### Langkah 2 — Jalankan seeder untuk update database MySQL

```bash
php artisan db:seed --class=WisataSeeder
php artisan db:seed --class=EventSeeder
php artisan db:seed --class=BeritaSeeder
```

Atau jalankan sekaligus (khusus fresh install):

```bash
php artisan db:seed
```

> ✅ Semua seeder **aman dijalankan berkali-kali** — tidak akan duplikat data.

### Langkah 3 — Pastikan storage link aktif (cukup sekali)

```bash
php artisan storage:link
```

---

## 🔄 Alur Lengkap Tim

```
[ ANGGOTA A tambah wisata/event/berita lewat admin panel ]
            ↓
[ php generate_seeders.php ]   ← update ketiga file seeder
            ↓
[ git add + git commit + git push ]
            ↓ GitHub ↓
[ ANGGOTA B: git pull ]
            ↓
[ php artisan db:seed --class=WisataSeeder ]
[ php artisan db:seed --class=EventSeeder  ]
[ php artisan db:seed --class=BeritaSeeder ]
            ↓
[ ✅ Semua data & gambar tampil di laptop Anggota B! ]
```

---

## ⚡ Perintah Cepat (Quick Reference)

### Setelah kamu menambah/update data:
```bash
php generate_seeders.php
git add database/seeders/ storage/app/public/wisata/ storage/app/public/event/ storage/app/public/berita/
git commit -m "feat: update data [wisata/event/berita]"
git push
```

### Setelah kamu pull dari teman:
```bash
git pull
php artisan db:seed --class=WisataSeeder
php artisan db:seed --class=EventSeeder
php artisan db:seed --class=BeritaSeeder
```

---

## ❓ FAQ

**Q: Apakah seeder aman dijalankan berulang?**
A: Ya! Menggunakan `updateOrInsert` berdasarkan `judul`/`slug`, jadi tidak akan duplikat data.

**Q: Kenapa MySQL tidak otomatis sync lewat git?**
A: Git hanya menyimpan file — bukan isi database. Seeder adalah "catatan data" yang disimpan sebagai file PHP agar bisa di-push ke git.

**Q: Gambar sudah di-push tapi tidak muncul?**
A: Pastikan sudah menjalankan `php artisan storage:link` dan cek symlink di folder `public/storage`.

**Q: Bagaimana kalau ada data yang dihapus di teman saya?**
A: Seeder hanya menambah/update, tidak menghapus. Untuk sync hapus data, koordinasikan manual dengan tim.
