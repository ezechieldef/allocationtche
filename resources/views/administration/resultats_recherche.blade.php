<!doctype html>

<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>Tableau-de-bord - DBAU</title>
    <!-- CSS files -->
    <link href="{{asset('dist_dash/css/tabler.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('dist_dash/css/tabler-vendors.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('dist_dash/css/demo.min.css')}}" rel="stylesheet"/>
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet"/>
    <link href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.min.css" rel="stylesheet"/>
  </head>
  <body >
    <div class="page">
      <header class="navbar navbar-expand-md navbar-light d-print-none">
        <div class="container-xl">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu">
            <span class="navbar-toggler-icon"></span>
          </button>
          <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
            <a href=".">
              <img src="{{asset('bsassets/img//lo.png')}}" width="150" height="45" alt="Allocations" class="navbar-brand-image">
            </a>
          </h1>
          <div class="navbar-nav flex-row order-md-last">
            
            <div class="nav-item dropdown">
              <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
                <span class="avatar avatar-sm" style="#"></span>
                <div class="d-none d-xl-block ps-2">
                  <div>Nom Prénom</div>
                  <div class="mt-1 small text-muted">Admin</div>
                </div>
              </a>
              <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <a href="#" class="dropdown-item">Déconnection</a>
              </div>
            </div>
          </div>
        </div>
      </header>

      <div class="page-wrapper">
        <div class="container-xl">
          <!-- Page title -->
          <div class="page-header d-print-none">
            <div class="row g-2 align-items-center">
              <div class="col">
                <!-- Page pre-title -->
                <div class="page-pretitle">
                  Gestion des allocations
                </div>
                <h2 class="page-title">
                  Statistiques
                </h2>
              </div>
              <!-- Page title actions -->
              <div class="col-12 col-md-auto ms-auto d-print-none">
                  <span class="d-none d-sm-inline">
                    <a href="{{route('dashboard.index')}}" class="btn btn-white">
                      Retour
                    </a>
                  </span>
              </div>
            </div>
          </div>
        </div>
        <div class="page-body">
          <div class="container-xl">
            <div class="row row-deck row-cards">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Résultat de la recherche</h3>
                  </div>
                  <div class="card-body border-bottom py-3">
                    
                  </div>
                  <div class="table-responsive">
                    <table class="table card-table table-vcenter table-bordered text-nowrap datatable" id="datatable">
                      <thead>
                        <tr>
                          <th>Matricule</th>
                          <th>Nom</th>
                          <th>Prénom(s)</th>
                          <th>Date de naissance</th>
                          <th>Lieu de naissance</th>
                          <th>Sexe</th>
                          <th>Etablissement</th>
                          <th>Université</th>
                          <th>Filière</th>
                          <th>Année d'étude</th>
                          <th>Type allocation</th>
                          <th>Nature allocation</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($data as $d)
                          <tr>
                            <td>{{$d->Matricule}}</td>
                            <td>{{$d->NomEtudiant}}</td>
                            <td>{{$d->PrenomEtudiant}}</td>
                            <td>{{$d->DateNaissanceEtudiant}}</td>
                            <td>{{$d->LieuNaissanceEtudiant}}</td>
                            <td>{{$d->SexeEtudiant}}</td>
                            <td>{{$d->LibelleEtablissement}}</td>
                            <td>{{$d->CodeUniversite}}</td>
                            <td>{{$d->LibelleFiliere}}</td>
                            <td>{{$d->CodeAnneeEtude}}</td>
                            <td>{{$d->CodeTypeDemande}}</td>
                            <td>{{$d->CodeNatureAllocation}}</td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                  <div class="card-footer d-flex align-items-center">
                    
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <footer class="footer footer-transparent d-print-none">
          <div class="container-xl">
            <div class="row text-center align-items-center flex-row-reverse">
              <div class="col-lg-auto ms-lg-auto">
                <ul class="list-inline list-inline-dots mb-0">
                  <li class="list-inline-item"><a href="./docs/index.html" class="link-secondary">DBAU</a></li>                  
                </ul>
              </div>
              <div class="col-12 col-lg-auto mt-3 mt-lg-0">
                <ul class="list-inline list-inline-dots mb-0">
                  <li class="list-inline-item">
                    Copyright &copy; 2022, 
                    All rights reserved.
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </footer>
      </div>
    </div>
   
    <!-- Libs JS -->
    <script src="{{asset('dist_dash/libs/list.js/dist/list.min.js')}}" defer></script>

    <!-- Tabler Core -->
    <script src="{{asset('/dist_dash/js/tabler.min.js')}}" defer></script>
    <script src="{{asset('/dist_dash/js/demo.min.js')}}" defer></script>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>

    <script type="">
      $(document).ready(function() {
          $('#datatable').DataTable( {
              dom: 'Bfrtip',
              buttons: [
                  'copyHtml5',
                  'excelHtml5',
                  'csvHtml5',
                  {
                    extend: 'pdfHtml5',
                    orientation: 'landscape',
                    pageSize: 'LEGAL'
                  }
              ],
              language: {
                  url: 'https://cdn.datatables.net/plug-ins/1.12.1/i18n/fr-FR.json'
              }
          } );
      } );
    </script>
    

  </body>
</html>