<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'release_year',
        'duration',
        'rating_average'
    ];

    public function directors()
    {
        return $this->belongsToMany(
            Director::class
        );
    }

    public function genres()
    {
        return $this->belongsToMany(
            Genre::class
        );
    }

    public function actors()
    {
        return $this->belongsToMany(
            Actor::class
        );
    }

    public function reviews()
    {
        return $this->hasMany(
            Review::class
        );
    }

    public function media()
    {
        return $this->hasMany(
            Media::class
        );
    }
}
