<?php $__env->startSection('titre'); ?>
    Faire une demande d'Allocation
<?php $__env->stopSection(); ?>
<?php $__env->startSection('sous-titre'); ?>
    Direction des Bourses et Aides Universitaire
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
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
            <div class="alert alert-info">
                <strong>Information :</strong> Les étudiants sélectionés sur la base des concours doivent utiliser le numéro de table des concours
            </div>
            <div class="card">
                <div class="card-header text-center text-white">
                    <h4 class="text-white">Formulaire Bourse dans les UPB</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <?php echo csrf_field(); ?>
                        <div class="col-md-6 col-12 my-2">
                            <label for="">Université</label>
                            <?php echo e(Form::select('Universite', App\Models\Universite::pluck('LibelleLongUniversite', 'CodeUniversite'), null, ['required' => 'required', 'class' => 'form-select', 'placeholder' => '-- Sélectionner --'])); ?>

                        </div>

                        <div class="col-md-6 col-12 my-2">
                            <?php echo e(Form::label('Matricule')); ?>

                            <?php echo e(Form::text('Matricule', null, ['class' => 'form-control' . ($errors->has('Matricule') ? ' is-invalid' : ''), 'placeholder' => 'Matricule', 'required' => 'required'])); ?>

                            <?php echo $errors->first('Matricule', '<div class="invalid-feedback">:message</div>'); ?>

                        </div>

                        <div class="col-md-4 col-12 my-2">
                            <?php echo e(Form::label('Date_Naissance')); ?>

                            <?php echo e(Form::date('DateNaissanceEtudiant', null, ['required' => 'required', 'class' => 'form-control' . ($errors->has('DateNaissanceEtudiant') ? ' is-invalid' : ''), 'placeholder' => 'Datenaissanceetudiant'])); ?>

                            <?php echo $errors->first('DateNaissanceEtudiant', '<div class="invalid-feedback">:message</div>'); ?>

                        </div>
                        <div class="col-md-4 col-12 my-2">
                            <label for="">Diplome de base</label>
                            <?php echo e(Form::select('DipDeBase', App\Models\DipDeBase::pluck('LibelleDipdeBase', 'CodeDipdeBase'), null, ['required' => 'required', 'class' => 'form-select', 'placeholder' => '-- Sélectionner --'])); ?>

                        </div>
                        

                        <div class="col-md-4 col-12 my-2">
                            <?php echo e(Form::label('Numero De Table')); ?>

                            <?php echo e(Form::text('NumeroDeTable', null, ['required' => 'required', 'class' => 'form-control' . ($errors->has('NumeroDeTable') ? ' is-invalid' : ''), 'placeholder' => 'Numero De Table'])); ?>

                            <?php echo $errors->first('NumeroDeTable', '<div class="invalid-feedback">:message</div>'); ?>

                        </div>

                    </div>
                    <div class="text-center">
                        <button class="btn btn-success my-3 px-5 text-white text-bold">Soumettre</button>
                    </div>
                </div>
            </div>



        </div>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ezechiel/AllocationTche/resources/views/upb/form-demande.blade.php ENDPATH**/ ?>