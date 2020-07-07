<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelahiran extends Model
{
    protected $table = "ket_kelahiran";
    protected $fillable = [
        'jam_lahir', 'hari_lahir', 'anak_ke'
    ];
    protected $primaryKey = 'id_ket_kelahiran';
}
