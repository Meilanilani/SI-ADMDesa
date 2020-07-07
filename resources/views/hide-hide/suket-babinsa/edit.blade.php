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
                      <form action="{{ url('suket-babinsa/update/'.$babinsa->id_ket_babinsa)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                          <div class="row">
                            <div class="col-md-8">
                            <label for="inputName">No Surat</label>
                            <input type="text" name="no_surat" class="form-control" value="{{$babinsa->no_surat}}">
                            </div>
                          
                            <div class="col-md-6">
                                  <label for="inputName">Nama Babinsa</label>
                            <input type="text"  name="nama_babinsa" class="form-control" value="{{$babinsa->nama_babinsa}}">
                                </div>
                                  <div class="col-md-6">
                                    <label for="inputName">Pangkat Babinsa</label>
                                    <input type="text"  name="pangkat_babinsa" class="form-control" value="{{$babinsa->pangkat_babinsa}}">
                                  </div>
                                  <div class="col-md-6">
                                    <label for="inputName">Jabatan Babinsa</label>
                                    <input type="text"  name="jabatan_babinsa" class="form-control" value="{{$babinsa->jabatan_babinsa}}" >
                                  </div>
                                  <div class="col-md-2">
                                    <label for="inputName">TB Calon</label>
                                    <input type="text"  name="tb_calon" class="form-control" value="{{$babinsa->tb_calon}}">
                                  </div>
                                  <div class="col-md-2">
                                    <label for="inputName">BB Calon</label>
                                    <input type="text"  name="bb_calon" class="form-control" value="{{$babinsa->bb_calon}}" >
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
                                <div class="col-md-5">
                                <label for="inputName">Tanggal Pembuatan</label>
                                <input type="date"  name="tgl_pembuatan" class="form-control" value="{{$babinsa->tgl_pembuatan}}">
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
                      <a class="btn btn-success" href="{{route('babinsa.index')}}">Kembali</a>
                          </div>
                          </div>
                          </div>
                        <!-- /.card-body -->
                      </div>
                      <!-- /.card -->
                </section>
            <!-- /.content -->
    @endsection