<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Users extends Authenticatable
{
    use HasFactory;

    protected $table = 'users';

    protected $fillable = ['nama', 'nip', 'password','no_handphone','email','gambar'];

    protected $hidden = ['password'];
}
