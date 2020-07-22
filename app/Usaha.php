<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usaha extends Model
{
    protected $table = "detail_usaha";
    protected $fillable = [
        'nik_pemilik_usaha','nama_usaha', 'jenis_usaha', 'alamat_perusahaan'
    ];
    protected $primaryKey = 'id_detail_usaha';
}
