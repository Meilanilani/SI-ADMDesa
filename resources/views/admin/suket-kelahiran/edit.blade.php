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
  <div class="card-group">
    <div class="card">
      <div class="card-body">
        <form action="{{ url('suket-kelahiran/update/'.$lahir->id_persuratan)}}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <div class="row">
            <div class="col-md-7">
            <label for="inputName">No Surat</label>
            <input type="text" name="no_surat" class="form-control" value="{{$lahir->no_surat}}" readonly>
            </div>
            <div class="col-md-6">
              <label for="inputName">Nama Lengkap Anak</label>
              <input type="text" name="nama_anak" value="{{$lahir->nama_anak}}" class="form-control @error('nama_anak') is-invalid @enderror">
              @error('nama_anak')
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="col-md-6">
              <label for="inputName">Tempat Lahir</label>
              <input type="text" name="tempat_lahir_anak" value="{{$lahir->tempat_lahir_anak}}" class="form-control @error('tempat_lahir_anak') is-invalid @enderror">
              @error('tempat_lahir_anak')
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="col-md-6">
              <label for="inputName">Tanggal Lahir</label>
              <input type="date" name="tanggal_lahir_anak" value="{{$lahir->tanggal_lahir_anak}}" class="form-control @error('tanggal_lahir') is-invalid @enderror">
              @error('tanggal_lahir')
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="col-md-6">
                <label for="inputName">Jenis Kelamin</label>
                <select class="form-control custom-select"  name="jenis_kelamin" >
                  <option <?= $lahir->jenis_kelamin == 'Laki-Laki'? 'Selected' : 'Laki-Laki' ?>>Laki-Laki</option>
                  <option <?= $lahir->jenis_kelamin == 'Perempuan'? 'Selected' : 'Perempuan' ?>>Perempuan</option>
                </select>
              </div>
            <div class="col-md-6">
              <label for="inputName">Jam Lahir</label>
              <input type="time" name="jam_lahir" value="{{$lahir->jam_lahir}}" class="form-control @error('jam_lahir') is-invalid @enderror">
              @error('jam_lahir')
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="col-md-6">
              <label for="inputName">Anak ke</label>
              <input type="text" name="anak_ke" value="{{$lahir->anak_ke}}" class="form-control @error('anak_ke') is-invalid @enderror">
              @error('anak_ke')
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
        <div class="col-md-6">
          <label for="inputName">Status Surat</label>
          <select class="form-control custom-select"  name="status_surat" >
            <option <?= $lahir->status_surat == 'Proses'? 'Selected' : 'Proses' ?>>Proses</option>
            <option <?= $lahir->status_surat == 'Selesai'? 'Selected' : 'Selesai' ?>>Selesai</option>
          </select>
    </div>
            </div>
            </div>
      </div> 
    </div>
    <div class="card">
      <div class="card-body">
          <div class="row">
              <input type="hidden" name="id_warga" id="id_pemohon" class="form-control input-lg" value="{{ $lahir->id_warga}}" />
        <div class="col-md-6">
          <label for="inputName">NIK Ayah</label>
          <input type="text" name="nik_pemohon" id="nik_ayah" class="form-control input-lg" value="{{ $lahir->nik_pemohon}}" readonly/>
        </div>
        <div class="col-md-6">
          <label for="inputName">Nama Ayah</label>
          <input type="text" name="nama_lengkap" id="nama_ayah" class="form-control input-lg"  value="{{ $lahir->nama_lengkap}}" readonly/>
        </div>
        <div class="col-md-6">
          <label for="inputName">Tempat Lahir</label>
          <input type="text" name="tempat_lahir" id="ttl_ayah1" class="form-control input-lg"  value="{{ $lahir->tempat_lahir}}" readonly/>
        </div>
        <div class="col-md-6">
          <label for="inputName">Tanggal Lahir</label>
          <input type="date" name="tanggal_lahir" id="ttl_ayah2" class="form-control input-lg" value="{{ $lahir->tanggal_lahir}}" readonly/>
        </div>
        
        <div class="col-md-6">
            <label for="inputName">NIK Ibu</label>
            <input type="text" name="nik_ibu" id="nik_ibu" class="form-control input-lg"  value="{{ $lahir->nik_ibu}}" readonly />
          </div>
          <div class="col-md-6">
            <label for="inputName">Nama Ibu</label>
            <input type="text" name="nama_lengkap" id="nama_ibu" class="form-control input-lg"  value="{{ $lahir->nama_lengkap}}" readonly/>
          </div>
          <div class="col-md-6">
            <label for="inputName">Tempat Lahir</label>
            <input type="text" name="tempat_lahir" id="ttl_ibu1" class="form-control input-lg"  value="{{ $lahir->tempat_lahir}}" readonly/>
          </div>
          <div class="col-md-6">
            <label for="inputName">Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" id="ttl_ibu2" class="form-control input-lg" value="{{ $lahir->tanggal_lahir}}" readonly/>
          </div>
          
        <div class="col-md-7">
            <label for="inputName">Alamat</label>
        <textarea name="alamat" id="alamat" class="form-control" rows="4" readonly>{{$lahir->alamat}}</textarea>
          </span></div>
        
      </div></div>
      <div class="card-footer">
        <button type="submit" class="btn btn-success">Simpan</button>
                  <a class="btn btn-success" href="{{route('kelahiran.index')}}">Kembali</a>
      </div>
    </div>
  </div>
</section>
 
@endsection


