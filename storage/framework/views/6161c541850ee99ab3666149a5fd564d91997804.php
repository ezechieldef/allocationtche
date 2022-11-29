<?php $__env->startSection('content'); ?>
    <form method="POST" action="<?php echo e(route('password.email')); ?>" role="form" class="text-start">
        <?php echo csrf_field(); ?>
        <div class="bg-success text-white text-center text-bold p-3 mb-4" style="margin-top: -60px; border-radius:10px;">
            <h3 class="text-white">Réinitialiser mot de passe</h3>

        </div>


        <?php if(session('status')): ?>
            <div class="alert alert-success" role="alert">
                <?php echo e(session('status')); ?>

            </div>
        <?php endif; ?>
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
                    name="email" value="<?php echo e(old('email')); ?>" required autocomplete="email" autofocus>
                <small id="email" class="text-muted ">
                    <i class="fa-solid fa-circle-info text-italic me-1 "></i>
                    Il s'agit de l'adresse email que vous aviez utilisé pour vous inscrire sur cette plateforme
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
                <button type="submit" class="btn btn-success w-100  mb-2 text-white text-bold ">Soumettre</button>
            </div>
        </div>


        <div class="d-flex justify-content-around align-items-center w-100 my-2">

            <div><a href="/login" class="mt-4 text-sm text-center">Authentification</a></div>
            <div><label>|</label></div>
            <div><a href="<?php echo e(route('register')); ?>" class="text-info text-gradient fw-bold">S'inscrire</a></div>

        </div>

    </form>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('auth.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ezechiel/AllocationTche/resources/views/auth/passwords/email.blade.php ENDPATH**/ ?>