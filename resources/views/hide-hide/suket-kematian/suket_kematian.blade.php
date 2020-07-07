@extends('layouts.master')
@section('content')

 <!-- Content Header (Page header) -->
 <div class="content-header">
    <div class="container-fluid">

    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  
<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Data Pengajuan Surat Keterangan Kematian</h3>
        <div class="card-tools">
        </div>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-12">
          <a href="{{route('kematian.create')}}" class="btn btn-success float-right">Tambah Data</a>
          </div>
        </div>
        @if($message = Session::get('success'))
      <div class="alert alert-success">
      <p>{{$message}}</p>
      </div>
      @endif
        <br>
        <div class="table-responsive">
        <table class="table table-bordered table-hovervvctvkfadilypn">
            <thead>
                <tr>
                    <th> No </th>
                    <th> No Surat </th>
                    <th> Hari Kematian </th>
                    <th> Tanggal Kematian </th>
                    <th> Tempat Kematian </th>
                    <th> Penyebab Kematian </th>
                    <th> Foto Berkas</th>
                    <th> Tanggal Pembuatan </th>
                    <th> Status Surat </th>
                    <th> Opsi </th>
                </tr>
            </thead>
            <tbody> 
              @php
            $no=1  
            @endphp
            @foreach($kematian as $post)
            <tr>
              <th scope="row">{{$no}}
                </th>
                @php $no++ @endphp
                <td>{{ $post->no_surat }}</td>
                <td>{{ $post->hari_kematian }}</td>
                <td>{{ $post->tgl_kematian }}</td>
                <td>{{ $post->tempat_kematian }}</td>
                <td>{{ $post->penyebab_kematian }}</td>
                <td><a href="{{URL::to($post->foto_pengantar)}}" target="_blank">Foto Pengantar RT/RW |</a>
                    <a href="{{URL::to($post->foto_kk)}}" target="_blank">Foto KK |</a>
                    <a href="{{URL::to($post->foto_ktp)}}" target="_blank">Foto KTP |</a>
                    <a href="{{URL::to($post->foto_suratkematianrs)}}" target="_blank">Foto Surat Kematian RS</a>
                </td>
                <td>{{ $post->tgl_pembuatan }}</td>
                <td>{{ $post->status_surat }}</td>
                <td>
                  <a class="btn btn-danger btn-sm" href="{{URL::to('suket-kematian/edit/'.$post->id_kematian)}}"><i class="nav-icon fas fa-edit"></i> Edit</a>
                  <a class="btn btn-primary btn-sm" href="{{URL::to('suket-kematian/delete/'.$post->id_kematian)}}"><i class="nav-icon fas fa-trash"></i> Hapus</a>
                </td>
              </tr>
            </form>
            
              @endforeach
                  
                    </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </section>
        <!-- /.content -->
      @endsection