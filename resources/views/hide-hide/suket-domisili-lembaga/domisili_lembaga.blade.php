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
        
        <h3 class="card-title">Data Surat Keterangan Domisili Lembaga</h3>
        <div class="card-tools">
          <a href="{{route('lembaga.create')}}" class="btn btn-success">Tambah Data</a>

        </div>
      </div>
      @if($message = Session::get('success'))
      <div class="alert alert-success">
      <p>{{$message}}</p>
      </div>
      @endif
      <div class="card-body">
        <div class="table-responsive">
        <table class="table table-bordered table-hovervvctvkfadilypn">
              <thead>
                    <th> No </th>
                    <th> No Surat</th>
                    <th> Nama Lembaga </th>
                    <th> Alamat Lembaga </th>
                    <th> No Telp</th>
                    <th> Bidang Lembaga </th>
                    <th> Jumlah Pegawai </th>
                    <th> Jumlah Jam Kerja </th>
                    <th> Foto Berkas</th>
                    <th> Tanggal Pembuatan</th>
                    <th> Status Surat </th>
                    <th> Opsi </th>
                </tr>
              </thead>
              <tbody> 
                @php
              $no=1  
              @endphp
              @foreach($lembaga as $post)
              <tr>
                <th scope="row">{{$no}}
                  </th>
                  @php $no++ @endphp
                  <td>{{ $post->no_surat }}</td>
                  <td>{{ $post->nama_lembaga }}</td>
                  <td>{{ $post->alamat_lembaga }}</td>
                  <td>{{ $post->no_telp_lembaga }}</td>
                  <td>{{ $post->bidang_lembaga }}</td>
                  <td>{{ $post->jumlah_pegawai }}</td>
                  <td>{{ $post->jam_kerja }}</td>
                  <td><a href="{{URL::to($post->foto_pengantar)}}" target="_blank">Foto Pengantar RT/RW |</a>
                      <a href="{{URL::to($post->foto_kk)}}" target="_blank">Foto KK |</a>
                      <a href="{{URL::to($post->foto_ktp)}}" target="_blank">Foto KTP |</a>
                      <a href="{{URL::to($post->foto_akta_notaris)}}" target="_blank">Foto Akta Notaris</a>
                  </td>
                  <td>{{ $post->tgl_pembuatan }}</td>
                  <td>{{ $post->status_surat }}</td>
                  <td>
                    <a class="btn btn-danger btn-sm" href="{{URL::to('suket-domisili-lembaga/edit/'.$post->id_domisili_lembaga)}}"><i class="nav-icon fas fa-edit"></i> Edit</a>
                    <a class="btn btn-primary btn-sm" href="{{URL::to('suket-domisili-lembaga/delete/'.$post->id_domisili_lembaga)}}"><i class="nav-icon fas fa-trash"></i> Hapus</a>
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