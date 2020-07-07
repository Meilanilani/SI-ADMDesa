<?php

namespace App\Http\Controllers;

use App\TaksiranTanah;
use App\Warga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaksiranTanahController extends Controller
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
        $tanah = DB::table('persuratan') 
        ->join('ket_taksiran_tanah','persuratan.id_persuratan','=','ket_taksiran_tanah.id_persuratan')
        ->select('ket_taksiran_tanah.id_ket_taksiran_tanah','persuratan.id_persuratan', 'persuratan.no_surat','persuratan.foto_pengantar', 'persuratan.foto_kk', 'persuratan.foto_ktp', 'persuratan.foto_sertifikat_tanah', 'persuratan.foto_sptpbb', 'persuratan.tgl_pembuatan','persuratan.status_surat','ket_taksiran_tanah.no_sertifikat_tanah', 'ket_taksiran_tanah.luas_tanah', 'ket_taksiran_tanah.pemilik_batas_utara', 'ket_taksiran_tanah.pemilik_batas_selatan', 'ket_taksiran_tanah.pemilik_batas_timur', 'ket_taksiran_tanah.pemilik_batas_barat', 'ket_taksiran_tanah.tgl_kepemilikan', 'ket_taksiran_tanah.harga_tanah', 'ket_taksiran_tanah.harga_bangunan')
        ->get();
        return view('suket-taksiran-tanah.suket_taksiran_tanah', compact('tanah'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tanah = TaksiranTanah::all();
        $tanah = Warga::all();
        return view('suket-taksiran-tanah.create', compact('tanah'));
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
        $data2['no_sertifikat_tanah'] = $request->no_sertifikat_tanah;
        $data2['luas_tanah'] = $request->luas_tanah;
        $data2['pemilik_batas_utara'] = $request->pemilik_batas_utara;
        $data2['pemilik_batas_selatan'] = $request->pemilik_batas_selatan;
        $data2['pemilik_batas_barat'] = $request->pemilik_batas_barat;
        $data2['pemilik_batas_timur'] = $request->pemilik_batas_timur;
        $data2['tgl_kepemilikan'] = $request->tgl_kepemilikan;
        $data2['harga_tanah'] = $request->harga_tanah;
        $data2['harga_bangunan'] = $request->harga_bangunan;
        $data['tgl_pembuatan'] = $request->tgl_pembuatan;
        $data['status_surat'] = $request->status_surat;

        $image1 = $request->file('foto_pengantar');
        $image2 = $request->file('foto_kk');
        $image3 = $request->file('foto_ktp');
        $image4 = $request->file('foto_sertifikat_tanah');
        $image5 = $request->file('foto_sptpbb');
        
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
            $data['foto_sertifikat_tanah'] = $image_url;
        } 
        if($image5 != null){
            $image_name = $image5->getClientOriginalName();
            $image_full_name = date('d-M-Yh-i-s').rand(10,100)."".$image_name;
            
            $upload_path = 'public/media/';
            $image_url = $upload_path.$image_full_name;
            $succes = $image5->move($upload_path, $image_full_name);
            $data['foto_sptpbb'] = $image_url;
        } 
       
            $tanah = DB::table('persuratan')->insertGetId($data);
            $data2['id_persuratan'] = $tanah;
            $tanah = DB::table('ket_taksiran_tanah')->insertGetId($data2);

            return redirect()->route('tanah.index')
                            ->with('success', 'Data Berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TaksiranTanah  $taksiranTanah
     * @return \Illuminate\Http\Response
     */
    public function show(TaksiranTanah $taksiranTanah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TaksiranTanah  $taksiranTanah
     * @return \Illuminate\Http\Response
     */
    public function edit($id_ket_taksiran_tanah)
    {
        $tanah = DB::table('persuratan') 
        ->join('ket_taksiran_tanah','persuratan.id_persuratan','=','ket_taksiran_tanah.id_persuratan')
        ->select('ket_taksiran_tanah.id_ket_taksiran_tanah','persuratan.id_persuratan', 'persuratan.no_surat','persuratan.foto_pengantar', 'persuratan.foto_kk', 'persuratan.foto_ktp', 'persuratan.foto_sertifikat_tanah', 'persuratan.foto_sptpbb', 'persuratan.tgl_pembuatan','persuratan.status_surat','ket_taksiran_tanah.no_sertifikat_tanah', 'ket_taksiran_tanah.luas_tanah', 'ket_taksiran_tanah.pemilik_batas_utara', 'ket_taksiran_tanah.pemilik_batas_selatan', 'ket_taksiran_tanah.pemilik_batas_timur', 'ket_taksiran_tanah.pemilik_batas_barat', 'ket_taksiran_tanah.tgl_kepemilikan', 'ket_taksiran_tanah.harga_tanah', 'ket_taksiran_tanah.harga_bangunan')
        ->where('id_ket_taksiran_tanah',$id_ket_taksiran_tanah)
        ->first();
        return view('suket-taksiran-tanah.edit', compact('tanah'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TaksiranTanah  $taksiranTanah
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_ket_taksiran_tanah)
    {
        $data['no_surat'] = $request->no_surat;
        $data2['no_sertifikat_tanah'] = $request->no_sertifikat_tanah;
        $data2['luas_tanah'] = $request->luas_tanah;
        $data2['pemilik_batas_utara'] = $request->pemilik_batas_utara;
        $data2['pemilik_batas_selatan'] = $request->pemilik_batas_selatan;
        $data2['pemilik_batas_barat'] = $request->pemilik_batas_barat;
        $data2['pemilik_batas_timur'] = $request->pemilik_batas_timur;
        $data2['tgl_kepemilikan'] = $request->tgl_kepemilikan;
        $data2['harga_tanah'] = $request->harga_tanah;
        $data2['harga_bangunan'] = $request->harga_bangunan;
        $data['tgl_pembuatan'] = $request->tgl_pembuatan;
        $data['status_surat'] = $request->status_surat;

        $image1 = $request->file('foto_pengantar');
        $image2 = $request->file('foto_kk');
        $image3 = $request->file('foto_ktp');
        $image4 = $request->file('foto_sertifikat_tanah');
        $image5 = $request->file('foto_sptpbb');
        
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
            $data['foto_sertifikat_tanah'] = $image_url;
        } 
        if($image5 != null){
            $image_name = $image5->getClientOriginalName();
            $image_full_name = date('d-M-Yh-i-s').rand(10,100)."".$image_name;
            
            $upload_path = 'public/media/';
            $image_url = $upload_path.$image_full_name;
            $succes = $image5->move($upload_path, $image_full_name);
            $data['foto_sptpbb'] = $image_url;
        } 
       
        $id_persuratan = DB::table('ket_taksiran_tanah')->select('id_persuratan')->where('id_ket_taksiran_tanah', $id_ket_taksiran_tanah)->first();
        $babinsa = DB::table('persuratan')->where('id_persuratan', $id_persuratan->id_persuratan)->update($data);
        
        $babinsa = DB::table('ket_taksiran_tanah')->where('id_ket_taksiran_tanah', $id_ket_taksiran_tanah)->update($data2);

        return redirect()->route('tanah.index')
                        ->with('success', 'Data Berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TaksiranTanah  $taksiranTanah
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_ket_taksiran_tanah)
    {
        $tanah = DB::table('persuratan') 
        ->join('ket_taksiran_tanah','persuratan.id_persuratan','=','ket_taksiran_tanah.id_persuratan')
        ->select('ket_taksiran_tanah.id_ket_taksiran_tanah','persuratan.id_persuratan', 'persuratan.no_surat','persuratan.foto_pengantar', 'persuratan.foto_kk', 'persuratan.foto_ktp', 'persuratan.foto_sertifikat_tanah', 'persuratan.foto_sptpbb', 'persuratan.tgl_pembuatan','persuratan.status_surat','ket_taksiran_tanah.no_sertifikat_tanah', 'ket_taksiran_tanah.luas_tanah', 'ket_taksiran_tanah.pemilik_batas_utara', 'ket_taksiran_tanah.pemilik_batas_selatan', 'ket_taksiran_tanah.pemilik_batas_timur', 'ket_taksiran_tanah.pemilik_batas_barat', 'ket_taksiran_tanah.tgl_kepemilikan', 'ket_taksiran_tanah.harga_tanah', 'ket_taksiran_tanah.harga_bangunan')
        ->where('id_ket_taksiran_tanah',$id_ket_taksiran_tanah)
        ->delete();

        return redirect()->route('tanah.index')
        ->with('success', 'Data Delete Successfully!');
    }
}
