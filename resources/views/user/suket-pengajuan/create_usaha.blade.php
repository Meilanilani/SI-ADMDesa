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
        <form action="{{ route('pengajuan.store_usaha')}}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <div class="row">
                <input type="hidden" name="no_surat" class="form-control" value="{{ $surat}}" readonly>
              
              
        <div class="col-md-6">
          <label for="inputName">NIK Pemilik Usaha</label>
          <input type="text" name="nik_pemilik_usaha" id="no_nik" class="form-control @error('nik_pemilik_usaha') is-invalid @enderror">
          @error('nik_pemilik_usaha')
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
            <input type="hidden" name="id_warga" id="id_pemohon" class="form-control input-lg" value="{{Auth::user()->id}}"/>
            <input type="hidden" name="nik_pemohon" id="nik_pemohon" class="form-control input-lg" value="{{Auth::user()->name}}"/>
            </div></div>
      </div> 
    </div>
    <div class="card">
      <div class="card-body">
          <div class="row">
        {{ csrf_field() }}
        
        <div class="col-md-6">
          <label for="inputName">Nama Usaha</label>
          <input type="text" name="nama_usaha"  class="form-control @error('nama_usaha') is-invalid @enderror">
          @error('nama_usaha')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <div class="col-md-6">
          <label for="inputName">Jenis Usaha</label>
          <input type="text" name="jenis_usaha"  class="form-control @error('jenis_usaha') is-invalid @enderror">
          @error('jenis_usaha')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <div class="col-md-6">
          <label for="inputName">Penghasilan Bulanan</label>
          <input type="text" name="penghasilan_bulanan" class="form-control @error('penghasilan_bulanan') is-invalid @enderror">
          @error('penghasilan_bulanan')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <div class="col-md-6">
          <label for="inputName">Alamat Usaha</label>
          <textarea name="alamat_usaha"  rows="4" class="form-control @error('alamat_usaha') is-invalid @enderror"></textarea>
            @error('alamat_usaha')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </span></div>
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
          <label for="inputName">Foto Surat Izin Suami/ Istri/ Ortu</label>
          <input type="file"  name="foto_suratizin" class="@error('foto_suratizin') is-invalid @enderror">
          @error('foto_suratizin')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
      <input type="hidden" name="status_surat"  class="form-control input-lg" value="{{$status_surat}}">
    
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
         $('#no_nik').on('input',function(){
             
             var no_nik=$(this).val();
             $.ajax({
                 type : "GET",
                 url  : "{{ route('pengajuan.ajax_select_usaha') }}",
                 dataType : "JSON",
                 data : {no_nik: no_nik},
                 cache:false,
                 success: function(data){
                   console.log(data);
                   var json = data;
                   if (!json) {
                      return alert("NIK yang anda masukkan tidak ada!");
                  }

                    var nama_lengkap = json.nama_lengkap;
                    var tempat_lahir = json.tempat_lahir;
                    var tanggal_lahir = json.tanggal_lahir;
                    var pekerjaan = json.pekerjaan;
                    var agama = json.agama;
                    var status_perkawinan = json.status_perkawinan;
                    var alamat = json.alamat;
                    

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
        $('#nik_pemohon').on('input',function(){
             
             var no_nik=$(this).val();
             $.ajax({
                 type : "GET",
                 url  : "{{ route('pengajuan.ajax_select_usaha') }}",
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
                    var nama_pemohon = json.nama_lengkap;
                   
                    $('#id_pemohon').val(id_pemohon);
                    $('#nama_pemohon').val(nama_pemohon);
                                         
                 }
             });
             return false;
        });

      });
</script>
@endsection


