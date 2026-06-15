<?php

namespace App\Models;

use App\Enums\UserRole;
use App\UserRole as AppUserRole;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'avatar_url'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'role' => AppUserRole::class,
        ];
    }

    public function reviews()
    {
        return $this->hasMany(
            Review::class
        );
    }

    public function isAdmin(): bool
    {
        return $this->role === AppUserRole::ADMIN;
    }

    public function isUser(): bool
    {
        return $this->role === AppUserRole::USER;
    }
}