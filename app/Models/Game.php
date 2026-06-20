<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $table = 'games';

    protected $fillable = [
    'nama_game',
    'kategori',
    'status',
    'thumbnail',
    'deskripsi'

    
];

public function artikels()
{
    return $this->hasMany(Artikel::class);
}
}