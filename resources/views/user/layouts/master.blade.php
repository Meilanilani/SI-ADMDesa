<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Aplikasi Administrasi Desa</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="/assets/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- Data Table -->
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" />

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.css" />

</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      
    </ul>
    <!--<div class="card-body">
      <center>Sistem Informasi Pelayanan Administrasi Persuratan Masyarakat Desa Cihampelas Kab. Bandung Barat</center>
    </div> -->
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
     
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="/assets/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="/assets/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="/assets/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
         <!-- Notifikasi -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell fa-2x"></i>
          <span class="badge badge-warning navbar-badge">{{count(Auth::user()->unreadNotifications)}}</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">{{count(Auth::user()->unreadNotifications)}} Notifications</span>
          @foreach (Auth::user()->unreadNotifications as $notification)
          <div class="dropdown-divider"></div>
          <a href="{{route('pengajuan.riwayat_pengajuan')}}" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> {{$notification->data['message']}}
            <span class="float-right text-muted text-sm">{{$notification->created_at->diffForHumans() }}</span>
          </a>
          @php
           $notification->markAsRead(); 
        @endphp
          @endforeach
          
        </div>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a  href="{{ route('logout') }}" class="nav-link"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }} 
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="/assets/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <font size="2">
            <font color="white">Welcome {{Auth::user()->name}}</font>
            <a href="/ganti-password-user" class="d-block">Ubah Password</a></font>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item has-treeview">
                <a href="/" class="nav-link">
                  <i class="nav-icon fas fa-home"></i>
                  <p> Halaman Utama </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/riwayat-pengajuan" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                    Riwayat Pengajuan Surat
                  </p>
                </a>
              </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                  Jenis Persuratan
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/user-suket-tidakmampu-sekolah/create" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>SKTM Sekolah</p>
                </a>
             </li>
              <li class="nav-item">
                <a href="/user-suket-tidakmampu-rumahsakit/create" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>SKTM Rumah Sakit</p>
                </a>
              </li> 
              <li class="nav-item">
                <a href="/user-suket-kelahiran/create" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Surat Kelahiran</p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="/user-suket-kematian/create" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Surat Kematian</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/user-suket-pengantar-nikah/create" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Surat Pengantar Nikah</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/user-suket-skck/create" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Surat Pengantar SKCK</p>
                </a>
              </li> 
              
              <li class="nav-item">
                <a href="/user-suket-ktp-sementara/create" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Surat KTP Sementara</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/user-suket-usaha/create" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Surat Ket-Usaha</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/user-suket-pindah/create" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Surat Ket-Pindah</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/user-suket-domisili/create" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Surat Domisili</p>
                </a>
              </li>
             
              <li class="nav-item">
                <a href="/user-pengantar-kk/create" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Surat Pengantar KK</p>
                </a>
              </li>
               <!--
              <li class="nav-item"> 
                <a href="/suket-domisili-lembaga" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Surat Domisili Lembaga</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/suket-janda-duda" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Surat Ket-Janda/ Duda</p>
                </a>
              </li>  
              <li class="nav-item">
                <a href="../layout/collapsed-sidebar.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Surat Pengajuan KK</p>
                </a>
              </li>  
              <li class="nav-item">
                <a href="/suket-belum-menikah" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Surat Belum Menikah</p>
                </a>
              </li>  
              <li class="nav-item">
                <a href="/suket-babinsa" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Surat Babinsa</p>
                </a>
              </li>  -->
            </ul>
         
          
          
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
   @yield('content')
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <strong> Desa Cihampelas-Copyright&copy;2020</strong> 
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="/assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="/assets/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/assets/js/demo.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $('#pengajuan-sktmsekolah').DataTable();
    });
    $(document).ready(function () {
        $('#pengajuan-sktmrs').DataTable();
    });
    $(document).ready(function () {
        $('#pengajuan-lahir').DataTable();
    });
    $(document).ready(function () {
        $('#pengajuan-kematian').DataTable();
    });
    $(document).ready(function () {
        $('#pengajuan-pnikah').DataTable();
    });
    $(document).ready(function () {
        $('#pengajuan-skck').DataTable();
    });
    $(document).ready(function () {
        $('#pengajuan-ktp').DataTable();
    });
    $(document).ready(function () {
        $('#pengajuan-usaha').DataTable();
    });
    $(document).ready(function () {
        $('#pengajuan-pindah').DataTable();
    });
    $(document).ready(function () {
        $('#pengajuan-domisili').DataTable();
    });
    $(document).ready(function () {
        $('#pengajuan-kk').DataTable();
    });
    $(document).ready(function () {
        $('#data_warga').DataTable();
    });
    $(document).ready(function () {
        $('#data_sktms').DataTable();

    });
    $(document).ready(function () {
        $('#data_sktmrs').DataTable();
    });
    $(document).ready(function () {
        $('#data_kelahiran').DataTable();
    });
    $(document).ready(function () {
        $('#data_kematian').DataTable();
    });
    $(document).ready(function () {
        $('#data_na').DataTable();
    });
    $(document).ready(function () {
        $('#data_skck').DataTable();
    });
    $(document).ready(function () {
        $('#data_ktp').DataTable();
    });
    $(document).ready(function () {
        $('#data_usaha').DataTable();

    });
    $(document).ready(function () {
        $('#data_kk').DataTable();

    });
    $(document).ready(function () {
        $('#data_ktp').DataTable();

    });
    $(document).ready(function () {
     $('#data_pindah').DataTable();

    });
    $(document).ready(function () {
     $('#data_domisili').DataTable();

    });
</script>
</body>
</html>
