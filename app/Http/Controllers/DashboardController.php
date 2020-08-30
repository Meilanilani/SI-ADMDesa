<?php

namespace App\Http\Controllers;

use App\Persuratan;
use App\Warga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class DashboardController extends Controller
{
    public function index(){
        $sktmsekolah = DB::table('persuratan') 
        ->join('warga','persuratan.id_warga','=','warga.id_warga')
        ->select('warga.no_nik', 'warga.nama_lengkap', 'persuratan.id_persuratan','persuratan.no_surat', 'persuratan.tgl_pembuatan','persuratan.status_surat' )
        ->where('no_surat', 'LIKE', '%Suket-TMS%')
        ->count();
        
        return view('admin.dashboard', compact('sktmsekolah'));
    }
}
