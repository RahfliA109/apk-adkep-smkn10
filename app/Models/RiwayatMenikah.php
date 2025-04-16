<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RiwayatMenikah extends Model
{
    protected $table = 'riwayat_menikah';

    protected $fillable = [
        'user_id', 'status_perkawinan', 'tanggal_menikah_cerai',
        'nama_pasangan', 'pekerjaan_pasangan', 'jumlah_anak', 'akta_nikah'
    ];
}

