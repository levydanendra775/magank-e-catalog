<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Umkm extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama', 'pemilik', 'no_hp', 'alamat', 'kecamatan', 'logo', 'deskripsi',
    ];

    public function produks()
    {
        return $this->hasMany(Produk::class);
    }
}