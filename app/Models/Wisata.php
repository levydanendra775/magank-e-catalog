<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wisata extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama', 'slug', 'kategori', 'kecamatan', 'alamat',
        'latitude', 'longitude', 'maps', 'harga_tiket', 'jam_operasional',
        'deskripsi', 'fasilitas', 'thumbnail', 'status_publish',
    ];

    public function galleries()
    {
        return $this->hasMany(WisataGallery::class);
    }
}