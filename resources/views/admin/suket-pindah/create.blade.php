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
        <form action="{{ route('pindah.store')}}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <div class="row">
              <div class="col-md-7">
                <label for="inputName">No Surat</label>
                <input type="text" name="no_surat" class="form-control" value="{{ $surat}}" readonly>
                </div>
              <input type="hidden" name="id_warga" id="id_pemohon" class="form-control input-lg" />
              <div class="col-md-6">
                <label for="inputName">No KK</label>  
                <input type="text" name="no_kk" id="no_kk" class="form-control @error('no_kk') is-invalid @enderror">
                @error('no_kk')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="col-md-6">
                <label for="inputName">No NIK Kepala Keluarga</label>  
                <input type="text" name="nik_pemohon" id="nik_pemohon" class="form-control input-lg" readonly/>
              </div>
        <div class="col-md-8">
          <label for="inputName">Alamat Tujuan</label>
          <textarea name="alamat_tujuan" id="alamat_tujuan"  rows="4"  class="form-control @error('alamat_tujuan') is-invalid @enderror"></textarea>
            @error('alamat_tujuan')
            @enderror 
        </div>
        <div class="col-md-8">
          <label for="inputName">Alasan Pindah</label>
          <textarea name="alasan_pindah" id="alasan_pindah" rows="4"  class="form-control @error('alasan_pindah') is-invalid @enderror"></textarea>
            @error('alasan_pindah')
            @enderror
        </div></div></div>
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
          <label for="inputName">Foto Kartu Keluarga</label>
          <input type="file"  name="foto_kk">
        </div>
        <div class="col-md-8">
          <label for="inputName">Foto KTP yang bersangkutan</label>
          <input type="file"  name="foto_ktp">
        </div>
      <input type="hidden" name="status_surat" class="form-control input-lg" value="{{$status_surat}}" />
      </div></div>
      <div class="card-footer">
        <button type="submit" class="btn btn-success">Simpan</button>
                  <a class="btn btn-success" href="{{route('pindah.index')}}">Kembali</a>
      </div>
    </div>
  </div>
</section>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script type="text/javascript">
      $(document).ready(function(){
         $('#no_kk').on('input',function(){
             
             var no_kk=$(this).val();
             $.ajax({
                 type : "GET",
                 url  : "{{ route('pindah.ajax_select') }}",
                 dataType : "JSON",
                 data : {no_kk: no_kk},
                 cache:false,
                 success: function(data){
                   console.log(data);
                   var json = data;

                    var id_pemohon = json.id_warga;
                    var nik_pemohon = json.no_nik;


                    $('#id_pemohon').val(id_pemohon);     
                    $('#nik_pemohon').val(nik_pemohon);                   
                 }
             });
             return false;
        });
        
      
            

      });
</script>
@endsection


