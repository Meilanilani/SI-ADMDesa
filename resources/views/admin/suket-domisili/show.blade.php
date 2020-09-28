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
                                    <td>{{ $domisili->no_surat }}</td>
                                </tr>
                                @foreach($data_warga as $post)
                                <tr>
                                    <th scope="row">Nama Lengkap</th>
                                    <td>:</td>
                                    <td>{{ $post->nama_lengkap }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Tempat Tanggal Lahir</th>
                                    <td>:</td>
                                    <td>{{ $post->tempat_lahir }},
                                        {{ Carbon\Carbon::createFromFormat('Y-m-d', $post->tanggal_lahir)->isoFormat('D-MM-Y')}}
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Agama </th>
                                    <td>:</td>
                                    <td>{{ $post->agama }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Pekerjaan</th>
                                    <td>:</td>
                                    <td>{{ $post->pekerjaan }}</td>
                                </tr>
                                
                                <tr>
                                    <th scope="row">Alamat</th>
                                    <td>:</td>
                                    <td>{{$post->alamat}}</td>
                                </tr>
                                @endforeach
                                <tr>
                                    <th scope="row"> Foto Berkas </th>
                                    <td>:</td>
                                    <td><a href="{{URL::to($domisili->foto_pengantar)}}" target="_blank">Foto Pengantar
                                            RT/RW <br></a>
                                        <a href="{{URL::to($domisili->foto_kk)}}" target="_blank">Foto Kartu Keluarga
                                            <br></a>
                                        <a href="{{URL::to($domisili->foto_ktp)}}" target="_blank">Foto KTP yang Bersangkutan
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
                            <td>{{ $domisili->nik_pemohon }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Nama Lengkap </th>
                            <td>:</td>
                            <td>{{ $domisili->nama_lengkap }}</td>
                        </tr>
                        <thead>
                        </thead>
                        <tbody>
                            
                            
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                <a class="btn btn-success" href="{{route('domisili.index')}}">Kembali</a>
            </div>
    </div>
  </div>
</section>
@endsection


