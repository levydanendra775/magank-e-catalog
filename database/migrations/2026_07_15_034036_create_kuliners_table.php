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
        Schema::create('kuliners', function (Blueprint $table) {
                        $table->id();
            $table->string('nama');
            $table->string('foto')->nullable();
            $table->text('alamat');
            $table->text('maps')->nullable();
            $table->string('menu_unggulan')->nullable();
            $table->string('jam_buka')->nullable();
            $table->string('no_hp')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kuliners');
    }
};
