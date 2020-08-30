<?php

namespace App\Http\Controllers;

use App\Kematian;
use App\Warga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class KematianController extends Controller
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
        $kematian = DB::table('persuratan') 
        ->join('warga','persuratan.id_warga','=','warga.id_warga')
        ->select('warga.no_nik', 'warga.nama_lengkap', 'persuratan.id_persuratan','persuratan.no_surat', 'persuratan.tgl_pembuatan','persuratan.status_surat' )
        ->where('no_surat', 'LIKE', '%Suket-KMT%')
        ->get();
        return view('suket-kematian.suket_kematian', compact('kematian'));
    }

    public function autonumber(){
        $bln = array(1 => "I", "II", "III", "IV", "V", "VI", "VII", "VIII", "IX", "X", "XI", "XII");
        $query = DB::table('persuratan')
        ->select(DB::raw('MAX(LEFT(no_surat,3)) as no_max'))
        ->where('no_surat', 'LIKE', '%Suket-KMT%')->get();
        if ($query->count()>0) {
            foreach ($query as $key ) {
            $tmp = ((int)$key->no_max)+1;
            $kd = sprintf("%03s", $tmp);
            }
           }else {
            $kd = "001";
           }
           $kd_surat = $kd."/Suket-KMT/".$bln[date('n')].date('/yy');
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
        $kematian = Kematian::all();
        $kematian = Warga::all();
        $surat = $this->autonumber();
        return view('suket-kematian.create', ['surat'=>$surat]);
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
        $data2['nik_yg_bersangkutan'] = $request->nik_yg_bersangkutan;
        $data2['tgl_kematian'] = $request->tgl_kematian;
        $data2['tempat_kematian'] = $request->tempat_kematian;
        $data2['penyebab_kematian'] = $request->penyebab_kematian;
        $data['tgl_pembuatan'] = $request->tgl_pembuatan;
        $data['status_surat'] = $request->status_surat;

        $image1 = $request->file('foto_pengantar');
        $image2 = $request->file('foto_kk');
        $image3 = $request->file('foto_ktp');
        $image4 = $request->file('foto_suratkematianrs');
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
            $data['foto_suratkematianrs'] = $image_url;
        } 
            $kematian = DB::table('persuratan')->insertGetId($data);
            $data2['id_persuratan'] = $kematian;
            $kematian = DB::table('detail_kematian')->insertGetId($data2);

            return redirect()->route('kematian.index')
                            ->with('success', 'Data Berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kematian  $kematian
     * @return \Illuminate\Http\Response
     */
    public function show(Kematian $kematian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kematian  $kematian
     * @return \Illuminate\Http\Response
     */
    public function edit($id_persuratan)
    {
        $kematian = DB::table('persuratan') 
        ->join('warga', 'persuratan.id_warga','=','warga.id_warga')
        ->join('detail_kematian', 'persuratan.id_persuratan','=','detail_kematian.id_persuratan')
        ->select('warga.id_warga','warga.no_nik', 'warga.nama_lengkap', 'warga.tempat_lahir', 'warga.tanggal_lahir', 'warga.status_perkawinan','warga.agama', 
        'warga.pekerjaan','warga.alamat', 'persuratan.id_persuratan','persuratan.no_surat', 
        'persuratan.ket_keperluan_surat','persuratan.tgl_pembuatan','persuratan.status_surat', 'detail_kematian.nik_yg_bersangkutan', 'detail_kematian.tgl_kematian', 'detail_kematian.tempat_kematian', 'detail_kematian.penyebab_kematian' )
        ->where('persuratan.id_persuratan',$id_persuratan)
        ->first();
    
        $data_warga = DB::table('warga')
        ->where('no_nik', $kematian->nik_yg_bersangkutan)
        ->first();
       
        $ktp = DB::table('persuratan')->where('id_persuratan', $id_persuratan)->first();
        return view('suket-kematian.edit', compact('kematian', 'data_warga'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kematian  $kematian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_kematian)
    {
        
        $data['no_surat'] = $request->no_surat;
        $data2['tgl_kematian'] = $request->tgl_kematian;
        $data2['tempat_kematian'] = $request->tempat_kematian;
        $data2['penyebab_kematian'] = $request->penyebab_kematian;
        $data['tgl_pembuatan'] = $request->tgl_pembuatan;
        $data['status_surat'] = $request->status_surat;

        $image1 = $request->file('foto_pengantar');
        $image2 = $request->file('foto_kk');
        $image3 = $request->file('foto_ktp');
        $image4 = $request->file('foto_suratkematianrs');
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
            $data['foto_suratkematianrs'] = $image_url;
        } 
            $id_persuratan = DB::table('ket_kematian')->select('id_persuratan')->where('id_kematian', $id_kematian)->first();
            $lahir = DB::table('persuratan')->where('id_persuratan', $id_persuratan->id_persuratan)->update($data);
            
            $lahir = DB::table('ket_kematian')->where('id_kematian', $id_kematian)->update($data2);

            return redirect()->route('kematian.index')
                            ->with('success', 'Data Berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kematian  $kematian
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_persuratan)
    {
        $data = DB::table('persuratan')->where('id_persuratan', $id_persuratan)->first();
       
        $skck = DB::table('persuratan')->where('id_persuratan', $id_persuratan)->delete();
        
        return redirect()->route('kematian.index')
        ->with('success', 'Data Berhasil Dihapus!');
    }

    public function cetak_pdf($id_persuratan)
    {
        $kematian = DB::table('persuratan') 
        ->join('warga', 'persuratan.id_warga','=','warga.id_warga')
        ->join('detail_kematian', 'persuratan.id_persuratan','=','detail_kematian.id_persuratan')
        ->select('warga.id_warga','warga.no_nik', 'warga.nama_lengkap', 'warga.jenis_kelamin', 'warga.pekerjaan','warga.alamat', 'persuratan.id_persuratan','persuratan.no_surat', 'persuratan.tgl_pembuatan','persuratan.status_surat', 'detail_kematian.nik_yg_bersangkutan', 'detail_kematian.tgl_kematian', 'detail_kematian.tempat_kematian', 'detail_kematian.penyebab_kematian' )
        ->where('persuratan.id_persuratan',$id_persuratan)
        ->first();
        
        
        
        $pdf = PDF::loadview('suket-kematian.print',compact('kematian'));
        $pdf->setPaper('Legal','potrait');
        return $pdf->download('suket-tidak kematian    .pdf');
        
    }
}
