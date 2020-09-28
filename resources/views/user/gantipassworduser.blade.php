

            @extends('user.layouts.master')
            @section('content')
                      
             <div class="content-header">
              <div class="container-fluid">
                <div class="row mb-2">
                </div><!-- /.row -->
              </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            <!-- Main content -->
            <section class="content">
              <!-- Default box -->
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">
                    <h3 class="card-title">Ubah Password</h3>
                    <div class="card-tools">
                  </div>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-12">
                      
                    </div>
                  </div>
                  @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li> {{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
                @if($message = Session::get('success'))
                  <div class="card bg-gradient-success">
                    <div class="card-header border-0">
                      
                      <h3 class="card-title">{{$message}}</h3>
                      
                        <!-- tools card -->
                    <div class="card-tools">
                      <!-- button with a dropdown -->
                      <div class="btn-group">
                      <button type="button" class="btn btn-success btn-sm" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                      </button>
                      </div>
                    </div>
                    <!-- /. tools -->
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body pt-0">
                    <!--The calendar -->
                    <div id="calendar" style="width: 100%"></div>
                  </div>
                  </div>
                  <!-- /.card-body -->
                @endif
                <div class="card-body">
        <form action="{{ route('update_password')}}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <div class="row">
              
              
        <div class="col-md-6">
          <label for="inputName">Password Baru</label>
          <input type="password" name="password" id="no_nik" class="form-control input-lg" />
        </div>
        <div class="col-md-6">
            <label for="inputName">Ketik Ulang Password Baru</label>
            <input type="password" name="konfirmasi" class="form-control @error('konfirmasi') is-invalid @enderror">
            @error('konfirmasi')
            <div class="invalid-feedback">{{ $error }}</div>
            @enderror
          </div>
        
      </div></div>
      <div class="card-footer">
        <button type="submit" class="btn btn-success">Simpan</button>
      </div>
    </div>
  </div>
</section>
@endsection


