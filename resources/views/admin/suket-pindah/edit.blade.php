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
        <form action="{{ url('suket-pindah/update/'.$pindah->id_persuratan)}}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <div class="row">
              <div class="col-md-7">
                <label for="inputName">No Surat</label>
                <input type="text" name="no_surat" class="form-control" value="{{ $pindah->no_surat}}" readonly>
                </div>
              <input type="hidden" name="id_warga" id="id_pemohon" class="form-control input-lg" />
              <div class="col-md-6">
                <label for="inputName">No KK</label>  
                <input type="text" name="no_kk" value="{{ $pindah->no_kk}}" class="form-control input-lg" readonly>
              </div>
              <div class="col-md-6">
                <label for="inputName">No NIK Kepala Keluarga</label>  
                <input type="text" name="nik_pemohon" value="{{ $pindah->no_nik}}" class="form-control input-lg" readonly/>
              </div>
        <div class="col-md-8">
          <label for="inputName">Alamat Tujuan</label>
        <textarea name="alamat_tujuan" id="alamat_tujuan"  rows="4"  class="form-control @error('alamat_tujuan') is-invalid @enderror">{{$pindah->alamat_tujuan}}</textarea>
            @error('alamat_tujuan')
            @enderror 
        </div>
        <div class="col-md-8">
          <label for="inputName">Alasan Pindah</label>
          <textarea name="alasan_pindah" id="alasan_pindah" rows="4"  class="form-control @error('alasan_pindah') is-invalid @enderror">{{$pindah->alasan_pindah}}</textarea>
            @error('alasan_pindah')
            @enderror
        </div></div></div>
      </div> 
    </div>
    <div class="card">
      <div class="card-body">
          <div class="row">
            <div class="col-md-6">
              <label for="inputName">NIK Pemohon</label>  
              <input type="text" name="no_nik" value="{{ $pindah->no_nik}}" class="form-control input-lg" readonly>
            </div>
            <div class="col-md-6">
              <label for="inputName">Nama Pemohon</label>  
              <input type="text" name="nama_lengkap" value="{{ $pindah->nama_lengkap}}" class="form-control input-lg" readonly>
            </div>
            <div class="col-md-5">
              <label for="inputName">Status Surat</label>
              <select class="form-control custom-select"  name="status_surat" >
                <option <?= $pindah->status_surat == 'Proses'? 'Selected' : 'Proses' ?>>Proses</option>
                <option <?= $pindah->status_surat == 'Selesai'? 'Selected' : 'Selesai' ?>>Selesai</option>
              </select>
            </div>
      </div></div>
      <div class="card-footer">
        <button type="submit" class="btn btn-success">Simpan</button>
                  <a class="btn btn-success" href="{{route('pindah.index')}}">Kembali</a>
      </div>
    </div>
  </div>
</section>
  
@endsection


