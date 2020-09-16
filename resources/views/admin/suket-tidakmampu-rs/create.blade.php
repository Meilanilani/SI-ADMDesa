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
        <form action="{{ route('sktmrs.store')}}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <div class="row">
              <div class="col-md-7">
                <label for="inputName">No Surat</label>
                <input type="text" name="no_surat" class="form-control" value="{{ $surat}}" readonly>
                </div>
              <input type="hidden" name="id_warga" id="id_pemohon" class="form-control input-lg" />
        <div class="col-md-6">
          <label for="inputName">NIK Kepala Keluarga</label>
          <input type="text" name="nik_pemohon" id="no_nik" class="form-control input-lg" />
        </div>
        <div class="col-md-6">
          <label for="inputName">Nama Lengkap</label>
          <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control input-lg" readonly/>
        </div>
        <div class="col-md-6">
          <label for="inputName">Tempat Lahir</label>
          <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control input-lg" readonly/>
        </div>
        <div class="col-md-6">
          <label for="inputName">Tanggal Lahir</label>
          <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control input-lg" readonly/>
        </div>
        <div class="col-md-6">
          <label for="inputName">Agama</label>
          <input type="text" name="agama" id="agama" class="form-control input-lg" readonly/>
        </div>
        <div class="col-md-6">
          <label for="inputName">Pekerjaan</label>
          <input type="text" name="pekerjaan" id="pekerjaan" class="form-control input-lg" readonly/>
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
              <label for="inputName">NIK Anggota yang diajukan</label>
              <input type="text" name="nik_yg_bersangkutan" id="nik_yg_bersangkutan" class="form-control input-lg" />
            </div>
            <div class="col-md-6">
              <label for="inputName">Nama Lengkap</label>
              <input type="text" name="nama_lengkap" id="nama_yg_bersangkutan" class="form-control input-lg" readonly/>
            </div>
            <div class="col-md-6">
              <label for="inputName">Tempat Lahir</label>
              <input type="text" name="tempat_lahir" id="tempat_lahir_yg_bersangkutan" class="form-control input-lg" readonly/>
            </div>
            <div class="col-md-6">
              <label for="inputName">Tanggal Lahir</label>
              <input type="date" name="tanggal_lahir" id="tgl_lahir_yg_bersangkutan" class="form-control input-lg" readonly/>
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
      <input type="hidden"  name="status_surat" value="{{$status_surat}}" class="form-control" readonly>
      </div></div>
      <div class="card-footer">
        <button type="submit" class="btn btn-success">Simpan</button>
                  <a class="btn btn-success" href="{{route('sktmrs.index')}}">Kembali</a>
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
                 url  : "{{ route('sktmrs.ajax_select') }}",
                 dataType : "JSON",
                 data : {no_nik: no_nik},
                 cache:false,
                 success: function(data){
                   console.log(data);
                   var json = data;

                    var id_pemohon = json.id_warga;
                    var nama_lengkap = json.nama_lengkap;
                    var tempat_lahir = json.tempat_lahir;
                    var tanggal_lahir = json.tanggal_lahir;
                    var agama = json.agama;
                    var pekerjaan = json.pekerjaan;
                    var alamat = json.alamat;

                    console.log(id_pemohon);
                    console.log(tempat_lahir);
                    console.log(tanggal_lahir);
                    console.log(agama);
                    console.log(pekerjaan);
                    console.log(alamat);

                    $('#id_pemohon').val(id_pemohon);
                    $('#nama_lengkap').val(nama_lengkap);
                    $('#tempat_lahir').val(tempat_lahir);
                    $('#tanggal_lahir').val(tanggal_lahir);
                    $('#agama').val(agama);
                    $('#pekerjaan').val(pekerjaan);
                    $('#alamat').val(alamat);                      
                 }
             });
             return false;
        });
        
        $('#nik_yg_bersangkutan').on('input',function(){
             
             var no_nik=$(this).val();
             $.ajax({
                 type : "GET",
                 url  : "{{ route('sktmrs.ajax_select') }}",
                 dataType : "JSON",
                 data : {no_nik: no_nik},
                 cache:false,
                 success: function(data){
                   console.log(data);
                   var json = data;

                    
                    var nama_yg_bersangkutan = json.nama_lengkap;
                    var tempat_lahir_yg_bersangkutan = json.tempat_lahir;
                    var tgl_lahir_yg_bersangkutan = json.tanggal_lahir;
                    
                    
                    console.log(nama_yg_bersangkutan);
                    console.log(tempat_lahir_yg_bersangkutan);
                    console.log(tgl_lahir_yg_bersangkutan);
                  
                   
                    $('#nama_yg_bersangkutan').val(nama_yg_bersangkutan);
                    $('#tempat_lahir_yg_bersangkutan').val(tempat_lahir_yg_bersangkutan);
                    $('#tgl_lahir_yg_bersangkutan').val(tgl_lahir_yg_bersangkutan);
                   
                 }
             });
             return false;
        });

      });
</script>
@endsection


