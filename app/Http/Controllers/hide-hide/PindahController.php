<?php

namespace App\Http\Controllers;

use App\Pindah;
use App\Warga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PindahController extends Controller
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
        $pindah = DB::table('persuratan') 
        ->join('warga','persuratan.id_warga','=','warga.id_warga')
        ->select('warga.no_nik', 'warga.nama_lengkap', 'persuratan.id_persuratan','persuratan.no_surat', 'persuratan.tgl_pembuatan','persuratan.status_surat' )
        ->where('no_surat', 'LIKE', '%Suket-PH%')
        ->get();
        return view('suket-pindah.suket_pindah', compact('pindah'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function autonumber(){
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

          public function ajax_select(Request $request){
            $no_kk = $request->no_kk;
           
            $pindah = Warga::where('no_kk','=',$no_kk)->first();
            if(isset($pindah)){
                $data = array(
                'no_nik' => $pindah['no_nik'],);
                
            return json_encode($data);}
        }

    public function create()
    {
    
        $pindah = Pindah::all();
        $pindah = Warga::all();
        $surat = $this->autonumber();
        return view('suket-pindah.create',['surat'=>$surat]);
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
        $data2['alamat_tujuan'] = $request->alamat_tujuan;
        $data2['alasan_pindah'] = $request->alasan_pindah;
        $data2['jumlah_pengikut'] = $request->jumlah_pengikut;
        $data['tgl_pembuatan'] = $request->tgl_pembuatan;
        $data['status_surat'] = $request->status_surat;

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

            return redirect()->route('pindah.index')
                            ->with('success', 'Data Berhasil ditambahkan!');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Pindah  $pindah
     * @return \Illuminate\Http\Response
     */
    public function show(Pindah $pindah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pindah  $pindah
     * @return \Illuminate\Http\Response
     */
    public function edit($id_ket_pindah)
    {
        $pindah = DB::table('persuratan') 
        ->join('ket_pindah','persuratan.id_persuratan','=','ket_pindah.id_persuratan')
        ->select('ket_pindah.id_ket_pindah','persuratan.id_persuratan', 'persuratan.no_surat', 'persuratan.foto_pengantar', 'persuratan.foto_kk', 'persuratan.foto_ktp','persuratan.foto_akta_cerai','persuratan.foto_surat_pindah_sebelumnya','persuratan.tgl_pembuatan','persuratan.status_surat','ket_pindah.alamat_tujuan', 'ket_pindah.alasan_pindah', 'ket_pindah.jumlah_pengikut')
        ->where('id_ket_pindah',$id_ket_pindah)
        ->first();
        return view('suket-pindah.edit', compact('pindah'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pindah  $pindah
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_ket_pindah)
    {
        $data['no_surat'] = $request->no_surat;
        $data2['alamat_tujuan'] = $request->alamat_tujuan;
        $data2['alasan_pindah'] = $request->alasan_pindah;
        $data2['jumlah_pengikut'] = $request->jumlah_pengikut;
        $data['tgl_pembuatan'] = $request->tgl_pembuatan;
        $data['status_surat'] = $request->status_surat;

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
        $id_persuratan = DB::table('ket_pindah')->select('id_persuratan')->where('id_ket_pindah', $id_ket_pindah)->first();
            $lahir = DB::table('persuratan')->where('id_persuratan', $id_persuratan->id_persuratan)->update($data);
            
            $lahir = DB::table('ket_pindah')->where('id_ket_pindah', $id_ket_pindah)->update($data2);

            return redirect()->route('pindah.index')
                            ->with('success', 'Data Berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pindah  $pindah
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_ket_pindah)
    {
        $pindah = DB::table('persuratan') 
        ->join('ket_pindah','persuratan.id_persuratan','=','ket_pindah.id_persuratan')
        ->select('ket_pindah.id_ket_pindah','persuratan.id_persuratan', 'persuratan.no_surat', 'persuratan.foto_pengantar', 'persuratan.foto_kk', 'persuratan.foto_ktp','persuratan.foto_akta_cerai','persuratan.foto_surat_pindah_sebelumnya','persuratan.tgl_pembuatan','persuratan.status_surat','ket_pindah.alamat_tujuan', 'ket_pindah.alasan_pindah', 'ket_pindah.jumlah_pengikut')
        ->where('id_ket_pindah',$id_ket_pindah)
        ->delete();
        
        return redirect()->route('pindah.index')
        ->with('success', 'Data Berhasil dihapus!');
    }
}
