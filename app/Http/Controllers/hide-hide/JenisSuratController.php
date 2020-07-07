<?php

namespace App\Http\Controllers;

use App\JenisSurat;
use Illuminate\Http\Request;

class JenisSuratController extends Controller
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
        $jsurat = JenisSurat::all();
        return view('jenissurat.jenis_surat', compact('jsurat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jsurat = JenisSurat::all();
        return view('jenissurat.create');
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
            'nama_surat' => 'required|max:50',
        ]);

        $jsurat = new JenisSurat([
            'nama_surat' => $request->get('nama_surat'),
        ]);

        $jsurat->save();
        return redirect ('/jenissurat')->with('success', 'Data Berhasil disimpan !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\JenisSurat  $jenisSurat
     * @return \Illuminate\Http\Response
     */
    public function show(JenisSurat $jenisSurat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\JenisSurat  $jenisSurat
     * @return \Illuminate\Http\Response
     */
    public function edit(JenisSurat $jenisSurat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\JenisSurat  $jenisSurat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JenisSurat $jenisSurat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\JenisSurat  $jenisSurat
     * @return \Illuminate\Http\Response
     */
    public function destroy(JenisSurat $jenisSurat)
    {
        //
    }
}
