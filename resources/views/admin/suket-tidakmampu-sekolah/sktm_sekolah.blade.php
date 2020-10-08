@extends('layouts.master')
@section('content')
          
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
      <h3 class="card-title">
        <h3 class="card-title">Data Surat Keterangan Tidak Mampu Sekolah</h3>
        <div class="card-tools">
          <a href="{{route('sktmsekolah.create')}}" class="btn btn-block btn-secondary btn-sm">Tambah Data</a>
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
          
            <!-- tools card -->
        <div class="card-tools">
          <!-- button with a dropdown -->
          <div class="btn-group">
          <button type="button" class="btn btn-success btn-sm" data-card-widget="remove">
            <i class="fas fa-times"></i>
          </button>
          </div>
        </div>
        <!-- /. tools -->
      </div>
      <!-- /.card-header -->
      <div class="card-body pt-0">
        <!--The calendar -->
        <div id="calendar" style="width: 100%"></div>
      </div>
      </div>
      <!-- /.card-body -->
    @endif
    <div class="card-body">
      <div class="table-responsive">
        <table id="data_sktms" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
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
                <td>{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $post->created_at)->isoFormat('D MMMM Y')}}</td>
                <td>{{ $post->status_surat }}</td>
                <td>
                  <a class="btn btn-danger btn-sm" href="{{URL::to('suket-tidakmampu-sekolah/edit/'.$post->id_persuratan)}}"><i class="nav-icon fas fa-edit"></i> Edit</a>
                  <a class="btn btn-primary btn-sm" href="{{URL::to('suket-tidakmampu-sekolah/delete/'.$post->id_persuratan)}}"><i class="nav-icon fas fa-trash"></i> Hapus</a>
                  <a class="btn btn-warning btn-sm" href="{{URL::to('suket-tidakmampu-sekolah/cetak_pdf/'.$post->id_persuratan)}}"><i class="nav-icon fas fa-trash"></i> Cetak</a>
                  <a class="btn btn-success btn-sm" href="{{URL::to('suket-tidakmampu-sekolah/show/'.$post->id_persuratan)}}"><i class="fas fa-info-circle"></i> Detail </a>
                  
                </td>
              </tr>
            </form>
            
              @endforeach
                  
                    </tbody>
              </table>
              


            </div>
            <!-- /.card-body -->
          </div>
    </div>
    </div>
      @endsection
       