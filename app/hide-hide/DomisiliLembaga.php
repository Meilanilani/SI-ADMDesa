<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DomisiliLembaga extends Model
{
    protected $table = "domisili_lembaga";
    protected $fillable = [
        'nama_lembaga', 'alamat_lembaga', 'no_telp_lembaga', 'bidang_lembaga', 'jumlah_pegawai', 'jumlah_pegawai'
    ];
    protected $primaryKey = 'id_domisili_lembaga';
}
