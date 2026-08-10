<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventSeeder extends Seeder
{
    /**
     * Sync PENUH data ke tabel `events`.
     * - Tambah data baru  ✅
     * - Update data lama  ✅
     * - Hapus data yang dihapus dari seeder  ✅
     *
     * Generate ulang file ini:
     *   php generate_seeders.php
     *
     * Jalankan seeder:
     *   php artisan db:seed --class=EventSeeder
     */
    public function run(): void
    {
        $data = [
            [
                'judul'                => 'Gebyar UMKM Magetan',
                'poster'               => 'event/8RV7q7xe0U52YMkJO3RNTf7PFLmPjFSoiMX1AwsS.jpg',
                'lokasi'               => 'GOR Ki Mageti Magetan',
                'tanggal'              => '2026-08-20',
                'jam'                  => '09:00:00',
                'deskripsi'            => 'Pameran dan bazar produk UMKM unggulan Kabupaten Magetan untuk memperkenalkan produk lokal kepada masyarakat luas.',
                'link_pendaftaran'     => NULL,
                'status'               => 1,
                'created_at'           => '2026-07-30 09:25:03',
                'updated_at'           => '2026-07-30 09:25:03',
            ],
            [
                'judul'                => 'Wisata Alam Gunung Lawu',
                'poster'               => 'event/rPZW81Ndwv3SgvbhT5LTkcZKXtbvap9FgW0DbyWT.jpg',
                'lokasi'               => 'Telaga Sarangan, Plaosan',
                'tanggal'              => '2026-09-05',
                'jam'                  => '07:00:00',
                'deskripsi'            => 'Event wisata alam bersama komunitas pecinta alam Magetan dengan rute pendakian Gunung Lawu yang menakjubkan.',
                'link_pendaftaran'     => NULL,
                'status'               => 1,
                'created_at'           => '2026-07-30 09:25:03',
                'updated_at'           => '2026-07-30 09:25:03',
            ],
            [
                'judul'                => 'Festival Telaga Sarangan 2026',
                'poster'               => 'event/5nbvdnh7Ps4IbnOKxPRtycXIPjP8mmzIZBS7LjQq.jpg',
                'lokasi'               => 'Telaga Sarangan, Plaosan, Kabupaten Magetan',
                'tanggal'              => '2026-08-25',
                'jam'                  => '20:00:00',
                'deskripsi'            => 'Festival Telaga Sarangan merupakan agenda wisata tahunan Kabupaten Magetan yang menampilkan pertunjukan seni tradisional, kirab budaya, pameran UMKM, kuliner khas Magetan, pertunjukan musik, serta hiburan rakyat di kawasan wisata Telaga Sarangan.',
                'link_pendaftaran'     => NULL,
                'status'               => 1,
                'created_at'           => '2026-07-28 13:56:01',
                'updated_at'           => '2026-07-28 13:56:01',
            ],
            [
                'judul'                => 'Festival Budaya Magetan 2026',
                'poster'               => 'event/8RV7q7xe0U52YMkJO3RNTf7PFLmPjFSoiMX1AwsS.jpg',
                'lokasi'               => 'Alun-Alun Magetan',
                'tanggal'              => '2026-08-10',
                'jam'                  => '08:00:00',
                'deskripsi'            => 'Festival budaya tahunan Kabupaten Magetan yang menampilkan berbagai pertunjukan seni dan budaya lokal.',
                'link_pendaftaran'     => NULL,
                'status'               => 1,
                'created_at'           => '2026-07-30 09:25:03',
                'updated_at'           => '2026-07-30 09:25:03',
            ],
        ];

        // ── Hapus data yang sudah tidak ada di seeder ──
        $activeKeys = array (
  0 => 'Gebyar UMKM Magetan',
  1 => 'Wisata Alam Gunung Lawu',
  2 => 'Festival Telaga Sarangan 2026',
  3 => 'Festival Budaya Magetan 2026',
);
        $deleted = DB::table('events')
            ->whereNotIn('judul', $activeKeys)
            ->delete();
        if ($deleted > 0) {
            $this->command->warn("  ⚠ Dihapus {$deleted} data lama dari `events`.");
        }

        // ── Tambah / update data dari seeder ──
        foreach ($data as $item) {
            DB::table('events')->updateOrInsert(
                ['judul' => $item['judul']],
                $item
            );
        }

        $this->command->info('✓ EventSeeder: ' . count($data) . ' data aktif di database.');
    }
}
