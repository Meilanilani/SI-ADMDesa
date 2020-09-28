<?php

namespace App\Http\Controllers;

use App\Notifications\PindahNotifikasiSelesai;
use App\Pindah;
use App\Warga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        ->select('warga.no_nik', 'warga.nama_lengkap', 'persuratan.id_persuratan','persuratan.no_surat', 'persuratan.created_at','persuratan.status_surat' )
        ->where('no_surat', 'LIKE', '%Suket-PH%')
        ->get();
        return view('admin.suket-pindah.suket_pindah', compact('pindah'));
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
                'id_warga' => $pindah['id_warga'],
                'nama_lengkap' =>  $pindah['nama_lengkap'],
                'no_nik' =>  $pindah['no_nik'],);
            }
            else{
                $data = null;
            }
            return json_encode($data);
        }

    

    public function create()
    {
        

        $pindah = Pindah::all();
        $pindah = Warga::all();
        $surat = $this->autonumber();
        $status_surat = 'Proses';
        return view('admin.suket-pindah.create',['surat'=>$surat], ['status_surat'=>$status_surat]);
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
            'no_kk' => ['required', 'string', 'min:16', 'max:16'],
            'alasan_pindah' => ['required'],
            'alamat_tujuan' => ['required'],

        ], $message);

        $data['no_surat'] = $request->no_surat;
        $data['status_surat'] = $request->status_surat;
        $data['id_warga'] = $request->id_warga;
        $data['id']= Auth::id();
        $data2['nik_pemohon'] = $request->nik_pemohon;
        $data2['no_kk'] = $request->no_kk;
        $data2['alamat_tujuan'] = $request->alamat_tujuan;
        $data2['alasan_pindah'] = $request->alasan_pindah;

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
    public function show($id_persuratan)
    {
        $pindah = DB::table('persuratan')
        ->join('warga','persuratan.id_warga','=','warga.id_warga')
        ->join('detail_pindah', 'persuratan.id_persuratan','=','detail_pindah.id_persuratan')
        ->select('warga.id_warga','warga.no_nik', 'warga.nama_lengkap', 'warga.tempat_lahir', 'warga.tanggal_lahir', 'warga.agama', 'warga.pekerjaan','warga.alamat', 'warga.jenis_kelamin', 'persuratan.id_persuratan','persuratan.no_surat', 'persuratan.foto_pengantar', 'persuratan.foto_kk', 'persuratan.foto_ktp',
         'detail_pindah.nik_pemohon', 'detail_pindah.no_kk', 'detail_pindah.alamat_tujuan', 'detail_pindah.alasan_pindah')
        ->where('no_surat', 'LIKE', '%Suket-PH%')
        ->where('persuratan.id_persuratan',$id_persuratan)
        ->first();
        
        $data_kk = DB::table('warga')
        ->where('no_kk', $pindah->no_kk)
        ->get();
        
        return view('admin.suket-pindah.show', compact('pindah','data_kk'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pindah  $pindah
     * @return \Illuminate\Http\Response
     */
    public function edit($id_persuratan)
    {
        $pindah = DB::table('persuratan')
        ->join('warga','persuratan.id_warga','=','warga.id_warga')
        ->join('detail_pindah', 'persuratan.id_persuratan','=','detail_pindah.id_persuratan')
        ->select('warga.id_warga','warga.no_nik', 'warga.nama_lengkap', 'warga.tempat_lahir', 'warga.tanggal_lahir', 'warga.agama', 'warga.pekerjaan','warga.alamat', 'persuratan.id_persuratan','persuratan.no_surat', 'persuratan.status_surat', 'detail_pindah.nik_pemohon', 'detail_pindah.no_kk', 'detail_pindah.alamat_tujuan', 'detail_pindah.alasan_pindah')
        ->where('no_surat', 'LIKE', '%Suket-PH%')
        ->where('persuratan.id_persuratan',$id_persuratan)
        ->first();
        
        $data_kk = DB::table('warga')
        ->where('no_nik', $pindah->no_kk)
        ->first();
        return view('admin.suket-pindah.edit', compact('pindah','data_kk'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pindah  $pindah
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_persuratan)
    {
        $message =[
            'required' => 'Isi tidak boleh kosong',
            'min' => 'Isi minimal harus 16 Karakter',
            'max' => 'Isi maximal harus 16 Karakter'
        ];

        $this->validate($request,[
            'alasan_pindah' => ['required'],
            'alamat_tujuan' => ['required'],

        ], $message);
        $data['no_surat'] = $request->no_surat;
        $data_detail['alamat_tujuan'] = $request->alamat_tujuan;
        $data_detail['alasan_pindah'] = $request->alasan_pindah;
        $data['status_surat'] = $request->status_surat;

       
        $id_persuratan = DB::table('detail_pindah')->select('id_persuratan')->where('id_persuratan', $id_persuratan)->first();
        $pindah = DB::table('persuratan')->where('id_persuratan', $id_persuratan->id_persuratan)->update($data);
        $pindah = DB::table('detail_pindah')->where('id_persuratan', $id_persuratan->id_persuratan)->update($data_detail);

         //Notifikasi Status-Surat Ke User
         $data = DB::table('persuratan')
         ->where('id_persuratan', $id_persuratan)
         ->first();
 
         $data_user = User::find($data->id);
         
         $data_user->notify(new PindahNotifikasiSelesai($id_persuratan));
 
        

        return redirect()->route('pindah.index')
                            ->with('success', 'Data Berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pindah  $pindah
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_persuratan)
    {
        $data = DB::table('persuratan')->where('id_persuratan', $id_persuratan)->first();
       
        $pindah = DB::table('persuratan')->where('id_persuratan', $id_persuratan)->delete();
        
        return redirect()->route('pindah.index')
        ->with('success', 'Data Berhasil Dihapus!');
    }
    public function cetak_pdf($id_persuratan)
    {
        $pindah = DB::table('persuratan')
        ->join('warga','persuratan.id_warga','=','warga.id_warga')
        ->join('detail_pindah', 'persuratan.id_persuratan','=','detail_pindah.id_persuratan')
        ->select('warga.id_warga','warga.no_nik', 'warga.nama_lengkap', 'warga.tempat_lahir', 'warga.tanggal_lahir', 'warga.agama', 'warga.pekerjaan','warga.alamat', 'warga.jenis_kelamin', 'persuratan.id_persuratan','persuratan.no_surat', 'persuratan.status_surat', 'detail_pindah.nik_pemohon', 'detail_pindah.no_kk', 'detail_pindah.alamat_tujuan', 'detail_pindah.alasan_pindah')
        ->where('no_surat', 'LIKE', '%Suket-PH%')
        ->where('persuratan.id_persuratan',$id_persuratan)
        ->first();
        
        $data_kk = DB::table('warga')
        ->where('no_kk', $pindah->no_kk)
        ->get();
        
        $pdf = PDF::loadview('admin.suket-pindah.print', compact('pindah','data_kk'));
        $pdf->setPaper('Legal','potrait');
        return $pdf->download('suket tidak mampu rumah sakit.pdf');
       
        
    }
}
