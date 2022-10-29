@extends('layouts.app')

@section('titre')
    Détail Lot
@endsection

@section('content')

@php
    $eff_total= count($lot->demandes()->get());
    $pourcent_total=(\App\Models\DemandeAllocationUPB::demandeAvecLot()->count() * 100) / $eff_total;
@endphp
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


                        {{ method_field('POST') }}
                        @csrf
                        <input type="text" class="form-control hide" id="id-demande" name="demande_id">
                        <input type="text" class="form-control hide" value="{{ $lot->id }}" name="lot_id">
                        <label for="" class="btn btn-light w-100 "
                            style="background-color: rgba(0,0,0,0.2)">{{ Auth::user()->email }}</label>
                        <input type="text" value="1" class="hide" name="avis_id" id="avis_id">
                        <div class="row">
                            <input type="text" value="{{ $lot->CodePV }}" name="pv" class="hide">
                            {{-- <div class="col-9">
                            {{ Form::label('PV') }}
                            {{ Form::select('pv', \App\Models\Pv::where('statut','!=','cloturé')->pluck('reference_PV', 'CodePV'), $lot->avis, ['required' => '', 'class' => 'form-select' . ($errors->has('actif') ? ' is-invalid' : ''), 'placeholder' => '-- Sélectionner --']) }}
                            {!! $errors->first('pv', '<div class="invalid-feedback">:message</div>') !!}
                            {!! $errors->first('pv', '<div class="alert alert-danger mt-1">:message</div>') !!}
                        </div>
                        <div class="col-3">
                            <label for="">+</label>
                            <a href="/pv" class="btn btn-light w-100" target="_blank"><i
                                    class="fa fa-fw fa-plus"></i> </a>

                        </div> --}}
                            <div class="col-12 mt-2">
                                {{ Form::label('Avis') }}
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
                                {!! $errors->first('avis', '<div class="alert alert-danger mt-1">:message</div>') !!}
                            </div>
                        </div>
                        <div class="row hide" id="rejet">
                            <div class="col-9">
                                <div class="form-group ">
                                    {{ Form::label('Motif Rejet') }}
                                    {{ Form::select('motifs_rejet_id', \App\Models\MotifsRejet::pluck('libele', 'id'), $lot->motifs_rejet_id, ['id' => 'motif', 'class' => 'form-select' . ($errors->has('actif') ? ' is-invalid' : ''), 'placeholder' => '-- Sélectionner --']) }}

                                </div>
                            </div>
                            <div class="col-3">
                                <label for="">+</label>
                                <a href="/motifs_rejet" class="btn btn-light w-100" target="_blank"><i
                                        class="fa fa-fw fa-plus"></i> </a>

                            </div>
                            <div class="col-12">
                                {!! $errors->first('motifs_rejet_id', '<div class="invalid-feedback">:message</div>') !!}
                                {!! $errors->first('motifs_rejet_id', '<div class="alert alert-danger mt-1">:message</div>') !!}
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
                                @foreach (DB::select(
            "SELECT E.CodeFiliere, D.CodeAnneeEtude, D.CodeNatureAllocation, count(E.CodeEtudiant) as effectif from
                                                                                     demande_allocation D , etudiant E WHERE D.CodeEtudiant= E.CodeEtudiant AND D.idtransaction!='' AND  D.CodeDemandeAllocation not in (SELECT CodeDemandeAllocation from assoc_lots_demande )
                                                                                     GROUP BY E.CodeFiliere, D.CodeAnneeEtude, D.CodeNatureAllocation ",
            [],
        ) as $list)
                                    <tr>
                                        <td>{{ $list->CodeFiliere }}</td>
                                        <td>{{ $list->CodeAnneeEtude }}</td>
                                        <td>{{ $list->CodeNatureAllocation }}</td>
                                        <td>{{ $list->effectif }}</td>
                                        <td>
                                            <form action="/ajouter-au-lot/{{ $lot->CodeLot }}" class="d-flex"
                                                method="post">
                                                @csrf
                                                <input type="text" class="hide" name="CodeFiliere"
                                                    value="{{ $list->CodeFiliere }}">
                                                <input type="text" class="hide" name="CodeAnneeEtude"
                                                    value="{{ $list->CodeAnneeEtude }}">
                                                <input type="text" class="hide" name="CodeNatureAllocation"
                                                    value="{{ $list->CodeNatureAllocation }}">
                                                <input type="number" name="effectif" placeholder="Effectif à insérer"
                                                    class="form-control" max="{{ $list->effectif }}">
                                                <button type="submit" class="btn btn-sm btn-success ms-2">OK</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
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
                            @role('super-admin')
                                <button class="btn btn-light shadow mx-2" data-bs-toggle="modal"
                                    data-bs-target="#modalPayer">Ajouter au lot</button>
                                    <a href="/exporter-lot/{{ $lot->CodeLot }}">
                                    <button class="btn btn-secondary text-white text-bold mx-2" >Exporter</button></a>
                            @endrole
                            <a class="btn btn-warning text-dark" href="{{ route('lots.index') }}"> Retour</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">

                            <div class="col-md-3 col-12 my-2">
                                <strong>Numero:</strong>
                                <input type="text" value="{{ $lot->Numero }}" class="form-control" readonly />
                            </div>

                            <div class="col-md-3 col-12 my-2">
                                <strong>Code PV :</strong>
                                <input type="text" value="{{ \App\Models\Pv::find($lot->CodePV)->Reference_PV }}"
                                    class="form-control" readonly />
                            </div>
                            <div class="col-md-3 col-12 my-2">
                                <strong>Commissaire :</strong>
                                <input type="text" value="{{ \App\Models\User::find($lot->Commissaire)->email }}"
                                    class="form-control" readonly />
                            </div>
                            <div class="col-md-3 col-12 my-2">
                                <strong>Status :</strong>
                                <input type="text" value="{{ $lot->status }}" class="form-control" readonly />
                            </div>

                        </div>


                        <div class="row">
                            <div class="col-12">
                                <ul>
                                    @foreach (Session::get('errorImport') ?? [] as $error)
                                        <li class="text-danger">{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @php
                                Session::remove('errorImport');
                            @endphp
                            <div class="col-12 col-md-4">
                                <div class="shadow p-3 rounded my-3" style="background: #fff">
                                    <p>Effectif Total : <strong> {{ $eff_total }} ( {{ $pourcent_total }}% des demandes classé par lot ) </strong> </p>
                                    <div class="progress" style="height:10px">
                                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-info" role="progressbar"
                                            aria-valuenow="{{ $pourcent_total }}" aria-valuemin="0"
                                            aria-valuemax="100" style="width: 100%;"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="shadow p-3 rounded my-3" style="background: #fff">
                                    <p>Effectif Non traité : <strong>{{ 50 }} (
                                            {{ 50 }} % )</strong></p>

                                    <div class="progress" style="height:10px">
                                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-success"
                                            role="progressbar" aria-valuenow="{{ 50 }}"
                                            aria-valuemin="0" aria-valuemax="100"
                                            style="width: {{ 100 }}%;">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-md-4">
                                <div class="shadow p-3 rounded my-3" style="background: #fff">

                                    <p>Effectif traité : <strong>{{ 50 }} (
                                            {{ 50 }} % )</strong></p>
                                    <div class="progress" style="height:10px">
                                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger"
                                            role="progressbar"
                                            aria-valuenow="{{ 50 }}"
                                            aria-valuemin="0" aria-valuemax="100"
                                            style="width: {{ 50 }}%;"></div>
                                    </div>

                                </div>
                            </div>
                        </div>


                        <div class="card-header text-center my-3">Liste des Demandes inclus


                        </div>
                        @forelse ($lot->groups() as $grp)
                            @php
                                $i = 1;
                            @endphp
                            <p>
                                <button class="btn btn-secondary text-white text-bold w-100" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseExample{{ $i }}"
                                    aria-expanded="false" aria-controls="collapseExample{{ $i }}">
                                    {{ $grp->CodeFiliere . ' / ' . $grp->CodeNatureAllocation . ' / ' . \App\Models\AnneeAcademique::find($grp->CodeAnneeAcademique)->LibelleAnneeAcademique . ' / ' . $grp->CodeAnneeEtude }}
                                </button>
                            </p>
                            <div class="collapse w-100" id="collapseExample{{ $i++ }}">
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

                                        @foreach ($lot->detailGroup($grp) as $demjoin)
                                            <tr>
                                                <td>{{ $demjoin->CodeDemandeAllocation }}</td>
                                                <td class="text-dark text-bold">{{ $demjoin->Matricule }}</td>
                                                <td>{{ $demjoin->NomEtudiant . ' ' . $demjoin->PrenomEtudiant }}</td>
                                                <td>{{ $demjoin->DateNaissanceEtudiant }}</td>
                                                <td>{{ $demjoin->CodeTypeDemande }}</td>

                                                <td>{{ $demjoin->referencesselection }}</td>
                                                <td>{{ $demjoin->Situationanterieure }}</td>
                                                @php
                                                    $avis = \App\Models\AssocPvDemande::where('CodeDemandeAllocation', $demjoin->CodeDemandeAllocation)
                                                        ->where('CodePV', $lot->CodePV)
                                                        ->get();
                                                    $avis = count($avis) == 0 ? '-' : $avis[0]->Avis;
                                                @endphp
                                                <td
                                                    class=" text-bold @if ($avis == 'Favorable') text-success
                                                    @elseif($avis == 'Réservé')
                                                    text-warning
                                                    @elseif ($avis == 'Défavorable')
                                                    text-danger @endif">
                                                    {{ $avis }}</td>
                                                <td class="">
                                                    @if ($lot->Commissaire == Auth::user()->id)
                                                        <button class="btn btn-secondary text-white text-bold"
                                                            data-bs-toggle="modal" data-bs-target="#myModal"
                                                            onclick="loadmodal('{{ $demjoin->CodeDemandeAllocation }}')">Traiter</button>
                                                    @endif
                                                    @role('super-admin')
                                                        <form
                                                            action="/retirer-du-lot/{{ $lot->CodeLot }}/{{ $demjoin->CodeDemandeAllocation }}"
                                                            method="post">
                                                            @csrf
                                                            <button
                                                                class="btn btn-sm btn-danger text-white py-2 show_confirm2 ">
                                                                <i class="fa fa-trash text-white"></i> </button>
                                                        </form>
                                                    @endrole

                                                </td>


                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        @empty

                            <div class="text-center py-4">
                                <h4>Aucune demande incluse</h4>
                            </div>
                        @endforelse


                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


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
