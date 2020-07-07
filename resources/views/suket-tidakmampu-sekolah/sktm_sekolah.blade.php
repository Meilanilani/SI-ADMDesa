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

    <!-- Default box -->
    <div class="card">
      <div class="card card-info">
        <div class="card-header">
          <h3 class="card-title">Data Surat Keterangan Tidak Mampu Sekolah</h3>
          <div class="card-tools">
            <a href="{{route('sktmsekolah.create')}}" class="btn btn-block btn-secondary btn-sm">Tambah Data</a>
          </div>
        </div>
      </div>
      @if($message = Session::get('success'))
      <div class="alert alert-success">
      <p>{{$message}}</p>
      </div>
      @endif
      <div class="card-body">
        <br>
        <div class="table-responsive">
        <table class="table table-bordered table-hovervvctvkfadilypn">
            <thead>
                <tr>
                    <th> No </th>
                    <th> No Surat</th>
                    <th> NIK Pemohon</th>
                    <th> Nama Pemohon </th>
                    <th> Tanggal Pembuatan </th>
                    <th> Status Surat </th>
                    <th> Pilihan </th>
                </tr>
            </thead>
            <tbody> 
              @php
            $no=1  
            @endphp
            @foreach($sktmsekolah as $post)
            <tr>
              <th scope="row">{{$no}}
                </th>
                @php $no++ @endphp
                <td>{{ $post->no_surat }}</td>
                <td>{{ $post->no_nik }}</td>
                <td>{{ $post->nama_lengkap }}</td>
                
                <td>{{ $post->tgl_pembuatan }}</td>
                <td>{{ $post->status_surat }}</td>
                <td>
                  <a class="btn btn-danger btn-sm" href="{{URL::to('suket-tidakmampu-sekolah/edit/'.$post->id_persuratan)}}"><i class="nav-icon fas fa-edit"></i> Edit</a>
                  <a class="btn btn-primary btn-sm" href="{{URL::to('suket-tidakmampu-sekolah/delete/'.$post->id_persuratan)}}"><i class="nav-icon fas fa-trash"></i> Hapus</a>
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