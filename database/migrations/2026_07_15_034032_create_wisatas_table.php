<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('wisatas', function (Blueprint $table) {
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
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wisatas');
    }
};
