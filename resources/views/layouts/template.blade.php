@extends('layouts.app')

@section('titre')
    Formulaire de demande
@endsection


@section('content')
<div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class=" container ">
        <!--begin::Card-->
<div class="card card-custom">
<div class="card-body p-0">
    <div class="wizard wizard-1" id="kt_projects_add" data-wizard-state="step-first" data-wizard-clickable="true">
        <div class="kt-grid__item">
            <!--begin::Wizard Nav-->
            <div class="wizard-nav border-bottom">
                <div class="wizard-steps p-8 p-lg-10">
                    <div class="wizard-step" data-wizard-type="step" data-wizard-state="current">

                        <div class="wizard-label">
                            <span class="svg-icon svg-icon-4x wizard-icon"><!--begin::Svg Icon | path:{{ url('assets/metro/media/svg/icons/Home/Globe.svg') }}--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
    <rect x="0" y="0" width="24" height="24"/>
    <path d="M13,18.9450712 L13,20 L14,20 C15.1045695,20 16,20.8954305 16,22 L8,22 C8,20.8954305 8.8954305,20 10,20 L11,20 L11,18.9448245 C9.02872877,18.7261967 7.20827378,17.866394 5.79372555,16.5182701 L4.73856106,17.6741866 C4.36621808,18.0820826 3.73370941,18.110904 3.32581341,17.7385611 C2.9179174,17.3662181 2.88909597,16.7337094 3.26143894,16.3258134 L5.04940685,14.367122 C5.46150313,13.9156769 6.17860937,13.9363085 6.56406875,14.4106998 C7.88623094,16.037907 9.86320756,17 12,17 C15.8659932,17 19,13.8659932 19,10 C19,7.73468744 17.9175842,5.65198725 16.1214335,4.34123851 C15.6753081,4.01567657 15.5775721,3.39010038 15.903134,2.94397499 C16.228696,2.49784959 16.8542722,2.4001136 17.3003976,2.72567554 C19.6071362,4.40902808 21,7.08906798 21,10 C21,14.6325537 17.4999505,18.4476269 13,18.9450712 Z" fill="#000000" fill-rule="nonzero"/>
    <circle fill="#000000" opacity="0.3" cx="12" cy="10" r="6"/>
</g>
</svg><!--end::Svg Icon--></span>								<h3 class="wizard-title">Formulaire de demande en ligne</h3>
                        </div>
                            </div>


                </div>
            </div>
            <!--end::Wizard Nav-->
        </div>
        <div class="row justify-content-center my-10 px-8 my-lg-15 px-lg-10">
            <div class="col-xl-12 col-xxl-7">
                <!--begin::Form Wizard-->
                <form class="form" id="kt_projects_add_form">
                    <!--begin::Step 1-->
                    <div class="pb-5" data-wizard-type="step-content">
                        <h3 class="mb-10 font-weight-bold text-dark">Veuillez remplir ce formulaire</h3>

                        <div class="row">
                            <div class="col-xl-6">
                                <div class="form-group">
                                    <label>Université</label>
                                    <select name="universite" class="form-control form-control-lg form-control-solid" required>
                                        <option value=""></option>
                                        <option value="YE">UAC</option>
                                        <option value="YE">UP</option>
                                    </select>
                                    <span class="form-text text-muted">Selectionner votre université.</span>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="form-group">
                                    <label>Matricule</label>
                                    <input type="text" class="form-control form-control-lg form-control-solid" name="matricule" placeholder="Ex:12345678" required/>
                                    <span class="form-text text-muted">Entrer votre numéro matricule.</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="form-group">
                                    <label>Date de naissance</label>
                                    <input type="text" class="form-control form-control-lg form-control-solid" name="datenaiss" placeholder="mm/jj/aaaa" id='kt_datepicker'/>
                                    <span class="form-text text-muted">Entrer votre date de naissance.</span>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="form-group">
                                    <label>Diplome de base</label>
                                    <select name="dipbase" class="form-control form-control-lg form-control-solid" required>
                                        <option value=""></option>
                                        <option value="YE">BAC</option>
                                        <option value="YE">DEAT</option>
                                        <option value="YE">DTI</option>
                                        <option value="YE">Autres</option>
                                    </select>
                                    <span class="form-text text-muted">Selectionner votre diplôme de base.</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="form-group">
                                    <label>Numéro de table</label>
                                    <input type="text" class="form-control form-control-lg form-control-solid" name="datenaiss" placeholder="State" />
                                    <span class="form-text text-muted">Entrer votre numero de table.</span>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="form-group">
                                    <label>Année d'obtention</label>
                                    <select name="andipbase" class="form-control form-control-lg form-control-solid" >
                                        <option value=""></option>
                                        <option value="YE">2022</option>
                                        <option value="YE">2021</option>
                                        <option value="YE">2020</option>
                                        <option value="YE">2019</option>
                                    </select>
                                    <span class="form-text text-muted">Selectionner l'anné d'obtention du diplôme de base.</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--begin::Actions-->
                    <div class="d-flex justify-content-between border-top mt-5 pt-10">

                        <div>
                            <button type="submit" class="btn btn-primary font-weight-bold text-uppercase px-9 py-4" >
                                Valider
                            </button>
                        </div>
                    </div>
                    <!--end::Actions-->
                </form>
                <!--end::Form Wizard-->
            </div>
        </div>
    </div>
</div>
</div>
<!--end::Card-->
    </div>
    <!--end::Container-->
</div>
@endsection
