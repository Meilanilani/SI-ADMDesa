<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usaha extends Model
{
    protected $table = "detail_usaha";
    protected $fillable = [
        'nama_perusahaan', 'jenis_usaha', 'alamat_perusahaan'
    ];
    protected $primaryKey = 'id_detail_usaha';
}
