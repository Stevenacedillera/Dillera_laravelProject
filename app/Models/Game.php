<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Game extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'genre',
        'release_year',
        'developer',
        'platform_id',
        'description'
    ];

    /**
     * Get the platform that owns the game
     */
    public function platform()
    {
        return $this->belongsTo(Platform::class);
    }
}

