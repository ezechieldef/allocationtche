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
    <?php echo $__env->yieldContent('pre-content'); ?>


    <script>
        <?php if($suc == true): ?>
            window.onload = function() {
                $('#modalBienvenu').modal('show');
            }
        <?php endif; ?>
    </script>


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

    <div class="modal fade show" id="modalBienvenu">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Success !</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="text-center">

                        <lottie-player src="https://assets9.lottiefiles.com/packages/lf20_aao5ezov.json"
                            background="transparent" speed="1" style="height:500px;" loop autoplay>
                        </lottie-player>

                        <p>Plateforme de demande d'allocation el ligne disponible du
                            <strong><?php echo e($reg->DateOuverture); ?></strong> au <strong><?php echo e($reg->DateFermeture); ?></strong>
                        </p>

                    </div>




                </div>

            </div>
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
                                    Ministère de l’Enseignement Supérieur et <br>de la Recherche Scientifique
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

            <style>
                #cc {
                    background-image: url('https://bourses.enseignementsuperieur.gouv.bj/images/sampledata/dbsu/IMG_20171031_085951.jpg');
                    /* filter: brightness(0.5); */
                    background-size: cover;


                }
            </style>
            
            <div class="d-flex align-items-center " id="bg-gr" style="min-height: 80vh;">

                <div class="container text-center py-4 " style="">
                    <div class="row">
                        <div class="col-12 my-3">
                            <div class="text-center">
                                <div class="h3 text-uppercase fw-medium text-muted " style="">Ouverture / Cloture
                                    de la Plateforme des Demandes
                                    d'Allocation
                                    Universitaire </div>

                                
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="card shadow-lg mx-auto my-4" style="max-width: 450px" style="border: none">
                                <div class="card-body">
                                    <div class="h4 card py-3 text-white bg-success fw-bold "
                                        style="border-radius:10px;">Formulaire</div>
                                    <form action="/ouverture" method="post">

                                        <div class="row">

                                            <div class="col-12 text-start my-2">
                                                <strong>Date d'Ouverture </strong>
                                                <?php echo csrf_field(); ?>
                                                <input type="date" class="form-control my-1" id="DateOuverture"
                                                    value="<?php echo e(old('DateOuverture') ?? $reg->DateOuverture); ?>"
                                                    name="DateOuverture" required>
                                                <?php echo $errors->first('DateOuverture', '<div class="invalid-feedback">:message</div>'); ?>

                                                <?php echo $errors->first('DateOuverture', '<div class="text-danger">:message</div>'); ?>

                                                <small id="email" class="text-muted ">
                                                    <i class="fa-solid fa-circle-info text-italic me-1 "></i>
                                                    La date à partir laquelle les demandes d'allocations pourront être
                                                    possible
                                                </small>
                                            </div>
                                            <div class="col-12 text-start my-2">
                                                <strong>Date de Fermeture </strong>
                                                <input type="date" class="form-control my-1" name="DateFermeture"
                                                    value="<?php echo e(old('DateFermeture') ?? $reg->DateFermeture); ?>" required>
                                                <?php echo $errors->first('DateFermeture', '<div class="invalid-feedback">:message</div>'); ?>

                                                <?php echo $errors->first('DateFermeture', '<div class="text-danger">:message</div>'); ?>

                                                <small id="email" class="text-muted ">
                                                    <i class="fa-solid fa-circle-info text-italic me-1 "></i>
                                                    Le dernier délai pour les demandes d'allocations
                                                </small>
                                            </div>
                                            <div class="col-12 mt-3">
                                                <button class="btn btn-success w-100 text-white" type="submit">
                                                    Valider
                                                </button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <lottie-player src="https://assets9.lottiefiles.com/packages/lf20_u0w6fbdq.json"
                                background="transparent" speed="1" style="height:500px;" loop autoplay>
                            </lottie-player>
                            <a href="/" class="btn btn-warning shadow-sm w-25 fw-bold">Accueil</a>
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
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <script src="<?php echo e(url('dist/js/waves.js')); ?>"></script>
    <!--Menu sidebar -->
    <script src="<?php echo e(url('dist/js/sidebarmenu.js')); ?>"></script>
    <!--Custom JavaScript -->
    <script src="<?php echo e(url('dist/js/custom.js')); ?>"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
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
<?php /**PATH /home/ezechiel/AllocationTche/resources/views/upb/form_ouverture.blade.php ENDPATH**/ ?>