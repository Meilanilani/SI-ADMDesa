<?php

namespace App\Http\Controllers;

use App\Notifications\NANotifikasiSelesai;
use App\Persuratan;
use App\Warga;
use PDF;
use App\PengantarNikah;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PengantarNikahController extends Controller
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
        $pnikah = DB::table('persuratan')
        ->join('warga','persuratan.id_warga','=','warga.id_warga')
        ->select('warga.no_nik', 'warga.nama_lengkap', 'persuratan.id_persuratan','persuratan.no_surat', 'persuratan.created_at','persuratan.status_surat' )
        ->where('no_surat', 'LIKE', '%Suket-NA%')
        ->get();
        return view('admin.suket-pengantar-nikah.pengantar_nikah', compact('pnikah'));
       
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
        return view('admin.suket-pengantar-nikah.create', ['surat'=>$surat],['status_surat'=>$status_surat]);
    }


    public function autonumber(){
        $bln = array(1 => "I", "II", "III", "IV", "V", "VI", "VII", "VIII", "IX", "X", "XI", "XII");
        $query = DB::table('persuratan')
        ->select(DB::raw('MAX(LEFT(no_surat,3)) as no_max'))
        ->where('no_surat', 'LIKE', '%Suket-NA%')->get();
        if ($query->count()>0) {
            foreach ($query as $key ) {
            $tmp = ((int)$key->no_max)+1;
            $kd = sprintf("%03s", $tmp);
            }
           }else {
            $kd = "001";
           }
           $kd_surat = $kd."/Suket-NA/".$bln[date('n')].date('/yy');
           return $kd_surat;
          }

    public function ajax_select(Request $request){
        $no_nik = $request->no_nik;
       
        $pnikah = Warga::where('no_nik','=',$no_nik)->first();
        if(isset($pnikah)){
            $data = array(
            'id_warga' => $pnikah['id_warga'],
            'nama_lengkap' =>  $pnikah['nama_lengkap'],
            'tempat_lahir' =>  $pnikah['tempat_lahir'],
            'tanggal_lahir' =>  $pnikah['tanggal_lahir'],
            'agama' =>  $pnikah['agama'],
            'pekerjaan' =>  $pnikah['pekerjaan'],
            'alamat' =>  $pnikah['alamat'],
            'status_perkawinan' => $pnikah['status_perkawinan'],);
        }
        else{
            $data = null;
        }
        return json_encode($data);
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
            'nik_pemohon' => ['required', 'string', 'min:16', 'max:16'],
            'nik_ibu' => ['required', 'string', 'min:16', 'max:16'],
            'foto_pengantar' =>  ['required'],
            'foto_kk' =>  ['required'],
            'foto_ktp' => ['required'],
            'foto_ijazah' => ['required']

        ], $message);  

        $data['no_surat'] = $request->no_surat;
        $data['id_warga'] = $request->id_warga;
        $data['status_surat'] = $request->status_surat;
        $data['id']= Auth::id();
        $data_detail['nik_pemohon'] = $request->nik_pemohon;
        $data_detail['nik_anak'] = $request->nik_anak;
        $data_detail['nik_ibu'] = $request->nik_ibu;

        $image1 = $request->file('foto_pengantar');
        $image2 = $request->file('foto_kk');
        $image3 = $request->file('foto_ktp');
        $image4 = $request->file('foto_ijazah');
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
            $data['foto_ijazah'] = $image_url;
        } 
        
            $pnikah = DB::table('persuratan')->insertGetId($data);
            $data_detail['id_persuratan'] = $pnikah;
            $pnikah = DB::table('detail_na')->insertGetId($data_detail);
            return redirect()->route('pnikah.index')
                             ->with('success', 'Data Berhasil di tambahkan!');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PengantarNikah  $pengantarNikah
     * @return \Illuminate\Http\Response
     */
    public function show($id_persuratan)
    {
        $pnikah = DB::table('persuratan') 
        ->join('warga', 'persuratan.id_warga','=','warga.id_warga')
        ->join('detail_na', 'persuratan.id_persuratan','=','detail_na.id_persuratan')
        ->select('warga.id_warga','warga.no_nik', 'warga.no_kk', 'warga.nama_lengkap', 'warga.tempat_lahir', 'warga.tanggal_lahir', 'warga.agama', 'warga.jenis_kelamin', 'warga.pekerjaan','warga.alamat', 'persuratan.id_persuratan','persuratan.no_surat', 'persuratan.status_surat', 'persuratan.foto_ktp','persuratan.foto_kk','persuratan.foto_pengantar','persuratan.foto_ijazah','persuratan.updated_at','persuratan.ket_keperluan_surat', 'detail_na.nik_pemohon', 'detail_na.nik_anak', 'detail_na.nik_ibu' )
        ->where('persuratan.id_persuratan',$id_persuratan)
        ->first();

        $data_ibu = DB::table('warga')
        ->where('no_nik', $pnikah->nik_ibu)
        ->get();
        
        $data_anak = DB::table('warga')
        ->where('no_nik', $pnikah->nik_anak)
        ->get();
        
        
    
        return view('admin.suket-pengantar-nikah.show',compact('pnikah', 'data_ibu', 'data_anak'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PengantarNikah  $pengantarNikah
     * @return \Illuminate\Http\Response
     */
    public function edit($id_persuratan)
    {
        $pnikah = DB::table('persuratan') 
        ->join('warga', 'persuratan.id_warga','=','warga.id_warga')
        ->join('detail_na', 'persuratan.id_persuratan','=','detail_na.id_persuratan')
        ->select('warga.id_warga','warga.no_nik', 'warga.nama_lengkap', 'warga.tempat_lahir', 'warga.tanggal_lahir', 'warga.agama', 'warga.pekerjaan','warga.alamat', 'persuratan.id_persuratan','persuratan.no_surat','persuratan.status_surat', 'detail_na.nik_anak', 'detail_na.nik_pemohon', 'detail_na.nik_ibu' )
        ->where('persuratan.id_persuratan',$id_persuratan)
        ->first();
        
        $data_anak = DB::table('warga')
        ->where('no_nik', $pnikah->nik_anak)
        ->first();

        $data_ibu = DB::table('warga')
        ->where('no_nik', $pnikah->nik_ibu)
        ->first();
        

        return view('admin.suket-pengantar-nikah.edit', compact('pnikah','data_anak', 'data_ibu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PengantarNikah  $pengantarNikah
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_persuratan)
    {
        $data['no_surat'] = $request->no_surat;
        $data['status_surat'] = $request->status_surat;

        $pnikah = DB::table('persuratan')->where('id_persuratan', $id_persuratan)->update($data);

         //Notifikasi Status-Surat Ke User
         $data = DB::table('persuratan')
         ->where('id_persuratan', $id_persuratan)
         ->first();
 
         $data_user = User::find($data->id);
         
         $data_user->notify(new NANotifikasiSelesai($id_persuratan));

        return redirect()->route('pnikah.index')
                            ->with('success', 'Data berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PengantarNikah  $pengantarNikah
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_persuratan)
    {
        $data = DB::table('persuratan')->where('id_persuratan', $id_persuratan)->first();
       
        $pnikah = DB::table('persuratan')->where('id_persuratan', $id_persuratan)->delete();
        
        return redirect()->route('pnikah.index')
        ->with('success', 'Data Berhasil Dihapus!');
    }

    public function cetak_pdf($id_persuratan)
    {
        $pnikah = DB::table('persuratan') 
        ->join('warga', 'persuratan.id_warga','=','warga.id_warga')
        ->join('detail_na', 'persuratan.id_persuratan','=','detail_na.id_persuratan')
        ->select('warga.id_warga','warga.no_nik', 'warga.no_kk', 'warga.nama_lengkap', 'warga.tempat_lahir', 'warga.tanggal_lahir', 'warga.agama', 'warga.jenis_kelamin', 'warga.pekerjaan','warga.alamat', 'persuratan.id_persuratan','persuratan.no_surat', 'persuratan.status_surat','persuratan.updated_at','persuratan.ket_keperluan_surat', 'detail_na.nik_pemohon', 'detail_na.nik_anak', 'detail_na.nik_ibu' )
        ->where('persuratan.id_persuratan',$id_persuratan)
        ->first();

        $data_ibu = DB::table('warga')
        ->where('no_nik', $pnikah->nik_ibu)
        ->get();
        
        $data_anak = DB::table('warga')
        ->where('no_nik', $pnikah->nik_anak)
        ->get();
        
        
    
        $pdf = PDF::loadview('admin.suket-pengantar-nikah.print',compact('pnikah', 'data_ibu', 'data_anak'));
        $pdf->setPaper('Legal','potrait');
        return $pdf->download('suket-pengantar-nikah.pdf');
        
    }
}
