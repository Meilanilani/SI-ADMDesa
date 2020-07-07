<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JenisSurat extends Model
{
    protected $table = "jenis_surat";
    protected $fillable = ['nama_surat'];
    protected $primaryKey = 'id_surat';
}
