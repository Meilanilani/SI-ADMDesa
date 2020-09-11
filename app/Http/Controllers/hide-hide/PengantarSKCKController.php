<?php

namespace App\Http\Controllers;
use App\Persuratan;
use App\Warga;
use App\PengantarSKCK;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PengantarSKCKController extends Controller
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
        $skck = DB::table('persuratan') 
        ->join('warga','persuratan.id_warga','=','warga.id_warga')
        ->select('warga.no_nik', 'warga.nama_lengkap', 'persuratan.id_persuratan','persuratan.no_surat', 'persuratan.tgl_pembuatan','persuratan.status_surat' )
        ->where('no_surat', 'LIKE', '%Suket-SKCK%')
        ->get();
        return view('admin.suket-pengantar-skck.pengantar_skck', compact('skck'));
    }

    public function autonumber(){
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

          public function ajax_select(Request $request){
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
            return json_encode($data);}
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
        $status_surat = 'Proses';
        $surat = $this->autonumber();
        return view('admin.suket-pengantar-skck.create',  ['surat'=>$surat], ['status_surat'=>$status_surat]);
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
        $data['tgl_masa_berlaku'] = $request->tgl_masa_berlaku;
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
        
            $skck = DB::table('persuratan')->insertGetId($data);
            $data_detail['id_persuratan'] = $skck;
            $skck = DB::table('detail_skck')->insertGetId($data_detail);
            return redirect()->route('skck.index')
                             ->with('success', 'Data Berhasil ditambahkan!');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PengantarSKCK  $pengantarSKCK
     * @return \Illuminate\Http\Response
     */
    public function show(PengantarSKCK $pengantarSKCK)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PengantarSKCK  $pengantarSKCK
     * @return \Illuminate\Http\Response
     */
    public function edit($id_persuratan)
    {
        $skck = DB::table('persuratan') 
        ->join('warga', 'persuratan.id_warga','=','warga.id_warga')
        ->join('detail_skck', 'persuratan.id_persuratan','=','detail_skck.id_persuratan')
        ->select('warga.id_warga','warga.no_nik', 'warga.nama_lengkap', 'warga.tempat_lahir', 'warga.tanggal_lahir', 'warga.agama', 
        'warga.pekerjaan','warga.alamat', 'persuratan.id_persuratan','persuratan.no_surat', 
        'persuratan.ket_keperluan_surat','persuratan.tgl_pembuatan','persuratan.tgl_masa_berlaku','persuratan.status_surat', 'detail_skck.nik_yg_bersangkutan' )
        ->where('persuratan.id_persuratan',$id_persuratan)
        ->first();

        
        
        $data_warga = DB::table('warga')
        ->where('no_nik', $skck->nik_yg_bersangkutan)
        ->first();
       
        $ktp = DB::table('persuratan')->where('id_persuratan', $id_persuratan)->first();
        return view('admin.suket-pengantar-skck.edit', compact('skck', 'data_warga'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PengantarSKCK  $pengantarSKCK
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_persuratan)
    {
        
        $data['ket_keperluan_surat'] = $request->ket_keperluan_surat;
        $data['tgl_pembuatan'] = $request->tgl_pembuatan;
        $data['tgl_masa_berlaku'] = $request->tgl_masa_berlaku;
        $data['status_surat'] = $request->status_surat;

        
        $skck = DB::table('persuratan')->where('id_persuratan', $id_persuratan)->update($data);
        return redirect()->route('skck.index')
                            ->with('success', 'Data berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PengantarSKCK  $pengantarSKCK
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_persuratan)
    {
        $data = DB::table('persuratan')->where('id_persuratan', $id_persuratan)->first();
       
        $skck = DB::table('persuratan')->where('id_persuratan', $id_persuratan)->delete();
        
        return redirect()->route('skck.index')
        ->with('success', 'Data Berhasil Dihapus!');
    }
}
