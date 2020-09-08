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
        <form action="{{ url('suket-ktp-sementara/update/'.$ktp->id_persuratan)}}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <div class="row">
              <div class="col-md-7">
                <label for="inputName">No Surat</label>
                <input type="text" name="no_surat" class="form-control" value="{{ $ktp->no_surat}}" readonly>
                </div>
              <input type="hidden" name="id_warga" id="id_pemohon" value="{{ $ktp->id_warga}}" class="form-control input-lg" />
        <div class="col-md-6">
          <label for="inputName">NIK</label>
          <input type="text" name="nik_yg_bersangkutan" id="no_nik" class="form-control input-lg" value="{{ $ktp->nik_yg_bersangkutan}}" readonly/>
        </div>
        <div class="col-md-6">
          <label for="inputName">Nama Lengkap</label>
          <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control input-lg" value="{{ $ktp->nama_lengkap}}" readonly/>
        </div>
        <div class="col-md-6">
          <label for="inputName">Tempat Lahir</label>
          <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control input-lg" value="{{ $ktp->tempat_lahir}}" readonly/>
        </div>
        <div class="col-md-6">
          <label for="inputName">Tanggal Lahir</label>
          <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control input-lg" value="{{ $ktp->tanggal_lahir}}" readonly/>
        </div>
        <div class="col-md-6">
          <label for="inputName">Agama</label>
          <input type="text" name="agama" id="agama" class="form-control input-lg"  value="{{ $ktp->agama}}" readonly/>
        </div>
        <div class="col-md-6">
          <label for="inputName">Pekerjaan</label>
          <input type="text" name="pekerjaan" id="pekerjaan" class="form-control input-lg" value="{{ $ktp->pekerjaan}}" readonly/>
        </div>
            <div class="col-md-7">
              <label for="inputName">Alamat</label>
              <textarea name="alamat" id="alamat" class="form-control" rows="4" readonly>{{ $ktp->alamat}}</textarea>
            </span></div>
            </div></div>
      </div> 
    </div>
    <div class="card">
      <div class="card-body">
          <div class="row">
            
        {{ csrf_field() }}
        <div class="col-md-8">
          <label for="inputName">Foto Pengantar RT/ RW</label>
          <input type="file"  name="foto_pengantar">
        </div>
        <div class="col-md-8">
          <label for="inputName">Foto Kartu Keluarga</label>
          <input type="file"  name="foto_kk">
        </div>
        <div class="col-md-8">
          <label for="inputName">Foto KTP yang bersangkutan</label>
          <input type="file"  name="foto_ktp">
        </div>
        <div class="col-md-5">
        <label for="inputName">Tanggal Pembuatan</label>
        <input type="date"  name="tgl_pembuatan" class="form-control" value="{{$ktp->tgl_pembuatan}}">
      </div>
      <div class="col-md-5">
        <label for="inputName">Tanggal Masa Berlaku</label>
        <input type="date"  name="tgl_masa_berlaku" class="form-control" value="{{$ktp->tgl_pembuatan}}">
      </div>
      <div class="col-md-5">
        <label for="inputName">Status Surat</label>
        <select class="form-control custom-select"  name="status_surat" >
          <option selected disabled>Pilih Status</option>
          @if (isset($ktp->status_surat))
          <option selected>{{$ktp->status_surat}}</option>
          @endif
          <option>Proses</option>
          <option>Selesai</option>
        </select>
    </div>
      </div></div>
      <div class="card-footer">
        <button type="submit" class="btn btn-success">Simpan</button>
                  <a class="btn btn-success" href="{{route('ktp.index')}}">Kembali</a>
      </div>
    </div>
  </div>
</section>

@endsection


