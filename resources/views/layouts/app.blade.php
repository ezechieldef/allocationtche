<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
        content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Flexy lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Flexy admin lite design, Flexy admin lite dashboard bootstrap 5 dashboard template">
    <meta name="description"
        content="Flexy Admin Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <title>DBAU</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/Flexy-admin-lite/" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ url('assets/images/favicon.png') }}">
    <!-- Custom CSS -->
    <link href="{{ url('dist/css/style.min.css') }}" rel="stylesheet">

    {{-- <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/css/bootstrap-select.min.css"> --}}

    @yield('style')
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->

    <style>
        .form-control {
            background-color: rgba(0, 0, 0, 0.1);
        }

        .form-select {
            background-color: rgba(0, 0, 0, 0.1);
        }
    </style>
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin6">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <div class="navbar-header" data-logobg="skin6">
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a class="navbar-brand " href="/"
                        style="background: rgba(0, 0, 0, 0.8); border-bottom: 1px solid grey">
                        <!-- Logo icon -->
                        <b class="logo-icon">
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="https://upload.wikimedia.org/wikipedia/commons/1/13/Coat_of_arms_of_Benin.svg"
                                height="30px" alt="homepage" class="dark-logo" />
                            <!-- Light Logo icon -->
                            <img src="https://upload.wikimedia.org/wikipedia/commons/1/13/Coat_of_arms_of_Benin.svg"
                                height="30px" alt="homepage" class="light-logo" />
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span class="logo-text text-white">
                            <strong>D B A U</strong>
                            <!-- dark Logo text -->
                            {{-- <img src="../assets/images/logo-text.png" alt="homepage" class="dark-logo" />
                            <!-- Light Logo text -->
                            <img src="../assets/images/logo-light-text.png" class="light-logo" alt="homepage" /> --}}
                        </span>
                    </a>

                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
                            class="ti-menu ti-close"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                {{-- <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-start me-auto">
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        <li class="nav-item search-box"> <a class="nav-link waves-effect waves-dark"
                                href="javascript:void(0)"><i class="mdi mdi-magnify me-1"></i> <span class="font-16">Search</span></a>
                            <form class="app-search position-absolute">
                                <input type="text" class="form-control" placeholder="Search &amp; enter"> <a
                                    class="srh-btn"><i class="mdi mdi-window-close"></i></a>
                            </form>
                        </li>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-end">
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="../assets/images/users/profile.png" alt="user" class="rounded-circle" width="31">
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end user-dd animated" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="javascript:void(0)"><i class="ti-user m-r-5 m-l-5"></i>
                                    My Profile</a>
                                <a class="dropdown-item" href="javascript:void(0)"><i class="ti-wallet m-r-5 m-l-5"></i>
                                    My Balance</a>
                                <a class="dropdown-item" href="javascript:void(0)"><i class="ti-email m-r-5 m-l-5"></i>
                                    Inbox</a>
                            </ul>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div> --}}
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin6"
            style="background: rgba(0, 0, 0, 0.8); color:white; min-height:100vh">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav" style="">
                    <ul id="sidebarnav" style="background: transparent">
                        {{-- <li class="sidebar-item ">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link " href="/admin"
                                aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span
                                    class="hide-menu">Dashboard</span></a>
                        </li> --}}
                        @role('super-admin')
                            <li class="sidebar-item @if (Request::is('derogations/*')) selected @endif"
                                style="background: transparent;"> <a
                                    class="sidebar-link waves-effect waves-dark sidebar-link " href="/derogations"
                                    aria-expanded="false"><i class="mdi mdi-border-all"></i><span
                                        class="hide-menu">Derogation</span></a></li>
                        @endrole

                        @role('correspondance-maker')
                            <li class="sidebar-item @if (Request::is('correspondance-ets-selection/*')) selected @endif "> <a
                                    class="sidebar-link waves-effect waves-dark sidebar-link"
                                    href="/correspondance-ets-selection" aria-expanded="false"><i
                                        class="mdi mdi-border-all"></i><span class="hide-menu">Corres.
                                        Ets Sélection</span></a></li>
                            <li class="sidebar-item @if (Request::is('correspondance-fil-selection/*')) selected @endif"> <a
                                    class="sidebar-link waves-effect waves-dark sidebar-link"
                                    href="/correspondance-fil-selection" aria-expanded="false"><i
                                        class="mdi mdi-border-all"></i><span class="hide-menu">Corres.
                                        Fil Sélection</span></a></li>
                            <li class="sidebar-item @if (Request::is('correspondance-universite/*')) selected @endif"> <a
                                    class="sidebar-link waves-effect waves-dark sidebar-link"
                                    href="/correspondance-universite" aria-expanded="false"><i
                                        class="mdi mdi-border-all"></i><span class="hide-menu">Corresp.
                                        Université</span></a></li>
                            <li class="sidebar-item @if (Request::is('correspondance-etablissement/*')) selected @endif"> <a
                                    class="sidebar-link waves-effect waves-dark sidebar-link"
                                    href="/correspondance-etablissement" aria-expanded="false"><i
                                        class="mdi mdi-border-all"></i><span class="hide-menu">Correspondance Ets</span></a>
                            </li>
                            <li class="sidebar-item @if (Request::is('correspondance-filiere/*')) selected @endif"> <a
                                    class="sidebar-link waves-effect waves-dark sidebar-link" href="/correspondance-filiere"
                                    aria-expanded="false"><i class="mdi mdi-border-all"></i><span
                                        class="hide-menu">Correspondance Filière</span></a></li>
                        @endrole

                        @role('banquier|super-admin')
                            <li class="sidebar-item @if (Request::is('validation-RIB/*')) selected @endif"> <a
                                    class="sidebar-link waves-effect waves-dark sidebar-link" href="/validation-RIB"
                                    aria-expanded="false"><i class="mdi mdi-border-all"></i><span
                                        class="hide-menu">Validation RIB</span></a></li>
                        @endrole
                        @role('super-admin')
                            <li class="sidebar-item @if (Request::is('les-demandes/*')) selected @endif"> <a
                                    class="sidebar-link waves-effect waves-dark sidebar-link" href="/les-demandes"
                                    aria-expanded="false"><i class="mdi mdi-border-all"></i><span
                                        class="hide-menu">Demandes
                                        Admin</span></a></li>
                            <li class="sidebar-item @if (Request::is('consulter/*')) selected @endif"> <a
                                    class="sidebar-link waves-effect waves-dark sidebar-link" href="/consulter"
                                    aria-expanded="false"><i class="mdi mdi-border-all"></i><span
                                        class="hide-menu">Consulter Etudiant</span></a></li>
                            <li class="sidebar-item @if (Request::is('utilisateur/*')) selected @endif"> <a
                                    class="sidebar-link waves-effect waves-dark sidebar-link" href="/utilisateur"
                                    aria-expanded="false"><i class="mdi mdi-border-all"></i><span
                                        class="hide-menu">Utilisateurs</span></a></li>
                            <li class="sidebar-item @if (Request::is('taux/*')) selected @endif"> <a
                                    class="sidebar-link waves-effect waves-dark sidebar-link" href="/taux"
                                    aria-expanded="false"><i class="mdi mdi-border-all"></i><span
                                        class="hide-menu">Taux</span></a></li>
                            <li class="sidebar-item @if (Request::is('motifs_rejets/*')) selected @endif"> <a
                                    class="sidebar-link waves-effect waves-dark sidebar-link" href="/motifs_rejets"
                                    aria-expanded="false"><i class="mdi mdi-border-all"></i><span
                                        class="hide-menu">Motifs
                                        Rejets</span></a></li>
                            <li class="sidebar-item @if (Request::is('ouverture')) selected @endif"> <a
                                    class="sidebar-link waves-effect waves-dark sidebar-link" href="/ouverture"
                                    aria-expanded="false"><i class="mdi mdi-border-all"></i><span
                                        class="hide-menu">Disponibilité</span></a></li>
                        @endrole
                        @role('President-CNABAU|super-admin')
                            <li class="sidebar-item @if (Request::is('pv/*')) selected @endif"> <a
                                    class="sidebar-link waves-effect waves-dark sidebar-link" href="/pv"
                                    aria-expanded="false"><i class="mdi mdi-border-all"></i><span
                                        class="hide-menu">PV</span></a></li>
                        @endrole
                        @role('commissaire-CNABAU|super-admin')
                            <li class="sidebar-item @if (Request::is('lots/*')) selected @endif"> <a
                                    class="sidebar-link waves-effect waves-dark sidebar-link" href="/lots"
                                    aria-expanded="false"><i class="mdi mdi-border-all"></i><span
                                        class="hide-menu">Lots</span></a></li>
                        @endrole
                        @if (count(Auth::user()->getRoleNames()) == 0)
                            <li class="sidebar-item @if (Request::is('nouvelle-demande-allocation/*')) selected @endif"> <a
                                    class="sidebar-link waves-effect waves-dark sidebar-link"
                                    href="/nouvelle-demande-allocation" aria-expanded="false"><i
                                        class="mdi mdi-border-all"></i><span class="hide-menu">Demande en
                                        ligne</span></a>
                            </li>
                            <li class="sidebar-item @if (Request::is('mes-demandes/*')) selected @endif"> <a
                                    class="sidebar-link waves-effect waves-dark sidebar-link" href="/mes-demandes"
                                    aria-expanded="false"><i class="mdi mdi-border-all"></i><span
                                        class="hide-menu">Suivre sa demande <br>en ligne </span></a>
                            </li>
                            <li class="sidebar-item @if (Request::is('demandes-bourse-chinoise/*')) selected @endif"> <a
                                class="sidebar-link waves-effect waves-dark sidebar-link" href="/demandes-bourse-chinoise"
                                aria-expanded="false"><i class="mdi mdi-border-all"></i><span
                                    class="hide-menu">Bourse Chinoise</span></a>
                        </li>
                        @endif




                        <li class="pt-4 upgrade-btn">

                            <form method="POST" action="/logout">
                                @csrf
                                <button type="submit" class="btn d-block w-100 btn-danger text-white">Déconnexion</a>

                            </form>
                        </li>
                    </ul>

                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->

        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->

            <div class="page-breadcrumb ">
                <div class="row align-items-center ">
                    <div class="col-md-8 col-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 d-flex align-items-center">
                                <li class="breadcrumb-item"><a href="/" class="link"><i
                                            class="mdi mdi-home-outline fs-4"></i></a></li>
                                <li class="breadcrumb-item active" aria-current="page">Direction des Bourses et
                                    Aides
                                    Universitaires @yield('sous-titre')</li>
                            </ol>
                        </nav>
                        <h1 class="mb-0 fw-bold">@yield('titre')</h1>
                    </div>
                    <div class="col-md-4 col-12">
                        <div class="text-end">
                            <a href="/profile/{{ Auth::user()->id }}">
                                <label class=" btn btn-dark text-white">{{ Auth::user()->email }} @if (trim(Auth::user()->name) != '')
                                        |
                                    @endif {{ Auth::user()->name }}
                                </label>
                            </a>

                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->

            <div class="container-fluid">

                @yield('content')




            </div>

            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="w-100" style="">
                <hr>
                <div class="text-center my-2">
                    Système de Gestion des Allocations d'Etudes Universitaires ( SYGAL ) © COPYWRITE DBAU-DSI 2022
                </div>
                <div class="row  w-100 p-0 ml-1 d-flex">
                    <div class="col-4 h-10 bg-success">

                    </div>
                    <div class="col-4 h-10 bg-warning">

                    </div>
                    <div class="col-4 bg-danger h-10">

                    </div>
                </div>

            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>


        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="{{ url('assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ url('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ url('dist/js/app-style-switcher.js') }}"></script>
    <!--Wave Effects -->
    <script src="{{ url('dist/js/waves.js') }}"></script>
    <!--Menu sidebar -->
    <script src="{{ url('dist/js/sidebarmenu.js') }}"></script>
    <!--Custom JavaScript -->
    <script src="{{ url('dist/js/custom.js') }}"></script>
    <script src="https://cdn.kkiapay.me/k.js"></script>
    <script>
        $('.card-header').addClass('bg-success text-white text-bold');
        $('.card').addClass('border-success text-black');
        $('.card.border-none').removeClass('border-success');
        $('.sidebar-link').addClass('text-white');

        // $('.sidebar-item.selected').addClass('bg-success');
    </script>
    <!-- Latest compiled and minified CSS -->
    {{--
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

<!-- (Optional) Latest compiled and minified JavaScript translation files -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/i18n/defaults-*.min.js"></script> --}}
    <style>
        .sidebar-nav ul .sidebar-item.selected>.sidebar-link {
            /* background: var(--bs-green) #289f61; */
            background: #289f61;
        }

        .h-10 {
            height: 7px;
        }

        .b-vert {
            background-color: #009900
        }

        .b-jaune {
            background-color: #ffff00
        }

        .b-rouge {
            background-color: #ff0000
        }
    </style>
    {{--
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/js/bootstrap-select.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/js/i18n/defaults-*.min.js"></script>
 --}}

    {{--
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.colVis.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">


    <script>
        $(document).ready(function() {
            $(document).ready(function() {
                $('#mytable').DataTable({
                    dom: 'Bfrtip',
                    buttons: [
                        'csv', 'colvis'
                    ],
                    language: {
                        "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
                    }
                });
            });
        });

    </script> --}}

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    {{-- https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css --}}

    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap.min.css">
    {{-- @include('datable_responsive') --}}
    <script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.3.0/js/responsive.bootstrap.min.js"></script>

    {{-- <link rel="stylesheet" href=""> --}}
    <script>
        $(document).ready(function() {
            $('#mytable').DataTable({
                responsive: true,
                language: {
                    "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
                },

            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#datatable').DataTable({
                responsive: true,

                language: {
                    "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
                },
            });
        });
        $(".datatable").each(function() {
            $(this).DataTable({
                responsive: true,
                language: {
                    "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
                },
            });
        });
    </script>


    @include('script')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $('.selectpicker').selectpicker();
    </script>

    @yield('script')
</body>

</html>
