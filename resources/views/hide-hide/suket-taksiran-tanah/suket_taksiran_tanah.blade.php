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
        
        <h3 class="card-title">Data Surat Keterangan Taksiran Tanah</h3>
        <div class="card-tools">
          <a href="{{route('tanah.create')}}" class="btn btn-success">Tambah Data</a>

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
                    <th> No Sertifikat Tanah </th>
                    <!--<th> Jenis Kelamin </th>-->
                    <th> Luas Tanah </th>
                    <th> Pemilik Batas Utara </th>
                    <!-- <th> Nama Ayah </th>
                    <th> Nama Ibu </th>
                    <th> Pekerjaan </th>
                    <th> Alamat </th> -->
                    <th> Pemilik Batas Selatan</th>
                    <th> Pemilik Batas Timur</th>
                    <th> Pemilik Batas Barat</th>
                    <th> Tanggal Kepemilikan Tanah </th>
                    <th> Harga Tanah </th>
                    <th> Harga Bangunan </th>
                    <th> Foto Berkas </th>
                    <th> Tanggal Pembuatan </th>
                    <th> Status Surat </th>
                    <th> Opsi </th>
                </tr>
              </thead>
              <tbody> 
                @php
              $no=1  
              @endphp
              @foreach($tanah as $post)
              <tr>
                <th scope="row">{{$no}}
                  </th>
                  @php $no++ @endphp
                  <td>{{ $post->no_surat }}</td>
                  <td>{{ $post->no_sertifikat_tanah }}</td>
                  <td>{{ $post->luas_tanah }}</td>
                  <td>{{ $post->pemilik_batas_utara }}</td>
                  <td>{{ $post->pemilik_batas_selatan }}</td>
                  <td>{{ $post->pemilik_batas_timur }}</td>
                  <td>{{ $post->pemilik_batas_barat }}</td>
                  <td>{{ $post->tgl_kepemilikan }}</td>
                  <td>{{ $post->harga_tanah }}</td>
                  <td>{{ $post->harga_bangunan }}</td>

                  <td><a href="{{URL::to($post->foto_pengantar)}}" target="_blank">Foto Pengantar RT/RW |</a>
                      <a href="{{URL::to($post->foto_kk)}}" target="_blank">Foto KK |</a>
                      <a href="{{URL::to($post->foto_ktp)}}" target="_blank">Foto KTP |</a>
                      <a href="{{URL::to($post->foto_sertifikat_tanah)}}" target="_blank">Foto Sertifikat Tanah | </a>
                      <a href="{{URL::to($post->foto_sptpbb)}}" target="_blank">Foto SPTPBB </a>
                  </td>
                  <td>{{ $post->tgl_pembuatan }}</td>
                  <td>{{ $post->status_surat }}</td>
                  <td>
                    <a class="btn btn-danger btn-sm" href="{{URL::to('suket-taksiran-tanah/edit/'.$post->id_ket_taksiran_tanah)}}"><i class="nav-icon fas fa-edit"></i> Edit</a>
                    <a class="btn btn-primary btn-sm" href="{{URL::to('suket-taksiran-tanah/delete/'.$post->id_ket_taksiran_tanah)}}"><i class="nav-icon fas fa-trash"></i> Hapus</a>
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