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
        <form action="{{ url('suket-tidakmampu-rumahsakit/update/'.$sktmrs->id_persuratan)}}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <div class="row">
              <div class="col-md-7">
                <label for="inputName">No Surat</label>
                <input type="text" name="no_surat" class="form-control" value="{{ $sktmrs->no_surat}}" readonly>
                </div>
              <input type="hidden" name="id_warga" id="id_pemohon" value="{{ $sktmrs->id_warga}}" class="form-control input-lg" />
        <div class="col-md-6">
          <label for="inputName">NIK</label>
          <input type="text" name="nik_pemohon" id="no_nik" class="form-control input-lg" value="{{ $sktmrs->nik_pemohon}}" readonly/>
        </div>
        <div class="col-md-6">
          <label for="inputName">Nama Lengkap</label>
          <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control input-lg" value="{{ $sktmrs->nama_lengkap}}" readonly/>
        </div>
        <div class="col-md-6">
          <label for="inputName">Tempat Lahir</label>
          <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control input-lg" value="{{ $sktmrs->tempat_lahir}}" readonly/>
        </div>
        <div class="col-md-6">
          <label for="inputName">Tanggal Lahir</label>
          <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control input-lg" value="{{ $sktmrs->tanggal_lahir}}" readonly/>
        </div>
        <div class="col-md-6">
          <label for="inputName">Agama</label>
          <input type="text" name="agama" id="agama" class="form-control input-lg"  value="{{ $sktmrs->agama}}" readonly/>
        </div>
        <div class="col-md-6">
          <label for="inputName">Pekerjaan</label>
          <input type="text" name="pekerjaan" id="pekerjaan" class="form-control input-lg" value="{{ $sktmrs->pekerjaan}}" readonly/>
        </div>
            <div class="col-md-7">
              <label for="inputName">Alamat</label>
              <textarea name="alamat" id="alamat" class="form-control" rows="4" readonly>{{ $sktmrs->alamat}}</textarea>
            </span></div>
            </div></div>
      </div> 
    </div>
    <div class="card">
      <div class="card-body">
          <div class="row">
            <div class="col-md-6">
              <label for="inputName">NIK Yang Bersangkutan</label>
              <input type="text" name="nik_yg_bersangkutan" id="nik_yg_bersangkutan" class="form-control input-lg" value="{{ $sktmrs->nik_yg_bersangkutan}}" readonly />
            </div>
            <div class="col-md-6">
              <label for="inputName">Nama Lengkap</label>
              <input type="text" name="nama_lengkap" id="nama_yg_bersangkutan" class="form-control input-lg" value="{{ $sktmrs->nama_lengkap}}" readonly/>
            </div>
            <div class="col-md-6">
              <label for="inputName">Tempat Lahir</label>
              <input type="text" name="tempat_lahir" id="tempat_lahir_yg_bersangkutan" class="form-control input-lg" value="{{ $sktmrs->tempat_lahir}}" readonly/>
            </div>
            <div class="col-md-6">
              <label for="inputName">Tanggal Lahir</label>
              <input type="date" name="tanggal_lahir" id="tgl_lahir_yg_bersangkutan" class="form-control input-lg" value="{{ $sktmrs->tanggal_lahir}}" readonly/>
            </div>
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
          <label for="inputName">Status Surat</label>
          <select class="form-control custom-select"  name="status_surat" >
            <option <?= $sktmrs->status_surat == 'Proses'? 'Selected' : 'Proses' ?>>Proses</option>
            <option <?= $sktmrs->status_surat == 'Selesai'? 'Selected' : 'Selesai' ?>>Selesai</option>
          </select>
      </div>
      </div></div>
      <div class="card-footer">
        <button type="submit" class="btn btn-success">Simpan</button>
                  <a class="btn btn-success" href="{{route('sktmrs.index')}}">Kembali</a>
      </div>
    </div>
  </div>
</section>

@endsection


