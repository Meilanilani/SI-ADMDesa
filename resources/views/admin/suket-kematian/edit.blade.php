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
        <form action="{{ url('suket-kematian/update/'.$kematian->id_persuratan)}}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <div class="row">
              <div class="col-md-7">
                <label for="inputName">No Surat</label>
                <input type="text" name="no_surat" class="form-control" value="{{ $kematian->no_surat}}" readonly>
                </div>  
          <div class="col-md-6">
          <label for="inputName">NIK</label>
          <input type="text" name="nik_yg_bersangkutan" id="no_nik" class="form-control input-lg"  value="{{ $kematian->nik_yg_bersangkutan}}" readonly />
        </div>
        <div class="col-md-6">
          <label for="inputName">Nama Lengkap</label>
          <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control input-lg"  value="{{ $data_warga->nama_lengkap}}" readonly/>
        </div>
        <div class="col-md-6">
          <label for="inputName">Tempat Lahir</label>
          <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control input-lg" value="{{ $data_warga->tempat_lahir}}" readonly/>
        </div>
        <div class="col-md-6">
          <label for="inputName">Tanggal Lahir</label>
          <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control input-lg" value="{{ $data_warga->tanggal_lahir}}" readonly/>
        </div>
        <div class="col-md-6">
          <label for="inputName">Agama</label>
          <input type="text" name="agama" id="agama" class="form-control input-lg" value="{{ $data_warga->agama}}" readonly/>
        </div>
        <div class="col-md-6">
          <label for="inputName">Status</label>
          <input type="text" name="status_perkawinan" class="form-control input-lg" value="{{ $data_warga->status_perkawinan}}" readonly/>
        </div>
        <div class="col-md-6">
          <label for="inputName">Pekerjaan</label>
          <input type="text" name="pekerjaan" id="pekerjaan" class="form-control input-lg" value="{{ $data_warga->pekerjaan}}" readonly/>
        </div>
            <div class="col-md-7">
              <label for="inputName">Alamat</label>
              <textarea name="alamat" id="alamat" class="form-control" rows="4" readonly>{{$kematian->alamat}}</textarea>
            </span></div>
            </div></div>
      </div> 
    </div>
    <div class="card">
      <div class="card-body">
          <div class="row">
        {{ csrf_field() }}
        <input type="hidden" name="id_warga" id="id_pemohon" class="form-control input-lg" value="{{ $kematian->id_warga}}" readonly/>
        <div class="col-md-6">
          <label for="inputName">NIK Pemohon</label>
          <input type="text" name="nik_pemohon" id="nik_pemohon" class="form-control input-lg" value="{{ $kematian->nik_pemohon}}" readonly />
        </div>
        <div class="col-md-6">
          <label for="inputName">Nama Pemohon</label>
          <input type="text" name="nama_lengkap" id="nama_pemohon" class="form-control input-lg" value="{{ $kematian->nama_lengkap}}" readonly/>
        </div>
        <div class="col-md-6">
          <label for="inputName">Tanggal Kematian</label>
          <input type="date" name="tgl_kematian" class="form-control input-lg" value="{{ $kematian->tgl_kematian}}" />
        </div>
        <div class="col-md-6">
          <label for="inputName">Tempat Kematian</label>
          <input type="text" name="tempat_kematian" class="form-control input-lg" value="{{ $kematian->tempat_kematian}}" />
        </div>
        <div class="col-md-6">
          <label for="inputName">Penyebab Kematian</label>
          <input type="text" name="penyebab_kematian" class="form-control input-lg" value="{{ $kematian->penyebab_kematian}}" />
        </div>
      <div class="col-md-5">
        <label for="inputName">Status Surat</label>
        <select class="form-control custom-select"  name="status_surat" >
          <option <?= $kematian->status_surat == 'Proses'? 'Selected' : 'Proses' ?>>Proses</option>
          <option <?= $kematian->status_surat == 'Selesai'? 'Selected' : 'Selesai' ?>>Selesai</option>
        </select>
    </div>
      </div></div>
      <div class="card-footer">
        <button type="submit" class="btn btn-success">Simpan</button>
                  <a class="btn btn-success" href="{{route('kematian.index')}}">Kembali</a>
      </div>
    </div>
  </div>
</section>
@endsection


