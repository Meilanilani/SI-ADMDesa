<?php

namespace App\Http\Controllers;
use App\Persuratan;
use App\SKTMSekolah;
use App\Warga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SKTMSekolahController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sktmsekolah = DB::table('persuratan')
        ->where('no_surat', 'LIKE', '%Suket-TMS%')
        ->get();
        return view('suket-tidakmampu-sekolah.sktm_sekolah', compact('sktmsekolah'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $surat = Persuratan::all();
        $surat = Warga::all();
        $surat = $this->autonumber();
        return view('suket-tidakmampu-sekolah.create',['surat'=>$surat]);
    }

    public function autonumber(){
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

    public function ajax_select(Request $request){
        $no_nik = $request->no_nik;
       
        $sktmsekolah = Warga::where('no_nik','=',$no_nik)->first();
        if(isset($sktmsekolah)){
            $data = array(
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
    public function store(Request $request)
    {
        $data['no_surat'] = $request->no_surat;
        $data['ket_keperluan_surat'] = $request->ket_keperluan_surat;
        $data['tgl_pembuatan'] = $request->tgl_pembuatan;
        $data['status_surat'] = $request->status_surat;

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
            $data_detail['nik_anak'] = $request->nik_anak;
            $data_detail['nik_orangtua'] = $request->nik_orangtua;
            $data_detail['id_persuratan'] = $sktmsekolah;

            DB::table('sktms')->insert($data_detail);
            
            return redirect()->route('sktmsekolah.index')
                             ->with('success', 'Data Berhasil ditambahkan!');
    }

   

    /**
     * Display the specified resource.
     *
     * @param  \App\SKTMSekolah  $sKTMSekolah
     * @return \Illuminate\Http\Response
     */
    public function show(SKTMSekolah $sKTMSekolah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SKTMSekolah  $sKTMSekolah
     * @return \Illuminate\Http\Response
     */
    public function edit($id_persuratan)
    {
        $sktmsekolah = DB::table('persuratan')->where('id_persuratan', $id_persuratan)->first();
        return view('suket-tidakmampu-sekolah.edit', compact('sktmsekolah'));
    }

    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SKTMSekolah  $sKTMSekolah
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_persuratan)
    {
        $data['no_surat'] = $request->no_surat;
        $data['ket_keperluan_surat'] = $request->ket_keperluan_surat;
        $data['tgl_pembuatan'] = $request->tgl_pembuatan;
        $data['status_surat'] = $request->status_surat;

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
        
        $sktmsekolah = DB::table('persuratan')->where('id_persuratan', $id_persuratan)->update($data);
        return redirect()->route('sktmsekolah.index')
                            ->with('success', 'Data berhasil diupdate!');
    
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SKTMSekolah  $sKTMSekolah
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_persuratan)
    {
        $data = DB::table('persuratan')->where('id_persuratan', $id_persuratan)->first();
       
        $sktmsekolah = DB::table('persuratan')->where('id_persuratan', $id_persuratan)->delete();
        
        return redirect()->route('sktmsekolah.index')
        ->with('success', 'Data Berhasil Dihapus!');
    
    }
}

