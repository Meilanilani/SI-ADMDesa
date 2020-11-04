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
        <form action="{{ route('pengajuan.store_kk')}}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <div class="row">
                <input type="hidden" name="no_surat" class="form-control" value="{{ $surat}}" readonly>
                
        <div class="col-md-6">
          <input type="hidden" name="id_warga" id="id_pemohon" class="form-control input-lg" value="{{$join->id_warga}}"/>
          <label for="inputName">NIK Kepala Keluarga</label>
          <input type="text" name="nik_pemohon" id="nik_pemohon" class="form-control @error('nik_pemohon') is-invalid @enderror">
          @error('nik_pemohon')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
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
          <label for="inputName">Status</label>
          <input type="text" name="status_perkawinan" id="status_perkawinan" class="form-control input-lg" readonly/>
        </div>
        <div class="col-md-6">
          <label for="inputName">Pekerjaan</label>
          <input type="text" name="pekerjaan" id="pekerjaan" class="form-control input-lg" readonly/>
        </div>
            <div class="col-md-6">
              <label for="inputName">Alamat</label>
              <textarea name="alamat" id="alamat" class="form-control" rows="4" readonly></textarea>
            </span></div>
            </div></div>
      </div> 
    </div>
    <div class="card">
      <div class="card-body">
          <div class="row">
        {{ csrf_field() }}
       
        
        <div class="col-md-8">
          <label for="inputName">Foto Pengantar RT/ RW</label>
          <input type="file"  name="foto_pengantar">
        </div>
        <div class="col-md-8">
          <label for="inputName">Foto Kartu Keluarga Lama</label>
          <input type="file"  name="foto_kk">
        </div>
        <div class="col-md-8">
          <label for="inputName">Foto Akta Nikah</label>
          <input type="file"  name="foto_suratnikah">
        </div>
        <div class="col-md-8">
          <label for="inputName">Foto KTP Suami Istri</label>
          <input type="file"  name="foto_ktp">
        </div>
       
    <input type="hidden"  name="status_surat" class="form-control" value="{{$status_surat}}">
      </div></div>
      <div class="card-footer">
        <button type="submit" class="btn btn-success">Simpan</button>
      </div>
    </div>
  </div>
</section>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script type="text/javascript">
      $(document).ready(function(){
         $('#nik_pemohon').on('input',function(){
             
             var no_nik=$(this).val();
             $.ajax({
                 type : "GET",
                 url  : "{{ route('kk.ajax_select') }}",
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
                    var nama_lengkap = json.nama_lengkap;
                    var tempat_lahir = json.tempat_lahir;
                    var tanggal_lahir = json.tanggal_lahir;
                    var status_perkawinan = json.status_perkawinan;
                    var agama = json.agama;
                    var pekerjaan = json.pekerjaan;
                    var alamat = json.alamat;

                    $('#id_pemohon').val(id_pemohon);
                    $('#nama_lengkap').val(nama_lengkap);
                    $('#tempat_lahir').val(tempat_lahir);
                    $('#tanggal_lahir').val(tanggal_lahir);
                    $('#status_perkawinan').val(status_perkawinan);
                    $('#agama').val(agama);
                    $('#pekerjaan').val(pekerjaan);
                    $('#alamat').val(alamat);                      
                 }
             });
             return false;
        });
                  

      });
</script>
@endsection


