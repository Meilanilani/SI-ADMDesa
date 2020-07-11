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
        <form action="{{ route('sktmsekolah.store')}}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <div class="row">
            <div class="col-md-7">
            <label for="inputName">No Surat</label>
            <input type="text" name="no_surat" class="form-control" value="{{ $surat}}" readonly>
            </div>
            <div class="col-md-6">
              <label for="inputName">NIK Anak</label>
              <input type="text" name="no_nik" id="nik_anak" class="form-control input-lg" />
            </div>
            <div class="col-md-6">
              <label for="inputName">Nama Anak</label>
              <input type="text" name="nama_lengkap" id="nama_anak" class="form-control input-lg" readonly/>
            </div>
            <div class="col-md-6">
              <label for="inputName">Tempat Lahir</label>
              <input type="text" name="tempat_lahir" id="ttl_anak1" class="form-control input-lg" readonly/>
            </div>
            <div class="col-md-6">
              <label for="inputName">Tanggal Lahir</label>
              <input type="date" name="tempat_lahir" id="ttl_anak2" class="form-control input-lg" readonly/>
            </div>
            <div class="col-md-6">
              <label for="inputName">Agama</label>
              <input type="text" name="tempat_lahir" id="agama_anak" class="form-control input-lg" readonly/>
            </div>
            <div class="col-md-6">
              <label for="inputName">Pekerjaan</label>
              <input type="text" name="tempat_lahir" id="pekerjaan_anak" class="form-control input-lg" readonly/>
            </div>
            <div class="col-md-7">
              <label for="inputName">Alamat</label>
              <textarea name="alamat" id="alamat" class="form-control" rows="4" readonly></textarea>
            </span></div>
            </div></div>
      </div> 
    </div>
    <div class="card">
      <div class="card-body">
          <div class="row">
        <div class="col-md-6">
          <label for="inputName">NIK Ayah</label>
          <input type="text" name="no_nik" id="nik_ayah" class="form-control input-lg" />
        </div>
        <div class="col-md-6">
          <label for="inputName">Nama Ayah</label>
          <input type="text" name="nama_lengkap" id="nama_ayah" class="form-control input-lg" />
        </div>
        <div class="col-md-6">
          <label for="inputName">Tempat Lahir</label>
          <input type="text" name="tempat_lahir" id="ttl_ayah1" class="form-control input-lg" readonly/>
        </div>
        <div class="col-md-6">
          <label for="inputName">Tanggal Lahir</label>
          <input type="date" name="tanggal_lahir" id="ttl_ayah2" class="form-control input-lg" readonly/>
        </div>
        <div class="col-md-6">
          <label for="inputName">Agama</label>
          <input type="text" name="agama" id="agama_ayah" class="form-control input-lg" readonly/>
        </div>
        <div class="col-md-6">
          <label for="inputName">Pekerjaan</label>
          <input type="text" name="pekerjaan" id="pekerjaan_ayah" class="form-control input-lg" readonly/>
        </div>
        {{ csrf_field() }}
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
      </div></div>
      <div class="card-footer">
        <button type="submit" class="btn btn-success">Simpan</button>
                  <a class="btn btn-success" href="{{route('sktmsekolah.index')}}">Kembali</a>
      </div>
    </div>
  </div>
</section>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script type="text/javascript">
      $(document).ready(function(){
         $('#nik_anak').on('input',function(){
             
             var no_nik=$(this).val();
             $.ajax({
                 type : "GET",
                 url  : "{{ route('sktmsekolah.ajax_select') }}",
                 dataType : "JSON",
                 data : {no_nik: no_nik},
                 cache:false,
                 success: function(data){
                   console.log(data);
                   var json = data;

                    var nama_anak = json.nama_lengkap;
                    var ttl_anak1 = json.tempat_lahir;
                    var ttl_anak2 = json.tanggal_lahir;
                    var agama_anak = json.agama;
                    var pekerjaan_anak = json.pekerjaan;
                    var alamat = json.alamat;
                    
                    console.log(nama_anak);
                    console.log(ttl_anak1);
                    console.log(ttl_anak2);
                    console.log(agama_anak);
                    console.log(pekerjaan_anak);
                    console.log(alamat);


                    $('#nama_anak').val(nama_anak);
                    $('#ttl_anak1').val(ttl_anak1);
                    $('#ttl_anak2').val(ttl_anak2);
                    $('#agama_anak').val(agama_anak);
                    $('#pekerjaan_anak').val(pekerjaan_anak);
                    $('#alamat').val(alamat);                      
                 }
             });
             return false;
        });
        $('#nik_ayah').on('input',function(){
             
             var no_nik=$(this).val();
             $.ajax({
                 type : "GET",
                 url  : "{{ route('sktmsekolah.ajax_select') }}",
                 dataType : "JSON",
                 data : {no_nik: no_nik},
                 cache:false,
                 success: function(data){
                   console.log(data);
                   var json = data;

                   var nama_ayah = json.nama_lengkap;
                    var ttl_ayah1 = json.tempat_lahir;
                    var ttl_ayah2 = json.tanggal_lahir;
                    var agama_ayah = json.agama;
                    var pekerjaan_ayah = json.pekerjaan;
                    
                    console.log(nama_ayah);
                    console.log(ttl_ayah1);
                    console.log(ttl_ayah2);
                    console.log(agama_ayah);
                    console.log(pekerjaan_ayah);


                    $('#nama_ayah').val(nama_ayah);
                    $('#ttl_ayah1').val(ttl_ayah1);
                    $('#ttl_ayah2').val(ttl_ayah2);
                    $('#agama_ayah').val(agama_ayah);
                    $('#pekerjaan_ayah').val(pekerjaan_ayah);
                      
                 }
             });
             return false;
        });

      });
</script>
@endsection


