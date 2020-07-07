<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usaha extends Model
{
    protected $table = "ket_usaha";
    protected $fillable = [
        'nama_perusahaan', 'jenis_usaha', 'alamat_perusahaan'
    ];
    protected $primaryKey = 'id_ket_usaha';
}
