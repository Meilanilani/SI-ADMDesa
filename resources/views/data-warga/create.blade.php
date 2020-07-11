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
    <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Tambah Data Warga</h3>
          <div class="card-tools">
                </div>
              </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                      @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li> {{ $error }}</li>
                @endforeach
                  </ul>
              </div>
              @endif
                      <form method="POST" action="{{ route('datawarga.store') }}">
                        @csrf
                <div class="form-group">
                    <div class="row">
                    <div class="col-md-6">
                  <label for="inputName">No KK</label>
                  <input type="text" name="no_kk" value="{{ old('no_kk') }}" id="warga-no_kk" class="form-control">
                </div>
                <div class="col-md-6">
                    <label for="inputName">NIK</label>
                    <input type="text" name="no_nik" value="{{ old('no_nik') }}" id="warga-no_nik" class="form-control">
                  </div>
                  <div class="col-md-9">
                    <label for="inputName">Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" value="{{ old('nama_lengkap') }}" id="warga-nama_lengkap" class="form-control">
                  </div>
                  <div class="col-md-3">
                    <label for="inputName">Jenis Kelamin</label>
                    <select name="jenis_kelamin" value="{{ old('jenis_kelamin') }}" id="warga-jenis_kelamin" class="form-control">
                      <option>Laki-Laki</option>
                      <option>Perempuan</option>
                    </select> 
                  </div>
                  <div class="col-md-6">
                    <label for="inputName">Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" value="{{ old('tempat_lahir') }}" id="warga-tempat_lahir" class="form-control">
                  </div>
                  <div class="col-md-6">
                    <label for="inputName">Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" id="warga-tanggal_lahir" class="form-control">
                  </div>
                  <div class="col-md-6">
                    <label for="inputName">Agama</label>
                    <select name="agama" value="{{ old('agama') }}" id="warga-agama" class="form-control">
                      <option>Islam</option>
                      <option>Katolik</option>
                      <option>Protestan</option>
                      <option>Hindu</option>
                      <option>Buddha</option>
                      <option>Kong Hu Cu</option>
                      <option>Lain-lain</option>
                    </select>
                  </div>
                  <div class="col-md-6">
                    <label for="inputName">Pendidikan</label>
                    <select name="pendidikan" value="{{ old('pendidikan') }}" id="warga-pendidikan" class="form-control">
                      <option>Belum Sekolah</option>
                      <option>SD/ MI</option>
                      <option>SMP/MTs</option>
                      <option>SMA/MA/SMK</option>
                      <option>D3</option>
                      <option>D4/S1</option>
                      <option>S2</option>
                      <option>S3</option>
                    </select>
                  </div>
                    </div>
                </div>
                </div>
                  <div class="col-md-6">
                    <div class="row">
                      <div class="col-md-6">
                        <label for="inputName">Pekerjaan</label>
                        <input type="text" name="pekerjaan" value="{{ old('pekerjaan') }}" id="warga-pekerjaan" class="form-control">
                      </div>
                      <div class="col-md-6">
                        <label for="inputName">Status Perkawinan</label>
                        <select name="status_perkawinan" value="{{ old('status_perkawinan') }}" id="warga-status_perkawinan" class="form-control" class="form-control">
                          <option>Belum Menikah</option>
                          <option>Menikah</option>
                          <option>Cerai Mati</option>
                          <option>Cerai Hidup</option>
                        </select>
                      </div>
                      <div class="col-md-6">
                        <label for="inputName">Nama Ayah</label>
                        <input type="text" name="nama_ayah" value="{{ old('nama_ayah') }}" id="warga-nama_ayah" class="form-control">
                      </div>
                      <div class="col-md-6">
                        <label for="inputName">Nama Ibu</label>
                        <input type="text" name="nama_ibu" value="{{ old('nama_ibu') }}" id="warga-nama_ibu" class="form-control">
                      </div>
                    </div>
                      <div class="form-group">
                        <label for="inputDescription">Alamat</label>
                        <textarea name="alamat" value="{{ old('alamat') }}" id="warga-alamat" class="form-control" rows="4"></textarea>
                      </div></div>
                    </div>
                    <button type="submit" class="btn btn-success">Save</button>
                  </div>
                </form>
                  </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
      </section>
  <!-- /.content -->
@endsection