<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Domisili extends Model
{
    protected $table = "detail_domisili";
    protected $fillable = [
        'nik_yg_bersangkutan'
    ];
    protected $primaryKey = 'id_detail_domisili';
}
