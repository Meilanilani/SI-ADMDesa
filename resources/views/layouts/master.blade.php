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

<body class="hold-transition sidebar-mini" <div class="wrapper">
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>

        </ul>
        <ul class="navbar-nav ml-auto">

            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <a href="#" class="dropdown-item">

                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item dropdown-footer"></a>
            </div>
            </li>
            <!-- Notifikasi -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown">
                    <i class="far fa-bell fa-2x"></i>
                    <span class="badge badge-warning navbar-badge">{{count(Auth::user()->unreadNotifications)}}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <span class="dropdown-item dropdown-header">{{count(Auth::user()->unreadNotifications)}}
                        Notifications</span>
                    @foreach (Auth::user()->unreadNotifications as $notification)
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">

                        <i class="fas fa-envelope mr-2"></i> {{$notification->data['message']}}
                        <span
                            class="float-right text-muted text-sm">{{$notification->created_at->diffForHumans() }}</span>
                    </a>
                    @php
                    $notification->markAsRead();
                    @endphp
                    @endforeach
                </div>
            </li>
            <!-- Notifikasi -->
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </nav>
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
                    <h5>
                        <font color="white">Welcome {{Auth::user()->name}}</font>
                    </h5>
                    <a href="/ganti-password" class="d-block">Ubah Password</a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                    <li class="nav-item has-treeview">
                        <a href=/ class="nav-link">
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
                        <a href="/data-warga" class="nav-link">
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
                                <a href="/suket-tidakmampu-rumahsakit" class="nav-link">
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
                            </li>

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

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
   
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
            $('#data_pengguna').DataTable();
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

    </script>
</body>

</html>
