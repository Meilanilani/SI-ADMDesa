<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SKTMRS extends Model
{
    protected $table = "detail_sktmrs";
    protected $fillable = [
        'nik_kepala_keluarga', 'nik_yg_bersangkutan'
    ];
    protected $primaryKey = 'id_detail_sktmrs';
}
