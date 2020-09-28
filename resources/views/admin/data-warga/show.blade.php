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
                                @foreach ($warga as $post)
                                <tr>
                                    <th scope="row">No KK</th>
                                    <td>:</td>
                                    <td>{{ $post->no_kk }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">No NIK</th>
                                    <td>:</td>
                                    <td>{{ $post->no_nik }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Nama Lengkap</th>
                                    <td>:</td>
                                    <td>{{ $post->nama_lengkap }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Jenis Kelamin</th>
                                    <td>:</td>
                                    <td>{{ $post->jenis_kelamin }}</td>
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
                                    <th scope="row">Pendidikan</th>
                                    <td>:</td>
                                    <td>{{ $post->pendidikan }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Pekerjaan</th>
                                    <td>:</td>
                                    <td>{{ $post->pekerjaan }}</td>
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
                            <th scope="row">Status Perkawinan</th>
                            <td>:</td>
                            <td>{{ $post->status_perkawinan }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Status Hubungan Keluarga</th>
                            <td>:</td>
                            <td>{{ $post->status_hub_keluarga }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Nama Ayah</th>
                            <td>:</td>
                            <td>{{ $post->nama_ayah }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Nama Ibu</th>
                            <td>:</td>
                            <td>{{ $post->nama_ibu }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Alamat</th>
                            <td>:</td>
                            <td>{{$post->alamat}}</td>
                        </tr>
                        @endforeach
                        <thead>
                        </thead>
                        <tbody>
                            
                            
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                <a class="btn btn-success" href="{{route('warga.index')}}">Kembali</a>
            </div>
    </div>
  </div>
</section>
@endsection


