<?php

namespace App\Http\Controllers;

use App\Notifications\KKNotifikasiSelesai;
use App\PengajuanKK;
use App\Persuratan;
use App\User;
use PDF;
use App\Warga;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use function Ramsey\Uuid\v1;

class PengajuanKKController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kk = DB::table('persuratan') 
        ->join('warga','persuratan.id_warga','=','warga.id_warga')
        ->select('warga.no_nik', 'warga.nama_lengkap', 'persuratan.id_persuratan','persuratan.no_surat', 'persuratan.created_at','persuratan.status_surat' )
        ->where('no_surat', 'LIKE', '%Suket-KK%')
        ->get();
        return view('admin.suket-pengantar-kk.suket-kk', compact('kk'));
    }

    public function autonumber(){
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

          public function ajax_select(Request $request){
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kk = Persuratan::all();
        $kk = Warga::all();
        
        $surat = $this->autonumber();
        $status_surat = 'Proses';
        return view('admin.suket-pengantar-kk.create', ['surat'=>$surat, 'status_surat'=>$status_surat]);
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
            return redirect()->route('kk.index')
                             ->with('success', 'Data Berhasil ditambahkan!');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PengajuanKK  $pengajuanKK
     * @return \Illuminate\Http\Response
     */
    public function show($id_persuratan)
    {
        $kk = DB::table('persuratan') 
        ->join('warga', 'persuratan.id_warga','=','warga.id_warga')
        ->join('detail_kk', 'persuratan.id_persuratan','=','detail_kk.id_persuratan')
        ->select('warga.id_warga','warga.no_nik', 'warga.no_kk', 'warga.nama_lengkap', 'warga.tempat_lahir', 'warga.tanggal_lahir', 'warga.status_perkawinan','warga.agama', 
        'warga.pekerjaan','warga.alamat', 'persuratan.id_persuratan','persuratan.no_surat', 'persuratan.foto_pengantar', 'persuratan.foto_kk', 'persuratan.foto_ktp', 'persuratan.foto_suratnikah',
        'persuratan.status_surat', 'detail_kk.nik_pemohon')
        ->where('persuratan.id_persuratan',$id_persuratan)
        ->first(); 
        
       return view('admin.suket-pengantar-kk.show',compact('kk'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PengajuanKK  $pengajuanKK
     * @return \Illuminate\Http\Response
     */
    public function edit($id_persuratan)
    {
        $kk = DB::table('persuratan') 
        ->join('warga', 'persuratan.id_warga','=','warga.id_warga')
        ->join('detail_kk', 'persuratan.id_persuratan','=','detail_kk.id_persuratan')
        ->select('warga.id_warga','warga.no_nik', 'warga.nama_lengkap', 'warga.tempat_lahir', 'warga.tanggal_lahir', 'warga.status_perkawinan','warga.agama', 
        'warga.pekerjaan','warga.alamat', 'persuratan.id_persuratan','persuratan.no_surat', 
        'persuratan.status_surat', 'detail_kk.nik_pemohon')
        ->where('persuratan.id_persuratan',$id_persuratan)
        ->first();
       

        return view('admin.suket-pengantar-kk.edit', compact('kk'));
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PengajuanKK  $pengajuanKK
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_persuratan)
    {
        $data['status_surat'] = $request->status_surat;
        $kk = DB::table('persuratan')->where('id_persuratan', $id_persuratan)->update($data);

        //Notifikasi Status-Surat Ke User
        $data = DB::table('persuratan')
        ->where('id_persuratan', $id_persuratan)
        ->first();

        $data_user = User::find($data->id);
        
        $data_user->notify(new KKNotifikasiSelesai($id_persuratan));


        return redirect()->route('kk.index')
                            ->with('success', 'Data berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PengajuanKK  $pengajuanKK
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_persuratan)
    {
        $data = DB::table('persuratan')->where('id_persuratan', $id_persuratan)->first();
       
        $kk = DB::table('persuratan')->where('id_persuratan', $id_persuratan)->delete();

        
        
        return redirect()->route('kk.index')
        ->with('success', 'Data Berhasil Dihapus!');
    }

    public function cetak_pdf($id_persuratan)
    {
        $kk = DB::table('persuratan') 
        ->join('warga', 'persuratan.id_warga','=','warga.id_warga')
        ->join('detail_kk', 'persuratan.id_persuratan','=','detail_kk.id_persuratan')
        ->select('warga.id_warga','warga.no_nik','warga.no_kk', 'warga.nama_lengkap', 'warga.tempat_lahir', 'warga.tanggal_lahir', 'warga.status_perkawinan','warga.agama', 
        'warga.pekerjaan','warga.alamat', 'persuratan.id_persuratan','persuratan.no_surat', 'persuratan.updated_at',
        'persuratan.status_surat', 'detail_kk.nik_pemohon')
        ->where('persuratan.id_persuratan',$id_persuratan)
        ->first(); 

       

        $pdf = PDF::loadview('admin.suket-pengantar-kk.print',compact('kk'));
        $pdf->setPaper('Legal','potrait');
        return $pdf->download('suket-pengantar-kk.pdf');
        
    }
}
