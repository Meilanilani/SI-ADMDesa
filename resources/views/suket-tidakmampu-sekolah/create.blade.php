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
              <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control input-lg" readonly/>
            </div>
            <div class="col-md-6">
              <label for="inputName">Tempat Lahir</label>
              <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control input-lg" readonly/>
            </div>
            <div class="col-md-6">
              <label for="inputName">Tanggal Lahir</label>
              <input type="date" name="tempat_lahir" id="tanggal_lahir" class="form-control input-lg" readonly/>
            </div>
            <div class="col-md-6">
              <label for="inputName">Agama</label>
              <input type="text" name="tempat_lahir" id="agama" class="form-control input-lg" readonly/>
            </div>
            <div class="col-md-6">
              <label for="inputName">Pekerjaan</label>
              <input type="text" name="tempat_lahir" id="pekerjaan" class="form-control input-lg" readonly/>
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
          <input type="text" name="nama_lengkap" id="nama_lengkap_ayah" class="form-control input-lg" />
        </div>
        <div class="col-md-6">
          <label for="inputName">Tempat Lahir</label>
          <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control input-lg" readonly/>
        </div>
        <div class="col-md-6">
          <label for="inputName">Tanggal Lahir</label>
          <input type="date" name="tempat_lahir" id="tempat_lahir" class="form-control input-lg" readonly/>
        </div>
        <div class="col-md-6">
          <label for="inputName">Agama</label>
          <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control input-lg" readonly/>
        </div>
        <div class="col-md-6">
          <label for="inputName">Pekerjaan</label>
          <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control input-lg" readonly/>
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
             $('#no_nik').on('input',function(){
             
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

                    var obj = json.nama_lengkap;
                    var obj2 = json.tempat_lahir;
                    var obj3 = json.tangal_lahir;
                    var obj4 = json.agama;
                    var obj5 = json.pekerjaan;
                    
                    console.log(obj);
                    console.log(obj2);
                    console.log(obj3);
                    console.log(obj4);
                    console.log(obj5);

                    $('#nama_lengkap').val(obj);
                    $('#tempat_lahir').val(obj2);
                    $('#tangal_lahir').val(obj3);
                    $('#agama').val(obj4);
                    $('#pekerjaan').val(obj5);
                       
                  }
              });
              return false;
         });
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

                   var obj = json.nama_lengkap;
                   
                   console.log(obj);

                   $('#nama_lengkap').val(obj);
                      
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
                   
                   console.log(nama_ayah);

                   $('#nama_lengkap_ayah').val(nama_ayah);
                      
                 }
             });
             return false;
        });

      });
</script>
@endsection


