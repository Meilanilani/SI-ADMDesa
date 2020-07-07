<?php

namespace App\Http\Controllers;

use App\Persuratan;
use App\DomisiliLembaga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DomisiliLembagaController extends Controller
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
        $lembaga = DB::table('persuratan') 
        ->join('domisili_lembaga','persuratan.id_persuratan','=','domisili_lembaga.id_persuratan')
        ->select('domisili_lembaga.id_domisili_lembaga','persuratan.id_persuratan', 'persuratan.no_surat','persuratan.ket_keperluan_surat', 'persuratan.foto_pengantar', 'persuratan.foto_kk', 'persuratan.foto_ktp', 'persuratan.foto_akta_notaris','persuratan.tgl_pembuatan','persuratan.status_surat', 'domisili_lembaga.nama_lembaga', 'domisili_lembaga.alamat_lembaga', 'domisili_lembaga.no_telp_lembaga', 'domisili_lembaga.bidang_lembaga','domisili_lembaga.jumlah_pegawai', 'domisili_lembaga.jam_kerja')
        ->get();
        return view('suket-domisili-lembaga.domisili_lembaga', compact('lembaga'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lembaga = DomisiliLembaga::all();
        return view('suket-domisili-lembaga.create', compact('lembaga'));
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
        $data2['nama_lembaga'] = $request->nama_lembaga;
        $data2['alamat_lembaga'] = $request->alamat_lembaga;
        $data2['no_telp_lembaga'] = $request->no_telp_lembaga;
        $data2['bidang_lembaga'] = $request->bidang_lembaga;
        $data2['jumlah_pegawai'] = $request->jumlah_pegawai;
        $data2['jam_kerja'] = $request->jam_kerja;
        $data['tgl_pembuatan'] = $request->tgl_pembuatan;
        $data['status_surat'] = $request->status_surat;

        $image1 = $request->file('foto_pengantar');
        $image2 = $request->file('foto_kk');
        $image3 = $request->file('foto_ktp');
        $image4 = $request->file('foto_akta_notaris');
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
            $data['foto_akta_notaris'] = $image_url;
        } 
            $lembaga = DB::table('persuratan')->insertGetId($data);
            $data2['id_persuratan'] = $lembaga;
            $lembaga = DB::table('domisili_lembaga')->insertGetId($data2);

            return redirect()->route('lembaga.index')
                            ->with('success', 'Data Berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DomisiliLembaga  $domisiliLembaga
     * @return \Illuminate\Http\Response
     */
    public function show(DomisiliLembaga $domisiliLembaga)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DomisiliLembaga  $domisiliLembaga
     * @return \Illuminate\Http\Response
     */
    public function edit($id_domisili_lembaga)
    {
        $lembaga = DB::table('persuratan') 
        ->join('domisili_lembaga','persuratan.id_persuratan','=','domisili_lembaga.id_persuratan')
        ->select('domisili_lembaga.id_domisili_lembaga','persuratan.id_persuratan', 'persuratan.no_surat','persuratan.ket_keperluan_surat', 'persuratan.foto_pengantar', 'persuratan.foto_kk', 'persuratan.foto_ktp', 'persuratan.foto_akta_notaris','persuratan.tgl_pembuatan','persuratan.status_surat', 'domisili_lembaga.nama_lembaga', 'domisili_lembaga.alamat_lembaga', 'domisili_lembaga.no_telp_lembaga', 'domisili_lembaga.bidang_lembaga','domisili_lembaga.jumlah_pegawai', 'domisili_lembaga.jam_kerja')
        ->where('id_domisili_lembaga',$id_domisili_lembaga)
        ->first();
        return view('suket-domisili-lembaga.edit', compact('lembaga'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DomisiliLembaga  $domisiliLembaga
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_domisili_lembaga)
    {
        $data['no_surat'] = $request->no_surat;
        $data2['nama_lembaga'] = $request->nama_lembaga;
        $data2['alamat_lembaga'] = $request->alamat_lembaga;
        $data2['no_telp_lembaga'] = $request->no_telp_lembaga;
        $data2['bidang_lembaga'] = $request->bidang_lembaga;
        $data2['jumlah_pegawai'] = $request->jumlah_pegawai;
        $data2['jam_kerja'] = $request->jam_kerja;
        $data['tgl_pembuatan'] = $request->tgl_pembuatan;
        $data['status_surat'] = $request->status_surat;

        $image1 = $request->file('foto_pengantar');
        $image2 = $request->file('foto_kk');
        $image3 = $request->file('foto_ktp');
        $image4 = $request->file('foto_akta_notaris');
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
            $data['foto_akta_notaris'] = $image_url;
        } 
        $id_persuratan = DB::table('domisili_lembaga')->select('id_persuratan')->where('id_domisili_lembaga', $id_domisili_lembaga)->first();
        $lahir = DB::table('persuratan')->where('id_persuratan', $id_persuratan->id_persuratan)->update($data);
        
        $lahir = DB::table('domisili_lembaga')->where('id_domisili_lembaga', $id_domisili_lembaga)->update($data2);

        return redirect()->route('lembaga.index')
                        ->with('success', 'Data Berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DomisiliLembaga  $domisiliLembaga
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_domisili_lembaga)
    {
        $lembaga = DB::table('persuratan') 
        ->join('domisili_lembaga','persuratan.id_persuratan','=','domisili_lembaga.id_persuratan')
        ->select('domisili_lembaga.id_domisili_lembaga','persuratan.id_persuratan', 'persuratan.no_surat','persuratan.ket_keperluan_surat', 'persuratan.foto_pengantar', 'persuratan.foto_kk', 'persuratan.foto_ktp', 'persuratan.foto_akta_notaris','persuratan.tgl_pembuatan','persuratan.status_surat', 'domisili_lembaga.nama_lembaga', 'domisili_lembaga.alamat_lembaga', 'domisili_lembaga.no_telp_lembaga', 'domisili_lembaga.bidang_lembaga','domisili_lembaga.jumlah_pegawai', 'domisili_lembaga.jam_kerja')
        ->where('id_domisili_lembaga',$id_domisili_lembaga)
        ->delete();
        
        return redirect()->route('lembaga.index')
        ->with('success', 'Data Berhasil dihapus!');
}
}
