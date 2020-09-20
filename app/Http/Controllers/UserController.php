<?php

namespace App\Http\Controllers;
use App\Persuratan;
use App\SKTMSekolah;
use App\Warga;
use App\User;
use App\Notifications\DataProses;
use App\Notifications\SKTMRSCreateData;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

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
            'alamat' =>  $sktmsekolah['alamat'],);
        return json_encode($data);}
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_sktmsekolah(Request $request)
    {
        $data['no_surat'] = $request->no_surat;
        $data['ket_keperluan_surat'] = $request->ket_keperluan_surat;
        $data['status_surat'] = $request->status_surat; 
        $data['id_warga'] = $request->id_warga;
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
            
         //Notifikasi
         $data_admin = User::where('name','admin')
         ->first();
 
         $data_admin->notify(new DataProses());

        return redirect()->route('pengajuan.index')
                             ->with('success', 'Data Berhasil ditambahkan!');
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
       
        $sktmsekolah = Warga::where('no_nik','=',$no_nik)->first();
        if(isset($sktmsekolah)){
            $data = array(
            'id_warga' => $sktmsekolah['id_warga'],
            'nama_lengkap' =>  $sktmsekolah['nama_lengkap'],
            'tempat_lahir' =>  $sktmsekolah['tempat_lahir'],
            'tanggal_lahir' =>  $sktmsekolah['tanggal_lahir'],
            'agama' =>  $sktmsekolah['agama'],
            'pekerjaan' =>  $sktmsekolah['pekerjaan'],
            'alamat' =>  $sktmsekolah['alamat'],);
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
            'nik_pemohon' => ['required', 'string', 'min:16', 'max:16']
        ], $message);  

        $data['no_surat'] = $request->no_surat; 
        $data['status_surat'] = $request->status_surat;
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
        
            $sktmrs = DB::table('persuratan')->insertGetId($data);
            $data_detail['id_persuratan'] = $sktmrs;
            $sktmrs = DB::table('detail_sktmrs')->insertGetId($data_detail);
            
            
            //Notifikasi
         $data_admin = User::where('name','admin')
         ->first();
 
         $data_admin->notify(new SKTMRSCreateData());

         return redirect()->route('pengajuan.index')
                             ->with('success', 'Data Berhasil ditambahkan!');
    }

    public function create_kelahiran()
    {
        return view('user.suket-pengajuan.create_kelahiran');
    }

    public function create_kematian()
    {
        return view('user.suket-pengajuan.create_kematian');
    }

    public function create_pengantarnikah()
    {
        return view('user.suket-pengajuan.create_pengantarnikah');
    }

    public function create_skck()
    {
        return view('user.suket-pengajuan.create_skck');
    }

    public function create_ktp()
    {
        return view('user.suket-pengajuan.create_ktp');
    }


    public function create_usaha()
    {
        return view('user.suket-pengajuan.create_usaha');
    }

    public function create_domisili()
    {
        return view('user.suket-pengajuan.create_domisili');
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
