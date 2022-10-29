<?php $__env->startSection('titre'); ?>
    Détail Profile
<?php $__env->stopSection(); ?>

<?php $__env->startSection('titre'); ?>
    <?php echo e($user->name ?? 'Détail Utilisateur'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('sous-titre'); ?>
    Information du profile
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <section class="content container-fluid ">


        <div class="row">
            <div class="col-md-12">
                <div class="card ">
                    <div class="card-header d-flex justify-content-between">
                        <div class="float-left">
                            <span class="card-title">Détail de l'utilisateur</span>
                        </div>

                        <div class="float-right">
                            

                            <a class="btn btn-warning text-dark" href="<?php echo e(route('utilisateur.index')); ?>"> Retour</a>

                        </div>


                    </div>

                    <div class="card-body">

                        <div class="row">
                            <div class="col-12 col-md-6 mb-2">
                                <label>Nom & Prénoms </label>
                                <div class=" bg-gray-200 px-3 pt-2 pb-2" style="border-radius: 4px; ">
                                    <?php echo e($user->name); ?>

                                </div>
                            </div>

                            <div class="col-12 col-md-6 mb-2 ">
                                <label>Email </label>
                                <div class=" bg-gray-200 px-3 pt-2 pb-2" style="border-radius: 4px; ">
                                    <?php echo e($user->email); ?>

                                </div>
                            </div>
                            <?php if(in_array('banquier', $user->getRoleNames()->toArray())): ?>
                                <div class="col-12 col-md-4 mb-2">
                                    <label>Banque Assigner </label>
                                    <div class=" bg-gray-200 px-3 pt-2 pb-2" style="border-radius: 4px; ">
                                        <?php echo e(\App\Models\Banque::find($user->banque_assigner)->LibellelongBanque); ?>

                                    <?php if(empty($user->banque_assigner)): ?>
                                        -
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endif; ?>


                        
                        

                        <div class="col-12 mt-3 " style="text-align: right; ">
                            <a class=" btn btn-success text-light mx-auto" style="font-weight: 700"
                                href="<?php echo e(route('utilisateur.edit', $user->id)); ?>">
                                Editer Profile</a>

                        </div>
                    </div>

                    <?php if(in_array(
                        'super-admin',
                        Auth::user()->getRoleNames()->toArray())): ?>
                        <strong>Roles </strong>
                        <form action="/permission/<?php echo e($user->id); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <ul class="list-group list-group-flush mt-3 mb-2" id="uil">
                                <?php $__currentLoopData = \Spatie\Permission\Models\Role::all()->pluck('name'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="list-group-item">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" onchange="unhide()" type="checkbox"
                                            name="btn-<?php echo e($role); ?>" id=""
                                            <?php if(in_array($role, $user->getRoleNames()->toArray())): ?> checked <?php endif; ?>>
                                        <label class="form-check-label mb-0 ms-3 text-capitalize" for="rememberMe"><?php echo e($role); ?></label>
                                    </div>
                                </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                                <button type="submit" id="sub"
                                    class="btn btn-success text-white font-bold hide">Sauvegarder</button>
                            </ul>
                        </form>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    function unhide() {
        document.getElementById('sub').classList.remove('hide');
    }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ezechiel/AllocationTche/resources/views/user/show.blade.php ENDPATH**/ ?>