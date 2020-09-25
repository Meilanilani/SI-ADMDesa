<?php

namespace App\Http\Controllers;

use App\Persuratan;
use App\Warga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function ubah_password(){
        
        return view('gantipassword');

    }

    public function update_password(Request $request){
        if ($request->password!=$request->konfirmasi){
            return redirect()->back()->withErrors('Password tidak sama');

        }

        $user = Auth::user();
        $user->password=bcrypt($request->password);
        $user->save();

        return redirect()->back()->with('success', 'Password Berhasil diubah !');
        

    }
    
    public function index(){
        

        $sktmsekolah = DB::table('persuratan') 
        ->where('no_surat', 'LIKE', '%Suket-TMS%')
        ->count();

        $sktmrs = DB::table('persuratan') 
        ->where('no_surat', 'LIKE', '%Suket-TMRS%')
        ->count();

        $kelahiran = DB::table('persuratan') 
        ->where('no_surat', 'LIKE', '%Suket-Lahir%')
        ->count();

        $kematian = DB::table('persuratan') 
        ->where('no_surat', 'LIKE', '%Suket-KMT%')
        ->count();

        $pnikah = DB::table('persuratan') 
        ->where('no_surat', 'LIKE', '%Suket-NA%')
        ->count();

        $skck = DB::table('persuratan') 
        ->where('no_surat', 'LIKE', '%Suket-SKCK%')
        ->count();

        $ktp = DB::table('persuratan') 
        ->where('no_surat', 'LIKE', '%Suket-KTP%')
        ->count();

        $usaha = DB::table('persuratan') 
        ->where('no_surat', 'LIKE', '%Suket-USAHA%')
        ->count();

        $pindah = DB::table('persuratan') 
        ->where('no_surat', 'LIKE', '%Suket-PH%')
        ->count();

        $domisili = DB::table('persuratan') 
        ->where('no_surat', 'LIKE', '%Suket-DL%')
        ->count();

        $kk = DB::table('persuratan') 
        ->where('no_surat', 'LIKE', '%Suket-KK%')
        ->count();

        
        
        if (Auth::user()->name=='admin'){
            return view('admin.dashboard', compact('sktmsekolah', 'sktmrs','kematian', 'kelahiran', 'pnikah', 'skck', 'ktp', 'usaha', 'pindah', 'domisili', 'kk'));
            }
            else{
            return view ('user.dashboard');
        }
    }
}
