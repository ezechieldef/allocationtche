<?php $__env->startSection('titre'); ?>
    Faire une demande d'Allocation
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php
        $reg = \App\Models\ReglageDeBase::first();
        $today = strtotime(date('Y-m-d'));
        $ouv = strtotime($reg->DateOuverture);
        $ferm = strtotime($reg->DateFermeture);
    ?>
    
    <?php if($ouv > $today || $ferm < $today): ?>
        
        <div class="text-center">
            <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
            <lottie-player src="https://assets7.lottiefiles.com/private_files/lf30_3anincg1.json" background="transparent"
                speed="1" style="height:500px;" loop autoplay>

            </lottie-player>
            <div class="h4">Formulaire de demande d'allocation non accessible pour le moment</div>

            <p> Disponible du <strong><?php echo e($reg->DateOuverture); ?></strong> au <strong><?php echo e($reg->DateFermeture); ?></strong></p>
        </div>
    <?php else: ?>
    <?php if($deja): ?>
    <div class="text-center">
        <div class="h5">Vous n'avez pas encore fini le processus ! </div>
    </div>
    <div class="card">
        <div class="card-header">
            Information de l'étudiant
        </div>
        <div class="card-body">
            <div class="row">

                <div class="col-md-2 col-12 my-2">
                    <label for="">Matricule</label>
                    <input type="text" readonly class="form-control" value="<?php echo e($demTemp[0]->Matricule); ?>">
                </div>
                <div class="col-md-4 col-12 my-2">
                    <label for="">Nom</label>
                    <input type="text" readonly class="form-control" value="<?php echo e($demTemp[0]->NomEtudiant); ?>">
                </div>
                <div class="col-md-6 col-12 my-2">
                    <label for="">Prénoms</label>
                    <input type="text" readonly class="form-control" value="<?php echo e($demTemp[0]->PrenomEtudiant); ?>">
                </div>
                <div class="col-md-3 col-12 my-2">
                    <label for="">Date de Naissance : </label>
                    <input type="text" readonly class="form-control"
                        value="<?php echo e($demTemp[0]->DateNaissanceEtudiant); ?>">
                </div>
                <div class="col-md-4 col-12 my-2">
                    <label for="">Lieu de Naissance : </label>
                    <input type="text" readonly class="form-control"
                        value="<?php echo e($demTemp[0]->LieuNaissanceEtudiant); ?>">
                </div>
                <div class="col-md-1 col-12 my-2">
                    <label for="">Sexe : </label>
                    <input type="text" readonly class="form-control" value="<?php echo e($demTemp[0]->SexeEtudiant); ?>">
                </div>
                <div class="col-md-4 col-12 my-2">
                    <label for="">Université : </label>
                    <input type="text" readonly class="form-control" value="<?php echo e($demTemp[0]->CodeUniversite); ?>">
                </div>
            </div>
            <div class="text-center mt-5 mb-2 card-header rounded "> <strong>Demande à faire </strong> </div>
            <div class="table-responsive">
                <table class="table text-center " id="mytable">
                    <thead>
                        <th></th>
                        <th>Année Académique</th>
                        <th>Université</th>
                        <th>Etablissement</th>
                        <th>Filière</th>
                        <th>Année d'Étude</th>
                        <th>Type de demande</th>

                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $demTemp; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="odd dt-hasChild parent text-center">
                                <td>
                                    <i class="fa fa-check text-success"></i>
                                </td>
                                <td><?php echo e(\App\Models\AnneeAcademique::find($dem->CodeAnneeAcademique)->LibelleAnneeAcademique); ?>

                                </td>
                                <td><?php echo e($dem->CodeUniversite); ?></td>
                                <td><?php echo e($dem->CodeEtablissement); ?></td>
                                <td><?php echo e($dem->CodeFiliere); ?></td>
                                <td><?php echo e($dem->CodeAnneeEtude); ?></td>
                                <td><?php echo e($dem->CodeTypeDemande); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
            <div class="card-footer text-center text-bold text-danger">
