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
      <div class="card-header">
        <h3 class="card-title">Data Pengajuan Surat Pengantar SKCK</h3>
        <div class="card-tools">
        </div>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-12">
          <a href="{{route('skck.create')}}" class="btn btn-success float-right">Tambah Data</a>
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
                    <th> No Surat</th>
                    <th> Keperluan Surat </th>
                    <th> Foto Berkas </th>
                    <th> Tanggal Pembuatan</th>
                    <th> Tanggal Masa Berlaku </th>
                    <th> Status Surat </th>
                    <th> Opsi </th>
                  </tr>
                </thead>
                <tbody> 
                  @php
                $no=1  
                @endphp
                @foreach($skck as $post)
                <tr>
                  <th scope="row">{{$no}}
                    </th>
                    @php $no++ @endphp
                    <td>{{ $post->no_surat }}</td>
                    <td>{{ $post->ket_keperluan_surat }}</td>
                    <td><a href="{{URL::to($post->foto_pengantar)}}" target="_blank">Foto Pengantar RT/RW |</a>
                        <a href="{{URL::to($post->foto_kk)}}" target="_blank">Foto KK |</a>
                        <a href="{{URL::to($post->foto_ktp)}}" target="_blank">Foto KTP </a>
                    </td>
                    <td>{{ $post->tgl_pembuatan }}</td>
                    <td>{{ $post->tgl_masa_berlaku }}</td>
                    <td>{{ $post->status_surat }}</td>
                    <td>
                      <a class="btn btn-danger btn-sm" href="{{URL::to('suket-pengantar-skck/edit/'.$post->id_persuratan)}}"><i class="nav-icon fas fa-edit"></i> Edit</a>
                      <a class="btn btn-primary btn-sm" href="{{URL::to('suket-pengantar-skck/delete/'.$post->id_persuratan)}}"><i class="nav-icon fas fa-trash"></i> Hapus</a>
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