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
    <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Tambah Data Jenis Surat</h3>
          <div class="card-tools">
                </div>
              </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                      @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li> {{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
                      <form method="POST" action="{{ route('jenissurat.store') }}">
                        @csrf
                <div class="form-group">
                    <div class="row">
                    <div class="col-md-6">
                  <label for="inputName">Nama Surat</label>
                  <input type="text" name="nama_surat" value="{{ old('nama_surat') }}" id="jenissurat-nama_surat" class="form-control">
                </div>
                    </div>
                    </div>
                <button type="submit" class="btn btn-success">Save</button>
                </form>
            </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
</section>
<!-- /.content -->
@endsection