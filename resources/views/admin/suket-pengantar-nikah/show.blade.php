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
                                    <td>{{ $pnikah->no_surat }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">NIK Anak</th>
                                    <td>:</td>
                                    <td>{{ $pnikah->nik_anak }}</td>
                                </tr>
                                @foreach($data_anak as $post)
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
                                    <td><a href="{{URL::to($pnikah->foto_pengantar)}}" target="_blank">Foto Pengantar
                                            RT/RW <br></a>
                                        <a href="{{URL::to($pnikah->foto_kk)}}" target="_blank">Foto Kartu Keluarga
                                            <br></a>
                                        <a href="{{URL::to($pnikah->foto_ktp)}}" target="_blank">Foto KTP Anak
                                            <br></a>
                                        <a href="{{URL::to($pnikah->foto_ijazah)}}" target="_blank">Foto Surat Ijazah Anak
                                            <br> </a>
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
                        <thead>
                        </thead>
                        <tbody>
                            
                            <tr>
                                <th scope="row">NIK Ayah</th>
                                <td>:</td>
                                <td>{{ $pnikah->nik_pemohon }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Nama Lengkap </th>
                                <td>:</td>
                                <td>{{ $pnikah->nama_lengkap }}</td>
                            </tr>
                            @foreach($data_ibu as $row)
                            <tr>
                                <th scope="row">Tempat Tanggal Lahir</th>
                                <td>:</td>
                                <td>{{ $pnikah->tempat_lahir }},
                                    {{ Carbon\Carbon::createFromFormat('Y-m-d', $pnikah->tanggal_lahir)->isoFormat('D-MM-Y')}}</td>
                            </tr>
                            <tr>
                                <th scope="row">NIK Ibu </th>
                                <td>:</td>
                                <td>{{ $pnikah->nik_ibu }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Nama Lengkap </th>
                                <td>:</td>
                                <td>{{ $row->nama_lengkap }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Tempat Tanggal Lahir</th>
                                <td>:</td>
                                <td>{{ $row->tempat_lahir }},
                                    {{ Carbon\Carbon::createFromFormat('Y-m-d', $row->tanggal_lahir)->isoFormat('D-MM-Y')}}</td>
                            </tr>
                            
                            @endforeach
                            
                            
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                <a class="btn btn-success" href="{{route('pnikah.index')}}">Kembali</a>
            </div>
    </div>
  </div>
</section>
@endsection


