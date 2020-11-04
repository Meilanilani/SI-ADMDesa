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
        <form action="{{ route('pengajuan.store_kematian')}}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <div class="row">
                <input type="hidden" name="no_surat" class="form-control" value="{{ $surat}}" readonly>
               
          <div class="col-md-6">
          <label for="inputName">NIK Yang Bersangkutan</label>
          <input type="text" name="nik_yg_bersangkutan" id="nik_yg_bersangkutan"  class="form-control @error('nik_yg_bersangkutan') is-invalid @enderror">
          @error('nik_yg_bersangkutan')
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
          <label for="inputName">Pekerjaan</label>
          <input type="text" name="pekerjaan" id="pekerjaan" class="form-control input-lg" readonly/>
        </div>
            <div class="col-md-7">
              <label for="inputName">Alamat</label>
              <textarea name="alamat" id="alamat" class="form-control" rows="4" readonly></textarea>
            </span></div>
            <input type="hidden" name="id_warga" id="id_pemohon" class="form-control input-lg" value="{{$join->id_warga}}"/>
       <input type="hidden" name="nik_pemohon" id="nik_pemohon" class="form-control input-lg" value="{{Auth::user()->name}}"/>
            </div></div>
      </div> 
    </div>
    <div class="card">
      <div class="card-body">
          <div class="row">
        {{ csrf_field() }}
        
        <div class="col-md-6">
          <label for="inputName">Tanggal Kematian</label>
          <input type="date" name="tgl_kematian"  class="form-control @error('tgl_kematian') is-invalid @enderror">
          @error('tgl_kematian')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <div class="col-md-6">
          <label for="inputName">Tempat Kematian</label>
          <input type="text" name="tempat_kematian" class="form-control @error('tempat_kematian') is-invalid @enderror">
          @error('tempat_kematian')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <div class="col-md-6">
          <label for="inputName">Penyebab Kematian</label>
          <input type="text" name="penyebab_kematian" class="form-control @error('penyebab_kematian') is-invalid @enderror">
          @error('penyebab_kematian')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
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
          <label for="inputName">Foto KTP yang bersangkutan</label>
          <input type="file"  name="foto_ktp" class="@error('foto_ktp') is-invalid @enderror">
          @error('foto_ktp')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <div class="col-md-9">
          <label for="inputName">Foto Surat Kematian RS *kosongkan jika tidak ada</label>
          <input type="file"  name="foto_suratkematianrs">
        </div>
        <input type="hidden" name="status_surat" value="{{ $status_surat }}" class="form-control" readonly>
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
      $(document).ready(function(){
         $('#nik_yg_bersangkutan').on('input',function(){
             
             var no_nik=$(this).val();
             $.ajax({
                 type : "GET",
                 url  : "{{ route('pengajuan.ajax_select_kematian') }}",
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
                    var status_perkawinan = json.status_perkawinan;
                    var agama = json.agama;
                    var pekerjaan = json.pekerjaan;
                    var alamat = json.alamat;

                    $('#nama_lengkap').val(nama_lengkap);
                    $('#tempat_lahir').val(tempat_lahir);
                    $('#tanggal_lahir').val(tanggal_lahir);
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
                 url  : "{{ route('pengajuan.ajax_select_kematian') }}",
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


