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
          <h3 class="card-title">Edit Data Surat Keterangan Domisili Lembaga</h3>
          
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
                    <form action="{{ url('suket-domisili-lembaga/update/'.$lembaga->id_domisili_lembaga)}}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group">
                      <div class="row">
                        <div class="col-md-7">
                        <label for="inputName">No Surat</label>
                        <input type="text" name="no_surat" class="form-control"  value="{{ $lembaga->no_surat}}">
                        </div>
                            <div class="col-md-6">
                              <label for="inputName">Nama Lembaga</label>
                              <input type="text"  name="nama_lembaga" class="form-control" value="{{ $lembaga->nama_lembaga}}">
                            </div>
                            <div class="col-md-6">
                              <label for="inputDescription">No Telp</label>
                              <input type="text"  name="no_telp_lembaga" class="form-control" value="{{ $lembaga->no_telp_lembaga}}">
                            </div>
                            <div class="col-md-8">
                              <label for="inputName">Alamat Lembaga</label>
                              <textarea name="alamat_lembaga" class="form-control" rows="4">{{ $lembaga->alamat_lembaga}}"</textarea>
                            </div>
                            <div class="col-md-6">
                              <label for="inputDescription">Bidang Lembaga</label>
                              <input type="text"  name="bidang_lembaga" class="form-control"  value="{{ $lembaga->bidang_lembaga}}">
                            </div>
                            <div class="col-md-2">
                              <label for="inputDescription">Pegawai</label>
                              <input type="text"  name="jumlah_pegawai" class="form-control" value="{{ $lembaga->jumlah_pegawai}}">
                            </div>
                            <div class="col-md-2">
                              <label for="inputDescription">Jam Kerja</label>
                              <input type="text"  name="jam_kerja" class="form-control" value="{{ $lembaga->jam_kerja}}">
                            </div>
                            <div class="col-md-6">
                              <label for="inputName">Foto Pengantar RT/ RW</label>
                              <input type="file"  name="foto_pengantar">
                            </div>
                            <div class="col-md-6">
                              <label for="inputName">Foto Kartu Keluarga</label>
                              <input type="file"  name="foto_kk">
                            </div>
                            <div class="col-md-6">
                              <label for="inputName">Foto KTP Pemilik</label>
                              <input type="file"  name="foto_ktp">
                            </div>
                            <div class="col-md-6">
                              <label for="inputName">Foto Akta Notaris</label>
                              <input type="file"  name="foto_akta_notaris">
                            </div>
                            <div class="col-md-6">
                            <label for="inputName">Tanggal Pembuatan</label>
                            <input type="date"  name="tgl_pembuatan" class="form-control" value="{{ $lembaga->tgl_pembuatan}}"> 
                          </div>
                        <div class="col-md-5">
                          <label for="inputName">Status Surat</label>
                          <select class="form-control custom-select"  name="status_surat">
                            <option selected disabled>Pilih Status</option>
                            <option>Proses</option>
                            <option>Selesai</option>
                          </select>
                      </div>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-success">Simpan</button>
                  <a class="btn btn-success" href="{{route('lembaga.index')}}">Kembali</a>
                      </div>
                      </div>
                      </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
            </section>
        <!-- /.content -->
@endsection