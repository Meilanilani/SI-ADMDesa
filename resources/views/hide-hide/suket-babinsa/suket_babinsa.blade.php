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
        
        <h3 class="card-title">Data Surat Keterangan Babinsa</h3>
        <div class="card-tools">
          <a href="{{route('babinsa.create')}}" class="btn btn-success">Tambah Data</a>

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
                    <th> Nama Babinsa </th>
                    <!--<th> Jenis Kelamin </th>-->
                    <th> Pangkat Babinsa </th>
                    <th> Jabatan Babinsa </th>
                    <!-- <th> Nama Ayah </th>
                    <th> Nama Ibu </th>
                    <th> Pekerjaan </th>
                    <th> Alamat </th> -->
                    <th> Tinggi Badan calon</th>
                    <th> Berat Badan Calon</th>
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
              @foreach($babinsa as $post)
              <tr>
                <th scope="row">{{$no}}
                  </th>
                  @php $no++ @endphp
                  <td>{{ $post->no_surat }}</td>
                  <td>{{ $post->nama_babinsa }}</td>
                  <td>{{ $post->pangkat_babinsa }}</td>
                  <td>{{ $post->jabatan_babinsa }}</td>
                  <td>{{ $post->tb_calon }}</td>
                  <td>{{ $post->bb_calon }}</td>
                  <td><a href="{{URL::to($post->foto_pengantar)}}" target="_blank">Foto Pengantar RT/RW |</a>
                      <a href="{{URL::to($post->foto_kk)}}" target="_blank">Foto KK |</a>
                      <a href="{{URL::to($post->foto_ktp)}}" target="_blank">Foto KTP </a>
                  </td>
                  <td>{{ $post->tgl_pembuatan }}</td>
                  <td>{{ $post->status_surat }}</td>
                  <td>
                    <a class="btn btn-danger btn-sm" href="{{URL::to('suket-babinsa/edit/'.$post->id_ket_babinsa)}}"><i class="nav-icon fas fa-edit"></i> Edit</a>
                    <a class="btn btn-primary btn-sm" href="{{URL::to('suket-babinsa/delete/'.$post->id_ket_babinsa)}}"><i class="nav-icon fas fa-trash"></i> Hapus</a>
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