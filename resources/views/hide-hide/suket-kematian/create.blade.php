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
          <h3 class="card-title">Data Pengajuan Surat Kematian</h3>
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
                    <form action="{{ route('kematian.store')}}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group">
                      <div class="row">
                        <div class="col-md-6">
                        <label for="inputName">No Surat</label>
                        <input type="text" name="no_surat" class="form-control" placeholder="No Surat">
                        </div>
                          <div class="col-md-5">
                            <label for="inputName">Hari Kematian</label>
                            <select class="form-control custom-select"  name="hari_kematian">
                              <option selected disabled>Pilih Hari</option>
                              <option>Senin</option>
                              <option>Selasa</option>
                              <option>Rabu</option>
                              <option>Kamis</option>
                              <option>Jumat</option>
                              <option>Sabtu</option>
                              <option>Minggu</option>
                            </select>
                            </div>
                            <div class="col-md-6">
                              <label for="inputName">Tanggal Kematian</label>
                              <input type="date"  name="tgl_kematian" class="form-control">
                            </div>
                            <div class="col-md-5">
                              <label for="inputName">Tempat Kematian</label>
                              <input name="tempat_kematian" class="form-control" placeholder="Keperluan Surat">
                            </div>
                            <div class="col-md-6">
                              <label for="inputName">Penyebab Kematian</label>
                              <input name="penyebab_kematian" class="form-control" placeholder="Keperluan Surat">
                            </div>
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
                            <div class="col-md-8">
                              <label for="inputName">Foto Surat Kematian dari Rumah Sakit</label>
                              <input type="file"  name="foto_suratkematianrs">
                            </div>
                            <div class="col-md-8">
                            <label for="inputName">Tanggal Pembuatan</label>
                            <input type="date"  name="tgl_pembuatan" class="form-control">
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
                  <a class="btn btn-success" href="{{route('kematian.index')}}">Kembali</a>
                      </div>
                      </div>
                      </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
            </section>
        <!-- /.content -->
@endsection