<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WisataGallery extends Model
{
    use HasFactory;

    protected $fillable = ['wisata_id', 'foto'];

    public function wisata()
    {
        return $this->belongsTo(Wisata::class);
    }
}