@extends('layouts.master')
@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        </div>
    </div>
</div>
<!-- Bagian content -->
<section class="content">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Data Pengguna</h3>
            <div class="card-tools">
                <a href="{{route('warga.create')}}" class="btn btn-block btn-secondary btn-sm">Tambah Data</a>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                </div>
            </div>
            @if($message = Session::get('success'))
            <div class="card bg-gradient-success">
                <div class="card-header border-0">
                    <h3 class="card-title">{{$message}}</h3>
                    <div class="card-tools">
                        <div class="btn-group">
                            <button type="button" class="btn btn-success btn-sm" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <div id="calendar" style="width: 100%"></div>
                </div>
            </div>
            @endif
            <div class="card-body">
                <div class="table-responsive">
                    <table id="data_warga" class="table table-striped table-bordered dt-responsive nowrap"
                        style="width:100%">
                        <thead>
                            <tr>
                                <th> No </th>
                                <th> KK </th>
                                <th> NIK </th>
                                <th> Nama Lengkap </th>
                                <th> Jenis Kelamin </th>
                                <th> Pilihan </th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $no=1
                            @endphp
                            @foreach($warga as $post)
                            <tr>
                                <th scope="row">{{$no}}
                                </th>
                                @php $no++ @endphp
                                <td>{{ $post->no_kk }}</td>
                                <td>{{ $post->no_nik }}</td>
                                <td>{{ $post->nama_lengkap }}</td>
                                <td>{{ $post->jenis_kelamin }}</td>
                                <td>
                                    <a class="btn btn-danger btn-sm"
                                        href="{{URL::to('data-warga/edit/'.$post->id_warga)}}"><i
                                            class="nav-icon fas fa-edit"></i> Edit</a>
                                    <a class="btn btn-primary btn-sm"
                                        href="{{URL::to('data-warga/delete/'.$post->id_warga)}}"><i
                                            class="nav-icon fas fa-trash"></i> Hapus</a>
                                        <a class="btn btn-primary btn-sm"
                                            href="{{URL::to('data-warga/show/'.$post->id_warga)}}"><i
                                                class="nav-icon fas fa-trash"></i> Detail</a>
                                            
                                </td>
                            </tr>
                            </form>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
</section>
@endsection
