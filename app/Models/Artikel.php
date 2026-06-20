<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    protected $table = 'artikel';

    protected $fillable = [
        'game_id',
        'judul',
        'slug',
        'isi',
        'thumbnail',
        'status'
    ];

    public function game()
    {
        return $this->belongsTo(Game::class);
    }
}