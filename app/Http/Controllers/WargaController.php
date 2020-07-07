<?php

namespace App\Http\Controllers;

use App\Warga;
use Illuminate\Http\Request;

class WargaController extends Controller
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
        $warga = Warga::all();
        return view('data-warga.data_warga', compact('warga'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $warga = Warga::all();
        return view('data-warga.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'no_kk' => 'required|max:16',
            'no_nik' => 'required|max:16',
            'nama_lengkap' => 'required|max:255',
            'jenis_kelamin' => 'required|max:255',
            'tempat_lahir' => 'required|max:255',
            'tanggal_lahir' => 'required|max:255',
            'pendidikan' => 'required|max:255',
            'pekerjaan' => 'required|max:255',
            'status_perkawinan' => 'required|max:255',
            'nama_ayah' => 'required|max:255',
            'nama_ibu' => 'required|max:255',
            'alamat' => 'required|max:255'

        ]);

        $warga = new Warga([
            'no_kk' => $request->get('no_kk'),
            'no_nik' => $request->get('no_nik'),
            'nama_lengkap' => $request->get('nama_lengkap'),
            'jenis_kelamin' => $request->get('jenis_kelamin'),
            'tempat_lahir' => $request->get('tempat_lahir'),
            'tanggal_lahir' => $request->get('tanggal_lahir'),
            'pendidikan' => $request->get('pendidikan'),
            'pekerjaan' => $request->get('pekerjaan'),
            'status_perkawinan' => $request->get('status_perkawinan'),
            'nama_ayah' => $request->get('nama_ayah'),
            'nama_ibu' => $request->get('nama_ibu'),
            'alamat' => $request->get('alamat'),
        ]);

        $warga->save();
        return redirect ('/datawarga')->with('success', 'Data Berhasil disimpan !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Warga  $warga
     * @return \Illuminate\Http\Response
     */
    public function show($id_warga)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Warga  $warga
     * @return \Illuminate\Http\Response
     */
    public function edit($id_warga)
    {
        $warga = Warga::find($id_warga);
        return view('data-warga.edit', compact('warga'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Warga  $warga
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_warga)
    {
        $request->validate([
            'no_kk' => 'required|max:16',
            'no_nik' => 'required|max:16',
            'nama_lengkap' => 'required|max:255',
            'jenis_kelamin' => 'required|max:255',
            'tempat_lahir' => 'required|max:255',
            'tanggal_lahir' => 'required|max:255',
            'pendidikan' => 'required|max:255',
            'pekerjaan' => 'required|max:255',
            'status_perkawinan' => 'required|max:255',
            'nama_ayah' => 'required|max:255',
            'nama_ibu' => 'required|max:255',
            'alamat' => 'required|max:255'

        ]);

        $warga = Warga::find($id_warga);
        $warga->no_kk = $request->get('no_kk');
        $warga->no_nik = $request->get('no_nik');
        $warga->nama_lengkap = $request->get('nama_lengkap');
        $warga->jenis_kelamin = $request->get('jenis_kelamin');
        $warga->tempat_lahir = $request->get('tempat_lahir');
        $warga->tanggal_lahir = $request->get('tanggal_lahir');
        $warga->pendidikan = $request->get('pendidikan');
        $warga->pekerjaan = $request->get('pekerjaan');
        $warga->status_perkawinan = $request->get('status_perkawinan');
        $warga->nama_ayah = $request->get('nama_ayah');
        $warga->nama_ibu = $request->get('nama_ibu');
        $warga->alamat = $request->get('alamat'); 
        $warga->save();

        return redirect ('/datawarga')->with('success', 'Data Berhasil diupdate !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Warga  $warga
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_warga)
    {
        $warga = Warga::find($id_warga);
        $warga->delete();

        return redirect('/datawarga')->with('success', 'Berhasil di hapus !');
    }
}
