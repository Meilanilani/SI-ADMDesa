<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persuratan extends Model
{
    protected $table = "persuratan";
    protected $fillable = [
        'ket_keperluan_surat', 'foto_pengantar', 'foto_kk', 'foto_ktp','foto_suratnikah', 'foto_suratkelahiran', 'foto_suratkematianrs','foto_ijazah','foto_suratizin','foto_akta_cerai','foto_surat_pindah_sebelumnya','tgl_pembuatan', 'tgl_masa_berlaku'
    ]; 
    protected $primaryKey = 'id_persuratan';
}
