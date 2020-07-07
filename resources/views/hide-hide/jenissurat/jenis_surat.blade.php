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
        
        <h3 class="card-title">Data Jenis Surat</h3>
        <div class="card-tools">
          <a href="{{route('jenissurat.create')}}" class="btn btn-success">Tambah Data</a>

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
                    <th> Nama Surat </th>
                    <th> Pilihan </th>
                </tr>
            </thead>
            <tbody> 
              @foreach($jsurat as $post)
              <tr>
                <th scope="row">
                  </th>
                <td>{{ $post->nama_surat }}</td>
                <td>
                <a href="" class="btn btn-success btn-sm">
                  <i class="fa fa-eye"></i>
              </a>
              <a href="{{ route('jenissurat.edit', $post) }}" class="btn btn-primary btn-sm mt-2">
                  <i class="fa fa-pencil"></i>
              </a>
              <form action="{{ route('jenissurat.destroy', $post->id_surat)}}" method="POST" >
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit">Delete<i class="fa fa-trash"></i></button>
              </form>
              </form>
          </td>
        </tr>
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