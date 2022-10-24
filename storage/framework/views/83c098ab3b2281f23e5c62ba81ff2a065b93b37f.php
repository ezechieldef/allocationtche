<?php $__env->startSection('titre'); ?>
    Détail Lot
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <form method="POST" action="" role="form" id="formulaire" enctype="multipart/form-data">
        <!-- The Modal -->
        <div class="modal fade" id="myModal">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Traiter la demande ID : <label id="id-sshow-demande">ff</label> </h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">


                        <?php echo e(method_field('POST')); ?>

                        <?php echo csrf_field(); ?>
                        <input type="text" class="form-control hide" id="id-demande" name="demande_id">
                        <input type="text" class="form-control hide" value="<?php echo e($lot->id); ?>" name="lot_id">
                        <label for="" class="btn btn-light w-100 "
                            style="background-color: rgba(0,0,0,0.2)"><?php echo e(Auth::user()->email); ?></label>
                        <input type="text" value="1" class="hide" name="avis_id" id="avis_id">
                        <div class="row">
                            <input type="text" value="<?php echo e($lot->CodePV); ?>" name="pv" class="hide">
                            
                            <div class="col-12 mt-2">
                                <?php echo e(Form::label('Avis')); ?>

                                <div class="btn-group w-100" role="group" aria-label="Basic radio toggle button group">
                                    <input type="radio" class="btn-check" name="avis" id="btnradio1" autocomplete="off"
                                        onchange="rej(false,1)" checked>
                                    <label class="btn btn-outline-success" for="btnradio1">Favorable </label>

                                    <input type="radio" class="btn-check" name="avis" id="btnradio2"
                                        onchange="rej(true,2)" autocomplete="off">
                                    <label class="btn btn-outline-warning text-black" for="btnradio2">Réservé</label>

                                    <input type="radio" class="btn-check" name="avis" id="btnradio3"
                                        onchange="rej(true,3)" autocomplete="off">
                                    <label class="btn btn-outline-danger" for="btnradio3">Défavorable</label>
                                </div>
                                <?php echo $errors->first('avis', '<div class="alert alert-danger mt-1">:message</div>'); ?>

                            </div>
                        </div>
                        <div class="row hide" id="rejet">
                            <div class="col-9">
                                <div class="form-group ">
                                    <?php echo e(Form::label('Motif Rejet')); ?>

                                    <?php echo e(Form::select('motifs_rejet_id', \App\Models\MotifsRejet::pluck('libele', 'id'), $lot->motifs_rejet_id, ['id' => 'motif', 'class' => 'form-select' . ($errors->has('actif') ? ' is-invalid' : ''), 'placeholder' => '-- Sélectionner --'])); ?>


                                </div>
                            </div>
                            <div class="col-3">
                                <label for="">+</label>
                                <a href="/motifs_rejet" class="btn btn-light w-100" target="_blank"><i
                                        class="fa fa-fw fa-plus"></i> </a>

                            </div>
                            <div class="col-12">
                                <?php echo $errors->first('motifs_rejet_id', '<div class="invalid-feedback">:message</div>'); ?>

                                <?php echo $errors->first('motifs_rejet_id', '<div class="alert alert-danger mt-1">:message</div>'); ?>

                            </div>
                        </div>




                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger text-white">Valider</button>
                    </div>

                </div>
            </div>
        </div>
    </form>
    <!-- The Modal -->

    <div class="modal fade" id="modalPayer">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Liste disponible</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table w-100" id="datatable">
                            <thead class="bg-secondary text-white">
                                <th class="text-white">Filiere</th>
                                <th class="text-white">Année d'Étude</th>
                                <th class="text-white">Nature Allocation</th>
                                <th class="text-white">Effectif</th>
                                <th class="text-white">Action</th>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = DB::select(
            "SELECT E.CodeFiliere, D.CodeAnneeEtude, D.CodeNatureAllocation, count(E.CodeEtudiant) as effectif from
                                             demande_allocation D , etudiant E WHERE D.CodeEtudiant= E.CodeEtudiant AND D.idtransaction!='' AND  D.CodeDemandeAllocation not in (SELECT CodeDemandeAllocation from assoc_lots_demande )
                                             GROUP BY E.CodeFiliere, D.CodeAnneeEtude, D.CodeNatureAllocation ",
            [],
        ); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($list->CodeFiliere); ?></td>
                                        <td><?php echo e($list->CodeAnneeEtude); ?></td>
                                        <td><?php echo e($list->CodeNatureAllocation); ?></td>
                                        <td><?php echo e($list->effectif); ?></td>
                                        <td>
                                            <form action="/ajouter-au-lot/<?php echo e($lot->CodeLot); ?>" class="d-flex"
                                                method="post">
                                                <?php echo csrf_field(); ?>
                                                <input type="text" class="hide" name="CodeFiliere"
                                                    value="<?php echo e($list->CodeFiliere); ?>">
                                                <input type="text" class="hide" name="CodeAnneeEtude"
                                                    value="<?php echo e($list->CodeAnneeEtude); ?>">
                                                <input type="text" class="hide" name="CodeNatureAllocation"
                                                    value="<?php echo e($list->CodeNatureAllocation); ?>">
                                                <input type="number" name="effectif" placeholder="Effectif à insérer"
                                                    class="form-control">
                                                <button type="submit" class="btn btn-sm btn-success ms-2">OK</button>
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

    <section class="">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="float-left">
                            <span class="card-title">Détail Lot</span>
                        </div>
                        <div class="float-right">

                            <button class="btn btn-light shadow mx-2" data-bs-toggle="modal"
                                data-bs-target="#modalPayer">Ajouter au lot</button>
                            <a class="btn btn-warning text-dark" href="<?php echo e(route('lots.index')); ?>"> Retour</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">

                            <div class="col-md-3 col-12 my-2">
                                <strong>Numero:</strong>
                                <input type="text" value="<?php echo e($lot->Numero); ?>" class="form-control" readonly />
                            </div>

                            <div class="col-md-3 col-12 my-2">
                                <strong>Code PV :</strong>
                                <input type="text" value="<?php echo e(\App\Models\Pv::find($lot->CodePV)->Reference_PV); ?>"
                                    class="form-control" readonly />
                            </div>
                            <div class="col-md-3 col-12 my-2">
                                <strong>Commissaire :</strong>
                                <input type="text" value="<?php echo e(\App\Models\User::find($lot->Commissaire)->email); ?>"
                                    class="form-control" readonly />
                            </div>
                            <div class="col-md-3 col-12 my-2">
                                <strong>Status :</strong>
                                <input type="text" value="<?php echo e($lot->status); ?>" class="form-control" readonly />
                            </div>

                        </div>
                        <div class="card-header text-center my-3">Liste des Demandes inclus </div>
                        <div class="table-responsive">
                            <table id="mytable" class="table table-striped">
                                <thead>
                                    <th>Code</th>
                                    <th>Matricule</th>
                                    <td>Nom & Prénoms</td>
                                    <th>Date Naiss.</th>
                                    <td>Type demande</td>
                                    <td>Année Acadé. / d'étu.</td>
                                    <td>Filiere</td>
                                    <td>Référence</td>
                                    <td>Situation Antérieur</td>
                                    <th>Avis</th>
                                    <th>Actions</th>
                                </thead>
                                <?php $__currentLoopData = $lot->demandes()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                        $demjoin = \App\Models\DemandeAllocationUPB::find($dem->CodeDemandeAllocation)
                                            ->join('etudiant', 'etudiant.CodeEtudiant', 'demande_allocation.CodeEtudiant')
                                            ->first();
                                    ?>
                                    <tr>
                                        <td><?php echo e($demjoin->CodeDemandeAllocation); ?></td>
                                        <td class="text-dark text-bold"><?php echo e($demjoin->Matricule); ?></td>
                                        <td><?php echo e($demjoin->NomEtudiant . ' ' . $demjoin->PrenomEtudiant); ?></td>
                                        <td><?php echo e($demjoin->DateNaissanceEtudiant); ?></td>
                                        <td><?php echo e($demjoin->CodeTypeDemande); ?></td>
                                        <td><?php echo e(\App\Models\AnneeAcademique::find($demjoin->CodeAnneeAcademique)->LibelleAnneeAcademique); ?>

                                            / Niveau : <?php echo e($demjoin->CodeAnneeEtude); ?></td>
                                        <td class="text-dark text-bold"><?php echo e($demjoin->CodeFiliere); ?></td>
                                        <td><?php echo e($demjoin->referencesselection); ?></td>
                                        <td><?php echo e($demjoin->Situationanterieure); ?></td>
                                        <?php
                                            $avis = \App\Models\AssocPvDemande::where('CodeDemandeAllocation', $demjoin->CodeDemandeAllocation)
                                                ->where('CodePV', $lot->CodePV)
                                                ->get();
                                            $avis = count($avis) == 0 ? '-' : $avis[0]->Avis;
                                        ?>
                                        <td
                                            class=" text-bold <?php if($avis == 'Favorable'): ?> text-success
                                            <?php elseif($avis == 'Réservé'): ?>
                                            text-warning
                                            <?php elseif($avis== 'Défavorable'): ?>
                                            text-danger
                                            <?php endif; ?>">
                                            <?php echo e($avis); ?></td>
                                        <td>
                                            <button class="btn btn-secondary text-white text-bold" data-bs-toggle="modal"
                                                data-bs-target="#myModal"
                                                onclick="loadmodal('<?php echo e($demjoin->CodeDemandeAllocation); ?>')">Traiter</button>
                                        </td>

                                        
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>


<script>
    function rej(radio, v) {
        if (radio == true) {

            document.getElementById('rejet').classList.remove("hide");
            document.getElementById('motif').setAttribute("required", '');

            console.log('oui');

        } else {

            document.getElementById('rejet').classList.add("hide");
            document.getElementById('motif').removeAttribute("required");

            console.log('non');

        }
        document.getElementById('avis_id').value = v;

    }

    function loadmodal(id) {
        document.getElementById('id-demande').value = id;
        document.getElementById('id-sshow-demande').innerHTML = id;
        document.getElementById('formulaire').action = '/avis-UPB/' + id;
    }
</script>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ezechiel/AllocationTche/resources/views/lot/show.blade.php ENDPATH**/ ?>