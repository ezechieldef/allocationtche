<!doctype html>

<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>Tableau-de-bord - DBAU</title>
    <!-- CSS files -->
    <link href="{{url('distdash/css/tabler.min.css')}}" rel="stylesheet"/>
    <link href="{{url('distdash/css/tabler-flags.min.css')}}" rel="stylesheet"/>
    <link href="{{url('distdash/css/tabler-payments.min.css')}}" rel="stylesheet"/>
    <link href="{{url('distdash/css/tabler-vendors.min.css')}}" rel="stylesheet"/>
    <link href="{{url('distdash/css/demo.min.css')}}" rel="stylesheet"/>
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
              <img src="{{url('distdash/logo_mesrs.png')}}" width="300" alt="Allocations" class="navbar-brand-image">
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
                {{--<div class="btn-list">
                  <span class="d-none d-sm-inline">
                    <a href="#" class="btn btn-white">
                      New view
                    </a>
                  </span>
                  <a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#modal-report">
                    <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>
                    Create new report
                  </a>
                  <a href="#" class="btn btn-primary d-sm-none btn-icon" data-bs-toggle="modal" data-bs-target="#modal-report" aria-label="Create new report">
                    <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>
                  </a>
                </div>--}}
              </div>
            </div>
          </div>
        </div>
        <div class="page-body">
          <div class="container-xl">
            <div class="row row-deck row-cards">
              <div class="col-12">
                <div class="row row-cards">
                  <div class="col-sm-6 col-lg-3">
                    <div class="card card-sm">
                      <div class="card-body">
                        <div class="row align-items-center">
                          <div class="col-auto">
                            <span class="bg-blue text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/currency-dollar -->
                              <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-dice-6" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                 <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                 <rect x="4" y="4" width="16" height="16" rx="2"></rect>
                                 <circle cx="8.5" cy="7.5" r=".5" fill="currentColor"></circle>
                                 <circle cx="15.5" cy="7.5" r=".5" fill="currentColor"></circle>
                                 <circle cx="8.5" cy="12" r=".5" fill="currentColor"></circle>
                                 <circle cx="15.5" cy="12" r=".5" fill="currentColor"></circle>
                                 <circle cx="15.5" cy="16.5" r=".5" fill="currentColor"></circle>
                                 <circle cx="8.5" cy="16.5" r=".5" fill="currentColor"></circle>
                              </svg>
                            </span>
                          </div>
                          <div class="col">
                            <div class="font-weight-medium">
                              {{$nombre_demandes_total}}
                            </div>
                            <div class="text-muted">
                              Total demandes
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6 col-lg-3">
                    <div class="card card-sm">
                      <div class="card-body">
                        <div class="row align-items-center">
                          <div class="col-auto">
                            <span class="bg-green text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/shopping-cart -->
                              <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-dice-5" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                 <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                 <rect x="4" y="4" width="16" height="16" rx="2"></rect>
                                 <circle cx="8.5" cy="8.5" r=".5" fill="currentColor"></circle>
                                 <circle cx="15.5" cy="8.5" r=".5" fill="currentColor"></circle>
                                 <circle cx="15.5" cy="15.5" r=".5" fill="currentColor"></circle>
                                 <circle cx="8.5" cy="15.5" r=".5" fill="currentColor"></circle>
                                 <circle cx="12" cy="12" r=".5" fill="currentColor"></circle>
                              </svg>
                            </span>
                          </div>
                          <div class="col">
                            <div class="font-weight-medium">
                              {{$nombre_demandes_total_year}} 
                            </div>
                            <div class="text-muted">
                              Demandes {{$annees_acad[0]->LibelleAnneeAcademique}}
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6 col-lg-3">
                    <div class="card card-sm">
                      <div class="card-body">
                        <div class="row align-items-center">
                          <div class="col-auto">
                            <span class="bg-twitter text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/brand-twitter -->
                              <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-dice-4" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                 <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                 <rect x="4" y="4" width="16" height="16" rx="2"></rect>
                                 <circle cx="8.5" cy="8.5" r=".5" fill="currentColor"></circle>
                                 <circle cx="15.5" cy="8.5" r=".5" fill="currentColor"></circle>
                                 <circle cx="15.5" cy="15.5" r=".5" fill="currentColor"></circle>
                                 <circle cx="8.5" cy="15.5" r=".5" fill="currentColor"></circle>
                              </svg>
                            </span>
                          </div>
                          <div class="col">
                            <div class="font-weight-medium">
                              {{$nombre_demandes_attentes}}
                            </div>
                            <div class="text-muted">
                              Demande(s) en attente
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6 col-lg-3">
                    <div class="card card-sm">
                      <div class="card-body">
                        <div class="row align-items-center">
                          <div class="col-auto">
                            <span class="bg-facebook text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/brand-facebook -->
                              <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-dice-4" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                 <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                 <rect x="4" y="4" width="16" height="16" rx="2"></rect>
                                 <circle cx="8.5" cy="8.5" r=".5" fill="currentColor"></circle>
                                 <circle cx="15.5" cy="8.5" r=".5" fill="currentColor"></circle>
                                 <circle cx="15.5" cy="15.5" r=".5" fill="currentColor"></circle>
                                 <circle cx="8.5" cy="15.5" r=".5" fill="currentColor"></circle>
                              </svg>
                            </span>
                          </div>
                          <div class="col">
                            <div class="font-weight-medium">
                              {{$nombre_demandes_traitees}}
                            </div>
                            <div class="text-muted">
                              Demande(s) traitée(s)
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-xl-4">
                <div class="card">
                  <div class="card-header">Niveau de traitement Global / {{$annees_acad[0]->LibelleAnneeAcademique}}</div>
                  <div class="card-body">
                    <div id="chart-demo-pie"></div>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-xl-8">
                <div class="card">
                  <div class="card-header">Niveau de traitement par Université / {{$annees_acad[0]->LibelleAnneeAcademique}}</div>
                  <div class="card-body">
                    <div id="chart-combination"></div>
                  </div>
                </div>
              </div>
              <div class="col-lg-12">
                <div class="card">
                  <div class="card-body">
                    <h3 class="card-title"></h3>
                    <form class="form" method="POST" action="{{route('dashboard.stat.consulter')}}">
                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group mb-3 ">
                            <label class="form-label">Année Académique</label>
                            <div >
                              <select class="form-select" name="annee_academique">
                                @foreach($annees_acad as $annee)
                                <option value="{{$annee->CodeAnneeAcademique}}">{{$annee->LibelleAnneeAcademique}}</option>
                                @endforeach
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group mb-3 ">
                            <label class="form-label">Université</label>
                            <div >
                              <select class="form-select" name="universite">
                                @foreach($universites as $universite)
                                <option value="{{$universite->CodeUniversite}}">{{$universite->LibelleLongUniversite}}</option>
                                @endforeach
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group mb-3 ">
                            <label class="form-label">Etablissement</label>
                            <div >
                              <select class="form-select" name="etablissement">
                                @foreach($etablissements as $etablissement)
                                <option value="{{$etablissement->CodeEtablissement}}">{{$etablissement->LibelleEtablissement}}</option>
                                @endforeach
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group mb-3 ">
                            <label class="form-label">Année d'étude</label>
                            <div >
                              <select class="form-select" name="annee_etude">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                                <option>6</option>
                                <option>7</option>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group mb-3 ">
                            <label class="form-label">Type Allocation</label>
                            <div >
                              <select class="form-select" name="type_allocation">
                                <option value="Attribution">Attribution</option>
                                <option value="Renouvellement">Renouvellement</option>
                                <option value="Rétablissement">Rétablissement</option>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group mb-3 ">
                            <label class="form-label">Nature Allocation</label>
                            <div >
                              <select class="form-select" name="nature_allocation">
                                <option value="AIDES">Aides Universitaires</option>
                                <option value="BOURSE">BOURSE</option>
                                <option value="BRSDUT">Bourse pour les formations professionnelles DUT et les classes prépa</option>
                                <option value="BRSECOLEING">Bourse pour école d'ingénieur après les classes préparatoires</option>
                                <option value="BRSING">Bourse Ingénieur</option>
                                <option value="BRSLICENCE">Bourse Licence</option>
                                <option value="BRSMED">Bourse Médecine</option>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group mb-3 ">
                            <label class="form-label">Avis CnaBAU</label>
                            <div >
                              <select class="form-select" name="avis">
                                <option value="Favorable">Favorable</option>
                                <option value="Réservé">Réservé</option>
                                <option value="Défavorable">Défavorable</option>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group mb-3 ">
                            <label class="form-label">Sexe</label>
                            <div>
                              <select class="form-select" name="sexe">
                                <option>F</option>
                                <option>M</option>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group mb-3 ">
                            <label class="form-label">Frais de demande</label>
                            <div >
                              <select class="form-select" name="paiement_frais">
                                <option>Payé</option>
                                <option>Non Payé</option>
                              </select>
                            </div>
                          </div>
                        </div>

                      </div>
                      
                      
                     
                      <div class="form-footer">
                        <button type="submit" class="btn btn-primary ">Consulter</button>
                      </div>
                    @csrf

                    </form>
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
    <script src="{{url('distdash/libs/apexcharts/dist/apexcharts.min.js')}}" defer></script>
   
    <!-- Tabler Core -->
    <script src="{{url('distdash/js/tabler.min.js')}}" defer></script>
    <script src="{{url('distdash/js/demo.min.js')}}" defer></script>
    
    <script>
      // @formatter:off
      document.addEventListener("DOMContentLoaded", function () {
        window.ApexCharts && (new ApexCharts(document.getElementById('chart-demo-pie'), {
          chart: {
            type: "donut",
            fontFamily: 'inherit',
            height: 240,
            sparkline: {
              enabled: true
            },
            animations: {
              enabled: false
            },
          },
          fill: {
            opacity: 1,
          },
          series: [{{$nombre_demandes_traitees}}, {{$nombre_demandes_attentes}}],
          labels: ["Demandes traitées", "Demandes en attente"],
          grid: {
            strokeDashArray: 4,
          },
          colors: ["#206bc4", "#79a6dc", "#d2e1f3", "#e9ecf1"],
          legend: {
            show: true,
            position: 'bottom',
            offsetY: 12,
            markers: {
              width: 10,
              height: 10,
              radius: 100,
            },
            itemMargin: {
              horizontal: 8,
              vertical: 8
            },
          },
          tooltip: {
            fillSeriesColor: false
          },
        })).render();
      });
      // @formatter:on
    </script>

    <script>
      // @formatter:off
      document.addEventListener("DOMContentLoaded", function () {
        window.ApexCharts && (new ApexCharts(document.getElementById('chart-combination'), {
          chart: {
            type: "bar",
            fontFamily: 'inherit',
            height: 240,
            parentHeightOffset: 0,
            toolbar: {
              show: false,
            },
            animations: {
              enabled: false
            },
          },
          plotOptions: {
            bar: {
              columnWidth: '50%',
            }
          },
          dataLabels: {
            enabled: false,
          },
          fill: {
            opacity: 1,
          },
          series: [{
            name: "Traitées",
            data: [{{$g_uac_traitees}}, {{$g_up_traitees}}, {{$g_unstim_traitees}}, {{$g_una_traitees}}]
          },{
            name: "En attente",
            data: [{{$g_uac_total - $g_uac_traitees}}, {{$g_up_total - $g_up_traitees}}, {{$g_unstim_total - $g_unstim_traitees}}, {{$g_una_total - $g_una_traitees}}]
          },{
            name: "Total",
            data: [{{$g_uac_total}}, {{$g_up_total}}, {{$g_unstim_total}}, {{$g_una_total}}]
          }],
          grid: {
            padding: {
              top: -20,
              right: 0,
              left: -4,
              bottom: -4
            },
            strokeDashArray: 4,
          },
          xaxis: {
            labels: {
              padding: 0,
            },
            tooltip: {
              enabled: false
            },
            axisBorder: {
              show: false,
            },
            categories: ['UAC', 'UP', 'UNSTIM', 'UNA'],
          },
          yaxis: {
            labels: {
              padding: 4
            },
          },
          colors: ["#f66d9b", "#5eba00", "#206bc4"],
          legend: {
            show: false,
          },
        })).render();
      });
      // @formatter:on
    </script>

  </body>
</html>
