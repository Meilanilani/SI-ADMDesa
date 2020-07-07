<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Babinsa extends Model
{
    protected $table = "ket_babinsa";
    protected $fillable = [
        'nama_babinsa', 'pangkat_babinsa', 'jabatan_babinsa', 'tb_calon', 'bb_calon'
    ];
    protected $primaryKey = 'id_ket_babinsa';
}
