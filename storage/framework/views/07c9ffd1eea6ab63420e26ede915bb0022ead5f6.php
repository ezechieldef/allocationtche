<?php $__env->startSection('content'); ?>
    <main class="main-content  mt-0">
        <div class="page-header align-items-start ">

            <div class="container my-5 py-5">
                <div class="row">
                    <div class="col-lg-4 col-md-8 col-12 mx-auto">
                        <div class="card z-index-0 fadeIn3 fadeInBottom">
                            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                <div class="bg-gradient-success shadow-success border-radius-lg py-3 pe-1">
                                    <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Authentification
                                    </h4>

                                </div>
                            </div>
                            <div class="card-body">

                                <form method="POST" action="<?php echo e(route('login')); ?>" role="form" class="text-start">
                                    <?php echo csrf_field(); ?>


                                    <div class="input-group input-group-outline my-3">
                                        <label class="form-label " for="email">Email</label>

                                        <input id="email" type="email"
                                            class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email"
                                            value="<?php echo e(old('email')); ?>" required autocomplete="email" autofocus>
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
                                    <div class="input-group input-group-outline mb-3">
                                        <label class="form-label" for="password">Mot de passe</label>
                                        <input id="password" type="password"
                                            class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password"
                                            required autocomplete="current-password">

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
                                    <div class="form-check form-switch d-flex align-items-center mb-3">
                                        <input class="form-check-input" type="checkbox" id="remember" name="remember"
                                            <?php echo e(old('remember') ? 'checked' : ''); ?>>
                                        <label class="form-check-label mb-0 ms-3" for="rememberMe">Rester
                                            connecté(e)</label>
                                    </div>



                                    <div class="text-center">
                                        <button type="submit"
                                            class="btn bg-gradient-success w-100 my-4 mb-2">Se connecter</button>

                                    </div>
                                    <div class="d-flex justify-content-around align-items-center w-100">

                                        <div><a href="<?php echo e(route('password.request')); ?>" class="mt-4 text-sm text-center">Mot
                                                de passe oublié ?</a></div>
                                        <div><label>|</label></div>
                                        <div><a href="<?php echo e(route('register')); ?>"
                                                class="text-info text-gradient font-weight-bold">Inscrivez-vous</a></div>





                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('auth.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ezechiel/AllocationTche/resources/views/auth/login.blade.php ENDPATH**/ ?>