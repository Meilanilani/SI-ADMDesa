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
        <form action="{{ route('usaha.store')}}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <div class="row">
              <div class="col-md-7">
                <label for="inputName">No Surat</label>
                <input type="text" name="no_surat" class="form-control" value="{{ $usaha->no_surat}}" readonly>
                </div>
              <input type="hidden" name="id_warga" id="id_pemohon" class="form-control input-lg" value="{{$usaha->id_warga}}"/>
        <div class="col-md-6">
          <label for="inputName">NIK</label>
          <input type="text" name="nik_pemilik_usaha" id="no_nik" class="form-control input-lg" value="{{$usaha->nik_pemilik_usaha}}" readonly/>
        </div>
        <div class="col-md-6">
          <label for="inputName">Nama Lengkap</label>
          <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control input-lg" value="{{$usaha->nama_lengkap}}" readonly/>
        </div>
        <div class="col-md-6">
          <label for="inputName">Tempat Lahir</label>
          <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control input-lg" value="{{$usaha->tempat_lahir}}" readonly/>
        </div>
        <div class="col-md-6">
          <label for="inputName">Tanggal Lahir</label>
          <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control input-lg" value="{{$usaha->tanggal_lahir}}" readonly/>
        </div>
        <div class="col-md-6">
          <label for="inputName">Agama</label>
          <input type="text" name="agama" id="agama" class="form-control input-lg" value="{{$usaha->agama}}" readonly/>
        </div>
        <div class="col-md-6">
          <label for="inputName">Status</label>
          <input type="text" name="status_perkawinan" id="status_perkawinan" class="form-control input-lg" value="{{$usaha->status_perkawinan}}" readonly/>
        </div>
        <div class="col-md-6">
          <label for="inputName">Pekerjaan</label>
          <input type="text" name="pekerjaan" id="pekerjaan" class="form-control input-lg" value="{{$usaha->pekerjaan}}" readonly/>
        </div>
            <div class="col-md-7">
              <label for="inputName">Alamat</label>
              <textarea name="alamat" id="alamat" class="form-control" rows="4" readonly>{{$usaha->alamat}}</textarea>
            </span></div>
            
            </div></div>
      </div> 
    </div>
    <div class="card">
      <div class="card-body">
          <div class="row">
        {{ csrf_field() }}
        <div class="col-md-6">
          <label for="inputName">Nama Usaha</label>
          <input type="text" name="nama_usaha"  class="form-control input-lg" value="{{$usaha->nama_usaha}}" readonly/>
        </div>
        <div class="col-md-6">
          <label for="inputName">Jenis Usaha</label>
          <input type="text" name="jenis_usaha"  class="form-control input-lg" value="{{$usaha->jenis_usaha}}" readonly/>
        </div>
        <div class="col-md-6">
          <label for="inputName">Penghasilan Bulanan</label>
          <input type="text" name="penghasilan_bulanan"  class="form-control input-lg" value="{{$usaha->penghasilan_bulanan}}" readonly />
        </div>
        <div class="col-md-7">
          <label for="inputName">Alamat Usaha</label>
          <textarea name="alamat_usaha" class="form-control" rows="4" readonly>{{$usaha->alamat_usaha}}</textarea>
        </span></div>
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
        <label for="inputName">Tanggal Pembuatan Surat</label>
        <input type="date"  name="tgl_pembuatan" class="form-control" value="{{$usaha->tgl_pembuatan}}">
      </div>
      <div class="col-md-5">
        <label for="inputName">Status Surat</label>
        <select class="form-control custom-select"  name="status_surat" >
          <option selected disabled>Pilih Status</option>
          @if (isset($usaha->status_surat))
          <option selected>{{$usaha->status_surat}}</option>
          @endif
          <option>Proses</option>
          <option>Selesai</option>
        </select>
    </div>
      </div></div>
      <div class="card-footer">
        <button type="submit" class="btn btn-success">Simpan</button>
                  <a class="btn btn-success" href="{{route('usaha.index')}}">Kembali</a>
      </div>
    </div>
  </div>
</section>
  
@endsection


