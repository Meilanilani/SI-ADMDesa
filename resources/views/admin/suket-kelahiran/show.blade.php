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
                                    <td>{{ $lahir->no_surat }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Nama Anak</th>
                                    <td>:</td>
                                    <td>{{ $lahir->nama_anak }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Tempat Tanggal Lahir</th>
                                    <td>:</td>
                                    <td>{{ $lahir->tempat_lahir_anak }},
                                        {{ Carbon\Carbon::createFromFormat('Y-m-d', $lahir->tanggal_lahir_anak)->isoFormat('D-MM-Y')}}
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Jenis Kelamin</th>
                                    <td>:</td>
                                    <td>{{ $lahir->jenis_kelamin }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Jam Lahir</th>
                                    <td>:</td>
                                    <td>{{ Carbon\Carbon::createFromFormat('H:i:s', $lahir->jam_lahir)
                                        ->isoFormat('HH:mm') }} Wib</td>
                                </tr>
                                <tr>
                                    <th scope="row">Anak ke</th>
                                    <td>:</td>
                                    <td>{{$lahir->anak_ke}}</td>
                                </tr>

                                <tr>
                                    <th scope="row"> Foto Berkas </th>
                                    <td>:</td>
                                    <td><a href="{{URL::to($lahir->foto_pengantar)}}" target="_blank">Foto Pengantar
                                            RT/RW <br></a>
                                        <a href="{{URL::to($lahir->foto_kk)}}" target="_blank">Foto Kartu Keluarga
                                            <br></a>
                                        <a href="{{URL::to($lahir->foto_ktp)}}" target="_blank">Foto KTP Suami Istri
                                            <br></a>
                                        <a href="{{URL::to($lahir->foto_suratnikah)}}" target="_blank">Foto Surat Nikah
                                            <br> </a>
                                        <a href="{{URL::to($lahir->foto_suratkelahiran)}}" target="_blank"> Foto Surat Kelahiran dari Bidan/ RS <br> </a>
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
                            @foreach ($data_ibu as $data)
                            <tr>
                                <th scope="row">NIK Ayah</th>
                                <td>:</td>
                                <td>{{ $lahir->no_nik }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Nama Lengkap Ayah</th>
                                <td>:</td>
                                <td>{{ $lahir->nama_lengkap }}</td>
                            </tr>
                            <tr>
                                <th scope="row">NIK Ibu</th>
                                <td>:</td>
                                <td>{{ $lahir->nik_ibu }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Nama Lengkap Ibu</th>
                                <td>:</td>
                                <td>{{ $data->nama_lengkap }}</td>
                            </tr>

                            <tr>
                                <th scope="row">Alamat</th>
                                <td>:</td>
                                <td>{{ $lahir->alamat }}</td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
            <div class="card-footer">
                <a class="btn btn-success" href="{{route('kelahiran.index')}}">Kembali</a>
            </div>
        </div>
    </div>
    </div>

</section>
@endsection
