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
        'deskripsi', 'fasilitas', 'thumbnail', 'status_publish', 'is_pinned', 'pinned_at',
    ];

    protected $casts = [
        'is_pinned' => 'boolean',
        'pinned_at' => 'datetime',
    ];

    public function galleries()
    {
        return $this->hasMany(WisataGallery::class);
    }

    public function ratings()
    {
        return $this->hasMany(WisataRating::class);
    }

    public function wishlistedBy()
    {
        return $this->belongsToMany(User::class, 'wishlists')->withTimestamps();
    }
}