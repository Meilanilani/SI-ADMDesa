<?php

namespace App\Http\Controllers;

use App\Persuratan;
use Illuminate\Http\Request;

class PersuratanController extends Controller
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
    public function index_sktm()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Persuratan  $persuratan
     * @return \Illuminate\Http\Response
     */
    public function show(Persuratan $persuratan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Persuratan  $persuratan
     * @return \Illuminate\Http\Response
     */
    public function edit(Persuratan $persuratan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Persuratan  $persuratan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Persuratan $persuratan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Persuratan  $persuratan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Persuratan $persuratan)
    {
        //
    }
}
