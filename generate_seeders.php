<?php
/**
 * generate_seeders.php
 *
 * Script untuk generate ulang WisataSeeder, EventSeeder, dan BeritaSeeder
 * dari data MySQL lokal sekaligus dalam satu perintah.
 *
 * Cara pakai:
 *   php generate_seeders.php
 */

require __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

// ─────────────────────────────────────────────
// Helper: tulis seeder ke file
// Mode SYNC PENUH: insert, update, DAN hapus data yang sudah tidak ada
// ─────────────────────────────────────────────
function writeSeeder(string $className, string $tableName, string $uniqueKey, array $rows, string $path): void
{
    // Kumpulkan semua nilai unique key untuk logika delete
    $uniqueValues = array_map(fn($r) => ((array)$r)[$uniqueKey], $rows);
    $uniqueValuesExport = var_export($uniqueValues, true);

    $output  = "<?php\n\n";
    $output .= "namespace Database\\Seeders;\n\n";
    $output .= "use Illuminate\\Database\\Seeder;\n";
    $output .= "use Illuminate\\Support\\Facades\\DB;\n\n";
    $output .= "class {$className} extends Seeder\n{\n";
    $output .= "    /**\n";
    $output .= "     * Sync PENUH data ke tabel `{$tableName}`.\n";
    $output .= "     * - Tambah data baru  ✅\n";
    $output .= "     * - Update data lama  ✅\n";
    $output .= "     * - Hapus data yang dihapus dari seeder  ✅\n";
    $output .= "     *\n";
    $output .= "     * Generate ulang file ini:\n";
    $output .= "     *   php generate_seeders.php\n";
    $output .= "     *\n";
    $output .= "     * Jalankan seeder:\n";
    $output .= "     *   php artisan db:seed --class={$className}\n";
    $output .= "     */\n";
    $output .= "    public function run(): void\n    {\n";
    $output .= "        \$data = [\n";

    foreach ($rows as $row) {
        $output .= "            [\n";
        foreach ((array)$row as $col => $val) {
            if ($col === 'id') continue;
            $output .= "                " . str_pad("'{$col}'", 22) . " => " . var_export($val, true) . ",\n";
        }
        $output .= "            ],\n";
    }

    $output .= "        ];\n\n";

    // Logika HAPUS: hapus record yang tidak ada di seeder
    $output .= "        // ── Hapus data yang sudah tidak ada di seeder ──\n";
    $output .= "        \$activeKeys = {$uniqueValuesExport};\n";
    $output .= "        \$deleted = DB::table('{$tableName}')\n";
    $output .= "            ->whereNotIn('{$uniqueKey}', \$activeKeys)\n";
    $output .= "            ->delete();\n";
    $output .= "        if (\$deleted > 0) {\n";
    $output .= "            \$this->command->warn(\"  ⚠ Dihapus {\$deleted} data lama dari `{$tableName}`.\");\n";
    $output .= "        }\n\n";

    // Logika INSERT / UPDATE
    $output .= "        // ── Tambah / update data dari seeder ──\n";
    $output .= "        foreach (\$data as \$item) {\n";
    $output .= "            DB::table('{$tableName}')->updateOrInsert(\n";
    $output .= "                ['{$uniqueKey}' => \$item['{$uniqueKey}']],\n";
    $output .= "                \$item\n";
    $output .= "            );\n";
    $output .= "        }\n\n";
    $output .= "        \$this->command->info('✓ {$className}: ' . count(\$data) . ' data aktif di database.');\n";
    $output .= "    }\n}\n";

    file_put_contents($path, $output);
}

// ─────────────────────────────────────────────
// 1. WisataSeeder
// ─────────────────────────────────────────────
$wisatas = DB::table('wisatas')->orderBy('id')->get()->toArray();
writeSeeder('WisataSeeder', 'wisatas', 'slug', $wisatas, __DIR__ . '/database/seeders/WisataSeeder.php');
echo "✅ WisataSeeder.php  — " . count($wisatas) . " data\n";

// ─────────────────────────────────────────────
// 2. EventSeeder
// ─────────────────────────────────────────────
$events = DB::table('events')->orderBy('id')->get()->toArray();
writeSeeder('EventSeeder', 'events', 'judul', $events, __DIR__ . '/database/seeders/EventSeeder.php');
echo "✅ EventSeeder.php   — " . count($events) . " data\n";

// ─────────────────────────────────────────────
// 3. BeritaSeeder
// ─────────────────────────────────────────────
$beritas = DB::table('beritas')->orderBy('id')->get()->toArray();
writeSeeder('BeritaSeeder', 'beritas', 'judul', $beritas, __DIR__ . '/database/seeders/BeritaSeeder.php');
echo "✅ BeritaSeeder.php  — " . count($beritas) . " data\n";

// ─────────────────────────────────────────────
// 4. WisataGallerySeeder
// ─────────────────────────────────────────────
$galleries = DB::table('wisata_galleries')->orderBy('id')->get()->toArray();
writeSeeder('WisataGallerySeeder', 'wisata_galleries', 'foto', $galleries, __DIR__ . '/database/seeders/WisataGallerySeeder.php');
echo "✅ WisataGallerySeeder.php — " . count($galleries) . " data\n";

echo "\n--- Langkah selanjutnya ---\n";
echo "Jalankan: sync.bat push\n\n";
