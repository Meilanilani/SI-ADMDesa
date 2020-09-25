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
                                    <td>{{ $sktmsekolah->no_surat }}</td>
                                  </tr>
                                  <tr>
                                    <th scope="row">NIK Pemohon</th>
                                    <td>:</td>
                                    <td>{{ $sktmsekolah->no_nik }}</td>
                                  </tr>
                                  <tr>
                                    <th scope="row">Nama Pemohon</th>
                                    <td>:</td>
                                    <td>{{ $sktmsekolah->nama_lengkap }}</td>
                                  </tr>
                                  <tr>
                                    <th scope="row">Tempat Tanggal Lahir</th>
                                    <td>:</td>
                                    <td>{{ $sktmsekolah->tempat_lahir }},
                                        {{ Carbon\Carbon::createFromFormat('Y-m-d', $sktmsekolah->tanggal_lahir)->isoFormat('D-MM-Y')}}
                                    </td>
                                  </tr>
                                  <tr>
                                    <th scope="row">Agama</th>
                                    <td>:</td>
                                    <td>{{ $sktmsekolah->agama }}</td>
                                  </tr>
                                  <tr>
                                    <th scope="row">Pekerjaan</th>
                                    <td>:</td>
                                    <td>{{ $sktmsekolah->pekerjaan }}</td>
                                  </tr>
                                  <tr>
                                    <th scope="row">Kewarganegaraan</th>
                                    <td>:</td>
                                    <td>Indonesia</td>
                                  </tr>
                                  <tr>
                                    <th scope="row">Alamat</th>
                                    <td>:</td>
                                    <td>{{ $sktmsekolah->alamat }}</td>
                                  </tr>
                                  <tr>
                                    <th scope="row"> Foto Berkas </th>
                                    <td>:</td>
                                    <td><a href="{{URL::to($sktmsekolah->foto_pengantar)}}" target="_blank">Foto Pengantar RT/RW |</a>  
                                    <a href="{{URL::to($sktmsekolah->foto_kk)}}" target="_blank">Foto Kartu Keluarga | </a>  
                                    <a href="{{URL::to($sktmsekolah->foto_ktp)}}" target="_blank">Foto Kartu Keluarga | </a>  </td>
                                        
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
                          @foreach ($data_anak as $data)
                          <tr>
                            <th scope="row">NIK Anak yang diajukan</th>
                            <td>:</td>
                            <td>{{ $data->no_nik }}</td>
                          </tr>
                          <tr>
                            <th scope="row">Nama Lengkap</th>
                            <td>:</td>
                            <td>{{ $data->nama_lengkap }}</td>
                          </tr>
                          <tr>
                            <th scope="row">Tempat Tanggal Lahir</th>
                            <td>:</td>
                            <td>{{ $data->tempat_lahir }},
                                {{ Carbon\Carbon::createFromFormat('Y-m-d', $data->tanggal_lahir)->isoFormat('D-MM-Y')}}
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">Agama</th>
                            <td>:</td>
                            <td>{{ $data->agama }}</td>
                          </tr>
                          <tr>
                            <th scope="row">Pekerjaan</th>
                            <td>:</td>
                            <td>{{ $data->pekerjaan }}</td>
                          </tr>
                          <tr>
                            <th scope="row">Kewarganegaraan</th>
                            <td>:</td>
                            <td>Indonesia</td>
                          </tr>
                          <tr>
                            <th scope="row">Alamat</th>
                            <td>:</td>
                            <td>{{ $data->alamat }}</td>
                          </tr>
                        </tbody>
                        @endforeach
                    </table>
                </div>
                </div>
                <div class="card-footer">
                    <a class="btn btn-success" href="{{route('sktmsekolah.index')}}">Kembali</a>
                </div>
            </div>
        </div>
    </div>
            
</section>
@endsection
