<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatPenugasan extends Model
{
    use HasFactory;

    protected $table = 'riwayat_penugasan';

    protected $fillable = [
        'user_id',
        'nama_sekolah',
        'jabatan',
        'mata_pelajaran',
        'tanggal_mulai',
        'tanggal_selesai',
        'nomor_sk',
        'status_penugasan',
        'sk_penugasan',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
