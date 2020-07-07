<?php

namespace App\Http\Controllers;

use App\Babinsa;
use App\Warga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BabinsaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $babinsa = DB::table('persuratan') 
        ->join('ket_babinsa','persuratan.id_persuratan','=','ket_babinsa.id_persuratan')
        ->select('ket_babinsa.id_ket_babinsa','persuratan.id_persuratan', 'persuratan.no_surat','persuratan.foto_pengantar', 'persuratan.foto_kk', 'persuratan.foto_ktp','persuratan.tgl_pembuatan','persuratan.status_surat','ket_babinsa.nama_babinsa', 'ket_babinsa.pangkat_babinsa', 'ket_babinsa.jabatan_babinsa', 'ket_babinsa.tb_calon', 'ket_babinsa.bb_calon')
        ->get();
        return view('suket-babinsa.suket_babinsa', compact('babinsa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $babinsa = Babinsa::all();
        $babinsa = Warga::all();
        return view('suket-babinsa.create', compact('babinsa'));
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
        $data2['nama_babinsa'] = $request->nama_babinsa;
        $data2['pangkat_babinsa'] = $request->pangkat_babinsa;
        $data2['jabatan_babinsa'] = $request->jabatan_babinsa;
        $data2['tb_calon'] = $request->tb_calon;
        $data2['bb_calon'] = $request->bb_calon;
       
        $data['tgl_pembuatan'] = $request->tgl_pembuatan;
        $data['status_surat'] = $request->status_surat;

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
       
            $babinsa = DB::table('persuratan')->insertGetId($data);
            $data2['id_persuratan'] = $babinsa;
            $babinsa = DB::table('ket_babinsa')->insertGetId($data2);

            return redirect()->route('babinsa.index')
                            ->with('success', 'Data Berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Babinsa  $babinsa
     * @return \Illuminate\Http\Response
     */
    public function show(Babinsa $babinsa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Babinsa  $babinsa
     * @return \Illuminate\Http\Response
     */
    public function edit($id_ket_babinsa)
    {
        $babinsa = DB::table('persuratan') 
        ->join('ket_babinsa','persuratan.id_persuratan','=','ket_babinsa.id_persuratan')
        ->select('ket_babinsa.id_ket_babinsa','persuratan.id_persuratan', 'persuratan.no_surat','persuratan.foto_pengantar', 'persuratan.foto_kk', 'persuratan.foto_ktp','persuratan.tgl_pembuatan','persuratan.status_surat','ket_babinsa.nama_babinsa', 'ket_babinsa.pangkat_babinsa', 'ket_babinsa.jabatan_babinsa', 'ket_babinsa.tb_calon', 'ket_babinsa.bb_calon')
        ->where('id_ket_babinsa',$id_ket_babinsa)
        ->first();
        return view('suket-babinsa.edit', compact('babinsa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Babinsa  $babinsa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_ket_babinsa)
    {
        $data['no_surat'] = $request->no_surat;
        $data2['nama_babinsa'] = $request->nama_babinsa;
        $data2['pangkat_babinsa'] = $request->pangkat_babinsa;
        $data2['jabatan_babinsa'] = $request->jabatan_babinsa;
        $data2['tb_calon'] = $request->tb_calon;
        $data2['bb_calon'] = $request->bb_calon;
       
        $data['tgl_pembuatan'] = $request->tgl_pembuatan;
        $data['status_surat'] = $request->status_surat;

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
       
        $id_persuratan = DB::table('ket_babinsa')->select('id_persuratan')->where('id_ket_babinsa', $id_ket_babinsa)->first();
        $babinsa = DB::table('persuratan')->where('id_persuratan', $id_persuratan->id_persuratan)->update($data);
        
        $babinsa = DB::table('ket_babinsa')->where('id_ket_babinsa', $id_ket_babinsa)->update($data2);

        return redirect()->route('babinsa.index')
                        ->with('success', 'Data Berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Babinsa  $babinsa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_ket_babinsa)
    {
        $babinsa = DB::table('persuratan') 
        ->join('ket_babinsa','persuratan.id_persuratan','=','ket_babinsa.id_persuratan')
        ->select('ket_babinsa.id_ket_babinsa','persuratan.id_persuratan', 'persuratan.no_surat','persuratan.foto_pengantar', 'persuratan.foto_kk', 'persuratan.foto_ktp','persuratan.tgl_pembuatan','persuratan.status_surat','ket_babinsa.nama_babinsa', 'ket_babinsa.pangkat_babinsa', 'ket_babinsa.jabatan_babinsa', 'ket_babinsa.tb_calon', 'ket_babinsa.bb_calon')
        ->where('id_ket_babinsa',$id_ket_babinsa)
        ->delete();

        return redirect()->route('babinsa.index')
        ->with('success', 'Data Delete Successfully!');
    }
}
