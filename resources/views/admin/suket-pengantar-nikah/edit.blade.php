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
        <form action="{{ url('suket-pengantar-nikah/update/'.$pnikah->id_persuratan)}}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <div class="row">
            <div class="col-md-7">
            <label for="inputName">No Surat</label>
            <input type="text" name="no_surat" class="form-control" value="{{ $pnikah->no_surat}}" readonly>
            </div>
            <div class="col-md-6">
              <label for="inputName">NIK Anak</label>
              <input type="text" name="nik_anak"  class="form-control input-lg" value="{{ $pnikah->nik_anak}}" readonly/>
            </div>
            <div class="col-md-6">
              <label for="inputName">Nama Anak</label>
              <input type="text" name="nama_lengkap" id="nama_anak" class="form-control input-lg" value="{{ $pnikah->nama_lengkap}}" readonly/>
            </div>
            <div class="col-md-6">
              <label for="inputName">Tempat Lahir</label>
              <input type="text" name="tempat_lahir" id="ttl_anak1" class="form-control input-lg" value="{{ $pnikah->tempat_lahir}}" readonly/>
            </div>
            <div class="col-md-6">
              <label for="inputName">Tanggal Lahir</label>
              <input type="date" name="tanggal_lahir" id="ttl_anak2" class="form-control input-lg" value="{{ $pnikah->tempat_lahir}}" readonly/>
            </div>
            <div class="col-md-6">
              <label for="inputName">Agama</label>
              <input type="text" name="agama" id="agama_anak" class="form-control input-lg" value="{{ $pnikah->agama}}" readonly/>
            </div>
            <div class="col-md-6">
              <label for="inputName">Pekerjaan</label>
              <input type="text" name="pekerjaan" id="pekerjaan_anak" class="form-control input-lg" value="{{ $pnikah->pekerjaan}}" readonly/>
            </div>
            <div class="col-md-7">
              <label for="inputName">Alamat</label>
              <textarea name="alamat" id="alamat" class="form-control" rows="4" readonly>{{ $pnikah->alamat}}</textarea>
            </span></div>
            </div></div>
      </div> 
    </div>
    <div class="card">
      <div class="card-body">
          <div class="row">
              <input type="hidden" name="id_warga" id="id_pemohon" class="form-control input-lg" value="{{ $pnikah->id_warga}}" />
           
        <div class="col-md-6">
          <label for="inputName">NIK Ayah</label>
          <input type="text" name="nik_pemohon" id="nik_ayah" class="form-control input-lg" value="{{ $pnikah->nik_pemohon}}" readonly/>
        </div>
        <div class="col-md-6">
          <label for="inputName">Nama Ayah</label>
          <input type="text" name="nama_lengkap" id="nama_ayah" class="form-control input-lg" value="{{ $pnikah->nama_lengkap}}" readonly/>
        </div>
        <div class="col-md-6">
          <label for="inputName">Tempat Lahir</label>
          <input type="text" name="tempat_lahir" id="ttl_ayah1" class="form-control input-lg" value="{{ $pnikah->tempat_lahir}}" readonly/>
        </div>
        <div class="col-md-6">
          <label for="inputName">Tanggal Lahir</label>
          <input type="date" name="tanggal_lahir" id="ttl_ayah2" class="form-control input-lg" value="{{ $pnikah->tanggal_lahir}}" readonly/>
        </div>
        <div class="col-md-6">
          <label for="inputName">Agama</label>
          <input type="text" name="agama" id="agama_ayah" class="form-control input-lg" value="{{ $pnikah->agama}}" readonly/>
        </div>
        <div class="col-md-6">
          <label for="inputName">Pekerjaan</label>
          <input type="text" name="pekerjaan" id="pekerjaan_ayah" class="form-control input-lg" value="{{ $pnikah->pekerjaan }}" readonly/>
        </div>
        <div class="col-md-6">
          <label for="inputName">NIK Ibu</label>
          <input type="text" name="nik_ibu" id="nik_ibu" class="form-control input-lg" value="{{ $pnikah->nik_ibu}}" readonly/>
        </div>
        <div class="col-md-6">
          <label for="inputName">Nama Ibu</label>
          <input type="text" name="nama_lengkap" id="nama_ibu" class="form-control input-lg" value="{{ $pnikah->nama_lengkap}}" readonly/>
        </div>
        <div class="col-md-6">
          <label for="inputName">Tempat Lahir</label>
          <input type="text" name="tempat_lahir" id="ttl_ibu1" class="form-control input-lg" value="{{ $pnikah->tempat_lahir}}" readonly/>
        </div>
        <div class="col-md-6">
          <label for="inputName">Tanggal Lahir</label>
          <input type="date" name="tanggal_lahir" id="ttl_ibu2" class="form-control input-lg" value="{{ $pnikah->tanggal_lahir }}" readonly/>
        </div>
        <div class="col-md-6">
          <label for="inputName">Agama</label>
          <input type="text" name="agama" id="agama_ibu" class="form-control input-lg" value="{{ $pnikah->agama}}" readonly/>
        </div>
        <div class="col-md-6">
          <label for="inputName">Pekerjaan</label>
          <input type="text" name="pekerjaan" id="pekerjaan_ibu" class="form-control input-lg" value="{{ $pnikah->pekerjaan}}" readonly/>
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
        <label for="inputName">Tanggal Pembuatan</label>
        <input type="date"  name="tgl_pembuatan" class="form-control" value="{{ $pnikah->tgl_pembuatan}}">
      </div>
      <div class="col-md-5">
        <label for="inputName">Status Surat</label>
        <select class="form-control custom-select"  name="status_surat" >
          <option selected disabled>Pilih Status</option>
          @if (isset($pnikah->status_surat))
          <option selected>{{$pnikah->status_surat}}</option>
          @endif
          <option>Proses</option>
          <option>Selesai</option>
        </select>
    </div>
      </div></div>
      <div class="card-footer">
        <button type="submit" class="btn btn-success">Simpan</button>
                  <a class="btn btn-success" href="{{route('pnikah.index')}}">Kembali</a>
      </div>
    </div>
  </div>
</section>
@endsection


