<?php

namespace App\Http\Controllers;

use App\Kematian;
use App\Notifications\KematianNotifikasiSelesai;
use App\User;
use App\Warga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PDF;

class KematianController extends Controller
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
        $kematian = DB::table('persuratan')
            ->join('warga', 'persuratan.id_warga', '=', 'warga.id_warga')
            ->select('warga.no_nik', 'warga.nama_lengkap', 'persuratan.id_persuratan', 'persuratan.no_surat', 'persuratan.created_at', 'persuratan.status_surat')
            ->where('no_surat', 'LIKE', '%Suket-KMT%')
            ->get();
        return view('admin.suket-kematian.suket_kematian', compact('kematian'));
    }

    public function autonumber()
    {
        $bln = array(1 => "I", "II", "III", "IV", "V", "VI", "VII", "VIII", "IX", "X", "XI", "XII");
        $query = DB::table('persuratan')
            ->select(DB::raw('MAX(LEFT(no_surat,3)) as no_max'))
            ->where('no_surat', 'LIKE', '%Suket-KMT%')->get();
        if ($query->count() > 0) {
            foreach ($query as $key) {
                $tmp = ((int)$key->no_max) + 1;
                $kd = sprintf("%03s", $tmp);
            }
        } else {
            $kd = "001";
        }
        $kd_surat = $kd . "/Suket-KMT/" . $bln[date('n')] . date('/yy');
        return $kd_surat;
    }

    public function ajax_select(Request $request)
    {
        $no_nik = $request->no_nik;

        $sktmsekolah = Warga::where('no_nik', '=', $no_nik)->first();
        if (isset($sktmsekolah)) {
            $data = array(
                'id_warga' => $sktmsekolah['id_warga'],
                'nama_lengkap' =>  $sktmsekolah['nama_lengkap'],
                'tempat_lahir' =>  $sktmsekolah['tempat_lahir'],
                'tanggal_lahir' =>  $sktmsekolah['tanggal_lahir'],
                'status_perkawinan' =>  $sktmsekolah['status_perkawinan'],
                'agama' =>  $sktmsekolah['agama'],
                'pekerjaan' =>  $sktmsekolah['pekerjaan'],
                'alamat' =>  $sktmsekolah['alamat'],
            );
        } else {
            $data = null;
        }
        return json_encode($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kematian = Kematian::all();
        $kematian = Warga::all();
        $status_surat = 'Proses';
        $surat = $this->autonumber();
        return view('admin.suket-kematian.create', ['surat' => $surat], ['status_surat' => $status_surat]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message = [
            'required' => 'Isi tidak boleh kosong',
            'min' => 'Isi minimal harus 16 Karakter',
            'max' => 'Isi maximal harus 16 Karakter',
        ];

        $this->validate($request, [
            'nik_pemohon' => ['required', 'max:16', 'min:16'],
            'nik_yg_bersangkutan' => ['required', 'max:16', 'min:16'],
            'tgl_kematian' => ['required'],
            'tempat_kematian' => ['required'],
            'penyebab_kematian' => ['required'],
            'foto_pengantar' => ['required'],
            'foto_kk' => ['required'],
            'foto_ktp' => ['required'],

        ], $message);

        $data['no_surat'] = $request->no_surat;
        $data['status_surat'] = $request->status_surat;
        $data['id_warga'] = $request->id_warga;
        $data['id'] = Auth::id();
        $data2['nik_pemohon'] = $request->nik_pemohon;
        $data2['nik_yg_bersangkutan'] = $request->nik_yg_bersangkutan;
        $data2['tgl_kematian'] = $request->tgl_kematian;
        $data2['tempat_kematian'] = $request->tempat_kematian;
        $data2['penyebab_kematian'] = $request->penyebab_kematian;

        $image1 = $request->file('foto_pengantar');
        $image2 = $request->file('foto_kk');
        $image3 = $request->file('foto_ktp');
        $image4 = $request->file('foto_suratkematianrs');
        if ($image1 != null) {
            $image_name = $image1->getClientOriginalName();
            $image_full_name = date('d-M-Yh-i-s') . rand(10, 100) . "" . $image_name;

            $upload_path = 'public/media/';
            $image_url = $upload_path . $image_full_name;
            $succes = $image1->move($upload_path, $image_full_name);
            $data['foto_pengantar'] = $image_url;
        }
        if ($image2 != null) {
            $image_name = $image2->getClientOriginalName();
            $image_full_name = date('d-M-Yh-i-s') . rand(10, 100) . "" . $image_name;

            $upload_path = 'public/media/';
            $image_url = $upload_path . $image_full_name;
            $succes = $image2->move($upload_path, $image_full_name);
            $data['foto_kk'] = $image_url;
        }
        if ($image3 != null) {
            $image_name = $image3->getClientOriginalName();
            $image_full_name = date('d-M-Yh-i-s') . rand(10, 100) . "" . $image_name;

            $upload_path = 'public/media/';
            $image_url = $upload_path . $image_full_name;
            $succes = $image3->move($upload_path, $image_full_name);
            $data['foto_ktp'] = $image_url;
        }
        if ($image4 != null) {
            $image_name = $image4->getClientOriginalName();
            $image_full_name = date('d-M-Yh-i-s') . rand(10, 100) . "" . $image_name;

            $upload_path = 'public/media/';
            $image_url = $upload_path . $image_full_name;
            $succes = $image4->move($upload_path, $image_full_name);
            $data['foto_suratkematianrs'] = $image_url;
        }
        $kematian = DB::table('persuratan')->insertGetId($data);
        $data2['id_persuratan'] = $kematian;
        $kematian = DB::table('detail_kematian')->insertGetId($data2);

        return redirect()->route('kematian.index')
            ->with('success', 'Data Berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kematian  $kematian
     * @return \Illuminate\Http\Response
     */
    public function show($id_persuratan)
    {
        $kematian = DB::table('persuratan')
            ->join('warga', 'persuratan.id_warga', '=', 'warga.id_warga')
            ->join('detail_kematian', 'persuratan.id_persuratan', '=', 'detail_kematian.id_persuratan')
            ->select(
                'warga.id_warga',
                'warga.no_nik',
                'warga.nama_lengkap',
                'warga.tempat_lahir',
                'warga.jenis_kelamin',
                'warga.tanggal_lahir',
                'warga.status_perkawinan',
                'warga.agama',
                'warga.pekerjaan',
                'warga.alamat',
                'persuratan.id_persuratan',
                'persuratan.no_surat',
                'persuratan.updated_at',
                'persuratan.foto_pengantar',
                'persuratan.foto_kk',
                'persuratan.foto_ktp',
                'persuratan.foto_suratkematianrs',
                'persuratan.status_surat',
                'detail_kematian.nik_yg_bersangkutan',
                'detail_kematian.nik_pemohon',
                'detail_kematian.tgl_kematian',
                'detail_kematian.tempat_kematian',
                'detail_kematian.penyebab_kematian'
            )
            ->where('persuratan.id_persuratan', $id_persuratan)
            ->first();

        $data_warga = DB::table('warga')
            ->where('no_nik', $kematian->nik_yg_bersangkutan)
            ->get();


        return view('admin.suket-kematian.show', compact('kematian', 'data_warga'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kematian  $kematian
     * @return \Illuminate\Http\Response
     */
    public function edit($id_persuratan)
    {
        $kematian = DB::table('persuratan')
            ->join('warga', 'persuratan.id_warga', '=', 'warga.id_warga')
            ->join('detail_kematian', 'persuratan.id_persuratan', '=', 'detail_kematian.id_persuratan')
            ->select(
                'warga.id_warga',
                'warga.no_nik',
                'warga.nama_lengkap',
                'warga.tempat_lahir',
                'warga.tanggal_lahir',
                'warga.status_perkawinan',
                'warga.agama',
                'warga.pekerjaan',
                'warga.alamat',
                'persuratan.id_persuratan',
                'persuratan.no_surat',
                'persuratan.status_surat',
                'detail_kematian.nik_yg_bersangkutan',
                'detail_kematian.nik_pemohon',
                'detail_kematian.tgl_kematian',
                'detail_kematian.tempat_kematian',
                'detail_kematian.penyebab_kematian'
            )
            ->where('persuratan.id_persuratan', $id_persuratan)
            ->first();

        $data_warga = DB::table('warga')
            ->where('no_nik', $kematian->nik_yg_bersangkutan)
            ->first();

        return view('admin.suket-kematian.edit', compact('kematian', 'data_warga'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kematian  $kematian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_persuratan)
    {
        
        $data['status_surat'] = $request->status_surat;
        $data2['tgl_kematian'] = $request->tgl_kematian;
        $data2['tempat_kematian'] = $request->tempat_kematian;
        $data2['penyebab_kematian'] = $request->penyebab_kematian;

        $id_persuratan = DB::table('detail_kematian')->select('id_persuratan')->where('id_persuratan', $id_persuratan)->first();
        $kematian = DB::table('persuratan')->where('id_persuratan', $id_persuratan->id_persuratan)->update($data);
        $kematian = DB::table('detail_kematian')->where('id_persuratan', $id_persuratan->id_persuratan)->update($data2);
        
         //Notifikasi Status-Surat Ke User
         $data = DB::table('persuratan')
         ->where('id_persuratan', $id_persuratan->id_persuratan)
         ->first();
        
         $data_user = User::find($data->id);
         
         $data_user->notify(new KematianNotifikasiSelesai($id_persuratan));
 

        return redirect()->route('kematian.index')
            ->with('success', 'Data Berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kematian  $kematian
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_persuratan)
    {
        $data = DB::table('persuratan')->where('id_persuratan', $id_persuratan)->first();

        $skck = DB::table('persuratan')->where('id_persuratan', $id_persuratan)->delete();

        return redirect()->route('kematian.index')
            ->with('success', 'Data Berhasil Dihapus!');
    }

    public function cetak_pdf($id_persuratan)
    {
        $kematian = DB::table('persuratan')
            ->join('warga', 'persuratan.id_warga', '=', 'warga.id_warga')
            ->join('detail_kematian', 'persuratan.id_persuratan', '=', 'detail_kematian.id_persuratan')
            ->select(
                'warga.id_warga',
                'warga.no_nik',
                'warga.nama_lengkap',
                'warga.tempat_lahir',
                'warga.jenis_kelamin',
                'warga.tanggal_lahir',
                'warga.status_perkawinan',
                'warga.agama',
                'warga.pekerjaan',
                'warga.alamat',
                'persuratan.id_persuratan',
                'persuratan.no_surat',
                'persuratan.updated_at',
                'persuratan.status_surat',
                'detail_kematian.nik_yg_bersangkutan',
                'detail_kematian.nik_pemohon',
                'detail_kematian.tgl_kematian',
                'detail_kematian.tempat_kematian',
                'detail_kematian.penyebab_kematian'
            )
            ->where('persuratan.id_persuratan', $id_persuratan)
            ->first();

        $data_warga = DB::table('warga')
            ->where('no_nik', $kematian->nik_yg_bersangkutan)
            ->first();


        $pdf = PDF::loadview('admin.suket-kematian.print', compact('kematian', 'data_warga'));
        $pdf->setPaper('Legal', 'potrait');
        return $pdf->download('suket-kematian.pdf');
    }
}
