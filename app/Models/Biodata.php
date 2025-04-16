<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biodata extends Model
{
    use HasFactory;

    protected $table = 'biodata';

    protected $fillable = [
        'nama', 'nik', 'nuptk_nip', 'tempat_lahir', 'tanggal_lahir',
        'jenis_kelamin', 'agama', 'status_kawin', 'alamat_ktp',
        'no_hp', 'email', 'foto', 'scan_ktp',
    ];
}

