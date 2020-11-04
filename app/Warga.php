<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;

class Warga extends Model
{
    use HasApiTokens;
    
    protected $table = "warga";
    protected $fillable = [
        'no_kk', 'no_nik', 'nama_lengkap', 'jenis_kelamin', 'tempat_lahir', 
        'tanggal_lahir', 'agama', 'pendidikan', 'pekerjaan', 'status_perkawinan', 'status_hub_keluarga',
        'nama_ayah', 'nama_ibu', 'alamat'
    ];
    protected $primaryKey = 'id_warga';

    
}

