<?php $__env->startSection('template_title'); ?>
    Correspondance Universite
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <p>
            <button class="btn btn-success text-white text-bold w-100" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample"
                aria-expanded="false" aria-controls="collapseExample">
                Nouvelle Correspondance
            </button>
        </p>
        <div class="collapse" id="collapseExample">
            <div class="card ">
                <div class="card-header">
                    <span class="card-title">Formulaire Correspondance Université</span>
                </div>
                <?php
                    $correspondanceUniversite = new App\Models\CorrespondanceUniversite();
                ?>
                <div class="card-body">
                    <form method="POST" action="<?php echo e(route('correspondance-universite.store')); ?>"  role="form" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>

                        <?php echo $__env->make('correspondance-universite.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                <?php echo e(__('Correspondance Universite')); ?>

                            </span>

                        </div>
                    </div>
                    <?php if($message = Session::get('success')): ?>
                        <div class="alert alert-success">
                            <p><?php echo e($message); ?></p>
                        </div>
                    <?php endif; ?>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover" id="mytable">
                                <thead class="thead">
                                    <tr>


										<th>Université</th>
										<th>Correspond à</th>
										<th>Synonymes</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $correspondanceUniversites; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $correspondanceUniversite): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>


											<td><?php echo e($correspondanceUniversite->universite1()->first()->LibelleLongUniversite); ?></td>
											<td><?php echo e($correspondanceUniversite->universite2()->first()->LibelleLongUniversite); ?></td>
											<td>

                                                
                                            <?php $__currentLoopData = $correspondanceUniversite->synonymes(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $syn): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="btn btn-light shadow-sm">
                                                    <?php echo e($syn->CodeUniversite); ?>

                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                            </td>

                                            <td>
                                                <form action="<?php echo e(route('correspondance-universite.destroy',$correspondanceUniversite->id)); ?>" method="POST">

                                                    <a class="btn btn-sm btn-success text-white show_confirm2" href="<?php echo e(route('correspondance-universite.edit',$correspondanceUniversite->id)); ?>"><i class="fa fa-fw fa-edit"></i> Modifier</a>
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                                    <button type="submit" class="btn btn-danger btn-sm text-white"><i class="fa fa-fw fa-trash"></i> Supprimer</button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ezechiel/AllocationTche/resources/views/correspondance-universite/index.blade.php ENDPATH**/ ?>