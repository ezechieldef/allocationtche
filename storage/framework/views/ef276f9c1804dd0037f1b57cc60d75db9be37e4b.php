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
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo e(url('assets/images/favicon.png')); ?>">
    <!-- Custom CSS -->
    <link href="<?php echo e(url('dist/css/style.min.css')); ?>" rel="stylesheet">

    

    <?php echo $__env->yieldContent('style'); ?>
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

        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin6" style="background: rgba(0, 0, 0, 0.8); color:white">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav" style="background: transparent">
                    <ul id="sidebarnav" style="background: transparent">
                        
                        <?php if(auth()->check() && auth()->user()->hasRole('super-admin')): ?>
                            <li class="sidebar-item <?php if(Request::is('derogations/*')): ?> selected <?php endif; ?>"
                                style="background: transparent;"> <a
                                    class="sidebar-link waves-effect waves-dark sidebar-link " href="/derogations"
                                    aria-expanded="false"><i class="mdi mdi-border-all"></i><span
                                        class="hide-menu">Derogation</span></a></li>
                        <?php endif; ?>

                        <?php if(auth()->check() && auth()->user()->hasRole('correspondance-maker')): ?>
                            <li class="sidebar-item <?php if(Request::is('correspondance-ets-selection/*')): ?> selected <?php endif; ?> "> <a
                                    class="sidebar-link waves-effect waves-dark sidebar-link"
                                    href="/correspondance-ets-selection" aria-expanded="false"><i
                                        class="mdi mdi-border-all"></i><span class="hide-menu">Corres.
                                        Ets Sélection</span></a></li>
                            <li class="sidebar-item <?php if(Request::is('correspondance-fil-selection/*')): ?> selected <?php endif; ?>"> <a
                                    class="sidebar-link waves-effect waves-dark sidebar-link"
                                    href="/correspondance-fil-selection" aria-expanded="false"><i
                                        class="mdi mdi-border-all"></i><span class="hide-menu">Corres.
                                        Fil Sélection</span></a></li>
                            <li class="sidebar-item <?php if(Request::is('correspondance-universite/*')): ?> selected <?php endif; ?>"> <a
                                    class="sidebar-link waves-effect waves-dark sidebar-link"
                                    href="/correspondance-universite" aria-expanded="false"><i
                                        class="mdi mdi-border-all"></i><span class="hide-menu">Corresp.
                                        Université</span></a></li>
                            <li class="sidebar-item <?php if(Request::is('correspondance-etablissement/*')): ?> selected <?php endif; ?>"> <a
                                    class="sidebar-link waves-effect waves-dark sidebar-link"
                                    href="/correspondance-etablissement" aria-expanded="false"><i
                                        class="mdi mdi-border-all"></i><span class="hide-menu">Correspondance Ets</span></a>
                            </li>
                            <li class="sidebar-item <?php if(Request::is('correspondance-filiere/*')): ?> selected <?php endif; ?>"> <a
                                    class="sidebar-link waves-effect waves-dark sidebar-link" href="/correspondance-filiere"
                                    aria-expanded="false"><i class="mdi mdi-border-all"></i><span
                                        class="hide-menu">Correspondance Filière</span></a></li>
                        <?php endif; ?>

                        <?php if(auth()->check() && auth()->user()->hasRole('banquier|super-admin')): ?>
                            <li class="sidebar-item <?php if(Request::is('validation-RIB/*')): ?> selected <?php endif; ?>"> <a
                                    class="sidebar-link waves-effect waves-dark sidebar-link" href="/validation-RIB"
                                    aria-expanded="false"><i class="mdi mdi-border-all"></i><span
                                        class="hide-menu">Validation RIB</span></a></li>
                        <?php endif; ?>
                        <?php if(auth()->check() && auth()->user()->hasRole('super-admin')): ?>
                            <li class="sidebar-item <?php if(Request::is('utilisateur/*')): ?> selected <?php endif; ?>"> <a
                                    class="sidebar-link waves-effect waves-dark sidebar-link" href="/utilisateur"
                                    aria-expanded="false"><i class="mdi mdi-border-all"></i><span
                                        class="hide-menu">Utilisateurs</span></a></li>
                            <li class="sidebar-item <?php if(Request::is('taux/*')): ?> selected <?php endif; ?>"> <a
                                    class="sidebar-link waves-effect waves-dark sidebar-link" href="/taux"
                                    aria-expanded="false"><i class="mdi mdi-border-all"></i><span
                                        class="hide-menu">Taux</span></a></li>
                            <li class="sidebar-item <?php if(Request::is('lots/*')): ?> selected <?php endif; ?>"> <a
                                    class="sidebar-link waves-effect waves-dark sidebar-link" href="/lots"
                                    aria-expanded="false"><i class="mdi mdi-border-all"></i><span
                                        class="hide-menu">Lots</span></a></li>
                        <?php endif; ?>

                        <li class="sidebar-item <?php if(Request::is('nouvelle-demande-allocation/*')): ?> selected <?php endif; ?>"> <a
                                class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="/nouvelle-demande-allocation" aria-expanded="false"><i
                                    class="mdi mdi-border-all"></i><span class="hide-menu">Nouvelle demande</span></a>
                        </li>
                        <li class="sidebar-item <?php if(Request::is('mes-demandes/*')): ?> selected <?php endif; ?>"> <a
                                class="sidebar-link waves-effect waves-dark sidebar-link" href="/mes-demandes"
                                aria-expanded="false"><i class="mdi mdi-border-all"></i><span class="hide-menu">Mes
                                    demandes</span></a>
                        </li>



                        <li class="pt-4 upgrade-btn">

                            <form method="POST" action="/logout">
                                <?php echo csrf_field(); ?>
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
                    <div class="col-8">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 d-flex align-items-center">
                                <li class="breadcrumb-item"><a href="/" class="link"><i
                                            class="mdi mdi-home-outline fs-4"></i></a></li>
                                <li class="breadcrumb-item active" aria-current="page">Direction des Bourses et
                                    Aides
                                    Universitaire <?php echo $__env->yieldContent('sous-titre'); ?></li>
                            </ol>
                        </nav>
                        <h1 class="mb-0 fw-bold"><?php echo $__env->yieldContent('titre'); ?></h1>
                    </div>
                    <div class="col-4">
                        <div class="text-end">
                            <label class=" btn btn-dark text-white"><?php echo e(Auth::user()->email); ?> </label>
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

                <?php echo $__env->yieldContent('content'); ?>




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
    <script src="<?php echo e(url('assets/libs/jquery/dist/jquery.min.js')); ?>"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?php echo e(url('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js')); ?>"></script>
    <script src="<?php echo e(url('dist/js/app-style-switcher.js')); ?>"></script>
    <!--Wave Effects -->
    <script src="<?php echo e(url('dist/js/waves.js')); ?>"></script>
    <!--Menu sidebar -->
    <script src="<?php echo e(url('dist/js/sidebarmenu.js')); ?>"></script>
    <!--Custom JavaScript -->
    <script src="<?php echo e(url('dist/js/custom.js')); ?>"></script>
    <script src="https://cdn.kkiapay.me/k.js"></script>
    <script>
        $('.card-header').addClass('bg-success text-white text-bold');
        $('.card').addClass('border-success text-black');
        $('.sidebar-link').addClass('text-white');

        // $('.sidebar-item.selected').addClass('bg-success');
    </script>
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
    

    

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    

    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap.min.css">
    
    <script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.3.0/js/responsive.bootstrap.min.js"></script>

    
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
    </script>


    <?php echo $__env->make('script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $('.selectpicker').selectpicker();
    </script>

    <?php echo $__env->yieldContent('script'); ?>
</body>

</html>
<?php /**PATH /home/ezechiel/AllocationTche/resources/views/layouts/app.blade.php ENDPATH**/ ?>