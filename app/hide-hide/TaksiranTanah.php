<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaksiranTanah extends Model
{
    protected $table = "ket_taksiran_tanah";
    protected $fillable = [
        'no_sertifikat_tanah', 'luas tanah', 'pemilik_batas_utara', 'pemilik_batas_selatan', 'pemilik_batas_timur', 'pemilik_batas_barat', 'tgl_kepemilikan', 'harga_tanah', 'harga_bangunan'
    ];
    protected $primaryKey = 'id_ket_taksiran_tanah';
}
