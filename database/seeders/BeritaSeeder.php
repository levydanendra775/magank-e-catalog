<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BeritaSeeder extends Seeder
{
    /**
     * Sync PENUH data ke tabel `beritas`.
     * - Tambah data baru  ✅
     * - Update data lama  ✅
     * - Hapus data yang dihapus dari seeder  ✅
     *
     * Generate ulang file ini:
     *   php generate_seeders.php
     *
     * Jalankan seeder:
     *   php artisan db:seed --class=BeritaSeeder
     */
    public function run(): void
    {
        $data = [
            [
                'judul'                => 'Rumah Promosi Magetan Siapkan Konsep "Wisata Resto" untuk Dongkrak Penjualan UMKM',
                'thumbnail'            => 'berita/WSNfIRXNhUDYagUNiMYnDNsoe60PfrGs2njMCxlD.png',
                'isi'                  => 'Rumah Promosi Magetan (RPM) kini tengah mengubah strategi pengelolaannya demi meningkatkan angka kunjungan masyarakat sekaligus mendongkrak penjualan produk-produk dari Usaha Mikro, Kecil, dan Menengah (UMKM). Sebagai langkah inovasi, pihak pengelola tidak hanya sekadar menghadirkan fasilitas kafe, tetapi juga tengah mematangkan konsep baru berupa "wisata resto".

Konsep wisata resto ini dijadwalkan akan mulai beroperasi pada bulan Agustus 2026 mendatang. Target utama dari strategi ini adalah untuk menyasar rombongan wisatawan yang berkunjung ke Kabupaten Magetan. Harapannya, lebih banyak wisatawan yang akan singgah ke RPM setelah mereka selesai menikmati keindahan Telaga Sarangan.

Menurut Eko Patrianto selaku Pengelola Rumah Promosi Magetan, situasi ekonomi saat ini menuntut pengelola untuk terus berinovasi. RPM tidak boleh lagi hanya berfungsi sebagai etalase atau tempat memajang produk semata. Tempat ini harus terus dikembangkan agar menjadi sebuah destinasi wisata, sarana edukasi, sekaligus menjadi pusat utama untuk mempromosikan serta menjual produk unggulan daerah Magetan.

Berbagai produk khas Magetan saat ini telah terhimpun dalam satu lokasi di RPM. Pengunjung dapat menemukan aneka kerajinan kulit, bambu, kayu, batik, rajut, hingga manik-manik. Selain produk kerajinan, tersedia pula beragam pilihan makanan, minuman, serta oleh-oleh khas Magetan yang siap memanjakan para wisatawan.',
                'penulis_id'           => 1,
                'status'               => 1,
                'created_at'           => '2026-07-22 02:32:00',
                'updated_at'           => '2026-07-22 02:42:52',
            ],
        ];

        // ── Hapus data yang sudah tidak ada di seeder ──
        $activeKeys = array (
  0 => 'Rumah Promosi Magetan Siapkan Konsep "Wisata Resto" untuk Dongkrak Penjualan UMKM',
);
        $deleted = DB::table('beritas')
            ->whereNotIn('judul', $activeKeys)
            ->delete();
        if ($deleted > 0) {
            $this->command->warn("  ⚠ Dihapus {$deleted} data lama dari `beritas`.");
        }

        // ── Tambah / update data dari seeder ──
        foreach ($data as $item) {
            DB::table('beritas')->updateOrInsert(
                ['judul' => $item['judul']],
                $item
            );
        }

        $this->command->info('✓ BeritaSeeder: ' . count($data) . ' data aktif di database.');
    }
}
