<?php

namespace App\Http\Controllers;

use App\Kematian;
use App\Warga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        ->join('ket_kematian','persuratan.id_persuratan','=','ket_kematian.id_persuratan')
        ->select('ket_kematian.id_kematian','persuratan.id_persuratan', 'persuratan.no_surat', 'persuratan.foto_pengantar', 'persuratan.foto_kk', 'persuratan.foto_ktp','persuratan.foto_suratkematianrs','persuratan.tgl_pembuatan','persuratan.status_surat','ket_kematian.hari_kematian', 'ket_kematian.tgl_kematian', 'ket_kematian.tempat_kematian', 'ket_kematian.penyebab_kematian')
        ->get();
        return view('suket-kematian.suket_kematian', compact('kematian'));
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
        return view('suket-kematian.create', compact('kematian'));
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
        $data2['hari_kematian'] = $request->hari_kematian;
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
            $kematian = DB::table('ket_kematian')->insertGetId($data2);

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
    public function edit($id_kematian)
    {
        
        $kematian = DB::table('persuratan') 
        ->join('ket_kematian','persuratan.id_persuratan','=','ket_kematian.id_persuratan')
        ->select('ket_kematian.id_kematian','persuratan.id_persuratan', 'persuratan.no_surat', 'persuratan.foto_pengantar', 'persuratan.foto_kk', 'persuratan.foto_ktp','persuratan.foto_suratkematianrs','persuratan.tgl_pembuatan','persuratan.status_surat','ket_kematian.hari_kematian', 'ket_kematian.tgl_kematian', 'ket_kematian.tempat_kematian', 'ket_kematian.penyebab_kematian')
        ->where('id_kematian',$id_kematian)
        ->first();
        return view('suket-kematian.edit', compact('kematian'));
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
        $data2['hari_kematian'] = $request->hari_kematian;
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
    public function destroy($id_kematian)
    {
        $kematian = DB::table('persuratan') 
        ->join('ket_kematian','persuratan.id_persuratan','=','ket_kematian.id_persuratan')
        ->select('ket_kematian.id_kematian','persuratan.id_persuratan', 'persuratan.no_surat', 'persuratan.foto_pengantar', 'persuratan.foto_kk', 'persuratan.foto_ktp','persuratan.foto_suratkematianrs','persuratan.tgl_pembuatan','persuratan.status_surat','ket_kematian.hari_kematian', 'ket_kematian.tgl_kematian', 'ket_kematian.tempat_kematian', 'ket_kematian.penyebab_kematian')
        ->where('id_kematian',$id_kematian)
        ->delete();
        
        return redirect()->route('kematian.index')
        ->with('success', 'Data Berhasil dihapus!');
    }
}
