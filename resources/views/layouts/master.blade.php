<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SI Administrasi Desa</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="/assets/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- Ajax -->  
  
  
  
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
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
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
          <a href="#" class="d-block">Welcome Meilani !</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item has-treeview">
                <a href=/dashboard class="nav-link">
                  <i class="nav-icon fas fa-home"></i>
                  <p> Dashboard </p>
                </a>
              </li>
               <li class="nav-item has-treeview">
            <a href=/data-pengguna class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p> Data Pengguna </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/datawarga" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Data Warga
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Data Persuratan
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/suket-tidakmampu-sekolah" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>SKTM Sekolah</p>
                </a>
             </li>
              <li class="nav-item">
                <a href="/suket-sktmrs" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>SKTM Rumah Sakit</p>
                </a>
              </li> 
              <li class="nav-item">
                <a href="/suket-kelahiran" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Surat Kelahiran</p>
                </a>
              </li>
              <!--
              <li class="nav-item">
                <a href="/suket-kematian" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Surat Kematian</p>
                </a>
              </li> 
              <li class="nav-item">
                <a href="/suket-pengantar-nikah" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Surat Pengantar Nikah</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/suket-pengantar-skck" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Surat Pengantar SKCK</p>
                </a>
              </li> -->
              
              <li class="nav-item">
                <a href="/suket-ktp-sementara" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Surat KTP Sementara</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/suket-usaha" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Surat Ket-Usaha</p>
                </a>
              </li>
              <!--
              <li class="nav-item">
                <a href="/suket-taksiran-tanah" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Surat Taksiran Tanah</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/suket-pindah" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Surat Ket-Pindah</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/suket-domisili" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Surat Domisili</p>
                </a>
              </li>
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
</body>
</html>
