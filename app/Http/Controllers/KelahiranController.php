<?php

namespace App\Http\Controllers;

use App\Persuratan;
use App\Kelahiran;
use App\Warga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class KelahiranController extends Controller
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
        
        $lahir = DB::table('persuratan') 
        ->join('warga','persuratan.id_warga','=','warga.id_warga')
        ->select('warga.no_nik', 'warga.nama_lengkap', 'persuratan.id_persuratan','persuratan.no_surat', 'persuratan.created_at','persuratan.status_surat' )
        ->where('no_surat', 'LIKE', '%Suket-Lahir%')
        ->get();

       
        
        return view('admin.suket-kelahiran.kelahiran', compact('lahir'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $surat = Kelahiran::all();
        $surat = Persuratan::all();
        $surat = Warga::all();
        $surat = $this->autonumber();
        $status_surat = 'Proses';
        return view('admin.suket-kelahiran.create',['surat'=>$surat],['status_surat'=>$status_surat]);
    }

    

    public function autonumber(){
        $bln = array(1 => "I", "II", "III", "IV", "V", "VI", "VII", "VIII", "IX", "X", "XI", "XII");
        $query = DB::table('persuratan')
        ->select(DB::raw('MAX(LEFT(no_surat,3)) as no_max'))
        ->where('no_surat', 'LIKE', '%Suket-Lahir%')->get();
        if ($query->count()>0) {
            foreach ($query as $key ) {
            $tmp = ((int)$key->no_max)+1;
            $kd = sprintf("%03s", $tmp);
            }
           }else {
            $kd = "001";
           }
           $kd_surat = $kd."/Suket-Lahir/".$bln[date('n')].date('/yy');
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
            'nama_anak' => ['required'],
            'tempat_lahir_anak' => ['required'],
            'jam_lahir' => ['required'],
            'anak_ke' => ['required'],
            'nik_pemohon' => ['required', 'string', 'min:16', 'max:16'],
            'nik_ibu' => ['required', 'string', 'min:16', 'max:16']
        ], $message);  

        $data['no_surat'] = $request->no_surat;
        $data['status_surat'] = $request->status_surat;
        $data['id_warga'] = $request->id_warga;
        $data_detail['nama_anak'] = $request->nama_anak;
        $data_detail['tempat_lahir_anak'] = $request->tempat_lahir_anak;
        $data_detail['tanggal_lahir_anak'] = $request->tanggal_lahir_anak;
        $data_detail['jenis_kelamin'] = $request->jenis_kelamin;
        $data_detail['jam_lahir'] = $request->jam_lahir;
        $data_detail['anak_ke'] = $request->anak_ke;
        $data_detail['nik_pemohon'] = $request->nik_pemohon;
        $data_detail['nik_ibu'] = $request->nik_ibu;
        $image1 = $request->file('foto_pengantar');
        $image2 = $request->file('foto_kk');
        $image3 = $request->file('foto_ktp');
        $image4 = $request->file('foto_suratnikah');
        $image5 = $request->file('foto_suratkelahiran');
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
            $data['foto_suratnikah'] = $image_url;
        } 
        if($image5 != null){
            $image_name = $image5->getClientOriginalName();
            $image_full_name = date('d-M-Yh-i-s').rand(10,100)."".$image_name;
            
            $upload_path = 'public/media/';
            $image_url = $upload_path.$image_full_name;
            $succes = $image5->move($upload_path, $image_full_name);
            $data['foto_suratkelahiran'] = $image_url;
        } 
            $lahir = DB::table('persuratan')->insertGetId($data);
            $data_detail['id_persuratan'] = $lahir;
            $lahir = DB::table('detail_kelahiran')->insertGetId($data_detail);

            return redirect()->route('kelahiran.index')
                            ->with('success', 'Product Created Successfully!');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Kelahiran  $kelahiran
     * @return \Illuminate\Http\Response
     */
    public function show(Kelahiran $kelahiran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kelahiran  $kelahiran
     * @return \Illuminate\Http\Response
     */
    public function edit($id_persuratan)
    {   
        $lahir = DB::table('persuratan') 
        ->join('warga', 'persuratan.id_warga','=','warga.id_warga')
        ->join('detail_kelahiran','persuratan.id_persuratan','=','detail_kelahiran.id_persuratan')
        ->select('warga.id_warga','warga.no_nik', 'warga.nama_lengkap', 'warga.tempat_lahir', 'warga.tanggal_lahir', 'warga.agama', 'warga.pekerjaan','warga.alamat', 'persuratan.id_persuratan','persuratan.no_surat','persuratan.status_surat', 'detail_kelahiran.nama_anak', 'detail_kelahiran.tempat_lahir_anak',  'detail_kelahiran.tanggal_lahir_anak', 'detail_kelahiran.jenis_kelamin', 'detail_kelahiran.jam_lahir', 'detail_kelahiran.anak_ke','detail_kelahiran.nik_pemohon', 'detail_kelahiran.nik_ibu' )
        ->where('persuratan.id_persuratan',$id_persuratan)
        ->first();
        
        $data_anak = DB::table('warga')
        ->where('no_nik', $lahir->nik_ibu)
        ->first();
        
        return view('admin.suket-kelahiran.edit', compact('lahir', 'data_anak'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kelahiran  $kelahiran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_persuratan)
    {
        $data['status_surat'] = $request->status_surat;
        $data_detail['nama_anak'] = $request->nama_anak;
        $data_detail['tempat_lahir_anak'] = $request->tempat_lahir_anak;
        $data_detail['tanggal_lahir_anak'] = $request->tanggal_lahir_anak;
        $data_detail['jenis_kelamin'] = $request->jenis_kelamin;
        $data_detail['jam_lahir'] = $request->jam_lahir;
        $data_detail['anak_ke'] = $request->anak_ke;

        $id_persuratan = DB::table('detail_kelahiran')->select('id_persuratan')->where('id_persuratan', $id_persuratan)->first();
        $lahir = DB::table('persuratan')->where('id_persuratan', $id_persuratan->id_persuratan)->update($data);
        $lahir = DB::table('detail_kelahiran')->where('id_persuratan', $id_persuratan->id_persuratan)->update($data_detail);
        

            return redirect()->route('kelahiran.index')
                            ->with('success', 'Data Berhasil diupdate!');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kelahiran  $kelahiran
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_persuratan)
    {
        $data = DB::table('persuratan')->where('id_persuratan', $id_persuratan)->first();
       
        $lahir = DB::table('persuratan')->where('id_persuratan', $id_persuratan)->delete();
        
        
        return redirect()->route('kelahiran.index')
        ->with('success', 'Data Delete Successfully!');
    }

    public function cetak_pdf($id_persuratan)
    {
        $lahir = DB::table('persuratan') 
        ->join('warga', 'persuratan.id_warga','=','warga.id_warga')
        ->join('detail_kelahiran','persuratan.id_persuratan','=','detail_kelahiran.id_persuratan')
        ->select('warga.id_warga','warga.no_nik', 'warga.nama_lengkap', 'warga.tempat_lahir', 'warga.tanggal_lahir', 'warga.agama', 'warga.pekerjaan','warga.alamat', 'persuratan.id_persuratan','persuratan.no_surat', 'persuratan.tgl_pembuatan','persuratan.status_surat', 'detail_kelahiran.nama_anak', 'detail_kelahiran.tempat_lahir_anak',  'detail_kelahiran.tanggal_lahir_anak', 'detail_kelahiran.jenis_kelamin', 'detail_kelahiran.jam_lahir', 'detail_kelahiran.anak_ke','detail_kelahiran.nik_ayah', 'detail_kelahiran.nik_ibu' )
        ->where('persuratan.id_persuratan',$id_persuratan)
        ->first();

        $data_anak = DB::table('warga')
        ->where('no_nik', $lahir->nik_ibu)
        ->first();
        
        
        
        $pdf = PDF::loadview('admin.suket-kelahiran.print',compact('lahir', 'data_anak'));
        $pdf->setPaper('Legal','potrait');
        return $pdf->download('suket kelahiran.pdf');
        
    }

   
}
