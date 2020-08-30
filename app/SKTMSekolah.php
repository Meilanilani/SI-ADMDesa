<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SKTMSekolah extends Model
{
    protected $table = "detail_sktms";
    protected $fillable = [
        'nik_anak', 'nik_orangtua'
    ];
    protected $primaryKey = 'id_detail_sktms';
}
