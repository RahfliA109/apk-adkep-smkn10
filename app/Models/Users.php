<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

class Users extends Authenticatable
{
    use HasFactory;

    protected $table = 'users';

    protected $fillable = ['nama', 'nip', 'password', 'no_handphone', 'email', 'gambar', 'role'];

    protected $hidden = ['password'];

    public function biodata()
    {
        return $this->hasOne(Biodata::class, 'user_id', 'id'); // Relasi satu ke satu
    }

}
