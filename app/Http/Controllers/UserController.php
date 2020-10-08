<?php

namespace App\Http\Controllers;
use App\Persuratan;
use App\SKTMSekolah;
use App\Warga;
use App\User;
use App\Kelahiran;
use App\Kematian;
use App\Notifications\DataProses;
use App\Notifications\DomisiliCreateData;
use App\Notifications\KelahiranCreateData;
use App\Notifications\KematianCreateData;
use App\Notifications\KKCreateData;
use App\Notifications\KTPCreateData;
use App\Notifications\NACreateData;
use App\Notifications\PindahCreateData;
use App\Notifications\SKCKCreateData;
use App\Notifications\SKTMRSCreateData;
use App\Notifications\SKTMSekolahCreateData;
use App\Notifications\UsahaCreateData;
use App\Pindah;
use App\Usaha;
use DateTime;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.dashboard');
    }

    public function ubah_password_user(){
        
        return view('user.gantipassworduser');

    }

    public function update_password_user(Request $request){
        if ($request->password!=$request->konfirmasi){
            return redirect()->back()->withErrors('Password tidak sama');

        }

        $user = Auth::user();
        $user->password=bcrypt($request->password);
        $user->save();

        return redirect()->back()->with('success', 'Password Berhasil diubah !');
        

    }

    public function riwayat_pengajuan()
    {
        $sktmsekolah = DB::table('persuratan') 
        ->join('warga','persuratan.id_warga','=','warga.id_warga')
        ->select('warga.no_nik', 'warga.nama_lengkap', 'persuratan.id_persuratan','persuratan.no_surat', 'persuratan.created_at','persuratan.status_surat' )
        ->where('persuratan.id' ,'=', Auth::id())
        ->where('no_surat', 'LIKE', '%Suket-TMS%')
        ->get();

        $sktmrs = DB::table('persuratan') 
        ->join('warga','persuratan.id_warga','=','warga.id_warga')
        ->select('warga.no_nik', 'warga.nama_lengkap', 'persuratan.id_persuratan','persuratan.no_surat', 'persuratan.created_at','persuratan.status_surat' )
        ->where('persuratan.id' ,'=', Auth::id())
        ->where('no_surat', 'LIKE', '%Suket-TMRS%')
        ->get();

        $lahir = DB::table('persuratan') 
        ->join('warga','persuratan.id_warga','=','warga.id_warga')
        ->select('warga.no_nik', 'warga.nama_lengkap', 'persuratan.id_persuratan','persuratan.no_surat', 'persuratan.created_at','persuratan.status_surat' )
        ->where('persuratan.id' ,'=', Auth::id())
        ->where('no_surat', 'LIKE', '%Suket-Lahir%')
        ->get();

        $kematian = DB::table('persuratan') 
        ->join('warga','persuratan.id_warga','=','warga.id_warga')
        ->select('warga.no_nik', 'warga.nama_lengkap', 'persuratan.id_persuratan','persuratan.no_surat', 'persuratan.created_at','persuratan.status_surat' )
        ->where('persuratan.id' ,'=', Auth::id())
        ->where('no_surat', 'LIKE', '%Suket-KMT%')
        ->get();

        $pnikah = DB::table('persuratan') 
        ->join('warga','persuratan.id_warga','=','warga.id_warga')
        ->select('warga.no_nik', 'warga.nama_lengkap', 'persuratan.id_persuratan','persuratan.no_surat', 'persuratan.created_at','persuratan.status_surat' )
        ->where('persuratan.id' ,'=', Auth::id())
        ->where('no_surat', 'LIKE', '%Suket-NA%')
        ->get();

        $skck = DB::table('persuratan') 
        ->join('warga','persuratan.id_warga','=','warga.id_warga')
        ->select('warga.no_nik', 'warga.nama_lengkap', 'persuratan.id_persuratan','persuratan.no_surat', 'persuratan.created_at','persuratan.status_surat' )
        ->where('persuratan.id' ,'=', Auth::id())
        ->where('no_surat', 'LIKE', '%Suket-SKCK%')
        ->get();

        $ktp = DB::table('persuratan') 
        ->join('warga','persuratan.id_warga','=','warga.id_warga')
        ->select('warga.no_nik', 'warga.nama_lengkap', 'persuratan.id_persuratan','persuratan.no_surat', 'persuratan.created_at','persuratan.status_surat' )
        ->where('persuratan.id' ,'=', Auth::id())
        ->where('no_surat', 'LIKE', '%Suket-KTP%')
        ->get();

        $usaha = DB::table('persuratan') 
        ->join('warga','persuratan.id_warga','=','warga.id_warga')
        ->select('warga.no_nik', 'warga.nama_lengkap', 'persuratan.id_persuratan','persuratan.no_surat', 'persuratan.created_at','persuratan.status_surat' )
        ->where('persuratan.id' ,'=', Auth::id())
        ->where('no_surat', 'LIKE', '%Suket-USAHA%')
        ->get();

        $pindah = DB::table('persuratan') 
        ->join('warga','persuratan.id_warga','=','warga.id_warga')
        ->select('warga.no_nik', 'warga.nama_lengkap', 'persuratan.id_persuratan','persuratan.no_surat', 'persuratan.created_at','persuratan.status_surat' )
        ->where('persuratan.id' ,'=', Auth::id())
        ->where('no_surat', 'LIKE', '%Suket-PH%')
        ->get();

        $domisili = DB::table('persuratan') 
        ->join('warga','persuratan.id_warga','=','warga.id_warga')
        ->select('warga.no_nik', 'warga.nama_lengkap', 'persuratan.id_persuratan','persuratan.no_surat', 'persuratan.created_at','persuratan.status_surat' )
        ->where('persuratan.id' ,'=', Auth::id())
        ->where('no_surat', 'LIKE', '%Suket-DL%')
        ->get();

        $kk = DB::table('persuratan') 
        ->join('warga','persuratan.id_warga','=','warga.id_warga')
        ->select('warga.no_nik', 'warga.nama_lengkap', 'persuratan.id_persuratan','persuratan.no_surat', 'persuratan.created_at','persuratan.status_surat' )
        ->where('persuratan.id' ,'=', Auth::id())
        ->where('no_surat', 'LIKE', '%Suket-KK%')
        ->get();


        return view('user.riwayat_pengajuan',compact('sktmsekolah', 'sktmrs', 'lahir', 'kematian', 'pnikah', 'skck', 'ktp', 'usaha', 'pindah', 'domisili', 'kk'));
    }

    public function create_sktmsekolah()
    {
           
        $surat = Persuratan::all();
        $surat = Warga::all();
        $status_surat = 'Proses';
        $surat = $this->autonumber_sktmsekolah();
        return view('user.suket-pengajuan.create_sktmsekolah',['surat'=>$surat],['status_surat'=>$status_surat]);
    }

    public function autonumber_sktmsekolah(){
        $bln = array(1 => "I", "II", "III", "IV", "V", "VI", "VII", "VIII", "IX", "X", "XI", "XII");
        $query = DB::table('persuratan')
        ->select(DB::raw('MAX(LEFT(no_surat,3)) as no_max'))
        ->where('no_surat', 'LIKE', '%Suket-TMS%')->get();
        if ($query->count()>0) {
            foreach ($query as $key ) {
            $tmp = ((int)$key->no_max)+1;
            $kd = sprintf("%03s", $tmp);
            }
           }else {
            $kd = "001";
           }
           $kd_surat = $kd."/Suket-TMS/".$bln[date('n')].date('/yy');
           return $kd_surat;
          }

    public function ajax_select_sktmsekolah(Request $request){
        $no_nik = $request->no_nik;
       
        $sktmsekolah = Warga::where('no_nik','=',$no_nik)->first();
        if(isset($sktmsekolah)){
            $data = array(
            'id_warga' => $sktmsekolah['id_warga'],
            'nama_lengkap' =>  $sktmsekolah['nama_lengkap'],
            'tempat_lahir' =>  $sktmsekolah['tempat_lahir'],
            'tanggal_lahir' =>  $sktmsekolah['tanggal_lahir'],
            'agama' =>  $sktmsekolah['agama'],
            'pekerjaan' =>  $sktmsekolah['pekerjaan'],
            'alamat' =>  $sktmsekolah['alamat'],);}
            else{
                $data = null;
            }
            return json_encode($data);
    }
    
    public function store_sktmsekolah(Request $request)
    {
        $message =[
            'required' => 'Isi tidak boleh kosong',
            'min' => 'Isi minimal harus 16 Karakter',
            'max' => 'Isi maximal harus 16 Karakter'
        ];

        $this->validate($request,[
            'nik_anak' => ['required', 'string', 'min:16', 'max:16'],
            'nik_pemohon' => ['required', 'string', 'min:16', 'max:16'],
            'foto_pengantar' => ['required'],
            'foto_kk' => ['required'],
            'foto_ktp' => ['required'],

        ], $message);  

        $data['no_surat'] = $request->no_surat;
        $data['status_surat'] = $request->status_surat;
        $data['id_warga'] = $request->id_warga;
        $data['id']= Auth::id();
        $data_detail['nik_anak'] = $request->nik_anak;
        $data_detail['nik_pemohon'] = $request->nik_pemohon;
        

        $image1 = $request->file('foto_pengantar');
        $image2 = $request->file('foto_kk');
        $image3 = $request->file('foto_ktp');
        if($image1 != null){
            $image_name = $image1->getClientOriginalName();
            $image_full_name = date('d-M-Yh-i-s').rand(10,100)."".$image_name;
            
            $upload_path = 'public/media/';
            $image_url = $upload_path.$image_full_name;
            $succes = $image1->move($upload_path, $image_full_name);
            $data['foto_pengantar'] = $image_url;
        } 
        if($image2 != null){
            $image_name = $image2->getClientOriginalName();
            $image_full_name = date('d-M-Yh-i-s').rand(10,100)."".$image_name;
            
            $upload_path = 'public/media/';
            $image_url = $upload_path.$image_full_name;
            $succes = $image2->move($upload_path, $image_full_name);
            $data['foto_kk'] = $image_url;
        } 
        if($image3 != null){
            $image_name = $image3->getClientOriginalName();
            $image_full_name = date('d-M-Yh-i-s').rand(10,100)."".$image_name;
            
            $upload_path = 'public/media/';
            $image_url = $upload_path.$image_full_name;
            $succes = $image3->move($upload_path, $image_full_name);
            $data['foto_ktp'] = $image_url;
        } 

        $sktmsekolah = DB::table('persuratan')->insertGetId($data);
        $data_detail['id_persuratan'] = $sktmsekolah;
        $sktmsekolah = DB::table('detail_sktms')->insertGetId($data_detail);
    
            
         //Notifikasi Create Data ke Admin
         $data_user = User::where('name','admin')
         ->first();
 
         $data_user->notify(new SKTMSekolahCreateData());

        return redirect()->route('pengajuan.riwayat_pengajuan')
                             ->with('success', 'Pengajuan SKTM Sekolah berhasil di proses!');
    }


    public function create_sktmrs()
    {
        $surat = Persuratan::all();
        $surat = Warga::all();
        $surat = $this->autonumber_sktmrs();
        $status_surat = 'Proses';
        return view('user.suket-pengajuan.create_sktmrs', ['surat'=>$surat],['status_surat'=>$status_surat]);
    }

    public function autonumber_sktmrs(){
        $bln = array(1 => "I", "II", "III", "IV", "V", "VI", "VII", "VIII", "IX", "X", "XI", "XII");
        $query = DB::table('persuratan')
        ->select(DB::raw('MAX(LEFT(no_surat,3)) as no_max'))
        ->where('no_surat', 'LIKE', '%Suket-TMRS%')->get();
        if ($query->count()>0) {
            foreach ($query as $key ) {
            $tmp = ((int)$key->no_max)+1;
            $kd = sprintf("%03s", $tmp);
            }
           }else {
            $kd = "001";
           }
           $kd_surat = $kd."/Suket-TMRS/".$bln[date('n')].date('/yy');
           return $kd_surat;
          }

    public function ajax_select_sktmrs(Request $request){
        $no_nik = $request->no_nik;
       
        $sktmrs = Warga::where('no_nik','=',$no_nik)->first();
        if(isset($sktmsekolah)){
            $data = array(
            'id_warga' => $sktmrs['id_warga'],
            'nama_lengkap' =>  $sktmrs['nama_lengkap'],
            'tempat_lahir' =>  $sktmrs['tempat_lahir'],
            'tanggal_lahir' =>  $sktmrs['tanggal_lahir'],
            'agama' =>  $sktmrs['agama'],
            'pekerjaan' =>  $sktmrs['pekerjaan'],
            'alamat' =>  $sktmrs['alamat'],);
        }
        else{
            $data = null;
        }
        return json_encode($data);
    }

    public function store_sktmrs(Request $request)
    {
        $message =[
            'required' => 'Isi tidak boleh kosong',
            'min' => 'Isi minimal harus 16 Karakter',
            'max' => 'Isi maximal harus 16 Karakter'
        ];

        $this->validate($request,[
            'nik_yg_bersangkutan' => ['required', 'string', 'min:16', 'max:16'],
            'nik_pemohon' => ['required', 'string', 'min:16', 'max:16'],
            'foto_pengantar' => ['required'],
            'foto_kk' => ['required'],
            'foto_ktp' => ['required'],
        ], $message);  

        $data['no_surat'] = $request->no_surat; 
        $data['status_surat'] = $request->status_surat;
        $data['id_warga'] = $request->id_warga;
        $data['id']= Auth::id();
        $data_detail['nik_pemohon'] = $request->nik_pemohon;
        $data_detail['nik_yg_bersangkutan'] = $request->nik_yg_bersangkutan;

        $image1 = $request->file('foto_pengantar');
        $image2 = $request->file('foto_kk');
        $image3 = $request->file('foto_ktp');
        if($image1 != null){
            $image_name = $image1->getClientOriginalName();
            $image_full_name = date('d-M-Yh-i-s').rand(10,100)."".$image_name;
            
            $upload_path = 'public/media/';
            $image_url = $upload_path.$image_full_name;
            $succes = $image1->move($upload_path, $image_full_name);
            $data['foto_pengantar'] = $image_url;
        } 
        if($image2 != null){
            $image_name = $image2->getClientOriginalName();
            $image_full_name = date('d-M-Yh-i-s').rand(10,100)."".$image_name;
            
            $upload_path = 'public/media/';
            $image_url = $upload_path.$image_full_name;
            $succes = $image2->move($upload_path, $image_full_name);
            $data['foto_kk'] = $image_url;
        } 
        if($image3 != null){
            $image_name = $image3->getClientOriginalName();
            $image_full_name = date('d-M-Yh-i-s').rand(10,100)."".$image_name;
            
            $upload_path = 'public/media/';
            $image_url = $upload_path.$image_full_name;
            $succes = $image3->move($upload_path, $image_full_name);
            $data['foto_ktp'] = $image_url;
        } 
        
            $sktmrs = DB::table('persuratan')->insertGetId($data);
            $data_detail['id_persuratan'] = $sktmrs;
            $sktmrs = DB::table('detail_sktmrs')->insertGetId($data_detail);
            
            
        //Notifikasi
         $data_admin = User::where('name','admin')
         ->first();
 
        $data_admin->notify(new SKTMRSCreateData());

        return redirect()->route('pengajuan.riwayat_pengajuan')
                             ->with('success', 'Pengajuan SKTM RS berhasil di proses!');
    }

    public function create_kelahiran()
    {
        $surat = Kelahiran::all();
        $surat = Persuratan::all();
        $surat = Warga::all();
        $surat = $this->autonumber_kelahiran();
        $status_surat = 'Proses';
        return view('user.suket-pengajuan.create_kelahiran',['surat'=>$surat],['status_surat'=>$status_surat]);
    }

    public function autonumber_kelahiran(){
        $bln = array(1 => "I", "II", "III", "IV", "V", "VI", "VII", "VIII", "IX", "X", "XI", "XII");
        $query = DB::table('persuratan')
        ->select(DB::raw('MAX(LEFT(no_surat,3)) as no_max'))
        ->where('no_surat', 'LIKE', '%Suket-Lahir%')->get();
        if ($query->count()>0) {
            foreach ($query as $key ) {
            $tmp = ((int)$key->no_max)+1;
            $kd = sprintf("%03s", $tmp);
            }
           }else {
            $kd = "001";
           }
           $kd_surat = $kd."/Suket-Lahir/".$bln[date('n')].date('/yy');
           return $kd_surat;
          }

          public function ajax_select_kelahiran(Request $request){
            $no_nik = $request->no_nik;
           
            $lahir = Warga::where('no_nik','=',$no_nik)->first();
            if(isset($lahir)){
                $data = array(
                'id_warga' => $lahir['id_warga'],
                'nama_lengkap' =>  $lahir['nama_lengkap'],
                'tempat_lahir' =>  $lahir['tempat_lahir'],
                'tanggal_lahir' =>  $lahir['tanggal_lahir'],
                'alamat' =>  $lahir['alamat'],);
                }else{
                    $data = null;
                }
                return json_encode($data);
        }


        
    public function store_kelahiran(Request $request)
    {
        
        $message =[
            'required' => 'Isi tidak boleh kosong',
            'min' => 'Isi minimal harus 16 Karakter',
            'max' => 'Isi maximal harus 16 Karakter',
            'numeric' => 'Isi harus angka'
        ];

        $this->validate($request,[
            'nama_anak' => ['required'],
            'tempat_lahir_anak' => ['required'],
            'jam_lahir' => ['required'],
            'anak_ke' => ['required', 'numeric'],
            'nik_pemohon' => ['required','min:16', 'max:16'],
            'nik_ibu' => ['required','min:16', 'max:16'],
            'jenis_kelamin' => ['required'],
            'tanggal_lahir_anak' => ['required'],
            'foto_pengantar' => ['required'],
            'foto_kk' => ['required'],
            'foto_ktp' => ['required'],
            'foto_suratnikah' => ['required'],
            'foto_suratkelahiran' => ['required'],
            
        ], $message);  

        $data['no_surat'] = $request->no_surat;
        $data['status_surat'] = $request->status_surat;
        $data['id']= Auth::id();
        $data['id_warga'] = $request->id_warga;
        $data_detail['nama_anak'] = $request->nama_anak;
        $data_detail['tempat_lahir_anak'] = $request->tempat_lahir_anak;
        $data_detail['tanggal_lahir_anak'] = $request->tanggal_lahir_anak;
        $data_detail['jenis_kelamin'] = $request->jenis_kelamin;
        $data_detail['jam_lahir'] = $request->jam_lahir;
        $data_detail['anak_ke'] = $request->anak_ke;
        $data_detail['nik_pemohon'] = $request->nik_pemohon;
        $data_detail['nik_ibu'] = $request->nik_ibu;
        $image1 = $request->file('foto_pengantar');
        $image2 = $request->file('foto_kk');
        $image3 = $request->file('foto_ktp');
        $image4 = $request->file('foto_suratnikah');
        $image5 = $request->file('foto_suratkelahiran');
        if($image1 != null){
            $image_name = $image1->getClientOriginalName();
            $image_full_name = date('d-M-Yh-i-s').rand(10,100)."".$image_name;
            
            $upload_path = 'public/media/';
            $image_url = $upload_path.$image_full_name;
            $succes = $image1->move($upload_path, $image_full_name);
            $data['foto_pengantar'] = $image_url;
        } 
        if($image2 != null){
            $image_name = $image2->getClientOriginalName();
            $image_full_name = date('d-M-Yh-i-s').rand(10,100)."".$image_name;
            
            $upload_path = 'public/media/';
            $image_url = $upload_path.$image_full_name;
            $succes = $image2->move($upload_path, $image_full_name);
            $data['foto_kk'] = $image_url;
        } 
        if($image3 != null){
            $image_name = $image3->getClientOriginalName();
            $image_full_name = date('d-M-Yh-i-s').rand(10,100)."".$image_name;
            
            $upload_path = 'public/media/';
            $image_url = $upload_path.$image_full_name;
            $succes = $image3->move($upload_path, $image_full_name);
            $data['foto_ktp'] = $image_url;
        } 
        if($image4 != null){
            $image_name = $image4->getClientOriginalName();
            $image_full_name = date('d-M-Yh-i-s').rand(10,100)."".$image_name;
            
            $upload_path = 'public/media/';
            $image_url = $upload_path.$image_full_name;
            $succes = $image4->move($upload_path, $image_full_name);
            $data['foto_suratnikah'] = $image_url;
        } 
        if($image5 != null){
            $image_name = $image5->getClientOriginalName();
            $image_full_name = date('d-M-Yh-i-s').rand(10,100)."".$image_name;
            
            $upload_path = 'public/media/';
            $image_url = $upload_path.$image_full_name;
            $succes = $image5->move($upload_path, $image_full_name);
            $data['foto_suratkelahiran'] = $image_url;
        } 
            $lahir = DB::table('persuratan')->insertGetId($data);
            $data_detail['id_persuratan'] = $lahir;
            $lahir = DB::table('detail_kelahiran')->insertGetId($data_detail);

             //Notifikasi Create Data ke Admin
         $data_user = User::where('name','admin')
         ->first();
 
         $data_user->notify(new KelahiranCreateData());

            return redirect()->route('pengajuan.riwayat_pengajuan')
                             ->with('success', 'Pengajuan Surat Kelahiran berhasil di kirim!');
        }

        public function autonumber_kematian()
        {
            $bln = array(1 => "I", "II", "III", "IV", "V", "VI", "VII", "VIII", "IX", "X", "XI", "XII");
            $query = DB::table('persuratan')
                ->select(DB::raw('MAX(LEFT(no_surat,3)) as no_max'))
                ->where('no_surat', 'LIKE', '%Suket-KMT%')->get();
            if ($query->count() > 0) {
                foreach ($query as $key) {
                    $tmp = ((int)$key->no_max) + 1;
                    $kd = sprintf("%03s", $tmp);
                }
            } else {
                $kd = "001";
            }
            $kd_surat = $kd . "/Suket-KMT/" . $bln[date('n')] . date('/yy');
            return $kd_surat;
        }
    
        public function ajax_select_kematian(Request $request)
        {
            $no_nik = $request->no_nik;
    
            $kematian = Warga::where('no_nik', '=', $no_nik)->first();
            if (isset($kematian)) {
                $data = array(
                    'id_warga' => $kematian['id_warga'],
                    'nama_lengkap' =>  $kematian['nama_lengkap'],
                    'tempat_lahir' =>  $kematian['tempat_lahir'],
                    'tanggal_lahir' =>  $kematian['tanggal_lahir'],
                    'status_perkawinan' =>  $kematian['status_perkawinan'],
                    'agama' =>  $kematian['agama'],
                    'pekerjaan' =>  $kematian['pekerjaan'],
                    'alamat' =>  $kematian['alamat'],
                );
            } else {
                $data = null;
            }
            return json_encode($data);
        }
    
        public function create_kematian()
        {
            $kematian = Kematian::all();
            $kematian = Warga::all();
            $status_surat = 'Proses';
            $surat = $this->autonumber_kematian();
            return view('user.suket-pengajuan.create_kematian', ['surat' => $surat], ['status_surat' => $status_surat]);
        }
    
        public function store_kematian(Request $request)
        {
            $message = [
                'required' => 'Isi tidak boleh kosong',
                'min' => 'Isi minimal harus 16 Karakter',
                'max' => 'Isi maximal harus 16 Karakter',
            ];
    
            $this->validate($request, [
                'nik_pemohon' => ['required', 'max:16', 'min:16'],
                'nik_yg_bersangkutan' => ['required', 'max:16', 'min:16'],
                'tgl_kematian' => ['required'],
                'tempat_kematian' => ['required'],
                'penyebab_kematian' => ['required'],
                'foto_pengantar' => ['required'],
                'foto_kk' => ['required'],
                'foto_ktp' => ['required'],
    
            ], $message);
    
            $data['no_surat'] = $request->no_surat;
            $data['status_surat'] = $request->status_surat;
            $data['id_warga'] = $request->id_warga;
            $data['id'] = Auth::id();
            $data2['nik_pemohon'] = $request->nik_pemohon;
            $data2['nik_yg_bersangkutan'] = $request->nik_yg_bersangkutan;
            $data2['tgl_kematian'] = $request->tgl_kematian;
            $data2['tempat_kematian'] = $request->tempat_kematian;
            $data2['penyebab_kematian'] = $request->penyebab_kematian;
    
            $image1 = $request->file('foto_pengantar');
            $image2 = $request->file('foto_kk');
            $image3 = $request->file('foto_ktp');
            $image4 = $request->file('foto_suratkematianrs');
            if ($image1 != null) {
                $image_name = $image1->getClientOriginalName();
                $image_full_name = date('d-M-Yh-i-s') . rand(10, 100) . "" . $image_name;
    
                $upload_path = 'public/media/';
                $image_url = $upload_path . $image_full_name;
                $succes = $image1->move($upload_path, $image_full_name);
                $data['foto_pengantar'] = $image_url;
            }
            if ($image2 != null) {
                $image_name = $image2->getClientOriginalName();
                $image_full_name = date('d-M-Yh-i-s') . rand(10, 100) . "" . $image_name;
    
                $upload_path = 'public/media/';
                $image_url = $upload_path . $image_full_name;
                $succes = $image2->move($upload_path, $image_full_name);
                $data['foto_kk'] = $image_url;
            }
            if ($image3 != null) {
                $image_name = $image3->getClientOriginalName();
                $image_full_name = date('d-M-Yh-i-s') . rand(10, 100) . "" . $image_name;
    
                $upload_path = 'public/media/';
                $image_url = $upload_path . $image_full_name;
                $succes = $image3->move($upload_path, $image_full_name);
                $data['foto_ktp'] = $image_url;
            }
            if ($image4 != null) {
                $image_name = $image4->getClientOriginalName();
                $image_full_name = date('d-M-Yh-i-s') . rand(10, 100) . "" . $image_name;
    
                $upload_path = 'public/media/';
                $image_url = $upload_path . $image_full_name;
                $succes = $image4->move($upload_path, $image_full_name);
                $data['foto_suratkematianrs'] = $image_url;
            }
            $kematian = DB::table('persuratan')->insertGetId($data);
            $data2['id_persuratan'] = $kematian;
            $kematian = DB::table('detail_kematian')->insertGetId($data2);
            
            //Notifikasi Create Data ke Admin
         $data_user = User::where('name','admin')
         ->first();
 
         $data_user->notify(new KematianCreateData());

            return redirect()->route('pengajuan.riwayat_pengajuan')
                             ->with('success', 'Pengajuan Surat Kematian berhasil di kirim!');
        }

        public function create_pengantarnikah()
        {
            $surat = Persuratan::all();
            $surat = Warga::all();
            $status_surat = 'Proses';
            $surat = $this->autonumber_pengantarnikah();
            return view('user.suket-pengajuan.create_pengantarnikah', ['surat'=>$surat],['status_surat'=>$status_surat]);
        }
    
    
        public function autonumber_pengantarnikah(){
            $bln = array(1 => "I", "II", "III", "IV", "V", "VI", "VII", "VIII", "IX", "X", "XI", "XII");
            $query = DB::table('persuratan')
            ->select(DB::raw('MAX(LEFT(no_surat,3)) as no_max'))
            ->where('no_surat', 'LIKE', '%Suket-NA%')->get();
            if ($query->count()>0) {
                foreach ($query as $key ) {
                $tmp = ((int)$key->no_max)+1;
                $kd = sprintf("%03s", $tmp);
                }
               }else {
                $kd = "001";
               }
               $kd_surat = $kd."/Suket-NA/".$bln[date('n')].date('/yy');
               return $kd_surat;
              }
    
        public function ajax_select_pengantarnikah(Request $request){
            $no_nik = $request->no_nik;
           
            $pnikah = Warga::where('no_nik','=',$no_nik)->first();
            if(isset($pnikah)){
                $data = array(
                'id_warga' => $pnikah['id_warga'],
                'nama_lengkap' =>  $pnikah['nama_lengkap'],
                'tempat_lahir' =>  $pnikah['tempat_lahir'],
                'tanggal_lahir' =>  $pnikah['tanggal_lahir'],
                'agama' =>  $pnikah['agama'],
                'pekerjaan' =>  $pnikah['pekerjaan'],
                'alamat' =>  $pnikah['alamat'],
                'status_perkawinan' => $pnikah['status_perkawinan'],);
            }
            else{
                $data = null;
            }
            return json_encode($data);
        }
    
        
        public function store_pengantarnikah(Request $request)
        {
            $message =[
                'required' => 'Isi tidak boleh kosong',
                'min' => 'Isi minimal harus 16 Karakter',
                'max' => 'Isi maximal harus 16 Karakter'
            ];
    
            $this->validate($request,[
                'nik_anak' => ['required', 'string', 'min:16', 'max:16'],
                'nik_pemohon' => ['required', 'string', 'min:16', 'max:16'],
                'nik_ibu' => ['required', 'string', 'min:16', 'max:16'],
                'foto_pengantar' =>  ['required'],
                'foto_kk' =>  ['required'],
                'foto_ktp' => ['required'],
                'foto_ijazah' => ['required']
    
            ], $message);  
    
            $data['no_surat'] = $request->no_surat;
            $data['id_warga'] = $request->id_warga;
            $data['status_surat'] = $request->status_surat;
            $data['id']= Auth::id();
            $data_detail['nik_pemohon'] = $request->nik_pemohon;
            $data_detail['nik_anak'] = $request->nik_anak;
            $data_detail['nik_ibu'] = $request->nik_ibu;
    
            $image1 = $request->file('foto_pengantar');
            $image2 = $request->file('foto_kk');
            $image3 = $request->file('foto_ktp');
            $image4 = $request->file('foto_ijazah');
            if($image1 != null){
                $image_name = $image1->getClientOriginalName();
                $image_full_name = date('d-M-Yh-i-s').rand(10,100)."".$image_name;
                
                $upload_path = 'public/media/';
                $image_url = $upload_path.$image_full_name;
                $succes = $image1->move($upload_path, $image_full_name);
                $data['foto_pengantar'] = $image_url;
            } 
            if($image2 != null){
                $image_name = $image2->getClientOriginalName();
                $image_full_name = date('d-M-Yh-i-s').rand(10,100)."".$image_name;
                
                $upload_path = 'public/media/';
                $image_url = $upload_path.$image_full_name;
                $succes = $image2->move($upload_path, $image_full_name);
                $data['foto_kk'] = $image_url;
            } 
            if($image3 != null){
                $image_name = $image3->getClientOriginalName();
                $image_full_name = date('d-M-Yh-i-s').rand(10,100)."".$image_name;
                
                $upload_path = 'public/media/';
                $image_url = $upload_path.$image_full_name;
                $succes = $image3->move($upload_path, $image_full_name);
                $data['foto_ktp'] = $image_url;
            } 
            if($image4 != null){
                $image_name = $image4->getClientOriginalName();
                $image_full_name = date('d-M-Yh-i-s').rand(10,100)."".$image_name;
                
                $upload_path = 'public/media/';
                $image_url = $upload_path.$image_full_name;
                $succes = $image4->move($upload_path, $image_full_name);
                $data['foto_ijazah'] = $image_url;
            } 
            
                $pnikah = DB::table('persuratan')->insertGetId($data);
                $data_detail['id_persuratan'] = $pnikah;
                $pnikah = DB::table('detail_na')->insertGetId($data_detail);

                 //Notifikasi Create Data ke Admin
         $data_user = User::where('name','admin')
         ->first();
 
         $data_user->notify(new NACreateData());
         

                return redirect()->route('pengajuan.riwayat_pengajuan')
                             ->with('success', 'Pengajuan Surat Pengantar Nikah berhasil di kirim!');
        
        }

    public function autonumber_skck(){
        $bln = array(1 => "I", "II", "III", "IV", "V", "VI", "VII", "VIII", "IX", "X", "XI", "XII");
        $query = DB::table('persuratan')
        ->select(DB::raw('MAX(LEFT(no_surat,3)) as no_max'))
        ->where('no_surat', 'LIKE', '%Suket-SKCK%')->get();
        if ($query->count()>0) {
            foreach ($query as $key ) {
            $tmp = ((int)$key->no_max)+1;
            $kd = sprintf("%03s", $tmp);
            }
           }else {
            $kd = "001";
           }
           $kd_surat = $kd."/Suket-SKCK/".$bln[date('n')].date('/yy');
           return $kd_surat;
          }

          public function ajax_select_skck(Request $request){
            $no_nik = $request->no_nik;
           
            $skck = Warga::where('no_nik','=',$no_nik)->first();
            if(isset($skck)){
                $data = array(
                'id_warga' => $skck['id_warga'],
                'nama_lengkap' =>  $skck['nama_lengkap'],
                'tempat_lahir' =>  $skck['tempat_lahir'],
                'tanggal_lahir' =>  $skck['tanggal_lahir'],
                'status_perkawinan' =>$skck['status_perkawinan'],
                'agama' =>  $skck['agama'],
                'pekerjaan' =>  $skck['pekerjaan'],
                'alamat' =>  $skck['alamat'],);
            }
            else{
                $data = null;
            }
            return json_encode($data);
        }

    public function create_skck()
    {
        $surat = Persuratan::all();
        $surat = Warga::all();

        $date = new DateTime('now');
        $date->modify('+3 month');
        $date = $date->format('Y-m-d');

        

        $status_surat = 'Proses';
        $surat = $this->autonumber_skck();
        return view('user.suket-pengajuan.create_skck', ['surat'=>$surat, 'status_surat'=>$status_surat,'date'=>$date]);
    }

    public function store_skck(Request $request)
    {
        $message =[
            'required' => 'Isi tidak boleh kosong',
            'min' => 'Isi minimal harus 16 Karakter',
            'max' => 'Isi maximal harus 16 Karakter'
        ];

        $this->validate($request,[
            'nik_pemohon' => ['required', 'string', 'min:16', 'max:16'],
            'nik_yg_bersangkutan' => ['required', 'string', 'min:16', 'max:16'],
            'foto_pengantar' => ['required'],
            'foto_kk' => ['required'],
            'foto_ktp' => ['required'],

        ], $message);

        $data['no_surat'] = $request->no_surat;
        $data['ket_keperluan_surat'] = $request->ket_keperluan_surat;
        $data['tgl_masa_berlaku'] = $request->tgl_masa_berlaku;
        $data['status_surat'] = $request->status_surat;
        $data['id']= Auth::id();
        $data['id_warga'] = $request->id_warga;
        $data_detail['nik_pemohon'] = $request->nik_pemohon;
        $data_detail['nik_yg_bersangkutan'] = $request->nik_yg_bersangkutan;

        $image1 = $request->file('foto_pengantar');
        $image2 = $request->file('foto_kk');
        $image3 = $request->file('foto_ktp');
        if($image1 != null){
            $image_name = $image1->getClientOriginalName();
            $image_full_name = date('d-M-Yh-i-s').rand(10,100)."".$image_name;
            
            $upload_path = 'public/media/';
            $image_url = $upload_path.$image_full_name;
            $succes = $image1->move($upload_path, $image_full_name);
            $data['foto_pengantar'] = $image_url;
        } 
        if($image2 != null){
            $image_name = $image2->getClientOriginalName();
            $image_full_name = date('d-M-Yh-i-s').rand(10,100)."".$image_name;
            
            $upload_path = 'public/media/';
            $image_url = $upload_path.$image_full_name;
            $succes = $image2->move($upload_path, $image_full_name);
            $data['foto_kk'] = $image_url;
        } 
        if($image3 != null){
            $image_name = $image3->getClientOriginalName();
            $image_full_name = date('d-M-Yh-i-s').rand(10,100)."".$image_name;
            
            $upload_path = 'public/media/';
            $image_url = $upload_path.$image_full_name;
            $succes = $image3->move($upload_path, $image_full_name);
            $data['foto_ktp'] = $image_url;
        } 
        
            $skck = DB::table('persuratan')->insertGetId($data);
            $data_detail['id_persuratan'] = $skck;
            $skck = DB::table('detail_skck')->insertGetId($data_detail);

                   //Notifikasi Create Data ke Admin
         $data_user = User::where('name','admin')
         ->first();
 
         $data_user->notify(new SKCKCreateData());
         

            return redirect()->route('pengajuan.riwayat_pengajuan')
            ->with('success', 'Pengajuan Surat Pengantar SKCK  di kirim!');
    
    }

    public function autonumber_ktp(){
        $bln = array(1 => "I", "II", "III", "IV", "V", "VI", "VII", "VIII", "IX", "X", "XI", "XII");
        $query = DB::table('persuratan')
        ->select(DB::raw('MAX(LEFT(no_surat,3)) as no_max'))
        ->where('no_surat', 'LIKE', '%Suket-KTP%')->get();
        if ($query->count()>0) {
            foreach ($query as $key ) {
            $tmp = ((int)$key->no_max)+1;
            $kd = sprintf("%03s", $tmp);
            }
           }else {
            $kd = "001";
           }
           $kd_surat = $kd."/Suket-KTP/".$bln[date('n')].date('/yy');
           return $kd_surat;
          }

          public function ajax_select_ktp(Request $request){
            $no_nik = $request->no_nik;
           
            $ktp = Warga::where('no_nik','=',$no_nik)->first();
            if(isset($ktp)){
                $data = array(
                'id_warga' => $ktp['id_warga'],
                'nama_lengkap' =>  $ktp['nama_lengkap'],
                'tempat_lahir' =>  $ktp['tempat_lahir'],
                'tanggal_lahir' =>  $ktp['tanggal_lahir'],
                'status_perkawinan' => $ktp['status_perkawinan'],
                'agama' =>  $ktp['agama'],
                'pekerjaan' =>  $ktp['pekerjaan'],
                'alamat' =>  $ktp['alamat'],);
            }
            else{
                $data = null;
            }
            return json_encode($data);
        }

    public function create_ktp()
    {
        $ktp = Persuratan::all();
        $ktp = Warga::all();
        
        $date = new DateTime('now');
        $date->modify('+3 month');
        $date = $date->format('Y-m-d');

        $surat = $this->autonumber_ktp();
        $status_surat = 'Proses';
        return view('user.suket-pengajuan.create_ktp', ['surat'=>$surat, 'status_surat'=>$status_surat, 'date'=>$date]);
    }

    
    public function store_ktp(Request $request)
    {
        $message =[
            'required' => 'Isi tidak boleh kosong',
            'min' => 'Isi minimal harus 16 Karakter',
            'max' => 'Isi maximal harus 16 Karakter',
        ];

        $this->validate($request,[
            'nik_pemohon' => ['required', 'string', 'min:16', 'max:16'],
            'nik_yg_bersangkutan' => ['required', 'string', 'min:16', 'max:16'],
            'foto_pengantar' => ['required'],
            'foto_kk' => ['required']
        ], $message);

        $data['no_surat'] = $request->no_surat;
        $data['tgl_masa_berlaku'] = $request->tgl_masa_berlaku;
        $data['status_surat'] = $request->status_surat;
        $data['id_warga'] = $request->id_warga;
        $data['id']= Auth::id();
        $data_detail['nik_pemohon'] = $request->nik_pemohon;
        $data_detail['nik_yg_bersangkutan'] = $request->nik_yg_bersangkutan;

        $image1 = $request->file('foto_pengantar');
        $image2 = $request->file('foto_kk');
        if($image1 != null){
            $image_name = $image1->getClientOriginalName();
            $image_full_name = date('d-M-Yh-i-s').rand(10,100)."".$image_name;
            
            $upload_path = 'public/media/';
            $image_url = $upload_path.$image_full_name;
            $succes = $image1->move($upload_path, $image_full_name);
            $data['foto_pengantar'] = $image_url;
        } 
        if($image2 != null){
            $image_name = $image2->getClientOriginalName();
            $image_full_name = date('d-M-Yh-i-s').rand(10,100)."".$image_name;
            
            $upload_path = 'public/media/';
            $image_url = $upload_path.$image_full_name;
            $succes = $image2->move($upload_path, $image_full_name);
            $data['foto_kk'] = $image_url;
        } 
        
            $ktp = DB::table('persuratan')->insertGetId($data);
            $data_detail['id_persuratan'] = $ktp;
            $ktp = DB::table('detail_ktp')->insertGetId($data_detail);

                //Notifikasi Create Data ke Admin
         $data_user = User::where('name','admin')
         ->first();
 
         $data_user->notify(new KTPCreateData());
         

            return redirect()->route('pengajuan.riwayat_pengajuan')
                             ->with('success', 'Pengajuan Surat KTP Sementara berhasil di kirim!');
    
    }

    public function autonumber_usaha(){
        $bln = array(1 => "I", "II", "III", "IV", "V", "VI", "VII", "VIII", "IX", "X", "XI", "XII");
        $query = DB::table('persuratan')
        ->select(DB::raw('MAX(LEFT(no_surat,3)) as no_max'))
        ->where('no_surat', 'LIKE', '%Suket-USAHA%')->get();
        if ($query->count()>0) {
            foreach ($query as $key ) {
            $tmp = ((int)$key->no_max)+1;
            $kd = sprintf("%03s", $tmp);
            }
           }else {
            $kd = "001";
           }
           $kd_surat = $kd."/Suket-USAHA/".$bln[date('n')].date('/yy');
           return $kd_surat;
          }

          public function ajax_select_usaha(Request $request){
            $no_nik = $request->no_nik;
           
            $usaha = Warga::where('no_nik','=',$no_nik)->first();
            if(isset($usaha)){
                $data = array(
                'id_warga' => $usaha['id_warga'],
                'nama_lengkap' =>  $usaha['nama_lengkap'],
                'tempat_lahir' =>  $usaha['tempat_lahir'],
                'tanggal_lahir' =>  $usaha['tanggal_lahir'],
                'status_perkawinan' => $usaha['status_perkawinan'],
                'agama' =>  $usaha['agama'],
                'pekerjaan' =>  $usaha['pekerjaan'],
                'alamat' =>  $usaha['alamat'],);
            }
            else{
                $data = null;
            }
            return json_encode($data);
        }

    public function create_usaha()
    {
        $usaha = Usaha::all();
        $usaha = Warga::all();
        $surat = $this->autonumber_usaha();
        $status_surat = 'Proses';
        return view('user.suket-pengajuan.create_usaha', ['surat'=>$surat], ['status_surat'=>$status_surat]);
    }

    
    public function store_usaha(Request $request)
    {

        $message =[
            'required' => 'Isi tidak boleh kosong',
            'min' => 'Isi minimal harus 16 Karakter',
            'max' => 'Isi maximal harus 16 Karakter'
        ];

        $this->validate($request,[
            'nik_pemohon' => ['required', 'string', 'min:16', 'max:16'],
            'nik_pemilik_usaha' => ['required', 'string', 'min:16', 'max:16'],
            'nama_usaha' => ['required'],
            'jenis_usaha' => ['required'],
            'penghasilan_bulanan' => ['required'],
            'foto_pengantar' => ['required'],
            'foto_kk' => ['required'],
            'foto_suratizin' => ['required'],

        ], $message);

        $data['no_surat'] = $request->no_surat;
        $data['id_warga'] = $request->id_warga;
        $data['status_surat'] = $request->status_surat;
        $data['id']= Auth::id();
        $data2['nik_pemohon'] = $request->nik_pemohon;
        $data2['nik_pemilik_usaha'] = $request->nik_pemilik_usaha;
        $data2['nama_usaha'] = $request->nama_usaha;
        $data2['jenis_usaha'] = $request->jenis_usaha;
        $data2['penghasilan_bulanan'] = $request->penghasilan_bulanan;
        $data2['alamat_usaha'] = $request->alamat_usaha;

        $image1 = $request->file('foto_pengantar');
        $image2 = $request->file('foto_kk');
        $image3 = $request->file('foto_suratizin');
        if($image1 != null){
            $image_name = $image1->getClientOriginalName();
            $image_full_name = date('d-M-Yh-i-s').rand(10,100)."".$image_name;
            
            $upload_path = 'public/media/';
            $image_url = $upload_path.$image_full_name;
            $succes = $image1->move($upload_path, $image_full_name);
            $data['foto_pengantar'] = $image_url;
        } 
        if($image2 != null){
            $image_name = $image2->getClientOriginalName();
            $image_full_name = date('d-M-Yh-i-s').rand(10,100)."".$image_name;
            
            $upload_path = 'public/media/';
            $image_url = $upload_path.$image_full_name;
            $succes = $image2->move($upload_path, $image_full_name);
            $data['foto_kk'] = $image_url;
        } 
        if($image3 != null){
            $image_name = $image3->getClientOriginalName();
            $image_full_name = date('d-M-Yh-i-s').rand(10,100)."".$image_name;
            
            $upload_path = 'public/media/';
            $image_url = $upload_path.$image_full_name;
            $succes = $image3->move($upload_path, $image_full_name);
            $data['foto_ktp'] = $image_url;
        } 
       
            $usaha = DB::table('persuratan')->insertGetId($data);
            $data2['id_persuratan'] = $usaha;
            $usaha = DB::table('detail_usaha')->insertGetId($data2);

            
                //Notifikasi Create Data ke Admin
         $data_user = User::where('name','admin')
         ->first();
 
         $data_user->notify(new UsahaCreateData());
         


            return redirect()->route('pengajuan.riwayat_pengajuan')
            ->with('success', 'Pengajuan Surat Keterangan Usaha berhasil di kirim!');
    }

    public function autonumber_pindah(){
        $bln = array(1 => "I", "II", "III", "IV", "V", "VI", "VII", "VIII", "IX", "X", "XI", "XII");
        $query = DB::table('persuratan')
        ->select(DB::raw('MAX(LEFT(no_surat,3)) as no_max'))
        ->where('no_surat', 'LIKE', '%Suket-PH%')->get();
        if ($query->count()>0) {
            foreach ($query as $key ) {
            $tmp = ((int)$key->no_max)+1;
            $kd = sprintf("%03s", $tmp);
            }
           }else {
            $kd = "001";
           }
           $kd_surat = $kd."/Suket-PH/".$bln[date('n')].date('/yy');
           return $kd_surat;
          }

          public function ajax_select_pindah(Request $request){
            $no_kk = $request->no_kk;
           
            $pindah = Warga::where('no_kk','=',$no_kk)->first();
            if(isset($pindah)){
                $data = array(
                'id_warga' => $pindah['id_warga'],
                'nama_lengkap' =>  $pindah['nama_lengkap'],
                'no_nik' =>  $pindah['no_nik'],);
            }
            else{
                $data = null;
            }
            return json_encode($data);
        }

    

    public function create_pindah()
    {
        

        $pindah = Pindah::all();
        $pindah = Warga::all();
        $surat = $this->autonumber_pindah();
        $status_surat = 'Proses';
        return view('user.suket-pengajuan.create_pindah',['surat'=>$surat], ['status_surat'=>$status_surat]);
    }

    public function store_pindah(Request $request)
    {
        $message =[
            'required' => 'Isi tidak boleh kosong',
            'min' => 'Isi minimal harus 16 Karakter',
            'max' => 'Isi maximal harus 16 Karakter'
        ];

        $this->validate($request,[
            'no_kk' => ['required', 'string', 'min:16', 'max:16'],
            'alasan_pindah' => ['required'],
            'alamat_tujuan' => ['required'],

        ], $message);

        $data['no_surat'] = $request->no_surat;
        $data['status_surat'] = $request->status_surat;
        $data['id_warga'] = $request->id_warga;
        $data['id']= Auth::id();
        $data2['nik_pemohon'] = $request->nik_pemohon;
        $data2['no_kk'] = $request->no_kk;
        $data2['alamat_tujuan'] = $request->alamat_tujuan;
        $data2['alasan_pindah'] = $request->alasan_pindah;

        $image1 = $request->file('foto_pengantar');
        $image2 = $request->file('foto_kk');
        $image3 = $request->file('foto_ktp');
        $image4 = $request->file('foto_akta_cerai');
        $image5 = $request->file('foto_surat_pindah_sebelumnya');
        if($image1 != null){
            $image_name = $image1->getClientOriginalName();
            $image_full_name = date('d-M-Yh-i-s').rand(10,100)."".$image_name;
            
            $upload_path = 'public/media/';
            $image_url = $upload_path.$image_full_name;
            $succes = $image1->move($upload_path, $image_full_name);
            $data['foto_pengantar'] = $image_url;
        } 
        if($image2 != null){
            $image_name = $image2->getClientOriginalName();
            $image_full_name = date('d-M-Yh-i-s').rand(10,100)."".$image_name;
            
            $upload_path = 'public/media/';
            $image_url = $upload_path.$image_full_name;
            $succes = $image2->move($upload_path, $image_full_name);
            $data['foto_kk'] = $image_url;
        } 
        if($image3 != null){
            $image_name = $image3->getClientOriginalName();
            $image_full_name = date('d-M-Yh-i-s').rand(10,100)."".$image_name;
            
            $upload_path = 'public/media/';
            $image_url = $upload_path.$image_full_name;
            $succes = $image3->move($upload_path, $image_full_name);
            $data['foto_ktp'] = $image_url;
        } 
        if($image4 != null){
            $image_name = $image4->getClientOriginalName();
            $image_full_name = date('d-M-Yh-i-s').rand(10,100)."".$image_name;
            
            $upload_path = 'public/media/';
            $image_url = $upload_path.$image_full_name;
            $succes = $image4->move($upload_path, $image_full_name);
            $data['foto_akta_cerai'] = $image_url;
        } 
        if($image5 != null){
            $image_name = $image4->getClientOriginalName();
            $image_full_name = date('d-M-Yh-i-s').rand(10,100)."".$image_name;
            
            $upload_path = 'public/media/';
            $image_url = $upload_path.$image_full_name;
            $succes = $image5->move($upload_path, $image_full_name);
            $data['foto_surat_pindah_sebelumnya'] = $image_url;
        } 
            $pindah = DB::table('persuratan')->insertGetId($data);
            $data2['id_persuratan'] = $pindah;
            $pindah = DB::table('detail_pindah')->insertGetId($data2);

             //Notifikasi Create Data ke Admin
         $data_user = User::where('name','admin')
         ->first();
 
         $data_user->notify(new PindahCreateData());
         

            return redirect()->route('pengajuan.riwayat_pengajuan')
            ->with('success', 'Pengajuan Surat Keterangan Pindah berhasil di kirim!');
    }

    public function create_domisili()
    {
        $domisili = Persuratan::all();
        $domisili = Warga::all();
        $surat = $this->autonumber_domisili();
        $status_surat = 'Proses';
        return view('user.suket-pengajuan.create_domisili', ['surat'=>$surat], ['status_surat'=>$status_surat]);
    }

    public function autonumber_domisili(){
        $bln = array(1 => "I", "II", "III", "IV", "V", "VI", "VII", "VIII", "IX", "X", "XI", "XII");
        $query = DB::table('persuratan')
        ->select(DB::raw('MAX(LEFT(no_surat,3)) as no_max'))
        ->where('no_surat', 'LIKE', '%Suket-DL%')->get();
        if ($query->count()>0) {
            foreach ($query as $key ) {
            $tmp = ((int)$key->no_max)+1;
            $kd = sprintf("%03s", $tmp);
            }
           }else {
            $kd = "001";
           }
           $kd_surat = $kd."/Suket-DL/".$bln[date('n')].date('/yy');
           return $kd_surat;
          }

          public function ajax_select_domisili(Request $request){
            $no_nik = $request->no_nik;
           
            $domisili = Warga::where('no_nik','=',$no_nik)->first();
            if(isset($domisili)){
                $data = array(
                'id_warga' => $domisili['id_warga'],
                'nama_lengkap' =>  $domisili['nama_lengkap'],
                'tempat_lahir' =>  $domisili['tempat_lahir'],
                'tanggal_lahir' =>  $domisili['tanggal_lahir'],
                'status_perkawinan' =>  $domisili['status_perkawinan'],
                'agama' =>  $domisili['agama'],
                'pekerjaan' =>  $domisili['pekerjaan'],
                'alamat' =>  $domisili['alamat'],);
            return json_encode($data);}
        }

    public function store_domisili(Request $request)
    {
        $message =[
            'required' => 'Isi tidak boleh kosong',
            'min' => 'Isi minimal harus 16 Karakter',
            'max' => 'Isi maximal harus 16 Karakter'
        ];

        $this->validate($request,[
            'nik_pemohon' => ['required', 'string', 'min:16', 'max:16'],
            'nik_yg_bersangkutan' => ['required', 'string', 'min:16', 'max:16']
        ], $message);

        $data['no_surat'] = $request->no_surat;
        $data['status_surat'] = $request->status_surat;
        $data['id_warga'] = $request->id_warga;
        $data['id']= Auth::id();
        $data_detail['nik_yg_bersangkutan'] = $request->nik_yg_bersangkutan;
        $data_detail['nik_pemohon'] = $request->nik_pemohon;


        $image1 = $request->file('foto_pengantar');
        $image2 = $request->file('foto_kk');
        $image3 = $request->file('foto_ktp');
        if($image1 != null){
            $image_name = $image1->getClientOriginalName();
            $image_full_name = date('d-M-Yh-i-s').rand(10,100)."".$image_name;
            
            $upload_path = 'public/media/';
            $image_url = $upload_path.$image_full_name;
            $succes = $image1->move($upload_path, $image_full_name);
            $data['foto_pengantar'] = $image_url;
        } 
        if($image2 != null){
            $image_name = $image2->getClientOriginalName();
            $image_full_name = date('d-M-Yh-i-s').rand(10,100)."".$image_name;
            
            $upload_path = 'public/media/';
            $image_url = $upload_path.$image_full_name;
            $succes = $image2->move($upload_path, $image_full_name);
            $data['foto_kk'] = $image_url;
        } 
        if($image3 != null){
            $image_name = $image3->getClientOriginalName();
            $image_full_name = date('d-M-Yh-i-s').rand(10,100)."".$image_name;
            
            $upload_path = 'public/media/';
            $image_url = $upload_path.$image_full_name;
            $succes = $image3->move($upload_path, $image_full_name);
            $data['foto_ktp'] = $image_url;
        } 
        
            $domisili = DB::table('persuratan')->insertGetId($data);
            $data_detail['id_persuratan'] = $domisili;
            $domisili = DB::table('detail_domisili')->insertGetId($data_detail);

             //Notifikasi Create Data ke Admin
         $data_user = User::where('name','admin')
         ->first();
 
         $data_user->notify(new DomisiliCreateData());
         

            return redirect()->route('pengajuan.riwayat_pengajuan')
            ->with('success', 'Pengajuan Surat Keterangan Domisili berhasil di kirim!');
    }

    public function autonumber_kk(){
        $bln = array(1 => "I", "II", "III", "IV", "V", "VI", "VII", "VIII", "IX", "X", "XI", "XII");
        $query = DB::table('persuratan')
        ->select(DB::raw('MAX(LEFT(no_surat,3)) as no_max'))
        ->where('no_surat', 'LIKE', '%Suket-KK%')->get();
        if ($query->count()>0) {
            foreach ($query as $key ) {
            $tmp = ((int)$key->no_max)+1;
            $kd = sprintf("%03s", $tmp);
            }
           }else {
            $kd = "001";
           }
           $kd_surat = $kd."/Suket-KK/".$bln[date('n')].date('/yy');
           return $kd_surat;
          }

          public function ajax_select_kk(Request $request){
            $no_nik = $request->no_nik;
           
            $kk = Warga::where('no_nik','=',$no_nik)->first();
            if(isset($kk)){
                $data = array(
                'id_warga' => $kk['id_warga'],
                'nama_lengkap' =>  $kk['nama_lengkap'],
                'tempat_lahir' =>  $kk['tempat_lahir'],
                'tanggal_lahir' =>  $kk['tanggal_lahir'],
                'status_perkawinan' => $kk['status_perkawinan'],
                'agama' =>  $kk['agama'],
                'pekerjaan' =>  $kk['pekerjaan'],
                'alamat' =>  $kk['alamat'],);
            }
            else{
                $data = null;
            }
            return json_encode($data);
        }


    public function create_kk()
    {
        $kk = Persuratan::all();
        $kk = Warga::all();
        
        $surat = $this->autonumber_kk();
        $status_surat = 'Proses';
        return view('user.suket-pengajuan.create_kk', ['surat'=>$surat, 'status_surat'=>$status_surat]);
    }

    public function store_kk(Request $request)
    {
        $message =[
            'required' => 'Isi tidak boleh kosong',
            'min' => 'Isi minimal harus 16 Karakter',
            'max' => 'Isi maximal harus 16 Karakter'
        ];

        $this->validate($request,[
            'nik_pemohon' => ['required', 'string', 'min:16', 'max:16'],
        ], $message);

        $data['no_surat'] = $request->no_surat;
        $data['tgl_masa_berlaku'] = $request->tgl_masa_berlaku;
        $data['status_surat'] = $request->status_surat;
        $data['id_warga'] = $request->id_warga;
        $data['id']= Auth::id();
        $data_detail['nik_pemohon'] = $request->nik_pemohon;

        $image1 = $request->file('foto_pengantar');
        $image2 = $request->file('foto_kk');
        $image3 = $request->file('foto_suratnikah');
        $image4 = $request->file('foto_ktp');
        
        if($image1 != null){
            $image_name = $image1->getClientOriginalName();
            $image_full_name = date('d-M-Yh-i-s').rand(10,100)."".$image_name;
            
            $upload_path = 'public/media/';
            $image_url = $upload_path.$image_full_name;
            $succes = $image1->move($upload_path, $image_full_name);
            $data['foto_pengantar'] = $image_url;
        } 
        if($image2 != null){
            $image_name = $image2->getClientOriginalName();
            $image_full_name = date('d-M-Yh-i-s').rand(10,100)."".$image_name;
            
            $upload_path = 'public/media/';
            $image_url = $upload_path.$image_full_name;
            $succes = $image2->move($upload_path, $image_full_name);
            $data['foto_kk'] = $image_url;
        } 
        if($image3 != null){
            $image_name = $image3->getClientOriginalName();
            $image_full_name = date('d-M-Yh-i-s').rand(10,100)."".$image_name;
            
            $upload_path = 'public/media/';
            $image_url = $upload_path.$image_full_name;
            $succes = $image3->move($upload_path, $image_full_name);
            $data['foto_suratnikah'] = $image_url;
        } 
        if($image4 != null){
            $image_name = $image4->getClientOriginalName();
            $image_full_name = date('d-M-Yh-i-s').rand(10,100)."".$image_name;
            
            $upload_path = 'public/media/';
            $image_url = $upload_path.$image_full_name;
            $succes = $image4->move($upload_path, $image_full_name);
            $data['foto_ktp'] = $image_url;
        } 
        
            $kk = DB::table('persuratan')->insertGetId($data);
            $data_detail['id_persuratan'] = $kk;
            $kk = DB::table('detail_kk')->insertGetId($data_detail);
            //Notifikasi Create Data ke Admin
         $data_user = User::where('name','admin')
         ->first();
 
         $data_user->notify(new KKCreateData());
         

            return redirect()->route('pengajuan.riwayat_pengajuan')
            ->with('success', 'Pengajuan Surat Pengantar KK berhasil di kirim!');
    
    }

}



