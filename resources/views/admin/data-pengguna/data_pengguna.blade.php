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
        <br>
        <div class="table-responsive">
          <table id="data_pengguna" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
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
            
            
          @endsection
         