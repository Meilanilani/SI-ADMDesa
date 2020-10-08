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
                            <p class="lead">Silahkan klik salah satu menu dibawah ini untuk petunjuk cara pengajuan dan
                                persyaratan berkas yang harus disiapkan.</p>

                            <div class="table-responsive">
                                <table class="table">
                                    <tr>
                                        <th style="width:50%">Petunjuk Cara Pengajuan Surat :</th>
                                        <td><button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target=".bd-example-modal-lg">
                                                Klik disini untuk melihat!
                                            </button></td>
                                        <!-- Button trigger modal -->
                                        <!-- Modal -->
                                        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
                                            aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Petunjuk Cara
                                                            Pengajuan Surat</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        1. Pastikan Anda sudah melakukan Login terlebih dahulu<br>
                                                        2. Klik Menu Jenis Persuratan<br>
                                                        3. Pilih Jenis Surat yang dibutuhkan<br>
                                                        <img src="/assets/img/1.png" width="600px" height="300px"><br>
                                                        4. Isi data sesuai dengan data asli<br>
                                                        5. Upload berkas pendukung yang dibutuhkan<br>
                                                        6. Klik Simpan<br>
                                                        <img src="/assets/img/2.png" width="600px" height="300px"><br>
                                                        7. Untuk melihat riwayat pengajuan klik menu pengajuan surat<br>
                                                        <img src="/assets/img/3.png" width="600px" height="300px">


                                                    </div>
                                                    <div class="modal-footer">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </tr>
                                    <tr>
                                        <th>Persyaratan Berkas yang harus disiapkan :</th>
                                        <td><button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target="#exampleModal">Klik Disini untuk melihat</button></td>
                                    </tr>
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Persyaratan Berkas
                                                        Yang Harus Disiapkan</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <strong>Surat SKTM Sekolah</strong> : <br>
                                                     Foto Pengantar RT/ RW, Foto Kartu Keluarga, dan Foto KTP Orangtua <br>
                                                     <strong>Surat SKTM Rumah Sakit</strong> : <br>
                                                     Foto Pengantar RT/ RW, Foto Kartu Keluarga, dan Foto KTP Yang Bersangkutan <br>
                                                     <strong>Surat Kelahiran</strong> : <br>
                                                     Foto Pengantar RT/ RW, Foto Kartu Keluarga, Foto Surat Nikah, Foto Surat Keterangan dari Bidan/ RS dan Foto KTP Suami Istri <br>
                                                     <strong>Surat Kematian</strong> : <br>
                                                     Foto Pengantar RT/ RW, Foto Kartu Keluarga, dan Foto KTP Yang Bersangkutan (Yang Meninggal), dan Foto Surat Kematian RS bila ada <br>
                                                     <strong>Surat Pengantar Nikah</strong> : <br>
                                                     Foto Pengantar RT/ RW, Foto Kartu Keluarga, dan Foto KTP Ayah Ibu Anak, dan foto Ijazah Terakhir Yang Bersangkutan <br>
                                                     <strong>Surat Pengantar SKCK</strong> : <br>
                                                     Foto Pengantar RT/ RW, Foto Kartu Keluarga, dan Foto Yang Bersangkutan <br>
                                                     <strong>KTP Sementara</strong> : <br>
                                                     Foto Pengantar RT/ RW, Foto Kartu Keluarga<br>
                                                     <strong>Surat Keterangan Usaha</strong> : <br>
                                                     Foto Pengantar RT/ RW, Foto Kartu Keluarga, dan Foto Surat Izin Suami/Istri/Ortu <br>
                                                     <strong>Surat Keterangan Pindah</strong> : <br>
                                                     Foto Pengantar RT/ RW, Foto Kartu Keluarga, dan Foto KTP Kepala Keluarga <br>
                                                     <strong>Surat Domisili</strong> : <br>
                                                     Foto Pengantar RT/ RW, Foto Kartu Keluarga, dan Foto KTP Yang Bersangkutan <br>
                                                     <strong>Surat Pengantar KK</strong> : <br>
                                                     Foto Pengantar RT/ RW, Foto Kartu Keluarga Lama, Foto Akta Nikah, dan Foto KTP Suami Istri <br>

                                                </div>
                                                <div class="modal-footer">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </table>
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>

                </div><!-- /.container-fluid -->

</section>

@endsection
