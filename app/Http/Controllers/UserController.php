<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.dashboard');
    }

    public function create_sktmsekolah()
    {
        return view('user.suket-pengajuan.create_sktmsekolah');
    }

    public function create_sktmrs()
    {
        return view('user.suket-pengajuan.create_sktmrs');
    }

    public function create_kelahiran()
    {
        return view('user.suket-pengajuan.create_kelahiran');
    }

    public function create_kematian()
    {
        return view('user.suket-pengajuan.create_kematian');
    }

    public function create_pengantarnikah()
    {
        return view('user.suket-pengajuan.create_pengantarnikah');
    }

    public function create_skck()
    {
        return view('user.suket-pengajuan.create_skck');
    }

    public function create_ktp()
    {
        return view('user.suket-pengajuan.create_ktp');
    }


    public function create_usaha()
    {
        return view('user.suket-pengajuan.create_usaha');
    }

    public function create_domisili()
    {
        return view('user.suket-pengajuan.create_domisili');
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
