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
          <h3 class="card-title">Edit Data Surat Keterangan Babinsa</h3>
          
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
                      <form action="{{ url('suket-taksiran-tanah/update/'.$tanah->id_ket_taksiran_tanah)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                      <div class="form-group">
                      <div class="row">
                        <div class="col-md-8">
                        <label for="inputName">No Surat</label>
                        <input type="text" name="no_surat" class="form-control" value="{{$tanah->no_surat}}">
                        </div>
                        <div class="col-md-6">
                              <label for="inputName">No Sertifikat Tanah</label>
                              <input type="text"  name="no_sertifikat_tanah" class="form-control" value="{{$tanah->no_sertifikat_tanah}}">
                            </div>
                              <div class="col-md-3">
                                <label for="inputName">Luas Tanah</label>
                                <input type="text"  name="luas_tanah" class="form-control" value="{{$tanah->luas_tanah}}" >
                              </div>
                              <div class="col-md-6">
                                <label for="inputName">Pemilik Batas Utara</label>
                                <input type="text"  name="pemilik_batas_utara" class="form-control" value="{{$tanah->pemilik_batas_utara}}">
                              </div>
                              <div class="col-md-6">
                                <label for="inputName">Pemilik Batas Selatan</label>
                                <input type="text"  name="pemilik_batas_selatan" class="form-control" value="{{$tanah->pemilik_batas_selatan}}">
                              </div>
                              <div class="col-md-6">
                                <label for="inputName">Pemilik Batas Timur</label>
                                <input type="text"  name="pemilik_batas_timur" class="form-control" value="{{$tanah->pemilik_batas_timur}}">
                              </div>
                              <div class="col-md-6">
                                <label for="inputName">Pemilik Batas Barat</label>
                                <input type="text"  name="pemilik_batas_barat" class="form-control" value="{{$tanah->pemilik_batas_barat}}" >
                              </div>
                              <div class="col-md-4">
                                <label for="inputName">Tangga Kepemilikan</label>
                                <input type="date"  name="tgl_kepemilikan" class="form-control" value="{{$tanah->tgl_kepemilikan}}">
                              </div>
                              <div class="col-md-4">
                                <label for="inputName">Harga Tanah</label>
                                <input type="text"  name="harga_tanah" class="form-control" value="{{$tanah->harga_tanah}}">
                              </div>
                              <div class="col-md-4">
                                <label for="inputName">Harga Bangunan</label>
                                <input type="text"  name="harga_bangunan" class="form-control" value="{{$tanah->harga_bangunan}}" >
                              </div>
                            <div class="col-md-7">
                              <label for="inputName">Foto Pengantar RT/ RW</label>
                              <input type="file"  name="foto_pengantar">
                            </div>
                            <div class="col-md-7">
                              <label for="inputName">Foto Kartu Keluarga</label>
                              <input type="file"  name="foto_kk">
                            </div>
                            <div class="col-md-8">
                              <label for="inputName">Foto KTP Yang Bersangkutan</label>
                              <input type="file"  name="foto_ktp">
                            </div>
                            <div class="col-md-8">
                              <label for="inputName">Foto Sertifikat Tanah</label>
                              <input type="file"  name="foto_sertifikat_tanah">
                            </div>
                            <div class="col-md-8">
                              <label for="inputName">Foto SPTPBB</label>
                              <input type="file"  name="foto_sptpbb">
                            </div>
                            <div class="col-md-5">
                            <label for="inputName">Tanggal Pembuatan</label>
                            <input type="date"  name="tgl_pembuatan" class="form-control" value="{{$tanah->tgl_pembuatan}}">
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
                  <a class="btn btn-success" href="{{route('tanah.index')}}">Kembali</a>
                      </div>
                      </div>
                      </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
            </section>
        <!-- /.content -->
@endsection