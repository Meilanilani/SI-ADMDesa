@extends('user.layouts.master')
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
            <div class="card-body">
              <form action="{{ route('pengajuan.store_kelahiran')}}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="row">
                        
                            <input type="hidden" name="no_surat" class="form-control" value="{{$surat}}" readonly>
                            <input type="hidden" name="id_warga" id="id_pemohon" class="form-control input-lg" value="{{$join->id_warga}}"/>
                            <input type="hidden" name="nik_pemohon" id="nik_pemohon" class="form-control input-lg" value="{{Auth::user()->name}}"/>
                        
                        <div class="col-md-6">
                            <label for="inputName">Nama Lengkap Anak</label>
                            <input type="text" name="nama_anak"
                                class="form-control @error('nama_anak') is-invalid @enderror">
                            @error('nama_anak')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="inputName">Tempat Lahir</label>
                            <input type="text" name="tempat_lahir_anak"
                                class="form-control @error('tempat_lahir_anak') is-invalid @enderror">
                            @error('tempat_lahir_anak')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="inputName">Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir_anak"
                                class="form-control @error('tanggal_lahir_anak') is-invalid @enderror">
                            @error('tanggal_lahir_anak')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="inputName">Jenis Kelamin</label>
                            <select name="jenis_kelamin"
                                class="form-control @error('jenis_kelamin') is-invalid @enderror">
                                @error('jenis_kelamin')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <option selected disabled>Pilih Jenis Kelamin</option>
                                <option>Laki-Laki</option>
                                <option>Perempuan</option>
                            </select>

                        </div>
                        <div class="col-md-6">
                            <label for="inputName">Jam Lahir</label>
                            <input type="time" name="jam_lahir"
                                class="form-control @error('jam_lahir') is-invalid @enderror">
                            @error('jam_lahir')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="inputName">Anak ke</label>
                            <input type="text" name="anak_ke"
                                class="form-control @error('anak_ke') is-invalid @enderror">
                            @error('anak_ke')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                       
                    <div class="col-md-6">
                        <label for="inputName">NIK Ibu</label>
                        <input type="text" name="nik_ibu" id="nik_ibu"
                            class="form-control @error('nik_ibu') is-invalid @enderror">
                        @error('nik_ibu')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="inputName">Nama Ibu</label>
                        <input type="text" name="nama_lengkap" id="nama_ibu" class="form-control input-lg" readonly />
                    </div>
                    <div class="col-md-7">
                        <label for="inputName">Alamat</label>
                        <textarea name="alamat" id="alamat" class="form-control" rows="4" readonly></textarea>
                        </span>
                    </div>
                        
                        <input type="hidden" name="status_surat" value="{{$status_surat}}" class="form-control"
                            readonly>
                    </div>
                </div></div>

          <div class="card">
              <div class="card-body">
                  <div class="row">
                    {{ csrf_field() }}
                    <div class="col-md-6">
                        <label for="inputName">Foto Pengantar RT/ RW</label>
                        <input type="file" name="foto_pengantar"
                            class="@error('foto_pengantar') is-invalid @enderror">
                        @error('foto_pengantar')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="inputName">Foto Kartu Keluarga</label>
                        <input type="file" name="foto_kk" class="@error('foto_kk') is-invalid @enderror">
                        @error('foto_kk')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="inputName">Foto Surat Nikah</label>
                        <input type="file" name="foto_suratnikah"
                            class="@error('foto_suratnikah') is-invalid @enderror">
                        @error('foto_suratnikah')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="inputName">Foto KTP Suami Istri</label>
                        <input type="file" name="foto_ktp" class="@error('foto_ktp') is-invalid @enderror">
                        @error('foto_ktp')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="inputName">Foto Surat Keterangan dari Bidan/ Rumah Sakit</label>
                        <input type="file" name="foto_suratkelahiran"
                            class="@error('foto_suratkelahiran') is-invalid @enderror">
                        @error('foto_suratkelahiran')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                </div>
              </div>
              <div class="card-footer">
                  <button type="submit" class="btn btn-success">Simpan</button>
              </div>
          </div>
      </div>
    </div>
  </section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        

        $('#nik_ibu').on('input', function () {

            var no_nik = $(this).val();
            $.ajax({
                type: "GET",
                url: "{{ route('kelahiran.ajax_select') }}",
                dataType: "JSON",
                data: {
                    no_nik: no_nik
                },
                cache: false,
                success: function (data) {
                    console.log(data);

                    var json = data;
                    if (!json) {
                        return alert("NIK yang anda masukkan tidak ada!");
                    }

                    var nama_ibu = json.nama_lengkap;
                    var alamat = json.alamat;

                   

                    $('#nama_ibu').val(nama_ibu);
                    $('#alamat').val(alamat);
                   

                }
            });
            return false;
        });

    });

</script>
@endsection



