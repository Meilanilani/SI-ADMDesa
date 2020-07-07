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
          <h3 class="card-title">Edit Data Surat Keterangan Pindah</h3>
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
                    <form action="{{ url('suket-pindah/update/'.$pindah->id_ket_pindah)}}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group">
                      <div class="row">
                        <div class="col-md-6">
                        <label for="inputName">No Surat</label>
                        <input type="text" name="no_surat" class="form-control" value="{{ $pindah->no_surat}}">

                        </div>
                            <div class="col-md-8">
                              <label for="inputDescription">Alamat Tujuan</label>
                              <textarea name="alamat_tujuan" class="form-control" rows="3"> {{ $pindah->alamat_tujuan}}</textarea>
                            </div>
                            <div class="col-md-8">
                              <label for="inputDescription">Alasan Pindah</label>
                              <textarea name="alasan_pindah" class="form-control" rows="3">{{ $pindah->alasan_pindah}}</textarea>
                            </div>
                            <div class="col-md-2">
                              <label for="inputName">Jumlah Pengikut</label>
                              <input type="number" name="jumlah_pengikut" class="form-control" value="{{ $pindah->jumlah_pengikut}}">
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
                              <label for="inputName">Foto KTP Suami Istri</label>
                              <input type="file"  name="foto_ktp">
                            </div>
                            <div class="col-md-6">
                              <label for="inputName">Foto Surat Akta Cerai</label>
                              <input type="file"  name="foto_akta_cerai">
                            </div>
                            <div class="col-md-6">
                            <label for="inputName">Foto Surat Pindah Sebelumnya</label>
                            <input type="file"  name="foto_surat_pindah_sebelumnya">
                          </div>
                          <div class="col-md-5">
                            <label for="inputName">Tanggal Pembuatan</label>
                            <input type="date" name="tgl_pembuatan" class="form-control" value="{{ $pindah->tgl_pembuatan}}">
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
                  <a class="btn btn-success" href="{{route('pindah.index')}}">Kembali</a>
                      </div>
                      </div>
                      </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
            </section>
        <!-- /.content -->
@endsection