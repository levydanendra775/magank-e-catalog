# 📖 Panduan Sinkronisasi Data Tim — Magank E-Catalog

Dokumen ini menjelaskan cara kerja tim agar **data wisata, event, berita, dan gambar selalu sinkron** (termasuk penambahan, update, maupun penghapusan data & gambar).

---

## ⚡ Cara Paling Mudah: Gunakan `sync.bat`

Kami telah menyediakan script otomatis `sync.bat` agar kamu atau teman tim **tidak perlu mengetik command panjang/manual**.

### 📤 1. Setelah Kamu Menambah / Mengubah / Menghapus Data atau Gambar:
Cukup jalankan script batch di Command Prompt / Terminal:
```cmd
sync.bat push
```
> **Proses otomatis:**
> 1. Membaca MySQL lokal & memperbarui file seeder (`WisataSeeder`, `EventSeeder`, `BeritaSeeder`).
> 2. Menambahkan file seeder & gambar baru/yang tersisa ke git.
> 3. Meminta pesan commit, lalu otomatis `git push` ke GitHub.

---

### 📥 2. Setelah Kamu Pull dari GitHub (Mengambil Update Teman):
Cukup jalankan:
```cmd
sync.bat pull
```
> **Proses otomatis:**
> 1. `git pull` untuk mengambil kode, gambar, dan seeder terbaru (serta menghapus file gambar yang dihapus teman).
> 2. Menjalankan `WisataSeeder`, `EventSeeder`, dan `BeritaSeeder`.
> 3. **Otomatis menghapus** data dari MySQL lokal jika data tersebut sudah dihapus oleh teman di seedernya!

---

## 🧠 Penjelasan Teknis Singkat

| Kasus | Apa yang terjadi? |
|---|---|
| **Tambah Data & Gambar** | Gambar di-sync via Git. Data MySQL dimasukkan ke Seeder (`updateOrInsert`). |
| **Update Data & Gambar** | Gambar di-update via Git. Data MySQL di-update via Seeder. |
| **Hapus Data & Gambar** | Gambar yang dihapus otomatis terhapus saat `git pull`. Data MySQL otomatis terhapus dari tabel lokal karena Seeder mengecek data yang tidak ada lagi di seeder array. |

---

## 🛠 Perintah Manual (Jika Tidak Memakai `sync.bat`)

Jika memakai terminal khusus yang tidak mendukung `.bat`:

**Push Manual:**
```bash
php generate_seeders.php
git add database/seeders/ storage/app/public/
git commit -m "feat: update data"
git push
```

**Pull Manual:**
```bash
git pull
php artisan db:seed --class=WisataSeeder
php artisan db:seed --class=EventSeeder
php artisan db:seed --class=BeritaSeeder
```
*(Catatan: ganti `php` dengan path PHP Laragon jika `php` tidak terdaftar di environment variable System PATH).*
