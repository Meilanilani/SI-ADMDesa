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
          </div>
        </div>
        @if($message = Session::get('success'))
      <div class="alert alert-success">
      <p>{{$message}}</p>
      </div>
      @endif
        <br>
        <div class="table-responsive">
          <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
            <thead>
                <tr>
                    <th> No </th>
                    <th> Username</th>
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
                    <td>
                      <a class="btn btn-danger btn-sm" href="{{URL::to('data-pengguna/edit/'.$post->id)}}"><i class="nav-icon fas fa-edit"></i> Edit</a>
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
            
            <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
            <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
            <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
          
            <script type="text/javascript">
              $(document).ready(function() {
            $('#example').DataTable();
            } );
        </script>
          @endsection
         