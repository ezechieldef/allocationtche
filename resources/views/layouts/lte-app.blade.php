<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DBAU</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('lte_plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('lte_dist/css/adminlte.min.css') }}">
</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-green navbar-dark text-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav ">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>

                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link font-weight-bold" style="color: white">Direction des Bourses et
                        Aides Universitaire</a>
                </li>

            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->



            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="../../index3.html" class="brand-link bg-success">
                <img src="{{ asset('lte_dist/img/AdminLTELogo.png') }}" alt="DBAU Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Allocationtché</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <svg xmlns="http://www.w3.org/2000/svg" x="0" y="0" viewBox="0 0 128 128"
                            width="32" height="32">
                            <circle cx="64" cy="64" r="60" fill="#fff" />
                            <path fill="#71c2ff"
                                d="M114.5,99.41c-0.56,0-1.12-0.15-1.62-0.48c-1.39-0.9-1.8-2.75-0.9-4.15C117.88,85.61,121,74.96,121,64 c0-31.43-25.57-57-57-57S7,32.57,7,64c0,10.86,3.07,21.43,8.87,30.55c0.89,1.4,0.48,3.25-0.92,4.14 c-1.4,0.89-3.25,0.48-4.14-0.92C4.39,87.69,1,76.01,1,64C1,29.26,29.26,1,64,1s63,28.26,63,63c0,12.12-3.45,23.89-9.98,34.03 C116.45,98.93,115.48,99.41,114.5,99.41z" />
                            <path fill="#444b54"
                                d="M64,127c-15.68,0-30.7-5.79-42.3-16.32c-1.23-1.11-1.32-3.01-0.21-4.24l0.29-0.32 c0.03-0.04,0.07-0.07,0.1-0.11c23.22-23.23,61.02-23.23,84.24,0c0.09,0.09,0.17,0.18,0.24,0.27c0.05,0.05,0.1,0.1,0.15,0.15 c1.11,1.23,1.02,3.12-0.21,4.24C94.7,121.21,79.68,127,64,127z M28.16,108.33C38.28,116.52,50.89,121,64,121 s25.72-4.48,35.84-12.67C79.53,90.02,48.47,90.02,28.16,108.33z" />
                            <path fill="#444b54"
                                d="M64,77c-12.68,0-23-10.32-23-23s10.32-23,23-23s23,10.32,23,23S76.68,77,64,77z M64,37 c-9.37,0-17,7.63-17,17s7.63,17,17,17s17-7.63,17-17S73.37,37,64,37z" />
                        </svg>
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">Alexander Pierce</a>
                    </div>
                </div>

                <!-- SidebarSearch Form -->


                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>

                        </li>
                        <li class="nav-item">
                            <a href="../widgets.html" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Widgets
                                    <span class="right badge badge-danger">New</span>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-copy"></i>
                                <p>
                                    Layout Options


                                </p>
                            </a>

                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-chart-pie"></i>
                                <p>
                                    Charts

                                </p>
                            </a>

                        </li>

                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>tITRE </h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item active">Sous titre</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                @yield('content')
                <!-- Default box -->

                <!-- /.card -->

            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 4.0
            </div>
            <strong>Copyright &copy; Direction des Bourses et Aides Universitaires, 2022 <a
                    href="/">Allocationtché</a>.</strong> Tous droits réservés.
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('lte_plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('lte_plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('lte_dist/js/adminlte.min.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../dist/js/demo.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</body>

</html>
