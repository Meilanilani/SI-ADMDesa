<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kematian extends Model
{
    protected $table = "ket_kematian";
    protected $fillable = [
        'hari_kematian', 'tgl_kematian', 'tempat_kematian', 'penyebab_kematian'
    ];
    protected $primaryKey = 'id_kematian';
}
