<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    protected $fillable = [
        'nama',
        'email',
        'password',
    ];

    public function buku()
    {
        return $this->hasMany(Buku::class);
    }

    public function isAdmin()
    {
        return $this->role === 'admin';
    }
}
