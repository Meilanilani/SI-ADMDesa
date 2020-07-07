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

      <div class="card card-info">
        <div class="card-header">
          <h3 class="card-title">Data Warga</h3>
          <div class="card-tools">
            <a href="{{route('datawarga.create')}}" class="btn btn-block btn-secondary btn-sm">Tambah Data</a>
         
          </div>
        </div>
        <h3 class="card-title"></h3>
        <div class="card-tools">
          

        </div>
      </div>
      @if(session()->get('success'))
    <div class="alert alert-secondary mt-3"> <button type="button" class="close" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
        {{ session()->get('success')}}
    </div>
@endif
      <div class="card-body">
        <div class="table-responsive">
        <table class="table table-bordered table-hovervvctvkfadilypn">
            <thead>
                <tr>
                    <th> No </th>
                    <th> No KK </th>
                    <th> NIK </th>
                    <th> Nama Lengkap </th>
                    <th> Jenis Kelamin </th>
                    <th> Alamat </th>
                    <th> Pilihan </th>
                </tr>
            </thead>
            <tbody> 
              @php
              $no=1  
              @endphp
              @foreach($warga as $post)
              <tr>
                <th scope="row">{{$no}}
                  </th>
                  @php $no++ @endphp
                <td>{{ $post->no_kk }}</td>
                <td>{{ $post->no_nik }}</td>
                <td>{{ $post->nama_lengkap }}</td>
                <td>{{ $post->jenis_kelamin }}</td>
                <td>{{ $post->alamat }}</td>
                <td>
                  <ul class="list-inline m-0">
                    <li class="list-inline-item">
                      <a href="{{ route('datawarga.edit', $post) }}" class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i>
                      </a>
                    </li>
                    <li class="list-inline-item">
                      <form action="{{ route('datawarga.destroy', $post->id_warga)}}" method="POST" >
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
                      </form>
                </li>
            </ul>
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