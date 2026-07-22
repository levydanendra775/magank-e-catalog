<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul', 'thumbnail', 'isi', 'penulis_id', 'status',
    ];

    public function penulis()
    {
        return $this->belongsTo(User::class, 'penulis_id');
    }
}