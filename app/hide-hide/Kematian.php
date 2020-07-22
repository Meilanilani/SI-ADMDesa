<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kematian extends Model
{
    protected $table = "detail_kematian";
    protected $fillable = [
        'nik_yg_bersangkutan','hari_kematian', 'tgl_kematian', 'tempat_kematian', 'penyebab_kematian'
    ];
    protected $primaryKey = 'id_detail_kematian';
}
