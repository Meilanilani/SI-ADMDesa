<?php

namespace App\Http\Controllers;

use App\Kelahiran;
use App\Warga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        ->join('ket_kelahiran','persuratan.id_persuratan','=','ket_kelahiran.id_persuratan')
        ->select('ket_kelahiran.id_ket_kelahiran','persuratan.id_persuratan', 'persuratan.no_surat','persuratan.ket_keperluan_surat', 'persuratan.foto_pengantar', 'persuratan.foto_kk', 'persuratan.foto_ktp','persuratan.foto_suratnikah','persuratan.foto_suratkelahiran','persuratan.tgl_pembuatan','persuratan.status_surat','ket_kelahiran.jam_lahir', 'ket_kelahiran.hari_lahir', 'ket_kelahiran.anak_ke')
        ->get();
        return view('suket-kelahiran.kelahiran', compact('lahir'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lahir = Kelahiran::all();
        $lahir = Warga::all();
        return view('suket-kelahiran.create', compact('lahir'));
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
        $data2['hari_lahir'] = $request->hari_lahir;
        $data2['jam_lahir'] = $request->jam_lahir;
        $data2['anak_ke'] = $request->anak_ke;
       
        $data['tgl_pembuatan'] = $request->tgl_pembuatan;
        $data['status_surat'] = $request->status_surat;

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
            $data2['id_persuratan'] = $lahir;
            $lahir = DB::table('ket_kelahiran')->insertGetId($data2);

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
    public function edit($id_ket_kelahiran)
    {   
        $lahir = DB::table('persuratan') 
        ->join('ket_kelahiran','persuratan.id_persuratan','=','ket_kelahiran.id_persuratan')
        ->select('ket_kelahiran.id_ket_kelahiran','persuratan.id_persuratan', 'persuratan.no_surat','persuratan.ket_keperluan_surat', 'persuratan.foto_pengantar', 'persuratan.foto_kk', 'persuratan.foto_ktp','persuratan.foto_suratnikah','persuratan.foto_suratkelahiran','persuratan.tgl_pembuatan','persuratan.status_surat','ket_kelahiran.jam_lahir', 'ket_kelahiran.hari_lahir', 'ket_kelahiran.anak_ke')
        ->where('id_ket_kelahiran',$id_ket_kelahiran)
        ->first();
        return view('suket-kelahiran.edit', compact('lahir'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kelahiran  $kelahiran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_ket_kelahiran)
    {
        $data['no_surat'] = $request->no_surat;
        $data2['hari_lahir'] = $request->hari_lahir;
        $data2['jam_lahir'] = $request->jam_lahir;
        $data2['anak_ke'] = $request->anak_ke;
       
        $data['tgl_pembuatan'] = $request->tgl_pembuatan;
        $data['status_surat'] = $request->status_surat;

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
            $id_persuratan = DB::table('ket_kelahiran')->select('id_persuratan')->where('id_ket_kelahiran', $id_ket_kelahiran)->first();
            $lahir = DB::table('persuratan')->where('id_persuratan', $id_persuratan->id_persuratan)->update($data);
            
            $lahir = DB::table('ket_kelahiran')->where('id_ket_kelahiran', $id_ket_kelahiran)->update($data2);

            return redirect()->route('kelahiran.index')
                            ->with('success', 'Data Berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kelahiran  $kelahiran
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_ket_kelahiran)
    {
        $lahir = DB::table('persuratan') 
        ->join('ket_kelahiran','persuratan.id_persuratan','=','ket_kelahiran.id_persuratan')
        ->select('ket_kelahiran.id_ket_kelahiran','persuratan.id_persuratan', 'persuratan.no_surat','persuratan.ket_keperluan_surat', 'persuratan.foto_pengantar', 'persuratan.foto_kk', 'persuratan.foto_ktp','persuratan.foto_suratnikah','persuratan.foto_suratkelahiran','persuratan.tgl_pembuatan','persuratan.status_surat','ket_kelahiran.jam_lahir', 'ket_kelahiran.hari_lahir', 'ket_kelahiran.anak_ke')
        ->where('id_ket_kelahiran',$id_ket_kelahiran)
        ->delete();
        
        return redirect()->route('kelahiran.index')
        ->with('success', 'Data Delete Successfully!');
    }

   
}
