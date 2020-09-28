<?php

namespace App\Http\Controllers;
use App\Persuratan;
use App\Warga;
use PDF;
use App\KTPSementara;
use App\Notifications\KTPNotifikasiSelesai;
use App\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class KTPSementaraController extends Controller
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
        $ktp = DB::table('persuratan') 
        ->join('warga','persuratan.id_warga','=','warga.id_warga')
        ->select('warga.no_nik', 'warga.nama_lengkap', 'persuratan.id_persuratan','persuratan.no_surat', 'persuratan.created_at','persuratan.status_surat' )
        ->where('no_surat', 'LIKE', '%Suket-KTP%')
        ->get();
        return view('admin.suket-ktp-sementara.ktp_sementara', compact('ktp'));
    }

    
    public function autonumber(){
        $bln = array(1 => "I", "II", "III", "IV", "V", "VI", "VII", "VIII", "IX", "X", "XI", "XII");
        $query = DB::table('persuratan')
        ->select(DB::raw('MAX(LEFT(no_surat,3)) as no_max'))
        ->where('no_surat', 'LIKE', '%Suket-KTP%')->get();
        if ($query->count()>0) {
            foreach ($query as $key ) {
            $tmp = ((int)$key->no_max)+1;
            $kd = sprintf("%03s", $tmp);
            }
           }else {
            $kd = "001";
           }
           $kd_surat = $kd."/Suket-KTP/".$bln[date('n')].date('/yy');
           return $kd_surat;
          }

          public function ajax_select(Request $request){
            $no_nik = $request->no_nik;
           
            $ktp = Warga::where('no_nik','=',$no_nik)->first();
            if(isset($ktp)){
                $data = array(
                'id_warga' => $ktp['id_warga'],
                'nama_lengkap' =>  $ktp['nama_lengkap'],
                'tempat_lahir' =>  $ktp['tempat_lahir'],
                'tanggal_lahir' =>  $ktp['tanggal_lahir'],
                'status_perkawinan' => $ktp['status_perkawinan'],
                'agama' =>  $ktp['agama'],
                'pekerjaan' =>  $ktp['pekerjaan'],
                'alamat' =>  $ktp['alamat'],);
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
        $ktp = Persuratan::all();
        $ktp = Warga::all();
        
        $date = new DateTime('now');
        $date->modify('+3 month');
        $date = $date->format('Y-m-d');

        $surat = $this->autonumber();
        $status_surat = 'Proses';
        return view('admin.suket-ktp-sementara.create', ['surat'=>$surat, 'status_surat'=>$status_surat, 'date'=>$date]);
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
            'max' => 'Isi maximal harus 16 Karakter',
        ];

        $this->validate($request,[
            'nik_pemohon' => ['required', 'string', 'min:16', 'max:16'],
            'nik_yg_bersangkutan' => ['required', 'string', 'min:16', 'max:16'],
            'foto_pengantar' => ['required'],
            'foto_kk' => ['required']
        ], $message);

        $data['no_surat'] = $request->no_surat;
        $data['tgl_masa_berlaku'] = $request->tgl_masa_berlaku;
        $data['status_surat'] = $request->status_surat;
        $data['id_warga'] = $request->id_warga;
        $data['id']= Auth::id();
        $data_detail['nik_pemohon'] = $request->nik_pemohon;
        $data_detail['nik_yg_bersangkutan'] = $request->nik_yg_bersangkutan;

        $image1 = $request->file('foto_pengantar');
        $image2 = $request->file('foto_kk');
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
        
            $ktp = DB::table('persuratan')->insertGetId($data);
            $data_detail['id_persuratan'] = $ktp;
            $ktp = DB::table('detail_ktp')->insertGetId($data_detail);
            return redirect()->route('ktp.index')
                             ->with('success', 'Data Berhasil ditambahkan!');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\KTPSementara  $kTPSementara
     * @return \Illuminate\Http\Response
     */
    public function show($id_persuratan)
    {
        $ktp = DB::table('persuratan') 
        ->join('warga', 'persuratan.id_warga','=','warga.id_warga')
        ->join('detail_ktp', 'persuratan.id_persuratan','=','detail_ktp.id_persuratan')
        ->select('warga.id_warga','warga.no_nik', 'warga.nama_lengkap', 'warga.tempat_lahir', 'warga.tanggal_lahir', 'warga.status_perkawinan','warga.agama', 
        'warga.pekerjaan','warga.alamat', 'persuratan.id_persuratan','persuratan.no_surat', 'persuratan.tgl_masa_berlaku', 'persuratan.updated_at', 
        'persuratan.status_surat','persuratan.foto_pengantar','persuratan.foto_kk', 'detail_ktp.nik_yg_bersangkutan', 'detail_ktp.nik_pemohon')
        ->where('persuratan.id_persuratan',$id_persuratan)
        ->first();

        $data_warga = DB::table('warga')
        ->where('no_nik', $ktp->nik_yg_bersangkutan)
        ->get();
       
        
        
        return view('admin.suket-ktp-sementara.show',compact('ktp', 'data_warga'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\KTPSementara  $kTPSementara
     * @return \Illuminate\Http\Response
     */
    public function edit($id_persuratan)
    {
        $ktp = DB::table('persuratan') 
        ->join('warga', 'persuratan.id_warga','=','warga.id_warga')
        ->join('detail_ktp', 'persuratan.id_persuratan','=','detail_ktp.id_persuratan')
        ->select('warga.id_warga','warga.no_nik', 'warga.nama_lengkap', 'warga.tempat_lahir', 'warga.tanggal_lahir', 'warga.status_perkawinan','warga.agama', 
        'warga.pekerjaan','warga.alamat', 'persuratan.id_persuratan','persuratan.no_surat', 
        'persuratan.status_surat', 'detail_ktp.nik_yg_bersangkutan', 'detail_ktp.nik_pemohon', 'persuratan.tgl_masa_berlaku')
        ->where('persuratan.id_persuratan',$id_persuratan)
        ->first();

        $data_warga = DB::table('warga')
        ->where('no_nik', $ktp->nik_yg_bersangkutan)
        ->first();
       

        return view('admin.suket-ktp-sementara.edit', compact('ktp', 'data_warga'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\KTPSementara  $kTPSementara
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_persuratan)
    {
        $data['no_surat'] = $request->no_surat;
        $data['tgl_masa_berlaku'] = $request->tgl_masa_berlaku;
        $data['status_surat'] = $request->status_surat;

       
        $ktp = DB::table('persuratan')->where('id_persuratan', $id_persuratan)->update($data);

         //Notifikasi Status-Surat Ke User
         $data = DB::table('persuratan')
         ->where('id_persuratan', $id_persuratan)
         ->first();
 
         $data_user = User::find($data->id);
         
         $data_user->notify(new KTPNotifikasiSelesai($id_persuratan));
 

        return redirect()->route('ktp.index')
                            ->with('success', 'Data berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\KTPSementara  $kTPSementara
     * @return \Illuminate\Http\Response
     */
    public function  destroy($id_persuratan)
    {
        $data = DB::table('persuratan')->where('id_persuratan', $id_persuratan)->first();
       
        $ktp = DB::table('persuratan')->where('id_persuratan', $id_persuratan)->delete();
        
        return redirect()->route('ktp.index')
        ->with('success', 'Data Berhasil Dihapus!');
    }

    public function cetak_pdf($id_persuratan)
    {
        $ktp = DB::table('persuratan') 
        ->join('warga', 'persuratan.id_warga','=','warga.id_warga')
        ->join('detail_ktp', 'persuratan.id_persuratan','=','detail_ktp.id_persuratan')
        ->select('warga.id_warga','warga.no_nik', 'warga.nama_lengkap', 'warga.tempat_lahir', 'warga.tanggal_lahir', 'warga.status_perkawinan','warga.agama', 
        'warga.pekerjaan','warga.alamat', 'persuratan.id_persuratan','persuratan.no_surat', 'persuratan.tgl_masa_berlaku', 'persuratan.updated_at', 
        'persuratan.status_surat', 'detail_ktp.nik_yg_bersangkutan', 'detail_ktp.nik_pemohon')
        ->where('persuratan.id_persuratan',$id_persuratan)
        ->first();

        $data_warga = DB::table('warga')
        ->where('no_nik', $ktp->nik_yg_bersangkutan)
        ->get();
       
        
        
        $pdf = PDF::loadview('admin.suket-ktp-sementara.print',compact('ktp', 'data_warga'));
        $pdf->setPaper('Legal','potrait');
        return $pdf->download('suket-pengantar-skck.pdf');
        
    }
}
