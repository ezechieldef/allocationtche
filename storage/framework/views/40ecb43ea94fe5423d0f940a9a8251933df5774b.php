<?php $__env->startSection('titre'); ?>
    Détails Profil
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <script>
        <?php if($errors->has('old-password') || $errors->has('password')): ?>
            window.onload = function() {
                $('#modalPassword').modal('show');

            }
        <?php endif; ?>
    </script>

    <div class="modal fade " id="modalPassword">
        <div class="modal-dialog modal-dialog-centered ">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Changement de mot de passe </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form action="/profile/<?php echo e(Auth::user()->id); ?>/changepass" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="row">


                            <div class="col-12 my-2">
                                <label for="old-password" class="fw-bold text-dark text-bold">Mot de passe actuel</label>
                                <?php echo e(Form::password('old-password', ['class' => 'form-control ' . ($errors->has('old-password') ? ' is-invalid' : ''), 'placeholder' => '', 'required' => 'required'])); ?>

                                <?php echo $errors->first('old-password', '<div class="invalid-feedback">:message</div>'); ?>

                            </div>

                            <div class="col-12 text-start my-2">
                                <label for="" class="text-dark text-bold">Nouveau Mot De Passe</label>

                                <input id="password" type="password"
                                    class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" required
                                    autocomplete="new-password"
                                    pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&amp;*_=+-]).{8,12}$"
                                    title="Doit contenir au moins une lettre majuscule, une lettre minuscule, un chiffre et un symbole ( ! @ # $ % ^ &amp; * _ = + - )"
                                    minlength="8">
                                <small id="password" class="text-muted">
                                    <i class="fa-solid fa-circle-info text-italic me-1"></i>
                                    Définir un nouveau mot de passe spécifique à cette plateforme . Ce dernier doit contenir
                                    au moins une lettre majuscule, une lettre minuscule, un chiffre et un symbole ( ! @ # $
                                    % ^ &amp; * _ = + - )
                                </small>
                                <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="col-12 text-start my-2">
                                <label for="" class="text-dark text-bold">Confirmer Mot De Passe</label>

                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password"
                                    pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&amp;*_=+-]).{8,12}$"
                                    title="Doit contenir au moins une lettre majuscule, une lettre minuscule, un chiffre et un symbole ( ! @ # $ % ^ &amp; * _ = + - )"
                                    minlength="8">
                                <small id="password" class="text-muted">
                                    <i class="fa-solid fa-circle-info text-italic me-1"></i>
                                    Confirmer le mot de passe précédemment saisi
                                </small>

                            </div>
                            <div class="col-12 my-2">
                                <button type="submit" class="btn btn-success text-white fw-bold w-100">Valider</button>
                            </div>
                        </div>
                    </form>

                </div>
                <div class="modal-footer">
                    <button class="text-white text-gradient text-bold btn btn-danger w-100 my-2 fw-bold"
                        data-bs-dismiss="modal">Annuler</button>
                </div>

            </div>
        </div>
    </div>
    <div class="modal fade " id="modalInfo">
        <div class="modal-dialog modal-dialog-centered ">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Formulaire de Modification </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form action="/profile/<?php echo e(Auth::user()->id); ?>/" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="row">

                            <div class="col-12 my-2">
                                <label for="name" class="fw-bold">Nom et Prénoms</label>
                                <?php echo e(Form::text('name', old('name') ?? Auth::user()->name, ['class' => 'form-control' . ($errors->has('nom') ? ' is-invalid' : ''), 'placeholder' => ''])); ?>

                                <?php echo $errors->first('name', '<div class="invalid-feedback">:message</div>'); ?>

                            </div>
                            <div class="col-12 my-2">
                                <label for="email" class="fw-bold">Email</label>
                                <?php echo e(Form::text('email', old('email') ?? Auth::user()->email, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => ''])); ?>

                                <?php echo $errors->first('email', '<div class="invalid-feedback">:message</div>'); ?>

                            </div>
                            <div class="col-12 my-2">
                                <button type="submit" class="btn btn-success text-white fw-bold w-100">Valider</button>
                            </div>
                        </div>
                    </form>

                </div>
                <div class="modal-footer">
                    <button class="text-white text-gradient text-bold btn btn-danger w-100 my-2 fw-bold"
                        data-bs-dismiss="modal">Annuler</button>
                </div>

            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header text-center text-white">
            <h4 class="text-white">
                Information du profil
            </h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 col-12 my-2">
                    <strong>Nom et Prénoms :</strong>
                    <input type="text" class="form-control my-2" value="<?php echo e(Auth::user()->name ?? '-'); ?>" readonly>
                </div>
                <div class="col-md-6 col-12 my-2">
                    <strong>Email</strong>
                    <input type="text" class="form-control my-2" value="<?php echo e(Auth::user()->email); ?>" readonly>
                </div>
                <div class="col-md-4 col-12 my-2">
                    <button class="btn btn-info text-white fw-bold w-100" data-bs-target="#modalPassword"
                        data-bs-toggle="modal"> <i class="fa fa-edit me-3"></i> Modifier Mot de
                        passe</button>
                </div>
                <div class="col-md-4 col-12 my-2">

                    <button class="btn btn-warning text-dark fw-bold w-100" data-bs-toggle="modal"
                        data-bs-target="#modalInfo"> <i class="fa fa-edit me-3"></i>Modifier
                        informations profil</button>
                </div>
                <div class="col-md-4 col-12 my-2">
                    <form action="/profile/<?php echo e(Auth::user()->id); ?>/delete" method="post">
                        <?php echo csrf_field(); ?>
                        <button class="btn btn-danger text-white fw-bold w-100 show_confirm2"> <i
                                class="fa fa-trash me-3"></i> Supprimer mon compte </button>

                        <small class=""> <i class="fa-solid fa-circle-info text-italic me-2 "></i> Si vous n'avez
                            pas
                            encore effectué de demande avec ce compte</small>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ezechiel/AllocationTche/resources/views/upb/profile.blade.php ENDPATH**/ ?>