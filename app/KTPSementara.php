<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KTPSementara extends Model
{
    protected $table = "detail_ktp";
    protected $fillable = [
        'nik_yg_bersangkutan'
    ];
    protected $primaryKey = 'id_detail_ktp';
}
