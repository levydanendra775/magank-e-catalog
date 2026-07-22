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
        Schema::create('events', function (Blueprint $table) {
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
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
