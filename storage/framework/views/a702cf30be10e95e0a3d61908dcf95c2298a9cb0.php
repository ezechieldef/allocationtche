<?php $__env->startSection('content'); ?>
    <form method="POST" action="<?php echo e(route('register')); ?>" role="form" class="text-start">
        <?php echo csrf_field(); ?>

        <div class="bg-success text-white text-center text-bold p-3 mb-4" style="margin-top: -60px; border-radius:10px;">
            <h3 class="text-white">Inscription</h3>

        </div>
        <div class="row">
            <div class="col-12 text-start my-2">
                <label for="" class="text-dark text-bold">Email</label>

                <input id="email" type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                    name="email" value="<?php echo e(old('email')); ?>" required autocomplete="email">
                <small id="email" class="text-muted ">
                    <i class="fa-solid fa-circle-info text-italic me-1 "></i>
                    Votre adresse email valide
                </small>
                <?php $__errorArgs = ['email'];
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
                <label for="" class="text-dark text-bold">Nouveau Mot De Passe</label>

                <input id="password" type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                    name="password" required autocomplete="new-password"
                     pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&amp;*_=+-]).{8,12}$"
                    title="Doit contenir au moins une lettre majuscule, une lettre minuscule, un chiffre et un symbole ( ! @ # $ % ^ &amp; * _ = + - )"
                    minlength="8">
                    <small id="password" class="text-muted">
                        <i class="fa-solid fa-circle-info text-italic me-1"></i>
                        Définir un nouveau mot de passe spécifique à cette plateforme . Ce dernier doit contenir au moins une lettre majuscule, une lettre minuscule, un chiffre et un symbole ( ! @ # $ % ^ &amp; * _ = + - )
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

                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required
                    autocomplete="new-password" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&amp;*_=+-]).{8,12}$" title="Doit contenir au moins une lettre majuscule, une lettre minuscule, un chiffre et un symbole ( ! @ # $ % ^ &amp; * _ = + - )" minlength="8">
                    <small id="password" class="text-muted">
                        <i class="fa-solid fa-circle-info text-italic me-1"></i>
                        Confirmer le mot de passe précédemment saisi
                    </small>

            </div>

            <div class="col-12 text-start my-2">

                <button type="submit" class="btn btn-success w-100  mb-2 text-white text-bold ">S'inscrire</button>
            </div>
            <div class="d-flex justify-content-around align-items-center w-100">

                <div><a href="/login" class="mt-4 text-sm text-center text-bold">Avez vous déjà un compte
                        ?</a></div>
            </div>

        </div>



    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('auth.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ezechiel/AllocationTche/resources/views/auth/register.blade.php ENDPATH**/ ?>