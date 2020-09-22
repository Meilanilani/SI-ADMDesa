<?php

namespace App\Http\Controllers;

use App\Domisili;
use App\Warga;
use App\Persuratan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DomisiliController extends Controller
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
        $domisili = DB::table('persuratan') 
        ->join('warga','persuratan.id_warga','=','warga.id_warga')
        ->select('warga.no_nik', 'warga.nama_lengkap', 'persuratan.id_persuratan','persuratan.no_surat', 'persuratan.created_at','persuratan.status_surat' )
        ->where('no_surat', 'LIKE', '%Suket-D%')
        ->get();
        return view('admin.suket-domisili.suket-domisili', compact('domisili'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $domisili = Persuratan::all();
        $domisili = Warga::all();
        $surat = $this->autonumber();
        $status_surat = 'Proses';
        return view('admin.suket-domisili.create', ['surat'=>$surat], ['status_surat'=>$status_surat]);
    }

    public function autonumber(){
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

          public function ajax_select(Request $request){
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
            return redirect()->route('domisili.index')
                             ->with('success', 'Data Berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Domisili  $domisili
     * @return \Illuminate\Http\Response
     */
    public function show(Domisili $domisili)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Domisili  $domisili
     * @return \Illuminate\Http\Response
     */
    public function edit($id_persuratan)
    {
        $domisili = DB::table('persuratan') 
        ->join('warga', 'persuratan.id_warga','=','warga.id_warga')
        ->join('detail_domisili', 'persuratan.id_persuratan','=','detail_domisili.id_persuratan')
        ->select('warga.id_warga','warga.no_nik', 'warga.nama_lengkap', 'warga.tempat_lahir', 'warga.tanggal_lahir', 'warga.agama', 
        'warga.pekerjaan','warga.alamat', 'persuratan.id_persuratan','persuratan.no_surat', 
        'persuratan.status_surat', 'detail_domisili.nik_yg_bersangkutan' )
        ->where('persuratan.id_persuratan',$id_persuratan)
        ->first();
               
        
        $data_warga = DB::table('warga')
        ->where('no_nik', $domisili->nik_yg_bersangkutan)
        ->first();
       
        return view('admin.suket-domisili.edit', compact('domisili', 'data_warga'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Domisili  $domisili
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_persuratan)
    {
        $data['no_surat'] = $request->no_surat;
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
        if($image2 != null){
            $image_name = $image3->getClientOriginalName();
            $image_full_name = date('d-M-Yh-i-s').rand(10,100)."".$image_name;
            
            $upload_path = 'public/media/';
            $image_url = $upload_path.$image_full_name;
            $succes = $image3->move($upload_path, $image_full_name);
            $data['foto_ktp'] = $image_url;
        } 
        $domisili = DB::table('persuratan')->where('id_persuratan', $id_persuratan)->update($data);
        return redirect()->route('domisili.index')
                            ->with('success', 'Data berhasil diupdate!');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Domisili  $domisili
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_persuratan)
    {
        $data = DB::table('persuratan')->where('id_persuratan', $id_persuratan)->first();
       
        $domisili = DB::table('persuratan')->where('id_persuratan', $id_persuratan)->delete();
        
        return redirect()->route('domisili.index')
        ->with('success', 'Data Berhasil Dihapus!');
    }
}
