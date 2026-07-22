<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul', 'poster', 'lokasi', 'tanggal', 'jam', 'deskripsi', 'link_pendaftaran', 'status',
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];
}