<?php

$dir = __DIR__ . '/database/migrations';
$files = scandir($dir);

$schemas = [
    'create_wisatas_table' => <<<'EOD'
            $table->id();
            $table->string('nama');
            $table->string('slug')->unique();
            $table->string('kategori');
            $table->string('kecamatan');
            $table->text('alamat')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->decimal('harga_tiket', 10, 2)->default(0);
            $table->string('jam_operasional')->nullable();
            $table->longText('deskripsi')->nullable();
            $table->text('fasilitas')->nullable();
            $table->string('thumbnail')->nullable();
            $table->boolean('status_publish')->default(true);
            $table->timestamps();
EOD,

    'create_wisata_galleries_table' => <<<'EOD'
            $table->id();
            $table->foreignId('wisata_id')->constrained('wisatas')->cascadeOnDelete();
            $table->string('foto');
            $table->timestamps();
EOD,

    'create_umkms_table' => <<<'EOD'
            $table->id();
            $table->string('nama');
            $table->string('pemilik');
            $table->string('no_hp');
            $table->text('alamat');
            $table->string('kecamatan');
            $table->string('logo')->nullable();
            $table->longText('deskripsi')->nullable();
            $table->timestamps();
EOD,

    'create_produks_table' => <<<'EOD'
            $table->id();
            $table->foreignId('umkm_id')->constrained('umkms')->cascadeOnDelete();
            $table->string('nama');
            $table->string('kategori');
            $table->decimal('harga', 15, 2);
            $table->string('foto')->nullable();
            $table->text('deskripsi')->nullable();
            $table->boolean('status')->default(true);
            $table->timestamps();
EOD,

    'create_events_table' => <<<'EOD'
            $table->id();
            $table->string('judul');
            $table->string('poster')->nullable();
            $table->string('lokasi');
            $table->date('tanggal');
            $table->time('jam')->nullable();
            $table->longText('deskripsi');
            $table->string('link_pendaftaran')->nullable();
            $table->boolean('status')->default(true);
            $table->timestamps();
EOD,

    'create_kuliners_table' => <<<'EOD'
            $table->id();
            $table->string('nama');
            $table->string('foto')->nullable();
            $table->text('alamat');
            $table->text('maps')->nullable();
            $table->string('menu_unggulan')->nullable();
            $table->string('jam_buka')->nullable();
            $table->string('no_hp')->nullable();
            $table->timestamps();
EOD,

    'create_penginapans_table' => <<<'EOD'
            $table->id();
            $table->string('nama');
            $table->string('jenis');
            $table->decimal('harga_mulai', 15, 2)->nullable();
            $table->string('foto')->nullable();
            $table->text('alamat');
            $table->text('maps')->nullable();
            $table->text('fasilitas')->nullable();
            $table->string('no_hp')->nullable();
            $table->timestamps();
EOD,

    'create_beritas_table' => <<<'EOD'
            $table->id();
            $table->string('judul');
            $table->string('thumbnail')->nullable();
            $table->longText('isi');
            $table->foreignId('penulis_id')->constrained('users')->cascadeOnDelete();
            $table->boolean('status')->default(true);
            $table->timestamps();
EOD,

    'create_banners_table' => <<<'EOD'
            $table->id();
            $table->string('judul');
            $table->string('gambar');
            $table->string('link')->nullable();
            $table->integer('urutan')->default(0);
            $table->timestamps();
EOD,

    'create_galeris_table' => <<<'EOD'
            $table->id();
            $table->string('judul');
            $table->string('foto')->nullable();
            $table->string('video')->nullable();
            $table->string('kategori');
            $table->timestamps();
EOD,
];

foreach ($files as $file) {
    if (strpos($file, '.php') !== false) {
        $path = $dir . '/' . $file;
        $content = file_get_contents($path);

        foreach ($schemas as $key => $schema) {
            if (strpos($file, $key) !== false) {
                // Find $table->id(); \n $table->timestamps();
                $pattern = '/\$table->id\(\);\s*\$table->timestamps\(\);/ism';
                if (preg_match($pattern, $content)) {
                    $newContent = preg_replace($pattern, $schema, $content);
                    file_put_contents($path, $newContent);
                    echo "Updated: $file\n";
                }
            }
        }
    }
}

echo "Done!\n";
