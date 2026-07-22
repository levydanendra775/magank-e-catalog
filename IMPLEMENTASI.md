# Implementasi E-Catalog Pariwisata & UMKM Kabupaten Magetan

## Deskripsi

E-Catalog Pariwisisata & UMKM merupakan aplikasi berbasis web yang dikembangkan menggunakan Laravel untuk membantu Bidang Pemasaran Dinas Pariwisata dan Kebudayaan Kabupaten Magetan dalam mengelola informasi destinasi wisata, produk ekonomi kreatif, event, kuliner, dan penginapan secara terpusat.

Aplikasi memiliki dua jenis pengguna, yaitu **Admin/Petugas** sebagai pengelola data dan **Pengunjung** sebagai pengguna yang mengakses informasi.

---

# Tujuan

- Mempermudah pengelolaan data promosi pariwisata.
- Menyediakan informasi wisata secara digital.
- Mempromosikan produk UMKM lokal.
- Menyediakan informasi event wisata.
- Menjadi media promosi yang mudah diperbarui.

---

# Teknologi

| Teknologi | Keterangan |
|-----------|------------|
| Laravel 12 | Backend Framework |
| PHP 8.3+ | Programming Language |
| MySQL | Database |
| Bootstrap 5 | User Interface |
| Blade | Template Engine |
| Laravel Breeze | Authentication |
| Spatie Permission | Role & Permission |
| Chart.js | Dashboard Chart |
| DataTables | Tabel |
| DomPDF | Export PDF |
| Laravel Excel | Export Excel |

---

# Hak Akses

## Admin

- Dashboard
- Wisata
- UMKM
- Produk
- Event
- Kuliner
- Penginapan
- Banner
- Berita
- Galeri
- User
- Laporan
- Pengaturan

## Petugas

- Dashboard
- Wisata
- UMKM
- Produk
- Event
- Berita
- Galeri

## Pengunjung

- Destinasi wisata
- Produk UMKM
- Event
- Kuliner
- Penginapan
- Berita
- Galeri

---

# Struktur Menu

## Frontend

- Home
- Destinasi
- UMKM
- Produk
- Event
- Kuliner
- Penginapan
- Berita
- Galeri
- Tentang

## Backend

- Dashboard
- Master Data
  - Wisata
  - Kategori Wisata
  - UMKM
  - Produk
  - Kategori Produk
  - Kuliner
  - Penginapan
  - Event
- Konten
  - Banner
  - Berita
  - Galeri
- Laporan
- Pengaturan

---

# Modul

## Destinasi Wisata
Data:
- Nama wisata
- Slug
- Kategori
- Kecamatan
- Alamat
- Latitude
- Longitude
- Harga tiket
- Jam operasional
- Deskripsi
- Fasilitas
- Thumbnail
- Status publish

Fitur:
- CRUD
- Upload foto
- Multiple gallery
- Search
- Filter kategori
- Filter kecamatan

## UMKM
Data:
- Nama UMKM
- Pemilik
- Nomor HP
- Alamat
- Kecamatan
- Logo
- Deskripsi

Fitur:
- CRUD
- Upload logo
- Detail UMKM
- Daftar produk

## Produk
Data:
- Nama produk
- UMKM
- Kategori
- Harga
- Foto
- Deskripsi
- Status

Fitur:
- CRUD
- Upload gambar
- Produk unggulan

## Event
Data:
- Judul
- Poster
- Lokasi
- Tanggal
- Jam
- Deskripsi
- Link pendaftaran (opsional)

Fitur:
- CRUD
- Kalender event
- Publish/Draft

## Kuliner
- Nama
- Foto
- Alamat
- Maps
- Menu unggulan
- Jam buka
- Nomor HP

## Penginapan
- Nama
- Jenis
- Harga mulai
- Foto
- Alamat
- Maps
- Fasilitas
- Nomor HP

## Berita
- Judul
- Thumbnail
- Isi
- Penulis
- Status

## Banner
- Judul
- Gambar
- Link
- Urutan

## Galeri
- Judul
- Foto
- Video
- Kategori

---

# Dashboard

Statistik:
- Total Destinasi
- Total UMKM
- Total Produk
- Total Event
- Total Berita
- Total Pengunjung

Grafik:
- Wisata per Kecamatan
- Produk per Kategori
- Event per Bulan

---

# Keamanan

- Laravel Breeze Authentication
- Spatie Permission
- CSRF Protection
- XSS Protection
- Mass Assignment Protection
- Request Validation

---

# Pengembangan Selanjutnya

- QR Code destinasi
- Wishlist wisata
- Rating & ulasan
- Google Maps API
- REST API
- PWA
- Multi bahasa
- Notifikasi email

---

# Target Implementasi

| Tahapan | Estimasi |
|----------|----------|
| Analisis kebutuhan | 1 minggu |
| Desain database | 1 minggu |
| Backend Laravel | 3 minggu |
| Frontend Blade | 2 minggu |
| Testing | 1 minggu |
| Deployment | 1 minggu |

Total estimasi pengerjaan sekitar **9 minggu**.
