@extends('layouts.app')
@section('content')
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <b> </b>
  </div>
  <!-- /.login-logo -->
  <div id="login">
    <div class="container">
        <div id="login-row" class="row justify-content-center align-items-center">
            <div id="login-column" class="col-md-6">
                <div id="login-box" class="col-md-12">
                    <form id="login-form" class="form" method="POST" action="{{ route('login') }}">
                        @csrf
                        <h3 class="text-center text-black">SI Pelayanan Masyarakat <br> Kantor Desa Cihampelas, KBB</h3>
                        <div class="form-group">
                            <label for="name" class="text-black">Username :</label><br>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Masukkan Username" @error('name') is-invalid @enderror name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        </div>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <div class="form-group">
                            <label for="password" class="text-black">Password:</label><br>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan Password" @error('password') is-invalid @enderror name="password" required autocomplete="current-password">
                        </div>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        <div class="form-group">
                            <input type="submit" name="submit" class="btn btn-info btn-md" value="Login">
                        </div>
                        
                    </form>
        </div>
        <h6 style="color:white" class="text-center ">Copyright@2020</h6>
@endsection
