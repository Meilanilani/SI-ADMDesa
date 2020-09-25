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
    <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Edit Data Surat Keterangan Pindah</h3>
          <div class="card-tools">
                </div>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-6">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li> {{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form action="{{ url('suket-pindah/update/'.$pindah->id_persuratan)}}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group">
                      <div class="row">
                        <div class="col-md-6">
                        <label for="inputName">No Surat</label>
                        <input type="text" name="no_surat" class="form-control" value="{{ $pindah->no_surat}}">
                        </div>
                        <div class="col-md-6">
                          <label for="inputName">No NIK</label>  
                          <input type="text" name="nik_pemohon" id="nik_pemohon" value="{{ $pindah->nik_pemohon}}" class="form-control input-lg" />
                        </div>
                        <div class="col-md-6">
                          <label for="inputName">No KK</label>  
                          <input type="text" name="no_kk" id="no_kk" class="form-control input-lg" value="{{ $pindah->no_kk}}" />
                      </div>
                            <div class="col-md-8">
                              <label for="inputDescription">Alamat Tujuan</label>
                              <textarea name="alamat_tujuan" class="form-control" rows="3"> {{ $pindah->alamat_tujuan}}</textarea>
                            </div>
                            <div class="col-md-8">
                              <label for="inputDescription">Alasan Pindah</label>
                              <textarea name="alasan_pindah" class="form-control" rows="3">{{ $pindah->alasan_pindah}}</textarea>
                            </div>
                            
                          
                        <div class="col-md-5">
                          <label for="inputName">Status Surat</label>
                    <select class="form-control custom-select"  name="status_surat" >
                      <option <?= $pindah->status_surat == 'Proses'? 'Selected' : 'Proses' ?>>Proses</option>
                      <option <?= $pindah->status_surat == 'Selesai'? 'Selected' : 'Selesai' ?>>Selesai</option>
                    </select>
                      </div>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-success">Simpan</button>
                  <a class="btn btn-success" href="{{route('pindah.index')}}">Kembali</a>
                      </div>
                      </div>
                      </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
            </section>
        <!-- /.content -->
@endsection