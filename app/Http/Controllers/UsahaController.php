<?php

namespace App\Http\Controllers;

use App\Usaha;
use App\Warga;
use App\Persuratan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsahaController extends Controller
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
        $usaha = DB::table('persuratan') 
        ->join('warga','persuratan.id_warga','=','warga.id_warga')
        ->select('warga.no_nik', 'warga.nama_lengkap', 'persuratan.id_persuratan','persuratan.no_surat', 'persuratan.created_at','persuratan.status_surat' )
        ->where('no_surat', 'LIKE', '%Suket-USAHA%')
        ->get();
        return view('admin.suket-usaha.suket_usaha', compact('usaha'));
    }

    public function autonumber(){
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

          public function ajax_select(Request $request){
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
            return json_encode($data);
        
        }
        }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usaha = Usaha::all();
        $usaha = Warga::all();
        $surat = $this->autonumber();
        $status_surat = 'Proses';
        return view('admin.suket-usaha.create', ['surat'=>$surat], ['status_surat'=>$status_surat]);
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
        $data['id_warga'] = $request->id_warga;
        $data['status_surat'] = $request->status_surat;
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

            return redirect()->route('usaha.index')
                            ->with('success', 'Product Created Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Usaha  $usaha
     * @return \Illuminate\Http\Response
     */
    public function show(Usaha $usaha)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Usaha  $usaha
     * @return \Illuminate\Http\Response
     */
    public function edit($id_persuratan)
    {
        $usaha = DB::table('persuratan') 
        ->join('warga', 'persuratan.id_warga','=','warga.id_warga')
        ->join('detail_usaha', 'persuratan.id_persuratan','=','detail_usaha.id_persuratan')
        ->select('warga.id_warga','warga.no_nik', 'warga.nama_lengkap', 'warga.tempat_lahir', 'warga.tanggal_lahir', 'warga.agama', 'warga.status_perkawinan',
        'warga.pekerjaan','warga.alamat', 'persuratan.id_persuratan','persuratan.no_surat', 
        'persuratan.tgl_masa_berlaku','persuratan.status_surat', 'detail_usaha.nik_pemilik_usaha','detail_usaha.nik_pemohon',  'detail_usaha.nama_usaha', 'detail_usaha.jenis_usaha', 'detail_usaha.penghasilan_bulanan','detail_usaha.alamat_usaha')
        ->where('persuratan.id_persuratan',$id_persuratan)
        ->first();

        $data_warga = DB::table('warga')
        ->where('no_nik', $usaha->nik_pemilik_usaha)
        ->first();
       
        $ktp = DB::table('persuratan')->where('id_persuratan', $id_persuratan)->first();
        return view('admin.suket-usaha.edit', compact('usaha', 'data_warga'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Usaha  $usaha
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_persuratan)
    {
        $data['no_surat'] = $request->no_surat;
        $data['id_warga'] = $request->id_warga;
        $data2['nik_pemohon'] = $request->nik_pemohon;
        $data2['nik_pemilik_usaha'] = $request->nik_pemilik_usaha;
        $data2['nama_usaha'] = $request->nama_usaha;
        $data2['jenis_usaha'] = $request->jenis_usaha;
        $data2['penghasilan_bulanan'] = $request->penghasilan_bulanan;
        $data2['alamat_usaha'] = $request->alamat_usaha;
        $data['status_surat'] = $request->status_surat;

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
            $data['foto_suratizin'] = $image_url;
        } 
        $usaha = DB::table('persuratan')->where('id_persuratan', $id_persuratan)->update($data);
        return redirect()->route('usaha.index')
                        ->with('success', 'Data Berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Usaha  $usaha
     * @return \Illuminate\Http\Response
     */
    public function  destroy($id_persuratan)
    {
        $data = DB::table('persuratan')->where('id_persuratan', $id_persuratan)->first();
       
        $skck = DB::table('persuratan')->where('id_persuratan', $id_persuratan)->delete();
        
        return redirect()->route('usaha.index')
        ->with('success', 'Data Berhasil Dihapus!');
    }
}
