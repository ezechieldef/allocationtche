<?php $__env->startSection('titre'); ?>
    Détail Lot
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <?php
        $eff_total = count($lot->demandes()->get());
        $v = \App\Models\AssocLotsDemande::count();
        $pourcent_total = ($eff_total * 100) / ($v == 0 ? 1 : $v);
        $pourcent_total = intval($pourcent_total);
        $eff_nontraite = $lot->demandesSansAvis()->count();
        $pourcent_nontraite = ($eff_nontraite * 100) / ($eff_total == 0 ? 1 : $eff_total);
        $pourcent_nontraite = intval($pourcent_nontraite);
        $eff_traite = $lot->demandesAvecAvis()->count();
        $pourcent_traite = ($eff_traite * 100) / ($eff_total == 0 ? 1 : $eff_total);
        $pourcent_traite = intval($pourcent_traite);
        $eff_fav = $lot->demandesAvecAvisParticulier('Favorable')->count();
        $pourcent_fav = ($eff_fav * 100) / ($eff_total == 0 ? 1 : $eff_total);
        $pourcent_fav = intval($pourcent_fav);
        $eff_res = $lot->demandesAvecAvisParticulier('Réservé')->count();
        $pourcent_res = ($eff_res * 100) / ($eff_total == 0 ? 1 : $eff_total);
        $pourcent_res = intval($pourcent_res);
        $eff_def = $lot->demandesAvecAvisParticulier('Défavorable')->count();
        $pourcent_def = ($eff_def * 100) / ($eff_total == 0 ? 1 : $eff_total);
        $pourcent_def = intval($pourcent_def);

    ?>
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
                                <a href="/motifs_rejets" class="btn btn-light w-100" target="_blank"><i
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
                                <th class="text-white">Année Academique</th>
                                <th class="text-white">Effectif</th>
                                <th class="text-white">Action</th>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = DB::select(
            "SELECT E.CodeFiliere, D.CodeAnneeEtude, D.CodeNatureAllocation,D.CodeAnneeAcademique, count(E.CodeEtudiant) as effectif from
                                demande_allocation D , etudiant E WHERE D.CodeEtudiant= E.CodeEtudiant AND D.idtransaction!='' AND
                                D.CodeDemandeAllocation not in (SELECT CodeDemandeAllocation from assoc_lots_demande )
                                AND D.CodeDemandeAllocation NOT IN (SELECT CodeDemandeAllocation from assoc_pv_demande WHERE avis ='Favorable' or avis='Défavorable' )
                            GROUP BY E.CodeFiliere, D.CodeAnneeEtude, D.CodeNatureAllocation, D.CodeAnneeAcademique ",
            [],
        ); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($list->CodeFiliere); ?></td>
                                        <td><?php echo e($list->CodeAnneeEtude); ?></td>
                                        <td><?php echo e($list->CodeNatureAllocation); ?></td>
                                        <td><?php echo e(\App\Models\AnneeAcademique::find($list->CodeAnneeAcademique)->LibelleAnneeAcademique); ?>

                                        </td>
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
                                                <input type="text" class="hide" name="CodeAnneeAcademique"
                                                    value="<?php echo e($list->CodeAnneeAcademique); ?>">
                                                <input type="number" name="effectif" placeholder="Effectif à insérer"
                                                    class="form-control" max="<?php echo e($list->effectif); ?>">
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
        <div class="">
            <div class="">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="float-left">
                            <span class="card-title">Détail Lot</span>
                        </div>
                        <div class="float-right">
                            <?php if(auth()->check() && auth()->user()->hasRole('super-admin|President-CNABAU')): ?>
                                <button class="btn btn-light shadow mx-2" data-bs-toggle="modal"
                                    data-bs-target="#modalPayer">Ajouter au lot</button>
                            <?php endif; ?>
                            <a href="/exporter-lot/<?php echo e($lot->CodeLot); ?>">
                                <button class="btn btn-secondary text-white text-bold mx-2">Exporter</button></a>
                                <a href="/exporter-lot-stats/<?php echo e($lot->CodeLot); ?>">
                                    <button class="btn btn-secondary text-white text-bold mx-2">Exporter Statistique</button></a>

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


                        <div class="row">
                            <div class="col-12">
                                <ul>
                                    <?php $__currentLoopData = Session::get('errorImport') ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li class="text-danger"><?php echo e($error); ?></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                            <?php
                                Session::remove('errorImport');
                            ?>
                            <div class="col-12 col-md-4">
                                <div class="shadow p-3 rounded my-3" style="background: #fff">
                                    <p>Effectif Total : <strong> <?php echo e($eff_total); ?> ( <?php echo e($pourcent_total); ?>% des demandes
                                            classé par lot ) </strong> </p>
                                    <div class="progress" style="height:10px">
                                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-info"
                                            role="progressbar" aria-valuenow="<?php echo e($pourcent_total); ?>" aria-valuemin="0"
                                            aria-valuemax="100" style="width: <?php echo e($pourcent_total); ?>%;"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="shadow p-3 rounded my-3" style="background: #fff">
                                    <p>Effectif Non traité : <strong><?php echo e($eff_nontraite); ?> (
                                            <?php echo e($pourcent_nontraite); ?> % des demandes de ce lot )</strong></p>

                                    <div class="progress" style="height:10px">
                                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger"
                                            role="progressbar" aria-valuenow="<?php echo e($pourcent_nontraite); ?>"
                                            aria-valuemin="0" aria-valuemax="100"
                                            style="width: <?php echo e($pourcent_nontraite); ?>%;">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-md-4">
                                <div class="shadow p-3 rounded my-3" style="background: #fff">

                                    

                                    <div class="d-flex justify-content-between ">
                                        <div class="">
                                            Fav. : <strong> <?php echo e($eff_fav); ?> ( <?php echo e($pourcent_fav); ?> % )</strong>
                                        </div>
                                        <div class="">
                                            Rés. : <strong> <?php echo e($eff_res); ?> ( <?php echo e($pourcent_res); ?> % )</strong>
                                        </div>
                                        <div class="">
                                            Déf. : <strong> <?php echo e($eff_def); ?> ( <?php echo e($pourcent_def); ?> % )</strong>
                                        </div>
                                    </div>


                                    <div class="progress mt-3" style="height:10px">
                                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-success"
                                            role="progressbar" aria-valuenow="<?php echo e($pourcent_traite); ?>" aria-valuemin="0"
                                            aria-valuemax="100" style="width: <?php echo e($pourcent_traite); ?>%;"></div>
                                    </div>

                                </div>
                            </div>
                        </div>


                        <div class="card-header text-center my-3">Liste des Demandes inclus


                        </div>
                        <?php $__empty_1 = true; $__currentLoopData = $lot->groups(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $grp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <?php
                                $i = 1;
                            ?>
                            <p>
                                <button class="btn btn-secondary text-white text-bold w-100" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseExample<?php echo e($i); ?>"
                                    aria-expanded="false" aria-controls="collapseExample<?php echo e($i); ?>">
                                    <?php echo e($grp->CodeFiliere . ' / ' . $grp->CodeNatureAllocation . ' / ' . \App\Models\AnneeAcademique::find($grp->CodeAnneeAcademique)->LibelleAnneeAcademique . ' / ' . $grp->CodeAnneeEtude); ?>

                                </button>
                            </p>
                            <div class="collapse w-100" id="collapseExample<?php echo e($i++); ?>">
                                <div class="table-responsive w-100">
                                    <table id="" class="table table-striped w-100 datatable">
                                        <thead>
                                            <th>Code</th>
                                            <th>Matricule</th>
                                            <td>Nom & Prénoms</td>
                                            <th>Date Naiss.</th>
                                            <td>Type demande</td>
                                            <td>Référence</td>
                                            <td>Situation Antérieur</td>
                                            <th>Avis</th>
                                            <th>Actions</th>
                                        </thead>

                                        <?php $__currentLoopData = $lot->detailGroup($grp); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $demjoin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($demjoin->CodeDemandeAllocation); ?></td>
                                                <td class="text-dark text-bold"><?php echo e($demjoin->Matricule); ?></td>
                                                <td><?php echo e($demjoin->NomEtudiant . ' ' . $demjoin->PrenomEtudiant); ?></td>
                                                <td><?php echo e($demjoin->DateNaissanceEtudiant); ?></td>
                                                <td><?php echo e($demjoin->CodeTypeDemande); ?></td>

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
                                                    <?php elseif($avis == 'Défavorable'): ?>
                                                    text-danger <?php endif; ?>">
                                                    <?php echo e($avis); ?></td>
                                                <td class="">
                                                    <?php if($lot->status == 'OUVERT' && $lot->Commissaire == Auth::user()->id): ?>
                                                        <button class="btn btn-secondary text-white text-bold"
                                                            data-bs-toggle="modal" data-bs-target="#myModal"
                                                            onclick="loadmodal('<?php echo e($demjoin->CodeDemandeAllocation); ?>')">Traiter</button>
                                                    <?php endif; ?>
                                                    <?php if(auth()->check() && auth()->user()->hasRole('super-admin|President-CNABAU')): ?>
                                                        <form
                                                            action="/retirer-du-lot/<?php echo e($lot->CodeLot); ?>/<?php echo e($demjoin->CodeDemandeAllocation); ?>"
                                                            method="post">
                                                            <?php echo csrf_field(); ?>
                                                            <button
                                                                class="btn btn-sm btn-danger text-white py-2 show_confirm2 ">
                                                                <i class="fa fa-trash text-white"></i> </button>
                                                        </form>
                                                    <?php endif; ?>

                                                </td>


                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </table>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                            <div class="text-center py-4">
                                <h4>Aucune demande incluse</h4>
                            </div>
                        <?php endif; ?>


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