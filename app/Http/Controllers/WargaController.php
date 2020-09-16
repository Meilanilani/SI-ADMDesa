<?php

namespace App\Http\Controllers;

use App\User;
use App\Warga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        return view('admin.data-warga.data_warga', compact('warga'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $warga = Warga::all();
        return view('admin.data-warga.create');
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
            'min' => 'Minimal harus 16 karakter',
            'max' => 'Maximal harus 16 karakter'
        ];

        $this->validate($request,[
            'no_kk' => 'required|min:16|max:16',
            'no_nik' => 'required|max:16|min:16|max:16',
            'nama_lengkap' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'pendidikan' => 'required',
            'pekerjaan' => 'required',
            'status_perkawinan' => 'required',
            'status_hub_keluarga' => 'required',
            'nama_ayah' => 'required',
            'nama_ibu' => 'required',
            'alamat' => 'required',
        ], $message); 

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
            'status_hub_keluarga' => $request->get('status_hub_keluarga'),
            'nama_ayah' => $request->get('nama_ayah'),
            'nama_ibu' => $request->get('nama_ibu'),
            'alamat' => $request->get('alamat'),
        ]);

        $warga->save();

        if($request->get('status_hub_keluarga')=='Kepala Keluarga'){
            $user = new User();
            $user->name = $request->get('no_nik');
            $user->password = bcrypt($request->get('no_nik'));
            $user->save();

        }
        
        return redirect ('/data-warga')->with('success', 'Data Berhasil disimpan !');
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
        return view('admin.data-warga.edit', compact('warga'));
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
        $message =[
            'required' => 'Isi tidak boleh kosong',
            'min' => 'Minimal harus 16 karakter',
            'max' => 'Maximal harus 16 karakter'
        ];

        $this->validate($request,[
            'no_kk' => 'required|min:16|max:16',
            'no_nik' => 'required|max:16|min:16|max:16',
            'nama_lengkap' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'pendidikan' => 'required',
            'pekerjaan' => 'required',
            'status_perkawinan' => 'required',
            'status_hub_keluarga' => 'required',
            'nama_ayah' => 'required',
            'nama_ibu' => 'required',
            'alamat' => 'required',
        ], $message); 

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

        return redirect ('/data-warga')->with('success', 'Data Berhasil diupdate !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Warga  $warga
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_warga)
    {
        $data = DB::table('warga')->where('id_warga', $id_warga)->delete();
        
        return redirect()->route('warga.index')
        ->with('success', 'Data Berhasil Dihapus!');
    }
}
