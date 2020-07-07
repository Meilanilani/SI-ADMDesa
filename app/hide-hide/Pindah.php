<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pindah extends Model
{
    protected $table = "ket_pindah";
    protected $fillable = [
        'alamat_tujuan', 'alasan_pindah', 'jumlah_pengikut'
    ];
    protected $primaryKey = 'id_ket_pindah';
}
