<?php

namespace App\Http\Controllers;

use Datatables;
use App\Pengguna;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Validator;

class PenggunaController extends Controller
{
    public function __construct()
    {
        
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengguna = User::all();
        return view('admin.data-pengguna.data_pengguna', compact('pengguna'));
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
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:users,name'],
            'password' => ['required', 'string', 'min:8'],
        ]);
        
        $data['name'] = $request->name;
        $data['password'] = Hash::make($request->password); 
        $pengguna = DB::table('users')->insertGetId($data);
            return redirect()->route('pengguna.index')
                             ->with('success', 'Data Berhasil ditambahkan!');
    }
                                                       
    /**
     * Display the specified resource.
     *
     * @param  \App\Pengguna  $pengguna
     * @return \Illuminate\Http\Response
     */
    public function show(Pengguna $pengguna)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pengguna  $pengguna
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pengguna = DB::table('users') 
        ->where('users.id',$id)
        ->first();

        return view('admin.data-pengguna.edit', compact('pengguna'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pengguna  $pengguna
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $message =[
            'required' => 'Password tidak boleh kosong',
            'min' => 'Password harus 8 Karakter'
        ];

        $this->validate($request,[
            'password' => ['required', 'string', 'min:8']
        ], $message);   

       

        $data['name'] = $request->name;
        $data['password'] = Hash::make($request->password); 

        $pengguna = DB::table('users')->where('id', $id)->update($data);
        return redirect()->route('pengguna.index')
                            ->with('success', 'Data berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pengguna  $pengguna
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = DB::table('users')->where('id', $id)->delete();
        
        return redirect()->route('pengguna.index')
        ->with('success', 'Data Berhasil Dihapus!');
    }
}
