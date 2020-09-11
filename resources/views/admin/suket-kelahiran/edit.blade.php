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
              <input type="text" name="nama_anak" class="form-control input-lg" value="{{$lahir->nama_anak}}" />
            </div>
            <div class="col-md-6">
              <label for="inputName">Tempat Lahir</label>
              <input type="text" name="tempat_lahir_anak" class="form-control input-lg" value="{{$lahir->tempat_lahir_anak}}"  />
            </div>
            <div class="col-md-6">
              <label for="inputName">Tanggal Lahir</label>
              <input type="date" name="tanggal_lahir_anak" class="form-control input-lg" value="{{$lahir->tanggal_lahir_anak}}" />
            </div>
            <div class="col-md-6">
                <label for="inputName">Jenis Kelamin</label>
                <input type="text" name="jenis_kelamin" class="form-control input-lg" value="{{$lahir->jenis_kelamin}}" />
              </div>
            <div class="col-md-6">
              <label for="inputName">Jam Lahir</label>
              <input type="time" name="jam_lahir"  class="form-control input-lg" value="{{$lahir->jam_lahir}}"  />
            </div>
            <div class="col-md-6">
              <label for="inputName">Anak ke</label>
              <input type="text" name="anak_ke"  class="form-control input-lg" value="{{$lahir->anak_ke}}"  />
            </div>
        <div class="col-md-6">
          <label for="inputName">Tanggal Pembuatan</label>
          <input type="date"  name="tgl_pembuatan" class="form-control" value="{{ $lahir->tgl_pembuatan}}" >
        </div>
        <div class="col-md-6">
          <label for="inputName">Status Surat</label>
          <select class="form-control custom-select"  name="status_surat" >
            <option selected disabled>Pilih Status</option>
            @if (isset($lahir->status_surat))
            <option selected>{{$lahir->status_surat}}</option>
            @endif
            <option>Proses</option>
            <option>Selesai</option>
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
          <label for="inputName">Agama</label>
          <input type="text" name="agama" id="agama_ayah" class="form-control input-lg"  value="{{ $lahir->agama}}" readonly/>
        </div>
        <div class="col-md-6">
          <label for="inputName">Pekerjaan</label>
          <input type="text" name="pekerjaan" id="pekerjaan_ayah" class="form-control input-lg"  value="{{ $lahir->pekerjaan}}" readonly/>
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
          <div class="col-md-6">
            <label for="inputName">Agama</label>
            <input type="text" name="agama" id="agama_ibu" class="form-control input-lg" value="{{ $lahir->agama}}" readonly/>
          </div>
          <div class="col-md-6">
            <label for="inputName">Pekerjaan</label>
            <input type="text" name="pekerjaan" id="pekerjaan_ibu" class="form-control input-lg"  value="{{ $lahir->pekerjaan}}" readonly/>
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


