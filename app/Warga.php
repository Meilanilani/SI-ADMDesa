<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Warga extends Model
{
    protected $table = "warga";
    protected $fillable = [
        'no_kk', 'no_nik', 'nama_lengkap', 'jenis_kelamin', 'tempat_lahir', 
        'tanggal_lahir', 'agama', 'pendidikan', 'pekerjaan', 'status_perkawinan',
        'nama_ayah', 'nama_ibu', 'alamat'
    ];
    protected $primaryKey = 'id_warga';

    
}

