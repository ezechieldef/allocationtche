<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

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

        <header class="topbar mb-5" data-navbarbg="" style="font-size: 13px">
            <div class="container mt-3 ">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="row">
                        <div class="col-md-auto col-4">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/1/13/Coat_of_arms_of_Benin.svg?download"
                                height="80px" alt="">
                        </div>
                        <div class="col-md-auto col-8 text-uppercase text-sm ">

                            <small class="">
                                <strong>
                                    Direction des Bourses et <br>Aides Universitaires
                                </strong>
                            </small>
                            <div class="d-flex w-50">
                                <div class="w-100 bg-success h-10"></div>
                                <div class="w-100 bg-warning h-10"></div>
                                <div class="w-100 bg-danger h-10"></div>
                            </div>

                            <small>
                                <strong>
                                    Minist??re de l???Enseignement Sup??rieur et <br>de la Recherche Scientifique
                                </strong>
                            </small>





                        </div>
                    </div>

                    <div class="d-none d-md-block ">
                        01 BP 348 Cotonou <br>
                        Tel: +229 21 30 53 93 <br>
                        contact.mesrs@gouv.bj <br>
                        secretariat.dbau@goub.bj <br>
                    </div>

                </div>
            </div>
        </header>
        <div class="">

            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->

<style>#cc{
     background-image: url('https://bourses.enseignementsuperieur.gouv.bj/images/sampledata/dbsu/IMG_20171031_085951.jpg') ;
     /* filter: brightness(0.5); */
     background-size: cover;


}</style>
            
            <div class="d-flex align-items-center " id="bg-gr" style="min-height: 80vh;" >

                <div class="container text-center py-4 " style="">
                    <div class="card shadow-lg mx-auto my-4" style="max-width: 400px" style="border: none">
                        <div class="card-body">


                            <div class="bg-success text-white text-center text-bold p-3 mb-4"
                                style="margin-top: -60px; border-radius:10px;">
                                <h3 class="text-white">Authentification</h3>

                            </div>
                            <div class="row">
                                <div class="col-12 text-start my-1">
                                    <label for="" class="text-dark text-bold">Email</label>
                                    <input type="text" class="form-control" placeholder="Email">
                                </div>
                                <div class="col-12 text-start my-1">
                                    <label for="" class="text-dark text-bold">Mot de passe</label>
                                    <input type="password" class="form-control" placeholder="Mot de passe">
                                </div>
                                <div class="col-12 text-start my-2">
                                    <input type="checkbox" name="" id="cf" class="form-check-input"> <label
                                        for="cf">Rester Connect??</label>

                                </div>
                                <div class="col-12 text-start my-2">
                                    <button class="btn btn-success text-white text-bold w-100">Connexion</button>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>




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
                    Syst??me de Gestion des Allocations d'Etudes Universitaires ( SYGAL ) ?? COPYWRITE DBAU-DSI 2022
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

    </div>
    <style>
        .sidebar-nav ul .sidebar-item.selected>.sidebar-link {
            /* background: var(--bs-green) #289f61; */
            background: #289f61;
        }

        .text-bold {
            font-weight: 500;
        }

        .text-center {
            text-align: center;
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

    <!-- Latest compiled and minified CSS -->

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

    


    <?php echo $__env->yieldContent('script'); ?>
</body>

</html>
<?php /**PATH /home/ezechiel/AllocationTche/resources/views/layouts/login.blade.php ENDPATH**/ ?>