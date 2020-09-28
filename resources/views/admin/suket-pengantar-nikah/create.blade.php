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

      <div class="card-body">
        <form action="{{ route('pnikah.store')}}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <div class="row">
            <div class="col-md-7">
            <label for="inputName">No Surat</label>
            <input type="text" name="no_surat" class="form-control" value="{{ $surat}}" readonly>
            </div>
            <div class="col-md-6">
              <label for="inputName">NIK Anak</label>
              <input type="text" name="nik_anak" id="nik_anak" class="form-control @error('nik_anak') is-invalid @enderror">
              @error('nik_anak')
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror
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
              <input type="hidden" name="id_warga" id="id_pemohon" class="form-control input-lg" />
           
        <div class="col-md-6">
          <label for="inputName">NIK Ayah</label>
          <input type="text" name="nik_pemohon" id="nik_ayah" class="form-control @error('nik_pemohon') is-invalid @enderror">
          @error('nik_pemohon')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <div class="col-md-6">
          <label for="inputName">Nama Ayah</label>
          <input type="text" name="nama_lengkap" id="nama_ayah" class="form-control input-lg" readonly/>
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
          <label for="inputName">NIK Ibu</label>
          <input type="text" name="nik_ibu" id="nik_ibu"  class="form-control @error('nik_ibu') is-invalid @enderror">
          @error('nik_ibu')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <div class="col-md-6">
          <label for="inputName">Nama Ibu</label>
          <input type="text" name="nama_lengkap" id="nama_ibu" class="form-control input-lg" readonly/>
        </div>
        <div class="col-md-6">
          <label for="inputName">Tempat Lahir</label>
          <input type="text" name="tempat_lahir" id="ttl_ibu1" class="form-control input-lg" readonly/>
        </div>
        <div class="col-md-6">
          <label for="inputName">Tanggal Lahir</label>
          <input type="date" name="tanggal_lahir" id="ttl_ibu2" class="form-control input-lg" readonly/>
        </div>
        {{ csrf_field() }}
        <div class="col-md-8">
          <label for="inputName">Foto Pengantar RT/ RW</label>
          <input type="file"  name="foto_pengantar" class="@error('foto_pengantar') is-invalid @enderror">
          @error('foto_pengantar')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <div class="col-md-8">
          <label for="inputName">Foto Kartu Keluarga</label>
          <input type="file"  name="foto_kk" class="@error('foto_kk') is-invalid @enderror">
          @error('foto_kk')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <div class="col-md-8">
          <label for="inputName">Foto KTP Ayah, Ibu, dan Yang Bersangkutan</label>
          <input type="file"  name="foto_ktp" class="@error('foto_ktp') is-invalid @enderror">
          @error('foto_ktp')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <div class="col-md-8">
          <label for="inputName">Foto Ijazah Terakhir </label>
          <input type="file"  name="foto_ijazah" class="@error('foto_ijazah') is-invalid @enderror">
          @error('foto_ijazah')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
      <div class="col-md-5">
        <input type="hidden" name="status_surat" value="{{ $status_surat }}" class="form-control" readonly>
    </div>
      </div></div>
      <div class="card-footer">
        <button type="submit" class="btn btn-success">Simpan</button>
                  <a class="btn btn-success" href="{{route('pnikah.index')}}">Kembali</a>
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
                 url  : "{{ route('pnikah.ajax_select') }}",
                 dataType : "JSON",
                 data : {no_nik: no_nik},
                 cache:false,
                 success: function(data){
                   console.log(data);
                   var json = data;
                   if (!json) {
                        return alert("NIK yang anda masukkan tidak ada!");
                    }

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
                    $('#alamat').val(alamat);                      
                 }
             });
             return false;
        });
        
        $('#nik_ayah').on('input',function(){
             
             var no_nik=$(this).val();
             $.ajax({
                 type : "GET",
                 url  : "{{ route('pnikah.ajax_select') }}",
                 dataType : "JSON",
                 data : {no_nik: no_nik},
                 cache:false,
                 success: function(data){
                   console.log(data);
                   var json = data;
                   if (!json) {
                        return alert("NIK yang anda masukkan tidak ada!");
                    }

                    var id_pemohon = json.id_warga;
                    var nama_ayah = json.nama_lengkap;
                    var ttl_ayah1 = json.tempat_lahir;
                    var ttl_ayah2 = json.tanggal_lahir;
                    
                    console.log(id_pemohon);
                    console.log(nama_ayah);
                    console.log(ttl_ayah1);
                    console.log(ttl_ayah2);


                    $('#id_pemohon').val(id_pemohon);
                    $('#nama_ayah').val(nama_ayah);
                    $('#ttl_ayah1').val(ttl_ayah1);
                    $('#ttl_ayah2').val(ttl_ayah2);
                      
                 }
             });
             return false;
        });

        $('#nik_ibu').on('input',function(){
             
             var no_nik=$(this).val();
             $.ajax({
                 type : "GET",
                 url  : "{{ route('pnikah.ajax_select') }}",
                 dataType : "JSON",
                 data : {no_nik: no_nik},
                 cache:false,
                 success: function(data){
                   console.log(data);
                   var json = data;
                   if (!json) {
                        return alert("NIK yang anda masukkan tidak ada!");
                    }

                   
                    var nama_ibu = json.nama_lengkap;
                    var ttl_ibu1 = json.tempat_lahir;
                    var ttl_ibu2 = json.tanggal_lahir;
                    
                    console.log(nama_ibu);
                    console.log(ttl_ibu1);
                    console.log(ttl_ibu2);


                    $('#nama_ibu').val(nama_ibu);
                    $('#ttl_ibu1').val(ttl_ibu1);
                    $('#ttl_ibu2').val(ttl_ibu2);
                      
                 }
             });
             return false;
        });

      });
</script>
@endsection


