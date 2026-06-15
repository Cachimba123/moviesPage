<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;

    protected $fillable = [
        'movie_id',
        'type',
        'path',
        'url'
    ];

    public function movie()
    {
        return $this->belongsTo(
            Movie::class
        );
    }
}
