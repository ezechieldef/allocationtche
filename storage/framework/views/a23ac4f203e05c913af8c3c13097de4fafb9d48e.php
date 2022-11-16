<?php $__env->startSection('content'); ?>
    <form method="post" action="<?php echo e(route('password.update')); ?>">
        <?php echo csrf_field(); ?>
        <input type="hidden" name="token" value="<?php echo e($token); ?>">
        <div class="bg-success text-white text-center text-bold p-3 mb-4" style="margin-top: -60px; border-radius:10px;">
            <h3 class="text-white">Réinitialiser mot de passe</h3>
        </div>

        <?php if(session('status')): ?>
            <div class="alert alert-success" role="alert">
                <?php echo e(session('status')); ?>

            </div>
        <?php endif; ?>
<?php echo e($errors); ?>

        <div class="row">
            <div class="col-12 text-start my-2">
                <input id="email" type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email"
                    value="<?php echo e($email ?? old('email')); ?>" required autocomplete="email" autofocus readonly>

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
                    minlength="8">
                <small id="password" class="text-muted">
                    <i class="fa-solid fa-circle-info text-italic me-1"></i>
                    Définir un nouveau mot de passe spécifique à cette plateforme
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
                    autocomplete="new-password"   minlength="8">
                <small id="password" class="text-muted">
                    <i class="fa-solid fa-circle-info text-italic me-1"></i>
                    Confirmer le mot de passe précédemment saisi
                </small>

            </div>
            <div class="col-12 text-start my-2">

                <button type="submit" class="btn btn-success w-100  mb-2 text-white text-bold ">Soumettre</button>
            </div>
            <div class="d-flex justify-content-around align-items-center w-100">

                <div><a href="/login" class="mt-4 text-sm text-center text-bold">Avez vous déjà un compte
                        ?</a></div>
            </div>

        </div>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('auth.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ezechiel/AllocationTche/resources/views/auth/passwords/reset.blade.php ENDPATH**/ ?>