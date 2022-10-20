 @php
     $banque = \App\Models\Banque::find(Auth::user()->banque_assigner);
     $demListe = \App\Models\DemandeAllocationUPB::where('CodeBanque', Auth::user()->banque_assigner)->get();
     $demAll = count(\App\Models\DemandeAllocationUPB::all());
     $demListeValide = \App\Models\DemandeAllocationUPB::where('CodeBanque', Auth::user()->banque_assigner)
         ->where('RIB_valide', 'oui')
         ->get();
     $demListeNonValide = \App\Models\DemandeAllocationUPB::where('CodeBanque', Auth::user()->banque_assigner)
         ->where('RIB_valide', '!=', 'oui')
         ->get();
 @endphp
 @extends('layouts.app')
 @section('titre')
     Validation RIB
 @endsection
 @section('sous-titre')
     Banque {{ $banque->LibellelongBanque . '( ' . $banque->LibellecourtBanque . ' )' }}
 @endsection
 @section('content')
     <script>
         function loadmodal(id, nom, rib) {
             document.getElementById('CodeDemandeAllocation').value = id;
             document.getElementById('NomMR').value = nom;
             document.getElementById('RIBMR').value = rib;
             document.getElementById('newRIB').value = '';
         }
     </script>

     <form method="POST" action="/validation-RIB" role="form">

         <div class="modal fade" id="modalLot">
             <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                 <div class="modal-content">

                     <!-- Modal Header -->
                     <div class="modal-header">
                         <h4 class="modal-title">Modification RIB </h4>
                         <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                     </div>

                     <!-- Modal body -->
                     <div class="modal-body">
                         @csrf

                         <input type="text" name="CodeDemandeAllocation" id="CodeDemandeAllocation" class="hide">
                         <div class="form-group">
                             {{ Form::label('Nom & Prénoms') }}
                             <input type="text" class="form-control" id="NomMR" readonly>
                         </div>
                         <div class="form-group">
                             {{ Form::label('RIB Actuel') }}
                             <input type="text" class="form-control" id="RIBMR" readonly>
                         </div>
                         <div class="form-group">
                             {{ Form::label('RIB Correct') }}
                             <input type="text" class="form-control" name="RIB" id="newREIB"
                                 pattern="{{ $banque->regex }}">
                         </div>
                     </div>
                     <!-- Modal footer -->
                     <div class="modal-footer">
                         <button type="submit" name="btn-cree-lot-allocation"
                             class="btn btn-success text-white w-100">Valider</button>
                     </div>

                 </div>
             </div>
         </div>

     </form>
     <form method="POST" action="/importerRIB" role="form" enctype="multipart/form-data">
         {{ method_field('POST') }}
         <!-- The Modal -->
         <div class="modal fade" id="modalImporter">
             <div class="modal-dialog modal-dialog-centered">
                 <div class="modal-content">

                     <!-- Modal Header -->
                     <div class="modal-header">
                         <h4 class="modal-title">Importer eligibles</h4>
                         <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                     </div>

                     <!-- Modal body -->
                     <div class="modal-body">
                         @php
                             $cols = Schema::getColumnListing('eligibles');
                             $cols = array_diff($cols, ['id', 'created_at', 'updated_at']);

                         @endphp
                         <div class="alert alert-info">

                             <p class="">
                                 Le fichier doit comporter 4 columns dans l'ordre qui suivante : <br>
                                 <strong>ID, NIP, Nom, Prénoms, RIB</strong> <br>
                                 Tout autres colones sera ignoré


                             </p>
                         </div>

                         @csrf
                         <div id="dropContainer" class=" d-flex w-100 justify-content-center align-items-center"
                             style="border:2px dashed rgba(0,0,0,0.2);height:100px;">
                             <label for="">Déposez un fichier ici</label>

                         </div>
                         <div class="row d-flex align-items-center">
                             <div class="col">
                                 <hr>
                             </div>
                             <div class="col-auto">ou</div>
                             <div class="col">
                                 <hr>
                             </div>
                         </div>
                         <input type="file" name="ribs" id="fileInput" style=""
                             class="form-file w-100  btn btn-light " required
                             accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
                     </div>

                     <!-- Modal footer -->
                     <div class="modal-footer">
                         <button type="submit" class="btn btn-success text-bold text-white">Importer</button>
                     </div>

                 </div>
             </div>
         </div>
     </form>

     <div class="card">
         <div class="card-header">Dashboard Banque : <strong>{{ Auth::user()->banque_assigner }}</strong> </div>
         <div class="card-body">
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
                         <p>Effectif Total : <strong> {{ count($demListe) }} ( {{ (count($demListe) * 100) / $demAll }}
                                 % des
                                 étudiants )</strong> </p>
                         <div class="progress" style="height:10px">
                             <div class="progress-bar progress-bar-striped progress-bar-animated bg-info" role="progressbar"
                                 aria-valuenow="{{ (count($demListe) * 100) / $demAll }}" aria-valuemin="0"
                                 aria-valuemax="100" style="width: 100%;"></div>
                         </div>
                     </div>
                 </div>
                 <div class="col-12 col-md-4">
                     <div class="shadow p-3 rounded my-3" style="background: #fff">
                         <p>Effectif Validé : <strong>{{ count($demListeValide) }} (
                                 {{ (count($demListeValide) * 100) / count($demListe) }} % )</strong></p>

                         <div class="progress" style="height:10px">
                             <div class="progress-bar progress-bar-striped progress-bar-animated bg-success"
                                 role="progressbar" aria-valuenow="{{ (count($demListeValide) * 100) / count($demListe) }}"
                                 aria-valuemin="0" aria-valuemax="100"
                                 style="width: {{ (count($demListeValide) * 100) / count($demListe) }}%;">
                             </div>
                         </div>
                     </div>
                 </div>

                 <div class="col-12 col-md-4">
                     <div class="shadow p-3 rounded my-3" style="background: #fff">

                         <p>Effectif Non Validé : <strong>{{ count($demListeNonValide) }} (
                                 {{ (count($demListeNonValide) * 100) / count($demListe) }} % )</strong></p>
                         <div class="progress" style="height:10px">
                             <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger"
                                 role="progressbar"
                                 aria-valuenow="{{ (count($demListeNonValide) * 100) / count($demListe) }}"
                                 aria-valuemin="0" aria-valuemax="100"
                                 style="width: {{ (count($demListeNonValide) * 100) / count($demListe) }}%;"></div>
                         </div>

                     </div>
                 </div>
             </div>





             <div class="text-end my-5">

                 <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modalImporter">Importer
                     liste validé</button>
                 <a href="/export-excel/{{ Auth::user()->banque_assigner }}" class="btn btn-primary show_info_banque">
                     Extraire Version Excel des non validé</a>
             </div>
             <form action="/validation-RIB" method="post">
                 @csrf
                 <div class="table-responsive">


                 <table class="table table-responsive py-3 my-3" id="mytable">
                     <thead>
                         <th></th>
                         <th>ID</th>
                         <th>NIP</th>
                         <th>Nom et Prénoms</th>
                         <th>RIB</th>
                         <th>Statut</th>
                         <th>Niveau du dossier</th>
                         <th>Action</th>
                     </thead>
                     <tbody>

                         @forelse ($demListe as $dem)
                             @php
                                 $etu = $dem->etudiant()->first();
                             @endphp
                             <tr>
                                 <td>
                                     @if ($dem->RIB_valide == 'oui')
                                         <i class="fa fa-check text-success"></i>
                                     @else
                                         <input type="checkbox"
                                             name="demandeAllocationId[{{ $dem->CodeDemandeAllocation }}]">
                                     @endif

                                 </td>
                                 <td>{{ $dem->CodeDemandeAllocation }}</td>
                                 <td>{{ $etu->NPI }} </td>
                                 <td>{{ $etu->NomEtudiant . ' ' . $etu->PrenomEtudiant }} </td>
                                 <td>{{ $dem->RIB }}</td>
                                 <td>{{ $dem->RIB_valide == 'oui' ? 'Validé' : 'Non Validé' }}</td>
                                 <td> {{ $dem->Avicommission == '' ? 'EN COURS DE TRAITEMENT' : 'TRAITÉ' }}</td>
                                 <td class="d-flex">
                                     @if ($dem->RIB_valide != 'oui')
                                         <form action="/validation-RIB" method="post">
                                             @csrf
                                             <input type="checkbox" class="hide"
                                                 name="demandeAllocationId[{{ $dem->CodeDemandeAllocation }}]" checked>
                                             <button class="btn btn-success text-white text-bold mx-2">Valider</button>
                                         </form>
                                     @endif
                                     <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                         data-bs-target="#modalLot"
                                         onclick="loadmodal('{{ $dem->CodeDemandeAllocation }}','{{ $etu->NomEtudiant . ' ' . $etu->PrenomEtudiant }}','{{ $dem->RIB }}')">
                                         Modifier RIB
                                     </button>

                                 </td>
                             </tr>
                         @empty
                         @endforelse
                     </tbody>
                 </table>
                </div>

                 <div class="text-center">
                     <button class="btn btn-success text-white text-bold mx-2">Valider les Éléments coché</button>
                 </div>
             </form>

         </div>
     </div>

     <script>
         var dropContainer = document.getElementById('dropContainer');
         var fileInput = document.getElementById('fileInput');
         dropContainer.ondragover = dropContainer.ondragenter = function(evt) {
             evt.preventDefault();
         };

         dropContainer.ondrop = function(evt) {
             // pretty simple -- but not for IE :(
             //fileInput.files = evt.dataTransfer.files;

             // If you want to use some of the dropped files
             console.log(evt.dataTransfer.files[0].type);
             var types = ["application/vnd.openxmlformats-officedocument.spreadsheetml.sheet", 'text/csv',
                 'application/vnd.ms-excel'
             ];
             if (types.includes(evt.dataTransfer.files[0].type)) {
                 const dT = new DataTransfer();
                 dT.items.add(evt.dataTransfer.files[0]);
                 //dT.items.add(evt.dataTransfer.files[3]);
                 fileInput.files = dT.files;
             } else {
                 // Toast.fire({
                 //     icon: 'success',
                 //     title: 'Signed in successfully'
                 // });
                 Swal.fire(
                     'Erreur',
                     'Ce type de fichier n\'est pas prise en charge',
                     'error'
                 );
             }
             evt.preventDefault();


         };
     </script>
 @endsection
