@extends('layouts.master')
@section('content')

 <!-- Content Header (Page header) -->
 <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  
<!-- Main content -->
<section class="content">

    <div class="card-group">
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <div class="row">
                        <table class="table no-border">
                            <thead>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row"> No Surat</th>
                                    <td>:</td>
                                    <td>{{ $kk->no_surat }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">No KK</th>
                                    <td>:</td>
                                    <td>{{ $kk->no_kk }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">NIK</th>
                                    <td>:</td>
                                    <td>{{ $kk->no_nik }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Nama Lengkap</th>
                                    <td>:</td>
                                    <td>{{ $kk->nama_lengkap }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Tempat Tanggal Lahir</th>
                                    <td>:</td>
                                    <td>{{ $kk->tempat_lahir }},
                                        {{ Carbon\Carbon::createFromFormat('Y-m-d', $kk->tanggal_lahir)->isoFormat('D-MM-Y')}}
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Agama </th>
                                    <td>:</td>
                                    <td>{{ $kk->agama }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Pekerjaan</th>
                                    <td>:</td>
                                    <td>{{ $kk->pekerjaan }}</td>
                                </tr>
                                
                                <tr>
                                    <th scope="row">Alamat</th>
                                    <td>:</td>
                                    <td>{{$kk->alamat}}</td>
                                </tr>
                                <tr>
                                    <th scope="row"> Foto Berkas </th>
                                    <td>:</td>
                                    <td><a href="{{URL::to($kk->foto_pengantar)}}" target="_blank">Foto Pengantar
                                            RT/RW <br></a>
                                        <a href="{{URL::to($kk->foto_kk)}}" target="_blank">Foto Kartu Keluarga
                                            <br></a>
                                         <a href="{{URL::to($kk->foto_suratnikah)}}" target="_blank">Foto Akta Nikah
                                                <br></a>
                                        <a href="{{URL::to($kk->foto_ktp)}}" target="_blank">Foto KTP Suami Istri
                                                <br></a>
                                       
                                    </td>
                                </tr>

                            </tbody>

                        </table>

                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <table class="table no-border">
                        <tr>
                            <th scope="row">NIK Pemohon</th>
                            <td>:</td>
                            <td>{{ $kk->nik_pemohon }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Nama Lengkap </th>
                            <td>:</td>
                            <td>{{ $kk->nama_lengkap }}</td>
                        </tr>
                        <thead>
                        </thead>
                        <tbody>
                            
                            
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                <a class="btn btn-success" href="{{route('kk.index')}}">Kembali</a>
            </div>
    </div>
  </div>
</section>
@endsection