<div class="row">
    <div class="col-6">
        <a href="/step2" class="btn btn-success text-white w-100"> Continuer Pour finaliser </a>

    </div>
    <div class="col-6">

        <a href="/step2/cancel" class="btn btn-outline-danger fw-bold w-100"> Annuler (Je ne suis pas le titulaire de ces informations ) </a>
    </div>
</div>

            </div>
        </div>
    </div>
    <?php else: ?>

        <form action="nouvelle-demande-allocation" method="post">
            <div class=" ">
                
                <?php if(count(Session::get('errorsDem') ?? []) != 0): ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php $__currentLoopData = Session::get('errorsDem'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $err): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($err); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>
                <?php
                    Session::forget('errorsDem');
                ?>

            <?php if(\App\Models\DemandeAllocationUPB::where('UtilisateurDemande',Auth::user()->id)->get()->count()!=0): ?>
                <div class="alert alert-warning">
                    <strong>Information :</strong> Vous avez déjà une demande . 
                    <a href="/mes-demandes">cliquez ici pour suivre votre demande</a>
                </div>
            <?php endif; ?>

                <div class="alert alert-info">
                    <strong>Information :</strong> Les étudiants admis aux concours doivent utiliser le
                    numéro de table des concours.
                </div>
                <div class="card">
                    <div class="card-header text-center text-white">
                        <h4 class="text-white">Formulaire Bourse dans les UPB</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <?php echo csrf_field(); ?>
                            <div class="col-md-6 col-12 my-2">
                                <strong> <label for="">Université</label></strong>
                                <?php echo e(Form::select('Universite', App\Models\Universite::pluck('LibelleLongUniversite', 'CodeUniversite'), null, ['required' => 'required', 'class' => 'form-select', 'placeholder' => '-- Sélectionner --'])); ?>

                            </div>

                            <div class="col-md-6 col-12 my-2">
                                <strong> <?php echo e(Form::label('Matricule')); ?></strong>
                                <?php echo e(Form::text('Matricule', null, ['class' => 'form-control' . ($errors->has('Matricule') ? ' is-invalid' : ''), 'placeholder' => 'Matricule', 'required' => 'required'])); ?>

                                <?php echo $errors->first('Matricule', '<div class="invalid-feedback">:message</div>'); ?>

                            </div>

                            <div class="col-md-4 col-12 my-2">
                                <strong><label for="DateNaissanceEtudiant">Date de Naissance</label></strong>
                                <?php echo e(Form::date('DateNaissanceEtudiant', null, ['required' => 'required', 'class' => 'form-control' . ($errors->has('DateNaissanceEtudiant') ? ' is-invalid' : ''), 'placeholder' => 'Datenaissanceetudiant'])); ?>

                                <?php echo $errors->first('DateNaissanceEtudiant', '<div class="invalid-feedback">:message</div>'); ?>

                            </div>
                            <div class="col-md-4 col-12 my-2">
                                <strong><label for="">Diplome de base</label></strong>
                                <?php echo e(Form::select('DipDeBase', ['BAC' => 'Baccalauréat', 'Autre' => 'Autres'], null, ['required' => 'required', 'class' => 'form-select', 'placeholder' => '-- Sélectionner --'])); ?>

                            </div>
                            

                            <div class="col-md-4 col-12 my-2">

                                <strong>
                                    <label for="NumeroDeTable">Numero de table</label></strong>
                                <?php echo e(Form::text('NumeroDeTable', null, ['required' => 'required', 'class' => 'form-control' . ($errors->has('NumeroDeTable') ? ' is-invalid' : ''), 'placeholder' => 'Numero De Table'])); ?>

                                <?php echo $errors->first('NumeroDeTable', '<div class="invalid-feedback">:message</div>'); ?>

                            </div>

                        </div>
                        <div class="text-center">
                            <button class="btn btn-success my-3 px-5 text-white text-bold">Valider</button>
                        </div>
                    </div>
                </div>



            </div>
        </form>
        <?php endif; ?>

    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ezechiel/AllocationTche/resources/views/upb/form-demande.blade.php ENDPATH**/ ?>