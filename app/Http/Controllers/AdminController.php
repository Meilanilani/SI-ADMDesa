<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        return view('layouts.kop');
    } 
    public function datapengguna(){
        return view('admin.data_pengguna');
    }
    public function datawarga(){
        return view('admin.data_warga');
    }
}
