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
        <form action="{{ url('suket-pengantar-skck/update/'.$skck->id_persuratan)}}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <div class="row">
              <div class="col-md-7">
                <label for="inputName">No Surat</label>
                <input type="text" name="no_surat" class="form-control" value="{{ $skck->no_surat}}" readonly>
                </div>
              <input type="hidden" name="id_warga" id="id_pemohon" value="{{ $skck->id_warga}}" class="form-control input-lg" />
        <div class="col-md-6">
          <label for="inputName">NIK</label>
          <input type="text" name="nik_yg_bersangkutan" id="no_nik" class="form-control input-lg" value="{{ $skck->nik_yg_bersangkutan}}" readonly/>
        </div>
        <div class="col-md-6">
          <label for="inputName">Nama Lengkap</label>
          <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control input-lg" value="{{ $skck->nama_lengkap}}" readonly/>
        </div>
        <div class="col-md-6">
          <label for="inputName">Tempat Lahir</label>
          <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control input-lg" value="{{ $skck->tempat_lahir}}" readonly/>
        </div>
        <div class="col-md-6">
          <label for="inputName">Tanggal Lahir</label>
          <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control input-lg" value="{{ $skck->tanggal_lahir}}" readonly/>
        </div>
        <div class="col-md-6">
          <label for="inputName">Agama</label>
          <input type="text" name="agama" id="agama" class="form-control input-lg"  value="{{ $skck->agama}}" readonly/>
        </div>
        <div class="col-md-6">
          <label for="inputName">Pekerjaan</label>
          <input type="text" name="pekerjaan" id="pekerjaan" class="form-control input-lg" value="{{ $skck->pekerjaan}}" readonly/>
        </div>
            <div class="col-md-7">
              <label for="inputName">Alamat</label>
              <textarea name="alamat" id="alamat" class="form-control" rows="4" readonly>{{ $skck->alamat}}</textarea>
            </span></div>
            </div></div>
      </div> 
    </div>
    <div class="card">
      <div class="card-body">
          <div class="row">
            
        {{ csrf_field() }}
        <input type="hidden" name="id_warga" id="id_pemohon" class="form-control input-lg" value="{{$skck->id_warga}}" readonly/>
        <div class="col-md-6">
          <label for="inputName">NIK Pemohon</label>
          <input type="text" name="nik_pemohon" id="nik_pemohon" class="form-control input-lg" value="{{$skck->nik_pemohon}}" readonly/>
        </div>
        <div class="col-md-6">
          <label for="inputName">Nama Pemohon</label>
          <input type="text" name="nama_lengkap" id="nama_pemohon" class="form-control input-lg" value="{{$skck->nama_lengkap}}" readonly/>
        </div>
        
        <div class="col-md-6">
          <label for="inputName">Keperluan Surat</label>
          <input type="text" name="ket_keperluan_surat" value="{{$skck->ket_keperluan_surat}}"  class="form-control @error('ket_keperluan_surat') is-invalid @enderror">
          @error('ket_keperluan_surat')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror 
        </div>
        <input type="hidden"  name="tgl_masa_berlaku" class="form-control" value="{{$skck->tgl_masa_berlaku}}">
      <div class="col-md-6">
        <label for="inputName">Status Surat</label>
        <select class="form-control custom-select"  name="status_surat" >
          <option <?= $skck->status_surat == 'Proses'? 'Selected' : 'Proses' ?>>Proses</option>
          <option <?= $skck->status_surat == 'Selesai'? 'Selected' : 'Selesai' ?>>Selesai</option>
        </select>
    </div>
      </div></div>
      <div class="card-footer">
        <button type="submit" class="btn btn-success">Simpan</button>
                  <a class="btn btn-success" href="{{route('skck.index')}}">Kembali</a>
      </div>
    </div>
  </div>
</section>

@endsection


