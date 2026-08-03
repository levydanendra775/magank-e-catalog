<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventSeeder extends Seeder
{
    /**
     * Sync data ke tabel `events`.
     * Aman dijalankan berulang kali — tidak duplikat (updateOrInsert).
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
                'judul'                => 'Festival Budaya Magetan 2026',
                'poster'               => 'event/4kZvqqMlkzmI9LOoUvl3mk131ISVV58NE8CfVtnW.jpg',
                'lokasi'               => 'Alun-Alun Magetan',
                'tanggal'              => '2026-08-10',
                'jam'                  => '08:00:00',
                'deskripsi'            => 'Festival budaya tahunan Kabupaten Magetan yang menampilkan berbagai pertunjukan seni dan budaya lokal.',
                'link_pendaftaran'     => NULL,
                'status'               => 1,
                'created_at'           => '2026-07-30 09:25:03',
                'updated_at'           => '2026-07-30 09:25:03',
            ],
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
        ];

        foreach ($data as $item) {
            DB::table('events')->updateOrInsert(
                ['judul' => $item['judul']],
                $item
            );
        }

        $this->command->info('✓ EventSeeder: ' . count($data) . ' data berhasil disinkronisasi.');
    }
}
