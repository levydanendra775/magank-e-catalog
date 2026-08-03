<?php
/**
 * check_wisata_seeder.php
 * 
 * Script untuk generate ulang WisataSeeder.php dari data MySQL lokal.
 * Jalankan ini setiap kali kamu menambah wisata baru lewat admin panel,
 * sebelum melakukan git push.
 * 
 * Cara pakai:
 *   php check_wisata_seeder.php
 */

require __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$wisatas = \DB::table('wisatas')->orderBy('id')->get();

$output  = "<?php\n\n";
$output .= "namespace Database\\Seeders;\n\n";
$output .= "use Illuminate\\Database\\Seeder;\n";
$output .= "use Illuminate\\Support\\Facades\\DB;\n\n";
$output .= "class WisataSeeder extends Seeder\n{\n";
$output .= "    /**\n";
$output .= "     * Sync data wisata ke database.\n";
$output .= "     * Aman dijalankan berulang kali — menggunakan updateOrInsert (tidak duplikat).\n";
$output .= "     *\n";
$output .= "     * Cara generate ulang file ini:\n";
$output .= "     *   php check_wisata_seeder.php\n";
$output .= "     *\n";
$output .= "     * Cara menjalankan seeder:\n";
$output .= "     *   php artisan db:seed --class=WisataSeeder\n";
$output .= "     */\n";
$output .= "    public function run(): void\n    {\n";
$output .= "        \$wisatas = [\n";

foreach ($wisatas as $w) {
    $output .= "            [\n";
    $output .= "                'nama'             => " . var_export($w->nama, true) . ",\n";
    $output .= "                'slug'             => " . var_export($w->slug, true) . ",\n";
    $output .= "                'kategori'         => " . var_export($w->kategori, true) . ",\n";
    $output .= "                'kecamatan'        => " . var_export($w->kecamatan, true) . ",\n";
    $output .= "                'alamat'           => " . var_export($w->alamat, true) . ",\n";
    $output .= "                'latitude'         => " . var_export($w->latitude, true) . ",\n";
    $output .= "                'longitude'        => " . var_export($w->longitude, true) . ",\n";
    $output .= "                'maps'             => " . var_export($w->maps ?? null, true) . ",\n";
    $output .= "                'harga_tiket'      => " . var_export($w->harga_tiket, true) . ",\n";
    $output .= "                'jam_operasional'  => " . var_export($w->jam_operasional, true) . ",\n";
    $output .= "                'deskripsi'        => " . var_export($w->deskripsi, true) . ",\n";
    $output .= "                'fasilitas'        => " . var_export($w->fasilitas, true) . ",\n";
    $output .= "                'thumbnail'        => " . var_export($w->thumbnail, true) . ",\n";
    $output .= "                'status_publish'   => " . ($w->status_publish ? 'true' : 'false') . ",\n";
    $output .= "                'created_at'       => " . var_export($w->created_at, true) . ",\n";
    $output .= "                'updated_at'       => " . var_export($w->updated_at, true) . ",\n";
    $output .= "            ],\n";
}

$output .= "        ];\n\n";
$output .= "        foreach (\$wisatas as \$wisata) {\n";
$output .= "            DB::table('wisatas')->updateOrInsert(\n";
$output .= "                ['slug' => \$wisata['slug']],\n";
$output .= "                \$wisata\n";
$output .= "            );\n";
$output .= "        }\n\n";
$output .= "        \$this->command->info('✓ WisataSeeder: ' . count(\$wisatas) . ' wisata berhasil disinkronisasi.');\n";
$output .= "    }\n}\n";

$seederPath = __DIR__ . '/database/seeders/WisataSeeder.php';
file_put_contents($seederPath, $output);

echo "\n✅ WisataSeeder.php berhasil diperbarui!\n";
echo "   Total wisata: " . count($wisatas) . "\n";
echo "   Lokasi: database/seeders/WisataSeeder.php\n\n";
echo "Langkah selanjutnya:\n";
echo "  git add database/seeders/WisataSeeder.php\n";
echo "  git add storage/app/public/wisata/\n";
echo "  git commit -m \"feat: update data wisata\"\n";
echo "  git push\n\n";
