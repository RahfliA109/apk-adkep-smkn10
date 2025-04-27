<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biodata extends Model
{
    use HasFactory;

    protected $table = 'biodata';

    protected $fillable = [
        'nama', 'user_id', 'nik', 'nip', 'tempat_lahir', 'tanggal_lahir',
        'jenis_kelamin', 'agama', 'status_kawin', 'alamat_ktp',
        'no_hp', 'email', 'foto', 'scan_ktp',
    ];

    /**
     * Definisikan relasi ke model Users
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
