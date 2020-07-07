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

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Data Pengguna</h3>
        <div class="card-tools">
        </div>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-12">
          <a href="{{route('pengguna.create')}}" class="btn btn-success float-right">Tambah Data</a>
          </div>
        </div>
        @if($message = Session::get('success'))
      <div class="alert alert-success">
      <p>{{$message}}</p>
      </div>
      @endif
        <br>
        <div class="table-responsive">
        <table class="table table-bordered table-hovervvctvkfadilypn">
            <thead>
                <tr>
                    <th> No </th>
                    <th> Nama Pengguna</th>
                    <th> Email </th>
                    <th> Opsi </th>
                  </tr>
                </thead>
                <tbody> 
                  @php
                $no=1  
                @endphp
                @foreach($pengguna as $post)
                <tr>
                  <th scope="row">{{$no}}
                    </th>
                    @php $no++ @endphp
                    <td>{{ $post->name }}</td>
                    <td>{{ $post->email }}</td>
                    <td>
                      <a class="btn btn-danger btn-sm" href="{{URL::to('data-pengguna/edit/'.$post->id)}}"><i class="nav-icon fas fa-edit"></i> Edit</a>
                      <a class="btn btn-primary btn-sm" href="{{URL::to('data-pengguna/delete/'.$post->id)}}"><i class="nav-icon fas fa-trash"></i> Hapus</a>
                    </td>
                  </tr>
                </form>
                  @endforeach
                        </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </section>
            <!-- /.content -->
          @endsection