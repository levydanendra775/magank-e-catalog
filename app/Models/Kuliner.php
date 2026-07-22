<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kuliner extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama', 'foto', 'alamat', 'maps', 'menu_unggulan', 'jam_buka', 'no_hp',
    ];
}