<?php

namespace App\Http\Controllers\Api;

use Validator;
use App\Persuratan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SuratApi extends Controller
{
    public function index($user_id)
    {
        $surat = Persuratan::get();

        if($surat)
            return[
                'status'    => false,
                'message'   => "Anda belum membuat satupun surat.",
            ];
        else
            return[
                'status'    => true,
                'message'   => "Data surat berhasil diambil.",
                'data'      => $surat
            ];
    }

    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), 
            // rules
            [
                'user_id'               => 'required|numeric',
                'foto_pengantar'        => 'required|mimes:jpeg,png,bmp,tiff |max:4096',
                'foto_kk'               => 'required|mimes:jpeg,png,bmp,tiff |max:4096',
                'foto_ktp'              => 'required|mimes:jpeg,png,bmp,tiff |max:4096',
                'foto_suratnikah'       => 'required|mimes:jpeg,png,bmp,tiff |max:4096',
                'foto_suratkelahiran'   => 'required|mimes:jpeg,png,bmp,tiff |max:4096'
            ],
            //error's message : 
            [
                'email'     => "Email kamu tidak valid",
                'required'  => 'Kolom :attribute tidak boleh kosong!',
                'mimes'     => 'Tolong pilih file gambar yang valid untuk diupload.'
            ]
        );

        if($validation->fails())
            return [
                'status'    => false,
                'message'   => $validation->errors()->first()
            ];

        /*
            uploading file to server
        */
        $pengantar  = $this->upload_image($request, 'foto_pengantar');
        $kk         = $this->upload_image($request, 'foto_kk');
        $ktp        = $this->upload_image($request, 'foto_ktp');
        $nikah      = $this->upload_image($request, 'foto_suratnikah', 'foto_surat_nikah');
        $kelahiran  = $this->upload_image($request, 'foto_suratkelahiran', 'foto_surat_kelahiran');
        
        $persuratan = new Persuratan();
        $persuratan->id_warga               = 1;
        $persuratan->no_surat               = 1;
        $persuratan->tgl_pembuatan          = date('Y-m-d');
        $persuratan->status_surat           = "Proses";
        $persuratan->foto_kk                = $kk;
        $persuratan->foto_ktp               = $ktp;
        $persuratan->foto_suratnikah        = $nikah;
        $persuratan->foto_pengantar         = $pengantar;
        $persuratan->foto_suratkelahiran    = $kelahiran;

        if($persuratan->save())
            return [
                'status'    => true,
                'message'   => "Permohonan anda akan segera kami proses.",
                'data'      => $persuratan
            ];
        else
            return [
                'status'    => false,
                'message'   => "Permohonan gagal disimpan"
            ];
    }

    public function upload_image(Request $request, $requestName, $folder ="")
    {
        if($folder == "")
            $folder = $requestName;

        $file       = $request->file($requestName);
        $ext        = $file->getClientOriginalExtension();
        $newName    = rand(100000,1001238912).".".$ext;
        $path       = $folder.'/'.$newName;
        $file->move($folder, $newName);

        return $path;
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
