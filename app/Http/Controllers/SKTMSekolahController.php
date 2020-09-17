<?php

namespace App\Http\Controllers;

use App\Notifications\DataProses;
use App\Persuratan;
use App\SKTMSekolah;
use App\Warga;
use PDF;
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
        $date = date("Y-m-d");
        $sktmsekolah = DB::table('persuratan') 
        ->join('warga','persuratan.id_warga','=','warga.id_warga')
        ->select('warga.no_nik', 'warga.nama_lengkap', 'persuratan.id_persuratan','persuratan.no_surat', 'persuratan.created_at','persuratan.status_surat', 'persuratan.created_at' )
        ->where('no_surat', 'LIKE', '%Suket-TMS%')
        ->get();
        return view('admin.suket-tidakmampu-sekolah.sktm_sekolah', ['sktmsekolah'=>$sktmsekolah],['date'=>$date] );
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
        $status_surat = 'Proses';


        return view('admin.suket-tidakmampu-sekolah.create',['surat'=>$surat],['status_surat'=>$status_surat]);

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
    public function store(Request $request)
    {
        $message =[
            'required' => 'Isi tidak boleh kosong',
            'min' => 'Isi minimal harus 16 Karakter',
            'max' => 'Isi maximal harus 16 Karakter'
        ];

        $this->validate($request,[
            'nik_anak' => ['required', 'string', 'min:16', 'max:16'],
            'nik_pemohon' => ['required', 'string', 'min:16', 'max:16']
        ], $message);  

        $data['no_surat'] = $request->no_surat;
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
        $sktmsekolah = DB::table('persuratan') 
        ->join('warga', 'persuratan.id_warga','=','warga.id_warga')
        ->join('detail_sktms', 'persuratan.id_persuratan','=','detail_sktms.id_persuratan')
        ->select('warga.id_warga','warga.no_nik', 'warga.nama_lengkap', 'warga.tempat_lahir', 'warga.tanggal_lahir', 'warga.agama', 'warga.pekerjaan','warga.alamat', 'persuratan.id_persuratan','persuratan.no_surat', 'persuratan.tgl_pembuatan','persuratan.status_surat', 'detail_sktms.nik_anak', 'detail_sktms.nik_orangtua' )
        ->where('persuratan.id_persuratan',$id_persuratan)
        ->first();
        
        $data_anak = DB::table('warga')
        ->where('no_nik', $sktmsekolah->nik_anak)
        ->first();

        return view('admin.suket-tidakmampu-sekolah.show',compact('sktmsekolah','data_anak'))->renderSections()['content'];
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SKTMSekolah  $sKTMSekolah
     * @return \Illuminate\Http\Response
     */
    public function edit($id_persuratan)
    {
        
        
        $sktmsekolah = DB::table('persuratan') 
        ->join('warga', 'persuratan.id_warga','=','warga.id_warga')
        ->join('detail_sktms', 'persuratan.id_persuratan','=','detail_sktms.id_persuratan')
        ->select('warga.id_warga','warga.no_nik', 'warga.nama_lengkap', 'warga.tempat_lahir', 'warga.tanggal_lahir', 'warga.agama', 'warga.pekerjaan','warga.alamat', 'persuratan.id_persuratan','persuratan.no_surat','persuratan.status_surat', 'detail_sktms.nik_anak', 'detail_sktms.nik_pemohon' )
        ->where('persuratan.id_persuratan',$id_persuratan)
        ->first();  
        
        $data_anak = DB::table('warga')
        ->where('no_nik', $sktmsekolah->nik_anak)
        ->first();
        return view('admin.suket-tidakmampu-sekolah.edit', compact('sktmsekolah','data_anak'));
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
        
        $data['status_surat'] = $request->status_surat;
        
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

    public function cetak_pdf($id_persuratan)
    {
        $sktmsekolah = DB::table('persuratan') 
        ->join('warga', 'persuratan.id_warga','=','warga.id_warga')
        ->join('detail_sktms', 'persuratan.id_persuratan','=','detail_sktms.id_persuratan')
        ->select('warga.id_warga','warga.no_nik', 'warga.nama_lengkap', 'warga.tempat_lahir', 'warga.tanggal_lahir', 'warga.agama', 'warga.pekerjaan','warga.alamat', 'persuratan.id_persuratan','persuratan.no_surat', 'persuratan.updated_at', 'detail_sktms.nik_anak', 'detail_sktms.nik_pemohon' )
        ->where('persuratan.id_persuratan',$id_persuratan)
        ->first();

        $data_anak = DB::table('warga')
        ->where('no_nik', $sktmsekolah->nik_anak)
        ->get();
        
        
        
        $pdf = PDF::loadview('admin.suket-tidakmampu-sekolah.print',compact('sktmsekolah', 'data_anak'));
        $pdf->setPaper('Legal','potrait');
        return $pdf->download('suket tidak mampu sekolah.pdf');
        
    }
}

