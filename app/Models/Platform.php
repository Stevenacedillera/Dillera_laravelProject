<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Platform extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'manufacturer',
        'release_year',
        'description'
    ];

    /**
     * Get all games for this platform
     */
    public function games()
    {
        return $this->hasMany(Game::class);
    }
}


