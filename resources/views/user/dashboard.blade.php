@extends('user.layouts.master')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Halaman Utama</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="callout callout-info">
              <h5>Catatan :</h5>
              Mohon data diisi dengan data yang sesuai dengan data yang tercantum di berkas yang diperlukan.
            </div>


            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                </div>
                <!-- /.col -->
              </div>
              <div class="row">
                <!-- /.col -->
                <div class="col-8">
                  <p class="lead">Silahkan klik salah satu menu dibawah ini untuk petunjuk cara pengajuan dan persyaratan berkas yang harus disiapkan.</p>

                  <div class="table-responsive">
                    <table class="table">
                      <tr>
                        <th style="width:50%">Petunjuk Cara Pengajuan Surat :</th>
                        <td>Klik Disini untuk melihat</td>
                      </tr>
                      <tr>
                        <th>Persyaratan Berkas yang harus disiapkan :</th>
                        <td>
                            Surat Keterangan Tidak Mampu Sekolah <br>
                            Surat Keterangan Tidak Mampu RS <br>
                            Surat Keterangan Kelahiran <br>
                            Surat Keterangan Kematian <br>
                            Surat Keterangan Pengantar Nikah/ NA <br>
                            Surat Keterangan SKCK <br>
                            Surat Keterangan KTP Sementara <br>
                            Surat Keterangan Usaha <br>
                            Surat Keterangan Pindah <br>
                            Surat Keterangan Domisili <br>
                            Surat Keterangan Pengajuan KK Baru <br>

                        </td>
                      </tr>
                      <tr>
                        <th>Informasi Kontak Petugas :</th>
                        <td>Klik Disini untuk melihat</td>
                      </tr>
                      
                    </table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
             
      </div><!-- /.container-fluid -->

</section>

  @endsection