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
        ->select('warga.no_nik', 'warga.nama_lengkap', 'persuratan.id_persuratan','persuratan.no_surat', 'persuratan.tgl_pembuatan','persuratan.status_surat' )
        ->where('no_surat', 'LIKE', '%Suket-USAHA%')
        ->get();
        return view('suket-usaha.suket_usaha', compact('usaha'));
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usaha = Usaha::all();
        $usaha = Warga::all();
        $surat = $this->autonumber();
        return view('suket-usaha.create', ['surat'=>$surat]);
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
        $data2['nama_perusahaan'] = $request->nama_perusahaan;
        $data2['jenis_usaha'] = $request->jenis_usaha;
        $data2['alamat_perusahaan'] = $request->alamat_perusahaan;
       
        $data['tgl_pembuatan'] = $request->tgl_pembuatan;
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
            $data['foto_ktp'] = $image_url;
        } 
       
            $usaha = DB::table('persuratan')->insertGetId($data);
            $data2['id_persuratan'] = $usaha;
            $usaha = DB::table('ket_usaha')->insertGetId($data2);

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
    public function edit($id_ket_usaha)
    {
        $usaha = DB::table('persuratan') 
        ->join('ket_usaha','persuratan.id_persuratan','=','ket_usaha.id_persuratan')
        ->select('ket_usaha.id_ket_usaha','persuratan.id_persuratan', 'persuratan.no_surat','persuratan.ket_keperluan_surat', 'persuratan.foto_pengantar', 'persuratan.foto_kk', 'persuratan.foto_suratizin','persuratan.tgl_pembuatan','persuratan.status_surat', 'ket_usaha.nama_perusahaan', 'ket_usaha.jenis_usaha', 'ket_usaha.alamat_perusahaan')
        ->where('id_ket_usaha',$id_ket_usaha)
        ->first();
        return view('suket-usaha.edit', compact('usaha'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Usaha  $usaha
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_ket_usaha)
    {
        $data['no_surat'] = $request->no_surat;
        $data2['nama_perusahaan'] = $request->nama_perusahaan;
        $data2['jenis_usaha'] = $request->jenis_usaha;
        $data2['alamat_perusahaan'] = $request->alamat_perusahaan;
       
        $data['tgl_pembuatan'] = $request->tgl_pembuatan;
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
        $id_persuratan = DB::table('ket_usaha')->select('id_persuratan')->where('id_ket_usaha', $id_ket_usaha)->first();
        $lahir = DB::table('persuratan')->where('id_persuratan', $id_persuratan->id_persuratan)->update($data);
        
        $lahir = DB::table('ket_usaha')->where('id_ket_usaha', $id_ket_usaha)->update($data2);

        return redirect()->route('usaha.index')
                        ->with('success', 'Data Berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Usaha  $usaha
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_ket_usaha)
    {
        $usaha = DB::table('persuratan') 
        ->join('ket_usaha','persuratan.id_persuratan','=','ket_usaha.id_persuratan')
        ->select('ket_usaha.id_ket_usaha','persuratan.id_persuratan', 'persuratan.no_surat','persuratan.ket_keperluan_surat', 'persuratan.foto_pengantar', 'persuratan.foto_kk', 'persuratan.foto_suratizin','persuratan.tgl_pembuatan','persuratan.status_surat', 'ket_usaha.nama_perusahaan', 'ket_usaha.jenis_usaha', 'ket_usaha.alamat_perusahaan')
        ->where('id_ket_usaha',$id_ket_usaha)
        ->delete();
        
        return redirect()->route('usaha.index')
        ->with('success', 'Data Berhasil dihapus!');
    }
}
