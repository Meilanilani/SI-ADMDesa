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
  <section class="content">
    <div class="card-group">
      <div class="card">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li> {{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <div class="card-body">
                    <form action="{{ url('suket-tidakmampu-sekolah/update/'.$sktmsekolah->id_persuratan)}}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group">
                        <div class="row">
                        <div class="col-md-7">
                        <label for="inputName">No Surat</label>
                        <input type="text" name="no_surat" class="form-control" value="{{ $sktmsekolah->no_surat}}" readonly>
                        </div>
                        <div class="col-md-6">
                          <label for="inputName">NIK Anak</label>
                          <input type="text" name="nik_anak" id="nik_anak" class="form-control input-lg" value="{{ $sktmsekolah->nik_anak}}" readonly/>
                        </div>
                        <div class="col-md-6">
                          <label for="inputName">Nama Anak</label>
                          <input type="text" name="nama_lengkap" id="nama_anak" class="form-control input-lg" value="{{ $data_anak->nama_lengkap}}" readonly/>
                        </div>
                        <div class="col-md-6">
                          <label for="inputName">Tempat Lahir</label>
                          <input type="text" name="tempat_lahir" id="ttl_anak1" class="form-control input-lg"  value="{{ $data_anak->tempat_lahir}}"readonly/>
                        </div>
                        <div class="col-md-6">
                          <label for="inputName">Tanggal Lahir</label>
                          <input type="date" name="tempat_lahir" id="ttl_anak2" class="form-control input-lg" value="{{ $sktmsekolah->tanggal_lahir}}" readonly/>
                        </div>
                        <div class="col-md-6">
                          <label for="inputName">Agama</label>
                          <input type="text" name="tempat_lahir" id="agama_anak" class="form-control input-lg" value="{{ $sktmsekolah->agama}}" readonly/>
                        </div>
                        <div class="col-md-6">
                          <label for="inputName">Pekerjaan</label>
                          <input type="text" name="tempat_lahir" id="pekerjaan_anak" class="form-control input-lg" value="{{ $sktmsekolah->pekerjaan}}" readonly/>
                        </div>
                        <div class="col-md-7">
                          <label for="inputName">Alamat</label>
                          <textarea name="alamat" id="alamat" class="form-control" rows="4" readonly>{{ $sktmsekolah->alamat}}</textarea>
                        </span></div>
                        </div></div>
                  </div> 
                </div>
                <div class="card">
                  <div class="card-body">
                      <div class="row">
                          <input type="hidden" name="id_warga" id="id_pemohon" class="form-control input-lg" value="{{ $sktmsekolah->id_warga}}" readonly/>
                        
                    <div class="col-md-6">
                      <label for="inputName">NIK Ayah</label>
                      <input type="text" name="nik_pemohon" id="nik_orangtua" class="form-control input-lg" value="{{ $sktmsekolah->nik_pemohon}}" readonly/>
                    </div>
                    <div class="col-md-6">
                      <label for="inputName">Nama Ayah</label>
                      <input type="text" name="nama_lengkap" id="nama_ayah" class="form-control input-lg" value="{{ $sktmsekolah->nama_lengkap}}" readonly/>
                    </div>
                    <div class="col-md-6">
                      <label for="inputName">Tempat Lahir</label>
                      <input type="text" name="tempat_lahir" id="ttl_ayah1" class="form-control input-lg" value="{{ $sktmsekolah->tempat_lahir}}" readonly/>
                    </div>
                    <div class="col-md-6">
                      <label for="inputName">Tanggal Lahir</label>
                      <input type="date" name="tanggal_lahir" id="ttl_ayah2" class="form-control input-lg"value="{{ $sktmsekolah->tanggal_lahir}}" readonly/>
                    </div>
                    <div class="col-md-6">
                      <label for="inputName">Agama</label>
                      <input type="text" name="agama" id="agama_ayah" class="form-control input-lg" value="{{ $sktmsekolah->agama}}" readonly/>
                    </div>
                    <div class="col-md-6">
                      <label for="inputName">Pekerjaan</label>
                      <input type="text" name="pekerjaan" id="pekerjaan_ayah" class="form-control input-lg" value="{{ $sktmsekolah->pekerjaan}}" readonly/>
                    </div>
                  <div class="col-md-5">
                    <label for="inputName">Status Surat</label>
                    <select class="form-control custom-select"  name="status_surat" >
                      <option <?= $sktmsekolah->status_surat == 'Proses'? 'Selected' : 'Proses' ?>>Proses</option>
                      <option <?= $sktmsekolah->status_surat == 'Selesai'? 'Selected' : 'Selesai' ?>>Selesai</option>
                    </select>
                </div>
                  </div></div>
                  <div class="card-footer">
                    <button type="submit" class="btn btn-success">Simpan</button>
                    <a class="btn btn-success" href="{{route('sktmsekolah.index')}}">Kembali</a>
                         
                     
                      </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
            </section>
        <!-- /.content -->
@endsection